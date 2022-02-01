<?php

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

return [
    'accepted'             => '必須接受。',
    'accepted_if'          => 'This field must be accepted when :other is :value.',
    'active_url'           => '並非一個有效的網址。',
    'after'                => '必須要晚於 :date。',
    'after_or_equal'       => '必須要等於 :date 或更晚。',
    'alpha'                => '只能以字母組成。',
    'alpha_dash'           => '只能以字母、數字、連接線(-)及底線(_)組成。',
    'alpha_num'            => '只能以字母及數字組成。',
    'array'                => '必須為陣列。',
    'before'               => '必須要早於 :date。',
    'before_or_equal'      => '必須要等於 :date 或更早。',
    'between'              => [
        'array'   => '必須有 :min 至 :max 個項目。',
        'file'    => '必須介乎 :min 至 :max KB 之間。',
        'numeric' => '必須介乎 :min 至 :max 之間。',
        'string'  => '必須介乎 :min 至 :max 個字符之間。',
    ],
    'boolean'              => '必須是布爾值。',
    'confirmed'            => '確認欄位的輸入並不相符。',
    'current_password'     => 'The password is incorrect.',
    'date'                 => '並非一個有效的日期。',
    'date_equals'          => '必須等於 :date。',
    'date_format'          => '與 :format 格式不相符。',
    'declined'             => 'This value must be declined.',
    'declined_if'          => 'This value must be declined when :other is :value.',
    'different'            => '必須與 :other 不同。',
    'digits'               => '必須是 :digits 位數字。',
    'digits_between'       => '必須介乎 :min 至 :max 位數字。',
    'dimensions'           => '圖片尺寸不正確。',
    'distinct'             => '已經存在。',
    'email'                => '必須是有效的電郵地址。',
    'ends_with'            => '結尾必須包含下列之一：:values。',
    'enum'                 => 'The selected value is invalid.',
    'exists'               => '不存在。',
    'file'                 => '必須是文件。',
    'filled'               => '不能留空。',
    'gt'                   => [
        'array'   => '必須多於 :value 個項目。',
        'file'    => '必須大於 :value KB。',
        'numeric' => '必須大於 :value。',
        'string'  => '必須多於 :value 個字符。',
    ],
    'gte'                  => [
        'array'   => '必須多於或等於 :value 個項目。',
        'file'    => '必須大於或等於 :value KB。',
        'numeric' => '必須大於或等於 :value。',
        'string'  => '必須多於或等於 :value 個字符。',
    ],
    'image'                => '必須是一張圖片。',
    'in'                   => '選項無效。',
    'in_array'             => '沒有在 :other 中。',
    'integer'              => '必須是一個整數。',
    'ip'                   => '必須是一個有效的 IP 地址。',
    'ipv4'                 => '必須是一個有效的 IPv4 地址。',
    'ipv6'                 => '必須是一個有效的 IPv6 地址。',
    'json'                 => '必須是正確的 JSON 格式。',
    'lt'                   => [
        'array'   => '必須少於 :value 個項目。',
        'file'    => '必須小於 :value KB。',
        'numeric' => '必須小於 :value。',
        'string'  => '必須少於 :value 個字符。',
    ],
    'lte'                  => [
        'array'   => '必須少於或等於 :value 個項目。',
        'file'    => '必須小於或等於 :value KB。',
        'numeric' => '必須小於或等於 :value。',
        'string'  => '必須少於或等於 :value 個字符。',
    ],
    'mac_address'          => 'The value must be a valid MAC address.',
    'max'                  => [
        'array'   => '不能多於 :max 個項目。',
        'file'    => '不能大於 :max KB。',
        'numeric' => '不能大於 :max。',
        'string'  => '不能多於 :max 個字符。',
    ],
    'mimes'                => '必須為 :values 的檔案。',
    'mimetypes'            => '必須為 :values 的檔案。',
    'min'                  => [
        'array'   => '不能小於 :min 個項目。',
        'file'    => '不能小於 :min KB。',
        'numeric' => '不能小於 :min。',
        'string'  => '不能小於 :min 個字符。',
    ],
    'multiple_of'          => '必須為 :value 中的多個。',
    'not_in'               => '選項無效。',
    'not_regex'            => '格式錯誤。',
    'numeric'              => '必須為一個數字。',
    'password'             => '密碼錯誤。',
    'present'              => '必須存在。',
    'prohibited'           => '禁止此字段。',
    'prohibited_if'        => ':other 为 :value 时禁止此字段。',
    'prohibited_unless'    => '除非 :other 在 :values 中，否则禁止此字段。',
    'prohibits'            => 'This field prohibits :other from being present.',
    'regex'                => '格式錯誤。',
    'required'             => '不能留空。',
    'required_if'          => '當 :other 是 :value 時 不能留空。',
    'required_unless'      => '當 :other 不是 :values 時 不能留空。',
    'required_with'        => '當 :values 出現時 不能留空。',
    'required_with_all'    => '當 :values 出現時 不能留空。',
    'required_without'     => '當 :values 留空時 field 不能留空。',
    'required_without_all' => '當 :values 都不出現時 不能留空。',
    'same'                 => '必須與 :other 相同。',
    'size'                 => [
        'array'   => '必須是 :size 個單元。',
        'file'    => '大小必須是 :size KB。',
        'numeric' => '大小必須是 :size。',
        'string'  => '必須是 :size 個字符。',
    ],
    'starts_with'          => '開頭必須包含下列之一：:values。',
    'string'               => '必須是一個字符串。',
    'timezone'             => '必須是一個正確的時區值。',
    'unique'               => '已經存在。',
    'uploaded'             => '上傳失敗。',
    'url'                  => '的格式錯誤。',
    'uuid'                 => '必須是有效的 UUID。',
    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];
