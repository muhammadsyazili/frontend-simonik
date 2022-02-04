@foreach ($indicators as $indicator)
    <tr style="background-color: rgb({{ $background_color['red'] }}, {{ $background_color['green'] }}, {{ $background_color['blue'] }}); @if (($background_color['red'] < 127.5) && ($background_color['green'] < 127.5) && ($background_color['blue'] < 127.5)) color: white; @endif">
        <td>
            <strong> {{ empty($prefix) ? "$loop->iteration." : "$prefix.$loop->iteration." }} </strong>{{ $indicator->indicator }}
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
                        <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][jan]" value="{{ $realization->value }}" style="width: 200px;" @if (!in_array(request()->cookie('X-Role'), ['super-admin', 'admin'])) @if ($realization->locked) @if (now()->month !== 1) readonly @endif @endif @endif>
                        @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                            <div class="input-group-append">
                                <button class="btn btn-info lock-action" type="button" data-id="{{ $indicator->id }}" data-month="jan" data-toggle="tooltip" data-placement="bottom" title="@if ($realization->locked) ststus: locked @else status: un-locked @endif">@if ($realization->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                            </div>
                        @endif
                    </div>

                    <p class="text-info"><small>Last update: {{ \Carbon\Carbon::parse($realization->updated_at)->format('d/m/Y H:i:s') }}</small></p>
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
                        <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][feb]" value="{{ $realization->value }}" style="width: 200px;" @if (!in_array(request()->cookie('X-Role'), ['super-admin', 'admin'])) @if ($realization->locked) @if (now()->month !== 2) readonly @endif @endif @endif>
                        @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                            <div class="input-group-append">
                                <button class="btn btn-info lock-action" type="button" data-id="{{ $indicator->id }}" data-month="feb" data-toggle="tooltip" data-placement="bottom" title="@if ($realization->locked) ststus: locked @else status: un-locked @endif">@if ($realization->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                            </div>
                        @endif
                    </div>

                    <p class="text-info"><small>Last update: {{ \Carbon\Carbon::parse($realization->updated_at)->format('d/m/Y H:i:s') }}</small></p>
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
                        <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][mar]" value="{{ $realization->value }}" style="width: 200px;" @if (!in_array(request()->cookie('X-Role'), ['super-admin', 'admin'])) @if ($realization->locked) @if (now()->month !== 3) readonly @endif @endif @endif>
                        @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                            <div class="input-group-append">
                                <button class="btn btn-info lock-action" type="button" data-id="{{ $indicator->id }}" data-month="mar" data-toggle="tooltip" data-placement="bottom" title="@if ($realization->locked) ststus: locked @else status: un-locked @endif">@if ($realization->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                            </div>
                        @endif
                    </div>

                    <p class="text-info"><small>Last update: {{ \Carbon\Carbon::parse($realization->updated_at)->format('d/m/Y H:i:s') }}</small></p>
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
                        <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][apr]" value="{{ $realization->value }}" style="width: 200px;" @if (!in_array(request()->cookie('X-Role'), ['super-admin', 'admin'])) @if ($realization->locked) @if (now()->month !== 4) readonly @endif @endif @endif>
                        @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                            <div class="input-group-append">
                                <button class="btn btn-info lock-action" type="button" data-id="{{ $indicator->id }}" data-month="apr" data-toggle="tooltip" data-placement="bottom" title="@if ($realization->locked) ststus: locked @else status: un-locked @endif">@if ($realization->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                            </div>
                        @endif
                    </div>

                    <p class="text-info"><small>Last update: {{ \Carbon\Carbon::parse($realization->updated_at)->format('d/m/Y H:i:s') }}</small></p>
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
                        <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][may]" value="{{ $realization->value }}" style="width: 200px;" @if (!in_array(request()->cookie('X-Role'), ['super-admin', 'admin'])) @if ($realization->locked) @if (now()->month !== 5) readonly @endif @endif @endif>
                        @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                            <div class="input-group-append">
                                <button class="btn btn-info lock-action" type="button" data-id="{{ $indicator->id }}" data-month="may" data-toggle="tooltip" data-placement="bottom" title="@if ($realization->locked) ststus: locked @else status: un-locked @endif">@if ($realization->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                            </div>
                        @endif
                    </div>

                    <p class="text-info"><small>Last update: {{ \Carbon\Carbon::parse($realization->updated_at)->format('d/m/Y H:i:s') }}</small></p>
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
                        <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][jun]" value="{{ $realization->value }}" style="width: 200px;" @if (!in_array(request()->cookie('X-Role'), ['super-admin', 'admin'])) @if ($realization->locked) @if (now()->month !== 6) readonly @endif @endif @endif>
                        @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                            <div class="input-group-append">
                                <button class="btn btn-info lock-action" type="button" data-id="{{ $indicator->id }}" data-month="jun" data-toggle="tooltip" data-placement="bottom" title="@if ($realization->locked) ststus: locked @else status: un-locked @endif">@if ($realization->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                            </div>
                        @endif
                    </div>

                    <p class="text-info"><small>Last update: {{ \Carbon\Carbon::parse($realization->updated_at)->format('d/m/Y H:i:s') }}</small></p>
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
                        <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][jul]" value="{{ $realization->value }}" style="width: 200px;" @if (!in_array(request()->cookie('X-Role'), ['super-admin', 'admin'])) @if ($realization->locked) @if (now()->month !== 7) readonly @endif @endif @endif>
                        @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                            <div class="input-group-append">
                                <button class="btn btn-info lock-action" type="button" data-id="{{ $indicator->id }}" data-month="jul" data-toggle="tooltip" data-placement="bottom" title="@if ($realization->locked) ststus: locked @else status: un-locked @endif">@if ($realization->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                            </div>
                        @endif
                    </div>

                    <p class="text-info"><small>Last update: {{ \Carbon\Carbon::parse($realization->updated_at)->format('d/m/Y H:i:s') }}</small></p>
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
                        <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][aug]" value="{{ $realization->value }}" style="width: 200px;" @if (!in_array(request()->cookie('X-Role'), ['super-admin', 'admin'])) @if ($realization->locked) @if (now()->month !== 8) readonly @endif @endif @endif>
                        @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                            <div class="input-group-append">
                                <button class="btn btn-info lock-action" type="button" data-id="{{ $indicator->id }}" data-month="aug" data-toggle="tooltip" data-placement="bottom" title="@if ($realization->locked) ststus: locked @else status: un-locked @endif">@if ($realization->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                            </div>
                        @endif
                    </div>

                    <p class="text-info"><small>Last update: {{ \Carbon\Carbon::parse($realization->updated_at)->format('d/m/Y H:i:s') }}</small></p>
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
                        <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][sep]" value="{{ $realization->value }}" style="width: 200px;" @if (!in_array(request()->cookie('X-Role'), ['super-admin', 'admin'])) @if ($realization->locked) @if (now()->month !== 9) readonly @endif @endif @endif>
                        @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                            <div class="input-group-append">
                                <button class="btn btn-info lock-action" type="button" data-id="{{ $indicator->id }}" data-month="sep" data-toggle="tooltip" data-placement="bottom" title="@if ($realization->locked) ststus: locked @else status: un-locked @endif">@if ($realization->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                            </div>
                        @endif
                    </div>

                    <p class="text-info"><small>Last update: {{ \Carbon\Carbon::parse($realization->updated_at)->format('d/m/Y H:i:s') }}</small></p>
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
                        <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][oct]" value="{{ $realization->value }}" style="width: 200px;" @if (!in_array(request()->cookie('X-Role'), ['super-admin', 'admin'])) @if ($realization->locked) @if (now()->month !== 10) readonly @endif @endif @endif>
                        @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                            <div class="input-group-append">
                                <button class="btn btn-info lock-action" type="button" data-id="{{ $indicator->id }}" data-month="oct" data-toggle="tooltip" data-placement="bottom" title="@if ($realization->locked) ststus: locked @else status: un-locked @endif">@if ($realization->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                            </div>
                        @endif
                    </div>

                    <p class="text-info"><small>Last update: {{ \Carbon\Carbon::parse($realization->updated_at)->format('d/m/Y H:i:s') }}</small></p>
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
                        <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][nov]" value="{{ $realization->value }}" style="width: 200px;" @if (!in_array(request()->cookie('X-Role'), ['super-admin', 'admin'])) @if ($realization->locked) @if (now()->month !== 11) readonly @endif @endif @endif>
                        @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                            <div class="input-group-append">
                                <button class="btn btn-info lock-action" type="button" data-id="{{ $indicator->id }}" data-month="nov" data-toggle="tooltip" data-placement="bottom" title="@if ($realization->locked) ststus: locked @else status: un-locked @endif">@if ($realization->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                            </div>
                        @endif
                    </div>

                    <p class="text-info"><small>Last update: {{ \Carbon\Carbon::parse($realization->updated_at)->format('d/m/Y H:i:s') }}</small></p>
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
                        <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][dec]" value="{{ $realization->value }}" style="width: 200px;" @if (!in_array(request()->cookie('X-Role'), ['super-admin', 'admin'])) @if ($realization->locked) @if (now()->month !== 12) readonly @endif @endif @endif>
                        @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                            <div class="input-group-append">
                                <button class="btn btn-info lock-action" type="button" data-id="{{ $indicator->id }}" data-month="dec" data-toggle="tooltip" data-placement="bottom" title="@if ($realization->locked) ststus: locked @else status: un-locked @endif">@if ($realization->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                            </div>
                        @endif
                    </div>

                    <p class="text-info"><small>Last update: {{ \Carbon\Carbon::parse($realization->updated_at)->format('d/m/Y H:i:s') }}</small></p>
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
