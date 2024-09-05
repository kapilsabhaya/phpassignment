<?php
namespace App\Offers;

use App\Offers\OfferInterface;

class BuyOneGetSecondHalfOffer implements OfferInterface
{
    /**
     * @var array<string>
     */
    private array $applicableProducts;

    /**
     * @param array<string> $applicableProducts
     */
    public function __construct(array $applicableProducts)
    {
        $this->applicableProducts = $applicableProducts;
    }

    /**
     * @param array<string, int> $items
     * @param array<string, array{name: string, price: float}> $catalog
     * @return float
     */
    public function apply(array $items, array $catalog): float
    {
        $totalDiscount = 0.0;

        foreach ($this->applicableProducts as $productCode) {
            if (isset($items[$productCode]) && $items[$productCode] > 1) {
                $pairs = intdiv($items[$productCode], 2);
                $totalDiscount += ($catalog[$productCode]['price'] / 2) * $pairs;
            }
        }

        return $totalDiscount;
    }
}