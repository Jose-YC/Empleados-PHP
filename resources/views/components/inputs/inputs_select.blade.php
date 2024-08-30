@props(['cabeceras', 'datos'])

@php
    $text = 'aqui va el texto necesario';
    $cabeceras = ['cabeceras1', 'cabeceras2', 'cabeceras3'];
    $datos = [[['value' => 'value1_value2_value3', 'nombre' => 'nombre'], ['value' => 'value1_value2_value3', 'nombre' => 'nombre'], ['value' => 'value1_value2_value3', 'nombre' => 'nombre']], [['value' => 'value1_value2_value3', 'nombre' => 'nombre'], ['value' => 'value1_value2_value3', 'nombre' => 'nombre'], ['value' => 'value1_value2_value3', 'nombre' => 'nombre']], [['value' => 'value1_value2_value3', 'nombre' => 'nombre'], ['value' => 'value1_value2_value3', 'nombre' => 'nombre'], ['value' => 'value1_value2_value3', 'nombre' => 'nombre']]];
    $aux = sizeof($cabeceras);
@endphp

<select class="choices form-select" id="componente">
    @foreach ($datos as $dato)
        <optgroup label="{{ $cabeceras[$loop->index] }}">
            @foreach ($dato as $item)
                <option value="{{ $item['value'] }}">{{ $item['nombre'] }}</option>
            @endforeach
        </optgroup>
    @endforeach
</select>


@push('componetsjs')
    <script>
        let choices = document.querySelectorAll(".choices")
        let initChoice
        for (let i = 0; i < choices.length; i++) {
            if (choices[i].classList.contains("multiple-remove")) {
                initChoice = new Choices(choices[i], {
                    delimiter: ",",
                    editItems: true,
                    maxItemCount: -1,
                    removeItemButton: true,
                })
            } else {
                initChoice = new Choices(choices[i])
            }
        }
        // document.getElementById("componente").addEventListener("change", function() {


        //     console.log(document.getElementById("componente").value);


        // })
    </script>
@endpush

