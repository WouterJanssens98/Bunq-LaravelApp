@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-warning" href="{{route('dashboard.pages.create')}}"> Add page</a>
            <a class="btn btn-warning" href="{{route('home')}}"> Back to homepage</a>
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
                        <th width="200"></th>
                        @else
                        <th width="200">Title</th>
                        <th width="200">Introduction</th>
                        <th width="200"></th>
                        @endif
                    </tr>
                </thead>
                @foreach($pages as $page)

                <tr class="newsRow mt-1 mb-1">
                    <td> {{$page->slug}}</td>
                    <td> {{ Str::limit($page->intro_en, 50) }} </td>
                    <td>
                        <a  class="btn btn-success"
                            href="{{ route('dashboard.pages.edit', $page->id)}}">edit</a>
                        <form action="{{route('dashboard.pages.delete')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$page->id}}">
                            <button type="submit" class="btn btn-danger">
                                Delete
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
