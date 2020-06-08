@extends('layout.layout')

@section('content')

    <div class="row">
        <div class="col-12 text-center mt-5 mb-3">
            <h1>
                @if(app()->getlocale() == 'en')
                News
                @elseif (app() -> getlocale() == 'nl')
                Nieuws
                @endif


            </h1>
        </div>
    </div>


    @foreach($posts as $post)

    <div class="container">
        <div class="col-12 md-offset-4 post">
            <div class="row">
            <img id="postImage" src="https://picsum.photos/200" width="10%">

            <!-- <img src="{asset('images/bunq.png')}}" width="10%"> !-->

            <h1 class="ml-2 mt-2" id="postTitle">
                @if(app()->getlocale() == 'en')
                {{ $post->en_intro}}
                @elseif (app() -> getlocale() == 'nl')
                {{ $post->nl_intro}}
                @endif
            </h1>




            <p class="ml-3 mt-2">
                @if(app()->getlocale() == 'en')
                    {{ $post->en_text}}
                @elseif (app() -> getlocale() == 'nl')
                    {{ $post->nl_text}}
                @endif
            </p>

            <p class="ml-3 font-italic" >
                @if(app()->getlocale() == 'en')
                Created at {{ $post->created_at}}
                @elseif (app() -> getlocale() == 'nl')
                Gemaakt op {{ $post->created_at}}
                @endif
            </p>

            </div>
            <a href="{{route('news.detail', $post->id)}}" class="col-2 mb-1 btn-sm  btn-primary">View post</a>
        </div>
    </div>
    @endforeach
    <div class="container">
    <div class="col-6 d-flex justify-content-center  mx-auto">
        {{$posts->links()}}
        </div>
    </div>


@endsection



