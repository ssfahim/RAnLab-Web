<x-app-layout>
    <div id="outer_header"><x-slot name="header">
        <div id="inner_header">{{ __('Population > Demography') }}</div>
    </x-slot>
    </div>

    <div class="table_outer_container">
        <livewire:demographies-table></livewire:demographies-table>
    </div>

</x-app-layout>
