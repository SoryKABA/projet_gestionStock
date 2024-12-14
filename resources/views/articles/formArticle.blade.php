<div class="container w-50 rounded shadow g-4 my-4">
    <form action="{{route($article->exists ? 'admin.articles.update' : 'admin.articles.store', $article)}}" method="POST" enctype="multipart/form-data">
        @method($article->exists ? 'put' : 'post')
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">*Le nom de l'article</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title', $article->title ?? '')}}">
        </div>
        @error('title')          
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <div class="row g-3">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <label for="price" class="form-label">*Le prix de l'article</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price', $article->price ?? '')}}">
                        @if (!$article->exists)
                            <input type="hidden" name="code_barre" class="form-control">
                        @endif
                    </div>
                    @error('price')          
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="col">
                        <label for="quantity" class="form-label">*La quantité de l'article</label>
                        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{old('quantity', $article->quantity ?? '')}}">
                    </div>
                    @error('image')          
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="col">
                        <label for="peremption" class="form-label">La date de peremption (facultatif)</label>
                        <input type="date" name="peremption" class="form-control @error('peremption') is-invalid @enderror" value="{{old('peremption', $article->peremption ?? '')}}">
                    </div>
                    @error('peremption')          
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="image" class="form-label">*L'image de l'article</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @if ($article->image)
                <img src="{{$article->imageArticle()}}" alt="" class="img-thumbnail rounded" width="500" height="100">
            @endif
        </div>
        @error('image')          
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="description" class="form-label">La description de l'article (facultatif)</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{old('description', $article->description ?? '')}}</textarea>
        </div>
        @error('description')          
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="slug" class="form-label">Le slug de l'article (facultatif)</label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{old('slug', $article->slug ?? '')}}">
        </div>
        @error('slug')          
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <div class="row my-3">
            <div class="col">
                <label for="category_id" class="form-label">*La catégorie de l'article</label>
                <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                    <option value="">--none--</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"  @if($article->category_id === $category->id) selected @endif >{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group g-3 my-3">
            <button class="btn btn-success" type="submit">
                @if ($article->exists)
                    Modifier
                @else
                    Enregistrer
                @endif
            </button>
        </div>
    </form>
 </div>