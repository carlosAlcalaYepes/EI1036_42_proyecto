function visor(x){

    let contenedor=document.createElement('div')
    contenedor.setAttribute('class', 'item')
    contenedor.setAttribute('id',x["id_producto"])


    let imagen=document.createElement("img")
    imagen.setAttribute("src",x["imagen"])
    imagen.setAttribute("width","100")
    imagen.setAttribute("height","100")

    let parrafo = document.createElement("p")
    parrafo.textContent= x["nombre"]+" "+ x["producto"]+"€"

    let boton=document.createElement("button")
    boton.setAttribute("class", "botonleermas")
    boton.setAttribute("type", "submit")
    boton.setAttribute("onclick", "anyadir(this)")
    boton.setAttribute("id", x['id_producto'])
    boton.textContent = 'Añadir'

}