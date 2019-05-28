function validarCamposObligatorios()
{
    
    var bandera= false;
    for (var i = 0; i < document.forms[0].length; i++)
    {
var elemento = document.forms[0].elements[i];
            if (elemento.value.trim() == '' ) 
             {

                bandera = true;
                if(elemento.id == 'cedula')
                {
                    elemento.style.border = "1px red solid";
                    document.getElementById("mensajeCedula").innerHTML= ("Obligatoria");
                    document.getElementById("mensajenombre").innerHTML= ("Obligatoria");
                    document.getElementById("mensajeapellido").innerHTML= ("Obligatoria");
                    document.getElementById("mensajedireccion").innerHTML= ("Obligatoria");
                    document.getElementById("mensajetelefono").innerHTML= ("Obligatoria");
                    document.getElementById("mensajecorreo").innerHTML= ("Obligatoria");
                    document.getElementById("mensajepassword").innerHTML= ("Obligatoria");

                }
             }
            }
             if (bandera)
             {
            return false
            }
            else
            {
                return true 
            }
}
var aux =0
function validarLetras(elemento)    
{

    if (elemento.value.length > 0)
    
    var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
    console.log(miAscii)
    if ((miAscii >=97 && miAscii <=122) || (miAscii == 32  && aux == 0) )
    {   
            if(miAscii == 32 )
            {
                aux =aux+1;
            }
            return  true
    }
    else
    {
        elemento.value=elemento.value.substring(0,elemento.value.length-1)
        return false
    }
    
}

var aux2 =0
function validarnumeros(elemento)    
{

    if (elemento.value.length > 0)
    
    var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
    console.log(miAscii)
    if ((miAscii >=48 && miAscii <=57) && aux2 <10)
    {   
        
        aux2=aux2+1
        return  true
    }
    else
    {
        elemento.value=elemento.value.substring(0,elemento.value.length-1)
        return false
    }
    
}



var aux3 =0
function validartelefono(elemento)    
{
    if (elemento.value.length > 0)
    
    var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
    console.log(miAscii)
    if ((miAscii >=48 && miAscii <=57) && aux3 <10)
    {   
        
        aux3=aux3+1
        return  true
    }
    else
    {
        elemento.value=elemento.value.substring(0,elemento.value.length-1)
        return false
    }
    
}

 

 
    


