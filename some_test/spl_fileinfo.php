<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/30 0030
 * Time: 下午 5:59
 */
$file = new SplFileInfo('joseph.php');
var_dump($file->getExtension());
die();

print_r(array(
    'getATime' => $file->getATime(), //最后访问时间
    'getBasename' => $file->getBasename(), //获取无路径的basename
    'getCTime' => $file->getCTime(), //获取inode修改时间
    'getExtension' => $file->getExtension(), //文件扩展名
    'getFilename' => $file->getFilename(), //获取文件名
    'getGroup' => $file->getGroup(), //获取文件组
    'getLinkTarget' => $file->getLinkTarget(), //获取文件链接目标文件
    'getMTime' => $file->getMTime(), //获取最后修改时间
    'getOwner' => $file->getOwner(), //文件拥有者
    'getPath' => $file->getPath(), //不带文件名的文件路径
    'getPathInfo' => $file->getPathInfo(), //上级路径的SplFileInfo对象
    'getPathname' => $file->getPathname(), //全路径
    'getPerms' => $file->getPerms(), //文件权限
    'getRealPath' => $file->getRealPath(), //文件绝对路径
    'getSize' => $file->getSize(),//文件大小，单位字节
    'getType' => $file->getType(),//文件类型 file  dir  link
    'isDir' => $file->isDir(), //是否是目录
    'isFile' => $file->isFile(), //是否是文件
    'isLink' => $file->isLink(), //是否是快捷链接
    'isExecutable' => $file->isExecutable(), //是否可执行
    'isReadable' => $file->isReadable(), //是否可读
    'isWritable' => $file->isWritable(), //是否可写
));