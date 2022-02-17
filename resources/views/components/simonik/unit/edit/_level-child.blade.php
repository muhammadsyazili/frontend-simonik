@foreach ($levels as $level)
    <option value="{{ $level->slug }}" @if ($level->id === $level_id) selected @endif>{{ $level->name }}</option>

    @if (!empty($level->childs_recursive))
        @include('components.simonik.unit.edit._level-child',[
        'levels' => $level->childs_recursive,
        'level_id' => $level_id,
        ])
    @endif
@endforeach
