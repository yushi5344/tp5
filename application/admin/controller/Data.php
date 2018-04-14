<?php
namespace app\admin\controller;

use \think\Controller;
use \think\Db;
class Data extends Controller{

    /*
     * Db类操作单条记录
     */
    public function find(){

        /*
         * where条件查询
        $find=Db::table('acm_userdb')
            ->field(['id'=>'编号','userName'=>'登录名称','realName'=>'真实姓名'])
            ->where('id',1)
            ->find();
        */

        /*
         * 主键查询
         * */
        $find=Db::table('acm_userdb')
            ->field(['id'=>'编号','userName'=>'登录名称','realName'=>'真实姓名'])
            ->find(1);


        dump($find);

    }

    /*
     * 多条查询
     */
    public function select(){

        $select=Db::table('acm_userdb')
            ->field(['id'=>'编号','userName'=>'登录名称','realName'=>'真实姓名'])
            ->where(
                [
                    ['id','<',38],
                ]
            )->select();


        dump($select);
    }
}
?>
