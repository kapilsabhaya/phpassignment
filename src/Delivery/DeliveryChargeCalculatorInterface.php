<?php
namespace App\Delivery;
// Interface for calculating delivery charges
interface DeliveryChargeCalculatorInterface
{
    /**
     * @param float $total
     * @return float
     */
    public function calculate(float $total):float;
}
?>