@extends('root-layout')

@section('body')
<h3>Indices</h3>
@if(count($indices)> 0)
<table class="table table-responsive table-striped table-bordered">
    <thead>
        @foreach($indices[0] as $head => $column)
        <td class=" text-center" scope="col">
            {{$head}}
        </td>
        @endforeach
    </thead>
    <tbody>
        @foreach($indices as $index)
        <tr>
            @foreach($index as $head=> $column)
            <td class="text-center">
                @if($head=='index')
                <a href="{{url('index/'.$column)}}" target="_blank"> {{$column}}</a>
                @else
                {{$column}}
                @endif
            </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection