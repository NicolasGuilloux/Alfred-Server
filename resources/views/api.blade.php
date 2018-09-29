@extends('layout')

@section('content')
    <div class="container text-center my-5 pt-5">
        <h2>API</h2>

        <div class="row justify-content-center text-center align-self-center">
            <div class="col-md-8 text-center mt-5">
                <p>
                    The API is open for everybody and does not require any Key or account. Every request are using GET method and return JSON.<br />
                    Feel free to use those data.
                </p>

                <ul>
                    <li><a href="#data">Get data</a></li>
                    <li><a href="#availableDate">Get available dates and countries</a></li>
                    <li><a href="#driverMarket">Driver market</a></li>
                    <li><a href="#features">Features for Alfred</a></li>
                </ul>
            </div>
        </div>

        <hr />

        <div id="data" class="row text-center justify-content-center text-center align-self-center">
            <h2>Get data</h2>

            <div class="row justify-content-center text-center align-self-center">

                <div class="col-12 mt-5">
                    <h5>Per date</h5>

                    <p>
                        You can ask the list of data per date for every country available by making a GET query to the following link:<br />
                        <code>{!! route('api.date', 'AAAA-MM-DD') !!}</code>
                    </p>

                    <p class="mt-5">
                        For instance, the following code uses curl request <br />
                        <code>
                            curl {!! route('api.date', '2018-07-22') !!}
                        </code>
                    </p>
                </div>

                <div>
                    <p>
                        returns
                        <code class="pre">{!!
                            json_encode(
                                getJSON( route('api.date', '2018-07-22') )
                            , JSON_PRETTY_PRINT )
                        !!}</code>
                    </p>
                </div>

                <div class="col-12 mt-5">
                    <h5>Per country</h5>

                    <p>
                        You can ask the list of data per country for every date available by making a GET query to the following link:<br />
                        <code>{!! route('api.country', 'COUNTRY') !!}</code>
                    </p>

                    <p class="mt-5">
                        For instance, the following code uses curl request <br />
                        <code>
                            curl {!! route('api.country', 'France') !!}
                        </code>
                    </p>
                </div>

                <div>
                    <p>
                        returns
                        <code class="pre">{!!
                            json_encode(
                                getJSON( route('api.country', 'France') )
                            , JSON_PRETTY_PRINT )
                        !!}</code>
                    </p>
                </div>
            </div>
        </div>

        <hr />

        <div id="availableDate" class="row text-center justify-content-center text-center align-self-center">
            <h2>Get available dates and countries</h2>

            <div class="row justify-content-center text-center align-self-center">

                <div class="col-12 mt-5">
                    <h5>Get available dates</h5>

                    <p>
                        You can ask the list of available dates where there are data for the specific country by making a GET query to the following link:<br />
                        <code>{!! route('api.available.dates', 'COUNTRY') !!}</code>
                    </p>

                    <p>
                        If the country is not specified, it will provide the list of date where there are at least one entry.
                    </p>

                    <p class="mt-5">
                        For instance, the following code uses curl request <br />
                        <code>
                            curl {!! route('api.available.dates', 'France') !!}
                        </code>
                    </p>
                </div>

                <div>
                    <p>
                        returns
                        <code class="pre">{!!
                            json_encode(
                                getJSON( route('api.available.dates', 'France') )
                            , JSON_PRETTY_PRINT )
                        !!}</code>
                    </p>
                </div>

                <div class="col-12 mt-5">
                    <h5>Get available countries</h5>

                    <p>
                        You can ask the list of available countries where there are data for the specific date by making a GET query to the following link:<br />
                        <code>{!! route('api.available.countries', 'DATE') !!}</code>
                    </p>

                    <p>
                        If the date is not specified, it will provide the list of countries where there are at least one entry.
                    </p>

                    <p class="mt-5">
                        For instance, the following code uses curl request <br />
                        <code>
                            curl {!! route('api.available.countries', '2018-08-01') !!}
                        </code>
                    </p>
                </div>

                <div>
                    <p>
                        returns
                        <code class="pre">{!!
                            json_encode(
                                getJSON( route('api.available.countries', '2018-08-01') )
                            , JSON_PRETTY_PRINT )
                        !!}</code>
                    </p>
                </div>
            </div>
        </div>

        <hr/>

        <div id="driverMarket" class="row text-center justify-content-center text-center align-self-center">
            <h2>Driver market</h2>

            <div class="row justify-content-center text-center align-self-center">

                <div class="col-12 mt-5">
                    <h5>Get driver list</h5>

                    <p>
                        You can ask the list of drivers available by making a GET query to the following link:<br />
                        <code>{!! route('api.drivers') !!}</code>
                    </p>

                    <p class="mt-5">
                        For instance, the following code uses curl request <br />
                        <code>
                            curl {!! route('api.drivers') !!}
                        </code>
                    </p>
                </div>

                <div>
                    <p>
                        returns
                        <code class="pre">{!!
                            json_encode(
                                getJSON( route('api.drivers') )
                            , JSON_PRETTY_PRINT )
                        !!}</code>
                    </p>
                </div>

                <div class="col-12 mt-5">
                    <h5>Get the source code of an addon</h5>

                    <p>
                        You can ask the source code of a specific addon by making a GET query to the following link:<br />
                        <code>{!! route('api.drivers.source', 'NAME') !!}</code>
                    </p>

                    <p class="mt-5">
                        For instance, the following code uses curl request <br />
                        <code>
                            curl {!! route('api.drivers.source', 'Electricity') !!}
                        </code>
                    </p>
                </div>

                <div>
                    <p>
                        returns
                        <code class="pre">{{ file_get_contents( route('api.drivers.source', 'Electricity') ) }}</code>
                    </p>
                </div>
            </div>
        </div>

        <hr/>

        <div id="features" class="row text-center justify-content-center text-center align-self-center">
            <h2>Features for Alfred</h2>

            <div class="row justify-content-center text-center align-self-center">

                <div class="col-12 mt-5">
                    <h5>Get notifications</h5>

                    <p>
                        You can get the notifications by making a GET query to the following link:<br />
                        <code>{!! route('api.notifications') !!}</code>
                    </p>

                    <p>
                        The content is HTML formated.
                    </p>

                    <p class="mt-5">
                        For instance, the following code uses curl request <br />
                        <code>
                            curl {!! route('api.notifications') !!}
                        </code>
                    </p>
                </div>

                <div>
                    <p>
                        returns
                        <code class="pre">{!!
                            json_encode(
                                getJSON( route('api.notifications') )
                            , JSON_PRETTY_PRINT )
                        !!}</code>
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
