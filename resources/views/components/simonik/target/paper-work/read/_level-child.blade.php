@foreach ($levels as $level)
    <option value="{{ $level->slug }}">{{ $level->name }}</option>

    @notEmpty($level->childs_recursive)
        @include('components.simonik.target.paper-work.read._level-child',[
            'levels' => $level->childs_recursive
        ])
    @endNotEmpty
@endforeach
