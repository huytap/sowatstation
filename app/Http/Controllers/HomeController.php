<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Setting;
class HomeController extends Controller
{
    public function home()
    {
        $title = Setting::getImage('meta_home');
        $slides = Gallery::getList();
        return view('clients.home', compact('title', 'slides'));
    }
}
