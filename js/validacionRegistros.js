const subirImagen = document.getElementById('subir-imagen');

document.getElementById('imagen').addEventListener('change', function () {
    let file = this.files[0];
    let allowedExtensions = /(.jpg|.jpeg|.png|.webp)$/i;
    if (!allowedExtensions.exec(file.name)) {
        this.value = '';
        errorMessage();
        return false;
    } else {
        let reader = new FileReader();
        reader.onload = function (e) {
            subirImagen.innerHTML =
                `<img src="${e.target.result}" class="h-32 w-32 rounded border-2 border-blueGray-200"> <h1 class="text-teal-400 hover:text-sky-500">Si desea cambiar la imagen haga click en esta área para cambiarla</h1>`;
        };
        reader.readAsDataURL(file);
        successMessage();
    }
});

const errorMessage = () => {
    Swal.fire({
        position: 'top',
        icon: 'error',
        title: 'Vaya ocurrio un error...',
        text: 'Por favor suba una imagen en formato JPG, JPEG o PNG.',
        footer: '<a>Esto es un campo opcional, si desea no llene este campo</a>',
        showConfirmButton: false,
        timer: 3000
    })
}

const successMessage = () => {
    Swal.fire({
        position: 'top',
        icon: 'success',
        title: 'La imagen se ha cargado correctamente',
        showConfirmButton: false,
        timer: 1500
    })
}