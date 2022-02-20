@foreach ($indicators as $indicator)
    <tr style="background-color: rgb({{ $background_color['red'] }}, {{ $background_color['green'] }}, {{ $background_color['blue'] }}); @if (($background_color['red'] < 127.5) && ($background_color['green'] < 127.5) && ($background_color['blue'] < 127.5)) color: white; @endif">
        <td class="small">
            <input type="checkbox" class="check-item" name="indicators[]" value="{{ $indicator->id }}">
        </td>
        <td class="small">
            <strong>{{ empty($iter) ? "$loop->iteration." : "$iter.$loop->iteration." }}</strong> {{ $indicator->indicator }}
        </td>
        <td class="small">
            <small>{{ $indicator->formula }}</small>
        </td>
        <td class="text-center small">
            {{ $indicator->measure }}
        </td>
        <td class="text-center small">
            @forelse ($indicator->weight as $key => $value)
                <span class="badge badge-secondary">{{ $key }} : {{ $value }}</span>
            @empty
                <p>-</p>
            @endforelse
        </td>
        <td class="text-center small">
            @forelse ($indicator->validity as $key => $value)
                <span class="badge badge-secondary">{{ $key }}</span>
            @empty
                <p>-</p>
            @endforelse
        </td>
        <td class="text-center small">
            <span class="badge badge-secondary">
                {!! $indicator->polarity !!}
            </span>
        </td>
    </tr>

    @if (!empty($indicator->childs_horizontal_recursive))
        @include('components.simonik.indicator.paper-work.create._indicator-child', [
            'indicators' => $indicator->childs_horizontal_recursive,
            'background_color' => ['red' => $background_color['red']-15, 'green' => $background_color['green']-15, 'blue' => $background_color['blue']-15],
            'iter' => empty($iter) ? "$loop->iteration" : "$iter.$loop->iteration"
        ])
    @endif
@endforeach
