(function(){
    let lista = JSON.parse(localStorage.getItem('localcesta'))
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

    

    let boton = document.createElement('button')
    boton.textContent = 'Eliminar'
    nodo.appendChild(boton)
    boton.onclick = eliminar
    boton.classList.add('boton')
  
    document.getElementById('cesta').appendChild(nodo)



    let lista = document.querySelectorAll('.producto_cesta')
    lista = Array.from(lista).map(n => n.textContent)
    localStorage.setItem('localcesta', JSON.stringify(lista))

    /*Prubas*/
    var a=JSON.stringify(lista)
    

    let var1="]"
    let var2="["
    a=a.replace(var2,"")
    a=a.replace(var1,"")
    a=a.replace(/"/g,"")

    console.log(a)
    /*pruebas*/
    let form = document.getElementById('formulario')
    //let accion = form.getAttribute('action')
    let accion = '?action=realizar_compra&productos_cesta=' + a

    form.setAttribute('action', accion)


}

function eliminar(){
    this.parentNode.remove()

    let lista = document.querySelectorAll('.producto_cesta')
    lista = Array.from(lista).map(n => n.textContent)
    localStorage.setItem('cesta', JSON.stringify(lista))

    /*Prubas*/
    var a=JSON.stringify(lista)
    let var1="]"
    let var2="["
    a=a.replace(var2,"")
    a=a.replace(var1,"")
    a=a.replace(/"/g,"")

    /*pruebas*/

    let form = document.getElementById('formulario')
    //let accion = form.getAttribute('action')
    let accion = '?action=realizar_compra&productos_cesta=' + a

    form.setAttribute('action', accion)

  }

function guardar(){
    let lista = document.querySelectorAll('.producto_cesta')
    lista = Array.from(lista).map(n => n.textContent)
    localStorage.setItem('cesta', JSON.stringify(lista))
}

function borarrLocalStorage(){
    console.log("borrado")
    localStorage.clear();
}

function verCesta(){
    document.getElementById('cestaCompra').style.display = 'block';
}

function cerrarCesta(){
    document.getElementById('cestaCompra').style.display = 'none';
}