@php
    use App\Models\Category;
    use App\Models\HousingReviewRequest;

    $totalHousingRequests = App\Models\HousingReviewRequest::count();
    $categoryCount = App\Models\Category::count();
@endphp

<x-app-layout>
    <x-slot name="header">
        {{ __('Review Requests') }}
    </x-slot>
{{-- <livewire:review-amend-table></livewire:review-amend-table> --}}
    <div class="table_outer_container">
        <div class="table_shell">
            <!--FILTER_PANEL-->
            <div class='cent'>
        
                <table style=" width: 100%; text-align:center; margin-top: 30px; margin-bottom: 30px; align-items:center;" >
                    <tr>
                        <td><b>Edit Requests</b></td>
                        <td><b>Number of Requests</b></td>
                    </tr>
                    {{-- {{ dd($data) }} --}}
                    {{-- @foreach ($data as $item) --}}
                    <tr style="margin-top: 30px; margin-bottom: 30px; border-bottom: 2px solid rgb(172, 172, 172);">
                        <td>Business Edit Requests</td>
                        <td>{{$categoryCount}}</td>
                        <td style=";">
                            {{-- <a class="btn btn-primary" href="{{ route('review.business') }}">
                            <img src="/images/right-arrow.svg" style="width: 3%; background-color: none"></a> --}}
                            <x-nav-link :href="route('review.business')">
                                <img src="/images/right-arrow.svg" style="width: 3%;">
                            </x-nav-link>
                        </td>
                    </tr>
                    
                    <tr style="margin: 2%; border-bottom: 2px solid rgb(172, 172, 172);">
                        <td>Housing Edit Requests</td>
                        <td>{{$totalHousingRequests}}</td>
                        <td>
                            <x-nav-link :href="route('review.housing')">
                                <img src="/images/right-arrow.svg" style="width: 3%;">
                            </x-nav-link>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                    
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
