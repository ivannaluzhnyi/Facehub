@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <h3><a href="{{ url('/categories') }}">Categories</a></h3>
                        {{--            <a class="btn btn-outline-success" href="">Tout les categories</a>--}}
                    </div>
                    <div class="card-body">
                        <ul >
                            @if(isset($categories))
                                <?php  $limit = 0?>
                                @foreach($categories as $category)
                                    @if($limit === 3) @break @endif
                                    <li><a href="categories/{{$category->slug_name}}">{{$category->name}}</a> </li>
                                    <?php ++$limit ?>
                                @endforeach
                                <br>
                                <a href="{{ url('/categories') }}"><small>Plus de categories...</small></a>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-9">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row">

                    <!-- Post Content Column -->
                    <div class="col-lg-9">

                        <!-- Title -->
                        <h1 class="mt-4">{{$post->name}}</h1>

                        <!-- Author -->
                        <p class="lead">
                            par
                            <a href="#"> {{ $user->name }} </a>
                        </p>

                        <hr>

                        <!-- Date/Time -->
                        <p>Posté le  {{ date('d/m/Y', strtotime($post->created_at)) }} </p>

                        <hr>

                        <!-- Preview Image -->

                        @if($post->img)
                            <img class="img-fluid rounded" src="{{asset('upload_posts/'.$post->img) }}" alt="Card image cap">
                        @endif

                        <hr>

                        <!-- Post Content -->
                        <div class="post-content">
                            {{($post->content)}}
                        </div>
                        <hr>

                        <!-- Comments Form -->
                        <div class="card my-4">
                            <h5 class="card-header">Laisser un commentaire:</h5>
                            <div class="card-body">
                                <form method="POST"  action="{{route('add_comment')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$post->id}}" name="post_id">
                                    <input type="hidden" value="{{$post->slug_id}}" name="slug_id">
                                    <div class="form-group row">

                                        <div class="col-8">
                                            <label for="anonyme" class="col-md-6 col-form-label text-md-right">{{ __('Rester anonyme') }}</label>
                                            <input id="anonyme" name="anonyme" type="checkbox" value="true">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <textarea name="content" class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Envoyé</button>
                                </form>
                            </div>
                        </div>

                        <!-- Single Comment -->

                        @foreach($comments as $comment)
                            <div class="media mb-4">
                                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">

                                <div class="media-body">
                                    {{ $comment->content}}
                                </div>

                                <div>{{ date('d/m/Y', strtotime($comment->created_at))  }}
                                    @if($comment->anonyme === "false")
                                        <br>
                                        {{$comment->user_name}}
                                    @else
                                        <p>Anonyme</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        <br>
                        <br>
                        <br>

                    </div>
                </div>
                <!-- /.row -->

            </div>

        </div>
    </div>
    </div>

@endsection



