@extends('layout')

@section('title') Incident @endsection

@section('main_content')
    @foreach($incidents as $incident)
        @if($incident->id == $request_id)
            <div>
                <h1 class="text-center text-decoration-none">{{ $incident->name}}</h1>
                <h4 class="text-center">{{$incident->desc}}</h4>
                <p class="text-center">{{ $incident->place}}</p>
                <p class="text-center">{{$incident->date}}</p>
                <div>
                    <ul class="d-flex justify-content-center">
                        @foreach($photos as $photo)
                            @if($photo->incidentId == $incident->id)
                                <li style="list-style-type: none" class="d-flex justify-content-center h-25 w-50">
                                    <img class="center-block img-fluid" src="{{asset('/storage/' . $photo->path)}}">
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    @endforeach
@endsection
