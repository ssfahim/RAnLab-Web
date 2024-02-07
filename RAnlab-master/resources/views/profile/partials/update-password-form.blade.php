<section>
	<div class="profile_container">
    
    	<div class="registration_intro">

            <div class="registration_title">
                {{ __('Update Password') }}
            </div><!--REGISTRATION_TITLE-->
            <div class="registration_subtitle">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </div><!--REGISTRATION_SUBTITLE-->
    
            <div class="clear"></div><!--CLEAR-->
        </div><!--REGISTRATION_INTRO-->
        
        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
    
            <div class="form_row">
                <x-input-label for="current_password" :value="__('Current Password')" />
                <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div><!--FORM_ROW-->
    
            <div class="form_row">
                <x-input-label for="password" :value="__('New Password')" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div><!--FORM_ROW-->
    
            <div class="form_row">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div><!--FORM_ROW-->
    
            <div class="form_row">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
    
                @if (session('status') === 'password-updated')
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
