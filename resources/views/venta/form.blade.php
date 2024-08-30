<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('vendocumentocliente', 'Documento del Cliente') }}
            {{ Form::text('vendocumentocliente', $venta->vendocumentocliente, ['class' => 'form-control' . ($errors->has('vendocumentocliente') ? ' is-invalid' : ''), 'placeholder' => 'Documento del Cliente']) }}
            {!! $errors->first('vendocumentocliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-group{{ $errors->has('products') ? ' has-error' : '' }}">
                    <label for="products">Seleccione un producto</label>
                    <select id="productos" class="form-control">
                        <option value="">Seleccione un producto</option>
                        @foreach ($productos as $product)
                            <option
                                value="{{ $product->idProducto }}_{{ $product->pronombre }}_{{ $product->propreciounitario }}_{{ $product->prostock }}_{{ $product->unidadmedida()->first()->umednombre }}">
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
        <div class="form-group">
            {{ Form::label('idTipocomprobante', 'Tipo de comprobante') }}
            {{ Form::select('idTipocomprobante', $comprobante, null, ['class' => 'form-control' . ($errors->has('idTipocomprobante') ? ' is-invalid' : ''), 'placeholder' => 'seleccione tipo de comprobante']) }}
            {!! $errors->first('idTipocomprobante', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idTipopago', 'Tipo de Pago') }}
            {{ Form::select('idTipopago', $pago, null, ['class' => 'form-control' . ($errors->has('idTipopago') ? ' is-invalid' : ''), 'placeholder' => 'seleccione tipo de pago']) }}
            {!! $errors->first('idTipopago', '<div class="invalid-feedback">:message</div>') !!}
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
            {{ Form::label('venobservacion', 'Observacion') }}
            {{ Form::text('venobservacion', $venta->venobservacion, ['class' => 'form-control' . ($errors->has('venobservacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion',]) }}
            {!! $errors->first('venobservacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('venmonto', 'Monto') }}
            {{ Form::text('venmonto', $venta->venmonto, ['class' => 'form-control' . ($errors->has('venmonto') ? ' is-invalid' : ''), 'placeholder' => 'Monto','readonly']) }}
            {!! $errors->first('venmonto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('venimpuesto', 'Impuestos(18%)') }}
            {{ Form::text('venimpuesto', $venta->venimpuesto, ['class' => 'form-control' . ($errors->has('venimpuesto') ? ' is-invalid' : ''), 'placeholder' => 'Impuestos','readonly ']) }}
            {!! $errors->first('venimpuesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ventotalneto', 'Total Neto') }}
            {{ Form::text('ventotalneto', $venta->ventotalneto, ['class' => 'form-control' . ($errors->has('ventotalneto') ? ' is-invalid' : ''), 'placeholder' => 'Total' ,'readonly' ]) }}
            {!! $errors->first('ventotalneto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>

