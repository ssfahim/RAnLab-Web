<!-- business-table-header.blade.php -->

<livewire:business-table-header></livewire:business-table-header>

<div class="update_panel">
    @if(auth()->check())
        @if(auth()->user()->email === 'test@test.com')
            <p>User Email: {{ auth()->user()->email }}</p>
            <input type="button" onclick="window.location='{{ route("admin.business.edit", 1) }}'" value="Update Businesses" />
        @else
        <livewire:add-business-dialog />
            {{-- <input type="button" wire:click="showAddBusinessDialog" value="Add New Business" /> --}}
        @endif
    @else
        <p>User not authenticated</p>
    @endif
</div>






{{-- <div class="update_panel">
    <input type="button" onclick="window.location='{{ route("admin.business.edit", 1) }}'" value="Update Businesses" />
</div> --}}