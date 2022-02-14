@foreach ($levels as $level)
    <option value="{{ $level->slug }}">{{ $level->name }}</option>

    @if (!empty($level->childs_recursive))
        @include('components.simonik.realization.paper-work.read._level-child',[
        'levels' => $level->childs_recursive
        ])
    @endif
@endforeach
