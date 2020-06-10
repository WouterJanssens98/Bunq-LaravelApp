<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


use App\News;
use App\Page;
use App\Donation;
class DashboardController extends Controller
{
    public function getIndex() {
        $pages = Page::all();

        $title = 'Admin Page';


        return view('admin.main' , [
            'title' => $title,
            'posts' => News::paginate(5),
            'pages' => $pages

        ]);
    }

    public function getDelete($id) {
        News::where('id', $id)->delete();
        return redirect()->route('admin.news');
    }

    public function getEdit($id) {

        $pages = Page::all();

        $news = News::find($id);

        if(app()->getlocale() == 'en'){
            return view('admin.editNews', [
                'intro' => $news->en_intro,
                'text' => $news->en_text,
                'content' => $news->en_content,
                'id' => $news->id,
                'pages' => $pages
            ]);

        }elseif(app()->getlocale() == 'nl'){
            return view('admin.editNews', [
                'intro' => $news->nl_intro,
                'text' => $news->nl_text,
                'content' => $news->nl_content,
                'id' => $news->id,
                'pages' => $pages
            ]);
        } else {
            return redirect()->route('admin.news');
        }

    }

    public function postEdit(News $id, Request $r) {

        //if($r->id != $news->id) abort('403', 'Sloeber, dat mag niet!');
        if($r->language == "nl"){
            $id->nl_intro = $r->nl_intro;
            $id->nl_text = $r->nl_text;
            $id->nl_content = $r->nl_content;
            $id->save();

        }elseif($r->language == "en"){
            $id->en_intro = $r->en_intro;
            $id->en_text = $r->en_text;
            $id->en_content = $r->en_content;
            $id->save();

        }else{
            abort('404', 'Sloeber, een taal kiezen die niet bestaat!');
        }
        return redirect()->route('admin.news');

    }



    public function getIndexPages() {

        $pages = Page::all();

        return view('dashboard.pages.index', [
            'pages' => $pages,
            'pagesCount' => Page::all()->count(),
            'donationCount' => Donation::all()->count(),
            'newspagesCount' => News::all()->count()
        ]);
    }

    public function getCreatePage() {

        return view('dashboard.pages.create', []);
    }



    public function postCreatePage(Request $r) {

        $validationRules = [
        ];


        $validationRules['title_en'] = 'required|unique:pages';
        $validationRules['title_nl'] = 'required|unique:pages';



        $r->validate($validationRules);

        $page = new Page();
        $page->title_en = $r->title_en;
        $page->title_nl = $r->title_nl;
        $page->slug = Str::snake($r->title_en);
        $page->intro_en = $r->intro_en;
        $page->intro_nl = $r->intro_nl;
        $page->content_en = $r->content_en;
        $page->content_nl = $r->content_nl;
        $page->template = $r->template;
        $page->save();

        return redirect()->route('dashboard.pages.index');


    }

    public function getEditPage(Page $page) {
        return view('dashboard.pages.edit', ['page' => $page]);
    }

    public function postEditPage(Page $page, Request $r) {


        if($r->id != $page->id) abort('403', 'Sloeber, dat mag niet!');

        $page->title_en = $r->title_en;
        $page->title_nl = $r->title_nl;
        $page->slug = Str::snake($r->title_en);
        $page->intro_en = $r->intro_en;
        $page->intro_nl = $r->intro_nl;
        $page->content_en = $r->content_en;
        $page->content_nl = $r->content_nl;
        $page->template = $r->template;
        $page->active = $r->active;

        $page->save();

        return redirect()->route('dashboard.pages.index');



    }

    public function postDelete(Request $r) {
        // dd($page);
        Page::where('id', $r->id)->delete();
        return redirect()->route('dashboard.pages.index');
    }














}
