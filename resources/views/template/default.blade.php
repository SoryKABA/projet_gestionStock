<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
	<script src="{{asset('js/quaggajs.js')}}" defer> </script>
	<title>@yield('title')</title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  	<div class="container">
		    <a class="navbar-brand" href="#">Navbar</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	      		<span class="navbar-toggler-icon"></span>
	    	</button>
		    <div class="collapse navbar-collapse" id="navbarNav">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="{{route('user.index')}}">Users</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="{{route('user.create')}}">Créer un utilisateur</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="{{route('createrule')}}">Créer un rôle</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="{{route('admin.categories.create')}}">Créer une catégorie</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="{{route('admin.articles.create')}}">Créer un article</a>
		        </li>
		        <li class="nav-item">
		          <span style="cursor:pointer;" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">SKA</span>
		        </li>
		      </ul>
			  <ul class="navbar-nav">
				<li>
					<form action="{{route('auth.logout')}}" method="post">
						@csrf
						@method('delete')
						<button style="background:none; border:none;" class="btn btn-primary">Se déconnecter</button>
					</form>
				</li>
			  </ul>
		    </div>
	  	</div>
	</nav>
	@php
		$user = \Illuminate\support\Facades\Auth::user();
	@endphp
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Mon profile</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="w-100 row g-3">
					<div class="col-md-5 col-6">
						<img src="{{$user->imageUrl()}}" alt="" class="img-thumbnail rounded w-100 h-100">
					</div>
					<div class="col-md-6 col-6">
						<strong>Nom Complet :</strong><br>
						<span>{{$user->lastname}} {{$user->name}} </span><br>
						<strong>Email :</strong><br>
						<span>{{$user->email}}</span><br>
						<strong>Salaire :</strong><br>
						<span>{{$user->salary}} FCFA</span><br>
						<strong>Fonction :</strong><br>
						<span>{{$user->userRoles->title}}</span><br>
						<strong>Téléphone :</strong><br>
						<span>{{$user->phone}}</span><br>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<a class="btn btn-primary" href="{{route('user.edit', $user)}}">Modifier mot de passe</a>
			</div>
			</div>
		</div>
	</div>
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul class="my-0">
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif
	@if (session('success'))
		<div class="alert alert-success my-4 w-50">
			{{session('success')}}
		</div>
	@endif
	@yield('content')

</body>
</html>