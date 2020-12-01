var Prod2ID = {}

function visor(x){

    let contenedor=document.createElement('div')
    contenedor.setAttribute('class', 'item')
    contenedor.setAttribute('id',x["id_producto"])


    let imagen=document.createElement("img")
    imagen.setAttribute("src",x["imagen"])
    imagen.setAttribute("width","150")
    imagen.setAttribute("height","100")

    let parrafo = document.createElement("p")
    parrafo.textContent= x["nombre"]+" "+ x["precio"]+"€"

    let boton=document.createElement("button")
    boton.setAttribute("class", "botonleermas")
    boton.setAttribute("type", "submit")
    boton.setAttribute("onclick", "anyadir(this)")
    boton.setAttribute("id", x['id_producto'])
    boton.textContent = 'Añadir'

    Prod2ID[x["nombre"]] = x["id_producto"]

    contenedor.appendChild(imagen)
    contenedor.appendChild(parrafo)
    contenedor.appendChild(boton)

    if(document.getElementById('visor') != null){
        document.getElementById('visor').appendChild(contenedor)
    }


}

function insertarOpciones(x){
        let n = document.createElement('option')
        n.setAttribute("id", x["id_producto"])

        //n.setAttribute("onchange", "mostrarEnVisor()")

        //n.onchange = mostrarEnVisor()

        n.value = x["nombre"]
        if(document.getElementById('list') != null){
            document.getElementById('list').appendChild(n)
        }   
}


function mostrarEnVisor(elem){
   document.getElementById(Prod2ID[elem.value]).scrollIntoView()
   
}

