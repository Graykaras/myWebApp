<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24 0024
 * Time: 上午 9:50
 */

function get_min_array($arr, $k)
{
    $n = count($arr);

    $min_array = array();

    for ($i = 0; $i < $n; $i++) {
        if ($i < $k) {
            $min_array[$i] = $arr[$i];
        } else {
            if ($i == $k) {
                $max = max($min_array);
                $max_pos = array_search($max,$min_array);
            }

            if ($arr[$i] < $max) {
                $min_array[$max_pos] = $arr[$i];

                $max = max($min_array);
                $max_pos = array_search($max,$min_array);
            }
        }
    }

    return $min_array;
}

$array = [1, 100, 20, 22, 33, 44, 55, 66, 23, 79, 18, 20, 11, 9, 129, 399, 145, 2469, 58];

$min_array = get_min_array($array, 10);

print_r($min_array);