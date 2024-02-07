<div class="filter_panel">
    @if(!empty($this->filters()))
    <label>Filter:</label>
    @endif
    @foreach ($this->filters() as $filter)
    <select wire:key="{{ $filter->key }}" wire:change="$emit('{{ $filter->eventName }}', $event.target.value)">
        <option disabled hidden selected>{{ $filter->label }}</option>
        @foreach ($filter->content as $key => $value)
        <option value="{{ $value }}">{{ $value }}</option>
        @endforeach
    </select>
    @endforeach
</div>
