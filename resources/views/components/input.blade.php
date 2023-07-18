{{-- put default value --}}
@props(['name' => '' , 'label' => '' , 'value' => '', 'id' => '' , 'type'=>'text'])

<div class="form-floating mb-3">
    <input type="{{$type ?? 'text'}}" class="form-control @error($name) is-invalid @enderror"
        value="{{old($name , $value)}}" id=" {{$id}}" name="{{$name}}" placeholder="{{$name}}">
    <label for="{{$name}}">{{$label}}</label>
    <x-errors name="{{$name}}" />
</div>