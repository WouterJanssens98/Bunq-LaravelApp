<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Donation;

class DonationController extends Controller
{

    public function getIndex() {

        $donations = Donation::where('visible', 1)->get();
        $pages = Page::where('active', 1)->get();

        return view('donations.donations', [
            'pages' => $pages,
            'donations' =>  $donations
        ]);
    }




    public function createDonation() {


        $pages = Page::where('active', 1)->get();

        return view('donations.create', [
            'pages' => $pages
        ]);
    }
}
