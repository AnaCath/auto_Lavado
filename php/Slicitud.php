<?php
$error='';
$Nombre='';
$Apellido='';
$Ciudad='';
$Estado='';
$Email='';
$Tel='';
$Mensaje='';


//Nombre
if(empty($_POST['Nombre'])){ // verifica que el campo email no este vacio
    $error.="Ingresa tu Nombre porfavor... <br>";
}else{
    $Nombre=($_POST['Nombre']);
    $Nombre=filter_var($Nombre,FILTER_SANITIZE_STRING);//Elimina etiquetas maliciosas y solo deja strings     
}

//Apellido
if(empty($_POST['Apellido'])){ // verifica que el campo email no este vacio
    $error.="Ingresa tu Apellido porfavor... <br>";
}else{
    $Apellido=($_POST['Apellido']);
    $Apellido=filter_var($Apellido,FILTER_SANITIZE_STRING);//Elimina etiquetas maliciosas y solo deja strings     
}

// Email
if(empty($_POST['Email'])){ // verifica que el campo email no este vacio
    $error.="Escribe  tu correo electronico <br>";
}else{
    $Email=$_POST['Email']; 
    if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){ //verifica que sea un campo email
        $error.="Ingresa un correo valido porfavor <br>";
    }else{
        $Email=filter_var($Email,FILTER_SANITIZE_STRING); //Elimina etiquetas maliciosas y solo deja strings      
    }
}

//Telefono
if(empty($_POST['Tel'])){ // verifica que el campo email no este vacio
    $error.="Ingresa tu Numero de telefono porfavor... <br>";
}else{
    if(!ctype_digit($_POST['Tel'])){ //compara que sean digitos y no caracteres
        $error.="Ingresa un numero de telefono valido <br>";
    }else{
        $Tel=($_POST['Tel']);
        $Tel=filter_var($Tel,FILTER_SANITIZE_STRING);//Elimina etiquetas maliciosas y solo deja strings     
    }
}

//Mensaje 
if(empty($_POST['Mensaje'])){
    $error.="ingresa un Mensaje porfavor <br>";
}else{
    $Mensaje=$_POST['Mensaje'];
    $Mensaje=filter_var($Mensaje,FILTER_SANITIZE_STRING);
}

//contenido del correo 
$contenido = 
"Nombre: ".$Nombre.
"\nApellido: ".$Apellido. 
"\nCiudad: ".$Ciudad.
"\nEstado: ".$Estado. 
"\nEmail: ".$Email.
"\nTelefono: ".$Tel.
"\nMensaje: ".$Mensaje;

//direccion
$enviarA = 'freddkross@gmail.com';
$Asunto = 'Solicitud de Empleo';

//Enviar correo
if($error == ''){
    $success= mail($enviarA,$Asunto,$contenido,' de: '.$Email);
    echo "Su mensaje se envio correctamente, nos pondremos en contacto a la brevedad";
}else{
    echo $error;
}

?>