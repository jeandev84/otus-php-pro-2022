<?php
declare(strict_types=1);


require_once __DIR__.'/../vendor/autoload.php';


// Список товаров

$products = [
    [
        'title'    => 'Колбаса докторская',
        'category' => 'Колбасные изделия',
        'stock'    => 14,
        'price'    => 120.75
    ],
    [
        'title'    => 'Кагор №32',
        'category' => 'Ликёро-водочные изделия',
        'stock'    => 100,
        'price'    => 350.00
    ],
    [
        'title'    => 'Сосиски молочные',
        'category' => 'Колбасные изделия',
        'stock'    => 53,
        'price'    => 245.50
    ],
    [
        'title'    => 'Пиво Жугулёвское',
        'category' => 'Ликёро-водочные изделия',
        'stock'    => 0,
        'price'    => 75.20
    ],
    [
        'title'    => 'Пиво Бархатное',
        'category' => 'Ликёро-водочные изделия',
        'stock'    => 2,
        'price'    => 90.00
    ],
    [
        'title'    => 'Колбаса чайная',
        'category' => 'Колбасные изделия',
        'stock'    => 0,
        'price'    => 130.05
    ],
    [
        'title'    => 'Водка Столичная',
        'category' => 'Ликёро-водочные изделия',
        'stock'    => 1,
        'price'    => 400.00
    ]
];


$mapper     = new \Otus\Price\ProductMapper();
$controller = new \Otus\Price\ProductController($mapper);
$controller->getPriceList($products);