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
        <td class="text-center">
            <div class="btn-group">
                @if ($permissions['edit'])
                    <a href="{{ route('simonik.indicators.edit', ['id' => $indicator->id]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-edit"></i></a>
                @endif
                @if ($permissions['delete'])
                    <form action="{{ route('simonik.indicators.destroy', ['id' => $indicator->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                @endif
            </div>

            <input type="hidden" name="id[]" value="{{ $indicator->id }}">
        </td>
    </tr>

    @notEmpty($indicator->childs_horizontal_recursive)
        @include('components.simonik.indicator.paper-work.read._indicator-child', [
            'indicators' => $indicator->childs_horizontal_recursive,
            'permissions' => ['edit' => $permissions['edit'], 'delete' => $permissions['delete']],
            'background_color' => ['red' => $background_color['red']-15, 'green' => $background_color['green']-15, 'blue' => $background_color['blue']-15],
            'iter' => empty($iter) ? "$loop->iteration" : "$iter.$loop->iteration"
        ])
    @endNotEmpty
@endforeach
