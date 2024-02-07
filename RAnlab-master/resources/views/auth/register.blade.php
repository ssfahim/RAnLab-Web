<x-guest-layout>

	<div class="registration_intro">

    	<div class="registration_title">
        	RAnLab
        </div><!--REGISTRATION_TITLE-->
        <div class="registration_subtitle">
        	Welcome!  Please complete your profile.
        </div><!--REGISTRATION_SUBTITLE-->

        <div class="clear"></div><!--CLEAR-->
    </div><!--REGISTRATION_INTRO-->

    <form method="POST" action="{{ route('register') }}">
        @csrf

		<!-- Name -->
        <div class="form_row name_split">

        	<!-- First Name -->
        	<div class="form_row_split">
            	<x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="given-name" placeholder="First Name*" />
            	<x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div><!--FORM_ROW_SPLIT-->

            <!-- Last Name -->
            <div class="form_row_split">
            	<x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="family-name" placeholder="Last Name*"/>
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div><!--FORM_ROW_SPLIT-->

            <div class="clear"></div><!--CLEAR-->
        </div><!--FORM_ROW-->

        <!-- Institution -->
        <div class="form_row">
        	<x-text-input id="institution" name="institution" type="text" class="mt-1 block w-full" :value="old('institution')" required autofocus autocomplete="organization" placeholder="Institution" />
            <x-input-error class="mt-2" :messages="$errors->get('institution')" />
        </div><!--FORM_ROW-->

        <!-- Job Title -->
        <div class="form_row">
        	<x-text-input id="job_title" name="job_title" type="text" class="mt-1 block w-full" :value="old('job_title')" required autofocus autocomplete="organization-title" placeholder="Job Title" />
            <x-input-error class="mt-2" :messages="$errors->get('job_title')" />
        </div><!--FORM_ROW-->

        <!-- Phone -->
        <div class="form_row">
        	<x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')" required autofocus autocomplete="tel-national" placeholder="Phone Number" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')"  />
        </div><!--FORM_ROW-->

        <!-- Email Address -->
        <div class="form_row">
        	<x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username"  placeholder="Email Address"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div><!--FORM_ROW-->

        <div class="form_row">
        	<div class="form_section_title">
            	Work Address
            </div><!--FORM_SECTION_TITLE-->
            <div class="clear"></div><!--CLEAR-->
        </div><!--FORM_ROW-->

        <!-- Address -->
        <div class="form_row">
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address')" required autofocus autocomplete="street-address" placeholder="Street Address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div><!--FORM_ROW-->


        <div class="form_row address_split">

            <!-- City/Town -->
            <div class="form_row_split">
            	<x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city')" required autofocus autocomplete="address-level2" placeholder="City/Town" />
                <x-input-error class="mt-2" :messages="$errors->get('city')" />
            </div><!--FORM_ROW_SPLIT-->

            <!-- Province -->
        	<div class="form_row_split">
            	<x-text-input id="province" name="province" type="text" class="mt-1 block w-full" :value="old('province')" required autofocus autocomplete="address-level1" placeholder="Province" />
            	<x-input-error class="mt-2" :messages="$errors->get('province')" />
            </div><!--FORM_ROW_SPLIT-->

            <div class="clear"></div><!--CLEAR-->
        </div><!--FORM_ROW-->

        <!-- Postal Code -->
        <div class="form_row">
            <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" :value="old('postal_code')" required autofocus autocomplete="postal-code" placeholder="Postal Code" />
            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
        </div><!--FORM_ROW-->

        <!-- Password -->
        <div class="form_row">
        	<x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"  placeholder="Password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div><!--FORM_ROW-->

        <!-- Confirm Password -->
        <div class="form_row">
        	<x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm Password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div><!--FORM_ROW-->

        <div class="form_row register_submit_split">
        	<div class="form_row_split">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div><!--FORM_ROW_SPLIT-->

            <div class="form_row_split">
            	<x-primary-button class="proceed_button">
                    {{ __('Register') }}
                </x-primary-button>
            </div><!--FORM_ROW_SPLIT-->
            <div class="clear"></div><!--CLEAR-->
        </div><!--FORM_ROW-->

    </form>
</x-guest-layout>
