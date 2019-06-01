function validar(){

    var bandera = false;

    for (var i = 0; i<document.forms[0].length; i++){
        var elemento = document.forms[0].elements[i];
        if (elemento.value.trim() == ''){
            bandera = true;
            elemento.classList.add('error');
            break;
        }
    }

    if (bandera == true){

        alert('Llenar todos los campos');
        document.getElementById('p').classList.add('p');
        return false;

    } else {
        var cedula = validarCedula();
        if (cedula) {
            return false;
        } else {
            return true;
        }

    }
}

//Quita los mensajes de error por datos incompletos en cuanto el usuario ingresa valores
function escribe(elemento) {
    elemento.classList.remove('error');
    document.getElementById('p').classList.remove('p');
}

//Valida que solo se ingresen números
function val_numero(string){
    var out = '';
    var filtro = '1234567890';//Caracteres validos
    
    //Recorre el value y verifica si el caracter se encuentra en la lista de validos 
    for (var i = 0; i < string.length; i++)
        if (filtro.indexOf(string.charAt(i)) != -1) 
        //Se añaden a la salida los caracteres validos
        out += string.charAt(i);
    
    //Retornar el valor filtrado
    return out;
} 

//Valida que solo se ingresen letras
function val_letra(string){
    var out = '';
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ ';//Caracteres validos
    
    //Recorre el value y verifica si el caracter se encuentra en la lista de validos 
    for (var i = 0; i < string.length; i++)
        if (filtro.indexOf(string.charAt(i)) != -1) 
        //Se añaden a la salida los caracteres validos
        out += string.charAt(i);
    
    //Retorna el valor filtrado
    return out;
} 

//Permite que sólo se ingresen dos valores
function dos_valores(string) {
    var out = '';
    var array = string.split(' ');
    if (array.length == 1){
        out += array[0];
    } else {
        out += array[0] + ' ' + array[1];
    }
    
    return out;
}

function validarCedula() {
    var cedula = document.getElementById('ced').value.trim();
    if (cedula.substring(0, 2) > 24) {
        document.getElementById('ced').classList.add('error');
        document.getElementById('c').classList.add('p');
        alert('Cédula no válida');
        return true;
    } else {
        return false;
    }
}

function validarCorreo() {
    var array = document.getElementById('ema').value.split('@');

    if(array[0].length < 3) {
        document.getElementById('ema').classList.add('error');
        alert('Correo no válido')
        return true;
    } else {
        if (!(array[1] == 'ups.edu.ec') && !(array[1] == 'est.ups.edu.ec')) {
            document.getElementById('ema').classList.add('error');
            document.getElementById('e').classList.add('p');
            alert('Extensión no válida')
            return true;
        } else {
            return false;
        }
        
    } 
}