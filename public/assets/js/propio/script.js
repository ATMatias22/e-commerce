import { guardarCarrito, inicializaElCarritoAlCargarLaPagina } from './carrito/carrito.js';


document.addEventListener("DOMContentLoaded", e => {
  //MODAL AUTOEJECUTABLE
  (function () {
    $(function () {
      $('#ventana-modal').modal({
        backdrop: 'static',
        keyboard: false
      })

    });

  }());

  //$formulario esta en home y shop (va a ver tantos formularios como productos creados)
  const $formulario = document.querySelectorAll('.carrito');
  //$elementoDondeSeColocanLosProductos esta en cart.php
  const $elementoDondeSeColocanLosProductos = document.getElementById('producto-carrito')
  //$elementoDondeSeColocaLaCantidadDeProductosEnCarrito esta en header.php
  const $elementoDondeSeColocaLaCantidadDeProductosEnCarrito = document.getElementById('cantidad-productos-carritos');

  inicializaElCarritoAlCargarLaPagina($formulario, 3, $elementoDondeSeColocanLosProductos, $elementoDondeSeColocaLaCantidadDeProductosEnCarrito);

  document.addEventListener('click', e => {
    //cuando tocamos el boton del producto que añade o elimina del carrito
    guardarCarrito(e, $elementoDondeSeColocaLaCantidadDeProductosEnCarrito, 'enviarIDProducto');
    /*   if (e.target.matches('.producto-mas') || e.target.matches('.producto-mas *')) {
        if (e.target.matches('.producto-mas')) {
          e.target.parentElement.children[1].value = parseInt(e.target.parentElement.children[1].value) + 1
          console.log(e.target.parentElement.children[1].value)
        } else {
          e.target.parentElement.parentElement.children[1].value = parseInt(e.target.parentElement.parentElement.children[1].value) + 1
          console.log(e.target.parentElement.parentElement.children[1].value)
        }
      }
  
      if (e.target.matches('.producto-menos') || e.target.matches('.producto-menos *')) {
        if (e.target.parentElement.children[1].value > 1 || e.target.parentElement.parentElement.children[1].value > 1) {
          if (e.target.matches('.producto-menos')) {
            e.target.parentElement.children[1].value = parseInt(e.target.parentElement.children[1].value) - 1
          } else {
            e.target.parentElement.parentElement.children[1].value = parseInt(e.target.parentElement.parentElement.children[1].value) - 1
          }
        }
      } */


  })
})

