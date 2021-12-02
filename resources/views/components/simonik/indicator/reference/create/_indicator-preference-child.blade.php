@foreach ($preferences as $preference)
    @if ($preference->id !== $id)
        <option value="{{ $preference->id }}" @if ($preference->id === $preference_id) selected @endif>
            {!! empty($iterSub) ? "$loop->iteration." : "$indent$iterSub.$loop->iteration." !!} {{ $preference->indicator }} @if (!$preference->referenced) &#128681; @endif
        </option>
    @endif

    @if (!empty($preference->childs_horizontal_recursive))
        @include('components.simonik.indicator.reference.create._indicator-preference-child', [
            'preferences' => $preference->childs_horizontal_recursive,
            'preference_id' => $preference_id,
            'iterSub' => empty($iterSub) ? "$loop->iteration" : "$iterSub.$loop->iteration",
            'indent' => empty($indent) ? "&emsp;" : "$indent&emsp;",
            'id' =>  $id
        ])
    @endif
@endforeach
