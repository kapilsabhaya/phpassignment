<?php
namespace App;

use App\Delivery\DeliveryChargeCalculatorInterface;
use App\Offers\OfferInterface;

class Basket
{
    /**
     * @var array<string, array{name: string, price: float}>
     */
    private array $catalog;

    /**
     * @var array<string, int>
     */
    private array $items = [];

    private DeliveryChargeCalculatorInterface $deliveryCalculator;

    /**
     * @var OfferInterface[]
     */
    private array $offers = [];

    /**
     * @param array<string, array{name: string, price: float}> $catalog
     * @param DeliveryChargeCalculatorInterface $deliveryCalculator
     * @param OfferInterface[] $offers
     */
    public function __construct(
        array $catalog, 
        DeliveryChargeCalculatorInterface $deliveryCalculator, 
        array $offers = []
    ) {
        $this->catalog = $catalog;
        $this->deliveryCalculator = $deliveryCalculator;
        $this->offers = $offers;
    }

    public function add(string $productCode): void
    {
        if (isset($this->catalog[$productCode])) {
            if (isset($this->items[$productCode])) {
                $this->items[$productCode]++;
            } else {
                $this->items[$productCode] = 1;
            }
        } else {
            throw new \Exception("Product code not found.");
        }
    }

    public function total(): string
    {
        $totalPrice = 0;

        // Calculate the total price of all items
        foreach ($this->items as $productCode => $quantity) {
            $totalPrice += $this->catalog[$productCode]['price'] * $quantity;
        }

        // Apply offers
        foreach ($this->offers as $offer) {
            $totalPrice -= $offer->apply($this->items, $this->catalog);
        }

        // Add delivery charge
        $totalPrice += $this->deliveryCalculator->calculate($totalPrice);

        return number_format($totalPrice, 2);
    }
}