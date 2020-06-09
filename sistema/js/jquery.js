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

	$('#usuario_').keyup(function(e){
		e.preventDefault();
		var usr = $(this).val();
		var action = 'searchUser';
		$.ajax({
			url: 'includes/ajax.php',
			type: "post",
			async: true,
			data: {action:action,usr:usr},
			success: function(response)
			{
				console.log(response);
			}
		})
    	
    });

})