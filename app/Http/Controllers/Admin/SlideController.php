<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
class SlideController extends Controller
{
    public function index()
    {
        $title = 'Home Slide';
        $items = Gallery::getList();
        return view('admin.slide.index', compact('title', 'items'));
    }
}
