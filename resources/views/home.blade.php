@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-2">
            test
        </div>

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

                        <div class="col-2 s2">
                            <img src="images/thumbnails/{{Auth::user()->avatar }} " alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                        </div>

            <div class="col-8">

                <div style="margin-top: 25px" class="card" >
                    <div class="card-body">
                        Bienvenue {{Auth::user()->name}}
                    </div>
                </div>

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

                <div style="margin-top: 25px" class="card" >
                    <div class="card-body">
                        You are logged in!
                    </div>
                </div>

            </div>

            <div class="col-2">
                sqdqs
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

                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" multiple>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload one or more files">
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

