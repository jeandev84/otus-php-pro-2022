<?php
declare(strict_types=1);

namespace Otus\Price;


/**
 * Created by PhpStorm at 13.11.2023
 *
 * @Product
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @package Otus\Price
 */
class Product
{

     private string $title;
     private float $price;
     private int $stock;
     private string $category;




    /**
     * @param string $title
     * @param float $price
     * @param int $stock
     * @param string $category
    */
    public function __construct(string $title, float $price, int $stock, string $category)
    {
        $this->title = $title;
        $this->price = $price;
        $this->stock = $stock;
        $this->category = $category;
    }



    public function getTitle(): string
    {
        return $this->title;
    }


    public function getPrice(): float
    {
        return $this->price;
    }


    public function getStock(): int
    {
        return $this->stock;
    }


    public function getCategory(): string
    {
        return $this->category;
    }
}