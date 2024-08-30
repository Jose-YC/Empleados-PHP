<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('idProveedor') }}
            {{ Form::select('idProveedor', $proveedores, null, ['class' => 'form-control' . ($errors->has('idProveedor') ? ' is-invalid' : ''), 'placeholder' => 'seleccione Proveedor']) }}

            {!! $errors->first('idProveedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('products') ? ' has-error' : '' }}">
                    <label for="products">Seleccione un producto</label>
                    <select id="productos" class="form-control">
                        <option value="">Seleccione un producto</option>
                        @foreach ($productosRepuestos as $product)
                            <option
                                value="{{ $product->idProducto }}_{{ $product->pronombre }}_{{ $product->propreciocompra }}_{{ $product->prostock }}_{{ $product->unidadmedida()->first()->umednombre }}">
                                {{ $product->pronombre }}-{{ $product->unidadmedida()->first()->umednombre }}
                            </option>
                        @endforeach
                    </select>
                    {!! $errors->first('idTipocomprobante', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('cuantity') ? ' has-error' : '' }}">
                    {!! Form::label('cuantity', 'Cantidad') !!}
                    {!! Form::number('cuantity', 0, ['class' => 'form-control', 'required' => 'required', 'id' => 'cuantity']) !!}
                    <small class="text-danger">{{ $errors->first('cuantity') }}</small>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <div class="float-end form-group{{ $errors->has('cuantity') ? ' has-error' : '' }} ">

                    <input type="button" class=" btn btn-primary" id="add" value="Agregar">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ml-3 col-md-12 d-none alert alert-danger" role="alert" id="error">
                <strong id="mensaje">hola</strong>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista Productos</h3>
                        </div>
                        <div class="card-body">
                            <div id="suppliesDetail_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="detalle"
                                            class="table table-bordered table-striped dataTable dtr-inline"
                                            aria-describedby="suppliesDetail_info">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre de insumo</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Total</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('orcomtotal', 'Total') }}
                {{ Form::text('orcomtotal', $ordenCompra->orcomtotal, ['class' => 'form-control' . ($errors->has('orcomtotal') ? ' is-invalid' : ''), 'placeholder' => 'Total']) }}
                {!! $errors->first('orcomtotal', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('orcomdescripcion','Observaciones') }}
                {{ Form::text('orcomdescripcion', $ordenCompra->orcomdescripcion, ['class' => 'form-control' . ($errors->has('orcomdescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
                {!! $errors->first('orcomdescripcion', '<div class="invalid-feedback">:message</div>') !!}
            </div>




        </div>
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
    </div>
    @section('js')
        <script>
            const SELECTOR_PRODUCTOS = '#productos';
            const SELECTOR_CUANTITY = '#cuantity';
            const SELECTOR_TOTAL_NETO = '#orcomtotal';
            const SELECTOR_DETALLE = '#detalle';
            const SELECTOR_ERROR = '#error';
            const SELECTOR_MENSAJE = '#mensaje';

            let index = 0;
            let i = 1;
            let total = 0;
            let listaProductos = [];
            $('#add').click(agregarProducto);

            function agregarProducto(e) {
                e.preventDefault();
                let producto = $(SELECTOR_PRODUCTOS).val().split('_');

                let cantidad = $(SELECTOR_CUANTITY).val();
                if (producto[4] == 'Unidad') {cantidad = parseInt(cantidad);} else {cantidad = parseFloat(cantidad);}
                if (validarCantidad(cantidad, producto[0], producto[4])) {
                    total += producto[2] * cantidad;
                    listaProductos[index] = producto[0];
                    let fila = crearFila(producto[1], cantidad, producto[2], producto[4]);
                    $(SELECTOR_ERROR).addClass('d-none');
                    $(SELECTOR_DETALLE).append(fila);
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
                    <td>${cantidad} ${descripcion}</td>
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
                $(SELECTOR_TOTAL_NETO).val(total.toFixed(2));
            }

            function remover(fila, precio) {
                $(`#row${fila}`).remove();
                total -= precio;
                listaProductos.splice(fila);
                actualizarTotal();
                index--;
                i--;
            }

            function validarCantidad(cantidad, id, descripcion) {

                if (cantidad > 0) {
                    for (let i = 0; i < listaProductos.length; i++) {
                        const elemento = listaProductos[i];
                        if (elemento === id) {
                            $(SELECTOR_ERROR).removeClass('d-none');
                            $(SELECTOR_MENSAJE).text('Elemento ya seleccionado');
                            return false;
                        }
                    }
                    return true;
                } else {
                    $(SELECTOR_ERROR).removeClass('d-none');
                    $(SELECTOR_MENSAJE).text('Cantidad minimia 1');
                    return false;
                }


            }
        </script>
    @endsection
