<?php

namespace App\Http\Controllers;

use App\Models\Sowater;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function sowater()
    {
        $title = 'Sowater | Sowat Station';
        $data = Sowater::getList();
        $collection = collect($data);
        return view('clients.page.sowater', compact('title', 'collection'));
    }
}
