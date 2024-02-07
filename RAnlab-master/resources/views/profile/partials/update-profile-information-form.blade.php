<section>
	<div class="profile_container">
    
    	<div class="registration_intro">

            <div class="registration_title">
                {{ __('Profile Information') }}
            </div><!--REGISTRATION_TITLE-->
            <div class="registration_subtitle">
                {{ __("Update your account's profile information and email address.") }}
            </div><!--REGISTRATION_SUBTITLE-->
    
            <div class="clear"></div><!--CLEAR-->
        </div><!--REGISTRATION_INTRO-->
      
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
    
        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
    
            <div class="form_row name_split">
            	<!-- First Name -->
            	<div class="form_row_split">
                	<x-input-label for="first_name" :value="__('First Name')" />
                	<x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required autofocus autocomplete="given-name" />
                	<x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                </div><!--FORM_ROW_SPLIT-->
                
                <!-- Last Name -->
                <div class="form_row_split">
                	<x-input-label for="last_name" :value="__('Last Name')" />
                	<x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required autofocus autocomplete="family-name" />
                	<x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                </div><!--FORM_ROW_SPLIT-->

            	<div class="clear"></div><!--CLEAR-->
            </div><!--FORM_ROW-->
    
    		<!-- Institution -->
            <div class="form_row">
                <x-input-label for="institution" :value="__('Institution')" />
                <x-text-input id="institution" name="institution" type="text" class="mt-1 block w-full" :value="old('institution', $user->institution)" required autofocus autocomplete="organization" />
                <x-input-error class="mt-2" :messages="$errors->get('institution')" />
            </div><!--FORM_ROW-->
    
    		<!-- Job Title -->
            <div class="form_row">
                <x-input-label for="job_title" :value="__('Job Title')" />
                <x-text-input id="job_title" name="job_title" type="text" class="mt-1 block w-full" :value="old('job_title', $user->job_title)" required autofocus autocomplete="organization-title" />
                <x-input-error class="mt-2" :messages="$errors->get('job_title')" />
            </div><!--FORM_ROW-->
    		            
            <!-- Phone -->
            <div class="form_row">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus autocomplete="tel-national" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div><!--FORM_ROW-->
    
    		<!-- Email -->
            <div class="form_row">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
    
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}
    
                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>
    
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div><!--FORM_ROW-->
    
            <!-- Address -->
            <div class="form_row">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" required autofocus autocomplete="street-address" />
                <x-input-error class="mt-2" :messages="$errors->get('address')" />
            </div><!--FORM_ROW-->
    
            <div class="form_row address_split">
            	<!-- City -->
            	<div class="form_row_split">	
                	<x-input-label for="city" :value="__('City')" />
                	<x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $user->city)" required autofocus autocomplete="address-level2" />
                	<x-input-error class="mt-2" :messages="$errors->get('city')" />
                </div><!--FORM_ROW_SPLIT-->
                
                <!-- Province -->
                <div class="form_row_split">
                	<x-input-label for="province" :value="__('Province')" />
                	<x-text-input id="province" name="province" type="text" class="mt-1 block w-full" :value="old('province', $user->email)" required autofocus autocomplete="address-level1" />
                	<x-input-error class="mt-2" :messages="$errors->get('province')" />
                </div><!--FORM_ROW_SPLIT-->

            	<div class="clear"></div><!--CLEAR-->
            </div><!--FORM_ROW-->
    
            <!-- Postal Code -->
            <div class="form_row">
                <x-input-label for="postal_code" :value="__('Postal Code')" />
                <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" :value="old('postal_code', $user->postal_code)" required autofocus autocomplete="postal-code" />
                <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
            </div><!--FORM_ROW-->
    
            <div class="form_row register_submit_split">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
    
                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Saved.') }}</p>
                @endif
            </div><!--FORM_ROW-->
        </form>
        
    </div><!--PROFILE_CONTAINER-->
</section>
