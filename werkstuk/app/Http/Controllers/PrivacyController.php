<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function getIndex() {

        $title = 'Privacybeleid van Bunq';


        return view('pages.privacy' , [
            'title' => $title

        ]);
    }
}
