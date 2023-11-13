<?php
declare(strict_types=1);

namespace Otus\Price;


/**
 * Created by PhpStorm at 13.11.2023
 *
 * @ProductMapper
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @package Otus\Price
 */
class ProductMapper
{
      public function mapArrayToProductList(array $products): array
      {
           $result = [];

           foreach ($products as $item) {
               $product = ProductFactory::createProduct(
                   $item['title'],
                   $item['price'],
                   $item['stock'],
                   $item['category'],
               );
               $result[] = $product;
           }

           return $result;
      }
}