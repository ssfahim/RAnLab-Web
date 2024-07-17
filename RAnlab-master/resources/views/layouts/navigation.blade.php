@php
    use App\Models\Category; // Category represents review request for business data
    use App\Models\HousingReviewRequest;
    use App\Models\Dashboard;
    use App\Models\Demography;
    $categoryCount = App\Models\Category::count() + App\Models\HousingReviewRequest::count();
@endphp


<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->

    <div id="nav_left">
        <!-- Logo -->
        <div class="shrink-0 items-center">
            <a href="{{ route('index') }}" style="color:white;">
            {{-- <a href="{{ route('index', ['city' => "St. John's"]) }}"> --}}
                RAnLab
                {{-- <img src="images/logo.svg" alt="Logo" class="logo-img"> --}}
            </a>
        </div>
    </div><!--NAV_LEFT-->


	<div id="nav_right">

    	<div id="nav_right_left">
        	<img src="/images/graph.svg">
        </div><!--NAV_RIGHT_LEFT-->

    	<div id="nav_right_right">
            <!-- Top Nav -->
            <div class="nav_item_container">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="nav_button">
                            <div class="nav_button_label">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>

                            <div class="nav_button_arrow">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div><!--NAV_ITEM_CONTAINER-->

            <div class="nav_item_container">
                @if(auth()->user()->email == "test@test.com")
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button type="button" class="icon-button" style="position: relative;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                width: 50px;
                                height: 50px;
                                color: #333333;
                                background: #dddddd;
                                border: none;
                                outline: none;
                                border-radius: 50%;
                                cursor:pointer;">
                                @if ($categoryCount > 0)
                                <span class="material-icons">notifications</span>
                                <span class="icon-button__badge" style="position: absolute;
                                top: -10px;
                                right: -10px;
                                width: 25px;
                                height: 25px;
                                background: red;
                                color: #ffffff;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                border-radius: 50%;">
                                {{ $categoryCount }}        
                                </span>
                                @endif
                              </button>
                            
                        </x-slot>

                        {{-- @if(auth()->user()->email == "test@test.com") --}}
                        <x-slot name="content" style="font-size: 2%">
                            <x-dropdown-link :href="route('review.index')">
                                {{ __('Show All') }}
                                @if ($categoryCount > 0)
                                    <span class="red_circle" style="
                                        display: inline-block;
                                        width: 20px;
                                        height: 20px;
                                        background-color: red;
                                        color: white;
                                        text-align: center;
                                        /* line-height: 20px; */
                                        border-radius: 50%;
                                        margin-left: 65px;
                                    "></span>
                                @endif
                            </x-dropdown-link>

                            {{-- <x-dropdown-link :href="route('review.make')">
                                {{ __('Show Notifications') }}
                            </x-dropdown-link> --}}

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <button class="nav_button">
                        <div class="nav_button_label">
                            <x-nav-link :href="route('review.message')" :active="request()->routeIs('review.message')">
                                <img src="/images/suggestion.svg">
                            </x-nav-link>
                        </div>
                    </button>
                    {{-- <form action="{{url('/add')}}" method="POST">
                        @csrf
                
                        <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    
                                    <div class="modal-header">
                                        <b style="text-align: right;"> <h3>Welcome, RAnLab!!</h3></b>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    </div>
                                        
                                    <div class="form-group">
                                        <h5 style="text-align: center;">Name</h5>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name: John Smith">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5 style="text-align: center;">Email</h5>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email: ranlab@mun.ca">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5 style="text-align: center;">Message</h5>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="message" name="message" placeholder="Your message" style="resize: vertical;"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" value="Save changes" style="background-color: rgb(0, 255, 102)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> --}}
                @endif

            </div><!--NAV_ITEM_CONTAINER-->

            <div class="clear"></div><!--CLEAR-->
		</div><!--NAV_RIGHT_RIGHT-->

        <div class="clear"></div><!--CLEAR-->
    </div><!--NAV_RIGHT-->
    {{-- <form action="{{url('/add')}}" method="POST">
        @csrf

        <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <b style="text-align: right;"> <h3>Welcome, RAnLab!!</h3></b>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                        
                    <div class="form-group">
                        <h5 style="text-align: center;">Name</h5>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name: John Smith">
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 style="text-align: center;">Email</h5>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email: ranlab@mun.ca">
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 style="text-align: center;">Message</h5>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="message" name="message" placeholder="Your message" style="resize: vertical;"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Save changes" style="background-color: rgb(0, 255, 102)">
                    </div>
                </div>
            </div>
        </div>
    </form> --}}

    <!-- Hamburger -->
    <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
    </div>

	<!-- Responsive Settings Options -->
    <div class="px-4">
        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
    </div>

    <x-responsive-nav-link :href="route('profile.edit')">
        {{ __('Profile') }}
    </x-responsive-nav-link>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>

</nav>
