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
            <li class="list-group-item"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="changePhoto();clear();">
                    Changer de photo
                </button>
            </li>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Changement de photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form runat="server">
                        <center><img id="blah" src="#" alt="your image" height="300" width="300" /><center><br>
                        <input type='file' id="imgInp" /><br>
                                <button type="submit" class="btn btn-primary">Changer</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Changer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Changer</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function() {
                readURL(this);
            });
        });
      /*  function changePhoto(){
            $(".modal-title").append(" <b>Changement de photo</b>.");
            $(".modal-body").append("<hr><input type=\"file\" name=\"avatar\">");
        }*/



    </script>


@endsection



