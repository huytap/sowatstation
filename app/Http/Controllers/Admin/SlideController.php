<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Gallery;
use App\Http\Requests\Admin\Gallery\StoreRequest;
use App\Helpers\Enum;
use App\Models\Slide;
class SlideController extends Controller
{
    public function index()
    {
        $title = 'Home Slide';
        $data = Gallery::getList();
        return view('admin.homeslide.index', compact('data', 'title'));
    }
    public function create()
    {
        $title = 'Create Slide';
        $slide = new Gallery;
        return view('admin.homeslide.create', compact('slide', 'title'));
    }
    public function edit(Gallery $slide)
    {
        $title = 'Update Slide';
        return view('admin.homeslide.edit', compact('slide', 'title'));
    }
    public function store(StoreRequest $request)
    {
        $path = base_path() . '/public/uploads';
        if (!File::exists($path)) {
            File::makeDirectory($path, '0777', true);
        }
        if ($request->hasFile('banner_upload')) {
            if ($request->banner_upload->isValid()) {
                $file = $request->banner_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['photo' => $fileName]);
        }

        if ($request->hasFile('banner_mobile')) {
            if ($request->banner_mobile->isValid()) {
                $file = $request->banner_mobile;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['photo_mobile' => $fileName]);
        }
        if ($pr = Gallery::create($request->all())) {
            return redirect()->route('slide.index')->with('success', 'Add Slide success');
        }
    }
    public function update(StoreRequest $request, Gallery $slide)
    {
        $old = $slide->photo;
        $old_mobile = $slide->photo_mobile;
        $path = base_path() . '/public/uploads';
        if (!File::exists($path)) {
            File::makeDirectory($path, '0777', true);
        }
        if ($request->hasFile('banner_upload')) {
            if ($request->banner_upload->isValid()) {
                $file = $request->banner_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['photo' => $fileName]);
        }
        if ($request->hasFile('banner_mobile')) {
            if ($request->banner_mobile->isValid()) {
                $file = $request->banner_mobile;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['photo_mobile' => $fileName]);
        }
        if ($request->banner_upload && $old && file_exists(public_path('uploads/' . $old))) {
            if (chmod($path, 0777)) {
                unlink(public_path('uploads/' . $old));
            }
        } elseif (empty($request->banner_upload)) {
            $request->merge(['photo' => $old]);
        }
        if ($request->banner_mobile){
            if($old_mobile && file_exists(public_path('uploads/' . $old_mobile)) && chmod($path, 0777)) {
                unlink(public_path('uploads/' . $old_mobile));
            }
        } elseif (empty($request->banner_mobile)) {
            $request->merge(['photo_mobile' => $old_mobile]);
        }
        $slide->update($request->only('photo', 'photo_mobile', 'priority', 'link_url', 'status'));
        return redirect()->route('slide.index')->with('success', 'Update slide success');
    }
    public function destroy(Gallery $slide)
    {
        $old_cover = $slide->photo;
        if ($slide->delete()) {
            if ($old_cover && file_exists(public_path('uploads/' . $old_cover))) {
                @unlink(public_path('uploads/' . $old_cover));
            }
            return redirect()->route('slide.index')->with('success', 'Delete slide success');
        }
        return redirect()->route('slide.index')->with('error', 'Errors');
    }
}
