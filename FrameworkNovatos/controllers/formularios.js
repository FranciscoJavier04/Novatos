function mostrarPass(inputId,iconId) {
    let passwordInput = document.getElementById(inputId);
    let icon = document.getElementById(iconId);
    
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var refreshButton = document.getElementById("refreshCaptcha");
    if (refreshButton) {
        refreshButton.addEventListener("click", function () {
            document.querySelector(".captcha-image").src = 'generatecaptcha.php?' + Date.now();
        });
    }
});