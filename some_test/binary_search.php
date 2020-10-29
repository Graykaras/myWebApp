<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24 0024
 * Time: 上午 9:01
 */

function binary_search($array, $value)
{
    $left = 0;
    $right = count($array)-1;
    while ($left <= $right) {
        $mid = intval(($left + $right) / 2);
        if ($value > $array[$mid]) {
            $left = $mid + 1;
        } elseif ($value < $array[$mid]) {
            $right = $mid - 1;
        } else {
            return $mid;
        }
    }

    return -1;
}
$array = [1,3,4,6,7,8,9,11,15,18,19,30,44,56,78,79,91];

$result = binary_search($array,19);
var_dump($result);