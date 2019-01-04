<h4>Orders (New, In Progress)</h4>

@if($co)
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">
            <tbody>

            @foreach($co as $key => $row)
                <tr>
                    @foreach($row as $cell)
                        @if($key === 0)
                            @if(!$cell)
                                <th></th>
                            @else
                                <th class="rotate">
                                    <div><span>{{ $cell['name'] }}</span></div>
                                </th>
                            @endif
                        @elseif($key === 1)
                            <td>
                                <b>{{ $cell }}</b>
                            </td>
                        @else
                            <td>
                                @if($cell instanceof \App\Models\Order)
                                    <a href="{{ route('order.show', $cell->id) }}">
                                        #{{ $cell->id }}
                                    </a>
                                    {{ $cell->client->name }}
                                @else
                                    {{ $cell }}
                                @endif
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    No Orders ;)
@endif

