<script>
    window.addEventListener('load', () => {
        var cantidad = document.querySelector("#cantidad");
        var importe = document.querySelector("#importe");
        var subtotal = document.querySelector("#subtotal");
        var iva = document.querySelector("#iva");
        var total = document.querySelector("#total");

        importe.addEventListener('change', function() {
            var can = parseFloat(cantidad.value);
            var impor = parseFloat(importe.value);
            var resul = (can * impor);
            subtotal.value = resul.toFixed(2);
            var sub = subtotal.value;
            var subR = parseFloat(sub);
            let ivaP = parseFloat(0.160000);
            var ivaR = (subR * ivaP);
            iva.value = parseFloat(ivaR).toFixed(2);
            totalR = (subR + ivaR);
            total.value = totalR.toFixed(2);

        });

    });
</script>