@php
    use App\Models\Demography;
    use App\Models\Dashboard;
    $regions = Demography::orderBy('geog_text', 'asc')->get();
@endphp
<x-app-layout>
    {{-- <div id="outer_header"> --}}
    <x-slot name="header">
        {{ __('Population > Housing') }}
    </x-slot>
    {{-- </div> --}}
    @if(session()->has('message'))
        <div class="alert alert success" style="background-color: lightgreen">
            <button type="button" class="close" data-dismiss='alert' aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
    @endif
    <div class="table_outer_container">
        {{-- <livewire:housing-review-table-header></livewire:housing-review-table-header> --}}
        <livewire:housing-review-table></livewire:housing-review-table>
        
    </div>

</x-app-layout>