<?php
declare(strict_types=1);

namespace Otus\Price;


/**
 * Created by PhpStorm at 13.11.2023
 *
 * @ProductFactory
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @package Otus\Price
 */
class ProductFactory
{
      static public function createProduct(string $title, float $price, int $stock, string $category): Product
      {
           return new Product($title, $price, $stock, $category);
      }
}