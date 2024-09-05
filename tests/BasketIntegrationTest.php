<?php
namespace App;

use App\Basket;

class BasketIntegrationTest extends BaseTest
{
    protected function setUp(): void
    {
        parent::setUp(); // Call the parent setUp to initialize common variables
    }

    public function testBasketIntegration(): void
    {
        $basket = new Basket($this->catalog, $this->deliveryCalculator, $this->offers);

        // Adding products to the basket
        $basket->add('B01');
        $basket->add('B01');
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');

        $expectedTotal = '98.28'; // Rounded value for comparison

        $this->assertEquals($expectedTotal, $basket->total());
    }
}