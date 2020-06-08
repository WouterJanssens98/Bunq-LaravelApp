@extends('layouts.app')


@section('scripts')
<script>
    tinymce.init({
      selector: '.content',
      height: "480",
      plugins: "link",
    });
  </script>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="mb-3">
            Edit Page
        </div>
    </div>
    <div class="row">
        <div class="medium-12 large-12 columns">
            <form action="{{route('dashboard.pages.edit', $page->id)}}" method="post">
                @csrf

                <input type="hidden" name="id" value="{{$page->id}}">

                <div class="form-group">
                    <label for="title_nl">Nederlandse Titel</label>
                <input value="{{$page->title_nl}}" type="text" name="title_nl" class="form-control" id="title_nl"
                        placeholder="Plaats hier de Nederlandse titel">
                </div>

                <div class="form-group">
                    <label for="title_en">English Title </label>
                <input value="{{$page->title_en}}" type="text" name="title_en" class="form-control" id="title_en"
                        placeholder="Place english title here">
                </div>


                <div class="form-group">
                    <label for="active">Active</label>
                    <select name="active"class="form-control" id="active">
                        <option @if($page->active) selected @endif value="1">Visible</option>
                        <option @if(!$page->active) selected @endif  value="0">Not visible</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="intro_nl">Nederlands intro</label>
                    <textarea class="form-control" id="intro_nl" name="intro_nl" rows="5" cols="70"> {{$page->intro_nl}}</textarea>
                </div>

                <div class="form-group">
                    <label for="intro_en">English Intro</label>
                    <textarea class="form-control" id="intro_en" name="intro_en" rows="5" cols="70"> {{$page->intro_en}}</textarea>
                </div>



                <div class="form-group">
                    <label for="content_nl">Nederlandse Content</label>
                    <textarea class="content"  id="content_nl" name="content_nl" rows="5" cols="70"> {{$page->content_nl}} </textarea>
                </div>

                <div class="form-group">
                    <label for="content_en">English Content</label>
                    <textarea class="content"  id="content_en" name="content_en" rows="5" cols="70"> {{$page->content_en}} </textarea>
                </div>



                <div class="form-group">
                    <label for="template">Template</label>
                <input value="{{$page->template}}" type="text" name="template" class="form-control" id="template"
                        placeholder="{{$page->template}}">
                </div>


                <button class="btn btn-success" type="submit">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
