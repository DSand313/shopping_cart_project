<?php

class ShoppingCart
{
    private static $flower_prices = [
        'RF1' => 32.95,
        'GF1' => 24.95,
        'BF1' => 7.95
    ];

    private static $valid_codes = ['RF1', 'GF1', 'BF1'];

    private $items = [];

    public function add_item($flowers)
    {
        foreach ($flowers as $flower_code => $quantity) {
            if (in_array($flower_code , self::$valid_codes)) {
                if (isset($this->items[$flower_code])) {
                    $this->items[$flower_code] += $quantity;
                } else {
                    $this->items[$flower_code] = $quantity;
                }
            } else {
                echo 'nuh uh' . '<br>';
            }
        }
    }

    private function red_flower_deal()
    {
        if ($this->items['RF1'] % 2 === 0) {
            $total_cost = ($this->items['RF1'] / 2) * (1.5 * self::$flower_prices['RF1']);
        } else {
            $total_cost = (floor($this->items['RF1'] / 2) * (1.5 * self::$flower_prices['RF1'])) + self::$flower_prices['RF1'];
        }

        return $total_cost;
    }

    private function green_blue_flowers()
    {
        $new_array = [];
        $gb_array = ['GF1', 'BF1'];
        $price = 0;

        foreach ($gb_array as $flower_code) {
            if (isset($this->items[$flower_code])) {
                $new_array[$flower_code] = $this->items[$flower_code];
            }
        }

        foreach ($new_array as $flower_code => $quantity) {
            $price += $quantity * self::$flower_prices[$flower_code];
        }

        return $price;
    }

    private function flower_total()
    {
        $red_price = $this->red_flower_deal();
        $green_blue_price = $this->green_blue_flowers();

        return $red_price + $green_blue_price;
    }

    private function delivery_cost()
    {
        if($this->flower_total() < 50) {
            return 4.95;
        } elseif($this->flower_total() >= 50 && $this->flower_total() < 90 ) {
            return 2.95;
        } else {
            return 0;
        }
    }

    private function total_price()
    {
        $flower_price = $this->flower_total();
        $delivery_price = $this->delivery_cost();

        return $flower_price + $delivery_price;
    }

    public function view_cart()
    {
        $complete_price = $this -> total_price();

        $codes = [];

        foreach ($this->items as $flower_code => $quantity) {
            for($i = 0; $i < $quantity; $i++) {
                $codes[] = $flower_code;
            }
        }

        return implode(', ', $codes) . ": $" . round($complete_price, 2);
    }
}

$cart = new ShoppingCart();
$cart->add_item(['RF1' => 2, 'BF1' => 7]);
$result = $cart->view_cart();
echo $result;