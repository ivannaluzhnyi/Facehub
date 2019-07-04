<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <script src="https://kit.fontawesome.com/62926dcf03.js"></script>

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

    <script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ url('/') }}">FaceHub</a>

            <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu" style="padding: 0">
                            <li class="justify-content-center">
                                <a style="width: 100%" class="btn btn-secondary " href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>

                    </li>

            </ul>
        </nav>


        <div class="content container" style="margin-top: 60px">

            @if (session('status_success'))
                @component('components.alert', ['type' => 'success'])
                    {{ session('status_success') }}
                @endcomponent
            @endif

            @if (session('status_danger'))
                @component('components.alert', ['type' => 'danger'])
                    {{ session('status_danger') }}
                @endcomponent
            @endif

            @if (session('status_info'))
                @component('components.alert', ['type' => 'info'])
                    {{ session('status_info') }}
                @endcomponent
            @endif

            @yield('content')
        </div>
    </div>

    <footer  class="py-2 bg-dark fixed-bottom">
        <div class="container">
            <p class=" text-center text-white">Copyright &copy; FACEHUB 2019</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
