<?php
namespace App\Http\Controllers;
use App\Models\Sowater;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Product;
use App\Models\Gallery;
use App\Helpers\Enum;
class PageController extends Controller
{
    public function about()
    {
        $title = 'About us | Sowat Station';
        $data = Sowater::getList();
        $collection = collect($data);
        return view('clients.page.sowater', compact('title', 'collection'));
    }
    public function portfolio($slug)
    {
        $data = Sowater::getBySlug($slug);
        if (!empty($data)) {
            $title = $data['name'] . ' | Sowater Station';
            $related = Project::getListByArt($data->id);
            return view('clients.page.porfolio', compact('title', 'data', 'related'));
        }
    }
    public function store()
    {
        $title = 'Sowat store | Sowat Station';
        $data = Product::getList();
        return view('clients.page.store', compact('title', 'data'));
    }
    public function storedetail($slug)
    {
        $data = Product::getBySlug($slug);
        $related = '';
        $title = 'Sowat Station';
        if ($data) {
            $title = $data->title . ' | Sowat Station';
            $gallery = Gallery::getList($data->id, 0, Enum::PRODUCT);
            $related = Product::getListByArt($data->sowater_id, $data->id);
        }
        return view('clients.page.storedetail', compact('title', 'gallery', 'related', 'data'));
    }
}
