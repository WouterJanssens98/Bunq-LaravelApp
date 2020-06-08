@extends('layout.layout')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center mt-5 mb-3">
            <h1>
                @if(app()->getlocale() == 'en')
                Donations
                @elseif (app() -> getlocale() == 'nl')
                Donaties
                @endif


            </h1>
        </div>
    </div>
    <div class="col-12">
        @if(app()->getlocale() == 'en')
        <a class="btn btn-warning" href="{{route('donations.create')}}">Make a donation!</a>
        @elseif (app() -> getlocale() == 'nl')
        <a class="btn btn-warning" href="{{route('donations.create')}}">Doneer een bedrag!</a>
        @endif
    </div>

    <div class="row">
        <div class="medium-12 large-12 columns">
            <table class="stack">
                <thead>
                    <tr>
                        @if(app()->getlocale() == 'nl')
                        <th width="200">Naam</th>
                        <th width="200">Bedrag</th>
                        <th width="200">Beschrijving</th>
                        @else
                        <th width="200">Name</th>
                        <th width="200">Amount</th>
                        <th width="200">Description</th>
                        @endif
                    </tr>
                </thead>
                @foreach($donations as $donation)

                <tr class="newsRow mt-1 mb-1">
                    <td> {{$donation->name}}</td>
                    <td> €  {{$donation->value}} </td>
                    <td>
                        {{$donation->description}}
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



