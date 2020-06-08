<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Page;
class ContactController extends Controller
{
    public function getIndex() {

        $pages = Page::all();
        $title = 'Contact Page';

        return view('pages.contact' , [
            'title' => $title,
            'pages' => $pages

        ]);
    }

    public function postContact(Request $r) {

        $pages = Page::all();
        $data = [
            'name' => $r->name,
            'email' => $r->email,
            'subject' => $r->subject,
            'content' => $r->content
        ];


        //

        Mail::send('mails.mail', $data, function ($message) use($r) {
            $message->from('wouter.janssens@student.arteveldehs.be', 'Bunq Bank');
            $message->sender($r->email);
            $message->to('wouter.janssens98@gmail.com', 'Wouter Janssens');
            $message->cc($r->email, $r->name);
            $message->bcc('dendrerman@gmail.com', 'Testje doen');
            $message->subject($r->subject);
            $message->replyTo('wouter.janssens@student.arteveldehs.be', 'Wouter Janssens');

        });

        return view('mails.contact', [

            'data' => $data,
            'pages' => $pages,

            ]);
    }





}
