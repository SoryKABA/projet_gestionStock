<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de Code-Barres</title>
    <!-- Inclure la bibliothèque JsBarcode via un CDN -->
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <style>
        /* Style basique pour centrer le code-barres */
        .barcode-container {
            text-align: center;
            margin-top: 20px;
        }
        .code_barre {
            position: relative;
            width: 180px;
            height: 110px;
            display : flex;
            flex-direction : column;
            align-items : center;
        }
        .barcode {
            width: 70%;
            height: 60%;
        }
        span.price {
            position: absolute;
            top : -18px;
            right : 2px;
        }
        span.name {
            margin-bottom : 10px;
            display : inline-block;
            text-wrap : none;
        }
    </style>
</head>
<body>
    <h1>Code-Barres du Produit</h1>
    @if (is_array($articles))  
        @foreach ($articles as $article)
            <div class="barcode-container">
                <div class="code_barre">
                    <span class="price">{{$article->price}} FCFA</span>
                    <div class="barcode">
                        {!! DNS1D::getBarcodeHTML("$article->code_barre", "EAN ", 1.5, 50) !!}
                        <small>{{$article->code_barre}}</small>
                        <span class="name">{{$article->title}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="barcode-container">
            <div class="code_barre">
                <span class="price">{{$articles->price}} FCFA</span>
                <div class="barcode">
                    {!! DNS1D::getBarcodeHTML("$articles->code_barre", "UPCA", 1.5, 50) !!}
                    <small>{{$articles->code_barre}}</small>
                    <span class="name">{{$articles->title}}</span>
                </div>
            </div>
            </div>
    @endif
</body>
</html>
