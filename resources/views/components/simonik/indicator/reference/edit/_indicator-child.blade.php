@foreach ($indicators as $indicator)
    <tr style="background-color: rgb({{ $background_color['red'] }}, {{ $background_color['green'] }}, {{ $background_color['blue'] }}); @if (($background_color['red'] < 127.5) && ($background_color['green'] < 127.5) && ($background_color['blue'] < 127.5)) color: white; @endif">
        <td>
            <strong>{{ empty($iter) ? "$loop->iteration." : "$iter.$loop->iteration." }}</strong> {{ $indicator->indicator }}
        </td>
        <td class="small">
            {{ $indicator->formula }}
        </td>
        <td class="text-center">
            {{ $indicator->measure }}
        </td>
        <td class="text-center">
            @forelse ($indicator->weight as $key => $value)
                <span class="badge badge-secondary">{{ $key }} : {{ $value }}</span>
            @empty
                <p>-</p>
            @endforelse
        </td>
        <td class="text-center">
            @forelse ($indicator->validity as $key => $value)
                <span class="badge badge-secondary">{{ $key }}</span>
            @empty
                <p>-</p>
            @endforelse
        </td>
        <td class="text-center">
            <span class="badge badge-secondary">
                {!! $indicator->polarity !!}
            </span>
        </td>
        <td class="text-center">
            <select class="form-control" name="preferences[]">
                <option value="root" @if (is_null($indicator->parent_horizontal_id)) selected @endif>-- INDUK --</option>
                @include('components.simonik.indicator.reference.edit._indicator-preference-child', [
                    'preferences' => $preferences,
                    'id' => $indicator->id,
                    'preference_id' => $indicator->parent_horizontal_id
                ])
            </select>

            <input type="hidden" name="indicators[]" value="{{ $indicator->id }}">
        </td>
    </tr>

    @if (!empty($indicator->childs_horizontal_recursive))
        @include('components.simonik.indicator.reference.edit._indicator-child', [
            'indicators' => $indicator->childs_horizontal_recursive,
            'preferences' => $preferences,
            'background_color' => ['red' => $background_color['red']-15, 'green' => $background_color['green']-15, 'blue' => $background_color['blue']-15],
            'iter' => empty($iter) ? "$loop->iteration" : "$iter.$loop->iteration"
        ])
    @endif
@endforeach
