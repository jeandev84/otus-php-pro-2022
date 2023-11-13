<?php
/*
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



// Бёрем только те товары, которые есть в наличии
$productsInStock = [];

foreach ($products as $product) {
    if ($product['stock'] > 0) {
        $productsInStock[] = $product;
    }
}


// Группируем их по категориям
$productsInStockByCategory = [];

foreach ($productsInStock as $product) {
    $category = $product['category'];
    if (! array_key_exists($category, $productsInStockByCategory)) {
        $productsInStockByCategory[$category] = [];
    }
    $productsInStockByCategory[$category][] = $product;
}

// Для каждой категории выводим табличку с товарами

foreach ($productsInStockByCategory as $category => $products) {
    echo $category;
    echo PHP_EOL;
    echo PHP_EOL;
    foreach ($products as $product) {
        echo "{$product['title']} | {$product['price']} ₽";
        echo PHP_EOL;
    }
    echo PHP_EOL;
}
*/