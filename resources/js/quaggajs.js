document.addEventListener("DOMContentLoaded", function () {
    // Vérifiez si le navigateur prend en charge le média vidéo
    if (navigator.mediaDevices && typeof navigator.mediaDevices.getUserMedia === 'function') {
        // Initialisation de Quagga
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#barcode-scanner'), // L'élément HTML où la vidéo sera affichée
                constraints: {
                    width: 640,
                    height: 480,
                    facingMode: "environment" // Utiliser la caméra arrière sur les appareils mobiles
                }
            },
            decoder: {
                readers: ["UPCA", "upc_reader"] // Types de codes-barres à lire
            },
            area: { // defines rectangle of the detection/localization area
                top: "0%",    // top offset
                right: "0%",  // right offset
                left: "0%",   // left offset
                bottom: "0%"  // bottom offset
            },
        }, function (err) {
            if (err) {
                console.log(err);
                return;
            }
            console.log("Quagga est prêt !");
            Quagga.start();
        });

        // Gestion des résultats détectés
        Quagga.onDetected(function (result) {
            var code = result.codeResult.code;
            document.getElementById('result').innerText = `Code-barres détecté : ${code}`;
            console.log("Code-barres détecté :", code);
        });
    } else {
        alert("Votre navigateur ne prend pas en charge le scan de code-barres via la caméra.");
    }
});

