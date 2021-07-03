export function agregarYActualizarDisenioAlAgregarAlCarrito(producto, $elementoDondeSeColocaLaCantidadDeProductosEnCarrito, elementoClickeado) {
  let arrayObtenido = localStorage.getItem('productos');
  arrayObtenido = JSON.parse(arrayObtenido);
  arrayObtenido.push(producto);
  localStorage.setItem('productos', JSON.stringify(arrayObtenido));
  $elementoDondeSeColocaLaCantidadDeProductosEnCarrito.innerText = cantidadDeProductosEnCarrito();
  //seteamos el like ya que es el ID del svg del corazon y le colocamos un id para que sepa a que id tiene que ir de los productos (home y shop.php)

  if (document.getElementById(`like${producto.id}`) != null) {
    document.getElementById(`like${producto.id}`).classList.add('color');
  }
  elementoClickeado.innerText = 'Delete from cart'
}

export function eliminarYActualizarDisenioAlQuitarDelCarrito($elementoDondeSeColocaLaCantidadDeProductosEnCarrito, idProducto, elementoClickeado) {
  let aux = [];
  for (const prod of JSON.parse(localStorage.getItem('productos'))) {
    if (prod.id !== idProducto) {
      aux.push(prod);
    }
  }
  localStorage.setItem('productos', JSON.stringify(aux));
  if (document.getElementById(`like${idProducto}`) != null) {
    document.getElementById(`like${idProducto}`).classList.remove('color');

  }
  $elementoDondeSeColocaLaCantidadDeProductosEnCarrito.innerText = cantidadDeProductosEnCarrito();
  document.getElementById(elementoClickeado.id).innerText = 'Add to cart'
}

//buscamos en el localStorage la key productos y contamos cuandos objetos tiene en su value
export function cantidadDeProductosEnCarrito() {
  let arrayObtenido = localStorage.getItem('productos');
  arrayObtenido = JSON.parse(arrayObtenido);
  let contador = 0;
  for (const prod of arrayObtenido) {
    contador++;
  }
  return contador;
}