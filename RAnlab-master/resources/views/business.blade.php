<x-app-layout>
    <x-slot name="header">
        {{ __('Workforce > Business') }}
    </x-slot>
        @if(session()->has('message'))
            <div class="alert alert success">
                <button type="button" class="close" data-dismiss='alert' aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
        @endif
    <div class="table_outer_container">
        <livewire:businesses-table></livewire:businesses-table>
        
    </div>
    {{-- <livewire:add-business-dialog /> --}}
    
</x-app-layout>
