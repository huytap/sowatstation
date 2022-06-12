<?php

namespace App\Http\Controllers;

use App\Helpers\Enum;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $title = 'Projects | Sowat Station';
        $data = Project::getList();
        $category = Category::getList();
        //$collection = collect($data);
        return view('clients.project.index', compact('title', 'data', 'category'));
    }

    public function detail($slug)
    {
        $data = Project::getBySlug($slug);
        $related = '';
        $title = 'Sowat Station';
        if ($data) {
            $title = $data->title . ' | Sowat Station';
            $related = Project::getList($data->id);
        }
        return view('clients.project.detail', compact('title', 'related', 'data'));
    }
}
