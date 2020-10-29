<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24 0024
 * Time: 上午 9:14
 */

//两个有序数组是否有相同的元素

function find_common($arr1,$arr2)
{
    $size1 = count($arr1);
    $size2 = count($arr2);
    $i = $j = 0;
    $re = [];
    while(true)
    {//移动值较小的
        if($arr1[$i] > $arr2[$j])
            $j++;
        elseif($arr1[$i] < $arr2[$j])
            $i++;
        else
        {
            array_push($re,$arr1[$i]);
            $j++;
        }

        if($i == $size1 || $j == $size2)
            break;
    }

    return $re;
}
$arr1 = [1,3,4,6,7,8,9,11,15,18,19,30,44,56,78,79,91];
$arr2 = [2,5,6,12,15,21,22,30,33,34,36,44,56,78,79,91];

$result = find_common($arr1,$arr2);
var_dump($result);
