<aside x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <!-- Navigation Links -->
    <div class="sidebar_nav_column">

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
                @if (auth()->user()->email === 'test@test.com') 

                    <form id="city-form" method="GET">
                        @csrf
                        <select id="regionSelect">
                            <option value="0" @if(Session::get('regionId', 91) === 0) selected @endif>
                                Select Region (Admin)
                            </option>
                            @foreach($regions as $value)
                                @if ($value)
                                    <option value="{{ $value['id'] }}"  @if(Session::get('regionId', 91) === $value['id']) selected @endif>
                                        {{ $value['geog_text'] }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </form>
                @else
                    <h2>Client Panel</h2>
                @endif
                
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
            <x-nav-link :href="route('demography.index')" :active="request()->routeIs('demography.index')">
                {{ __('Demography') }}
            </x-nav-link>
        </div><!--SIDEBAR_NAV_ITEM-->

        {{-- <div class="sidebar_nav_item">
            <x-nav-link :href="route('housing')" :active="request()->routeIs('housing')">
                {{ __('Housing') }}
            </x-nav-link>
		</div><!--SIDEBAR_NAV_ITEM--> --}}

        <!-- Economy -->
		<div class="sidebar_heading">
        	<div class="sidebar_heading_inner">
                <div class="sidebar_heading_icon">
                    <img src="/images/dollar.svg">
                </div><!--SIDEBAR_HEADING_ICON-->
                <div class="sidebar_heading_text">Economy</div><!--SIDEBAR_HEADING_TEXT-->
                <div class="clear"></div><!--CLEAR-->
        	</div><!--SIDBAR_HEADING_INNER-->
        </div><!--SIDEBAR_HEADING-->

        {{-- <div class="sidebar_nav_item">
            <x-nav-link :href="route('incomeclass')" :active="request()->routeIs('incomeclass')">
                {{ __('Income Classes') }}
            </x-nav-link>
		</div><!--SIDEBAR_NAV_ITEM--> --}}

        {{-- <div class="sidebar_nav_item">
            <x-nav-link :href="route('incomesource')" :active="request()->routeIs('incomesource')">
                {{ __('Income Sources') }}
            </x-nav-link>
		</div><!--SIDEBAR_NAV_ITEM--> --}}

        {{-- <div class="sidebar_nav_item">
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

        {{-- <div class="sidebar_nav_item">
            <x-nav-link :href="route('industries')" :active="request()->routeIs('industries')">
                {{ __('Industries') }}
            </x-nav-link>
		</div><!--SIDEBAR_NAV_ITEM--> --}}

        <div class="sidebar_nav_item">
            <x-nav-link :href="route('business.index')" :active="request()->routeIs('business.index')">
                {{ __('Business') }}
            </x-nav-link>
            {{-- <x-nav-link :href="route('business.food')">
                {{ __('FoodPrice') }}
            </x-nav-link> --}}
		</div><!--SIDEBAR_NAV_ITEM-->

        {{-- <div class="sidebar_nav_item">
            <x-nav-link :href="route('laboursuppply')" :active="request()->routeIs('laboursuppply')">
                {{ __('Labour Supply') }}
            </x-nav-link>
		</div><!--SIDEBAR_NAV_ITEM--> --}}

        {{-- <div class="sidebar_nav_item">
            <x-nav-link :href="route('labourdemand')" :active="request()->routeIs('labourdemand')">
                {{ __('Labour Demand') }}
            </x-nav-link>
		</div><!--SIDEBAR_NAV_ITEM--> --}}

    </div><!--SIDEBAR_NAV_COLUMN-->
</aside>
