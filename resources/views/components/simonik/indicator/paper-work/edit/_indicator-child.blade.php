@foreach ($super_master_indicators as $indicator)
    <tr style="background-color: rgb({{ $background_color['red'] }}, {{ $background_color['green'] }}, {{ $background_color['blue'] }}); @if (($background_color['red'] < 127.5) && ($background_color['green'] < 127.5) && ($background_color['blue'] < 127.5)) color: white; @endif">
        <td>
            @php $filtered = $indicators->where('code', $indicator->id)->all(); @endphp
            <input type="checkbox" name="indicators[]" value="{{ $indicator->id }}" @if (count($filtered) > 0) checked @endif>
        </td>
        <td>
            <p>
                <strong>{{ empty($iter) ? "$loop->iteration." : "$iter.$loop->iteration." }}</strong>
                @if (count($filtered) > 0)
                    @foreach ($filtered as $item)
                        {{ $item->indicator }}
                    @endforeach
                @else
                    {{ $indicator->indicator }}
                @endif
            </p>
        </td>
        <td class="small">
            <p>
                @if (count($filtered) > 0)
                    @foreach ($filtered as $item)
                        {{ $item->formula }}
                    @endforeach
                @else
                    {{ $indicator->formula }}
                @endif
            </p>
        </td>
        <td class="text-center">
            @if (count($filtered) > 0)
                @foreach ($filtered as $item)
                    {{ $item->measure }}
                @endforeach
            @else
                {{ $indicator->measure }}
            @endif
        </td>
        <td class="text-center">
            @if (count($filtered) > 0)
                @foreach ($filtered as $item)
                    @forelse ($item->weight as $key => $value)
                        <span class="badge badge-success">{{ $key }} : {{ $value }}</span>
                    @empty
                        <p>-</p>
                    @endforelse
                @endforeach
            @else
                @forelse ($indicator->weight as $key => $value)
                    <span class="badge badge-success">{{ $key }} : {{ $value }}</span>
                @empty
                    <p>-</p>
                @endforelse
            @endif
        </td>
        <td class="text-center">
            @if (count($filtered) > 0)
                @foreach ($filtered as $item)
                    @forelse ($item->validity as $key => $value)
                        <span class="badge badge-info">{{ $key }}</span>
                    @empty
                        <p>-</p>
                    @endforelse
                @endforeach
            @else
                @forelse ($indicator->validity as $key => $value)
                    <span class="badge badge-info">{{ $key }}</span>
                @empty
                    <p>-</p>
                @endforelse
            @endif
        </td>
        <td class="text-center">
            @if (count($filtered) > 0)
                @foreach ($filtered as $item)
                    <span class="badge badge-dark">
                        {!! $item->polarity !!}
                    </span>
                @endforeach
            @else
                <span class="badge badge-dark">
                    {!! $indicator->polarity !!}
                </span>
            @endif
        </td>
    </tr>

    @notEmpty($indicator->childs_horizontal_recursive)
        @include('components.simonik.indicator.paper-work.edit._indicator-child', [
            'super_master_indicators' => $indicator->childs_horizontal_recursive,
            'indicators' => $indicators,
            'background_color' => ['red' => $background_color['red']-15, 'green' => $background_color['green']-15, 'blue' => $background_color['blue']-15],
            'iter' => empty($iter) ? "$loop->iteration" : "$iter.$loop->iteration"
        ])
    @endNotEmpty
@endforeach
