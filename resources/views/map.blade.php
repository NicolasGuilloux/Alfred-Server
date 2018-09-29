@extends('layout')

@section('content')
    <div class="container text-center my-5 pt-5">
        <h2>Map</h2>

        <div class="row justify-content-center text-center align-self-center">
            <div class="col-md-8 text-center mt-5">
                <p>
                    Here is a map to show the data. Please pick a date.
                </p>

                <p>
                    @include('partials.datepicker', [
                        'id' => 'dateMap',
                        'onSelect' => 'getData',
                        'availableDays' => getJSON( route('api.available.dates', '') )
                    ])
                </p>
            </div>
        </div>

        <div class="row justify-content-center text-center align-self-center">
            <div class="col-12 text-center mt-5">
                {!! file_get_contents( asset('images/maps/world.svg') ) !!}
            </div>
        </div>
    </div>

    <div id="infobox"></div>
@endsection

@section('scripts')
    @parent

    <script>
        var infobox = $('#infobox');
        var paths = $('svg path');
        var colors = ['#13a2bd', '#1e90a8', '#0d3841'];
        var colorIndex = 0;

        function getData(date) {
            $.getJSON('{!! route('api.date', '') !!}/' + date, function(data) {
                displayData(data);
            })
        }

        function displayData(data) {

            // Cleans everything
            if(!data) {
                console.log('No data for this day');
                for(var i=0; i<paths.length; i++) {
                    var path = paths[i];

                    $(path).removeAttr('electric');
                    $(path).removeAttr('waste');
                    $(path).removeAttr('water');
                    $(path).removeAttr('samples');
                    path.style = '';
                }

                return;
            }

            // Set the new values
            for(var i=0; i<paths.length; i++) {
                var path = paths[i];
                var country = $(path).attr('title');

                if(country) {

                    if(data[country]) {
                        $(path).attr('electric',    data[country]['electric']);
                        $(path).attr('waste',       data[country]['waste']);
                        $(path).attr('water',       data[country]['water']);
                        $(path).attr('samples',     data[country]['samples']);
                        path.style = 'fill: ' + colors[colorIndex];
                        colorIndex = (colorIndex +1) % (colors.length);

                    } else {
                        $(path).removeAttr('electric');
                        $(path).removeAttr('waste');
                        $(path).removeAttr('water');
                        $(path).removeAttr('samples');
                        path.style = '';
                    }
                }
            }
        }

        window.onmousemove = function (e) {
            var x = e.clientX,
                y = e.clientY;

            if( $(e.target).attr('samples') ) {
                infobox.show();
                infobox[0].style.top = (y + 20) + 'px';
                infobox[0].style.left = (x + 20) + 'px';

                infobox.html(
                    'Samples: '     + $(e.target).attr('samples')   + ' people<br />' +
                    'Eletricity: '  + $(e.target).attr('electric')  + ' kWh<br />' +
                    'Water: '       + $(e.target).attr('water')     + ' L<br />' +
                    'Waste: '       + $(e.target).attr('waste')     + ' kg'
                );

            } else {
                infobox.hide();
            }

        };
    </script>
@endsection
