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
        <div class="medium-7 columns">
            <table class="stack" >
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
                    <td class="pl-2"> {{$page->slug}}</td>
                    <td>
                        @if(app()->getlocale() == 'en')
                        {{ Str::limit($page->intro_en, 50) }}
                        @else
                        {{ Str::limit($page->intro_nl, 50) }}
                        @endif
                    </td>
                    <td class="p-2">
                        <a class="btn btn-success mb-2" href="{{ route('dashboard.pages.edit', $page->id)}}">
                            @if(app()->getlocale() == 'en') Edit @else Bewerk @endif</a>
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
            <div class="row text-center">
                <a href={{route('donations')}}>
                <div class="card" style="width: 14rem;">
                    <img src="{{ asset('images/donation.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h2 class="card-text">{{$donationCount}}</h2>
                    <h3 class="card-text"> @if(app()->getlocale() == 'en') Donations @else Donaties @endif</h3>
                    </div>
                </div>
                </a>

                <a href={{route('news')}}>
                <div class="card" style="width: 14rem;">
                <img src="{{ asset('images/news.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h2 class="card-text">{{$newspagesCount}}</h2>
                    <h3 class="card-text"> @if(app()->getlocale() == 'en') News Articles @else Nieuwsartikelen @endif</h3>
                </div>
                </div>
                </a>


                <div class="card" style="width: 14rem;">
                    <img src="{{ asset('images/page.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2 class="card-text">{{$pagesCount}}</h2>
                        <h3 class="card-text"> @if(app()->getlocale() == 'en') Custom Pages @else Eigen pagina's @endif</h3>
                    </div>
                </div>

            </div>













</div>
@endsection
