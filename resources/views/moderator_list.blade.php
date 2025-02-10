@extends('layout')

@section('title') Incident @endsection

@section('main_content')
    <h1>All Requests</h1>
    @foreach($requests_list as $request_item)
        @if($request_item->status == 'under review')
            <div class="alert alert-warning">
                <h1>{{$request_item->name}}</h1>
                <h4>{{$request_item->secondName}}</h4>
                <p>{{$request_item->place}}</p>
                <p>{{$request_item->desc}}</p>
                <p>{{$request_item->id}}</p>
                <p>{{$request_item->userId}}</p>
                <ul class="nav">
                    <li style="padding-right: 20px">
                        <a href="http://myproject.loc/request/approved?id={{$request_item->id}}&userId={{$request_item->userId}}">
                            <button class="btn btn-success">Approve</button>
                        </a>
                    </li>
                    <li>
                        <a href="http://myproject.loc/request/reject?id={{$request_item->id}}">
                            <button class="btn btn-danger">Reject</button>
                        </a>
                    </li>
                </ul>
            </div>
        @endif
    @endforeach
@endsection
