$(document).ready(function(e){

	//para verificar al menos un checkbox formulario responsable_crear_horario
	$('#form_horario').submit(function(e){
    // si la cantidad de checkboxes "chequeados" es cero,
    // entonces se evita que se envíe el formulario y se
    // muestra una alerta al usuario
    if ($('input[type=checkbox]:checked').length === 0) {
        e.preventDefault();
        alert('Debe seleccionar al menos un día de la semana');
    }
});

})