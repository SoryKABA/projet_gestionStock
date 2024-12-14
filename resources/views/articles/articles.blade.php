@extends('template.default')

@section('content')
    <div class="container">
        <div class="container my-4">
            <button type="button" class="btn btn-outline-primary">{{$articles->pluck('id')->count()}}</button>
            <a class="btn btn-outline-secondary" href="{{route('admin.userscommunicate.create')}}">Informer </a>
            <a class="btn btn-outline-warning" href="{{route('admin.userscommunicate.index')}}">Informer </a>
            <a class="btn btn-outline-danger" href="{{route('admin.sales.index')}}">Vendre </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="col">#ID</th>
                    <th class="col">IMAGE</th>
                    <th class="col">NOM DE L'ARTICLE</th>
                    <th class="col">PRIX</th>
                    <th class="col">QUANTITE</th>
                    <th class="col">CODE BARRE</th>
                    <th class="col">CATEGORIE</th>
                    <th class="col">ACTION 
                        <form action="{{route('articles')}}" method="post" style="display:inline-block;">
                        @csrf
                        @method('post')
                            <select name="limit" id="" class="form-select">
                                    <option value="{{$articles->pluck('id')->count()}}">All</option>
                                @foreach ($articles as $article )    
                                    <option value="{{$article->id}}">{{$article->id}}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success"><i class="fa-solid fa-print"></i></button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td><img src="{{$article->imageArticle()}}" class="img-thumbnail rounded" width="70" height="70" alt=""> </td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->price}} FCFA</td>
                        <td>{{$article->quantity}}</td>
                        <td>{!! DNS1D::getBarcodeHTML("$article->code_barre", "UPCA", 1.5, 50) !!}
                            <p>p - {{$article->code_barre}}</p>
                        </td>
                        <td>{{$article->category->title}}</td>
                        <td>
                            <a href="{{route('admin.articles.edit', $article)}}" title="Modifier {{$article->title}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('article', $article)}}" class="btn btn-success"><i class="fa-solid fa-print"></i></a>
                            <form onsubmit="confirm('Voulez-vous vraiment supprimer cet article ?')" action="{{route('admin.articles.destroy', $article)}}" method="post" style="display:inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" title="Supprimer {{$article->title}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection