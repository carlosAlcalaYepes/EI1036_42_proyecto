
var boton = true;

function validarcontraseña(){
    let nodo=document.getElementById('contraseña');
    let contraseña=nodo.value;


    var mayuscula=false
    var minuscula=false
    var numero=false
    let parrafo=document.getElementById("pContra")
    for(var i =0;i<contraseña.length;i++ ){

        if(contraseña.charCodeAt(i)>=65 && contraseña.charCodeAt(i)<=90){
            mayuscula=true
        }
        if (contraseña.charCodeAt(i)>=97 && contraseña.charCodeAt(i)<=122){
            minuscula=true
        }
        if(contraseña.charCodeAt(i)>=48 && contraseña.charCodeAt(i)<=57){
            numero=true
        }
    }

    if(mayuscula==false){
        parrafo.textContent="Hace falta una mayuscula"
        //boton = false
    }
    if(minuscula==false){
        parrafo.textContent="Hace falta una minuscula"
        //boton = false
    }
    if(numero==false){
        parrafo.textContent="Hace falta un número"
        //boton = false
    }
    if(contraseña.length<8){
        parrafo.textContent="Debe tener al menos 8 caracteres"
    }
    
    if(mayuscula==true && minuscula==true && numero==true && contraseña.length>=8){
        parrafo.textContent="";
        nodo.style.color="green";
    }
    else{
        nodo.style.color="red";
    }
}

function validarimagen(){
    let nodo = document.getElementById("imagen")

    var tam = nodo.files[0].size /1024/1024 //lo pasamos a MB

    if(tam > 2){
        alert("La imagen excede los 2MB")
    }
}

function enviarBoton(){
    let enviar = document.getElementById("enviar")

}