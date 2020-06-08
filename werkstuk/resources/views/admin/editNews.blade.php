@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="medium-12 large-12 columns">

            <div class="col-12">
                @if(app()->getlocale() == 'en')
                <a class="btn btn-warning" href="{{route('admin.news')}}">Back to news overview</a>
                @elseif(app()->getlocale() == 'nl')
                <a class="btn btn-warning" href="{{route('admin.news')}}">Terug naar nieuwsoverzicht</a>
                @endif
            </div>

            <h4 class="mt-5">
                @if(app()->getlocale() == 'en')
                Edit News Post
                @elseif(app()->getlocale() == 'nl')
                Bewerk Nieuws Post
                @endif
            </h4>

            <div class="medium-2 columns">
                @if(app()->getlocale() == 'en')
                Post {{$id}}
                @elseif(app()->getlocale() == 'nl')
                Post {{$id}}
                @endif
                <div class="medium-2  columns"><b></b></div>
            </div>
            <form action="{{route('admin.postEdit', $id)}}" method="post">
                @csrf

                <input type="hidden" name="id" value="{{$id}}">
                <input type="hidden" name="language" value="{{app()->getlocale()}}">


                @if(app()->getlocale() == 'en')
                <div class="medium-12 mt-1">
                    <label class="row ml-1">Title</label>
                    <input name="en_intro" type="text" value="{{$intro}}">
                </div>
                <div class="medium-4 ">
                    <label class="row ml-1">Description</label>
                    <textarea rows="4" cols="200" name="en_text" type="text">{{$text}} </textarea>
                </div>
                <div class="medium-8">
                    <label class="row ml-1">Content</label>
                    <textarea rows="15" cols="200" name="en_content" type="text">{{$content}} </textarea>
                </div>
                @elseif(app()->getlocale() == 'nl')
                <div class="medium-12 mt-1">
                    <label class="row ml-1">Titel</label>
                    <input name="nl_intro" type="text" value="{{$intro}}">
                </div>
                <div class="medium-4 ">
                    <label class="row ml-1">Beschrijving</label>
                    <textarea rows="4" cols="200" name="nl_text" type="text">{{$text}} </textarea>
                </div>
                <div class="medium-8">
                    <label class="row ml-1">Inhoud</label>
                    <textarea rows="15" cols="200" name="nl_content" type="text">{{$content}} </textarea>
                </div>
                @endif

                <button class="btn btn-success mt-2" type="submit">
                    Update
                </button>




            </form>
        </div>
        @endsection
    </div>
