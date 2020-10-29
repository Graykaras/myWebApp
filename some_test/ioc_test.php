<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/23 0023
 * Time: 下午 3:36
 */

//超能力模块接口
interface SuperPowerModule
{
    public function superpower(array $describe);
}

//超级英雄类
class Superhero
{
    //超级英雄的超能力
    protected $module;

    //依赖注入超能力模块获得超能力
    public function __construct(SuperPowerModule $module)
    {
        $this->module = $module;
    }
}

//超能力类:激光 遵循超能力接口
class Beam implements SuperPowerModule
{
    public $level;
    public $name;
    public $range;
    public function superpower(array $describe)
    {
        // TODO: Implement superpower() method.
        $this->level = $describe['level'] ?: 0;
        $this->name = $describe['name'] ?: 0;
        $this->range = $describe['range'] ?: 0;
    }
}

//超能力类:飞行 遵循超能力接口
class Fly implements SuperPowerModule
{
    public $level;
    public $name;
    public $speed;
    public function superpower(array $describe)
    {
        // TODO: Implement superpower() method.
        $this->level = $describe['level'] ?: 0;
        $this->name = $describe['name'] ?: 0;
        $this->speed = $describe['speed'] ?: 0;
    }
}

//超能力容器
class SuperPowerContainer
{
    //注册提供的超能力
    protected $binds;

    //向容器提供生产的产品(超级英雄，超能力模块...)和生产脚本
    public function bind($product, $script)
    {
        $this->binds[$product] = $script;
    }

    //启动生产
    public function make($product, $parameter = [])
    {
        //
        array_unshift($parameter,$this);
        return call_user_func_array($this->binds[$product], $parameter);
    }

}

//----------------------------------------------------------------------------

//创建一个容器
$container = new SuperPowerContainer;

//在容器中添加超人的生产脚本
$container->bind('superman', function ($container, $module){
    return new Superhero($container->make($module));
});

//在容器中添加钢铁侠生产脚本
$container->bind('ironman',function ($container, $module){
    return new Superhero($container->make($module));
});

//在容器中添加激光模块生产脚本
$container->bind('beam',function ($container){
    return new Beam;
});

//在容器中添加飞行模块生产脚本
$container->bind('fly',function ($container){
    return new Fly;
});

//-------------------------------------------------------------------------

//开始生产
$superman = $container->make('superman', ['beam']);
$ironman = $container->make('ironman', ['fly']);
