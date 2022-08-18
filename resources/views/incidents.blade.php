@extends('layout')

@section('title')
    Incident
@endsection

@section('main_content')
    @if($country == null)
        <h1>All Incident</h1>
        @foreach($incidents as $incident)
            @if($incident->status == 'approved')
                <a href="http://myproject.loc/incident?id={{$incident->id}}" class="text-decoration-none">
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
                                            <img class="img-fluid" src="{{asset('/storage/' . $photo->path)}}">
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    @endif
    @if($country != null)
        <h1>All Incident in {{$country}}</h1>
        @foreach($incidents as $incident)
            @if($incident->status == 'approved' && strtolower($country) == strtolower($incident->Country))
                <a>
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
                                            <img class="img-fluid" src="{{asset('/storage/' . $photo->path)}}">
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    @endif
@endsection
