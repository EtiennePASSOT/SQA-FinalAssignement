<?php

namespace App;

final class MathUtils
{
    static function average($array)
    {
        return array_sum($array) / count($array);
    }

    static function standardDeviation($array)
    {
        $variance = 0.0; 
        $average = self::average($array);
        foreach ($array as $i) { 
            $variance += pow(($i - $average), 2);
        }
        return (float) sqrt($variance / count($array));
    }

    static function max($array) {
        return max($array);
    }

    static function min($array) {
        return min($array);
    }
}