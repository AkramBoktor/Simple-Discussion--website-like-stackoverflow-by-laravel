<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <link href="{{asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/toaster.min.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


<!-- Errors Print ----!-->


<div class="container text-danger">
            @if($errors->count()>0)
                @foreach($errors->all() as $error)
                <ul>
                    <li>{{$error}}</li>
                </ul>
                @endforeach
            @endif
</div>
<!-----------------------!-->



 <div class="container">
    <div class="row">

                <div class="col-md-4">


                     <div class="form-group form-control text-center">
                            
                            <a href="{{route('discussion.create')}}" class="btn btn-primary">
                              Create New Discussion
                           </a>
                    </div>


                      <div class="card">

                            <div class="card-body">

                                    <li class="list-group-item">

                                        <a href="/forum">Home</a>
                                    </li>


                                      <li class="list-group-item">

                                        <a href="/forum?filter=me">My Discussions</a>
                                    </li>


                                    @if(Auth::check())  

                                        @if(Auth::user()->admin)

                                             <li class="list-group-item">

                                                <a href="/All_channels">All channels</a>
                                            </li>

                                        @endif


                                    @endif
                             </div>
                       </div>


                    <div class="card">
                         <div class="card-header">Channels</div>

                            <div class="card-body">
                                    @foreach($channels as $channel)

                                    <li class="list-group-item">
                                       <a href="{{route('channel',['slug'=>$channel->slug])}}">                {{$channel->title}}
                                       </a>
                                    </li>

                                    @endforeach
                             </div>
                       </div>
                </div>
          


                <div class="col-md-8">
                    @yield('content')
                </div>

            </div>



            

 </div>
 <script src="js/app.js"></script>


<script src="{{asset('js/toaster.min.js') }}"></script>
    <script>
            @if(Session::has('success'))

                toastr.success("{{Session::get('success')}}")

            @endif

             @if(Session::has('info'))

                toastr.info("{{Session::get('info')}}")

            @endif
    </script>

</body>
</html>
