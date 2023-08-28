@props([
    'label' => 'null',
    'info' => 'null',
    'for' => '',
])
 <label  {{$attributes}} class="form-label" for="{{$for}}">{{$label}} <span class="text-danger">{{$info}}</span></label>
