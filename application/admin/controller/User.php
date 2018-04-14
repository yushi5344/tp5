<?php

namespace app\admin\controller;
use think\Container;
use think\Controller;
use think\Request;
use think\facade\Config;
class User extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        echo 1;
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }

    public function getConfig(){
        //获取所有配置
        //$config=Config::get();
        //dump($config);
        //获取app下的配置项
        //$confapp=Config::get('app.');
       // dump($confapp);

        //获取一级配置项  推荐使用pull
        //$configfirst=Config::pull('log');
        //dump($configfirst);

        //获取二级配置
        //$configsecond=Config::get('app.app_debug');

        //dump($configsecond);

        //app是默认的  可以不写
        //$configsecond=Config::get('app_debug');

        //dump($configsecond);

        //判断是否有这个配置项
        //$confhas=Config::has('defalu_lang');
       // dump($confhas);

        //查询database下的配置内容
        $configdata=Config::pull('database');
        dump($configdata);
    }


    public function setConfig(){
        $app_debug=Config::get('app_debug');
        dump($app_debug);

        //动态改变配置项
        Config::set('app_debug',false);
        dump(Config::get('app_debug'));
    }

    /**
     * @Desc:助手函数
     * @author:guomin
     * @date:2018-04-14 9:38
     */

    public function helperConfig(){

        //使用助手函数config
        //助手函数是不依赖COnfig类的
        //dump(config());
        dump(config('app_debug'));//true
        config('app_debug',false);
        dump(config('app_debug'));
    }


    /**
     * @Desc:容器与依赖注入的管理
     * 1.任何URL的访问，最终都是定位到控制器，由控制器中的某个具体方法执行
     * 2.一个控制器对应着一个类，如果这些控制器需要统一管理，怎么办？
     * 容器进行管理，还可以将类的实例(对象)进行管理，传递给类方法，自动触发依赖注入
     * 依赖注入：将对象类型的数据，以参数的形式传递给方法的参数列表
     * URL访问：以get形式将数据传递到控制器指定方法中
     * @author:guomin
     * @date:
     * @param string $name
     * @return string
     */
    public function Container($name='lee'){

        return 'hello'.$name;

    }

    /*
     * 依赖注入
     */

    public function getMethod(\app\common\common $common)
    {

        $common->setName('aaaa');

        return $common->getName();

    }


    /*
     * 绑定一个类到容器中
     */
    public function bindClass(){


        Container::set('common','\app\common\common');

        $common=Container::get('common',['name'=>'leee']);

        return $common->getName();
    }



    /*
     * 绑定一个闭包到容器中
     */
    public function bindClosure(){

        Container::set('demo',function($demo){
            return $demo;
        });

        return Container::get('demo',['demo'=>'demo的值在这里显示']);
    }

}
