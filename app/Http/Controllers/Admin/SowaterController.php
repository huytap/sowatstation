<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Sowater;
use App\Http\Requests\Admin\Sowater\StoreRequest;
class SowaterController extends Controller
{
    public function index()
    {
        $title = 'Sowater';
        $data = Sowater::search()->paginate(15);
        return view('admin.sowater.index', compact('data', 'title'));
    }
    public function create()
    {
        $title = 'Add New Sowater';
        $sowater = new Sowater;
        return view('admin.sowater.create', compact('sowater', 'title'));
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
        if (!File::exists($path)) {
            File::makeDirectory($path, '0777', true);
        }
        if ($request->hasFile('avatar_upload')) {
            if ($request->avatar_upload->isValid()) {
                $file = $request->avatar_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['avatar' => $fileName]);
        }
        if ($request->hasFile('avatarhover_upload')) {
            if ($request->avatarhover_upload->isValid()) {
                $file = $request->avatarhover_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['avatar_hover' => $fileName]);
        }
        if ($request->hasFile('meta_thumnail_upload')) {
            if ($request->meta_thumnail_upload->isValid()) {
                $file = $request->meta_thumnail_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['meta_thumnail' => $fileName]);
        }
        if ($request->input('show_homepage') == 'on') {
            $request->merge(['show_homepage' => 1]);
        }
        $request->merge(['slug' => (string)Str::slug($request->input('full_name'), '-')]);
        if ($data = Sowater::create($request->all())) {
            return redirect()->route('sowater.edit', $data->id)->with('success', 'Create sowater success');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sowater  $sowater
     * @return \Illuminate\Http\Response
     */
    public function show(Sowater $sowater)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sowater  $sowater
     * @return \Illuminate\Http\Response
     */
    public function edit(Sowater $sowater)
    {
        $title = 'Update Sowater';
        return view('admin.sowater.edit', compact('sowater', 'title'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sowater  $sowater
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Sowater $sowater)
    {
        //dd($request);
        $old = $sowater->avatar;
        $old_hover = $sowater->avatar_hover;
        $old_meta_thumnail = $sowater->meta_thumnail;
        $path = base_path() . '/public/uploads';
        if (!File::exists($path)) {
            File::makeDirectory($path, '0777', true);
        }
        if ($request->hasFile('avatar_upload')) {
            if ($request->avatar_upload->isValid()) {
                $file = $request->avatar_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['avatar' => $fileName]);
        }
        if ($request->hasFile('avatarhover_upload')) {
            if ($request->avatarhover_upload->isValid()) {
                $file = $request->avatarhover_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['avatar_hover' => $fileName]);
        }
        if ($request->hasFile('meta_thumnail_upload')) {
            if ($request->meta_thumnail_upload->isValid()) {
                $file = $request->meta_thumnail_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['meta_thumnail' => $fileName]);
        }
        if ($request->avatar && file_exists($path . '/' . $old)) {
            unlink($path . '/' . $old);
        } elseif (empty($request->avatar)) {
            $request->merge(['avatar' => $old]);
        }
        if ($request->avatar_hover && $old_hover && file_exists($path . '/' . $old_hover)) {
            unlink($path . '/' . $old_hover);
        } elseif (empty($request->avatar_hover)) {
            $request->merge(['avatar_hover' => $old_hover]);
        }
        if ($request->meta_thumnail && $old_meta_thumnail && file_exists($path . '/' . $old_meta_thumnail)) {
            unlink($path . '/' . $old_meta_thumnail);
        } elseif (empty($request->meta_thumnail)) {
            $request->merge(['meta_thumnail' => $old_meta_thumnail]);
        }
        if ($request->input('show_homepage') == 'on') {
            $request->merge(['show_homepage' => 1]);
        } else {
            $request->merge(['show_homepage' => 0]);
        }
        $request->merge(['slug' => (string)Str::slug($request->input('full_name'), '-')]);
        $sowater->update($request->only('name', 'full_name', 'title', 'type', 'slug', 'background', 'about', 'biography', 'avatar', 'avatar_hover', 'priority', 'on_column', 'show_homepage', 'work_at', 'meta_title', 'meta_description', 'meta_thumnail', 'status'));
        return redirect()->route('sowater.index')->with('success', 'Update sowater success');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sowater  $sowater
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sowater $sowater)
    {
        $old = $sowater->avatar;
        $old_hover = $sowater->avatar_hover;
        if ($sowater->delete()) {
            @unlink(public_path('uploads/' . $old));
            @unlink(public_path('uploads/' . $old_hover));
            return redirect()->route('sowater.index')->with('success', 'Delete sowater success');
        }
        return redirect()->route('sowater.index')->with('error', 'Errors');
    }
}
