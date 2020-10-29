<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24 0024
 * Time: 上午 9:23
 */
//实现数组reverse
function reverse($arr)
{
    $n = count($arr);

    $left = 0;
    $right = $n - 1;

    while ($left < $right) {
        $temp = $arr[$left];
        $arr[$left++] = $arr[$right];
        $arr[$right--] = $temp;
    }

    return $arr;
}

var_dump(reverse([1,2,3,4,5]));