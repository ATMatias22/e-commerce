import { construirCarrito } from './disenio-carrito.js';
import { agregarYActualizarDisenioAlAgregarAlCarrito, eliminarYActualizarDisenioAlQuitarDelCarrito, cantidadDeProductosEnCarrito } from './funcionalidad-carrito.js';


//verificamos si existe un producto en el array de localStorwage
function existeProductoEnCarrito(id) {
  let arrayObtenido = localStorage.getItem('productos');
  arrayObtenido = JSON.parse(arrayObtenido);
  let productoRepetido = arrayObtenido.find(prod => prod['id'] === id);
  return productoRepetido === undefined ? false : true;
}


export function guardarCarrito(e, $elementoDondeSeColocaLaCantidadDeProductosEnCarrito, claseDelElementoQueProvocaElEvento) {
  //la clase del elemento que queres que provoque el evento (esta dentro del form)(home y shop.php)
  if (e.target.matches(`.${claseDelElementoQueProvocaElEvento}`)) {
    if (localStorage.getItem('productos') === null) {
      localStorage.setItem('productos', JSON.stringify([]));
    }
    //hacemos referencia al padre del elemento clickeado y luego obtenemos el hijo en la posicion colocada (el hijo debe ser el input que contiene el id del producto en su value)
    const producto = e.target.parentElement[0].value;
    if (!existeProductoEnCarrito(producto)) {
      let formData = new FormData();
      formData.append('id', producto);

      fetch('./model/carrito.php', {
        method: 'post',
        body: formData
      }).then(data => {
        return data.json();
      }).then(data => {
        agregarYActualizarDisenioAlAgregarAlCarrito(data, $elementoDondeSeColocaLaCantidadDeProductosEnCarrito, e.target);
      })
    } else {
      eliminarYActualizarDisenioAlQuitarDelCarrito($elementoDondeSeColocaLaCantidadDeProductosEnCarrito, producto, e.target);
    }
  }
}

//parametros = formulario que esta aplicando la accion, posicion del boton que provoca el agregado al carrito (Este boton esta detro del formulario) ,elemento en donde queres que se muestre la cantidad de productos en el carrito
function modificarProductosSiEstanEnElCarrito($formulario, $posicionDelBoton, $elementoDondeSeColocaLaCantidadDeProductosEnCarrito) {
  //verificamos que exista en localStorage un key productos sino existe la creamos;
  if (localStorage.getItem('productos') === null) {
    localStorage.setItem('productos', JSON.stringify([]));
  } else {
    let arrayObtenido = localStorage.getItem('productos');
    arrayObtenido = JSON.parse(arrayObtenido);
    $formulario.forEach(hijo => {
      let encontrado = false;
      let prodID;

      for (const prod of arrayObtenido) {
        //seteamos la palabra producto pq es el nombre del id del boton que provoca este evento de agregar al carrito(boton que esta en el formulario)(home y shop.php)
        //verificamos si en el array que esta guardado en localStorage en el cual  tiene una propiedad id, es igual al id del boton que provoca el evento de agregar al carrito, si es igual es xq ese producto esta en el carrito
        if (`producto${prod.id}` === hijo.children[$posicionDelBoton].id) {
          encontrado = true;
          prodID = prod.id;
          break;
        }
      }

      //aca cambiamos el mensaje dependiendo de si existe o no el producto en el array del localStorage
      if (encontrado === true) {
        $elementoDondeSeColocaLaCantidadDeProductosEnCarrito.innerText = cantidadDeProductosEnCarrito();
        //seteamos el like ya que es el ID del svg del corazon y le colocamos un id para que sepa a que id tiene que ir de los productos (home y shop.php)
        document.getElementById(`like${prodID}`).classList.add('color');
        document.getElementById(hijo.children[$posicionDelBoton].id).innerText = 'Delete from cart'
      } else {
        $elementoDondeSeColocaLaCantidadDeProductosEnCarrito.innerText = cantidadDeProductosEnCarrito();
        document.getElementById(hijo.children[$posicionDelBoton].id).innerText = 'Add to cart'
      }
    })
  }
}



//parametros pedimos el nombre del formulario ,la posicion como hijo que lleva el boton que ejecuta la accion (dentro del form)  ,el elemento donde se colocaran los producots y el elemento html en donde queres colocar la cantidad de productos en el carrito
export function inicializaElCarritoAlCargarLaPagina($formulario, $posicionDelBoton, $elementoDondeSeColocanLosProductos, $elementoDondeSeColocaLaCantidadDeProductosEnCarrito) {
  //parametro = nombre formulario que provoca la accion, ,la posicion como hijo que lleva el boton que ejecuta la accion (dentro del form) y el elemento html en donde queres colocar la cantidad de productos en el carrito
  modificarProductosSiEstanEnElCarrito($formulario, $posicionDelBoton, $elementoDondeSeColocaLaCantidadDeProductosEnCarrito)
  //el redondito rojo que sale en el carrito
  $elementoDondeSeColocaLaCantidadDeProductosEnCarrito.innerText = cantidadDeProductosEnCarrito();
  //construimos el carrito cada ves que se ejecute este script
  construirCarrito($elementoDondeSeColocanLosProductos);

}