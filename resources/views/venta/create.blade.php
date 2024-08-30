@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventas.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('venta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        const SELECTOR_PRODUCTOS = '#productos';
        const SELECTOR_CUANTITY = '#cuantity';
        const SELECTOR_TOTAL = '#venmonto';
        const SELECTOR_TOTAL_IMPUESTO = '#venimpuesto';
        const SELECTOR_TOTAL_NETO = '#ventotalneto';
        const SELECTOR_DETALLE = '#detalle';
        const SELECTOR_ERROR = '#error';
        const SELECTOR_MENSAJE = '#mensaje';
        const SELECTOR_INPUESTO = 0.18;
        let index = 0;
        let i = 1;
        let total = 0;
        let listaProductos = [];
        $('#add').click(agregarProducto);

        function agregarProducto(e) {
            e.preventDefault();
            let producto = $(SELECTOR_PRODUCTOS).val().split('_');
            console.log(producto[0]);
            let cantidad = $(SELECTOR_CUANTITY).val();

            if (validarCantidad(cantidad, producto[0], producto[3], producto[4])) {
                total += producto[2] * cantidad;
                listaProductos[index] = producto[0];
                let fila = crearFila(producto[1], cantidad, producto[2], producto[4]);
                $(SELECTOR_ERROR).addClass('d-none');
                $(SELECTOR_DETALLE).append(fila);
                 
                console.log(listaProductos);
                actualizarTotal();
                index++;
                i++;
                resetearCampos();
                $(SELECTOR_ERROR).addClass('d-none');
            }
        }

        function crearFila(nombre, cantidad, precio, descripcion) {

            let precioTotal = (precio * cantidad).toFixed(2);
            return `<tr id="row${index}">
        <td>
            <input type="hidden" name="list_productos[]" value="${listaProductos[index]}">
            <input type="hidden" name="list_quantity[]" value="${cantidad}">
            <input type="hidden" name="list_precios[]" value="${precio}">
            ${i}
        </td>
        <td>${nombre}</td>
        <td>${cantidad} ${ descripcion}</td>
        <td>${precio}</td>
        <td>${precioTotal}</td>
        <td>
            <button onclick="remover(${index}, ${precioTotal})" class="btn btn-danger">
                <i class="fas fa-minus"></i>
            </button>
        </td>
    </tr>`;
        }

        function resetearCampos() {
            $(SELECTOR_CUANTITY).val(1);
        }

        function actualizarTotal() {
            let impuesto = (total * SELECTOR_INPUESTO);
            let totalNeto = total + impuesto;
            $(SELECTOR_TOTAL).val(total.toFixed(2));
            $(SELECTOR_TOTAL_IMPUESTO).val(impuesto.toFixed(2));
            $(SELECTOR_TOTAL_NETO).val(totalNeto.toFixed(2));
        }
        function remover(fila, precio) {
            $(`#row${fila}`).remove();
            total -= precio;
            listaProductos.splice(fila);
            actualizarTotal();
            index--;
            i--;
        }
        function validarCantidad(cantidad, id, stock, descripcion) {
            if (descripcion === 'Unidad') {
                if (parseInt(cantidad) <= parseInt(stock)) {
                    if (parseInt(cantidad) > 0) {
                        for (let i = 0; i < listaProductos.length; i++) {
                            const elemento = listaProductos[i];
                            if (elemento === id) {
                                $(SELECTOR_ERROR).removeClass('d-none');
                                $(SELECTOR_MENSAJE).text('Elemento no contiene stock suficiente');
                                return false;
                            }
                        }
                        return true;
                    } else {
                        $(SELECTOR_ERROR).removeClass('d-none');
                        $(SELECTOR_MENSAJE).text('Cantidad minimia 1');
                        return false;
                    }
                } else {
                    $(SELECTOR_ERROR).removeClass('d-none');
                    $(SELECTOR_MENSAJE).text('Stock insuficiente o no selecciono producto');
                    return false;
                }
            } else {
                if (parseFloat(cantidad) <= parseInt(stock)) {
                    if (parseFloat(cantidad) > 0) {
                        for (let i = 0; i < listaProductos.length; i++) {
                            const elemento = listaProductos[i];
                            if (elemento === id) {
                                $(SELECTOR_ERROR).removeClass('d-none');
                                $(SELECTOR_MENSAJE).text('El producto ya se encontrado');
                                return false;
                            }
                        }
                        return true;
                    } else {
                        $(SELECTOR_ERROR).removeClass('d-none');
                        $(SELECTOR_MENSAJE).text('Cantidad seleccionada debe ser mayor a 0');
                        return false;
                    }
                } else {
                    $(SELECTOR_ERROR).removeClass('d-none');
                    $(SELECTOR_ERROR).removeClass('d-none');
                    $(SELECTOR_MENSAJE).text('Stock insuficiente');
                    $(SELECTOR_MENSAJE).text('Stock insuficiente o no selecciono producto');
                    return false;
                }
            }
        }
    </script>
@endsection
