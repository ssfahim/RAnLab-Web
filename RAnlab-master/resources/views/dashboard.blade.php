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
<style>
    body {
        background-color: #f5f5f5;
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
</style>
<div class="dashboard_row"  id="demography">
    <div class="dashboard_row_half dashboard_row_item">
        {{-- Population Info --}}
        @if($cityData)
            <div id="city-data">
                <h3 style="font: 800 40px monospace;text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">{{ $selectedCity }}</h3><br>
                <!-- Display city data here -->
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
                                <div class="counter" data-target="{{$Population_2021}}" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 150px; display: inline-block;"></div>
                            </td>
                            <td rowspan=4>
                                <div style="border: 2px solid black; ">
                                    <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                                        <div class="counters" data-target="{{$Population_percentage_change_2016_to_2021}}" style="margin-right: 10px;"></div>
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
                                <div class="counter" data-target="{{$Population_2016}}" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 150px; display: inline-block; margin-right: 1rem;"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1" style="font: 800 20px monospace; align-items:inherit">
                                <p>Population in 2016</p>
                            </td>
                        </tr>
                        
                    </table>
            </div>
        @endif
        <button onclick="showPopup()" style="float:right;"><img src="/images/help.svg" alt="" style="width: 35px; height: auto;"></button>

        <div class="popup" id="popup">
            <div class="modal-header">
                <div class="title">Example Modal</div>
              </div>
              <div class="modal-body">
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

    {{-- Age Characteristics --}}
    <div class="dashboard_row_half dashboard_row_item">
        <h3 style="font: 800 30px monospace; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Age characteristics</h3><br>
        <div style="display: flex;
        /* width: 80%; */
        /* height: auto; */
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-family: sans-serif;
        background-color: #e0f2ff; /* Light blue background */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); ">
            <table>
                <tr>
                    <td>
                        <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                            <div class="counter" data-target="{{$Age_distribution_0_to_14}}" style="margin-right: 10px;"></div>
                        </div>
                        <div style="font: 800 20px monospace; text-align:center">
                            Age distribution <br>0 to 14
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                            <div class="counter" data-target="{{$Age_distribution_15_to_64}}" style="margin-right: 10px;"></div>
                        </div>
                        <div style="font: 800 20px monospace; text-align:center">
                            Age distribution <br>15 to 64
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                            <div class="counter" data-target="{{$Age_distribution_65_years_and_over}}" style="margin-right: 10px;"></div>
                        </div>
                        <div style="font: 800 20px monospace; text-align:center">
                            Age distribution <br>65 years and over
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <x-nav-link :href="route('demography.index')">
            <i><u>{{ __('See All Details') }}</u></i>
        </x-nav-link>
        <br><i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>
    </div>
    <div class="clear"></div><!--CLEAR-->
</div>

{{-- House Dwellings --}}
<div class="dashboard_row"  id="housing">
    <div class="dashboard_row_half dashboard_row_item">
        <h3 style="font: 800 30px monospace; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Household and dwelling characteristics</h3><br>
        <div style="display: flex;
        /* width: 80%; */
        /* height: auto; */
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-family: sans-serif;
        background-color: #e0f2ff; /* Light blue background */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); ">
        
            <table>
                <tr>
                    <td>
                        <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                            <div class="counter" data-target="{{$Private_dwellings_occupied_by_usual_residents}}" style="margin-right: 10px;"></div>
                        </div>
                        <div style="font: 800 20px monospace; text-align:center">
                            Private dwellings <br>occupied by <br>usual residents
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="counter-container" style="font: 800 40px monospace; padding: 2rem; margin-bottom: 1rem; text-align: center; width: 140px; display: flex; align-items: center;">
                            <div class="counter" data-target="{{$Total_private_dwellings}}" style="margin-right: 10px;"></div>
                        </div>
                        <div style="font: 800 20px monospace; text-align:center">
                            Total <br>private Dwelling
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <x-nav-link :href="route('demography.index')">
            <i><u>{{ __('See All Details') }}</u></i>
        </x-nav-link>
        <br>
        <i>SOURCE: <u><a href="https://www12.statcan.gc.ca/census-recensement/2021/dp-pd/prof/search-recherche/lst/results-resultats.cfm?Lang=E&GEOCODE=10">Census Profile Newfoundland and Labrador</a></u> </i>
    </div>
    <div id="overlay"></div>
</div>

{{-- Population Pyramid --}}
<div class="dashboard_row" style="margin-top: 150px;">
    <div class="dashboard_row_full dashboard_row_item">
        <h3 style="font: 800 30px monospace; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Population Pyramid</h3><br>
        <div id="chartDiv" class="container"></div>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://d3js.org/d3.v4.min.js"></script>
        {{-- <script src="https://github.com/doylek/D3-Population-Pyramid/blob/master/popPyramid.js" ></script> --}}
        <div id="pyramid" style="
        margin-left: auto;
        margin-right: auto;
        max-width: 100%;
        max-height: 100%;
        aligh-item: center;">
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
            console.log(exampleData)

            var options = {
                height: 600,
                width: 800,
                style: {
                    leftBarColor: "#229922", // Color for male data
                    rightBarColor: "#992222" // Color for female data
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
                    .attr('x', (w / 2) - (margin.middle * 3))
                    .attr('y', 12)
                    .attr('width', 12)
                    .attr('height', 12);

                legend.append('text')
                    .attr('fill', '#000')
                    .attr('x', (w / 2) - (margin.middle * 2))
                    .attr('y', 18)
                    .attr('dy', '0.32em')
                    .text('Males');

                legend.append('rect')
                    .attr('class', 'bar right')
                    .attr('x', (w / 2) + (margin.middle * 2))
                    .attr('y', 12)
                    .attr('width', 12)
                    .attr('height', 12);

                legend.append('text')
                    .attr('fill', '#000')
                    .attr('x', (w / 2) + (margin.middle * 3))
                    .attr('y', 18)
                    .attr('dy', '0.32em')
                    .text('Females');

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
                    .attr('transform', translation(leftBegin, 0) + 'scale(-1,1)');
                var rightBarGroup = pyramid.append('g')
                    .attr('transform', translation(rightBegin, 0));

                // DRAW AXES
                pyramid.append('g')
                    .attr('class', 'axis y left')
                    .attr('transform', translation(leftBegin, 0))
                    .call(yAxisLeft)
                    .selectAll('text')
                    .style('text-anchor', 'middle');

                pyramid.append('g')
                    .attr('class', 'axis y right')
                    .attr('transform', translation(rightBegin, 0))
                    .call(yAxisRight);

                pyramid.append('g')
                    .attr('class', 'axis x left')
                    .attr('transform', translation(0, h))
                    .call(xAxisLeft);

                pyramid.append('g')
                    .attr('class', 'axis x right')
                    .attr('transform', translation(rightBegin, h))
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
                        tooltipDiv.html("<strong>Males Age " + d.age + "</strong>" +
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
                        tooltipDiv.html("<strong> Females Age " + d.age + "</strong>" +
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

{{-- MAP --}}
<div class="dashboard_row">
    <div class="dashboard_row_full dashboard_row_item">
        <b>Businesses in Newfoundland and Labrador</b>
        <div id="map"></div>
    </div><!--DASHBOARD_ROW_FULL-->
    <div class="clear"></div><!--CLEAR-->
</div>
{{-- 
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" />
<script src="https://cdn.plot.ly/plotly-geo-assets/maps/basemap/open-street-map.json"></script>
<script src="https://code.jscharting.com/latest/jscharting.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://code.jscharting.com/latest/jscharting.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://d3js.org/d3.v4.min.js"></script> --}}


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
            size: 9,
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

    //---------------------------------------------------------------------------------------------------------

    // var ageGroups = [];
    // var menData = [];
    // var posMenData = [];
    // var womenData = [];

    // // Assuming $regionData contains your age and population data
    
   

    // @foreach($regionData as $data)
    //     ageGroups.push("{{$data->Age_groups}}");
    //     menData.push(-{{$data->Men}});
    //     posMenData.push({{$data->Men}});
    //     womenData.push({{$data->Women}}); // Positive values for women (right side)
    // @endforeach
    // console.log(posMenData);
    // // Render population pyramid chart using JSCharting
    // JSC.Chart('chartDiv', {
    //         type: 'horizontal column',
    //         title_label_text: 'Population Pyramid',
    //         yAxis: {
    //             scale_type: 'stacked',
    //             defaultTick_label_text: '{Math.abs(%Value):a2}'
    //         },
    //         xAxis: { label_text: 'Age', label: ageGroups },
    //         series: [
    //             { name: 'Male', points: menData, legendEntry_icon_color: 'blue' },
    //             { name: 'Female', points: womenData, legendEntry_icon_color: 'pink' }
    //         ],
    //         defaultTooltip_label_text: '%name Ages %xValue:<br><b>%points</b>',
    //         defaultPoint_tooltip: '%icon {Math.abs(%Value)}',
    //         legend_template: '%name %icon {Math.abs(%Value)}',
    //         legend_defaultEntry_value: '{Math.abs(%Value)}'
    //     });

    // var ageGroups = [];
    // var menData = [];
    // var posMenData = [];
    // var womenData = [];

    // // Assuming $regionData contains your age and population data

    // @foreach($regionData as $data)
    //     ageGroups.push("{{$data->Age_groups}}");
    //     menData.push(-{{$data->Men}});
    //     posMenData.push({{$data->Men}});
    //     womenData.push({{$data->Women}}); // Positive values for women (right side)
    // @endforeach

    // // Construct legend text for male data
    // var maleLegendText = [];
    // @foreach($regionData as $data)
    //     maleLegendText.push({{$data->Men >= 0 ? $data->Men : abs($data->Men)}} + ' Male');
    // @endforeach

    // console.log(menData)

    // // Render population pyramid chart using Plotly
    // var trace1 = {
    //     x: womenData,
    //     y: ageGroups,
    //     name: 'Female',
    //     orientation: 'h',
    //     type: 'bar',
    //     // hoverinfo: 'none',
    //     legendgroup: 'Female',
    //     marker: {
    //         color: 'rgba(255, 99, 132, 1)'
    //     }
    // };

    // var trace2 = {
    //     x: menData,
    //     y: ageGroups,
    //     name: 'Male',
    //     orientation: 'h',
    //     type: 'bar',
    //     // hoverinfo: 'none',
    //     legendgroup: 'Male',
    //     marker: {
    //         color: 'rgba(54, 162, 235, 1)'
    //     }
    // };

    // var layout = {
    //     title: 'Population Pyramid',
    //     barmode: 'relative',
    //     xaxis: {
    //             title: '',
    //             showgrid: false,
    //             showline: false,
    //             showticklabels: false,
    //             zeroline: false
    //         },
    //     yaxis: { title: 'Age Group', automargin: true },
    //     legend: {
    //         orientation: 'h',
    //         y: -0.15,
    //         x: 0.5,
    //         xanchor: 'center',
    //         bgcolor: 'rgba(255, 255, 255, 0.6)',
    //         bordercolor: '#CCCCCC',
    //         borderwidth: 1,
    //         traceorder: 'reversed',
    //         itemsizing: 'constant',
    //         itemwidth: 80,
    //         itemheight: 30,
    //         itemclick: 'toggleothers',
    //         itemdoubleclick: 'toggle',
    //         itemtext: maleLegendText,
    //         valign: 'middle', // Align legend text vertically
    //         font: { size: 18 }
    //     }
    // };

    // Plotly.newPlot('chartDiv', [trace1, trace2], layout);

                    // var ageGroups = [
                    //     @foreach($regionData as $data)
                    //         "{{$data->Age_groups}}",
                    //     @endforeach
                    // ];

                    // var menData = [
                    //     @foreach($regionData as $data)
                    //         -{{$data->Men}},
                    //     @endforeach
                    // ];

                    // var womenData = [
                    //     @foreach($regionData as $data)
                    //         {{$data->Women}},
                    //     @endforeach
                    // ];

                    // var exampleData = [];
                    // for (var i = 0; i < ageGroups.length; i++) {
                    //     exampleData.push({
                    //         age: ageGroups[i],
                    //         male: menData[i],
                    //         female: womenData[i]
                    //     });
                    // }
                    // console.log(exampleData)

                    // var options = {
                    //     height: 400,
                    //     width: 600,
                    //     style: {
                    //         leftBarColor: "#229922", // Color for male data
                    //         rightBarColor: "#992222" // Color for female data
                    //     }
                    // };

                    // pyramidBuilder(exampleData, '#pyramid', options);

                    // function pyramidBuilder(data, target, options) {
                    //     var w = typeof options.width === 'undefined' ? 400  : options.width,
                    //         h = typeof options.height === 'undefined' ? 400  : options.height,
                    //         w_full = w,
                    //         h_full = h;

                    //     if (w > $( window ).width()) {
                    //     w = $( window ).width();
                    //     }

                    //     var margin = {
                    //             top: 50,
                    //             right: 10,
                    //             bottom: 20,
                    //             left: 10,
                    //             middle: 20
                    //         },
                    //         sectorWidth = (w / 2) - margin.middle,
                    //         leftBegin = sectorWidth - margin.left,
                    //         rightBegin = w - margin.right - sectorWidth;

                    //     w = (w- (margin.left + margin.right) );
                    //     h = (h - (margin.top + margin.bottom));

                    //     if (typeof options.style === 'undefined') {
                    //     var style = {
                    //         leftBarColor: '#6c9dc6',
                    //         rightBarColor: '#de5454',
                    //         tooltipBG: '#fefefe',
                    //         tooltipColor: 'black'
                    //     };
                    //     } else {
                    //     var style = {
                    //         leftBarColor: typeof options.style.leftBarColor === 'undefined'  ? '#6c9dc6' : options.style.leftBarColor,
                    //         rightBarColor: typeof options.style.rightBarColor === 'undefined' ? '#de5454' : options.style.rightBarColor,
                    //         tooltipBG: typeof options.style.tooltipBG === 'undefined' ? '#fefefe' : options.style.tooltipBG,
                    //         tooltipColor: typeof options.style.tooltipColor === 'undefined' ? 'black' : options.style.tooltipColor
                    //     };
                    // }

                    //     var totalPopulation = d3.sum(data, function(d) {
                    //             return d.male + d.female;
                    //         }),
                    //         percentage = function(d) {
                    //             return d / totalPopulation;
                    //         };

                    //     var styleSection = d3.select(target).append('style')
                    //     .text('svg {max-width:100%} \
                    //     .axis line,axis path {shape-rendering: crispEdges;fill: transparent;stroke: #555;} \
                    //     .axis text {font-size: 11px;} \
                    //     .bar {fill-opacity: 0.5;} \
                    //     .bar.left {fill: ' + style.leftBarColor + ';} \
                    //     .bar.left:hover {fill: ' + colorTransform(style.leftBarColor, '333333') + ';} \
                    //     .bar.right {fill: ' + style.rightBarColor + ';} \
                    //     .bar.right:hover {fill: ' + colorTransform(style.rightBarColor, '333333') + ';} \
                    //     .tooltip {position: absolute;line-height: 1.1em;padding: 7px; margin: 3px;background: ' + style.tooltipBG + '; color: ' + style.tooltipColor + '; pointer-events: none;border-radius: 6px;}')

                    //     var region = d3.select(target).append('svg')
                    //         .attr('width', w_full)
                    //         .attr('height', h_full);


                    //     var legend = region.append('g')
                    //         .attr('class', 'legend');

                    //         // TODO: fix these margin calculations -- consider margin.middle == 0 -- what calculations for padding would be necessary?
                    //     legend.append('rect')
                    //         .attr('class', 'bar left')
                    //         .attr('x', (w / 2) - (margin.middle * 3))
                    //         .attr('y', 12)
                    //         .attr('width', 12)
                    //         .attr('height', 12);

                    //     legend.append('text')
                    //         .attr('fill', '#000')
                    //         .attr('x', (w / 2) - (margin.middle * 2))
                    //         .attr('y', 18)
                    //         .attr('dy', '0.32em')
                    //         .text('Males');

                    //     legend.append('rect')
                    //         .attr('class', 'bar right')
                    //         .attr('x', (w / 2) + (margin.middle * 2))
                    //         .attr('y', 12)
                    //         .attr('width', 12)
                    //         .attr('height', 12);

                    //     legend.append('text')
                    //         .attr('fill', '#000')
                    //         .attr('x', (w / 2) + (margin.middle * 3))
                    //         .attr('y', 18)
                    //         .attr('dy', '0.32em')
                    //         .text('Females');

                    //     var tooltipDiv = d3.select("body").append("div")
                    //         .attr("class", "tooltip")
                    //         .style("opacity", 0);

                    //     var pyramid = region.append('g')
                    //         .attr('class', 'inner-region')
                    //         .attr('transform', translation(margin.left, margin.top));

                    //     // find the maximum data value for whole dataset
                    //     // and rounds up to nearest 5%
                    //     //  since this will be shared by both of the x-axes
                    //     var maxValue = Math.ceil(Math.max(
                    //         d3.max(data, function(d) {
                    //             return percentage(d.male);
                    //         }),
                    //         d3.max(data, function(d) {
                    //             return percentage(d.female);
                    //         })
                    //     )/0.05)*0.05;

                    //     // SET UP SCALES

                    //     // the xScale goes from 0 to the width of a region
                    //     //  it will be reversed for the left x-axis
                    //     var xScale = d3.scaleLinear()
                    //         .domain([0, maxValue])
                    //         .range([0, (sectorWidth-margin.middle)])
                    //         .nice();

                    //     var xScaleLeft = d3.scaleLinear()
                    //         .domain([0, maxValue])
                    //         .range([sectorWidth, 0]);

                    //     var xScaleRight = d3.scaleLinear()
                    //         .domain([0, maxValue])
                    //         .range([0, sectorWidth]);

                    //     var yScale = d3.scaleBand()
                    //         .domain(data.map(function(d) {
                    //             return d.age;
                    //         }))
                    //         .range([h, 0], 0.1);


                    //     // SET UP AXES
                    //     var yAxisLeft = d3.axisRight()
                    //         .scale(yScale)
                    //         .tickSize(4, 0)
                    //         .tickPadding(margin.middle - 4);

                    //     var yAxisRight = d3.axisLeft()
                    //         .scale(yScale)
                    //         .tickSize(4, 0)
                    //         .tickFormat('');

                    //     var xAxisRight = d3.axisBottom()
                    //         .scale(xScale)
                    //         .tickFormat(d3.format('.0%'));

                    //     var xAxisLeft = d3.axisBottom()
                    //         // REVERSE THE X-AXIS SCALE ON THE LEFT SIDE BY REVERSING THE RANGE
                    //         .scale(xScale.copy().range([leftBegin, 0]))
                    //         .tickFormat(d3.format('.0%'));

                    //     // MAKE GROUPS FOR EACH SIDE OF CHART
                    //     // scale(-1,1) is used to reverse the left side so the bars grow left instead of right
                    //     var leftBarGroup = pyramid.append('g')
                    //         .attr('transform', translation(leftBegin, 0) + 'scale(-1,1)');
                    //     var rightBarGroup = pyramid.append('g')
                    //         .attr('transform', translation(rightBegin, 0));

                    //     // DRAW AXES
                    //     pyramid.append('g')
                    //         .attr('class', 'axis y left')
                    //         .attr('transform', translation(leftBegin, 0))
                    //         .call(yAxisLeft)
                    //         .selectAll('text')
                    //         .style('text-anchor', 'middle');

                    //     pyramid.append('g')
                    //         .attr('class', 'axis y right')
                    //         .attr('transform', translation(rightBegin, 0))
                    //         .call(yAxisRight);

                    //     pyramid.append('g')
                    //         .attr('class', 'axis x left')
                    //         .attr('transform', translation(0, h))
                    //         .call(xAxisLeft);

                    //     pyramid.append('g')
                    //         .attr('class', 'axis x right')
                    //         .attr('transform', translation(rightBegin, h))
                    //         .call(xAxisRight);

                    //     // DRAW BARS
                    //     leftBarGroup.selectAll('.bar.left')
                    //         .data(data)
                    //         .enter().append('rect')
                    //         .attr('class', 'bar left')
                    //         .attr('x', 0)
                    //         .attr('y', function(d) {
                    //             return yScale(d.age) + margin.middle / 4;
                    //         })
                    //         .attr('width', function(d) {
                    //             return xScale(percentage(d.male));
                    //         })
                    //         .attr('height', (yScale.range()[0] / data.length) - margin.middle / 2)
                    //         .on("mouseover", function(d) {
                    //             tooltipDiv.transition()
                    //                 .duration(200)
                    //                 .style("opacity", 0.9);
                    //             tooltipDiv.html("<strong>Males Age " + d.age + "</strong>" +
                    //                     "<br />  Population: " + prettyFormat(d.male) +
                    //                     "<br />" + (Math.round(percentage(d.male) * 1000) / 10) + "% of Total")
                    //                 .style("left", (d3.event.pageX) + "px")
                    //                 .style("top", (d3.event.pageY - 28) + "px");
                    //         })
                    //         .on("mouseout", function(d) {
                    //             tooltipDiv.transition()
                    //                 .duration(500)
                    //                 .style("opacity", 0);
                    //         });

                    //     rightBarGroup.selectAll('.bar.right')
                    //         .data(data)
                    //         .enter().append('rect')
                    //         .attr('class', 'bar right')
                    //         .attr('x', 0)
                    //         .attr('y', function(d) {
                    //             return yScale(d.age) + margin.middle / 4;
                    //         })
                    //         .attr('width', function(d) {
                    //             return xScale(percentage(d.female));
                    //         })
                    //         .attr('height', (yScale.range()[0] / data.length) - margin.middle / 2)
                    //         .on("mouseover", function(d) {
                    //             tooltipDiv.transition()
                    //                 .duration(200)
                    //                 .style("opacity", 0.9);
                    //             tooltipDiv.html("<strong> Females Age " + d.age + "</strong>" +
                    //                     "<br />  Population: " + prettyFormat(d.female) +
                    //                     "<br />" + (Math.round(percentage(d.female) * 1000) / 10) + "% of Total")
                    //                 .style("left", (d3.event.pageX) + "px")
                    //                 .style("top", (d3.event.pageY - 28) + "px");
                    //         })
                    //         .on("mouseout", function(d) {
                    //             tooltipDiv.transition()
                    //                 .duration(500)
                    //                 .style("opacity", 0);
                    //         });

                    //     /* HELPER FUNCTIONS */

                    //     // string concat for translate
                    //     function translation(x, y) {
                    //         return 'translate(' + x + ',' + y + ')';
                    //     }

                    //     // numbers with commas
                    //     function prettyFormat(x) {
                    //         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    //     }

                    //     // lighten colors
                    //     function colorTransform(c1, c2) {
                    //         var c1 = c1.replace('#','')
                    //             origHex = {
                    //                 r: c1.substring(0, 2),
                    //                 g: c1.substring(2, 4),
                    //                 b: c1.substring(4, 6)
                    //             },
                    //             transVec = {
                    //                 r: c2.substring(0, 2),
                    //                 g: c2.substring(2, 4),
                    //                 b: c2.substring(4, 6)
                    //             },
                    //             newHex = {};

                    //         function transform(d, e) {
                    //             var f = parseInt(d, 16) + parseInt(e, 16);
                    //             if (f > 255) {
                    //                 f = 255;
                    //             }
                    //             return f.toString(16);
                    //         }
                    //         newHex.r = transform(origHex.r, transVec.r);
                    //         newHex.g = transform(origHex.g, transVec.g);
                    //         newHex.b = transform(origHex.b, transVec.b);
                    //         return '#' + newHex.r + newHex.g + newHex.b;
                    //     }

                    // }

 
</script>
</x-app-layout>
