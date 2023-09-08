<?php
namespace App\Http\Controllers;
use App\Helpers\Enum;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Sowater;
use App\Models\Setting;
class ProjectController extends Controller
{
    public function index()
    {
        $title = Setting::getImage('meta_project') . ' | Sowat Station';
        $meta_description = Setting::getValue('meta_project');
        $data = Project::getList();
        return view('clients.project.index', compact('title', 'data'));
    }
    public function detail($slug)
    {
        $data = Project::getBySlug($slug);
        $related = '';
        $title = 'Sowat Station';
        $meta_thumbnail = '';
        if ($data) {
            $title = $data->title . ' | Sowat Station';
            $meta_description = $data['meta_description'] ? $data['meta_description'] : Setting::getValue('meta_home');
            $meta_thumbnail = $data['cover'];
            $gallery = Gallery::getList($data->id, 0, Enum::PROJECT);
            $related = Project::getListByArt($data->sowater_id, $data->id);
        }
        return view('clients.project.detail', compact('title', 'gallery', 'related', 'data', 'meta_thumbnail', 'meta_description'));
    }
}
