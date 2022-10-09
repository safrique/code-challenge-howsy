<?php

use PHPUnit\Framework\TestCase;

final class CheckoutTest extends TestCase
{
    public function testCanBeCreatedFromValidHasSpecialOffer()
    : void
    {
        $this->assertInstanceOf(Checkout::class, new Checkout(true));
    }

    public function testCanAddValidProductToBasket()
    : void
    {
        $this->assertIsArray((new Checkout())->add('P001'));
    }

    public function testCannotAddInvalidProductToBasket()
    : void
    {
        $this->assertIsString((new Checkout())->add('invalid'));
    }

    public function testCanGetBasketTotal()
    : void
    {
        $checkout = new Checkout(true);
        $checkout->add('P001');
        $checkout->add('P003');
        $this->assertIsNumeric($checkout->total());
    }

    public function testCanGetBasketTotalCorrectValue()
    : void
    {
        $checkout = new Checkout();
        $checkout->add('P001');
        $checkout->add('P003');
        $this->assertEquals(283.5, $checkout->total());
    }
}