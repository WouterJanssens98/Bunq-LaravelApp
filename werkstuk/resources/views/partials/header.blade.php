<!DOCTYPE html>
<html data-whatinput="keyboard" data-whatintent="keyboard" class=" whatinput-types-initial whatinput-types-keyboard">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>Bunq - Bank Of The Free</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <meta class="foundation-mq">
    @yield('inline-style')
    @yield('scripts')
</head>

<body>
    <!-- Start Top Bar -->
    <div class="top-bar">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md navbar-dark bg-info">
                    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">

                        <a class="navbar-brand" href="https://www.bunq.com/nl/">
                            <img href="https://www.bunq.com/nl/" src="{{ asset('images/bunq.png') }}" width="30"
                                height="30" alt="" loading="lazy">
                        </a>

                        <ul class="navbar-nav mr-auto">

                            <li role="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li role="nav-item"><a class="nav-link"
                                    href="{{ route('contact') }}">@lang('header.contact')</a></li>
                            <li role="nav-item"><a class="nav-link" href="{{ route('news') }}">@lang('header.news')</a>
                            </li>

                            @if(app()->getlocale() == 'nl')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('donations') }}">Donaties</a>
                            </li>
                            @elseif(app()->getlocale() == 'en')
                            <li class="nav-item">
                                <a class="nav-link"href="{{ route('donations') }}">Donations</a>
                            </li>
                            @endif





                            @if(app()->getlocale() == 'nl')
                                @foreach($pages as $page)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('page', $page->slug) }}">{{ $page->title_nl }}</a>
                                </li>
                                @endforeach
                            @elseif(app()->getlocale() == 'en')
                                @foreach($pages as $page)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('page', $page->slug) }}">{{ $page->title_en }}</a>
                                </li>
                                @endforeach
                            @endif

                        </ul>
                    </div>
                    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                        <ul class="navbar-nav ml-auto">

                            <a class="navbar-brand" href="{{__('header.change')}}">
                                <img src="{{ asset(__('header.image')) }}" width="30" height="30" alt="" loading="lazy">
                            </a>




                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('dashboard.dashboard') }}">
                                        {{ __('Dashboard') }}
                                    </a>


                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>





                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
