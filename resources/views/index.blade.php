@extends('root-layout')

@section('body')
<a href="{{url('/')}}">&lt; Back</a>
<h3>Hits</h3>
<div>
    Took: {{$search->took}} |
    Max. Score: {{$search->hits->max_score}} |
    total: {{$search->hits->total}}
</div>
@if(count($hits)> 0)
<table class="table table-responsive table-striped table-bordered">
    <thead>
        <td class=" text-center" scope="col">
            id
        </td>
        <td class=" text-center" scope="col">
            type
        </td>
        @foreach($hits[0]->_source as $head => $column)
        <td class=" text-center" scope="col">
            {{$head}}
        </td>
        @endforeach
    </thead>
    <tbody>
        @foreach($hits as $item)
        <tr>
            <td class="text-center">
                <a href="{{url('item/'.$index_name.'/'.($item->_type).'/'.($item->_id))}}" target="_blank"> {{$item->_id}}</a>
            </td>
            <td class="text-center">
                <a href="{{url('type/'.$index_name.'/'.($item->_type))}}" target="_blank"> {{$item->_type}}</a>
            </td>
            @foreach($item->_source as $head=> $column)
            <td>
                {{$column}}
            </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection