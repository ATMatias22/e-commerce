export function construccionDelProudctoEnCarrito(id, nombre, precio) {

  let templateCarrito = `
        <td>
          <div class="media">
            <div class="d-flex">
              <img src="./public/assets/img/products/product${id}/product${id}-1.png" alt="" />
            </div>
            <div class="media-body">
              <p>${nombre}</p>
            </div>
          </div>
        </td>
        <td>
          <h5>$${precio}</h5>
        </td>
        <td>
          <div class="card_area m-0 ">
            <div class="d-block  product_count_area">
              <div class="product_count d-inline-block m-0">
                <span class="product_count_item inumber-decrement  w-100 producto-menos" id=> <i class="ti-minus"></i></span>
                <input class="product_count_item input-number p-0 w-100 cantidad-producto"  type="text" value=1 max="100">
                  <span class="product_count_item number-increment  w-100 producto-mas"id= > <i class="ti-plus"></i></span>
                      </div>
              </div>
            </div>
                </td>
          <td>
            <h5 class='precio-producto'>$${precio}</h5>
          </td>
              `
  return templateCarrito;
}


//parametro = elemento html en donde queremos colocar el carrito
export function construirCarrito($elementoDondeSeColocanLosProductos) {

  //verificamos que no sea null para poder hacer todo esto, si es null es xq no deberia haceer esto en las paginas donde el elemento no existe
  if ($elementoDondeSeColocanLosProductos != null) {
    let arrayObtenido = localStorage.getItem('productos');
    arrayObtenido = JSON.parse(arrayObtenido);
    let $fragment = document.createDocumentFragment();

    arrayObtenido.forEach(prod => {
      let tr = document.createElement('tr');
      tr.innerHTML = construccionDelProudctoEnCarrito(prod['id'], prod['nombre'], prod['precio']);
      $fragment.appendChild(tr);
    })
    $elementoDondeSeColocanLosProductos.appendChild($fragment);
  }
}
