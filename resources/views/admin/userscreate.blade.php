@extends('template.default')

@section('content')
    <div class="container w-75 my-5">
        <div class="container w-75 rounded">
            <form action="{{route('user.store')}}" method="POST" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col vstack gap-2">
                        <div class="row">
                            <div class="col row">
                                @include('share.input', ['class' => 'col', 'label' => 'Prénom', 'name' => 'lastname', 'value' => $user->lastname])
                                @include('share.input', ['class' => 'col', 'label' => 'Nom de famille', 'name' => 'name', 'value' => $user->name])
                                @include('share.input', ['class' => 'col', 'label' => 'Email', 'name' => 'email', 'type' => 'email', 'value' => $user->email])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col row">
                                @include('share.input', ['class' => 'col', 'label' => 'Téléphone', 'name' => 'phone', 'value' => $user->phone])
                                @include('share.input', ['class' => 'col', 'label' => 'Salaire', 'name' => 'salary', 'value' => $user->salary])
                            </div>
                        </div>
                        <div class="row">
                            @include('share.input', ['class' => 'col', 'label' => 'Mot de passe', 'name' => 'password', 'type' => 'password', 'value' => '00000000'])
                            <div class="form-group">
                                <div class="col">
                                    <label for="imageProfil" class="form-label">Photo de profil</label>
                                    <input class="form-control @error('imageProfil') is-invalid @enderror" type="file" id="imageProfil" name="imageProfil">
                                    @error('imageProfil')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                           
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
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Créer utilisateur</button>
                </div>
            </form>
        </div>
    </div>
@endsection