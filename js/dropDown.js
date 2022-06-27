const boton = document.querySelector('#boton');
const menu = document.querySelector('#menu');

boton.addEventListener('click', () => {
    // Estilos menu
    menu.classList.toggle('hidden');
    menu.classList.toggle('max-h-max');

    // Estilo click boton
    boton.classList.toggle('transition-all');
    boton.classList.toggle('duration-100');
    boton.classList.toggle('ease-in-out');
    boton.classList.toggle('bg-amber-500');
    // Estilo click boton
    setTimeout(() => {
        boton.classList.toggle('bg-amber-500');
    }, 150);
})

const dropdownMenu = () => {

}