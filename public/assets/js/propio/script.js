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
    if (e.target.matches('.producto-mas') || e.target.matches('.producto-mas *')) {
      if (e.target.matches('.producto-mas')) {
        e.target.parentElement.children[1].value = parseFloat(e.target.parentElement.children[1].value) + 1
        /*      console.log(e.target.parentElement.children[1].value)
             console.log(e.target.parentElement.parentElement.parentElement.parentElement.parentElement.children[1].innerText); */

        let precioSinSignoPesos = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.children[1].innerText.substr(1);
        let total = parseFloat(precioSinSignoPesos) * (parseFloat(e.target.parentElement.children[1].value) >= 1
          ? parseFloat(e.target.parentElement.children[1].value) : 1);
        let $dondeVaEltotal = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.children[3].children[0];
        $dondeVaEltotal.innerText = "$" + (total);
        /*       console.log(e.target.parentElement.parentElement.parentElement.parentElement.parentElement.children[3].children[0].innerText); */

      } else {

        e.target.parentElement.parentElement.children[1].value = parseInt(e.target.parentElement.parentElement.children[1].value) + 1
        let precioSinSignoPesos = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.children[1].innerText.substr(1);
        let total = parseFloat(precioSinSignoPesos) * (parseFloat(e.target.parentElement.parentElement.children[1].value) >= 1 ? parseFloat(e.target.parentElement.parentElement.children[1].value) : 1);
        let $dondeVaEltotal = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.children[3].children[0];
        $dondeVaEltotal.innerText = "$" + (total);
      }
    }

    if (e.target.matches('.producto-menos') || e.target.matches('.producto-menos *')) {
      if (e.target.matches('.producto-menos')) {
        e.target.parentElement.children[1].value = parseFloat(e.target.parentElement.children[1].value) - 1
        let precioSinSignoPesos = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.children[1].innerText.substr(1);
        let total = parseFloat(precioSinSignoPesos) * (parseFloat(e.target.parentElement.children[1].value) >= 1
          ? parseFloat(e.target.parentElement.children[1].value) : 1);
        let $dondeVaEltotal = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.children[3].children[0];
        $dondeVaEltotal.innerText = "$" + (total);

      } else {

        e.target.parentElement.parentElement.children[1].value = parseFloat(e.target.parentElement.parentElement.children[1].value) - 1
        let precioSinSignoPesos = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.children[1].innerText.substr(1);
        let total = parseFloat(precioSinSignoPesos) * (parseFloat(e.target.parentElement.parentElement.children[1].value) >= 1 ? parseFloat(e.target.parentElement.parentElement.children[1].value) : 1);
        let $dondeVaEltotal = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.children[3].children[0];
        $dondeVaEltotal.innerText = "$" + (total);
      }
    }


    if (e.target.matches('#boton_total')) {
      let productosCarrito = document.querySelectorAll('.precio-producto');
      let acumuladorTotal = 0;
      productosCarrito.forEach(prod => {
        let total = parseFloat(prod.innerText.substr(1));
        acumuladorTotal += total;
      })


      Swal.fire({
        title: "The total of your purchase is: $" + acumuladorTotal,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `Pay`,
        denyButtonText: `Cancel`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          Swal.fire('Thanks for your purchase!', '', 'success')
        }
      })


    }


  })
})

