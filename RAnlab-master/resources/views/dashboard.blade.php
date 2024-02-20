@php
    use App\Models\Dashboard;
@endphp

<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

	<div class="dashboard_row">
    	<!-- Link to Reports -->
        <div class="dashboard_row_half dashboard_row_item">
        	<div class="dashboard_cta">
            	<div class="dashboard_cta_left">
                	<img src="/images/reports.svg">
                </div><!--DASHBOARD_CTA_LEFT-->
                <div class="dashboard_cta_right">
                	<div class="dashboard_cta_title">
                    	Get your custom report.
                    </div><!--DASHBOARD_CTA_TITLE-->
                    <div class="dashboard_cta_body">
                    	We've made a custom report for your region including projections and data summaries.
                    </div><!--DASHBOARD_CTA_BODY-->
                    <div class="dashboard_cta_btn_container">
                    	<button type="button" class="cta_button" onclick="window.location.href='/reports/FlowersCove_RAnLab_MNL_FactSheets_Combined_Report.pdf';">
                        	Download Now
                        </button>
                    </div><!--DASHBOARD_CTA_BTN_CONTAINER-->
                    <div class="dashboard_cta_more">
                    	Learn More
                    </div><!--DASHBOARD_CTA_MORE-->
                </div><!--DASHBOARD_CTA_RIGHT-->
            	<div class="clear"></div><!--CLEAR-->
            </div><!--DASHBOARD_CTA-->
        </div><!--DASHBOARD_ROW_HALF-->

        <!-- Link to Businesses -->
        <div class="dashboard_row_half dashboard_row_item">
        	<div class="dashboard_cta">
            	<div class="dashboard_cta_left">
                	<img src="/images/business.svg">
                </div><!--DASHBOARD_CTA_LEFT-->
                <div class="dashboard_cta_right">
                	<div class="dashboard_cta_title">
                    	Keep your businesses up-to-date.
                    </div><!--DASHBOARD_CTA_TITLE-->
                    <div class="dashboard_cta_body">
                    	Help us give you the most from your data by updating your region's businesses.
                    </div><!--DASHBOARD_CTA_BODY-->
                    <div class="dashboard_cta_btn_container">
                    	<button  type="button" class="cta_button" onclick="window.location.href='/business';">
                        	Update Now
                        </button>
                    </div><!--DASHBOARD_CTA_BTN_CONTAINER-->
                    <div class="dashboard_cta_more">
                    	Learn More
                    </div><!--DASHBOARD_CTA_MORE-->
                </div><!--DASHBOARD_CTA_RIGHT-->
            	<div class="clear"></div><!--CLEAR-->
            </div><!--DASHBOARD_CTA-->
       	</div><!--DASHBOARD_ROW_HALF-->

    	<div class="clear"></div><!--CLEAR-->
    </div><!--DASHBOARD_ROW-->


    {{-- /////////////////////////  This is the part that I am changing change the highlight from here //////////////////////////// --}}
	{{-- <div class="dashboard_row">
    	<!-- Population Change Chart -->
        <div class="dashboard_row_half dashboard_row_item">
        	{{ $popChart->container() }}
        </div><!--DASHBOARD_ROW_HALF-->

        <!-- Age Groups Chart -->
        <div class="dashboard_row_half dashboard_row_item">
        	{{ $ageChart->container() }}
        </div><!--DASHBOARD_ROW_HALF-->

    	<div class="clear"></div><!--CLEAR-->
    </div><!--DASHBOARD_ROW--> --}}


    {{-- <div class="dashboard_row">
    	<!-- Births and Deaths Chart -->
        <div class="dashboard_row_full dashboard_row_item">
        	{{ $birthChart->container() }}
        </div><!--DASHBOARD_ROW_FULL-->


    	<div class="clear"></div><!--CLEAR-->
    </div><!--DASHBOARD_ROW-->
    <script src="{!! $birthChart->cdn() !!}"></script>
    {{ $birthChart->script() }} --}}
    {{-- <script src="{!! $popChart->cdn() !!}"></script> --}}
    {{-- {{ $popChart->script() }} --}}
    {{-- {{ $ageChart->script() }} --}}
    
{{-- /////////////////////////  This is the part that I am changing end the highlight here  //////////////////////////// --}}


<!--DASHBOARD_ROW-->


@php
    $cities = $data->unique('CSDTxt')->pluck('CSDTxt')->sort();
@endphp
<div class="dashboard_row">
    <div class="dashboard_row_half dashboard_row_item">
        <form id="city-form" method="GET">
            @csrf
            <select id="city" name="city">
                <option value="" {{ $selectedCity ? '' : 'selected' }}>Select a city</option>
                @foreach($cities as $city)
                    <option value="{{ $city }}" {{ $selectedCity == $city ? 'selected' : '' }}>{{ $city }}</option>
                @endforeach
            </select>
        </form>

        @if($cityData)
            <div id="city-data">
                <h3 style="font: 800 40px monospace;">{{ $selectedCity }}</h3><br>
                <!-- Display city data here -->
                @foreach($cityData as $data)

                    {{-- <div class="container" style=" position: relative;">
                        <div class="counter" data-target="{{$data->Population_2021}}" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; border: 2px solid black; width: 150px; display: inline-block;"></div>
                        <div class="counter" data-target="{{$data->Population_2016}}" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; border: 2px solid black; width: 150px; display: inline-block; margin-right: 1rem;"></div>
                        <div class="counter" data-target="{{$data->Population_percentage_change_2016_to_2021}}" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; border: 2px solid black; width: 150px; display: inline-block;"></div>
                    </div> --}}
                    
                    
                    <table style="display: flex;
                    /* width: 80%; */
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    font-family: sans-serif;
                    background-color: #e0f2ff; /* Light blue background */
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
                        <tr>
                            <td>
                                <div class="counter" data-target="{{$data->Population_2021}}" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 150px; display: inline-block;"></div>
                            </td>
                            <td rowspan=4>
                                <div style="border: 2px solid black; align-items: center;">
                                    <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                                        <div class="counters" data-target="{{$data->Population_percentage_change_2016_to_2021}}" style="margin-right: 10px;"></div>
                                        <img class="arrow-icon" src="" alt="" style="width: 35px; height: auto;">
                                    </div>
                                    <div style="font: 800 20px monospace; text-align:center">
                                        Population <br>percentage change
                                    </div>
                                </div>
                                
                                
                            </td>
                            
                        </tr>
                        <tr>
                            <td colspan="1" style="font: 800 20px monospace;">
                                <p>Population in 2021</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="counter" data-target="{{$data->Population_2016}}" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 150px; display: inline-block; margin-right: 1rem;"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1" style="font: 800 20px monospace; align-items:inherit">
                                <p>Population in 2016</p>
                            </td>
                        </tr>
                        
                    </table>
                @endforeach
            </div>
        @endif
    </div>


    {{-- <div class="dashboard_row"> --}}
    	<!-- Births and Deaths Chart -->
    <div class="dashboard_row_half dashboard_row_item">

        {{-- <form id="city-form" method="GET">
            @csrf
            <select id="city" name="city">
                <option value="" {{ $selectedCity ? '' : 'selected' }}>Select a city</option>
                @foreach($cities as $city)
                    <option value="{{ $city }}" {{ $selectedCity == $city ? 'selected' : '' }}>{{ $city }}</option>
                @endforeach
            </select>
        </form> --}}

        @if($cityData)
            <div id="city-data">
                <h3 style="font: 800 40px monospace;">{{ $selectedCity }}</h3><br>
            {{ $birthChart->container() }}
        @endif
    </div><!--DASHBOARD_ROW_FULL-->


    <div class="clear"></div><!--CLEAR-->
    {{-- </div><!--DASHBOARD_ROW--> --}}
</div>

<div class="dashboard_row">
    <!-- Births and Deaths Chart -->
    <div class="dashboard_row_full dashboard_row_item">
        <b>Businesses in Newfoundland and Labrador</b>
        <div id="map"></div>
    </div><!--DASHBOARD_ROW_FULL-->


    <div class="clear"></div><!--CLEAR-->
</div>

<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" />
<script src="https://cdn.plot.ly/plotly-geo-assets/maps/basemap/open-street-map.json"></script>


@if($birthChart)
    <script src="{!! $birthChart->cdn() !!}"></script>
    {{ $birthChart->script() }}
@endif


<script>

/// -------------------- This part is for dropdown selection change and page reload -----------------------------
    document.getElementById('city').addEventListener('change', function() {
        document.getElementById('city-form').submit(); // Submit the form when a city is selected
    });

    // When the page loads, if a city is selected, hide the "Select a city" option
    window.addEventListener('DOMContentLoaded', function() {
        var selectedCity = "{{ $selectedCity }}";
        if (selectedCity) {
            var selectElement = document.getElementById('city');
            var selectOption = selectElement.querySelector('option[value=""]');
            if (selectOption) {
                selectOption.style.display = 'none';
            }
        }
    });
/// ------------------------  This part is for the counter change----------------------------------
    document.addEventListener("DOMContentLoaded", function() {
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
        counter.innerText = '0';
        const target = +counter.dataset.target;
        const duration = 2000; // Duration in milliseconds
    
        const updateCounter = () => {
        const increment = target / (duration / 10); // Increment value for each iteration
        const currentCount = +counter.innerText;
        
        if (currentCount < target) {
            counter.innerText = Math.ceil(currentCount + increment);
            setTimeout(updateCounter, 10); // Update every 10 milliseconds for smooth animation
        } else {
            counter.innerText = target; // Set final value
        }
        };
    
        updateCounter();
    });
    });

    document.addEventListener("DOMContentLoaded", function() {
    const counters = document.querySelectorAll('.counters');

    counters.forEach(counter => {
        counter.innerText = '0';
        const target = +counter.dataset.target;
        const container = counter.closest('.counter-container');
        const arrowIcon = container.querySelector('.arrow-icon');

        if (target < 0) {
            arrowIcon.src = "/images/down.svg";
        } else {
            arrowIcon.src = "/images/up.svg";
        }

        const duration = 2000; // Duration in milliseconds

        const updateCounter = () => {
            const increment = target / (duration / 10); // Increment value for each iteration
            const currentCount = +counter.innerText;
            
            if (currentCount < target) {
                counter.innerText = Math.ceil(currentCount + increment);
                setTimeout(updateCounter, 10); // Update every 10 milliseconds for smooth animation
            } else {
                counter.innerText = target; // Set final value
            }
        };

        updateCounter();
    });
});

/// ------------------------------- This part is for the map ----------------------------------------------

var phpData = {!! json_encode($businesses) !!};

// Parse PHP data into an array of objects
var data = phpData.map(function(row) {
    return {
        Municipality: row.name, // name represents BusinessName column
        LATITUDE: row.latitude, // 
        LONGITUDE: row.longitude // 
    };
});

// Layout Configuration
var layout = {
    autosize: true,
    hovermode: 'closest',
    mapbox: {
        style: 'open-street-map',
        center: {lat: 48, lon: -100},
        zoom: 3,
    },
    margin: {l: 0, r: 0, t: 0, b: 0},
};

// Create Plotly Express Map
Plotly.newPlot('map', [{
        type: 'scattermapbox',
        lat: [],
        lon: [],
        mode: 'markers',
        marker: {
            size: 6,
            color: 'rgb(0, 0, 255)',
        },
        text: [],
        hoverinfo: 'text'
    }], layout);

    // Animate zooming in to Newfoundland
    Plotly.animate('map', {
        layout: {
            'mapbox.zoom': 6, // Zoom level adjusted to focus on Newfoundland
            'mapbox.center.lon': -56,
            'mapbox.center.lat': 49
        }
    }, {
        transition: {
            duration: 2000, // Duration of animation in milliseconds
            easing: 'cubic-in-out' // Easing function for smooth animation
        }
    });

    // Update map with actual data after animation
    setTimeout(function() {
        updateMap(data);
    }, 2000); // Wait for animation to finish before updating map with actual data

    // Function to update the map with actual data
    function updateMap(data) {
        Plotly.restyle('map', 'lat', [data.map(d => parseFloat(d.LATITUDE))]);
        Plotly.restyle('map', 'lon', [data.map(d => parseFloat(d.LONGITUDE))]);
        Plotly.restyle('map', 'text', [data.map(d => d.Municipality)]);
    }
 
</script>
</x-app-layout>
