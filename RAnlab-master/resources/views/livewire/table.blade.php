{{-- <div>
    <div class="table_shell">
        {{ $this->renderHeader() }}
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
            </tr>
        </thead>
        <tbody>
            @foreach($this->data() as $row)
            <tr id="row{{ $row['id'] }}" class="data-row bg-white border-b hover:bg-gray-50">
                @foreach($this->columns() as $column)
                <td>
                    <div class="td_inner">
                    <x-dynamic-component
                        :component="$column->component"
                        :value="$row[$column->key]"
                    >
                    </x-dynamic-component>
                    </div>
                </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    {{ $this->data()->links() }}
</div> --}}


<div>
    <div class="table_shell">
        {{ $this->renderHeader() }}
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
                </tr>
            </thead>
            <tbody>
                @foreach($this->data() as $row)
                    <tr id="row{{ $row['id'] }}" class="data-row bg-white border-b hover:bg-gray-50">
                        @foreach($this->columns() as $column)
                            <td>
                                <div class="td_inner">
                                    @if($column->key === 'location')
                                        <a href="{{ $row[$column->key] }}" target="_blank">{{ $row[$column->key] }}</a>
                                    @else
                                        <x-dynamic-component :component="$column->component" :value="$row[$column->key]" />
                                    @endif
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $this->data()->links() }}
</div>
