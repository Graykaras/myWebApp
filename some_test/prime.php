<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24 0024
 * Time: 上午 9:29
 */
//求n以内的质数

function get_prime($n)
{
    $prime = array(2);//2为质数

    for ($i = 3; $i <= $n; $i += 2) {//偶数不是质数
        $sqrt = intval(sqrt($i));//从质数i开始求平方根
        //用小于i的平方根$sqrt($sqrt的平方实际上>=$n)的所有质数去除i，都不能被整除说明i是质数
        for ($j = 3; $j <= $sqrt; $j += 2) {//i是奇数，当然不能被偶数整除，步长也可以加大。
            if ($i % $j == 0) {
                break;
            }
        }

        if ($j > $sqrt) {
            array_push($prime, $i);
        }
    }

    return $prime;
}

print_r(get_prime(1000));