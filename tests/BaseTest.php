<?php
namespace App;

use PHPUnit\Framework\TestCase;
use App\Delivery\DeliveryChargeCalculator;
use App\Offers\BuyOneGetSecondHalfOffer;
use App\Delivery\DeliveryChargeCalculatorInterface;
use App\Offers\OfferInterface;

abstract class BaseTest extends TestCase
{
    /**
     * @var array<string, array{name: string, price: float}>
     */
    protected array $catalog;

    /**
     * @var array<array{order_total: float, delivery_price: float}>
     */
    protected array $deliveryCharges;

    /**
     * @var DeliveryChargeCalculatorInterface
     */
    protected DeliveryChargeCalculatorInterface $deliveryCalculator;

    /**
     * @var OfferInterface[]
     */
    protected array $offers;

    protected function setUp(): void
    {
        $this->catalog = [
            'R01' => ['name' => 'Red Widget', 'price' => 32.95],
            'G01' => ['name' => 'Green Widget', 'price' => 24.95],
            'B01' => ['name' => 'Blue Widget', 'price' => 7.95],
        ];

        $this->deliveryCharges = [
            ['order_total' => 0, 'delivery_price' => 4.95],
            ['order_total' => 50, 'delivery_price' => 2.95],
            ['order_total' => 90, 'delivery_price' => 0],
        ];

        $this->deliveryCalculator = new DeliveryChargeCalculator($this->deliveryCharges);
        $this->offers = [new BuyOneGetSecondHalfOffer(['R01'])];
    }
}