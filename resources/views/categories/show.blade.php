@extends('layouts.app')

@section('content')
    <div class="container">

        <div>
            <h1>Categorie : {{$category->name}}</h1>
        </div>

        <div style="margin-top: 25px; padding: 0" class="card" >

            <div class="card-header">
                <h5 class="my-1">Voici touts les posts de ce categorie
                </h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-9">

                @foreach($posts as $post)
                    <div class="col-auto" style="margin-top: 25px" >
                        <!-- Blog Post -->
                        <div class="card mb-4">
                            @if($post->img)
                                <img class="card-img-top" src="{{ asset('upload_posts/'.$post->img)  }}" alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <h2 class="card-title">{{$post->name}}</h2>
                                <p class="card-text">{{$post->content}}</p>
                                <a href="{{ url($post->slug_name) }}" class="btn btn-primary">Read More &rarr;</a>
                            </div>
                            <div class="card-footer d-flex justify-content-between text-muted">
                                <p>
                                    Posté le {{ date('d/m/Y', strtotime($post->created_at))  }} par {{$post->user_name}}
                                </p>
                                <p class="align-text-top">
                                    qqsd
                                </p>
                            </div>
                        </div>

                    </div>

                @endforeach




            </div>

        </div>
    </div>


@endsection





