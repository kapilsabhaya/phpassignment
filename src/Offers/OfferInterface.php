<?php
namespace App\Offers;

// Interface for applying offers
interface OfferInterface
{
    /**
     * @param array<string, int> $items
     * @param array<string, array{name: string, price: float}> $catalog
     * @return float
     */
    public function apply(array $items, array $catalog): float;
}