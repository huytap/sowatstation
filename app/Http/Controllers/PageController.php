<?php

namespace App\Http\Controllers;

use App\Models\Sowater;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Event;

class PageController extends Controller
{
    public function about()
    {
        $title = 'About us | Sowat Station';
        $data = Sowater::getList();
        $collection = collect($data);
        return view('clients.page.sowater', compact('title', 'collection'));
    }
    public function creative()
    {
        $title = 'Creative activities | Sowat Station';
        return view('clients.page.creative', compact('title'));
    }
    public function creativedetail()
    {
        $title = 'Creative activities | Sowat Station';
        return view('clients.page.creativedetail', compact('title'));
    }
    public function portfolio($slug)
    {
        $data = Sowater::getBySlug($slug);
        if (!empty($data)) {
            $title = $data['name'] . ' | Sowater Station';
            $event = Event::getListByArt($data->id);
            //$related = Event::getList($data->id); //get related
            //return view('clients.page.porfolio', compact('title', 'data', 'artist', 'related'));
            return view('clients.page.porfolio', compact('title', 'data', 'event'));
        }
    }

    public function store()
    {
        $title = 'Sowat store | Sowat Station';
        return view('clients.page.store', compact('title'));
    }

    public function storedetail()
    {
        $title = 'Sowat store | Sowat Station';
        return view('clients.page.storedetail', compact('title'));
    }
}
