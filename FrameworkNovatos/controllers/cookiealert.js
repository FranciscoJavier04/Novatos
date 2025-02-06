document.addEventListener("DOMContentLoaded", function () {
    let cookieModal = new bootstrap.Modal(document.getElementById('cookieModal'));

    // Verificar si ya aceptó las cookies
    if (!getCookie("aceptarCookie")) {
        cookieModal.show(); // Mostrar el modal solo si no se ha aceptado o rechazado las cookies
    }

    document.getElementById("acceptCookies").addEventListener("click", function () {
        setCookie("aceptarCookie", "true"); // Guardamos la cookie de sesión
        cookieModal.hide(); // Ocultamos el modal
    });

    document.getElementById("rejectCookies").addEventListener("click", function () {
        setCookie("aceptarCookie", "false"); // Guardamos la cookie de sesión
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
                return c.substring(name.length, c.length); // Retornamos el valor de la cookie
            }
        }
        return ""; // Si no se encuentra la cookie, retornamos vacío
    }
});
