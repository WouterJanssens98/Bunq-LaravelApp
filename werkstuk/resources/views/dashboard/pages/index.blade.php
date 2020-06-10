@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            @if(app()->getlocale() == 'en')
            <a class="btn btn-warning" href="{{route('dashboard.pages.create')}}"> Add page</a>
            <a class="btn btn-warning" href="{{route('admin.news')}}"> Edit news pages</a>
            <a class="btn btn-warning" href="{{route('home')}}"> Back to homepage</a>
            @else
            <a class="btn btn-warning" href="{{route('dashboard.pages.create')}}">Pagina toevoegen</a>
            <a class="btn btn-warning" href="{{route('admin.news')}}">Nieuwspagina's bewerken</a>
            <a class="btn btn-warning" href="{{route('home')}}">Terug naar homepage</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="medium-12 large-12 columns">
            <table class="stack">
                <thead>
                    <tr>
                        @if(app()->getlocale() == 'nl')
                        <th width="200">Titel</th>
                        <th width="200">Introductie</th>
                        <th width="200">Actie</th>
                        @else
                        <th width="200">Title</th>
                        <th width="200">Introduction</th>
                        <th width="200">Actions</th>
                        @endif
                    </tr>
                </thead>
                @foreach($pages as $page)

                <tr class="newsRow mt-1 mb-1">
                    <td> {{$page->slug}}</td>
                    <td>
                        @if(app()->getlocale() == 'en')
                        {{ Str::limit($page->intro_en, 50) }}
                        @else
                        {{ Str::limit($page->intro_nl, 50) }}
                        @endif
                      </td>
                    <td>
                        <a  class="btn btn-success"
                            href="{{ route('dashboard.pages.edit', $page->id)}}"> @if(app()->getlocale() == 'en') Edit @else Bewerk @endif</a>
                        <form action="{{route('dashboard.pages.delete')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$page->id}}">
                            <button type="submit" class="btn btn-danger">
                                @if(app()->getlocale() == 'en') Delete @else Verwijder @endif
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
