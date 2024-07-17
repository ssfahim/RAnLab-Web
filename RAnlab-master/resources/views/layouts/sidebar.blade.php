<aside x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <!-- Navigation Links -->
    <div class="sidebar_nav_column" style="background-color: #FFFFFF; color: black;">

        {{--- Heading and Compare Town Link ---}}
        <div class="sidebar_heading">
            <div class="sidebar_heading_inner">
                {{-- <select id="regionSelect">
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
                </select> --}}
                <h4>Municipality</h4>
                {{-- @if (auth()->user()->email === 'test@test.com')  --}}

                    <form id="city-form" method="GET">
                        @csrf
                        <select id="regionSelect">
                            <option value="0" @if(Session::get('regionId', auth()->user()->city) === 0) selected @endif>
                                Select Region
                            </option>
                            @foreach($regions as $value)
                                @if ($value)
                                    <option value="{{ $value['id'] }}" @if(Session::get('regionId', auth()->user()->city) === $value['id']) selected @endif>
                                        {{ $value['geog_text'] }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </form>
                {{-- @endif --}}
                <div class="sidebar_nav_item" style="color: black;">
                    <x-nav-link :href="route('customDashboard.index')" :active="request()->routeIs('customDashboard.index')">
                        {{ __('Compare Towns') }}
                    </x-nav-link>
                </div><!--SIDEBAR_NAV_ITEM-->
            </div><!--SIDBAR_HEADING_INNER-->
        </div><!--SIDEBAR_HEADING-->

        <!-- Print page -->
        <div class="sidebar_heading">
        	<div class="sidebar_heading_inner">
                <div class="sidebar_heading_icon">
                    <button onclick="window.print()">
                        <img src="/images/printer.svg">
                    </button>
                </div><!--SIDEBAR_HEADING_ICON-->
                <div class="sidebar_heading_text">Print-Page</div><!--SIDEBAR_HEADING_TEXT-->
                <div class="clear"></div><!--CLEAR-->
            </div><!--SIDBAR_HEADING_INNER-->
        </div><!--SIDEBAR_HEADING-->

         <!-- Download CSV -->
         <div class="sidebar_heading">
        	<div class="sidebar_heading_inner">
                <div class="sidebar_heading_icon">
                    <button onclick="showsidebarPopup()" style="float:left; margin-top: 10px;">
                        <img src="/images/download.svg" style="width: 35px; height: auto;">
                    </button>
                </div><!--SIDEBAR_HEADING_ICON-->
                <div class="sidebar_heading_text">
                    <p class="btn btn-primary" onclick="showsidebarPopup()">Download Data</p>
                    
                    {{-- <div id="sidebarOverlay"></div> --}}
                </div><!--SIDEBAR_HEADING_TEXT-->
                <div class="sidebarPopup" id="sidebarPopup">
                    <div class="modal-header">
                        <div class="title">Example Modal</div>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>DataSets</th>
                                    <th>Download CSV File</th>
                                    {{-- <th>Value 2</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>Population Data</td>
                                        <td><a href="{{ route('download-population-csv') }}" class="btn btn-primary">Population CSV</a></td>
                                        {{-- <td>6.5344</td> --}}
                                    </tr>
                                    <tr>
                                        <td>Housing Data</td>
                                        <td><a href="{{ route('download-housing-csv') }}" class="btn btn-primary">Housing CSV</a></td>
                                        {{-- <td>3.232</td> --}}
                                    </tr>
                                    <tr>
                                        <td>Labour Data</td>
                                        <td><a href="{{ route('download-labour-csv') }}" class="btn btn-primary">Labour CSV</a></td>
                                        {{-- <td>9.32</td> --}}
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <button onclick="hidesidebarPopup()" style="border: 1px solid black; background-color: lightgray;  display: block; margin: 0 auto; height:30px; width:50px;">Close</button>
                </div>
                <div class="clear"></div><!--CLEAR-->
            </div><!--SIDBAR_HEADING_INNER-->
        </div><!--SIDEBAR_HEADING-->

        
        <!-- Population -->
        <div class="sidebar_heading">
        	<div class="sidebar_heading_inner">
                <div class="sidebar_heading_icon">
                    <img src="/images/people.svg">
                </div><!--SIDEBAR_HEADING_ICON-->
                <div class="sidebar_heading_text">Population</div><!--SIDEBAR_HEADING_TEXT-->
                <div class="clear"></div><!--CLEAR-->
            </div><!--SIDBAR_HEADING_INNER-->
        </div><!--SIDEBAR_HEADING-->

        <div class="sidebar_nav_item">
            {{-- <x-nav-link :href="route('demography.index')" :active="request()->routeIs('demography.index')">
                {{ __('Demography') }}
            </x-nav-link> --}}
            <a href="{{ route('index') }}#demography">
                {{ __('Population Change') }}
            </a>
        </div><!--SIDEBAR_NAV_ITEM-->

        <div class="sidebar_nav_item">
            {{-- <x-nav-link :href="route('demography.index')" :active="request()->routeIs('demography.index')">
                {{ __('Demography') }}
            </x-nav-link> --}}
            <a href="{{ route('index') }}#demography">
                {{ __('Age Characteristics') }}
            </a>
        </div><!--SIDEBAR_NAV_ITEM-->

        <div class="sidebar_nav_item">
            {{-- <x-nav-link :href="route('demography.index')" :active="request()->routeIs('demography.index')">
                {{ __('Demography') }}
            </x-nav-link> --}}
            <a href="{{ route('index') }}#populationPyramid">
                {{ __('Population Structure') }}
            </a>
        </div><!--SIDEBAR_NAV_ITEM-->


        <!-- Housing -->
        <div class="sidebar_heading">
        	<div class="sidebar_heading_inner">
                <div class="sidebar_heading_icon">
                    <img src="/images/home.svg">
                </div><!--SIDEBAR_HEADING_ICON-->
                <div class="sidebar_heading_text">Housing</div><!--SIDEBAR_HEADING_TEXT-->
                <div class="clear"></div><!--CLEAR-->
            </div><!--SIDBAR_HEADING_INNER-->
        </div><!--SIDEBAR_HEADING-->

        <div class="sidebar_nav_item">
            {{-- <x-nav-link :href="route('housing')" :active="request()->routeIs('housing')">
                {{ __('House Dweillings') }}
            </x-nav-link> --}}
            <a href="{{ route('index') }}#housing">
                {{ __('Households and Dwellings') }}
            </a>
		</div><!--SIDEBAR_NAV_ITEM-->

        <div class="sidebar_nav_item">
            {{-- <x-nav-link :href="route('housing')" :active="request()->routeIs('housing')">
                {{ __('House Dweillings') }}
            </x-nav-link> --}}
            <a href="{{ route('index') }}#housing">
                {{ __('Household Tenure') }}
            </a>
		</div><!--SIDEBAR_NAV_ITEM-->


        {{-- <!-- Economy -->
		<div class="sidebar_heading">
        	<div class="sidebar_heading_inner">
                <div class="sidebar_heading_icon">
                    <img src="/images/dollar.svg">
                </div><!--SIDEBAR_HEADING_ICON-->
                <div class="sidebar_heading_text">Economy</div><!--SIDEBAR_HEADING_TEXT-->
                <div class="clear"></div><!--CLEAR-->
        	</div><!--SIDBAR_HEADING_INNER-->
        </div><!--SIDEBAR_HEADING-->

        <div class="sidebar_nav_item">
            <x-nav-link :href="route('incomeclass')" :active="request()->routeIs('incomeclass')">
                {{ __('Income Classes') }}
            </x-nav-link>
		</div><!--SIDEBAR_NAV_ITEM-->

        <div class="sidebar_nav_item">
            <x-nav-link :href="route('incomesource')" :active="request()->routeIs('incomesource')">
                {{ __('Income Sources') }}
            </x-nav-link>
		</div><!--SIDEBAR_NAV_ITEM-->

        <div class="sidebar_nav_item">
            <x-nav-link :href="route('spending')" :active="request()->routeIs('spending')">
                {{ __('Consumer Spending') }}
            </x-nav-link>
		</div><!--SIDEBAR_NAV_ITEM--> --}}

        
        <!-- Workforce -->
        <div class="sidebar_heading">
        	<div class="sidebar_heading_inner">
                <div class="sidebar_heading_icon">
                    <img src="/images/briefcase.svg">
                </div><!--SIDEBAR_HEADING_ICON-->
                <div class="sidebar_heading_text">Workforce</div><!--SIDEBAR_HEADING_TEXT-->
                <div class="clear"></div><!--CLEAR-->
            </div><!--SIDBAR_HEADING_INNER-->
        </div><!--SIDEBAR_HEADING-->

        <div class="sidebar_nav_item">
            {{-- <x-nav-link :href="route('business.index')" :active="request()->routeIs('business.index')">
                {{ __('Business') }}
            </x-nav-link> --}}
            {{-- <x-nav-link :href="route('business.food')">
                {{ __('FoodPrice') }}
            </x-nav-link> --}}
		</div><!--SIDEBAR_NAV_ITEM-->

        <div class="sidebar_nav_item">
            {{-- <x-nav-link :href="route('laboursuppply.index')" :active="request()->routeIs('laboursuppply.index')">
                {{ __('Labour Supply') }}
            </x-nav-link> --}}

            <a href="{{ route('index') }}#labourSupply">
                {{ __('Employment by Occupation') }}
            </a>
		</div><!--SIDEBAR_NAV_ITEM-->

        <div class="sidebar_nav_item">
            {{-- <x-nav-link :href="route('labourdemand.index')" :active="request()->routeIs('labourdemand.index')">
                {{ __('Labour Demand') }}
            </x-nav-link> --}}
            <a href="{{ route('index') }}#labourSupply">
                {{ __('Education Level') }}
            </a>
		</div><!--SIDEBAR_NAV_ITEM-->

        <!-- EDIT BAR -->
        <div class="sidebar_heading">
        	<div class="sidebar_heading_inner">
                <div class="sidebar_heading_icon">
                    <img src="/images/edit.svg">
                </div><!--SIDEBAR_HEADING_ICON-->
                <div class="sidebar_heading_text">Edit-bar</div><!--SIDEBAR_HEADING_TEXT-->
                <div class="clear"></div><!--CLEAR-->
            </div><!--SIDBAR_HEADING_INNER-->
        </div><!--SIDEBAR_HEADING-->

        <div class="sidebar_nav_item">
            <x-nav-link :href="route('business.index')" :active="request()->routeIs('business.index')">
                {{ __('Business') }}
            </x-nav-link>
        </div><!--SIDEBAR_NAV_ITEM-->

        <div class="sidebar_nav_item">
            <x-nav-link :href="route('housing_review.index')" :active="request()->routeIs('housing.index')">
                {{ __('Dwelling') }}
            </x-nav-link>
		</div><!--SIDEBAR_NAV_ITEM-->

        <div class="sidebar_heading">
        	<div class="sidebar_heading_inner">
                <div class="uploads">
                    <div class="sidebar_heading_text">
                        <p class="btn btn-primary" onclick="showsidebarFilePopup()">Upload File</p>
                    </div>
                    <div class="sidebarFilePopup" id="sidebarFilePopup">
                        <div class="modal-header">
                            {{-- <div class="title">Example Modal</div> --}}
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route("dashboard.upload.post")}}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input class="form-control" name="file" type="file" id="formFile" style="border: none;">
                                </div>
                                <input type="submit" class="btn btn-primary" style="margin-left: 25px; background-color: rgb(44, 117, 253);">
                            </form>
                        </div>
                        <button onclick="hidesidebarFilePopup()" style="border: 1px solid black; background-color: lightgray;  display: block; margin: 0 auto; height:30px; width:50px;">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div><!--SIDEBAR_NAV_COLUMN-->

    <script>

        function showsidebarPopup() {
            document.getElementById('sidebarPopup').style.display = 'block';
            document.getElementById('sidebarOverlay').style.display = 'block';
        }

        function hidesidebarPopup() {
            document.getElementById('sidebarPopup').style.display = 'none';
            document.getElementById('sidebarOverlay').style.display = 'none';
        }

        function showsidebarFilePopup() {
            document.getElementById('sidebarFilePopup').style.display = 'block';
            document.getElementById('sidebarOverlay').style.display = 'block';
        }

        function hidesidebarFilePopup() {
            document.getElementById('sidebarFilePopup').style.display = 'none';
            document.getElementById('sidebarOverlay').style.display = 'none';
        }

    </script>
    
</aside>
