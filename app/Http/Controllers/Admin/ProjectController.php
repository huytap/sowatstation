<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Gallery;
use App\Http\Requests\Admin\Project\StoreRequest;
use App\Helpers\Enum;

class ProjectController extends Controller
{
    public function index()
    {
        $title = 'Projects';
        $data = Project::search()->paginate(15);
        return view('admin.project.index', compact('data', 'title'));
    }
    public function create()
    {
        $title = 'Create Project';
        $project = new Project;
        return view('admin.project.create', compact('project', 'title'));
    }
    public function edit(Project $project)
    {
        $title = 'Update Project';
        //$sowater_id = explode(',', $project->sowater_id);
        return view('admin.project.edit', compact('project', 'title'));
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
        if ($request->hasFile('cover_upload_mobile')) {
            if ($request->cover_upload_mobile->isValid()) {
                $file = $request->cover_upload_mobile;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['cover_mobile' => $fileName]);
        }
        if ($request->hasFile('cover_banner')) {
            if ($request->cover_banner->isValid()) {
                $file = $request->cover_banner;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['cover_detail' => $fileName]);
        }
        // if ($request->input('category')) {
        //     $request->merge(['sowater_id' => implode(',', $request->input('category'))]);
        // }
        $sowater_id = implode(',', $request->input('sowater_id'));
        $request->merge(['slug' => (string)Str::slug($request->input('title'), '-'), 'sowater_id' => $sowater_id]);
        if ($pr = Project::create($request->all())) {
            // $galleries = Gallery::getList(0, 0, Enum::PROJECT);
            // foreach ($galleries as $gl) {
            //     $gl->event_id = $pr->id;
            //     $gl->save();
            // }
            return redirect()->route('project.index')->with('success', 'Add Project success');
        }
    }
    public function update(StoreRequest $request, Project $project)
    {
        $old = $project->cover;
        $old_gif = $project->cover_mobile;
        $old_detail = $project->cover_detail;
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
        if ($request->hasFile('cover_upload_mobile')) {
            if ($request->cover_upload_mobile->isValid()) {
                $file = $request->cover_upload_mobile;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['cover_mobile' => $fileName]);
        }
        if ($request->hasFile('cover_banner')) {
            if ($request->cover_banner->isValid()) {
                $file = $request->cover_banner;
                $ext = $file->extension();
                $fileName = md5(uniqid()) . '.' . $ext;
                $file->move($path, $fileName);
            }
            $request->merge(['cover_detail' => $fileName]);
        }
        if ($request->cover && $old && file_exists(public_path('uploads/' . $old))) {
            if (chmod($path, 0777)) {
                unlink(public_path('uploads/' . $old));
            }
        } elseif (empty($request->cover)) {
            $request->merge(['cover' => $old]);
        }
        if ($request->cover_mobile && $old_gif && file_exists($path . '/' . $old_gif)) {
            unlink($path . '/' . $old_gif);
        } elseif (empty($request->cover_mobile)) {
            $request->merge(['cover_mobile' => $old_gif]);
        }
        if ($request->cover_detail && $old_detail && file_exists(public_path('uploads/' . $old_detail))) {
            if (chmod($path, 0777)) {
                unlink(public_path('uploads/' . $old_detail));
            }
        } elseif (empty($request->cover_detail)) {
            $request->merge(['cover_detail' => $old_detail]);
        }
        $sowater_id = implode(',', $request->input('sowater_id'));
        $request->merge(['slug' => (string)Str::slug($request->input('title'), '-'), 'sowater_id' => $sowater_id]);
        $project->update($request->only('title', 'slug', 'sowater_id', 'cover', 'cover_mobile', 'cover_detail', 'sub_title', 'description', 'photos', 'background', 'link_join_us', 'meta_title', 'meta_description', 'status'));
        return redirect()->route('project.index')->with('success', 'Update project success');
    }
    public function destroy(Project $project)
    {
        $old_cover = $project->cover;
        $cover_mobile = $project->cover_mobile;
        $cover_detail = $project->cover_detail;
        $id = $project->id;
        if ($project->delete()) {
            if ($old_cover && file_exists(public_path('uploads/' . $old_cover))) {
                @unlink(public_path('uploads/' . $old_cover));
            }
            if ($cover_mobile && file_exists(public_path('uploads/' . $cover_mobile))) {
                @unlink(public_path('uploads/' . $cover_mobile));
            }
            if ($cover_detail && file_exists(public_path('uploads/' . $cover_detail))) {
                @unlink(public_path('uploads/' . $cover_detail));
            }
            // $galleries = Gallery::getList($id, 0, Enum::PRODUCT);
            // foreach ($galleries as $gl) {
            //     @unlink(public_path('uploads/' . $gl->photo));
            //     $gl->delete();
            // }
            return redirect()->route('project.index')->with('success', 'Delete eco system success');
        }
        return redirect()->route('project.index')->with('error', 'Errors');
    }
}
