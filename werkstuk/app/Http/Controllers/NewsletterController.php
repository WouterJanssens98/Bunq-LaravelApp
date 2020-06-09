<?php

namespace App\Http\Controllers;
use Spatie\Newsletter\NewsletterFacade as Newsletter;
use App\Page;
use Illuminate\Http\Request;
class NewsletterController extends Controller
{
    public function postSubscribe(Request $r)
    {
        $isSubscribed = Newsletter::isSubscribed($r->email);

        if($isSubscribed){
            Newsletter::delete($r->email);
        } else{
            Newsletter::subscribe($r->email);
        }

        /*
        return redirect()->route('home', [
            'pages' => Page::where('active', 1)->get()
        ]);
        */
        return view('pages.newsletter', [
            'pages' => Page::where('active', 1)->get(),
            'email' => $r->email,
            'subscribed' => $isSubscribed
                ]);

    }
}
