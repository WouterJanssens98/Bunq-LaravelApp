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
            Add Page
        </div>
    </div>
    <div class="row">
        <div class="medium-12 large-12 columns">
            <form action="{{route('dashboard.pages.create')}}" method="post">

                <div class="medium-12 columns">
                    @if($errors->any())
                    <div class="callout error text-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>


                @csrf

                <div class="form-group">
                    <label for="title_en">English Title</label>
                    <input type="text" name="title_en" class="form-control" id="title_en"
                        placeholder="Place title here">
                </div>

                <div class="form-group">
                    <label for="title_nl">Nederlandse Titel</label>
                    <input type="text" name="title_nl" class="form-control" id="title_nl"
                        placeholder="Plaats hier je titel">
                </div>

                <div class="form-group">
                    <label for="active">Active</label>
                    <select  name="active"class="form-control" id="active">
                        <option value="0">Visible</option>
                        <option value="1">Not visible</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="intro_en">English Intro</label>
                    <textarea  class="form-control" id="intro_en" name="intro_en" rows="5" cols="70"></textarea>
                </div>
                <div class="form-group">
                    <label for="intro_nl">Nederlandse Intro</label>
                    <textarea  class="form-control" id="intro_nl" name="intro_nl" rows="5" cols="70"></textarea>
                </div>

                <div class="form-group">
                    <label for="content_en">English Content</label>
                    <textarea  class="content" id="content_en" name="content_en" rows="5" cols="70"></textarea>
                </div>

                <div class="form-group">
                    <label for="content_nl">Nederlandse Content</label>
                    <textarea  class="content" id="content_nl" name="content_nl" rows="5" cols="70"></textarea>
                </div>



                <div class="form-group">
                    <label for="template">Template</label>
                    <input  value="fullwidth" type="text" name="template" class="form-control" id="template"
                        placeholder="Template">
                </div>


                <button class="btn btn-success" type="submit">
                    Confirm
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
