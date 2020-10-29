<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/30 0030
 * Time: 下午 5:58
 */
class AAA {
    public $i;
    public function __construct($i) {
        $this->i = $i;
    }
}

$a1 = new AAA(1);
$a2 = new AAA(2);
$a3 = new AAA(3);
$a4 = new AAA(4);

$container = new SplObjectStorage();

//SplObjectStorage::attach 添加对象到Storage中
$container->attach($a1);
$container->attach($a2);
$container->attach($a3);

//SplObjectStorage::detach 将对象从Storage中移除
$container->detach($a2);

//SplObjectStorage::contains用于检查对象是否存在Storage中
var_dump($container->contains($a1)); //true
var_dump($container->contains($a4)); //false

//遍历
$container->rewind();
while($container->valid()) {
    var_dump($container->current());
    $container->next();
}