<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller
{
    public function getPage($slug){

        $pages = Page::all();

        $page = Page::where('slug', $slug)->first();
        if(!$page) abort('404');

        return view('pages.' . $page->template, [
            'page' => $page,
            'pages' => $pages
        ]);
    }
}
