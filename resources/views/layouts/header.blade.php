<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @isset($title)
            ACTIVITY PROVIDER - {{$title}}
        @else
            ACTIVITY PROVIDER - CONFIGURAÇÃO
        @endif
    </title>

    {{--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,700" type="text/css">--}}
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/all.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/css/easy-autocomplete.min.css')}}" rel="stylesheet" > 	
    <link href="{{url('assets/css/easy-autocomplete.themes.min.css')}}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{url('assets/css/jquery.mCustomScrollbar.min.css')}}">

    <link href="{{url('assets/css/main.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/menu.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/system.css')}}" rel="stylesheet">
</head>
<body>

<header>
    <nav class="navbar navbar-inverse up" id="menu-up">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-left fixed-button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <span class="navbar-brand">
                    <span class="hidden-xs lazy-img">
                        <a href="{{url('/')}}">
                            <img class="logo" src="" data-url="" alt="Logotipo">
                            <span style="font-size: 20px; font-weight: bold;">ACTIVITY PROVIDER</span>
                        </a>
                    </span>
                </span>
            </div>
        </div> 
    </nav>
</header>