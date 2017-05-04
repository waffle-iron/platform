<?php

return [

    'show_warnings' => false,   // Throw an Exception on warnings from dompdf
    'orientation' => 'portrait',
    'defines' => [
        
        "DOMPDF_FONT_DIR" => app_path('vendor/dompdf/dompdf/lib/fonts/'), //storage_path('fonts/'), // advised by dompdf (https://github.com/dompdf/dompdf/pull/782)

        "DOMPDF_FONT_CACHE" => storage_path('fonts/'),

        "DOMPDF_TEMP_DIR" => sys_get_temp_dir(),

        "DOMPDF_CHROOT" => realpath(base_path()),

        "DOMPDF_UNICODE_ENABLED" => true,

        "DOMPDF_ENABLE_FONTSUBSETTING" => false,

        "DOMPDF_PDF_BACKEND" => "CPDF",

        "DOMPDF_DEFAULT_MEDIA_TYPE" => "print",

        "DOMPDF_DEFAULT_PAPER_SIZE" => "a4",

        "DOMPDF_DEFAULT_FONT" => "dejavu sans",

        "DOMPDF_DPI" => 96,

        "DOMPDF_ENABLE_PHP" => false,

        "DOMPDF_ENABLE_JAVASCRIPT" => true,

        "DOMPDF_ENABLE_REMOTE" => true,

        "DOMPDF_FONT_HEIGHT_RATIO" => 1.1,

        "DOMPDF_ENABLE_CSS_FLOAT" => true,

        "DOMPDF_ENABLE_HTML5PARSER" => true,


    ],


];
