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
        //n.setAttribute("id", x["id_producto"])

        //n.setAttribute("onchange", "mostrarEnVisor()")

        //n.onchange = mostrarEnVisor()

        n.value = x["nombre"]
        if(document.getElementById('list') != null){
            document.getElementById('list').appendChild(n)
        }   
}


function mostrarEnVisor(elem){
    console.log(Prod2ID[elem.value])

    //Para evitar el error de introducir en el imput algo que no este en la lista
    if(Prod2ID[elem.value]!=null){
        document.getElementById(Prod2ID[elem.value]).scrollIntoView()
    }
    
   
}

function precioMinMAx(){
    let min= document.getElementById('min').value
    let max= document.getElementById('max').value
    console.log(min)
    console.log(max)

    //"minimo="+min+"&maximo="+max+""
    let data= new FormData()
    data.append('min',min)
    data.append('max',max)
    //o
    let data2= new URLSearchParams("minimo="+min+"&maximo="+max+"")

    console.log(data)
    console.log(data2)

    data2.append('min',min)

    console.log(data2)

    fetch('/precios.php',{
        method:'POST',
        body:data
    }) 
    .then(response => {
        if (response.ok)
            return response.json()
        else
            throw response.statusText
    })
	.then(data=>{data.forEach(x => visor(x)); 
                data.forEach(x => insertarOpciones(x))})
                

}
