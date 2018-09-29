<!DOCTYPE html>

<!--
    {{ env('APP_LONG_NAME') }}
    Designed by Nicolas Guilloux - https://nicolasguilloux.eu/

    University College Cork - MSc Interactive Media
    Student n°117221997

    Based on this work: https://github.com/kossa/laradminator
-->

<html lang="fr">
	<head>
		<title>Alfred, the sustainable butler</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ env('APP_LONG_NAME') }}</title>

        <!-- Styles -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />

        @yield('head')
	</head>

	<body>

        <nav class="navbar navbar-expand-sm fixed-top">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="navbar-brand">
                        <img src="{{ asset('images/logo.png') }}" alt="" />
                    </li>
                    <li class="nav-item">
                        <span class="navbar-text">{{ env('APP_LONG_NAME')}}</span>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('map') }}">Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('api') }}">API</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/NicolasGuilloux/Alfred">GitHub</a>
                    </li>
                </ul>
            </div>
        </nav>

        @yield('content')

		<hr />

		<!-- Copyright -->
			<footer id="copyright" class="text-center m-4">
				Copyright © 2017-{{ date("Y") }} Designed by <a href="https://nicolasguilloux.eu" target='_blank' title="Nicolas Guilloux">Nicolas Guilloux</a> for the MSc Interactive Media project (UCC). All rights reserved.
			</footer>

		<!-- Scripts -->
            <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

            @yield('scripts')
	</body>
</html>
