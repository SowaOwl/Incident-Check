@extends('layout')

@section('title')
    Incident
@endsection

@section('main_content')
    <h1>All Incident</h1>
    @foreach($incidents as $incident)
        <div class="alert alert-warning">
            <h1>{{ $incident->name}}</h1>
            <h4>{{$incident->desc}}</h4>
            <p>{{ $incident->place}}</p>
            <p>{{$incident->date}}</p>
            <div>
                <ul>
                    @foreach($photos as $photo)
                        @if($photo->incidentId == $incident->id)
                            <li style="list-style-type: none" class="h-25 w-50">
`                                <img class="img-fluid" src="{{asset('/storage/' . $photo->path)}}">
                           </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
@endsection
