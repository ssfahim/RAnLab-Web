<x-app-layout>
    <x-slot name="header">
        {{ __('Custom Dashboard') }}
    </x-slot>

    @php
        $cities = $data->unique('CSDTxt')->pluck('CSDTxt')->sort();
    @endphp
    <style>
        @font-face {
        font-family: 'Avenir';
        src: url('/fonts/Avenir.ttc') format('truetype');
        /* Add additional src definitions for other font file formats if available */
        }

        body {
            background-color: #f5f5f5;
            font-family: 'Avenir';
        }

        .navbar-green {
            background-color: #252;
            color: white;
            border: none;
            box-shadow: rgba(0, 0, 0, 0.156863) 0px 3px 6px 0px, rgba(0, 0, 0, 0.227451) 0px 3px 6px 0px;
        }

        .navbar-green .navbar-toggle .icon-bar {
            background-color: white;
        }

        .navbar-green a {
            color: white;
        }

        .navbar-green a:hover,
        .nav>li>a:focus, .nav>li>a:hover,
        .navbar-green li.active {
            background-color: #474 !important;
        }

        #brand:hover {
            background-color: #252 !important;
        }

        #pyramid {
            width: 1500px;
            height: 600px;
            /* margin-left: auto;
            margin-right: auto; */
            /* max-width: 100%; */
        }

        .newSection {
            padding-top: 70px;
        }

        .bodyContainer {
            background-color: #fff;
            border-left: 1px lightgray solid;
            border-right: 1px lightgray solid;
            margin-top: -25px;
        }

        .headerSection {
            background-color: #7b7;
            padding-bottom: 40px;
            padding-top: 100px;
        }
        .headerSection h1 {
            color: #050;
            text-shadow: 2px 2px 2px #5a5;
        }
        .headerSection h2 {
            color: #dfd;
            font-size: 24px;
        }

        .mainTitle {
            font-size: 80px;
            font-weight: light;
        }

        .footer {
            height: 50px;
        }

        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 100; /* Ensure popup is above overlay */
            display: none; /* Hidden by default */
            max-width: 80%; /* Set maximum width */
            width: 500px; /* Set default width */
        }
        .modal-header {
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid black;
        }

        .modal-header .title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .modal-header .close-button {
            cursor: pointer;
            border: none;
            outline: none;
            background: none;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .modal-body {
            padding: 10px 15px;
        }

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 99;
        }

        @media print{
            body * {
                visibility: hidden;
            }
            .print-container, .print-container * {
                visibility: visible;
            }
        }
    </style>

    {{-- Population Change --}}
    <div class="dashboard_row print-container"  id="demography" style=" font-family: 'Avenir';">
        <div class="print-container">
            {{-- City Population Data --}}
            <div class="dashboard_row_half dashboard_row_item">
                {{-- Population Info --}}
                @if($cityData)
                    <div id="city-data">
                        <h3 style="font: 800 40px monospace; font-family: 'Avenir';">Population Change in {{$UserCity}}</h3><br>
                        <div style="font-family: 'Avenir'; background-color: #e0f2ff;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
                            <table style="display: flex;
                                /* width: 80%; */
                                margin-left: 15px;
                                flex-direction: column;
                                align-items: left;
                                font-family: 'Avenir';
                                justify-content: center;
                                font-family: sans-serif;">
                                <tr>
                                    <td>
                                        <div class="counter" data-target="{{$UserPopulation_2021}}" style="font-family: 'Avenir'; font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 150px; display: inline-block;"></div>
                                    </td>
                                    {{-- <td rowspan=4>
                                        <div style="border: 2px solid black; ">
                                            <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                                                <div class="counters" data-target="{{$Population_percentage_change_2016_to_2021}}" style="margin-right: 10px;"></div>
                                                <img class="arrow-icon" src="" alt="" style="width: 35px; height: auto;">
                                            </div>
                                            <div style="font: 800 20px monospace; text-align:left; font-family: 'Avenir';">
                                                Population <br>percentage change
                                            </div>
                                        </div>
                                    </td> --}}
                                </tr>
                                <tr>
                                    <td colspan="1" style="font: 800 20px monospace; font-family: 'Avenir'">
                                        <p>Total Population, 2021</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="counter" data-target="{{$UserPopulation_2016}}" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 150px; display: inline-block; margin-right: 1rem;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" style="font: 800 20px monospace; align-items:inherit; font-family: 'Avenir'">
                                        <p>Total Population, 2016</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                                                <div class="counters" data-target="{{$UserPopulation_percentage_change_2016_to_2021}}" style="margin-right: 10px;"></div>
                                                <img class="arrow-icon" src="" alt="" style="width: 35px; height: auto;">
                                            </div>
                                        </div>
                                        
                                        {{-- <div class="counter" data-target="{{$Population_percentage_change_2016_to_2021}}" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 150px; display: inline-block; margin-right: 1rem;"></div> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" style="font: 800 20px monospace; align-items:inherit;font-family: 'Avenir'">
                                        <p style="text-align: center;
                                        ">Total Population Change</p>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                        <!-- Display city data here -->
                        
                    </div>
                @endif
                <button onclick="showPopup()" style="float:left; margin-top: 10px;"><img src="/images/help.svg" alt="" style="width: 35px; height: auto;"></button>

                <div class="popup" id="popup">
                    <div class="modal-header">
                        <div class="title">Example Modal</div>
                    </div>
                    <div class="modal-body">

                        @php
                            $output = shell_exec('python3 ' . storage_path('app.py'));
                            echo $output;
                        @endphp

                        {{-- https://github.com/ssfahim/pyfiles/blob/main/app.py --}}
                        <!-- Laravel Blade Template -->
                        {{-- <iframe src="https://github.com/ssfahim/pyfiles/blob/main/app.py" width="100%" height="600px"></iframe> --}}

                        <div class="flourish-embed flourish-hierarchy" data-src="visualisation/15588597"><script src="https://public.flourish.studio/resources/embed.js"></script></div>            
                    </div>
                    <x-nav-link :href="route('demography.index')">
                        <i><u>{{ __('See All Details') }}</u></i>
                    </x-nav-link>
                    <br>
                    <i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>    
                    <br>
                    <button onclick="hidePopup()" style="border: 1px solid black; background-color: lightgray;  display: block; margin: 0 auto; height:30px; width:50px;">Close</button>
                </div>
                <div id="overlay"></div>
            </div>
            {{-- City Population Data --}}
            <div class="dashboard_row_half dashboard_row_item">
                {{-- Population Info --}}
                @if($cityData)
                    <div id="city-data">
                        <h3 style="font: 800 40px monospace; font-family: 'Avenir';">Population Change in {{$City}}</h3><br>
                        <div style="font-family: 'Avenir'; background-color: #e0f2ff;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
                            <table style="display: flex;
                                /* width: 80%; */
                                margin-left: 15px;
                                flex-direction: column;
                                align-items: left;
                                font-family: 'Avenir';
                                justify-content: center;
                                font-family: sans-serif;">
                                <tr>
                                    <td>
                                        <div class="counter" data-target="{{$Population_2021}}" style="font-family: 'Avenir'; font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 150px; display: inline-block;"></div>
                                    </td>
                                    {{-- <td rowspan=4>
                                        <div style="border: 2px solid black; ">
                                            <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                                                <div class="counters" data-target="{{$Population_percentage_change_2016_to_2021}}" style="margin-right: 10px;"></div>
                                                <img class="arrow-icon" src="" alt="" style="width: 35px; height: auto;">
                                            </div>
                                            <div style="font: 800 20px monospace; text-align:left; font-family: 'Avenir';">
                                                Population <br>percentage change
                                            </div>
                                        </div>
                                    </td> --}}
                                </tr>
                                <tr>
                                    <td colspan="1" style="font: 800 20px monospace; font-family: 'Avenir'">
                                        <p>Total Population, 2021</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="counter" data-target="{{$Population_2016}}" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 150px; display: inline-block; margin-right: 1rem;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" style="font: 800 20px monospace; align-items:inherit; font-family: 'Avenir'">
                                        <p>Total Population, 2016</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                                                <div class="counters" data-target="{{$Population_percentage_change_2016_to_2021}}" style="margin-right: 10px;"></div>
                                                <img class="arrow-icon" src="" alt="" style="width: 35px; height: auto;">
                                            </div>
                                        </div>
                                        
                                        {{-- <div class="counter" data-target="{{$Population_percentage_change_2016_to_2021}}" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 150px; display: inline-block; margin-right: 1rem;"></div> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" style="font: 800 20px monospace; align-items:inherit;font-family: 'Avenir'">
                                        <p style="text-align: center;
                                        ">Total Population Change</p>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                        <!-- Display city data here -->
                        
                    </div>
                @endif
                <button onclick="showPopup()" style="float:left; margin-top: 10px;"><img src="/images/help.svg" alt="" style="width: 35px; height: auto;"></button>

                <div class="popup" id="popup">
                    <div class="modal-header">
                        <div class="title">Example Modal</div>
                    </div>
                    <div class="modal-body">

                        @php
                            $output = shell_exec('python3 ' . storage_path('app.py'));
                            echo $output;
                        @endphp

                        {{-- https://github.com/ssfahim/pyfiles/blob/main/app.py --}}
                        <!-- Laravel Blade Template -->
                        {{-- <iframe src="https://github.com/ssfahim/pyfiles/blob/main/app.py" width="100%" height="600px"></iframe> --}}

                        <div class="flourish-embed flourish-hierarchy" data-src="visualisation/15588597"><script src="https://public.flourish.studio/resources/embed.js"></script></div>            
                    </div>
                    <x-nav-link :href="route('demography.index')">
                        <i><u>{{ __('See All Details') }}</u></i>
                    </x-nav-link>
                    <br>
                    <i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>    
                    <br>
                    <button onclick="hidePopup()" style="border: 1px solid black; background-color: lightgray;  display: block; margin: 0 auto; height:30px; width:50px;">Close</button>
                </div>
                <div id="overlay"></div>
            </div>
        </div>
        <div class="clear"></div><!--CLEAR-->
    </div>


    {{-- Age Characteristics --}}
    <div class="dashboard_row print-container">
        {{--User Age Characteristics --}}
        <div class="dashboard_row_half dashboard_row_item">
            <h3 style="font: 800 30px monospace; font-family: 'Avenir';">Age Characteristics in {{$UserCity}}</h3><br>
            <div style="display: flex;
                /* width: 80%; */
                /* height: auto; */
                flex-direction: column;
                align-items: left;
                justify-content: center;
                font-family: sans-serif;
                background-color: #e0f2ff; /* Light blue background */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
                margin-bottom: 5px;">
                {{ $UserAgeCharacterChart->container() }}
                
                {{-- {{ $AgeCharacterChart->script() }} --}}
            </div>
            <div class="links" id="links">
                <x-nav-link :href="route('demography.index')">
                    <i><u>{{ __('See All Details') }}</u></i>
                </x-nav-link>
                <br><i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>    
            </div>
        </div>
        
        {{-- Age Characteristics --}}
        <div class="dashboard_row_half dashboard_row_item">
            <h3 style="font: 800 30px monospace; font-family: 'Avenir';">Age Characteristics in {{$City}}</h3><br>
            <div style="display: flex;
                /* width: 80%; */
                /* height: auto; */
                flex-direction: column;
                align-items: left;
                justify-content: center;
                font-family: sans-serif;
                background-color: #e0f2ff; /* Light blue background */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
                margin-bottom: 5px;">
                {{ $AgeCharacterChart->container() }}
                
                {{-- {{ $AgeCharacterChart->script() }} --}}
            </div>
            <div class="links" id="links">
                <x-nav-link :href="route('demography.index')">
                    <i><u>{{ __('See All Details') }}</u></i>
                </x-nav-link>
                <br><i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>    
            </div>
        </div>
        <div class="clear"></div><!--CLEAR-->

    </div>

    {{-- Population Pyramid --}}
    <div class="dashboard_row print-container" style="margin-top: 15px;" id="populationPyramid">
        
        {{-- User Population Pyramid --}}
        <div class="dashboard_row_full dashboard_row_item">
            <h3 style="font: 800 30px monospace; font-family: 'Avenir';">Population Structure in {{$UserCity}}</h3><br>
            <div id="chartDiv" class="container"></div>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            <script src="https://d3js.org/d3.v4.min.js"></script>
            {{-- <script src="https://github.com/doylek/D3-Population-Pyramid/blob/master/popPyramid.js" ></script> --}}
            <div style="display: flex;
                /* width: 80%; */
                /* height: auto; */
                flex-direction: column;
                align-items: left;
                justify-content: center;
                font-family: sans-serif;
                background-color: #e0f2ff; /* Light blue background */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
                margin-bottom: 5px;">
                <style>
                    .axis.y.left .domain {
                        display: none; /* Hide the vertical line */
                    }
                </style>
                <div id="pyramid" style="
                    margin-left: auto;
                    margin-right: auto;
                    max-width: 100%;
                    max-height: 100%;
                    aligh-item: center;">
                </div>
            </div>
            
            
            <script>
                // data must be in a format with age, male, and female in each object
                var ageGroups = [
                    @foreach($UserRegionData as $data)
                        "{{$data->Age_groups}}",
                    @endforeach
                ];

                var menData = [
                    @foreach($UserRegionData as $data)
                        {{$data->Men}},
                    @endforeach
                ];

                var womenData = [
                    @foreach($UserRegionData as $data)
                        {{$data->Women}},
                    @endforeach
                ];

                var exampleData = [];
                for (var i = 0; i < ageGroups.length; i++) {
                    exampleData.push({
                        age: ageGroups[i],
                        male: menData[i],
                        female: womenData[i]
                    });
                }

                var options = {
                    height: 600,
                    width: 800,
                    style: {
                        leftBarColor: "#307FE2", // Color for male data
                        rightBarColor: "#DD5665" // Color for female data
                    }
                };

                pyramidBuilder(exampleData, '#pyramid', options);

                function pyramidBuilder(data, target, options) {
                    var w = typeof options.width === 'undefined' ? 400  : options.width,
                        h = typeof options.height === 'undefined' ? 400  : options.height,
                        w_full = w,
                        h_full = h;

                    if (w > $( window ).width()) {
                    w = $( window ).width();
                    }

                    var margin = {
                            top: 50,
                            right: 10,
                            bottom: 20,
                            left: 10,
                            middle: 20
                        },
                        sectorWidth = (w / 2) - margin.middle,
                        leftBegin = sectorWidth - margin.left,
                        rightBegin = w - margin.right - sectorWidth;

                    w = (w- (margin.left + margin.right) );
                    h = (h - (margin.top + margin.bottom));

                    if (typeof options.style === 'undefined') {
                    var style = {
                        leftBarColor: '#6c9dc6',
                        rightBarColor: '#de5454',
                        tooltipBG: '#fefefe',
                        tooltipColor: 'black'
                    };
                    } else {
                    var style = {
                        leftBarColor: typeof options.style.leftBarColor === 'undefined'  ? '#6c9dc6' : options.style.leftBarColor,
                        rightBarColor: typeof options.style.rightBarColor === 'undefined' ? '#de5454' : options.style.rightBarColor,
                        tooltipBG: typeof options.style.tooltipBG === 'undefined' ? '#fefefe' : options.style.tooltipBG,
                        tooltipColor: typeof options.style.tooltipColor === 'undefined' ? 'black' : options.style.tooltipColor
                    };
                    }

                    var totalPopulation = d3.sum(data, function(d) {
                            return d.male + d.female;
                        }),
                        percentage = function(d) {
                            return d / totalPopulation;
                        };

                    var styleSection = d3.select(target).append('style')
                    .text('svg {max-width:100%} \
                    .axis line,axis path {shape-rendering: crispEdges;fill: transparent;stroke: #555;} \
                    .axis text {font-size: 11px;} \
                    .bar {fill-opacity: 0.9;} \
                    .bar.left {fill: ' + style.leftBarColor + ';} \
                    .bar.left:hover {fill: ' + colorTransform(style.leftBarColor, '333333') + ';} \
                    .bar.right {fill: ' + style.rightBarColor + ';} \
                    .bar.right:hover {fill: ' + colorTransform(style.rightBarColor, '333333') + ';} \
                    .tooltip {position: absolute;line-height: 1.1em;padding: 7px; margin: 3px;background: ' + style.tooltipBG + '; color: ' + style.tooltipColor + '; pointer-events: none;border-radius: 6px;}')

                    var region = d3.select(target).append('svg')
                        .attr('width', w_full)
                        .attr('height', h_full);


                    var legend = region.append('g')
                        .attr('class', 'legend');

                        // TODO: fix these margin calculations -- consider margin.middle == 0 -- what calculations for padding would be necessary?
                    legend.append('rect')
                        .attr('class', 'bar left')
                        .attr('x', 420)
                        .attr('y', 12)
                        .attr('width', 12)
                        .attr('height', 12);

                    legend.append('text')
                        .attr('fill', '#000')
                        .attr('x', 440)
                        .attr('y', 18)
                        .attr('dy', '0.32em')
                        .text('Men');

                    legend.append('rect')
                        .attr('class', 'bar right')
                        .attr('x', 490)
                        .attr('y', 12)
                        .attr('width', 12)
                        .attr('height', 12);

                    legend.append('text')
                        .attr('fill', '#000')
                        .attr('x', 510)
                        .attr('y', 18)
                        .attr('dy', '0.32em')
                        .text('Women');

                    var tooltipDiv = d3.select("body").append("div")
                        .attr("class", "tooltip")
                        .style("opacity", 0);

                    var pyramid = region.append('g')
                        .attr('class', 'inner-region')
                        .attr('transform', translation(margin.left, margin.top));

                    // find the maximum data value for whole dataset
                    // and rounds up to nearest 5%
                    //  since this will be shared by both of the x-axes
                    var maxValue = Math.ceil(Math.max(
                        d3.max(data, function(d) {
                            return percentage(d.male);
                        }),
                        d3.max(data, function(d) {
                            return percentage(d.female);
                        })
                    )/0.05)*0.05;

                    // SET UP SCALES

                    // the xScale goes from 0 to the width of a region
                    //  it will be reversed for the left x-axis
                    var xScale = d3.scaleLinear()
                        .domain([0, maxValue])
                        .range([0, (sectorWidth-margin.middle)])
                        .nice();

                    var xScaleLeft = d3.scaleLinear()
                        .domain([0, maxValue])
                        .range([sectorWidth, 0]);

                    var xScaleRight = d3.scaleLinear()
                        .domain([0, maxValue])
                        .range([0, sectorWidth]);

                    var yScale = d3.scaleBand()
                        .domain(data.map(function(d) {
                            return d.age;
                        }))
                        .range([h, 0], 0.1);


                    // SET UP AXES
                    var yAxisLeft = d3.axisRight()
                        .scale(yScale)
                        .tickSize(4, 0)
                        .tickPadding(margin.middle - 4);

                    var yAxisRight = d3.axisLeft()
                        .scale(yScale)
                        .tickSize(4, 0)
                        .tickFormat('');

                    var xAxisRight = d3.axisBottom()
                        .scale(xScale)
                        .tickFormat(d3.format('.0%'));

                    var xAxisLeft = d3.axisBottom()
                        // REVERSE THE X-AXIS SCALE ON THE LEFT SIDE BY REVERSING THE RANGE
                        .scale(xScale.copy().range([leftBegin, 0]))
                        .tickFormat(d3.format('.0%'));

                    // MAKE GROUPS FOR EACH SIDE OF CHART
                    // scale(-1,1) is used to reverse the left side so the bars grow left instead of right
                    var leftBarGroup = pyramid.append('g')
                        .attr('transform', translation(460, 0) + 'scale(-1,1)');
                    var rightBarGroup = pyramid.append('g')
                        // .attr('transform', translation(rightBegin, 0));
                        .attr('transform', translation(480, 0));

                    // DRAW AXES
                    pyramid.append('g')
                        .attr('class', 'axis y left')
                        .attr('transform', translation(20, 0))
                        .call(yAxisLeft)
                        .selectAll('text')
                        .style('text-anchor', 'middle');

                    pyramid.append('g')
                        .attr('class', 'axis y right')
                        .attr('transform', translation(89, 0))
                        .call(yAxisRight);

                    pyramid.append('g')
                        .attr('class', 'axis x left')
                        .attr('transform', translation(89, h))
                        .call(xAxisLeft);

                    pyramid.append('g')
                        .attr('class', 'axis x right')
                        .attr('transform', translation(480, h))
                        .call(xAxisRight);

                    // DRAW BARS
                    leftBarGroup.selectAll('.bar.left')
                        .data(data)
                        .enter().append('rect')
                        .attr('class', 'bar left')
                        .attr('x', 0)
                        .attr('y', function(d) {
                            return yScale(d.age) + margin.middle / 4;
                        })
                        .attr('width', function(d) {
                            return xScale(percentage(d.male));
                        })
                        .attr('height', (yScale.range()[0] / data.length) - margin.middle / 2)
                        .on("mouseover", function(d) {
                            tooltipDiv.transition()
                                .duration(200)
                                .style("opacity", 0.9);
                            tooltipDiv.html("<strong>Men Age " + d.age + "</strong>" +
                                    "<br />  Population: " + prettyFormat(d.male) +
                                    "<br />" + (Math.round(percentage(d.male) * 1000) / 10) + "% of Total Population")
                                .style("left", (d3.event.pageX) + "px")
                                .style("top", (d3.event.pageY - 28) + "px");
                        })
                        .on("mouseout", function(d) {
                            tooltipDiv.transition()
                                .duration(500)
                                .style("opacity", 0);
                        });

                    rightBarGroup.selectAll('.bar.right')
                        .data(data)
                        .enter().append('rect')
                        .attr('class', 'bar right')
                        .attr('x', 0)
                        .attr('y', function(d) {
                            return yScale(d.age) + margin.middle / 4;
                        })
                        .attr('width', function(d) {
                            return xScale(percentage(d.female));
                        })
                        .attr('height', (yScale.range()[0] / data.length) - margin.middle / 2)
                        .on("mouseover", function(d) {
                            tooltipDiv.transition()
                                .duration(200)
                                .style("opacity", 0.9);
                            tooltipDiv.html("<strong> Women Age " + d.age + "</strong>" +
                                    "<br />  Population: " + prettyFormat(d.female) +
                                    "<br />" + (Math.round(percentage(d.female) * 1000) / 10) + "% of Total Population")
                                .style("left", (d3.event.pageX) + "px")
                                .style("top", (d3.event.pageY - 28) + "px");
                        })
                        .on("mouseout", function(d) {
                            tooltipDiv.transition()
                                .duration(500)
                                .style("opacity", 0);
                        });

                    /* HELPER FUNCTIONS */

                    // string concat for translate
                    function translation(x, y) {
                        return 'translate(' + x + ',' + y + ')';
                    }

                    // numbers with commas
                    function prettyFormat(x) {
                        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }

                    // lighten colors
                    function colorTransform(c1, c2) {
                        var c1 = c1.replace('#','')
                            origHex = {
                                r: c1.substring(0, 2),
                                g: c1.substring(2, 4),
                                b: c1.substring(4, 6)
                            },
                            transVec = {
                                r: c2.substring(0, 2),
                                g: c2.substring(2, 4),
                                b: c2.substring(4, 6)
                            },
                            newHex = {};

                        function transform(d, e) {
                            var f = parseInt(d, 16) + parseInt(e, 16);
                            if (f > 255) {
                                f = 255;
                            }
                            return f.toString(16);
                        }
                        newHex.r = transform(origHex.r, transVec.r);
                        newHex.g = transform(origHex.g, transVec.g);
                        newHex.b = transform(origHex.b, transVec.b);
                        return '#' + newHex.r + newHex.g + newHex.b;
                    }

                }


            </script>
        </div><!--DASHBOARD_ROW_FULL-->
        <div class="clear"></div><!--CLEAR-->

        {{-- Population Pyramid --}}
        <div class="dashboard_row_full dashboard_row_item">
            <h3 style="font: 800 30px monospace; font-family: 'Avenir';">Population Structure in {{$City}}</h3><br>
            <div id="chartDiv" class="container"></div>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            <script src="https://d3js.org/d3.v4.min.js"></script>
            {{-- <script src="https://github.com/doylek/D3-Population-Pyramid/blob/master/popPyramid.js" ></script> --}}
            <div style="display: flex;
                /* width: 80%; */
                /* height: auto; */
                flex-direction: column;
                align-items: left;
                justify-content: left;
                font-family: sans-serif;
                background-color: #e0f2ff; /* Light blue background */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
                margin-bottom: 5px;">
                <style>
                    .axis.y.left .domain {
                        display: none; /* Hide the vertical line */
                    }
                </style>
                <div id="pyramids" style="
                    margin-left: auto;
                    margin-right: auto;
                    max-width: 100%;
                    max-height: 100%;
                    aligh-item: center;">
                </div>
            </div>
            
            
            <script>
                // data must be in a format with age, male, and female in each object
                var ageGroups = [
                    @foreach($regionData as $data)
                        "{{$data->Age_groups}}",
                    @endforeach
                ];

                var menData = [
                    @foreach($regionData as $data)
                        {{$data->Men}},
                    @endforeach
                ];

                var womenData = [
                    @foreach($regionData as $data)
                        {{$data->Women}},
                    @endforeach
                ];

                var exampleData = [];
                for (var i = 0; i < ageGroups.length; i++) {
                    exampleData.push({
                        age: ageGroups[i],
                        male: menData[i],
                        female: womenData[i]
                    });
                }

                var options = {
                    height: 600,
                    width: 800,
                    style: {
                        leftBarColor: "#307FE2", // Color for male data
                        rightBarColor: "#DD5665" // Color for female data
                    }
                };

                pyramidBuilder(exampleData, '#pyramids', options);

                function pyramidBuilder(data, target, options) {
                    var w = typeof options.width === 'undefined' ? 400  : options.width,
                        h = typeof options.height === 'undefined' ? 400  : options.height,
                        w_full = w,
                        h_full = h;

                    if (w > $( window ).width()) {
                    w = $( window ).width();
                    }

                    var margin = {
                            top: 50,
                            right: 10,
                            bottom: 20,
                            left: 10,
                            middle: 20
                        },
                        sectorWidth = (w / 2) - margin.middle,
                        leftBegin = sectorWidth - margin.left,
                        rightBegin = w - margin.right - sectorWidth;

                    w = (w- (margin.left + margin.right) );
                    h = (h - (margin.top + margin.bottom));

                    if (typeof options.style === 'undefined') {
                    var style = {
                        leftBarColor: '#6c9dc6',
                        rightBarColor: '#de5454',
                        tooltipBG: '#fefefe',
                        tooltipColor: 'black'
                    };
                    } else {
                    var style = {
                        leftBarColor: typeof options.style.leftBarColor === 'undefined'  ? '#6c9dc6' : options.style.leftBarColor,
                        rightBarColor: typeof options.style.rightBarColor === 'undefined' ? '#de5454' : options.style.rightBarColor,
                        tooltipBG: typeof options.style.tooltipBG === 'undefined' ? '#fefefe' : options.style.tooltipBG,
                        tooltipColor: typeof options.style.tooltipColor === 'undefined' ? 'black' : options.style.tooltipColor
                    };
                    }

                    var totalPopulation = d3.sum(data, function(d) {
                            return d.male + d.female;
                        }),
                        percentage = function(d) {
                            return d / totalPopulation;
                        };

                    var styleSection = d3.select(target).append('style')
                    .text('svg {max-width:100%} \
                    .axis line,axis path {shape-rendering: crispEdges;fill: transparent;stroke: #555;} \
                    .axis text {font-size: 11px;} \
                    .bar {fill-opacity: 0.9;} \
                    .bar.left {fill: ' + style.leftBarColor + ';} \
                    .bar.left:hover {fill: ' + colorTransform(style.leftBarColor, '333333') + ';} \
                    .bar.right {fill: ' + style.rightBarColor + ';} \
                    .bar.right:hover {fill: ' + colorTransform(style.rightBarColor, '333333') + ';} \
                    .tooltip {position: absolute;line-height: 1.1em;padding: 7px; margin: 3px;background: ' + style.tooltipBG + '; color: ' + style.tooltipColor + '; pointer-events: none;border-radius: 6px;}')

                    var region = d3.select(target).append('svg')
                        .attr('width', w_full)
                        .attr('height', h_full);


                    var legend = region.append('g')
                        .attr('class', 'legend');

                        // TODO: fix these margin calculations -- consider margin.middle == 0 -- what calculations for padding would be necessary?
                    legend.append('rect')
                        .attr('class', 'bar left')
                        .attr('x', 420)
                        .attr('y', 12)
                        .attr('width', 12)
                        .attr('height', 12);

                    legend.append('text')
                        .attr('fill', '#000')
                        .attr('x', 440)
                        .attr('y', 18)
                        .attr('dy', '0.32em')
                        .text('Men');

                    legend.append('rect')
                        .attr('class', 'bar right')
                        .attr('x', 490)
                        .attr('y', 12)
                        .attr('width', 12)
                        .attr('height', 12);

                    legend.append('text')
                        .attr('fill', '#000')
                        .attr('x', 510)
                        .attr('y', 18)
                        .attr('dy', '0.32em')
                        .text('Women');

                    var tooltipDiv = d3.select("body").append("div")
                        .attr("class", "tooltip")
                        .style("opacity", 0);

                    var pyramid = region.append('g')
                        .attr('class', 'inner-region')
                        .attr('transform', translation(margin.left, margin.top));

                    // find the maximum data value for whole dataset
                    // and rounds up to nearest 5%
                    //  since this will be shared by both of the x-axes
                    var maxValue = Math.ceil(Math.max(
                        d3.max(data, function(d) {
                            return percentage(d.male);
                        }),
                        d3.max(data, function(d) {
                            return percentage(d.female);
                        })
                    )/0.05)*0.05;

                    // SET UP SCALES

                    // the xScale goes from 0 to the width of a region
                    //  it will be reversed for the left x-axis
                    var xScale = d3.scaleLinear()
                        .domain([0, maxValue])
                        .range([0, (sectorWidth-margin.middle)])
                        .nice();

                    var xScaleLeft = d3.scaleLinear()
                        .domain([0, maxValue])
                        .range([sectorWidth, 0]);

                    var xScaleRight = d3.scaleLinear()
                        .domain([0, maxValue])
                        .range([0, sectorWidth]);

                    var yScale = d3.scaleBand()
                        .domain(data.map(function(d) {
                            return d.age;
                        }))
                        .range([h, 0], 0.1);


                    // SET UP AXES
                    var yAxisLeft = d3.axisRight()
                        .scale(yScale)
                        .tickSize(4, 0)
                        .tickPadding(margin.middle - 4);

                    var yAxisRight = d3.axisLeft()
                        .scale(yScale)
                        .tickSize(4, 0)
                        .tickFormat('');

                    var xAxisRight = d3.axisBottom()
                        .scale(xScale)
                        .tickFormat(d3.format('.0%'));

                    var xAxisLeft = d3.axisBottom()
                        // REVERSE THE X-AXIS SCALE ON THE LEFT SIDE BY REVERSING THE RANGE
                        .scale(xScale.copy().range([leftBegin, 0]))
                        .tickFormat(d3.format('.0%'));

                    // MAKE GROUPS FOR EACH SIDE OF CHART
                    // scale(-1,1) is used to reverse the left side so the bars grow left instead of right
                    var leftBarGroup = pyramid.append('g')
                        .attr('transform', translation(460, 0) + 'scale(-1,1)');
                    var rightBarGroup = pyramid.append('g')
                        // .attr('transform', translation(rightBegin, 0));
                        .attr('transform', translation(480, 0));

                    // DRAW AXES
                    pyramid.append('g')
                        .attr('class', 'axis y left')
                        .attr('transform', translation(20, 0))
                        .call(yAxisLeft)
                        .selectAll('text')
                        .style('text-anchor', 'middle');

                    pyramid.append('g')
                        .attr('class', 'axis y right')
                        .attr('transform', translation(89, 0))
                        .call(yAxisRight);

                    pyramid.append('g')
                        .attr('class', 'axis x left')
                        .attr('transform', translation(89, h))
                        .call(xAxisLeft);

                    pyramid.append('g')
                        .attr('class', 'axis x right')
                        .attr('transform', translation(480, h))
                        .call(xAxisRight);

                    // DRAW BARS
                    leftBarGroup.selectAll('.bar.left')
                        .data(data)
                        .enter().append('rect')
                        .attr('class', 'bar left')
                        .attr('x', 0)
                        .attr('y', function(d) {
                            return yScale(d.age) + margin.middle / 4;
                        })
                        .attr('width', function(d) {
                            return xScale(percentage(d.male));
                        })
                        .attr('height', (yScale.range()[0] / data.length) - margin.middle / 2)
                        .on("mouseover", function(d) {
                            tooltipDiv.transition()
                                .duration(200)
                                .style("opacity", 0.9);
                            tooltipDiv.html("<strong>Men Age " + d.age + "</strong>" +
                                    "<br />  Population: " + prettyFormat(d.male) +
                                    "<br />" + (Math.round(percentage(d.male) * 1000) / 10) + "% of Total Population")
                                .style("left", (d3.event.pageX) + "px")
                                .style("top", (d3.event.pageY - 28) + "px");
                        })
                        .on("mouseout", function(d) {
                            tooltipDiv.transition()
                                .duration(500)
                                .style("opacity", 0);
                        });

                    rightBarGroup.selectAll('.bar.right')
                        .data(data)
                        .enter().append('rect')
                        .attr('class', 'bar right')
                        .attr('x', 0)
                        .attr('y', function(d) {
                            return yScale(d.age) + margin.middle / 4;
                        })
                        .attr('width', function(d) {
                            return xScale(percentage(d.female));
                        })
                        .attr('height', (yScale.range()[0] / data.length) - margin.middle / 2)
                        .on("mouseover", function(d) {
                            tooltipDiv.transition()
                                .duration(200)
                                .style("opacity", 0.9);
                            tooltipDiv.html("<strong> Women Age " + d.age + "</strong>" +
                                    "<br />  Population: " + prettyFormat(d.female) +
                                    "<br />" + (Math.round(percentage(d.female) * 1000) / 10) + "% of Total Population")
                                .style("left", (d3.event.pageX) + "px")
                                .style("top", (d3.event.pageY - 28) + "px");
                        })
                        .on("mouseout", function(d) {
                            tooltipDiv.transition()
                                .duration(500)
                                .style("opacity", 0);
                        });

                    /* HELPER FUNCTIONS */

                    // string concat for translate
                    function translation(x, y) {
                        return 'translate(' + x + ',' + y + ')';
                    }

                    // numbers with commas
                    function prettyFormat(x) {
                        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }

                    // lighten colors
                    function colorTransform(c1, c2) {
                        var c1 = c1.replace('#','')
                            origHex = {
                                r: c1.substring(0, 2),
                                g: c1.substring(2, 4),
                                b: c1.substring(4, 6)
                            },
                            transVec = {
                                r: c2.substring(0, 2),
                                g: c2.substring(2, 4),
                                b: c2.substring(4, 6)
                            },
                            newHex = {};

                        function transform(d, e) {
                            var f = parseInt(d, 16) + parseInt(e, 16);
                            if (f > 255) {
                                f = 255;
                            }
                            return f.toString(16);
                        }
                        newHex.r = transform(origHex.r, transVec.r);
                        newHex.g = transform(origHex.g, transVec.g);
                        newHex.b = transform(origHex.b, transVec.b);
                        return '#' + newHex.r + newHex.g + newHex.b;
                    }

                }


            </script>
        </div><!--DASHBOARD_ROW_FULL-->
        <div class="clear"></div><!--CLEAR-->
    </div>

    {{-- Housing Changes--}}
    <div class="dashboard_row print-container"  id="housing">
        {{--User House Dwellings --}}
        <div class="dashboard_row_half dashboard_row_item">
            <h3 style="font: 800 30px monospace; font-family: 'Avenir';">Households and Dwellings in {{$UserCity}}</h3><br>
            <div style="display: flex;
            /* width: 80%; */
            /* height: auto; */
            flex-direction: column;
            align-items: left;
            justify-content: center;
            font-family: sans-serif;
            background-color: #e0f2ff; /* Light blue background */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); ">
            
                <table style="margin-left: 15px;">
                    <tr>
                        <td>
                            <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                                <div class="counter" data-target="{{$UserPrivate_dwellings_occupied_by_usual_residents}}" style="margin-right: 10px;"></div>
                            </div>
                            <div style="font: 800 20px monospace; text-align:left; font-family: 'Avenir';">
                                Private dwellings occupied  <br>by usual residents
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                                <div class="counter" data-target="{{$UserTotal_private_dwellings}}" style="margin-right: 10px;"></div>
                            </div>
                            <div style="font: 800 20px monospace; text-align:left; font-family: 'Avenir';">
                                Total Private Dwellings
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <x-nav-link :href="route('housing.index')">
                <i><u>{{ __('See All Details') }}</u></i>
            </x-nav-link>
            <br>
            <i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>
        </div>

        {{-- House Dwellings --}}
        <div class="dashboard_row_half dashboard_row_item">
            <h3 style="font: 800 30px monospace; font-family: 'Avenir';">Households and Dwellings in {{$City}}</h3><br>
            <div style="display: flex;
            /* width: 80%; */
            /* height: auto; */
            flex-direction: column;
            align-items: left;
            justify-content: center;
            font-family: sans-serif;
            background-color: #e0f2ff; /* Light blue background */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); ">
            
                <table style="margin-left: 15px;">
                    <tr>
                        <td>
                            <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                                <div class="counter" data-target="{{$Private_dwellings_occupied_by_usual_residents}}" style="margin-right: 10px;"></div>
                            </div>
                            <div style="font: 800 20px monospace; text-align:left; font-family: 'Avenir';">
                                Private dwellings occupied  <br>by usual residents
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                                <div class="counter" data-target="{{$Total_private_dwellings}}" style="margin-right: 10px;"></div>
                            </div>
                            <div style="font: 800 20px monospace; text-align:left; font-family: 'Avenir';">
                                Total Private Dwellings
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <x-nav-link :href="route('housing.index')">
                <i><u>{{ __('See All Details') }}</u></i>
            </x-nav-link>
            <br>
            <i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>
        </div>
        <div class="clear"></div><!--CLEAR-->
    </div>

    {{-- Housing Pie Charts --}}
    <div class="dashboard_row print-container">
        <!-- User Housing Pie Chart -->
        <div class="dashboard_row_half dashboard_row_item">
            <div style="display: flex;
                /* width: 80%; */
                /* height: auto; */
                flex-direction: column;
                align-items: left;
                justify-content: center;
                font-family: sans-serif;
                background-color: #e0f2ff; /* Light blue background */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
                margin-bottom: 5px;">
                {{ $UserHousingChart->container() }}
            </div>
            <x-nav-link :href="route('housing.index')">
                <i><u>{{ __('See All Details') }}</u></i>
            </x-nav-link>
            {{-- <br>
            <a href="{{ route('download-housing-csv') }}" class="btn btn-primary">Download CSV</a> --}}
            <br>
            <i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>
        </div><!--DASHBOARD_ROW_HALF-->

        <!-- Housing Pie Chart -->
        <div class="dashboard_row_half dashboard_row_item">
            <div style="display: flex;
                /* width: 80%; */
                /* height: auto; */
                flex-direction: column;
                align-items: left;
                justify-content: center;
                font-family: sans-serif;
                background-color: #e0f2ff; /* Light blue background */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
                margin-bottom: 5px;">
                {{ $ageChart->container() }}
            </div>
            {{ $ageChart->container() }}
            <x-nav-link :href="route('housing.index')">
                <i><u>{{ __('See All Details') }}</u></i>
            </x-nav-link>
            <br>
            <i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>
        </div><!--DASHBOARD_ROW_HALF-->
        <div class="clear"></div>
    </div>

    {{-- Labour Occupation Bar Chart --}}
    <div class="dashboard_row print-container"   id="labourSupply">
        {{-- <h3 style="font: 800 30px monospace; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Labour Supply</h3><br> --}}
        {{-- User Employment by Occupation --}}
        <div class="dashboard_row_half dashboard_row_item">
            <div style="display: flex;
                /* width: 80%; */
                /* height: auto; */
                flex-direction: column;
                align-items: left;
                justify-content: center;
                font-family: sans-serif;
                background-color: #e0f2ff; /* Light blue background */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
                margin-bottom: 5px;">
                {{ $UserEmploymentByOccupationBarChart->container() }}
            </div>
            <x-nav-link :href="route('laboursuppply.index')">
                <i><u>{{ __('See All Details') }}</u></i>
            </x-nav-link>
            <br>
            <i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>
        </div>

        {{-- Employment by Occupation --}}
        <div class="dashboard_row_half dashboard_row_item">
            <div style="display: flex;
                /* width: 80%; */
                /* height: auto; */
                flex-direction: column;
                align-items: left;
                justify-content: center;
                font-family: sans-serif;
                background-color: #e0f2ff; /* Light blue background */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
                margin-bottom: 5px;">
                {{ $EmploymentByOccupationBarChart->container() }}
            </div>
            <x-nav-link :href="route('laboursuppply.index')">
                <i><u>{{ __('See All Details') }}</u></i>
            </x-nav-link>
            <br>
            <i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>
        </div>
        <div class="clear"></div><!--CLEAR-->
    </div>

    {{-- Labour Education Pie Chart --}}
    <div class="dashboard_row print-container">
        {{--User labor education --}}
        <div class="dashboard_row_half dashboard_row_item" style="margin-top: 15px">
            <div style="display: flex;
                /* width: 80%; */
                /* height: auto; */
                flex-direction: column;
                align-items: left;
                justify-content: center;
                font-family: sans-serif;
                background-color: #e0f2ff; /* Light blue background */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
                margin-bottom: 5px;">
                {{ $UserLabourEducationPieChart->container() }}
            </div>
            <x-nav-link :href="route('laboursuppply.index')">
                <i><u>{{ __('See All Details') }}</u></i>
            </x-nav-link>
            <br>
            <i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>
        </div>

        {{-- labor education --}}
        <div class="dashboard_row_half dashboard_row_item" style="margin-top: 15px">
            <div style="display: flex;
                /* width: 80%; */
                /* height: auto; */
                flex-direction: column;
                align-items: left;
                justify-content: center;
                font-family: sans-serif;
                background-color: #e0f2ff; /* Light blue background */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
                margin-bottom: 5px;">
                {{ $labourEducation->container() }}
            </div>
            <x-nav-link :href="route('laboursuppply.index')">
                <i><u>{{ __('See All Details') }}</u></i>
            </x-nav-link>
            <br>
            <i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>
        </div>
        <div class="clear"></div><!--CLEAR-->
    </div>

    @if($birthChart)
        <script src="{!! $birthChart->cdn() !!}"></script>
        {{ $birthChart->script() }}
    @endif


    <script>

        function showPopup() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function hidePopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
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
                    counter.innerText = Math.ceil(currentCount + increment).toLocaleString();
                    setTimeout(updateCounter, 10); // Update every 10 milliseconds for smooth animation
                } else {
                    counter.innerText = target.toLocaleString(); // Set final value
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
                        counter.innerText = Math.ceil(currentCount + increment).toLocaleString();
                        setTimeout(updateCounter, 10); // Update every 10 milliseconds for smooth animation
                    } else {
                        counter.innerText = target.toLocaleString();
                    }
                };

                updateCounter();
            });
        });
    </script>
    {{ $ageChart->script() }} {{-- Here ageChart has Housing data --}}
    {{ $UserHousingChart->script() }}
    {{ $labourEducation->script() }}
    {{ $UserLabourEducationPieChart->script() }}
    {{ $EmploymentByOccupationBarChart->script() }}
    {{ $UserEmploymentByOccupationBarChart->script() }}
    {{ $AgeCharacterChart->script() }}
    {{ $UserAgeCharacterChart->script() }}
</x-app-layout>