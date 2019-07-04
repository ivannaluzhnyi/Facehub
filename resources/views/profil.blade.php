@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="/css/profil.css">
@endsection

@section('content')
    <div class="container">

        {{--    FIRST SECTION    --}}
        <div class="row justify-content-center">

            {{-- Presentation card --}}
            <div class="col-2">
                <div class="card" style="width:400px">
                    <img class="card-img-top" src="images/thumbnails/{{Auth::user()->avatar }} " alt="Profil image">
                    <div class="card-body">
                        <h4 class="card-title">{{Auth::user()->name }}</h4>
                        <p class="card-text">Description... </p>
                        <a href="/settings" class="btn btn-primary">Modify</a>
                    </div>
                </div>
            </div>

            <div class="col-5"></div>

            <div class="col-5"></div>
        </div>


        {{--    SECOND SECTION    --}}
        <div class="section">
            <div class="row justify-content-center">
                <div class="col-2">
                    Test 1
                </div>

                {{-- add post section --}}
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">Poster un article</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="row">
                                <img  src="images/thumbnails/{{Auth::user()->avatar }} " class="col-2 rounded float-left img-thumbnail" style="height: 60px; width: 80px !important; padding: 0 !important" alt="... thumbnail">
                                <textarea data-toggle="modal" data-target="#addPostModal"  placeholder="Exprimez-vous, {{ Auth::user()->name  }}" style="margin: auto" class=" col-8 form-control" name="" id="" cols="30" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    TEST 2
                </div>
            </div>
        </div>
    </div>

    {{--MODAL TO ADD POST--}}
    <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Poster un article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="">
                    <div class="modal-body form-group ">

                        <input placeholder="Titre" type="text" class="form-control" style="margin-bottom: 20px">
                        <textarea placeholder="Exprimez-vous, {{ Auth::user()->name  }}" name="" id="" rows="6" style="margin-bottom: 20px" class="form-control" required></textarea>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                       aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Poster!</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection


