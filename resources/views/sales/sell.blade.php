@extends('template.default')
@section('title', 'Vente des produtis')
<style>
    #barcode-scanner video {
        width: 100%;
        max-width: 640px;
    }
</style>
@section('content')
    <h3>Bonjour tout le monde</h3>
    <div id="barcode-scanner"></div>
    <div id="result">Aucun code-barres détecté</div>
@endsection