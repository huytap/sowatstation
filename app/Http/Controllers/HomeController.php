<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sowater;
use App\Models\Event;
use App\Models\Postcard;

class HomeController extends Controller
{
    public function home()
    {
        $title = 'Sowat Station';
        $artist = Sowater::getShowHome();
        $events = Event::getList();
        $postcards = Postcard::getList();
        return view('clients.home', compact('title', 'artist', 'events', 'postcards'));
    }
}
