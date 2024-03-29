<?php
namespace App\Http\Controllers;
use App\Models\Sowater;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Product;
use App\Models\Gallery;
use App\Helpers\Enum;
use App\Models\Setting;
class PageController extends Controller
{
    public function about()
    {
        $title = Setting::getImage('meta_about') . ' | Sowat Station';
        $meta_description = Setting::getValue('meta_about');
        $data = Sowater::getList([1,3]);
        $collection = collect($data);
        return view('clients.page.sowater', compact('title', 'collection', 'meta_description'));
    }
    public function portfolio($slug)
    {
        $data = Sowater::getBySlug($slug);
        $title = $meta_description = $meta_thumbnail = '';
        if (!empty($data)) {
            $title = ($data['meta_title'] ? $data['meta_title'] : $data['full_name']) . ' | Sowater Station';
            $meta_description = $data['meta_description'] ? $data['meta_description'] : Setting::getValue('meta_home');
            $meta_thumbnail = $data->meta_thumnail;
            $related = Project::getListByArt($data->id);
            $products = Product::getListByArt($data->id);
            return view('clients.page.porfolio', compact('title', 'data', 'related', 'products', 'meta_thumbnail', 'meta_description'));
        }
    }
    public function store()
    {
        $title = Setting::getImage('meta_store') . ' | Sowat Station';
        $meta_description = Setting::getValue('meta_store');
        $data = Product::getList();
        return view('clients.page.store', compact('title', 'data', 'meta_description'));
    }
    public function storedetail($slug)
    {
        $data = Product::getBySlug($slug);
        $related = '';
        $title = 'Sowat Station';
        $meta_thumbnail = '';
        if ($data) {
            $title = ($data['meta_title'] ? $data['meta_title'] : $data['title']) . ' | Sowater Station';
            $meta_description = $data['meta_description'] ? $data['meta_description'] : Setting::getValue('meta_home');
            $meta_thumbnail = $data['cover'];
            $gallery = Gallery::getList($data->id, 0, Enum::PRODUCT);
            $related = Product::getListByArt($data->sowater_id, $data->id);
        }
        return view('clients.page.storedetail', compact('title', 'gallery', 'related', 'data', 'meta_thumbnail', 'meta_description'));
    }

    public function loadData(Request $request){
        if(isset($request->type)){
            $type = $request->type;
            $page = $request->page;
            $sowater_id = $request->sowater;
            if($type == 'store' && $sowater_id>0){
                if(isset($request->related)){
                    $data = Product::getListByArt($sowater_id, $request->id);
                }else{
                    $data = Product::getListByArt($sowater_id);
                }
                if($data){
                    return view('clients.page._loadproduct', compact('data'));
                }else{
                    return 0;
                }
            }elseif($type == 'creative' && $sowater_id>0){
                if(isset($request->related)){
                    $data = Project::getListByArt($sowater_id, $request->id);
                }else{
                    $data = Project::getListByArt($sowater_id);
                }
                if($data){
                    return view('clients.page._loadcreative', compact('data'));
                }else{
                    return 0;
                }
            }
        }
    }
}
