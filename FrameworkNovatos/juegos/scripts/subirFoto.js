let selectedFile = null;

document.getElementById("fileInput").addEventListener("change", function (event) {
    selectedFile = event.target.files[0];

    if (selectedFile) {
        document.getElementById("fileName").textContent = `Archivo seleccionado: ${selectedFile.name}`;
    }
});

function uploadImage() {
    if (!selectedFile) {
        alert("Por favor, selecciona una imagen primero.");
        return;
    }

    // Verificar tamaño del archivo (Máx: 2MB)
    if (selectedFile.size > 2 * 1024 * 1024) {
        alert("La imagen es demasiado grande (máx. 2MB).");
        return;
    }

    const formData = new FormData();
    formData.append("image", selectedFile);

    fetch("../controllers/modificarFoto.php", {
        method: "POST",
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        location.reload(); // Recargar la página para ver la imagen actualizada
    })
    .catch(error => console.error("Error al subir la imagen:", error));
}
