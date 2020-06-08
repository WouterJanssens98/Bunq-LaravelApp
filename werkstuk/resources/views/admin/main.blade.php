@extends('layout.layout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="medium-12 large-12 columns">
            <h4 class="mb-3">@lang('news.title')</h4>

            <table class="stack">
                <thead>
                    <tr>
                        @if(app()->getlocale() == 'nl')
                            <th width="200"></th>
                            <th width="200">Titel</th>
                            <th width="200">Inhoud</th>
                            <th width="200">Actie</th>
                        @else
                            <th width="200"></th>
                            <th width="200">Title</th>
                            <th width="200">Content</th>
                            <th width="200">Action</th>
                        @endif
                    </tr>
                </thead>
                @foreach($posts as $post)
                @if(app()->getlocale() == 'en')
                <tr class="newsRow mt-1 mb-1">
                    <td> </td>
                    <td> {{ $post->en_intro}} </td>
                    <td> {{  $post->en_text}} </td>
                    <td> <a class="hollow button error" href="{{ route('admin.deleteNews', $post->id)}}">VERWIJDER</a>
                        <a class="hollow button error" href="{{ route('admin.editNews', $post->id)}}">BEWERK</a>
                    </td>
                </tr>
                @elseif(app()->getlocale() == 'nl')
                <tr  class="newsRow mt-1 mb-1">
                    <td> </td>
                    <td> {{ $post->nl_intro}} </td>
                    <td> {{  $post->nl_text}} </td>
                    <td>
                        <a class="hollow button error" href="{{ route('admin.deleteNews', $post->id)}}">VERWIJDER</a>
                        <a class="hollow button error" href="{{ route('admin.editNews', $post->id)}}">BEWERK</a>
                    </td>
                </tr>
                @endif
                @endforeach

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="col-6 d-flex justify-content-center  mx-auto">
        {{$posts->links()}}
        </div>
    </div>

@endsection
