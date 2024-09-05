<?php
namespace App\Delivery;

use App\Delivery\DeliveryChargeCalculatorInterface;

class DeliveryChargeCalculator implements DeliveryChargeCalculatorInterface
{
    /**
     * @var array<array{order_total: float, delivery_price: float}>
     */
    private array $deliveryCharges;

    /**
     * @param array<array{order_total: float, delivery_price: float}> $deliveryCharges
     */
    public function __construct(array $deliveryCharges)
    {
        $this->deliveryCharges = $deliveryCharges;
    }

    /**
     * @param float $total
     * @return float
     */
    public function calculate(float $total): float
    {
        for ($find = 0; $find < count($this->deliveryCharges); $find++) {
            if ($this->deliveryCharges[$find]['order_total'] > $total) {
                break;
            }
        }

        return $this->deliveryCharges[$find == 0 ? $find : $find - 1]['delivery_price'];
    }
}
?>