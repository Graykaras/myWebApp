<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24 0024
 * Time: 上午 9:27
 */
//给一个数字和字母混杂的字符串，使数字和字母对应
function number_alphabet($str)
{
    $number = preg_split('/[a-z]+/', $str, -1, PREG_SPLIT_NO_EMPTY);
    $alphabet = preg_split('/\d+/', $str, -1, PREG_SPLIT_NO_EMPTY);
    $n = count($number);
    for ($i = 0; $i < $n; $i++) {
        echo $number[$i] . ':' . $alphabet[$i] . ' ';
    }
}
$str = '1a3bb44a2ac';
number_alphabet($str);