<?php

class Dice {

    private $results;
    public static function roll($sides, $damageDiceBonus = 0) {

        $results = 0;

        $results = rand(1, $sides) + $damageDiceBonus;
        echo "Rolou d" . $sides . ": " . $results . "\n";
        return $results;

    }

    public static function rollMultiple($sides, $count) {

        $results = 0;
        for ($i = 0; $i < $count; $i++) {
            $results += self::roll($sides);
        }

        echo "Total de " . $count . "d" . $sides . ": " . $results . "\n";
        return $results;

    } 

}