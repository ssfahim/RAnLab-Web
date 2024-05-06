<!-- resources/views/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Housing Record') }}
    </x-slot>

    <form method="POST" action="{{ url('housing_review/update_data/'. $dataToEdit->id) }}">
        @csrf
        @method('PUT')

        <!-- Your form fields for editing the data go here -->
        <label for="business">Region ID</label><br>
        <input type="text" name="CSDID" value="{{ $dataToEdit->CSDID }}"><br>
        
        <label for="region">Region:</label><br>
        <input type="text" name="CSDTxt" value="{{ $dataToEdit->CSDTxt }}"><br>

        <label for="year">Year:</label><br>
        <input type="text" name="year" value="{{ $dataToEdit->year }}"><br>

        <label for="industry">Number of Bedrooms:</label><br>
        <input type="text" name="number_Of_bedrooms" value="{{ $dataToEdit->number_Of_bedrooms }}"><br>

        <label for="employee">House Structure:</label><br>
        <input type="text" name="house_structure" value="{{ $dataToEdit->house_structure }}" style="max-width: 100%;"><br>

        <label for="location">Location:</label><br>
        <input type="text" name="location" value="{{ $dataToEdit->location }}"><br>
        <!-- Other form fields -->

        {{-- <a class="btn btn-primary" href="{{url('review')}}" style="background-color: green;">Update</a> --}}
        <button type="submit", class="btn btn-pirmary" style="background-color: green; text-color: white;">Update</button>
    </form>
</x-app-layout>

