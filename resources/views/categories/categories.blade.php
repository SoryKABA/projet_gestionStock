@extends('template.default')

@section('content')
    <div class="container">
        <table class="table table-thumbnail mt-5">
            <thead>
                <tr>
                    <th class="col">#ID</th>
                    <th class="col">NOM DE CATEGORIE</th>
                    <th class="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>
                            <a href="{{route('admin.categories.edit', $category)}}" title="Modifier {{$category->title}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form onsubmit="confirm('Voulez-vous vraiment supprimer cette catégorie ?')" action="{{route('admin.categories.destroy', $category)}}" method="post" style="display:inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" title="Supprimer {{$category->title}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection