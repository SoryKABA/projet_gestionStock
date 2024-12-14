<div class="container w-50 rounded shadow g-4 my-4">
    <form action="{{route($category->exists ? 'admin.categories.update' : 'admin.categories.store', $category)}}" method="POST">
        @method($category->exists ? 'put' : 'post')
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Le nom de la catégorie</label>
            <input type="text" name="title" class="form-control" value="{{old('title', $category->title ?? '')}}">
        </div>
        @error('title')          
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="slug" class="form-label">Le slug de la catégorie</label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{old('slug', $category->slug ?? '')}}">
        </div>
        @error('slug')          
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        <div class="form-group g-3 my-3">
            <button class="btn btn-success" type="submit">
                @if ($category->exists)
                    Modifier
                @else
                    Enregistrer
                @endif
            </button>
        </div>
    </form>
 </div>