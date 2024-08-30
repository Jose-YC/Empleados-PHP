@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventas.update', $venta ) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
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
    let index = 0;
    let i = 1;
    let total = 0;
    let listaProductos = [];

    // actualizarTotal();

    $('#add').click(agregarProducto);

    // Cargar datos existentes en caso de edición
    // @if ($modoEdicion)
    //     @foreach ($datosExistente as $dato)
    //         listaProductos[index] = '{{ $dato->id }}';
    //         total += {{ $dato->precio }} * {{ $dato->cantidad }};
    //         let fila = crearFila('{{ $dato->nombre }}', '{{ $dato->cantidad }}', '{{ $dato->precio }}');
    //         $(SELECTOR_DETALLE).append(fila);
    //         index++;
    //         i++;
    //     @endforeach
    //     actualizarTotal();
    // @endif

    function agregarProducto(e) {
        e.preventDefault();
        let producto = $(SELECTOR_PRODUCTOS).val().split('_');
        let cantidad = $(SELECTOR_CUANTITY).val();

        if (validarCantidad(cantidad, producto[0], producto[3], producto[4])) {
            let fila = crearFila(producto[1], cantidad, producto[2], producto[4]);
            $(SELECTOR_ERROR).addClass('d-none');

            $(SELECTOR_DETALLE).append(fila);
            total += producto[2] * cantidad;
            listaProductos[index] = producto[0];
            actualizarTotal();
            index++;
            i++;
            resetearCampos();
            $(SELECTOR_ERROR).addClass('d-none');
        }
    }

    function crearFila(nombre, cantidad, precio, descripcion) {
        let precioTotal = precio * cantidad;
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

        $(SELECTOR_TOTAL).val(total);
    }

    function remover(fila, precio) {
        $(`#row${fila}`).remove();
        total -= precio;
        listaProductos.splice(fila);
        actualizarTotal();
        index--;
        i--;
    }

    function validarCantidad(cantidad, id, stock,descripcion) {
        console.log(cantidad + ' ' + stock +" ----" +descripcion);
        if(descripcion === 'Unidad'){
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
        }else{
            if (parseFloat(cantidad) <= parseInt(stock)) {
            if (parseFloat(cantidad) > 0) {
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
