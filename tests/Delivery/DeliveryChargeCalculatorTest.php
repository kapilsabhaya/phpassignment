<?php
namespace App\Tests;

use App\BaseTest;
use App\Delivery\DeliveryChargeCalculator;

class DeliveryChargeCalculatorTest extends BaseTest
{
    private DeliveryChargeCalculator $calculator;

    protected function setUp(): void
    {
        parent::setUp(); // Call the parent setUp to initialize common variables

        $this->calculator = new DeliveryChargeCalculator($this->deliveryCharges);
    }

    public function testCalculateDeliveryCharge(): void
    {
        $this->assertEquals(4.95, $this->calculator->calculate(30));
        $this->assertEquals(2.95, $this->calculator->calculate(60));
        $this->assertEquals(0, $this->calculator->calculate(100));
    }
}
?>