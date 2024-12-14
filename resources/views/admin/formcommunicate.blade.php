@extends('template.default')

@section('content')
    <div class="container w-50 my-5">
        <div class="container shadow rounded">
            <form action="{{route('admin.userscommunicate.store')}}" method="POST" class="vstack gap-2">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="messages" class="form-label">Ecrire un message</label>
                    <textarea name="messages" id="messages" class="form-control @error('messages') is-invalid @enderror"></textarea>
                </div>
                @error('messages')          
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary w-100">Envoyer <i class="fa-regular fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </div>
    
@endsection