// Obtener elementos del DOM
var abrirModal = document.getElementById('abrirModal');
var miModal = document.getElementById('miModal');
var cerrarModal = document.getElementById('cerrarModal');

// Abrir la ventana modal
abrirModal.addEventListener('click', function() {
    miModal.style.display = 'block';
});

// Cerrar la ventana modal
cerrarModal.addEventListener('click', function() {
    miModal.style.display = 'none';
});

// Cerrar la ventana modal haciendo clic fuera de ella
window.addEventListener('click', function(event) {
    if (event.target === miModal) {
        miModal.style.display = 'none';
    }
});

    $(document).ready(function() {
        // Escucha los cambios en la columna "complete" y aplica la clase CSS cuando sea igual a 1
        $('tbody tr').each(function() {
            var complete = $(this).find('td:eq(2)').text(); // Tercera columna
            if (complete == 1) {
                $(this).addClass('fila-verde');
            }
        });
    });
