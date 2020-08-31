<input
        x-data="initDatePicker()"
        x-ref="input"
        x-init="new Pikaday(attributes($refs.input,'{{$minDate}}'))"
        type="text"
        {{ $attributes }}
>
