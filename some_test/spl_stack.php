<?php

$stack = new SplStack();
$stack->push(1);
$stack->push(2);
$stack->push(3);

echo 'bottom:'.$stack -> bottom().PHP_EOL;
echo "top:".$stack->top().PHP_EOL;
//堆栈的offset=0,是top所在位置（即栈的末尾）
$stack -> offsetSet(0, 10);
echo "top:".$stack->top().'<br/>';

//堆栈的rewind和双向链表的rewind相反，堆栈的rewind使得当前指针指向top所在位置，而双向链表调用之后指向bottom所在位置
$stack -> rewind();
echo 'current:'.$stack->current().'<br/>';

$stack ->next();//堆栈的next操作使指针指向靠近bottom位置的下一个节点，而双向链表是靠近top的下一个节点
echo 'current:'.$stack ->current().'<br/>';

//遍历堆栈
$stack -> rewind();
while ($stack->valid()) {
    echo $stack->key().'=>'.$stack->current().PHP_EOL;
    $stack->next();//不从链表中删除元素
}
echo '<br/>';

echo $stack->pop() .'--';
echo $stack->pop() .'--';
echo $stack->pop() .'--';