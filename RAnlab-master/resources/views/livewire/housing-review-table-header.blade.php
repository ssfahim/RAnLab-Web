@php
    use App\Models\Demography;
    use App\Models\Dashboard;
    $regions = Demography::orderBy('geog_text', 'asc')->get();
@endphp
<livewire:housing-review-table-header></livewire:housing-review-table-header>
{{-- <livewire:housing-review-table></livewire:housing-review-table> --}}
<div class="update_panel">
    {{-- @if(auth()->check())
        @if(auth()->user()->email === 'test@test.com')
            <p>User Email: {{ auth()->user()->email }}</p>
            <input type="button" onclick="window.location='{{ route("admin.business.edit", 1) }}'" value="Update Businesses" />
        @else --}}
        {{-- <livewire:add-business-dialog /> --}}
            {{-- <input type="button" wire:click="showAddBusinessDialog" value="Add New Business" /> --}}
            <button type="button" class="btn btn-primary m-2" data-toggle="modal" 
                data-target="#demoModal" style="background-color: hsl(155, 7%, 55%)">
                Add New House
            </button>
            <form action="{{url('/housing_review/add')}}" method="POST">
                @csrf
        
                {{-- <div class="popup" id="popup">
                    <div class="modal-header">
                        <div class="title">Example Modal</div>
                    </div>
                    <div class="modal-body">
                        <h5 style="text-align: center;">Municipality</h5>
                        <select  id="city" name="cityCode" class="mt-1 block w-full" required autofocus autocomplete="address-level2">
                            <option value="0" @if(Session::get('regionId') === 0) selected @endif>
                                Select Region (Admin)
                            </option>
                            @foreach($regions as $value)
                                @if ($value)
                                    <option value="{{ $value['id'] }}"  @if(Session::get('regionId') === $value['id']) selected @endif>
                                        {{ $value['geog_text'] }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button onclick="hidePopup()" style="border: 1px solid black; background-color: lightgray;  display: block; margin: 0 auto; height:30px; width:50px;">Close</button>
                </div>
                <div id="overlay"></div> --}}
        
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
                            <div class="form-group">
                                
                                <h5 style="text-align: center;">Municipality</h5>
                                {{-- <label class="control-label" for="fname">Municipality</label> --}}
                                {{-- <label for="Municipality">Municipality</label> --}}
                                {{-- <h5>Municipality</h5> --}}
                                {{-- <label style="text-align: center;">Municipality</label> --}}
                                <div class="col-sm-10">
                                    @if(auth()->user()->email === 'test@test.com')
                                        <select id="cityCode" name="cityCode">
                                            <option value="0" @if(Session::get('regionId') === 0) selected @endif>
                                                Select Region (Admin)
                                            </option>
                                            @foreach($regions as $value)
                                                @if ($value)
                                                    <option value="{{ $value['id'] }}"  @if(Session::get('regionId') === $value['id']) selected @endif>
                                                        {{ $value['geog_text'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    @else
                                        @php
                                            $regionName = Demography::where('id',  auth()->user()->city)->value('geog_text');
                                            // $query = Dashboard::query();
                                            // $regionId = auth()->user()->city;
                                            // if ($regionId !== null && $regionId != 0) {
                                            //     $query = $query->where('CSDID', $regionId);
                                            // }
                                            // $city = $query->first();
                                        @endphp
                                        <input type="text" id="cityCode" name="cityCode" value="{{ $regionName }}" readonly placeholder="{{ $regionName }}">
                                    @endif
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
                            <p class="email_error error text-center alert alert-danger hidden"></p>
                            <div class="form-group">
                                {{-- <label class="control-label col-sm-2" for="house_structre">house_structre Label</label> --}}
                                <h5 style="text-align: center;">House Structure Label</h5>
                                <div class="col-sm-10">
                                    <select id="house_structure" name="house_structure" style=" max-width: 100%;">
                                        <option value="0">
                                            Select House Structure
                                        </option>
                                        @php
                                            $house_structure = [
                                                "Single-detatched House",
                                                "Semi-detatched House",
                                                "Row House",
                                                "Apartment or flat in a duplex",
                                                "Apartment in a building that has fewer than five storeys",
                                                "Apartment in a building that has five or more storeys",
                                                "Other Single-detatched House",
                                                "Moveable Dwelling",
                                            ];
                                        @endphp
                                        @foreach($house_structure as $values)
                                            <option value="{{ $values }}">
                                                {{ $values }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <p class="email_error error text-center alert alert-danger hidden"></p>
                            <div class="form-group">
                                {{-- <label class="control-label col-sm-2" for="house_structre">house_structre Label</label> --}}
                                <h5 style="text-align: center;">Number of Bedrooms Label</h5>
                                <div class="col-sm-10">
                                    <select id="number_Of_bedrooms" name="number_Of_bedrooms" style=" max-width: 100%;">
                                        <option value="0">
                                            Select Number of Bedrooms
                                        </option>
                                        @php
                                            $bedrooms = [
                                                "No bedrooms",
                                                "1 bedroom",
                                                "2 bedrooms",
                                                "3 bedrooms",
                                                "4 or more bedrooms",
                                            ];
                                        @endphp
                                        @foreach($bedrooms as $values)
                                            <option value="{{ $values }}">
                                                {{ $values }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <p class="country_error error text-center alert alert-danger hidden"></p>
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
        {{-- @endif
    @else
        <p>User not authenticated</p>
    @endif --}}
</div>