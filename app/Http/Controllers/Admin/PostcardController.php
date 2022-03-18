<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Postcard;
use App\Http\Requests\Admin\Postcard\StoreRequest;

class PostcardController extends Controller
{
    public function index()
    {
        $title = 'Postcards';
        $data = Postcard::search()->paginate(15);

        return view('admin.postcard.index', compact('data', 'title'));
    }

    public function create()
    {
        $title = 'Create Postcard';
        $postcard = new Postcard;
        return view('admin.postcard.create', compact('postcard', 'title'));
    }
    public function edit(Postcard $postcard)
    {
        $title = 'Update Postcard';
        return view('admin.postcard.edit', compact('postcard', 'title'));
    }
    public function store(StoreRequest $request)
    {
        $path = base_path() . '/public/uploads';
        if (!File::exists($path)) {
            File::makeDirectory($path, '0777', true);
        }
        if ($request->hasFile('cover_upload')) {
            if ($request->cover_upload->isValid()) {
                $file = $request->cover_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['cover' => $fileName]);
        }
        if ($request->hasFile('gif_upload')) {
            if ($request->gif_upload->isValid()) {
                $file = $request->gif_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['gif' => $fileName]);
        }
        $request->merge(['slug' => (string)Str::slug($request->input('title'), '-')]);
        if (Postcard::create($request->all())) {
            return redirect()->route('postcard.index')->with('success', 'Add Postcard success');
        }
    }

    public function update(StoreRequest $request, Postcard $postcard)
    {
        $old = $postcard->cover;
        $old_gif = $postcard->gif;
        $path = base_path() . '/public/uploads';
        if (!File::exists($path)) {
            File::makeDirectory($path, '0777', true);
        }
        if ($request->hasFile('cover_upload')) {
            if ($request->cover_upload->isValid()) {
                $file = $request->cover_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['cover' => $fileName]);
        }
        if ($request->hasFile('gif_upload')) {
            if ($request->gif_upload->isValid()) {
                $file = $request->gif_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['gif' => $fileName]);
        }

        if ($request->cover && file_exists($path . '/' . $old)) {
            unlink($path . '/' . $old);
        } elseif (empty($request->cover)) {
            $request->merge(['cover' => $old]);
        }

        if ($request->gif && $old_gif && file_exists($path . '/' . $old_gif)) {
            unlink($path . '/' . $old_gif);
        } elseif (empty($request->gif)) {
            $request->merge(['gif' => $old_gif]);
        }

        $request->merge(['slug' => (string)Str::slug($request->input('title'), '-')]);

        $postcard->update($request->only('title', 'slug', 'cover', 'gif', 'description', 'status'));
        return redirect()->route('postcard.index')->with('success', 'Update Postcard success');
    }

    public function destroy(Postcard $postcard)
    {
        $old_cover = $postcard->cover;
        $old_gif = $postcard->gif;
        if ($postcard->delete()) {
            @unlink(public_path('uploads/' . $old_cover));
            @unlink(public_path('uploads/' . $old_gif));
            return redirect()->route('postcard.index')->with('success', 'Delete eco system success');
        }
        return redirect()->route('postcard.index')->with('error', 'Errors');
    }
}
