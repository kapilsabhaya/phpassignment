<?php

require 'vendor/autoload.php'; // Include Composer's autoloader

use App\Basket;
use App\Delivery\DeliveryChargeCalculator;
use App\Offers\BuyOneGetSecondHalfOffer;

// Product catalog
$catalog = [
    'R01' => ['name' => 'Red Widget', 'price' => 32.95],
    'G01' => ['name' => 'Green Widget', 'price' => 24.95],
    'B01' => ['name' => 'Blue Widget', 'price' => 7.95],
];

// Delivery charges
$deliveryCharges = [
    ['order_total' => 0, 'delivery_price' => 4.95],
    ['order_total' => 50, 'delivery_price' => 2.95],
    ['order_total' => 90, 'delivery_price' => 0],
];

// Instantiate delivery calculator
$deliveryCalculator = new DeliveryChargeCalculator($deliveryCharges);

// Instantiate offers
$buyOneGetSecondHalfOffer = new BuyOneGetSecondHalfOffer(['R01']);

// Create basket with offers
$basket = new Basket($catalog, $deliveryCalculator, [$buyOneGetSecondHalfOffer]);

// Example usage
$basket->add('B01');
$basket->add('G01');
echo "Total: $" . $basket->total(); // Expected: $37.85
echo '<br>';

// Another example
$basket = new Basket($catalog, $deliveryCalculator, [$buyOneGetSecondHalfOffer]);
$basket->add('R01');
$basket->add('R01');
echo "Total: $" . $basket->total(); // Expected: $54.37
echo '<br>';
// Add products to the basket
$basket = new Basket($catalog, $deliveryCalculator, [$buyOneGetSecondHalfOffer]);
$basket->add('R01');
$basket->add('G01');

// Print the total
echo "Total: $" . $basket->total(); // Expected: $60.85
echo '<br>';
// Add products to the basket
$basket = new Basket($catalog, $deliveryCalculator, [$buyOneGetSecondHalfOffer]);
$basket->add('B01');
$basket->add('B01');
$basket->add('R01');
$basket->add('R01');
$basket->add('R01');
// Print the total
echo "Total: $" . $basket->total(); // Expected: $98.27
?>