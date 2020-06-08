<?php

namespace App\Http\Controllers;
use App\News ;
use Illuminate\Http\Request;
use App\Page;
class NewsController extends Controller
{


    public function getIndex() {
        $pages = Page::all();

        return view('pages.news' , [
            'posts' => News::paginate(5),
            'pages' => $pages
        ]);
    }

    public function getDetail(News $id) {

        $pages = Page::all();

        return view('pages.detail' , [
            'post' => $id,
            'pages' => $pages
        ]);
    }


}
