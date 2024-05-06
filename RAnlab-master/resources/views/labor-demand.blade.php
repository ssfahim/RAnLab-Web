<x-app-layout>
    <div id="outer_header"><x-slot name="header">
        <div id="inner_header">{{ __('Workforce > Labour Demand') }}</div>
    </x-slot>
    </div>

    <div class="table_outer_container">
        <livewire:labour-table></livewire:labour-table>
    </div>

</x-app-layout>
