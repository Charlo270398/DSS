<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | El following language lines contain El default error messages used by
    | El validator class. Some of Else rules have multiple versions such
    | as El size rules. Feel free to tweak each of Else messages here.
    |
    */

    'accepted' => 'El :attribute must be accepted.',
    'active_url' => 'El :attribute is not a valid URL.',
    'after' => 'El :attribute must be a date after :date.',
    'after_or_equal' => 'El :attribute must be a date after or equal to :date.',
    'alpha' => 'El :attribute may only contain letters.',
    'alpha_dash' => 'El :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'El :attribute may only contain letters and numbers.',
    'array' => 'El :attribute must be an array.',
    'before' => 'El :attribute must be a date before :date.',
    'before_or_equal' => 'El :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'El :attribute must be between :min and :max.',
        'file' => 'El :attribute must be between :min and :max kilobytes.',
        'string' => 'El :attribute must be between :min and :max caracteres.',
        'array' => 'El :attribute must have between :min and :max items.',
    ],
    'boolean' => 'El :attribute field must be true or false.',
    'confirmed' => 'El :attribute confirmation no coincide.',
    'date' => 'El :attribute is not a valid date.',
    'date_equals' => 'El :attribute must be a date equal to :date.',
    'date_format' => 'El :attribute no coincide El format :format.',
    'different' => 'El :attribute and :oElr must be different.',
    'digits' => 'El :attribute must be :digits digits.',
    'digits_between' => 'El :attribute must be between :min and :max digits.',
    'dimensions' => 'El :attribute has invalid image dimensions.',
    'distinct' => 'El :attribute field has a duplicate value.',
    'email' => 'El :attribute must be a valid email address.',
    'exists' => 'El selected :attribute is invalid.',
    'file' => 'El :attribute must be a file.',
    'filled' => 'El :attribute field must have a value.',
    'gt' => [
        'numeric' => 'El :attribute must be greater than :value.',
        'file' => 'El :attribute must be greater than :value kilobytes.',
        'string' => 'El :attribute must be greater than :value caracteres.',
        'array' => 'El :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'El :attribute must be greater than or equal :value.',
        'file' => 'El :attribute must be greater than or equal :value kilobytes.',
        'string' => 'El :attribute must be greater than or equal :value caracteres.',
        'array' => 'El :attribute must have :value items or more.',
    ],
    'image' => 'El :attribute must be an image.',
    'in' => 'El selected :attribute is invalid.',
    'in_array' => 'El :attribute field does not exist in :oElr.',
    'integer' => 'El :attribute must be an integer.',
    'ip' => 'El :attribute must be a valid IP address.',
    'ipv4' => 'El :attribute must be a valid IPv4 address.',
    'ipv6' => 'El :attribute must be a valid IPv6 address.',
    'json' => 'El :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'El :attribute must be less than :value.',
        'file' => 'El :attribute must be less than :value kilobytes.',
        'string' => 'El :attribute must be less than :value caracteres.',
        'array' => 'El :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'El :attribute must be less than or equal :value.',
        'file' => 'El :attribute must be less than or equal :value kilobytes.',
        'string' => 'El :attribute must be less than or equal :value caracteres.',
        'array' => 'El :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'El :attribute may not be greater than :max.',
        'file' => 'El :attribute may not be greater than :max kilobytes.',
        'string' => 'El :attribute may not be greater than :max caracteres.',
        'array' => 'El :attribute may not have more than :max items.',
    ],
    'mimes' => 'El :attribute must be a file of type: :values.',
    'mimetypes' => 'El :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'El :attribute debe tener :min.',
        'file' => 'El :attribute debe tener :min kilobytes.',
        'string' => 'El :attribute debe tener :min caracteres.',
        'array' => 'El :attribute must have at least :min items.',
    ],
    'not_in' => 'El selected :attribute is invalid.',
    'not_regex' => 'El :attribute format is invalid.',
    'numeric' => 'El :attribute must be a number.',
    'present' => 'El :attribute field must be present.',
    'regex' => 'El :attribute format is invalid.',
    'required' => 'El :attribute field is required.',
    'required_if' => 'El :attribute field is required when :oElr is :value.',
    'required_unless' => 'El :attribute field is required unless :oElr is in :values.',
    'required_with' => 'El :attribute field is required when :values is present.',
    'required_with_all' => 'El :attribute field is required when :values are present.',
    'required_without' => 'El :attribute field is required when :values is not present.',
    'required_without_all' => 'El :attribute field is required when none of :values are present.',
    'same' => 'El :attribute and :oElr must match.',
    'size' => [
        'numeric' => 'El :attribute must be :size.',
        'file' => 'El :attribute must be :size kilobytes.',
        'string' => 'El :attribute must be :size caracteres.',
        'array' => 'El :attribute must contain :size items.',
    ],
    'starts_with' => 'El :attribute must start with one of El following: :values',
    'string' => 'El :attribute must be a string.',
    'timezone' => 'El :attribute must be a valid zone.',
    'unique' => 'El :attribute ya existe.',
    'uploaded' => 'El :attribute failed to upload.',
    'url' => 'El :attribute format is invalid.',
    'uuid' => 'El :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using El
    | convention "attribute.rule" to name El lines. This makes it quick to
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
    | El following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
