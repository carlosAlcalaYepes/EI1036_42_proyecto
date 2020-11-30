var Prod2ID = {}

function visor(x){

    let contenedor=document.createElement('div')
    contenedor.setAttribute('class', 'item')
    contenedor.setAttribute('id',x["id_producto"])


    let imagen=document.createElement("img")
    imagen.setAttribute("src",x["imagen"])
    imagen.setAttribute("width","100")
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

    if(contenedor!=null){
        document.getElementById('visor').appendChild(contenedor)
    }

}

function insertarOpciones(x){
        let n = document.createElement('option')
        n.onselect = mostrarEnVisor
        n.value = x["nombre"]
        document.getElementById('list').appendChild(n)
}


function mostrarEnVisor(){
    console.log('mostrar')
    document.getElementById(Prod2ID[this.value]).scrollIntoView()
    consola.log(Prod2ID[this.value])
}

