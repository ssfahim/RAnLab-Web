<x-app-layout>
    <x-slot name="header">
        {{ __('Business Update Requests') }}
    </x-slot>

    <div class="table_outer_container multi_table_panel">
        <div class="table_shell">
            <div class="filter_panel">
                {{ __('Pending Requests') }}
            </div><!--FILTER_PANEL-->
            <div class='cent'>
                <table style="margin:auto; width: 50%; text-align:center; margin-top: 30px; " >
                    <tr>
                        <td>Region</td>
                        <td>Year</td>
                        <td>Industry</td>
                        <td>Business</td>
                        <td>Employee</td>
                        <td>Location</td>
                        <td>Action</td>
                    </tr>
                    {{-- {{ dd($data) }} --}}
                    @foreach ($data as $item)
                    

                    <tr style="margin-top: 30px;">
                        <td>{{$item->region}}</td>
                        <td>{{$item->year}}</td>
                        <td>{{$item->industry}}</td>
                        <td>{{$item->business}}</td>
                        <td>{{$item->employee}}</td>
                        <td>{{!!$item->location!!}}</td>
                        <td><a class="btn btn danger" href="" style="background-color: brown;">Delete</a></td>
                    </tr>
                    @endforeach
                    
                </table>
                
            </div><!--TABLE_INNER_CONTAINER-->
        </div><!--TABLE_SHELL-->
    </div><!--TABLE_OUTER_CONTAINER-->
    
    {{-- <div class="table_outer_container multi_table_panel tbl_reviewed_requests">
        <div class="table_shell">
            <div class="filter_panel">
                {{ __('Reviewed Requests') }}
            </div><!--FILTER_PANEL-->
            <div class="table_inner_container">
	            <livewire:reviews-table></livewire:reviews-table>
    		</div><!--TABLE_INNER_CONTAINER-->
        </div><!--TABLE_SHELL-->
    </div><!--TABLE_OUTER_CONTAINER--> --}}
    
        <div></div>
        
    </div>

</x-app-layout>
