@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Paramètres généraux du compte</h1>
    <hr>
    <center>
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="images/thumbnails/{{Auth::user()->avatar }} " alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Photo de profil</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Redimensionner</li>
            <li class="list-group-item">Changer de photo</li>
        </ul>
    </div>
        </center>

    <br>

    <h1>Informations</h1>
        <table class="table table-hover">
            <tbody>
            <tr>
                <th scope="row">Nom</th>
                <td colspan="2">{{ Auth::user()->name }}</td>
                <td>Modifier</td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td colspan="2">{{ Auth::user()->email }}</td>
                <td>Modifier</td>
            </tr>
            <tr>
                <th scope="row">Date de naissance</th>
                <td colspan="2">{{ Auth::user()->date_of_birth }}</td>
                <td>Modifier</td>
            </tr>
            <tr>
                <th scope="row">Mot de passe</th>
                <td colspan="2">******</td>
                <td>Modifier</td>
            </tr>
            </tbody>
        </table>

    <hr>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection



