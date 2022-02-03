@foreach ($super_master_indicators as $indicator)
    <tr style="background-color: rgb({{ $background_color['red'] }}, {{ $background_color['green'] }}, {{ $background_color['blue'] }}); @if (($background_color['red'] < 127.5) && ($background_color['green'] < 127.5) && ($background_color['blue'] < 127.5)) color: white; @endif">
        <td>
            @php $filtered = $indicators->firstWhere('code', $indicator->id); @endphp
            <input type="checkbox" name="indicators[]" value="@if (!is_null($filtered)){{ $filtered->id }}@else{{ $indicator->id }}@endif" @if (!is_null($filtered)){{ 'checked' }}@endif>
        </td>
        <td>
            <strong>{{ empty($iter) ? "$loop->iteration." : "$iter.$loop->iteration." }}</strong>
            @if (!is_null($filtered)){{ $filtered->indicator }}@else{{ $indicator->indicator }}@endif
        </td>
        <td class="small">
            @if (!is_null($filtered)){{ $filtered->formula }}@else{{ $indicator->formula }}@endif
        </td>
        <td class="text-center">
            @if (!is_null($filtered)){{ $filtered->measure }}@else{{ $indicator->measure }}@endif
        </td>
        <td class="text-center">
            @if (!is_null($filtered))
                @forelse ($filtered->weight as $key => $value)
                    <span class="badge badge-secondary">{{ $key }} : {{ $value }}</span>
                @empty
                    <p>-</p>
                @endforelse
            @else
                @forelse ($indicator->weight as $key => $value)
                    <span class="badge badge-secondary">{{ $key }} : {{ $value }}</span>
                @empty
                    <p>-</p>
                @endforelse
            @endif
        </td>
        <td class="text-center">
            @if (!is_null($filtered))
                @forelse ($filtered->validity as $key => $value)
                    <span class="badge badge-secondary">{{ $key }}</span>
                @empty
                    <p>-</p>
                @endforelse
            @else
                @forelse ($indicator->validity as $key => $value)
                    <span class="badge badge-secondary">{{ $key }}</span>
                @empty
                    <p>-</p>
                @endforelse
            @endif
        </td>
        <td class="text-center">
            @if (!is_null($filtered))
                <span class="badge badge-secondary">
                    {!! $filtered->polarity !!}
                </span>
            @else
                <span class="badge badge-secondary">
                    {!! $indicator->polarity !!}
                </span>
            @endif
        </td>
    </tr>

    @if (!empty($indicator->childs_horizontal_recursive))
        @include('components.simonik.indicator.paper-work.edit._indicator-child', [
            'super_master_indicators' => $indicator->childs_horizontal_recursive,
            'indicators' => $indicators,
            'background_color' => ['red' => $background_color['red']-15, 'green' => $background_color['green']-15, 'blue' => $background_color['blue']-15],
            'iter' => empty($iter) ? "$loop->iteration" : "$iter.$loop->iteration"
        ])
    @endif
@endforeach
