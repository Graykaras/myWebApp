<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/30 0030
 * Time: 下午 11:29
 */
function quicksortx(&$seq)
{
    $stack = array($seq);
    $sort = array();
    while ($stack) {

        $arr = array_pop($stack);
        if(count($arr) <= 1) {
            if(count($arr) == 1) {
                $sort[] = &$arr[0];
            }
            continue;
        }

        $k = $arr[0];
        $x = array();
        $y = array();
        $_size = count($arr);
        for($i =1 ;$i < $_size; $i++) {
            if($arr[$i] <= $k) {
                $x[] = &$arr[$i];
            } else {
                $y[] = &$arr[$i];
            }
        }
        !empty($y) && array_push($stack, $y);
        array_push($stack, array($arr[0]));
        !empty($x) && array_push($stack, $x);
        var_dump($stack);
    }
    return $sort;
}

$array = [44, 100, 19, 22, 33, 1, 55, 66, 23, 79, 18, 20, 11, 9, 129, 399, 145, 2469, 58];
var_dump(quicksortx($array));