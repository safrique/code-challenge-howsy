<?php

class Checkout implements CheckoutInterface
{
    private array $basket = [];
    private bool $hasSpecialOffers;

    public function __construct(bool $hasSpecialOffers = false) { $this->hasSpecialOffers = $hasSpecialOffers; }

    /**
     * Adds an item to the basket
     *
     * @param string $productCode
     *
     * @return bool|array|string
     */
    public function add(string $productCode)
    {
        try {
            if (!in_array($productCode, ProductHelpers::getProductCodes())) {
                throw new Exception('Invalid product code', 400);
            }

            if ($this->getProduct($productCode, $this->basket)) {
                throw new Exception('Product already in basket', 400);
            }

            $product = $this->getProduct($productCode, ProductHelpers::getProducts());
            $product['price'] = ($this->hasSpecialOffers ? 0.9 : 1) * $product['price'];
            $this->basket[] = $product;
            return $product;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Returns a product from a list or products based on the product code
     *
     * @param string $productCode
     * @param array  $products
     *
     * @return array|false
     */
    private function getProduct(string $productCode, array $products)
    {
        foreach ($products as $product) {
            if ($productCode == $product['product_code']) {
                return $product;
            }
        }

        return false;
    }

    /**
     * Returns the total cost of the basket
     *
     * @return float
     */
    public function total()
    : float
    {
        $total = 0;

        foreach ($this->basket as $item) {
            $total += $item['price'];
        }

        return $total;
    }
}