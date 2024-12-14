<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Authentification</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  	<div class="container">
		    <a class="navbar-brand" href="#">SKABA</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	      		<span class="navbar-toggler-icon"></span>
	    	</button>
	  	</div>
	</nav>
    @if (session('success'))
        <div class="alert alert-danger w-50 my-3 rounded justify-content-center">
            {{session('success')}}
        </div>
    @endif
    <div class="container w-75">
        <form action="{{route('auth.login')}}" class="container my-5 w-50 rounded shadow" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="email" class="form-label">Login :</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" placeholder="Votre email">
            </div>
            @error('email')  
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            <div class="form-group">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Votre password">
            </div>
            @error('password')  
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            <div class="row g-3 my-2 mb-1">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>