<x-app-layout>
    <div id="outer_header"><x-slot name="header">
        <div id="inner_header">{{ __('Population > Housing') }}</div>
    </x-slot>
    </div>

    <div class="table_outer_container">
        <livewire:housing-table></livewire:housing-table>
    </div>

</x-app-layout>
