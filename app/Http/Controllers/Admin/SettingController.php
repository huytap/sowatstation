<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\Admin\Setting\StoreRequest;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Settings';
        $data = Setting::search()->paginate(15);
        return view('admin.setting.index', compact('data', 'title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add New Settings';
        $setting = new Setting;
        return view('admin.setting.create', compact('setting', 'title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $path = base_path() . '/public/uploads';
        // if ($request->hasFile('cover_upload')) {
        //     if ($request->cover_upload->isValid()) {
        //         $file = $request->cover_upload;
        //         $ext = $file->extension();
        //         $fileName = md5(uniqid()) . '.' . $ext;
        //         $file->move($path, $fileName);
        //         $request->merge(['photo' => $fileName]);
        //     }
        // }
        if (Setting::create($request->all())) {
            return redirect()->route('setting.index')->with('success', 'Add new setting success');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $Setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $Setting)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $Setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $title = 'Update Settings';
        return view('admin.setting.edit', compact('setting', 'title'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $Setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $old = $setting->photo;
        $path = base_path() . '/public/uploads';
        if ($request->hasFile('cover_upload')) {
            if ($request->cover_upload->isValid()) {
                $file = $request->cover_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['photo' => $fileName]);
        }
        if ($request->photo && $old && file_exists($path . '/' . $old)) {
            unlink($path . '/' . $old);
        } elseif (empty($request->photo)) {
            $request->merge(['photo' => $old]);
        }
        $setting->update($request->only('type', 'key', 'photo', 'value', 'status'));
        return redirect()->route('setting.index')->with('success', 'Update setting success');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $Setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        if ($setting->delete())
            return redirect()->route('Setting.index')->with('success', 'Delete setting success');
        return redirect()->route('Setting.index')->with('error', 'Errors');
    }
}
