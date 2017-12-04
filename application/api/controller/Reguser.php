<?php

use service\DataService;
use think\Db;

namespace app\api\controller;

class Reguser{
    public function regUser(){
   
        $loginname = isset($_POST['loginname'])?$_POST['loginname']:'';
        $pwd = isset($_POST['pwd'])?$_POST['pwd']:'';
        $username = isset($_POST['username'])?$_POST['username']:'';
        $appid = isset($_POST['appid'])?$_POST['appid']:'';
        $appname = isset($_POST['appname'])?$_POST['appname']:'';
        $tel = isset($_POST['tel'])?$_POST['tel']:'';
        $status = isset($_POST['status'])?$_POST['status']:0;
        $appmarket = isset($_POST['appmarket'])?$_POST['appmarket']:'';
        $remark = isset($_POST['remark'])?$_POST['remark']:'';
        $usataus = isset($_POST['usataus'])?$_POST['usataus']:'';
        
        if($loginname!='' && $pwd!=''){
            return json_encode(array ('code'=>-1,'msg'=>'请输入参数'));
        }else{
            $data= ['loginname' => $loginname,
            'pwd' => $pwd,
            'username' => $username,
            'appid' => $appid,
            'appname' => $appname,
            'tel' => $tel,
            'status' => $status,
            'appmarket' => $appmarket,
            'remark' => $remark,
            'usataus' => $usataus];
            $res=\think\Db::table('user_table')->insert($data);
            $json=array ('code'=>200,'msg'=> $res);
            return json_encode($json);
        }
    }
}