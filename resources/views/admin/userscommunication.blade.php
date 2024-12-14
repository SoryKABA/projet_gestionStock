@extends('template.default')

@section('content')
    <div class="container w-50 my-5">
        <div class="container shadow rounded">
            <form action="{{route('admin.userscommunicate.store')}}" method="POST" class="vstack gap-2">
                @csrf
                @method('post')
                 <table class="table">
                    <thead>
                        <tr>
                            <th class="col">SELECT</th>
                            <th class="col">NOM DE L'ARTICLE</th>                           
                            <th class="col">IMAGE</th>
                            <th class="col">QUANTITE</th>                       
                            <th class="col">CATEGORIE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td><input type="checkbox" name="checked[]" value="{{$article->title}}" class="form-check"></td>
                                <td><label for="" class="form-label">{{$article->title}}</label></td>
                                <input type="hidden" name="image[]" value="{{$article->imageArticle()}}">
                                <td><img src="{{$article->imageArticle()}}" class="img-thumbnail rounded" width="70" height="70" alt=""></td>
                                <td><input type="number" name="valeur[]" class="form-control" value="1"></td>
                                <td>{{$article->category->title}}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <div class="form-group my-2 g-3">
                    <button type="submit" class="btn btn-primary">Commander</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection