<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function getIndex() {

        $title = 'Over ons';


        return view('pages.about' , [
            'title' => $title

        ]);
    }
}
