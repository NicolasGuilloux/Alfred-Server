@extends('layout')

@section('content')
    <div id="presentation" class="container d-flex">
        <div class="row justify-content-center text-center align-self-center my-5">
            <div class="col-md-8 py-2">

                <h1>Alfred, the sustainable butler</h1>
                <h3 class="my-5">He helps you monitor your house.</h3>

                <div class="mt-5">
                    <img src="{{ asset('images/computer.svg') }}" alt="With a beautiful layout">

                    <!--
                        <img src="{{ asset('images/dashboard.png') }}" alt="" />
                    -->
                </div>
            </div>
        </div>
    </div>

    <hr />

    <div class="container text-center my-5">
        <h2>Presentation</h2>

        <div class="row justify-content-center text-center align-self-center">
            <div class="col-md-7 text-center mt-5">
                <p>
                    Alfred is a free interface to monitor the resources of your house such as <strong>Electricity</strong>, <strong>Water</strong>, even the amount of <strong>waste</strong> produced.
                </p>

                <p>
                    The goal is to provide an easy to understand interface that helps the average to have a feedback on his habits. All data are compared to city, administrative area and country information to understand the impact of the home on the environment.<br />
                </p>

                <p>
                    It requires a Raspberry Pi and sensors that have to be placed where the user wants to capture the data. For instance, an electric sensor for the kitchen, or a computer.
                </p>

                <p>
                    This application is designed for educationnal purpose and is only a prototype.
                </p>
            </div>

            <div class="col-md-5 text-center mt-5">
                <img src="{{ asset('images/logo.png') }}" alt="" />
            </div>
        </div>
    </div>

    <hr />

    <div class="container text-center my-5">
        <h2>Map</h2>

        <div class="row justify-content-center text-center align-self-center">
            <div class="col-md-6 text-center mt-5">
                <img src="{{ asset('images/maps/world.svg') }}" alt="" />
            </div>

            <div class="col-md-6 text-center mt-5">
                <p>
                    Alfred also provides a <a href="{{ route('map') }}">public and free map</a>.
                </p>

                <p>
                    The map shows every data gathered from the user and the third-party plugins. Alfred is proud to show a full transparency and assures that all collected informations are anonymous.
                </p>
            </div>

        </div>
    </div>

    <hr />

    <div class="container text-center my-5">
        <h2>Developper corner</h2>

        <div class="row justify-content-center text-center align-self-center mt-5">
            <div class="col-md-8 text-center">
                <p>
                    Are you a developper ? Great ! Alfred is free to use, accepts all suggestions and opens his database for everybody. Take part to the project on GitHub, or use the API to implement stuff on your project.
                </p>

                <p>
                    <ul>
                        <li><a href="{{ route('api') }}">API documentation</a></li>
                        <li><a href="https://github.com/NicolasGuilloux/Alfred">GitHub</a></li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
@endsection
