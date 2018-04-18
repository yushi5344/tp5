<?php
namespace app\admin\controller;
use think\Controller;
use app\validate\User as Users;
use app\facade\User;
class Validatedata extends Controller{

    public function index(){

        $data=[
            'name'=>'guomin',
            'email'=>'424242qq.com',
            'password'=>'222222',
            'mobile'=>17092559941
        ];

        $validate=new Users();
        if(!$validate->check($data)){
            return $validate->getError();
        }else{
            return '通过';
        }


        /*
        //静态代理
       if(!User::check($data)) {
           return User::getError();
       }else{
           return '通过';
       }
       */
    }

    public function validates(){
        //验证数据
        $data=[
            'name'=>'guomin',
            'email'=>'424242qq.com',
            'password'=>'222222',
            'mobile'=>17092559941
        ];


        //验证规则
        $validate='app\validate\User';
        $res=$this->validate($data,$validate);
        if(true!==$res){
            return $res;
        }else{

            return '通过';

        }
    }
}