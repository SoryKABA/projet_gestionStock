@extends('template.default')

@section('content')
    <div class="container w-50 my-5">
        <div class="container shadow rounded">
            <form action="{{route('storerule')}}" method="POST" class="vstack gap-2">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="title" class="form-label">Nom du rôle</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                    @error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection