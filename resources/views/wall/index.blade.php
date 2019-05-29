@extends('layouts.layout')
@section('title')
    The Wall
@endsection

@section('content')
    <div class="title m-b-md">
        Hello Wall de ta mere => <span style="color:red">ça marche </span>
    </div>
        <form  class="form-inline" method="POST" action="/wall/write">
            @csrf

            <div class="form-row">
                <div  class="form-group">
                    <input style="width: 500px" class="form-control" type="text" name="message"/>
                </div>

                <button style="margin-left: 20px" type="submit" class="btn btn-primary">Write on the Wall !</button>
            </div>
        </form>
        <br>

        <div class="list-group">
        <ul>
            @foreach($messages as $message)
                <li class="list-group-item">
                    {{$message->message}}
                    @auth
                       - <a href="/wall/delete/{{$message->id}}">delete</a>
                    @endauth
                </li>
            @endforeach
        </ul>

        </div>
@endsection
