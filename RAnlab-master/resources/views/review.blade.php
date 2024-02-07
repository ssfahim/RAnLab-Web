<x-app-layout>
    <x-slot name="header">
        {{ __('Business Update Requests') }}
    </x-slot>

    <div class="table_outer_container multi_table_panel">
        <div class="table_shell">
            <div class="filter_panel">
                {{ __('Pending Requests') }}
            </div><!--FILTER_PANEL-->
            <div class="table_inner_container tbl_pending_requests">
                <livewire:reviews-table :isPending="true"></livewire:reviews-table>
            </div><!--TABLE_INNER_CONTAINER-->
        </div><!--TABLE_SHELL-->
    </div><!--TABLE_OUTER_CONTAINER-->
    
    <div class="table_outer_container multi_table_panel tbl_reviewed_requests">
        <div class="table_shell">
            <div class="filter_panel">
                {{ __('Reviewed Requests') }}
            </div><!--FILTER_PANEL-->
            <div class="table_inner_container">
	            <livewire:reviews-table></livewire:reviews-table>
    		</div><!--TABLE_INNER_CONTAINER-->
        </div><!--TABLE_SHELL-->
    </div><!--TABLE_OUTER_CONTAINER-->
    
        <div></div>
        
    </div>

</x-app-layout>
