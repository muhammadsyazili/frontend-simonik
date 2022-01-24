@foreach ($indicators as $indicator)
    <tr style="background-color: rgb({{ $background_color['red'] }}, {{ $background_color['green'] }}, {{ $background_color['blue'] }}); @if (($background_color['red'] < 127.5) && ($background_color['green'] < 127.5) && ($background_color['blue'] < 127.5)) color: white; @endif">
        <td>
            <strong> {{ empty($prefix) ? "$loop->iteration." : "$prefix.$loop->iteration." }} </strong>{{ $indicator->indicator }}
        </td>
        <td class="small">
            {{ $indicator->formula }}
            <input type="hidden" name="id[{{ $iter }}]" value="{{ $indicator->id }}">
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
                <span class="badge badge-success">{{ $key }}</span>
            @empty
                <p>-</p>
            @endforelse
        </td>
        <td class="text-center">
            <span class="badge badge-dark">
                {!! $indicator->polarity !!}
            </span>
        </td>

        {{-- ------------------------------------------------------------------------------ --}}
        @php $match = false; @endphp
        @forelse ($indicator->targets as $target)
            @if ($target->month === 'jan') @php $match = true; @endphp <td class="text-center"><input type="number" class="form-control" name="target[{{ $indicator->id }}][jan]" value="{{ $target->value }}" style="width: 100px;"></td> @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->targets))
            <td class="text-center"></td>
        @endif

        @php $match = false; @endphp
        @forelse ($indicator->targets as $target)
            @if ($target->month === 'feb') @php $match = true; @endphp <td class="text-center"><input type="number" class="form-control" name="target[{{ $indicator->id }}][feb]" value="{{ $target->value }}" style="width: 100px;"></td> @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->targets))
            <td class="text-center"></td>
        @endif

        @php $match = false; @endphp
        @forelse ($indicator->targets as $target)
            @if ($target->month === 'mar') @php $match = true; @endphp <td class="text-center"><input type="number" class="form-control" name="target[{{ $indicator->id }}][mar]" value="{{ $target->value }}" style="width: 100px;"></td> @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->targets))
            <td class="text-center"></td>
        @endif

        @php $match = false; @endphp
        @forelse ($indicator->targets as $target)
            @if ($target->month === 'apr') @php $match = true; @endphp <td class="text-center"><input type="number" class="form-control" name="target[{{ $indicator->id }}][apr]" value="{{ $target->value }}" style="width: 100px;"></td> @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->targets))
            <td class="text-center"></td>
        @endif

        @php $match = false; @endphp
        @forelse ($indicator->targets as $target)
            @if ($target->month === 'may') @php $match = true; @endphp <td class="text-center"><input type="number" class="form-control" name="target[{{ $indicator->id }}][may]" value="{{ $target->value }}" style="width: 100px;"></td> @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->targets))
            <td class="text-center"></td>
        @endif

        @php $match = false; @endphp
        @forelse ($indicator->targets as $target)
            @if ($target->month === 'jun') @php $match = true; @endphp <td class="text-center"><input type="number" class="form-control" name="target[{{ $indicator->id }}][jun]" value="{{ $target->value }}" style="width: 100px;"></td> @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->targets))
            <td class="text-center"></td>
        @endif

        @php $match = false; @endphp
        @forelse ($indicator->targets as $target)
            @if ($target->month === 'jul') @php $match = true; @endphp <td class="text-center"><input type="number" class="form-control" name="target[{{ $indicator->id }}][jul]" value="{{ $target->value }}" style="width: 100px;"></td> @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->targets))
            <td class="text-center"></td>
        @endif

        @php $match = false; @endphp
        @forelse ($indicator->targets as $target)
            @if ($target->month === 'aug') @php $match = true; @endphp <td class="text-center"><input type="number" class="form-control" name="target[{{ $indicator->id }}][aug]" value="{{ $target->value }}" style="width: 100px;"></td> @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->targets))
            <td class="text-center"></td>
        @endif

        @php $match = false; @endphp
        @forelse ($indicator->targets as $target)
            @if ($target->month === 'sep') @php $match = true; @endphp <td class="text-center"><input type="number" class="form-control" name="target[{{ $indicator->id }}][sep]" value="{{ $target->value }}" style="width: 100px;"></td> @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->targets))
            <td class="text-center"></td>
        @endif

        @php $match = false; @endphp
        @forelse ($indicator->targets as $target)
            @if ($target->month === 'oct') @php $match = true; @endphp <td class="text-center"><input type="number" class="form-control" name="target[{{ $indicator->id }}][oct]" value="{{ $target->value }}" style="width: 100px;"></td> @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->targets))
            <td class="text-center"></td>
        @endif

        @php $match = false; @endphp
        @forelse ($indicator->targets as $target)
            @if ($target->month === 'nov') @php $match = true; @endphp <td class="text-center"><input type="number" class="form-control" name="target[{{ $indicator->id }}][nov]" value="{{ $target->value }}" style="width: 100px;"></td> @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->targets))
            <td class="text-center"></td>
        @endif

        @php $match = false; @endphp
        @forelse ($indicator->targets as $target)
            @if ($target->month === 'dec') @php $match = true; @endphp <td class="text-center"><input type="number" class="form-control" name="target[{{ $indicator->id }}][dec]" value="{{ $target->value }}" style="width: 100px;"></td> @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->targets))
            <td class="text-center"></td>
        @endif
        {{-- ------------------------------------------------------------------------------ --}}
    </tr>

    @if (!empty($indicator->validity)) @php $iter++; @endphp @endif

    @if (!empty($indicator->childs_horizontal_recursive))
        @include('components.simonik.realization.paper-work.read._indicator-child', [
            'indicators' => $indicator->childs_horizontal_recursive,
            'background_color' => ['red' => $background_color['red']-15, 'green' => $background_color['green']-15, 'blue' => $background_color['blue']-15],
            'prefix' => empty($prefix) ? "$loop->iteration" : "$prefix.$loop->iteration",
        ])
    @endif
@endforeach
