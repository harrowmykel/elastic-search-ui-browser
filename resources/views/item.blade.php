@extends('root-layout')

@section('body')
<a href="{{url('/index/'.$index_name)}}">&lt; Back</a>
<h3>Item</h3>
@if(!empty($item))
<div class="bg-dark text-white p-2">

    @foreach($item as $title => $attr)

    @if($title == '_source')

    @foreach($attr as $head=> $column)

    <p class="ms-2">
        <span class="text-success">{{$head.': '}}</span>
        <span class="text-white">{{$column}}</span>
    </p>
    @endforeach

    @else

    <p>
        <span class="text-warning">{{$title.': '}}</span>
        <span class="text-white">{{$attr}}</span>
    </p>
    @endif


    @endforeach
</div>
@endif
@endsection