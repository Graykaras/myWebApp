<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24 0024
 * Time: 上午 9:22
 */
//实现shuffle()函数
function custom_shuffle(array $arr) {
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        $rand_pos = mt_rand(0, $n-1);
        if ($rand_pos != $i) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$rand_pos];
            $arr[$rand_pos] = $temp;
        }
    }
    return $arr;
}
var_dump(custom_shuffle([1,2,3,4]));