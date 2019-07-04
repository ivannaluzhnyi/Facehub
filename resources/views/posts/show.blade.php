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
                                            <div class="form-group row">

                                                <div class="col-8">
                                                    <label for="anonyme" class="col-md-6 col-form-label text-md-right">{{ __('Rester anonyme') }}</label>
                                                    <input id="anonyme" name="anonyme" type="checkbox" value="true">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Envoyé</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Single Comment -->
                                <div class="media mb-4">
                                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0">Commenter Name</h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.row -->

                    </div>

            </div>
        </div>
    </div>

@endsection



