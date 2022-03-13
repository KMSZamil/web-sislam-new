@isset($models)
    @if(count($models)>0)
        @foreach($models as $row)
            <option value='{{ $row->id }}'>{{ $row->name }}</option>
        @endforeach
    @else
        <option value=''>No Model found</option>
    @endif
@endisset
