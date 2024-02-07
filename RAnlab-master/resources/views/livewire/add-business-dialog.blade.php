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

</head>
<body>

    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#demoModal" style="background-color: aqua">Add New Business</button>

    <form action="{{url('/add')}}" method="POST">
        @csrf
        {{-- <input type="text" class="form-control" id="year" name="year" placeholder="Year">

        <input type="submit" class="btn btn-primary" value="Save changes" style="background-color: rgb(0, 255, 102)"> --}}

        <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">Modal Example - Websolutionstuff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Welcome, Websolutionstuff !!
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
                        <label class="control-label col-sm-2" for="fname">Municipality</label>
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
                            <input type="text" id="cityCode" name='cityCode' readonly>
                        </div>
                    </div>
                    
                    <p class="fname_error error text-center alert alert-danger hidden"></p>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="year">Year</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="year" name="year" placeholder="Year">
                        </div>
                    </div>
                    <p class="lname_error error text-center alert alert-danger hidden"></p>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="businessName">Business Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="businessName" name="business">
                        </div>
                    </div>
                    <p class="email_error error text-center alert alert-danger hidden"></p>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="industry">Industry Label</label>
                        <div class="col-sm-10">
                            <select id="region" name="industry">
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
                                ];
                                @endphp
                                @foreach($industry as $values)
                                    <option value="{{ $values }}">
                                        {{ $values }}
                                    </option>
                                @endforeach
                            </select>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="employee">Employees:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="employee" name="employee">
                        </div>
                    </div>
                    <p
                        class="country_error error text-center alert alert-danger hidden"></p>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="lat">Location </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lat" name="location">
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

