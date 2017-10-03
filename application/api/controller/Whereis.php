<?php

use service\DataService;
use think\Db;

namespace app\api\controller;

class Whereis{


    public function index()
    {
        $id = $_GET['id'];
        // $result = \think\Db::query('select * from app_table where colurl=?',[$id]);
        $result =  \think\Db::table('app_table')
        ->field('status,tourl')
        ->where('colurl','eq',$id)
        ->select();
        $json=array ('kk'=>0,'kks'=>'');
        if(count($result)>0){
            $json=array ('kk'=>$result[0]['status'],'kks'=>$result[0]['tourl']);
            \think\Db::table('app_table')
            ->where('colurl','eq',$id)
            ->update([
                'count' => ['exp','count+1']
            ]);
        }
         return json_encode($json);        
    }
}