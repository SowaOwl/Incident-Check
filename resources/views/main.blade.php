@extends('layout')

@section('title')Home Page @endsection

@section('main_content')
    <div class="worldMap">
        <svg baseprofile="tiny" stroke-linecap="round" stroke-linejoin="round" version="1.2" viewbox="0 0 2000 857" xmlns="http://www.w3.org/2000/svg">
            @foreach($svg_coords as $coord)
                <a xlink:title="{{$coord->name}}" href="http://myproject.loc/incidents?country={{$coord->name}}">
                    <path d="{{$coord->coord}}" name="{{$coord->name}}"></path>
                </a>
            @endforeach
            <circle cx="997.9" cy="189.1" id="0">
            </circle>
            <circle cx="673.5" cy="724.1" id="1">
            </circle>
            <circle cx="1798.2" cy="719.3" id="2">
            </circle>
        </svg>
    </div>
    <div class="requestWelcome" >
        <h1 class="text-center">Do you want to join our team?</h1>
        <h3 class="text-center">Then fill our the form</h3>
        <ul class="nav justify-content-center">
            <li class="nav-item ">
                <a style="" href="http://myproject.loc/request/add">
                    <button class="btn btn-success" style="font-family: 'Jost', sans-serif;">Join in team</button>
                </a>
            </li>
        </ul>
    </div>
@endsection
