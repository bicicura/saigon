<?php
return [
    //TODO: terminar validaciones
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El campo debe ser aceptado.',
    'active_url' => 'El campo no es una URL válida.',
    'after' => 'El campo debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El campo debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El campo solamente puede contener letras.',
    'alpha_dash' => 'El campo solamente puede contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El campo solamente puede contener letras y números.',
    'array' => 'El campo debe ser un arreglo.',
    'before' => 'El campo debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El campo debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => 'El campo debe estar entre :min y :max.',
        'file' => 'El campo debe estar entre :min y :max kilobytes.',
        'string' => 'El campo debe tener entre :min y :max caracteres.',
        'array' => 'El campo debe tener entre :min y :max elementos.',
    ],
    'boolean' => 'El campo debe ser falso o verdadero.',
    'confirmed' => 'El campo de confirmación no coincide.',
    'date' => 'El campo no es una fecha válida.',
    'date_equals' => 'El campo debe ser una fecha igual a :date.',
    'date_format' => 'El campo no coincide con el formato :format.',
    'different' => 'El campo y :other deben ser diferentes.',
    'digits' => 'El campo debe tener :digits dígitos.',
    'digits_between' => 'El campo debe estar entre :min y :max dígitos.',
    'dimensions' => 'El campo tiene dimensiones de imagen inválidas.',
    'distinct' => 'El campo tiene un valor duplicado.',
    'email' => 'El campo debe ser un correo electrónico válido.',
    'exists' => 'El campo seleccionado es inválido.',
    'file' => 'El campo debe ser un archivo.',
    'filled' => 'El campo debe tener un valor.',
    'gt' => [
        'numeric' => 'El campo debe ser mayor que :value.',
        'file' => 'El campo debe ser mayor que :value kilobytes.',
        'string' => 'El campo debe ser mayor que :value caracteres.',
        'array' => 'El campo must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'El campo debe ser mayor que or equal :value.',
        'file' => 'El campo debe ser mayor que or equal :value kilobytes.',
        'string' => 'El campo debe ser mayor que or equal :value caracteres.',
        'array' => 'El campo must have :value items or more.',
    ],
    'image' => 'El campo debe ser una imagen.',
    'in' => 'El campo seleccionado es inválido.',
    'in_array' => 'El campo field does not exist in :other.',
    'integer' => 'El campo must be an integer.',
    'ip' => 'El campo must be a valid IP address.',
    'ipv4' => 'El campo must be a valid IPv4 address.',
    'ipv6' => 'El campo must be a valid IPv6 address.',
    'json' => 'El campo must be a valid JSON string.',
    'lt' => [
        'numeric' => 'El campo must be less than :value.',
        'file' => 'El campo must be less than :value kilobytes.',
        'string' => 'El campo must be less than :value caracteres.',
        'array' => 'El campo must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'El campo must be less than or equal :value.',
        'file' => 'El campo must be less than or equal :value kilobytes.',
        'string' => 'El campo must be less than or equal :value caracteres.',
        'array' => 'El campo must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'El campo no debería ser más grande que :max.',
        'file' => 'El campo no debería pesar más de :max kilobytes.',
        'string' => 'El campo no debería tener más de :max caracteres.',
        'array' => 'El campo no debería tener más de :max elementos.',
    ],
    'mimes' => 'El campo debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El campo debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El campo must be at least :min.',
        'file' => 'El campo must be at least :min kilobytes.',
        'string' => 'El campo must be at least :min caracteres.',
        'array' => 'El campo must have at least :min items.',
    ],
    'not_in' => 'El campo seleccionado es inválido.',
    'not_regex' => 'El formato de es inválido.',
    'numeric' => 'El campo debe ser numérico',
    'present' => 'El campo field debe estar presente.',
    'regex' => 'El campo format es inválido.',
    'required' => 'El campo es obligatorio.',
    'required_if' => 'El campo es obligatorio cuando :other es :value.',
    'required_unless' => 'El campo es obligatorio al menos que :other esté en :values.',
    'required_with' => 'El campo es obligatorio cuando :values está presente.',
    'required_with_all' => 'El campo es obligatorio cuando :values están presentes.',
    'required_without' => 'El campo es obligatorio cuando :values no está presente',
    'required_without_all' => 'El campo es obligatorio cuando ninguno de los valores: :values está presente.',
    'same' => 'El campo y :other deben coincidir.',
    'size' => [
        'numeric' => 'El campo must be :size.',
        'file' => 'El campo must be :size kilobytes.',
        'string' => 'El campo must be :size caracteres.',
        'array' => 'El campo debe contener :size elementos.',
    ],
    'starts_with' => 'El campo con uno de los siguientes valores: :values',
    'string' => 'El campo debe ser una cadena.',
    'timezone' => 'El campo debe ser una zona horaria válida.',
    'unique' => 'El campo ya existe.',
    'uploaded' => 'Error al subir.',
    'url' => 'El formato de es inválido.',
    'uuid' => 'El campo debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];