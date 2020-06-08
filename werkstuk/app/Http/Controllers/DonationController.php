<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class DonationController extends Controller
{
    public function getIndex() {


        $pages = Page::all();

        return view('pages.donations', [
            'pages' => $pages
        ]);
    }
}
