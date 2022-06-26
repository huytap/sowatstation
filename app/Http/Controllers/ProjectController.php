<?php
namespace App\Http\Controllers;
use App\Helpers\Enum;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Sowater;
class ProjectController extends Controller
{
    public function index()
    {
        $title = 'Creative activities | Sowat Station';
        $data = Project::getList();
        return view('clients.project.index', compact('title', 'data'));
    }
    public function detail($slug)
    {
        $data = Project::getBySlug($slug);
        $related = '';
        $title = 'Sowat Station';
        if ($data) {
            $title = $data->title . ' | Sowat Station';
            $gallery = Gallery::getList($data->id, 0, Enum::PROJECT);
            $related = Project::getList($data->id, $data->sowater_id);
        }
        return view('clients.project.detail', compact('title', 'gallery', 'related', 'data'));
    }
}
