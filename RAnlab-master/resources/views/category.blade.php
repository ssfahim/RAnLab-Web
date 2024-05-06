<x-app-layout>
    <x-slot name="header">
        {{ __('Business Update Requests') }}
    </x-slot>
    <x-slot name="header">
        {{ __('Pending Requests') }}
    </x-slot>

    <div class="table_outer_container multi_table_panel">
        <div class="table_shell">
            <!--FILTER_PANEL-->
            <div class='cent'>
                @if(App\Models\Category::count()>0)
                    <table style=" width: 100%; text-align:center; margin-top: 30px; margin-bottom: 30px;" >
                        <tr>
                            <td><b>Region</b></td>
                            <td><b>Year</b></td>
                            <td><b>Industry</b></td>
                            <td><b>Business</b></td>
                            <td><b>Employee</b></td>
                            <td><b>Location</b></td>
                            <td><b>Action</b></td>
                        </tr>
                        {{-- {{ dd($data) }} --}}
                        @foreach ($data as $item)
                        <tr style="margin-top: 30px; margin-bottom: 30px; border-bottom: 2px solid rgb(172, 172, 172);">
                            <td>{{$item->region}}</td>
                            <td>{{$item->year}}</td>
                            <td>{{$item->industry}}</td>
                            <td>{{$item->business}}</td>
                            <td>{{$item->employee}}</td>
                            <td><a href="{{$item->location}}" target="_blank">{{$item->location}}</a></td>
                            {{-- <td>{{$item->location}}</td>
                            <td>{{$item->location}}</td> --}}
                            {{-- <td><a href="{!! $item->location !!}" target="_blank">Click here to view location</a></td> --}}
                            <td>
                                <a onclick="return confirm('Are you sure to reject!')" 
                                class="btn btn-danger" href="{{url('delete',$item->id)}}" style="background-color: brown;">Reject</a>
                                
                                <a onclick="return confirm('Are you sure to accept!')" 
                                class="btn btn-success" href="{{url('accept',$item->id)}}" style="background-color: green;">Accept</a> {{-- this accept is in the ReviewController --}}
                        
                                <a class="btn btn-primary" href="{{url('edit_data',$item->id)}}" style="background-color: blue;">Edit</a>
                            </td>
                        </tr>
                        
                        </tr>
                        @endforeach
                        
                    </table>
                @else
                    <h1>No Request to Show!</h1>
                @endif
            </div><!--TABLE_INNER_CONTAINER-->
        </div><!--TABLE_SHELL-->
    </div><!--TABLE_OUTER_CONTAINER-->
 
    </div>

</x-app-layout>
