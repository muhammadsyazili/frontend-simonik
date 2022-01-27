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
        {{-- load realisasi januari --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'jan')
                @php $match = true; @endphp
                <td class="text-center">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'jan')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" class="form-control" value="{{ $target->value }}" style="width: 100px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" class="form-control" name="realization[{{ $indicator->id }}][jan]" value="{{ $realization->value }}" style="width: 100px;" @if ($realization->locked || now()->month < 1) readonly @endif>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center"></td>
        @endif
        {{-- end load realisasi januari --}}

        {{-- load realisasi februari --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'feb')
                @php $match = true; @endphp
                <td class="text-center">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'feb')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" class="form-control" value="{{ $target->value }}" style="width: 100px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" class="form-control" name="realization[{{ $indicator->id }}][feb]" value="{{ $realization->value }}" style="width: 100px;" @if ($realization->locked || now()->month < 2) readonly @endif>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center"></td>
        @endif
        {{-- end load realisasi februari --}}

        {{-- load realisasi maret --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'mar')
                @php $match = true; @endphp
                <td class="text-center">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'mar')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" class="form-control" value="{{ $target->value }}" style="width: 100px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" class="form-control" name="realization[{{ $indicator->id }}][mar]" value="{{ $realization->value }}" style="width: 100px;" @if ($realization->locked || now()->month < 3) readonly @endif>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center"></td>
        @endif
        {{-- end load realisasi maret --}}

        {{-- load realisasi april --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'apr')
                @php $match = true; @endphp
                <td class="text-center">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'apr')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" class="form-control" value="{{ $target->value }}" style="width: 100px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" class="form-control" name="realization[{{ $indicator->id }}][apr]" value="{{ $realization->value }}" style="width: 100px;" @if ($realization->locked || now()->month < 4) readonly @endif>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center"></td>
        @endif
        {{-- end load realisasi april --}}

        {{-- load realisasi mei --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'may')
                @php $match = true; @endphp
                <td class="text-center">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'may')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" class="form-control" value="{{ $target->value }}" style="width: 100px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" class="form-control" name="realization[{{ $indicator->id }}][may]" value="{{ $realization->value }}" style="width: 100px;" @if ($realization->locked || now()->month < 5) readonly @endif>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center"></td>
        @endif
        {{-- end load realisasi mei --}}

        {{-- load realisasi juni --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'jun')
                @php $match = true; @endphp
                <td class="text-center">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'jun')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" class="form-control" value="{{ $target->value }}" style="width: 100px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" class="form-control" name="realization[{{ $indicator->id }}][jun]" value="{{ $realization->value }}" style="width: 100px;" @if ($realization->locked || now()->month < 6) readonly @endif>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center"></td>
        @endif
        {{-- end load realisasi juni --}}

        {{-- load realisasi juli --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'jul')
                @php $match = true; @endphp
                <td class="text-center">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'jul')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" class="form-control" value="{{ $target->value }}" style="width: 100px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" class="form-control" name="realization[{{ $indicator->id }}][jul]" value="{{ $realization->value }}" style="width: 100px;" @if ($realization->locked || now()->month < 7) readonly @endif>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center"></td>
        @endif
        {{-- end load realisasi juli --}}

        {{-- load realisasi agustus --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'aug')
                @php $match = true; @endphp
                <td class="text-center">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'aug')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" class="form-control" value="{{ $target->value }}" style="width: 100px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" class="form-control" name="realization[{{ $indicator->id }}][aug]" value="{{ $realization->value }}" style="width: 100px;" @if ($realization->locked || now()->month < 8) readonly @endif>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center"></td>
        @endif
        {{-- end load realisasi agustus --}}

        {{-- load realisasi september --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'sep')
                @php $match = true; @endphp
                <td class="text-center">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'sep')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" class="form-control" value="{{ $target->value }}" style="width: 100px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" class="form-control" name="realization[{{ $indicator->id }}][sep]" value="{{ $realization->value }}" style="width: 100px;" @if ($realization->locked || now()->month < 9) readonly @endif>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center"></td>
        @endif
        {{-- end load realisasi september --}}

        {{-- load realisasi oktober --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'oct')
                @php $match = true; @endphp
                <td class="text-center">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'oct')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" class="form-control" value="{{ $target->value }}" style="width: 100px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" class="form-control" name="realization[{{ $indicator->id }}][oct]" value="{{ $realization->value }}" style="width: 100px;" @if ($realization->locked || now()->month < 10) readonly @endif>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center"></td>
        @endif
        {{-- end load realisasi oktober --}}

        {{-- load realisasi november --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'nov')
                @php $match = true; @endphp
                <td class="text-center">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'nov')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" class="form-control" value="{{ $target->value }}" style="width: 100px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" class="form-control" name="realization[{{ $indicator->id }}][nov]" value="{{ $realization->value }}" style="width: 100px;" @if ($realization->locked || now()->month < 11) readonly @endif>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center"></td>
        @endif
        {{-- end load realisasi november --}}

        {{-- load realisasi desember --}}
        @php $match = false; @endphp
        @forelse ($indicator->realizations as $realization)
            @if ($realization->month === 'dec')
                @php $match = true; @endphp
                <td class="text-center">
                    {{-- load target --}}
                    @foreach ($indicator->targets as $target)
                        @if ($target->month === 'dec')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">T</span>
                                </div>
                                <input type="number" class="form-control" value="{{ $target->value }}" style="width: 100px;" readonly>
                            </div>
                        @endif
                    @endforeach
                    {{-- end load target --}}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R</span>
                        </div>
                        <input type="number" class="form-control" name="realization[{{ $indicator->id }}][dec]" value="{{ $realization->value }}" style="width: 100px;" @if ($realization->locked || now()->month < 12) readonly @endif>
                    </div>
                </td>
            @endif
        @empty
            <td class="text-center"></td>
        @endforelse
        @if ($match == false && !empty($indicator->realizations))
            <td class="text-center"></td>
        @endif
        {{-- end load realisasi desember --}}
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
