@isset($thanas)
    @if(count($thanas)>0)
        @foreach($thanas as $row)
            <option value='{{ $row->id }}'>{{ $row->name }}</option>
        @endforeach
    @else
        <option value=''>No Model found</option>
    @endif
@endisset
