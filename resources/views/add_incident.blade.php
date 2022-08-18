@extends('layout')

@section('title') Add Incident @endsection

@section('main_content')
    <h1>Incident Created Form</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" enctype="multipart/form-data" action="/incident/add/check">
        @csrf
        <input type="text" name="type" id="type" placeholder="Enter a type of incident" class="form-control"><br>
        <input type="text" name="place" id="place" placeholder="Enter place incident" class="form-control"><br>
        <select name="country" class="form-select">
            @foreach($countries as $country)
                <option value="{{$country}}">{{$country}}</option>
            @endforeach
        </select>
        <br>
        <input type="text" name="name" id="name" placeholder="Enter a name of incident" class="form-control"><br>
        <input type="text" name="coord" id="coord" placeholder="Enter a coordinates of incident" class="form-control"><br>
        <input type="date" name="date" id="date" placeholder="Enter a date of incident" class="form-control"><br>
        <textarea type="text" name="desc" id="desc" placeholder="Enter a Description of incident" class="form-control"></textarea><br>
        <textarea type="text" name="shortDesc" id="shortDesc" placeholder="Enter a Short Description of incident" class="form-control"></textarea><br>
        <input type="file" name="image" id="image">
        <button type="submit" class="btn btn-success">Send</button>
    </form>
@endsection


{{--//<input type="text" name="country" id="country" placeholder="Enter country incident" class="form-control">--}}
