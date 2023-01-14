@props(['action', 'method' => Null])

@php
    if(!$method){
        $method = 'POST';
    }    
@endphp

<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST'}}">
    @csrf
    @if ($method != 'GET')
        @method($method)
    @endif

    {{$slot}}
</form>
