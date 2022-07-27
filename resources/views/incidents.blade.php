@extends('layout')

@section('title') Incident @endsection

@section('main_content')
    <h1>All Incident</h1>
    @foreach($incidents as $incident)
        <div class="alert alert-warning">
            <h1>{{ $incident->name}}</h1>
            <h4>{{$incident->desc}}</h4>
            <p>{{ $incident->place}}</p>
            <p>{{$incident->date}}</p>
        </div>
    @endforeach
@endsection
