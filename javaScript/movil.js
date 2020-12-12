var Prod2ID = {}

/* Funciones para mover el carrusel */
  var prev = function() {
    var carousel = document.getElementById('carousel');
    carousel.prev();
  };

  var next = function() {
    var carousel = document.getElementById('carousel');
    carousel.next();
  };

  /* Función para añadir un elemento al carrusel */
  function addItem(color, text){
    let nodo = document.createElement('ons-carousel-item')
    nodo.style.backgroundColor = color
    nodo.innerHTML = `<div style="text-align: center; font-size: 30px; margin-top: 20px; color: white;">${text}</div>`
    document.getElementById('carousel').appendChild(nodo)
  }

  //llenar el visor
  function visor(x){

    let nodo = document.createElement('ons-carousel-item')
    let contenedor=document.createElement('div')
    contenedor.setAttribute('class', 'itemM')
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
    
    nodo.appendChild(contenedor)

    document.getElementById('carousel').appendChild(nodo)



    }

    (function(){
    let lista = JSON.parse(localStorage.getItem('localcesta'))
    if(lista && lista.length>0)
      lista.forEach(producto => anyadir(producto))
    })()


    function anyadir(producto){
    
        let nodo = document.createElement('ons-list-item')
    
        let span = document.createElement('span')
        span.classList.add('miItem') // añadimos una nueva clase al atributo 'class'

        let id = producto.id
    
        span.textContent = id
        
        nodo.appendChild(span)

        let boton = document.createElement('ons-button')
        boton.textContent = 'X'
        nodo.appendChild(boton)
        boton.onclick = eliminar
        boton.classList.add('elimina')
    
        if(nodo != null && document.getElementById('cesta')!=null){
            document.getElementById('cesta').appendChild(nodo)
        }

        let lista = document.querySelectorAll('.miItem')
        lista = Array.from(lista).map(n => n.textContent)
        localStorage.setItem('localcesta', JSON.stringify(lista))
       
    }

    
    function comprarMovil(){

      
      let lista = document.querySelectorAll('.miItem')
      lista = Array.from(lista).map(n => n.textContent)
      localStorage.setItem('localcesta', JSON.stringify(lista))

      var a=JSON.stringify(lista)

      let var1="]"
      let var2="["
      a=a.replace(var2,"")
      a=a.replace(var1,"")
      a=a.replace(/"/g,"")
    
      let data= new FormData()
      data.append('productos',a)

      

      fetch('comprarMovil.php',{
          method:'POST',
          body:data
      }) 
      .then(response => {
          if (response.ok)
              return response.json()
          else
              throw response.statusText
      })
      .catch(err => console.log('Fetch Error :', err) ) 
      
      lista= Array();
      localStorage.setItem('localcesta', JSON.stringify(lista))
      alert("SE HA REALIZADO LA COMPRA DE TUS PRODUCTOS DE LA CESTA")
      while (document.getElementById('cesta').firstChild){
        document.getElementById('cesta').removeChild(document.getElementById('cesta').firstChild);
    };
    }
   



    function eliminar(){
        this.parentNode.remove()

        let lista = document.querySelectorAll('.miItem')
        lista = Array.from(lista).map(n => n.textContent)
        localStorage.setItem('cesta', JSON.stringify(lista))

        /*
        
        var a=JSON.stringify(lista)
        let var1="]"
        let var2="["
        a=a.replace(var2,"")
        a=a.replace(var1,"")
        a=a.replace(/"/g,"")

      

        let form = document.getElementById('formulario')
        //let accion = form.getAttribute('action')
        let accion = 'comprar.php?productos=' + a

        form.setAttribute('action', accion)
        */

    }


  /* Ejemplo para añadir elementos al carrusel cuando se carga una página */
  document.addEventListener("init", function(event) {
        var page = event.target;
        if( page.matches('#page1') ) { 
           fetch('/datos.php')
            .then(response => {
                if (response.ok)
                    return response.json()
                else
                    throw response.statusText
            })
            .then(data=>{data.forEach(x => visor(x))})
        }
  })