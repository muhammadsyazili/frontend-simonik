@foreach ($indicators as $indicator)
    <tr style="background-color: rgb({{ $background_color['red'] }}, {{ $background_color['green'] }}, {{ $background_color['blue'] }}); @if (($background_color['red'] < 127.5) && ($background_color['green'] < 127.5) && ($background_color['blue'] < 127.5)) color: white; @endif">
        <td class="small">
            <strong> {{ empty($prefix) ? "$loop->iteration." : "$prefix.$loop->iteration." }} </strong>{{ $indicator->indicator }}
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

        {{-- ------------------------------------------------------------------------------ --}}
        {{-- load realisasi januari --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'jan')
                @php $match = true; @endphp
                <td class="text-center small">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'jan')
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" step="any" min="0" class="form-control" value="{{ $target->value }}" style="width: 200px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" step="any" min="0" class="form-control" value="{{ $realization->value }}" style="width: 200px;" readonly>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center small"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center small"></td>
        @endif
        {{-- end load realisasi januari --}}

        {{-- load realisasi februari --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'feb')
                @php $match = true; @endphp
                <td class="text-center small">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'feb')
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" step="any" min="0" class="form-control" value="{{ $target->value }}" style="width: 200px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" step="any" min="0" class="form-control" value="{{ $realization->value }}" style="width: 200px;" readonly>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center small"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center small"></td>
        @endif
        {{-- end load realisasi februari --}}

        {{-- load realisasi maret --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'mar')
                @php $match = true; @endphp
                <td class="text-center small">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'mar')
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" step="any" min="0" class="form-control" value="{{ $target->value }}" style="width: 200px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" step="any" min="0" class="form-control" value="{{ $realization->value }}" style="width: 200px;" readonly>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center small"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center small"></td>
        @endif
        {{-- end load realisasi maret --}}

        {{-- load realisasi april --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'apr')
                @php $match = true; @endphp
                <td class="text-center small">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'apr')
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" step="any" min="0" class="form-control" value="{{ $target->value }}" style="width: 200px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" step="any" min="0" class="form-control" value="{{ $realization->value }}" style="width: 200px;" readonly>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center small"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center small"></td>
        @endif
        {{-- end load realisasi april --}}

        {{-- load realisasi mei --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'may')
                @php $match = true; @endphp
                <td class="text-center small">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'may')
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" step="any" min="0" class="form-control" value="{{ $target->value }}" style="width: 200px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" step="any" min="0" class="form-control" value="{{ $realization->value }}" style="width: 200px;" readonly>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center small"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center small"></td>
        @endif
        {{-- end load realisasi mei --}}

        {{-- load realisasi juni --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'jun')
                @php $match = true; @endphp
                <td class="text-center small">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'jun')
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" step="any" min="0" class="form-control" value="{{ $target->value }}" style="width: 200px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" step="any" min="0" class="form-control" value="{{ $realization->value }}" style="width: 200px;" readonly>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center small"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center small"></td>
        @endif
        {{-- end load realisasi juni --}}

        {{-- load realisasi juli --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'jul')
                @php $match = true; @endphp
                <td class="text-center small">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'jul')
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" step="any" min="0" class="form-control" value="{{ $target->value }}" style="width: 200px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" step="any" min="0" class="form-control" value="{{ $realization->value }}" style="width: 200px;" readonly>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center small"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center small"></td>
        @endif
        {{-- end load realisasi juli --}}

        {{-- load realisasi agustus --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'aug')
                @php $match = true; @endphp
                <td class="text-center small">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'aug')
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" step="any" min="0" class="form-control" value="{{ $target->value }}" style="width: 200px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" step="any" min="0" class="form-control" value="{{ $realization->value }}" style="width: 200px;" readonly>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center small"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center small"></td>
        @endif
        {{-- end load realisasi agustus --}}

        {{-- load realisasi september --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'sep')
                @php $match = true; @endphp
                <td class="text-center small">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'sep')
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" step="any" min="0" class="form-control" value="{{ $target->value }}" style="width: 200px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" step="any" min="0" class="form-control" value="{{ $realization->value }}" style="width: 200px;" readonly>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center small"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center small"></td>
        @endif
        {{-- end load realisasi september --}}

        {{-- load realisasi oktober --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'oct')
                @php $match = true; @endphp
                <td class="text-center small">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'oct')
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" step="any" min="0" class="form-control" value="{{ $target->value }}" style="width: 200px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" step="any" min="0" class="form-control" value="{{ $realization->value }}" style="width: 200px;" readonly>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center small"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center small"></td>
        @endif
        {{-- end load realisasi oktober --}}

        {{-- load realisasi november --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'nov')
                @php $match = true; @endphp
                <td class="text-center small">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'nov')
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" step="any" min="0" class="form-control" value="{{ $target->value }}" style="width: 200px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" step="any" min="0" class="form-control" value="{{ $realization->value }}" style="width: 200px;" readonly>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center small"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center small"></td>
        @endif
        {{-- end load realisasi november --}}

        {{-- load realisasi desember --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'dec')
                @php $match = true; @endphp
                <td class="text-center small">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'dec')
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" step="any" min="0" class="form-control" value="{{ $target->value }}" style="width: 200px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" step="any" min="0" class="form-control" value="{{ $realization->value }}" style="width: 200px;" readonly>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center small"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center small"></td>
        @endif
        {{-- end load realisasi desember --}}
        {{-- ------------------------------------------------------------------------------ --}}
    </tr>

    @if (!empty($indicator->validity)) @php $iter++; @endphp @endif

    @if (!empty($indicator->childs_horizontal_recursive))
        @include('components.simonik._indicator-child', [
            'indicators' => $indicator->childs_horizontal_recursive,
            'background_color' => ['red' => $background_color['red']-15, 'green' => $background_color['green']-15, 'blue' => $background_color['blue']-15],
            'prefix' => empty($prefix) ? "$loop->iteration" : "$prefix.$loop->iteration",
        ])
    @endif
@endforeach
