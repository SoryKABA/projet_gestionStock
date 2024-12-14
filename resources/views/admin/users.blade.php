@extends('template.default')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th class="col">#ID</th>
                    <th class="col">NOM DE L'EMPLOYE</th>
                    <th class="col">EMAIL</th>
                    <th class="col">TEL</th>
                    <th class="col">FONCTION</th>
                    <th class="col">SALAIRE</th>
                    <th class="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->lastname}} {{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->userRoles->title}}</td>
                        <td>{{$user->salary}}</td>
                        <td>
                            <a href="{{route('user.password_init', $user)}}" title="Réinitialiser le mot de passe de {{$user->lastname}}" class="btn btn-dark"><i class="fa-regular fa-window-restore"></i></a>
                            <a href="{{route('user.edit', $user)}}" title="Modifier {{$user->lastname}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                        
                            <form onsubmit="confirm('Voulez-vous vraiment supprimer cet employé ?')" action="{{route('user.delete', $user)}}" method="post" style="display:inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" title="Bannir {{$user->lastname}}" class="btn btn-danger"><i class="fa-solid fa-user-xmark"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection