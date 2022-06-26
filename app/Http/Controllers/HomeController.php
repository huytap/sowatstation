<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gallery;
class HomeController extends Controller
{
    public function home()
    {
        $title = 'Sowat Station';
        $slides = Gallery::getList();
        return view('clients.home', compact('title', 'slides'));
    }
}
