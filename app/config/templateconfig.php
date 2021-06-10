<?php

return [
    'template' => [
        'wrapper_start'     => TEMPLATE_PATH . 'wrapperstart.php',
        'navbar'            => TEMPLATE_PATH . 'navbar.php',
        'sidbar'            => TEMPLATE_PATH . 'sidbar.php',
        ':view'             => ':action_view',
        'wrapper_end'       => TEMPLATE_PATH . 'wrapperend.php',
        'footer'            => TEMPLATE_PATH . 'footer.php'
    ],
    'header_resources' => [
        'css' => [
            'bootstrap_min' => CSS . 'bootstrap.min.css',
            'font-awesome'  => CSS . 'font-awesome.min.css',
            'bootstrap_rtl' => CSS . 'bootstrap-rtl.css',
            'util'          => CSS . 'util.css',
            'main'          => CSS . 'main.css',
            'style'         => CSS . 'style.css',
            'style2'        => CSS . 'style2.css',
            'style3'        => CSS . 'style3.css',
            'shop-homepage' => CSS . 'shop-homepage.css',
            'Order'         => CSS . 'Order.css',
        ],
        'js' => [
            'Order_js'  => JS . 'Order.js'
        ]
    ],
    'footer_resources' => [
        'jquery_min'         => JS . 'jquery.min.js',
        'bootstrap_bundle'   => JS . 'bootstrap.bundle.min.js',
        'bootstrap_min'      => JS . 'bootstrap.min.js',
        'form'               => JS . 'form.js',
        'site_js'            => JS . 'site_js.min.js',
    ]
];