{{-- <div class="col-md-6 mb-4">
    <h6>Basic Multiple choices</h6>
    <p>Use <code>.choices</code> class for basic choices control. Use
        <code>multiple="multiple"</code>
        attribute for multiple select box.
    </p>
    <div class="form-group">
        <select class="choices form-select" multiple="multiple" id="multiselect">
            <option value="square">Square</option>
            <option value="rectangle" selected>Rectangle</option>
            <option value="rombo">Rombo</option>
            <option value="romboid">Romboid</option>
            <option value="trapeze">Trapeze</option>
            <option value="traible" selected>Triangle</option>
            <option value="polygon">Polygon</option>
        </select>
    </div>
</div>



@push('componetsjs')
    <script>
        let choices1 =  document.querySelectorAll("#multiselect") ;
        let initChoice1
        for (let i = 0; i < choices1.length; i++) {
            if (choices1[i].classList.contains("multiple-remove")) {
                initChoice1 = new Choices(choices1[i], {
                    delimiter: ",",
                    editItems: true,
                    maxItemCount: -1,
                    removeItemButton: true,
                })
            } else {
                initChoice1 = new Choices(choices1[i])
            }
        }
    </script>
@endpush --}}
