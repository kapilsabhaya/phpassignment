<?php

namespace App\Tests;

use App\BaseTest;
use App\Offers\BuyOneGetSecondHalfOffer;

class BuyOneGetSecondHalfOfferTest extends BaseTest
{
    private BuyOneGetSecondHalfOffer $offer;

    protected function setUp(): void
    {
        parent::setUp(); // Call the parent setUp to initialize common variables
        $this->offer = new BuyOneGetSecondHalfOffer(['R01']); // Initialize the offer property
    }

    public function testApplyOffer(): void
    {
        $catalog = [
            'R01' => ['name' => 'Red Widget', 'price' => 32.95],
        ];
        $items = ['R01' => 2];

        $this->assertEquals(16.475, $this->offer->apply($items, $catalog));
    }

    public function testApplyOfferNoDiscount(): void
    {
        $catalog = [
            'R01' => ['name' => 'Red Widget', 'price' => 32.95],
        ];
        $items = ['R01' => 1];

        $this->assertEquals(0, $this->offer->apply($items, $catalog));
    }
}
?>