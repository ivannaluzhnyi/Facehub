<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">FaceHub</a>

        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            <form method="POST" action="{{ route('login') }}" >
                @csrf

                <div class="form-row align-items-center">

                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus />
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Name</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} mb-2" id="inlineFormInput" placeholder="Mot de pass" name="password" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2">Connexion</button>
                    </div>
                </div>
            </form>
        </ul>
    </nav>

<div style="margin-top: 100px"  class="content">
    <div class="container">
        @if (session('status'))
            @component('components.alert', ['type' => 'success'])
                {{ session('status') }}
            @endcomponent
        @endif

        <div  class="row justify-content-center">
            <div class="col-md-6">
                <h2>Bienvenue sur FaceHub! </h2>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item active">Cette application vous permet de : </li>
                    <li class="list-group-item"> - Poster des articles</li>
                    <li class="list-group-item"> - Commenter des articles</li>
                    <li class="list-group-item"> - Partager des dossier</li>
                    <li class="list-group-item"> - TO DO</li>
                </ul>
            </div>
            @yield('content')
        </div>
    </div>

</div>
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
