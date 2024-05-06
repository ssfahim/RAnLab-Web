<!-- resources/views/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Business Record') }}
    </x-slot>

    <form method="POST" action="{{ url('/update_data/'. $dataToEdit->id) }}">
        @csrf
        @method('PUT')

        <!-- Your form fields for editing the data go here -->
        <label for="region">Region:</label><br>
        <input type="text" name="region" value="{{ $dataToEdit->region }}"><br>

        <label for="year">Year:</label><br>
        <input type="text" name="year" value="{{ $dataToEdit->year }}"><br>

        <label for="industry">Industry:</label><br>
        <input type="text" name="industry" value="{{ $dataToEdit->industry }}"><br>

        <label for="business">Business:</label><br>
        <input type="text" name="business" value="{{ $dataToEdit->business }}"><br>

        <label for="employee">Employee:</label><br>
        <input type="text" name="employee" value="{{ $dataToEdit->employee }}"><br>

        <label for="location">Location:</label><br>
        <input type="text" name="location" value="{{ $dataToEdit->location }}"><br>
        <!-- Other form fields -->

        {{-- <a class="btn btn-primary" href="{{url('review')}}" style="background-color: green;">Update</a> --}}
        <button type="submit", class="btn btn-pirmary" style="background-color: green; text-color: white;">Update</button>
    </form>
</x-app-layout>

