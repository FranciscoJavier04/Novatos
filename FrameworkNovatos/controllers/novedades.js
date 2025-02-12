document.addEventListener("DOMContentLoaded", function () {
    let cookieModal = new bootstrap.Modal(document.getElementById('modalNovedades'));

    // Verificar si ya aceptó las cookies
    if (!getCookie("aceptarNovedad")) {
        cookieModal.show(); // Mostrar el modal solo si no se ha aceptado o rechazado las cookies
    }

    document.getElementById("aceptarNovedades").addEventListener("click", function () {
        setCookie("aceptarNovedad", "true"); // Guardamos la cookie de sesión
        cookieModal.hide(); // Ocultamos el modal
    });

    // Función para establecer cookies (sin expiración para que sea de sesión)
    function setCookie(cname, cvalue) {
        document.cookie = cname + "=" + cvalue + ";path=/"; // Guardamos la cookie sin expiración
    }

    // Función para obtener cookies
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i].trim();
            if (c.indexOf(name) === 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
});
