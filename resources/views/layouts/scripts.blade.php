<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="{{ asset('js/telefono.js') }}"></script>
<script src="{{ asset('js/utilidades.js') }}"></script>

<script type="text/javascript">
    let toggle = $('#dialog-destroy');
    let $this = null;
    let url = null;
    let method = null;
    let token = null;
    let fila = 'no-delete';

    $(document).on('click', '.action-destroy', function(e) {
        e.preventDefault();
        $this = $(this);
        url = $this.attr('href');
        // method = $this.attr('data-method');
        // token = $this.attr('data-token');
        // fila = $this.attr('data-fila');
        $("#form-destroy").attr("action", url);
        toggle.toggle();
    });

    toggle.on('click', '#confirm', function(e) {
        $("#form-destroy").submit();
    });
</script>
<!--Formatos de telefonos-->
<script>
    $(".formato-telefono").intlTelInput({
        initialCountry: "es",
        separateDialCode: true,
    });
</script>
<!--Tutoriales-->
<script>
    $(document).on('click', '#tour-principal', function(e) {
        introJs().setOptions({
            showBullets: false,
            showProgress: false,
            nextLabel: "Siguiente",
            prevLabel: "Anterior",
            doneLabel: "Cerrar",
            scrollToElement: true,
            steps: [{
                element: document.querySelector('#tablero'),
                intro: "En esta seccion se muestra un resumen del sistema de Market Leon"
            }]
        }).start();
    });
</script>

