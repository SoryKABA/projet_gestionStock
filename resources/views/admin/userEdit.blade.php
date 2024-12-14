@extends('template.default')

@section('content')
    @auth
        <div class="container my-4 w-50 rounded shadow">
            <form action="{{route('user.update', $user)}}" method="POST">
                @csrf
                @method('post')
                @if ($user)
                    <div class="row g-3">
                        @include('share.input', ['class' => 'col', 'label' => 'Téléphone', 'name' => 'phone', 'value' => $user->phone])
                    </div>
                    <div class="row g-3">
                        @include('share.input', ['class' => 'col', 'label' => 'Mot de passe', 'name' => 'password', 'type' => 'password'])
                    </div>
                    <div class="row g-3">
                        @include('share.input', ['class' => 'col', 'label' => 'Mot de passe de confirmation', 'name' => 'passwd', 'type' => 'password'])
                    </div>
                @endif
                @if ($user->userRoles->title === "Super Admin")
                    
                    <div class="row g-3">
                        @include('share.input', ['class' => 'col', 'label' => 'Prénom', 'name' => 'lastname', 'value' => $user->lastname])
                    </div>
                    <div class="row g-3">
                        @include('share.input', ['class' => 'col', 'label' => 'Nom de famille', 'name' => 'name', 'value' => $user->name])
                    </div>
                    <div class="row g-3">
                        @include('share.input', ['class' => 'col', 'label' => 'Salaire', 'name' => 'salary', 'value' => $user->salary])
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="user_roles_id" class="form-label">Fonction de l'utilisateur</label>
                            <select name="user_roles_id" id="user_roles_id" class="form-select">
                                <option value="">--none--</option>
                                @foreach ($rules as $rule)
                                    <option value="{{$rule->id}}">{{$rule->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                <div class="form-group g-3 my-2">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    @endauth
@endsection