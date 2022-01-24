@foreach ($levels as $level)
    <option value="{{ $level->slug }}">{{ $level->name }}</option>

    @if (!empty($level->childs_recursive))
        @include('components.simonik.indicator.paper-work.create._level-child',[
            'levels' => $level->childs_recursive
        ])
    @endif
@endforeach
