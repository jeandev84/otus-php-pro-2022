<?php
declare(strict_types=1);

namespace Otus\Price;


/**
 * Created by PhpStorm at 13.11.2023
 *
 * @App
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @package Otus\Price
 */
class ProductController
{

      private ProductMapper $productMapper;

      public function __construct(ProductMapper $productMapper)
      {
          $this->productMapper = $productMapper;
      }

      public function getPriceList(array $products)
      {
          $products = $this->productMapper->mapArrayToProductList($products);

          dd($products);
      }
}