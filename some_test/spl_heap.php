<?php

class MySimpleHeap extends SplHeap
{
    //compare()方法用来比较两个元素的大小，绝对他们在堆中的位置
    public function  compare( $value1, $value2 ) {
        return ( $value1 - $value2 );
    }
}

$obj = new MySimpleHeap();
$obj->insert( 4 );
$obj->insert( 8 );
$obj->insert( 1 );
$obj->insert( 0 );

echo $obj->top();  //8
echo $obj->count(); //4
echo '<br/>';

foreach( $obj as $number ) {
    echo $number.PHP_EOL;
}

$obj = new SplMinHeap();
$obj->insert(4);
$obj->insert(8);

//提取
echo $obj->extract(). PHP_EOL;
echo $obj->extract();

$obj = new SplMaxHeap();
$obj->insert(4);
$obj->insert(8);

//提取
echo $obj->extract(). PHP_EOL;
echo $obj->extract();