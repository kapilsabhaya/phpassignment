<?php
namespace App;

use App\Basket;

class BasketTest extends BaseTest
{
    protected function setUp(): void
    {
        parent::setUp(); // Call the parent setUp to initialize common variables
    }

    public function testAddProduct(): void
    {
        $basket = new Basket($this->catalog, $this->deliveryCalculator, $this->offers);
        $basket->add('R01');
        
        $this->assertEquals('37.90', $basket->total());
    }

    public function testTotalWithOffer(): void
    {
        $basket = new Basket($this->catalog, $this->deliveryCalculator, $this->offers);
        $basket->add('R01');
        $basket->add('R01');
        
        $this->assertEquals('54.38', $basket->total()); // 32.95 + 16.475 (half off) = 49.425 + 4.95 delivery
    }

    public function testTotalWithMultipleProducts(): void
    {
        $basket = new Basket($this->catalog, $this->deliveryCalculator, $this->offers);
        $basket->add('R01');
        $basket->add('G01');
        
        $this->assertEquals('60.85', $basket->total());
    }
}