const btnDropdown = document.getElementById('btn-opciones');
const menuOpciones = document.querySelector('.opciones');

btnDropdown.addEventListener('click', (e) => {
    e.preventDefault();
    menuOpciones.classList.toggle('opciones-active');
})