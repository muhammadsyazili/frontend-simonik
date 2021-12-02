@foreach ($indicators as $indicator)
    <tr style="background-color: rgb({{ $background_color['red'] }}, {{ $background_color['green'] }}, {{ $background_color['blue'] }}); @if (($background_color['red'] < 127.5) && ($background_color['green'] < 127.5) && ($background_color['blue'] < 127.5)) color: white; @endif">
        <td>
            <input type="checkbox" name="indicators[]" value="{{ $indicator->id }}">
        </td>
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
                <span class="badge badge-success">{{ $key }} : {{ $value }}</span>
            @empty
                <p>-</p>
            @endforelse
        </td>
        <td class="text-center">
            @forelse ($indicator->validity as $key => $value)
                <span class="badge badge-info">{{ $key }}</span>
            @empty
                <p>-</p>
            @endforelse
        </td>
        <td class="text-center">
            <span class="badge badge-dark">
                {!! $indicator->polarity !!}
            </span>
        </td>
    </tr>

    @notEmpty($indicator->childs_horizontal_recursive)
        @include('components.simonik.indicator.paper-work.create._indicator-child', [
            'indicators' => $indicator->childs_horizontal_recursive,
            'background_color' => ['red' => $background_color['red']-15, 'green' => $background_color['green']-15, 'blue' => $background_color['blue']-15],
            'iter' => empty($iter) ? "$loop->iteration" : "$iter.$loop->iteration"
        ])
    @endNotEmpty
@endforeach
