<?php

$obj = new SplQueue();

$obj -> enqueue('a');
$obj -> enqueue('b');
$obj -> enqueue('c');

echo 'bottom:'.$obj -> bottom().PHP_EOL;
echo 'top:'.$obj -> top();
echo '<br/>';

//队列里的offset=0是指向bottom位置
$obj -> offsetSet(0,'A');
echo 'bottom:'.$obj -> bottom();
echo '<br/>';

//队列里的rewind使得指针指向bottom所在位置的节点
$obj -> rewind();
echo 'current:'.$obj->current();
echo '<br/>';

while ($obj ->valid()) {
    echo $obj ->key().'=>'.$obj->current().PHP_EOL;
    $obj->next();//
}
echo '<br/>';

//dequeue操作从队列中提取bottom位置的节点，并返回，同时从队列里面删除该元素
echo 'dequeue obj:'.$obj->dequeue();
echo '<br/>';
echo 'bottom:'.$obj -> bottom().PHP_EOL;