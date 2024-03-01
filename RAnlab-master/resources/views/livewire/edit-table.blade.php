<div>
    <div class="table_shell">
        {{ $this->renderHeader() }}
        <div class="table_inner_container">
            <table class="standard_table">
                <thead class="">
                    <tr>
                    @foreach($this->columns() as $column)
                        <th>
                        <div class="th_inner">
                            {{ $column->label }}
                        </div>
                        </th>
                    @endforeach
                        <th>
                            <div class="th_inner"></div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        @foreach($this->columns() as $column)
                        <td>
                            <input type="text" id="{{ $column->key }}" placeholder="{{ $column->label }}"/>
                            
                        </td>
                        
                        @endforeach
                        <td>
                            <div class="td_inner">
                                <button id="save0" class="save-button">Add</button>
                            </div>
                        </td>
                    </tr>
                    @foreach($this->data() as $row)
                    <tr id="row{{ $row['id'] }}" class="data-row bg-white border-b hover:bg-gray-50">
                        @foreach($this->columns() as $column)
                        <td>
                            <div class="toggle-edit-{{ $row['id'] }} td_inner">
                            <x-dynamic-component
                                :component="$column->component"
                                :value="$row[$column->key]"
                            >
                            </x-dynamic-component>
                            </div>
                            <div style="display:none" class="toggle-edit-{{ $row['id'] }} td_inner">
                                <input type="text" id="{{ $column->key }}{{ $row['id'] }}" value="{{ $row[$column->key] }}" placeholder="{{ $column->label }}"/>
                            </div>
                        </td>
                        @endforeach
                        <td>
                            {{-- @livewire('business-edit-table') --}}
                            <div class="td_inner">
                                <button id="edit{{ $row['id'] }}" class="edit-button toggle-edit-{{ $row['id'] }}">Edit</button>
                                <button id="save{{ $row['id'] }}" style="display:none" class="edit-button save-button toggle-edit-{{ $row['id'] }}">Save</button>
                                <button wire:click="deleteBusiness({{ $row['id'] }})">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!--TABLE_INNER_CONTAINER-->
    </div>
    {{ $this->data()->links() }}
</div>

{{-- @push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all the select elements with class "regionSelect"
        var selects = document.querySelectorAll('.regionSelect');

        // Iterate through each select element
        selects.forEach(function (select) {
            // Add change event listener
            select.addEventListener('change', function () {
                // Get the corresponding input element ID
                var inputId = select.dataset.targetInput;

                // Get the corresponding input element
                var input = document.getElementById(inputId);

                // Set the value of the input to the selected option
                input.value = select.value;
            });
        });
    });
</script>
@endpush --}}



