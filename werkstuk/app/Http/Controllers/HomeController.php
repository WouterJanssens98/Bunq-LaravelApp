<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;


class HomeController extends Controller
{
    public function getIndex() {


        $pages = Page::where('active', 1)->get();

        return view('pages.home', [
            'pages' => $pages
        ]);
    }
}
