<?php

interface CheckoutInterface
{
    /**
     * Adds an item to the basket
     *
     * @param string $productCode
     *
     * @return bool|array|string
     */
    public function add(string $productCode);

    /**
     * Returns the total cost of the basket
     *
     * @return float
     */
    public function total()
    : float;
}