// JavaScript Document
function check_cedula( form )
			{
		
			  var tipo_id= jQuery("input[name=tipo_id]:checked").val();
			  var cedula = form.txt_cedula.value;
			  array = cedula.split( "" );
			  num = array.length;
			  
			  if((num==10)&&(tipo_id==1))
			  {
				total = 0;
				digito = (array[9]*1);
				for( i=0; i < (num-1); i++ )
				{
				  mult = 0;
				  if ( ( i%2 ) != 0 ) {
					total = total + ( array[i] * 1 );
				  }
				  else
				  {
					mult = array[i] * 2;
					if ( mult > 9 )
					  total = total + ( mult - 9 );
					else
					  total = total + mult;
				  }
				}
				decena = total / 10;
				decena = Math.floor( decena );
				decena = ( decena + 1 ) * 10;
				final = ( decena - total );
				if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
				  alert( "La c\xe9dula es v\xe1lida!!!" );
				  return true;
				}
				else
				{
				  alert( "La c\xe9dula no es v\xe1lida!!!" );
				  return false;
				}
			  }
			  else
			  {
				  if((num==13)&&(tipo_id==2))
			  	  {
					  cedula = cedula.substr(0, 10);
					  array = cedula.split( "" );
					  num = array.length;
					  
					  total = 0;
					  digito = (array[9]*1);
					  for( i=0; i < (num-1); i++ )
					  {
						mult = 0;
						if ( ( i%2 ) != 0 ) {
						  total = total + ( array[i] * 1 );
						}
						else
						{
						  mult = array[i] * 2;
						  if ( mult > 9 )
							total = total + ( mult - 9 );
						  else
							total = total + mult;
						}
					  }
					  decena = total / 10;
					  decena = Math.floor( decena );
					  decena = ( decena + 1 ) * 10;
					  final = ( decena - total );
					  if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
						alert( "El RUC es v\xe1lida!!!" );
						return true;
					  }
					  else
					  {
						alert( "El RUC no es v\xe1lida!!!" );
						return false;
					  }
				  }
				  else{
						alert("Ingrese los digitos completos para Cédula 10 dígitos o para Ruc 13 dígitos");
						return false;
				  }
			  }
			  
			}
			

function check_cedula2( form )
			{
		
			  var cedula = form.txt_cedula.value;
			  array = cedula.split( "" );
			  num = array.length;
			  
			  if(num==10)
			  {
				total = 0;
				digito = (array[9]*1);
				for( i=0; i < (num-1); i++ )
				{
				  mult = 0;
				  if ( ( i%2 ) != 0 ) {
					total = total + ( array[i] * 1 );
				  }
				  else
				  {
					mult = array[i] * 2;
					if ( mult > 9 )
					  total = total + ( mult - 9 );
					else
					  total = total + mult;
				  }
				}
				decena = total / 10;
				decena = Math.floor( decena );
				decena = ( decena + 1 ) * 10;
				final = ( decena - total );
				if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
				  alert( "La c\xe9dula es v\xe1lida!!!" );
				  return true;
				}
				else
				{
				  alert( "La c\xe9dula no es v\xe1lida!!!" );
				  return false;
				}
			  }
			  
				  else{
						alert("Ingrese los digitos completos para Cédula 10 dígitos");
						return false;
				  }
			  
			}

function calcula_edad(fecha) {
	  var fechaActual = new Date()
	  var diaActual = fechaActual.getDate();
	  var mmActual = fechaActual.getMonth() + 1;
	  var yyyyActual = fechaActual.getFullYear();
	  FechaNac = fecha.split("-");
	  var diaCumple = FechaNac[2];
	  var mmCumple = FechaNac[1];
	  var yyyyCumple = FechaNac[0];
	  //retiramos el primer cero de la izquierda
	  if (mmCumple.substring(0,1) == 0) {
	  		mmCumple= mmCumple.substring(1, 2);
	  }
	  //retiramos el primer cero de la izquierda
	  if (diaCumple.substr(0, 1) == 0) {
	  		diaCumple = diaCumple.substring(1, 2);
	  }
	  var edad = yyyyActual - yyyyCumple;
	  
	  //validamos si el mes de cumpleaños es menor al actual
	  //o si el mes de cumpleaños es igual al actual
	  //y el dia actual es menor al del nacimiento
	  //De ser asi, se resta un año
	  if ((mmActual < mmCumple) || (mmActual == mmCumple && diaActual < diaCumple)) {
	  		edad--;
	  }
	  
	  document.getElementById("txt_edad").value=edad;
	  
	  if(edad>=65){
	  	$('#chk_tercera_edad').iCheck('check');
	  }else{
		$('#chk_tercera_edad').iCheck('uncheck');  
	  }
	  
	  
};