<?php

class ProductHelpers
{
    public static function getProducts()
    : array
    {
        return [
            ['product_code' => 'P001', 'name' => 'Photography', 'price' => 200],
            ['product_code' => 'P002', 'name' => 'Floorplan', 'price' => 100],
            ['product_code' => 'P003', 'name' => 'Gas Certificate', 'price' => 83.50],
            ['product_code' => 'P004', 'name' => 'EICR Certificate', 'price' => 51.00],
        ];
    }

    public static function getProductCodes()
    : array
    {
        foreach (self::getProducts() as $product) {
            $productCodes[] = $product['product_code'];
        }
        return $productCodes ?? [];
    }
}