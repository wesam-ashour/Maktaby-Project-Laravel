<?php

return [

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

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute must have between :min and :max items.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute must be between :min and :max.',
        'string' => 'The :attribute must be between :min and :max characters.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'array' => 'The :attribute must have more than :value items.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'numeric' => 'The :attribute must be greater than :value.',
        'string' => 'The :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute must have :value items or more.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'array' => 'The :attribute must have less than :value items.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute must not have more than :value items.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute must not have more than :max items.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute must not be greater than :max.',
        'string' => 'The :attribute must not be greater than :max characters.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute must have at least :min items.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'numeric' => 'The :attribute must be at least :min.',
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'array' => 'The :attribute must contain :size items.',
        'file' => 'The :attribute must be :size kilobytes.',
        'numeric' => 'The :attribute must be :size.',
        'string' => 'The :attribute must be :size characters.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

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
        'sections_name' => [
            'required' => 'يجب ادخال الاسم',
            'max' => 'يجب ألا يزيد الاسم عن 255 حرفًا',
        ],
        'price' => [
            'required' => 'يجب ادخال السعر',
            'min' => 'يجب ادخال قيمة اكبر من 10',
            'max' => 'يجب ادخال قيمة اقل من 5000',
            'integer' => 'يجب أن يكون السعر عددًا صحيحًا',
        ],
        'address' => [
            'required' => 'يجب ادخال العنوان',
            'max' => 'يجب ألا يزيد العنوان عن 255 حرفًا',
        ],
        'type' => [
            'required' => 'يجب ادخال النوع',
        ],
        'description' => [
            'required' => 'يجب ادخال الوصف',
            'max' => 'يجب ألا يزيد العنوان عن 255 حرفًا',
        ],
        'service_name' => [
            'required' => 'يجب ادخال الخدمة',
            'max' => 'يجب ألا يزيد وصف الخدمة عن 20 حرفًا',
        ],
        'sections_logo' => [
            'required' => 'يجب ادخال الصورة',
            'mimes' => 'يجب أن تكون الصورة عبارة عن ملف من النوع : jpg, png, jpeg, gif, svg ',
            'max' => ' يجب ألا يزيد حجم الملف عن : 300 MB',
            'image' => 'يجب أن يكون مسار صورة الملف الشخصي صورة',
        ],
        'status' => [
            'required' => 'يجب ادخال الحالة',
        ],
        'Status' => [
            'required' => 'يجب ادخال الحالة',
        ],
        'roles' => [
            'required' => 'يجب ادخال صلاحية المستخدم',
        ],
        'date' => [
            'date_format' => 'التاريخ لا يتطابق مع الشكل : YYYY-MM-DD',
        ],
        'name' => [
            'required' => 'يجب ادخال إسم مالك الشركة كاملاًً',
        ],
        'company_name' => [
            'required' => 'يجب ادخال إسم الشركة كاملاًً',
        ],
        'phone' => [
            'required' => 'يجب ادخال رقم الهاتف',
            'digits' => ' يجب أن يتكون رقم الهاتف من 10 أرقام',
            'numeric' => 'يجب أن يكون رقم الهاتف عددًا صحيحًا',
        ],
        'email' => [
            'required' => 'يجب ادخال البريد الإلكتروني',
            'max' => 'يجب ألا يزيد البريد الإلكتروني عن 255 حرفًا',
            'unique' => 'البريد الالكتروني مسجل مسبقا',
            'exists' => 'البريد الإلكتروني المدخل غير موجود',

        ],
        'website' => [
            'required' => 'يجب ادخال الموقع الإلكتروني',
            'max' => 'يجب ألا يزيد العنوان عن 255 حرفًا',
            'url' => 'يجب أن يكون موقع الويب عنوان URL صالحًا مثل https://www.google.com',
        ],
        'city' => [
            'required' => 'يجب ادخال المدينة',
            'max' => 'يجب ألا يزيد العنوان عن 15 حرفًا',
        ],
        'profile_photo_path' => [
            'required' => 'يجب ادخال  شعار الشركة',
            'mimes' => 'يجب أن تكون الصورة عبارة عن ملف من النوع : jpg, png, jpeg, gif, svg ',
            'max' => ' يجب ألا يزيد حجم الملف عن : 300 MB',
            'image' => 'يجب أن يكون مسار صورة الملف الشخصي صورة',
        ],
        'password' => [
            'required' => 'يجب ادخال كلمة المرور',
            'min' => 'يجب ألا يقل كلمة المرور عن 8 حرفًا',
            'max' => 'يجب ألا يزيد كلمة المرور عن 26 حرفًا',
        ],
        'places_name' => [
            'required' => 'يجب ادخال الاسم',
            'max' => 'يجب ألا يزيد الاسم عن 255 حرفًا',
        ],

        'places_logo' => [
            'required' => 'يجب ادخال  شعار الشركة',
            'mimes' => 'يجب أن تكون الصورة عبارة عن ملف من النوع : jpg, png, jpeg, gif, svg ',
            'max' => ' يجب ألا يزيد حجم الملف عن : 300 MB',
            'image' => 'يجب أن يكون مسار صورة الملف الشخصي صورة',
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
