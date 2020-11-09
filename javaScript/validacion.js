//nombre
//apellidos
//direccion
//ciudad
//zip_code
//foto

var boton = 

function validarcontraseña(){
    let nodo=document.getElementById('contraseña');
    let contraseña=nodo.value;

    if(contraseña.length<8){
        nodo.style.color="red";
    }

    for(var i =0;i<contraseña.length;i++ ){
        
        var mayuscula=false
        var minuscula=false
        var numero=false

        if(contraseña.charCodeAt(i)>=65 && contraseña.charCodeAt(i)<=90){
            mayuscula=true
        }
        else if (contraseña.charCodeAt(i)>=97 && contraseña.charCodeAt(i)<=122){
            minuscula=true
        }
        else if(contraseña.charCodeAt(i)>=48 && contraseña.charCodeAt(i)<=57){
            numero=true
        }
    }

    if(mayuscula==false){
        let parrafo=document.getElementById("pContra")
        parrafo.textContent="Hace falta una mayuscula"
        boton = false
    }
    else if(minuscula==false){
        let parrafo=document.getElementById("pContra")
        parrafo.textContent="Hace falta una minuscula"
        boton = false
    }
    else if(numero==false){
        let parrafo=document.getElementById("pContra")
        parrafo.textContent="Hace falta un numero"
        boton = false
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