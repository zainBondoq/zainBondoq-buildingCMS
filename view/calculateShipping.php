<?php

class Product{
    private $price;
    private $weight;

    public function __construct($price , $weight){
        $this->price = $price;
        $this->weight = $weight;
    }

    function getWeight(){
        return $this->weight;
    }
}

class Shipping {
    private $totalShipping = 0;
    private $products = [];
    private $pricePreKilogram;


    public function __construct($pricePreKilogram){
        $this->pricePreKilogram = $pricePreKilogram;
        
    }

    public function addProducts(Product $product){
        $this->products[] = $product;
    }

    public function calculateTotalShipping(){
        foreach($this->products as $product){
            $this->totalShipping += $product->getWeight() * $this->pricePreKilogram; ;
        }
    }

    function getTotalShippingPrice(){
        return $this->totalShipping;
    }

}

$product = new Product(5,1);
$product2 = new Product(6,2);
$product3 = new Product(4,4);

$pricePreKilogram = 5;

$shipping = new Shipping($pricePreKilogram);
$shipping->addProducts($product);
$shipping->addProducts($product2); 
$shipping->addProducts($product3); 
$shipping->calculateTotalShipping();
$totalShippingPrice = $shipping->getTotalShippingPrice();


var_dump($totalShippingPrice);


/*
function calculaeShipping($productWeigth , $pricePreKilogram , $hasFreeShipping){
    if(!$hasFreeShipping){
    return $productWeigth * $pricePreKilogram;
}
}

//$products = $_SESSION['products'];
$products[1]['weight']= 1;
$products[1]['price']= 6;
$products[1]['hasFreeShipping'] = true;

$products[2]['weight']= 2;
$products[2]['price']= 3;
$products[2]['hasFreeShipping'] = false;

$pricePreKilogram = 5;
$totalShippingPrice = 0;

foreach($products as $product){
    $totalShippingPrice = calculaeShipping($product['weight'] , $pricePreKilogram , $product['hasFreeShipping']);
}
echo $totalShippingPrice;
*/