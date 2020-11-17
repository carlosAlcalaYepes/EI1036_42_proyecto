(function(){
    let lista = JSON.parse(localStorage.getItem('cesta'))

    if(lista && lista.length>0)
      lista.forEach(producto => anyadir(producto))
})()

function anyadir(producto){
    let nodo = document.createElement('li')
  
    let span = document.createElement('span')
    span.classList.add('producto_cesta') // añadimos una nueva clase al atributo 'class'

    let id = producto.id
  
    span.textContent = id

    /*if (producto) 
       span.textContent = producto
    else /*si el contenido es vacio return 
       span.textContent = document.getElementById('').value
       */
    
    nodo.appendChild(span)

    let lista = document.querySelectorAll('.producto_cesta')
    lista = Array.from(lista).map(n => n.textContent)
    localStorage.setItem('cesta', JSON.stringify(lista))

    let form = document.getElementById('formulario')
    let accion ='?action=realizar_compra&productos_cesta=' + JSON.stringify(lista)
    form.setAttribute('action', accion)

    console.log(JSON.stringify(lista))
  
    let boton = document.createElement('button')
    boton.textContent = 'Eliminar'
    nodo.appendChild(boton)
    boton.onclick = eliminar
    boton.classList.add('boton')
  
    document.getElementById('cesta').appendChild(nodo)

}

function eliminar(){
    this.parentNode.remove()

    let lista = document.querySelectorAll('.producto_cesta')
    lista = Array.from(lista).map(n => n.textContent)
    localStorage.setItem('cesta', JSON.stringify(lista))

    let form = document.getElementById('formulario')
    let accion ='?action=realizar_compra&productos_cesta=' + JSON.stringify(lista)
    form.setAttribute("action", accion)

  }

function guardar(){
    let lista = document.querySelectorAll('.producto_cesta')
    lista = Array.from(lista).map(n => n.textContent)
    localStorage.setItem('cesta', JSON.stringify(lista))
}

function comprar(){
    localStorage.clear();
}

function verCesta(){
    document.getElementById('cestaCompra').style.display = 'inline';
}

function cerrarCesta(){
    document.getElementById('cestaCompra').style.display = 'none';
}