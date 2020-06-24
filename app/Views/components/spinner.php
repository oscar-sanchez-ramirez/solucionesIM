<script>
    window.onload = function() {
        var contenedor = document.getElementById('carga');
        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = 0;
    }

    function executeAjaxRequest() {
        $("#boxLoading").addClass("loading")
        setTimeout(() => $("#boxLoading").removeClass("loading"), 2000);
    }

    function email() {
        $("#boxLoading").addClass("loading")
        setTimeout(() => $("#boxLoading").removeClass("loading"), 50000);
    }

    function factu() {
        $("#boxLoading").addClass("loading")
        setTimeout(() => $("#boxLoading").removeClass("loading"), 50000);
    }
</script>


