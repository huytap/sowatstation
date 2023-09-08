<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Gallery;
use App\Http\Requests\Admin\Event\StoreRequest;
use Exception;

class EventController extends Controller
{
    public function index()
    {
        $title = 'Events';
        $data = Event::search()->paginate(15);

        return view('admin.event.index', compact('data', 'title'));
    }

    public function create()
    {
        $title = 'Create Event';
        $event = new Event;
        return view('admin.event.create', compact('event', 'title'));
    }
    public function edit(Event $event)
    {
        $title = 'Update Event';
        return view('admin.event.edit', compact('event', 'title'));
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
        if ($request->hasFile('banner_upload')) {
            if ($request->banner_upload->isValid()) {
                $file = $request->banner_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['banner' => $fileName]);
        }
        $request->merge(['slug' => (string)Str::slug($request->input('title'), '-')]);
        if ($id = Event::create($request->all())->id) {
            if ($request->input('gallery_id')) {
                $gallery_id = $request->input('gallery_id');
                Helper::updateGallery($gallery_id, $id);
            }
            return redirect()->route('event.index')->with('success', 'Add Event success');
        }
    }

    public function update(StoreRequest $request, Event $event)
    {
        $old = $event->cover;
        $old_banner = $event->banner;
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
        if ($request->hasFile('banner_upload')) {
            if ($request->banner_upload->isValid()) {
                $file = $request->banner_upload;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['banner' => $fileName]);
        }

        if ($request->cover && file_exists($path . '/' . $old)) {
            unlink($path . '/' . $old);
        } elseif (empty($request->cover)) {
            $request->merge(['cover' => $old]);
        }

        if ($request->banner && $old_banner && file_exists($path . '/' . $old_banner)) {
            unlink($path . '/' . $old_banner);
        } elseif (empty($request->banner)) {
            $request->merge(['banner' => $old_banner]);
        }

        $request->merge(['slug' => (string)Str::slug($request->input('title'), '-')]);

        $event->update($request->only('title', 'sub_title', 'date', 'sowater_id', 'slug', 'cover', 'banner', 'short_desc', 'description', 'address', 'location', 'status'));
        return redirect()->route('event.index')->with('success', 'Update Event success');
    }

    public function destroy(Event $event)
    {
        $old_cover = $event->cover;
        $old_banner = $event->banner;
        if ($event->delete()) {
            @unlink(public_path('uploads/' . $old_cover));
            @unlink(public_path('uploads/' . $old_banner));
            return redirect()->route('event.index')->with('success', 'Delete eco system success');
        }
        return redirect()->route('event.index')->with('error', 'Errors');
    }
}
