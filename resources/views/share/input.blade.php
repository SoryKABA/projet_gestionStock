@php 
$type ??= 'text';
$class ??= null;
$name ??= '';
$label ??= ucfirst($name) . ' :';
@endphp

<div @class(["form-group", $class])>
    <label for="{{$name}}">{{$label}}</label>
    @if($type === 'textarea')

        <textarea class="form-control @error($name) is-invalid @enderror" type="{{$type}}" id="{{$name}}" name="{{$name}}">{{old($name, $value ?? '')}} </textarea>
        @error($name)
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    @else
        <input class="form-control @error($name) is-invalid @enderror" type="{{$type}}" id="{{$name}}" name="{{$name}}" value="{{old($name, $value ?? '')}}">
        @error($name)
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    @endif 
</div>