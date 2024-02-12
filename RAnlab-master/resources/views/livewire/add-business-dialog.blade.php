<!-- add-business-dialog.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        /* CSS to adjust the width of the industry dropdown */
        #industry {
            max-width: 100%; /* Adjust this value as needed */
        }
        #citySelect {
            max-width: 100%;
        }
        label {
            font-weight: bold;
            color: #000;
            text-align: left;
        }
        .form-group {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#demoModal" style="background-color: hsl(155, 7%, 55%)">Add New Business</button>

    <form action="{{url('/add')}}" method="POST">
        @csrf
        <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <b style="text-align: right;"> <h3>Welcome, RAnLab!!</h3></b>
                        {{-- <h5 class="modal-title" id="demoModalLabel">Modal Example - Websolutionstuff</h5> --}}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    {{-- <div class="form-group">
                        <label class="control-label col-sm-2" for="fname">Municipality</label>
                        <div class="col-sm-10">
                            <select id="regionSelect" name="region">
                                <option value="0">
                                    Select Region
                                </option>
                                @php
                                    $regions = [
                                        "Baie Verte",
                                        "Bird Cove",
                                        "Bishop's Falls",
                                        "Botwood",
                                    ];
                                @endphp
                                @foreach($regions as $value)
                                    <option value="{{ $value }}">
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        
                        <h5 style="text-align: center;">Municipality</h5>
                        {{-- <label class="control-label" for="fname">Municipality</label> --}}
                        {{-- <label for="Municipality">Municipality</label> --}}
                        {{-- <h5>Municipality</h5> --}}
                        {{-- <label style="text-align: center;">Municipality</label> --}}
                        <div class="col-sm-10">
                            <select id="citySelect" name="region" onchange="showCityCode()">
                                <option value="">Select a city</option>
                                <option value="304">Baie Verte</option>
                                <option value="331">Bird Cove</option>
                                <option value="208">Bishop's Falls</option>
                                <option value="210">Botwood</option>
                                <option value="315">Conche</option>
                                <option value="188">Corner Brook</option>
                                <option value="190">Cox's Cove</option>
                                <option value="175">Deer Lake</option>
                                <option value="330">Flower's Cove</option>
                                <option value="207">Grand Falls-Windsor</option>
                                <option value="195">Hughes Brook</option>
                                <option value="190">Humber Arm South</option>
                                <option value="360">Happy Valley-Goose Bay</option>
                                <option value="196">Irishtown-Summerside</option>
                                <option value="193">Lark Harbour</option>
                                <option value="187">Massey Drive</option>
                                <option value="191">McIvers</option>
                                <option value="194">Meadows</option>
                                <option value="197">Mount Moriah</option>
                                <option value="209">Peterview</option>
                                <option value="314">Roddickton-Bide Arm</option>
                                <option value="287">Springdale</option>
                                <option value="333">St. Anthony</option>
                                <option value="336">St. Lunaire-Griquet</option>
                                <option value="182">Steady Brook</option>
                                <option value="198">York Harbour</option>
                                <option value="362">Labrador City</option>
                                <option value="363">Wabush</option>
                            </select>
                            <input type="hidden" id="cityCode" name='cityCode' readonly>
                        </div>
                    </div>
                    
                    <p class="fname_error error text-center alert alert-danger hidden"></p>
                    <div class="form-group">
                        {{-- <label class="control-label" for="fname">Year</label> --}}
                        <h5 style="text-align: center;">Year</h5>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="year" name="year" placeholder="Year: e.g. 2016">
                        </div>
                    </div>
                    <p class="lname_error error text-center alert alert-danger hidden"></p>
                    <div class="form-group">
                        {{-- <label class="control-label col-sm-2" for="businessName">Business Name</label> --}}
                        <h5 style="text-align: center;">Business Name</h5>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="businessName" name="business" placeholder="Business Name: e.g. RAnLab">
                        </div>
                    </div>
                    <p class="email_error error text-center alert alert-danger hidden"></p>
                    <div class="form-group">
                        {{-- <label class="control-label col-sm-2" for="industry">Industry Label</label> --}}
                        <h5 style="text-align: center;">Industry Label</h5>
                        <div class="col-sm-10">
                            <select id="industry" name="industry">
                                <option value="0">
                                    Select Industry
                                </option>
                                @php
                                    $industry = [
                                        "Sporting goods, hobby, book and music stores",
                                        "Personal care services and other personal services",
                                        "Building material and garden equipment and supplies dealers",
                                        "Food and beverage stores",
                                        "Furniture and home furnishings stores",
                                        "Electronics and appliance stores",
                                        "Traveller accommodation",
                                        "Construction",
                                        "Motor vehicle and parts dealers",
                                        "Food services and drinking places",
                                        "Amusement, recreation, performing arts, spectator sports and related industries, and heritage institutions",
                                        "Automotive repair and maintenance",
                                        "Clothing and clothing accessories stores",
                                        "Ambulatory health care services",
                                        "Gasoline stations",
                                        "Health and personal care stores",
                                        "Miscellaneous store retailers",
                                        "Funeral services",
                                        "General merchandise stores",
                                        "Waste management and remediation services",
                                        "Accounting, tax preparation, bookkeeping and payroll services",
                                        "Copper, nickel, lead and zinc ore mining",
                                        "Taxi and limousine service",
                                        "Agencies, brokerages and other insurance related activities",
                                        "Local, municipal and regional public administration",
                                        "Personal and household goods, and building material and supplies wholesaler-distributors",
                                        "Provincial and territorial public administration",
                                        "Household and institutional furniture and kitchen cabinet manufacturing",
                                        "Social assistance",
                                        "RV (recreational vehicle) parks, recreational camps, and rooming and boarding houses",
                                        "Lessors of real estate and financial investment services, funds and other financial vehicles",
                                        "Crop and animal production",
                                        "Other chemical product manufacturing",
                                        "Grant-making, civic, and professional and similar organizations",
                                        "Printing and related support activities",
                                        "Plastics and rubber products manufacturing",
                                        "Nursing and residential care facilities",
                                        "Advertising, public relations, and related services",
                                        "Banking and other depository credit intermediation",
                                        "Repair and maintenance (except automotive)",
                                        "Legal services",
                                        "Petroleum and coal product manufacturing (except petroleum refineries)",
                                        "Employment services and management, scientific and technical consulting services",
                                        "Postal service",
                                        "Religious organizations",
                                        "Miscellaneous merchant wholesalers",
                                        "Elementary and secondary schools plus other educational services",
                                        "Community colleges and C.E.G.E.P.s",
                                        "Architectural, engineering and related services",
                                        "Stone mining and quarrying",
                                        "Cement and concrete product manufacturing",
                                        "Machinery, equipment and supplies merchant wholesalers",
                                        "Seafood product preparation and packaging",
                                        "Breweries",
                                        "Activities related to credit intermediation",
                                        "Transit and ground passenger transportation",
                                        "Non-depository credit intermediation",
                                        "Truck transportation",
                                        "Computer systems design and related services",
                                        "Support activities for transportation",
                                        "Cutlery, hand tools and other fabricated metal product manufacturing",
                                        "Pulp, paper and paperboard mills",
                                        "Food, beverage and tobacco merchant wholesalers",
                                        "Services to buildings and dwellings",
                                        "Non-store retailers",
                                        "Automotive equipment rental and leasing",
                                        "Other professional, scientific and technical services",
                                        "Investigation and security services",
                                        "Travel arrangement and reservation services",
                                        "Non-metallic mineral product manufacturing (except cement and concrete products)",
                                        "Telecommunications",
                                        "Specialized design services",
                                        "Machine shops, turned product, and screw, nut and bolt manufacturing",
                                        "Gambling industries",
                                        "Dry cleaning and laundry services",
                                        "Local credit unions",
                                        "Support activities for mining, and oil and gas extraction",
                                        "Couriers and messengers",
                                        "Aboriginal public administration",
                                        "Offices of real estate agents and brokers and activities related to real estate",
                                        "Dairy product manufacturing",
                                        "Other miscellaneous manufacturing",
                                        "Bakeries and tortilla manufacturing",
                                        "Rental and leasing services (except automotive equipment)",
                                        "Sand, gravel, clay, and ceramic and refractory minerals mining and quarrying",
                                        "Air transportation",
                                        "Other wood product manufacturing",
                                        "Management of companies and enterprises",
                                        "Forestry and logging",
                                        "Soap, cleaning compound and toilet preparation manufacturing",
                                        "Unclassified",
                                        "Business support services",
                                        "Electric power generation, transmission and distribution",
                                        "Newspaper, periodical, book, directory, and software publishers, sound recording industries, and other information services",
                                        "Meat product manufacturing",
                                        "Office administrative services",
                                        "Other federal government services (except defence)",
                                        "Other metal ore mining",
                                        "Veneer, plywood and engineered wood product manufacturing",
                                        "Data processing, hosting, and related services",
                                        "Facilities and other support services",
                                        "Universities",
                                        "Radio and television broadcasting",
                                        "Basic chemical manufacturing",
                                        "Water transportation",
                                        "Warehousing and storage",
                                        "N/A",
                                        "Hospitals",
                                        "Ship and boat building",
                                        "Textile and textile product mills, and clothing and leather and allied product manufacturing",
                                        "Fishing, hunting and trapping",
                                        "Soft drink and ice manufacturing",
                                        "Iron ore mining",
                                        "Motion picture and video industries (except exhibition)",
                                        "Rail transportation"
                                ];
                                @endphp
                                @foreach($industry as $values)
                                    <option value="{{ $values }}">
                                        {{ $values }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        {{-- <label class="control-label col-sm-2" for="employee">Employees:</label> --}}
                        <h5 style="text-align: center;">Employees</h5>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="employee" name="employee" placeholder="Employees: e.g. 0">
                        </div>
                    </div>
                    <p
                        class="country_error error text-center alert alert-danger hidden"></p>
                    <div class="form-group">
                        {{-- <label class="control-label col-sm-2" for="lat">Location </label> --}}
                        <h5 style="text-align: center;">Location</h5>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lat" name="location" placeholder="Location: e.g. 100 Signal Hill, St. John's A1B">
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: rgb(162, 175, 175)">Close</button> --}}
                        <input type="submit" class="btn btn-primary" value="Save changes" style="background-color: rgb(0, 255, 102)">
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
    <script>
        function showCityCode() {
            var selectBox = document.getElementById("citySelect");
            var selectedIndex = selectBox.selectedIndex;
            var selectedOption = selectBox.options[selectedIndex];
            var selectedValue = selectedOption.value;
            var selectedText = selectedOption.text;
        
            // Set the selected city name in the select box
            selectBox.options[selectedIndex].text = selectedText;
        
            // Set the city code in the input box
            document.getElementById("cityCode").value = selectedValue;
        }
        </script>
    
    
</body>
</html>




<div>
    {{-- <h1>Hello There! LUL</h1> --}}
    {{-- <input type="button" wire:click="showAddBusinessDialog" value="Add New Business" /> --}}
    {{-- <x-button>{{ _("Create") }} </x-button> --}}
{{-- 
    @if($showDialog)
        <div id="addBusinessDialog" title="Add New Business">
            <form wire:submit.prevent="submitForm">
                <label for="region">Region:</label>
                <select wire:model="region">
                    <option value="0">Select Region (Admin)</option>
                    @foreach($regions as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select><br>

                <label for="year">Year:</label>
                <input type="text" wire:model="year" name="year"><br>

                <label for="industry">Industry:</label>
                <select wire:model="selectedIndustry">
                    <option value="0">Select Industry</option>
                    @foreach($industry as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select><br>

                <label for="businessName">Business Name:</label>
                <input type="text" wire:model="businessName" name="businessName"><br>

                <label for="employment">Employment:</label>
                <input type="text" wire:model="employment" name="employment"><br>

                <label for="location">Location:</label>
                <input type="text" wire:model="location" name="location"><br>

                <input type="submit" value="Submit">
            </form>
        </div>
    @endif --}}
</div>

<!-- add-business-dialog.blade.php -->

{{-- @push('scripts')
    <script>
        function updateCityCode() {
            var selectedCity = document.getElementById("regionSelect");
            var selectedCode = selectedCity.options[selectedCity.selectedIndex].getAttribute("data-code");
            document.getElementById("cityCode").value = selectedCode;
        }
    </script>
@endpush --}}

