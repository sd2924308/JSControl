<?php

// +----------------------------------------------------------------------
// | Think.Admin
// +----------------------------------------------------------------------
// | 版权所有 2014~2017 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: http://think.ctolog.com
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/zoujingli/Think.Admin
// +----------------------------------------------------------------------

namespace app\wechat\controller;

use controller\BasicAdmin;
use service\DataService;
use service\ToolsService;
use think\Db;



/**
 * 微信粉丝标签管理
 * Class Tags
 * @package app\wechat\controller
 * @author Anyon <zoujingli@qq.com>
 * @date 2017/03/27 14:43
 */
class Fans extends BasicAdmin
{

    /**
     * 定义当前默认数据表
     * @var string
     */
    public $table = 'UserTable';
    
    /**
     * 显示粉丝标签列表
     * @return array|string
     */
    public function index()
    {
      
        $this->title = '人员管理';
        $db = Db::name($this->table)->order('id desc');

        // foreach (['appid'] as $key) {
        //     if (isset($get[$key]) && $get[$key] !== '') {
        //         $db->where($key, 'like', "%{$get[$key]}%");
        //     }
        // }
     

        
        if(session('user.username')!='admin')
            $applist= Db::name('AppTable')->where(['username' => session('user.username')])->select();
        else
            $applist= Db::name('AppTable')->select();

        $this->assign('apps',$applist);
        
        $arr=array(); 
        foreach($applist as &$app){
            array_push($arr,$app['colurl']);
        }
        
        $appid = $this->request->get('appid','');
        
        if(session('user.username')!='admin')
            $db->where('appid','in',$arr);
       if($appid != '')
            $db->where(['appid' => $appid]);
        return parent::_list($db);
    }


    public function _form_filter(&$data)
    {
        if ($this->request->isPost()) {
            $dataid=!empty($data['id']) ? $data['id'] : '';
           
            // if (Db::name($this->table)->where(['colurl' => $data['colurl'],'id'=>['<>',$dataid]])->find()) {
            //     $this->error('这个控制ID已经使用过了,请更换!');
            // }
        }else{
            // $data['user'] = explode(',', isset($data['user']) ? $data['user'] : '');
            // $this->assign('users', Db::name('SystemUser')->where(['is_deleted' => '0'])->select());
            $this->assign('marklist', $this->markList);
            if(isset($data['appid'])){
                $data['appname'] = Db::name('AppTable')
                ->field('appname')
                ->where('colurl','eq', $data['appid'])
                ->find()['appname'];   
            }

            if(session('user.username')!='admin')
                $applist= Db::name('AppTable')->where(['username' => session('user.username')])->select();
            else
                $applist= Db::name('AppTable')->select();

            $this->assign('apps',$applist);
        }
    }


    protected function _index_data_filter(&$data)
    {
        foreach ($data as &$vo) {
            $vo['appname'] = Db::name('AppTable')
            ->field('appname')
            ->where('colurl','eq', $vo['appid'])
            ->find()['appname'];
        }

        
    }


    

    /**
     * 添加粉丝标签
     */
    public function add()
    {
        return $this->_form($this->table, 'form');
    }

    /**
     * 编辑粉丝标签
     */
    public function edit()
    {
        return $this->_form($this->table, 'form');
    }

 /**
     * 删除
     */
     public function del()
     {
         if (DataService::update($this->table)) {
             $this->success("删除成功！", '');
         }
         $this->error("删除失败，请稍候再试！");
     }


    /**
     * 停用
     */
     public function forbid()
     {
         if (DataService::update($this->table)) {
             $this->success("停用成功！", '');
         }
         $this->error("停用失败，请稍候再试！!");
     }

    /**
     * 修改状态
     */
     public function upsta()
     {
         if (DataService::update($this->table)) {
             $this->success("更新成功！", '');
         }
         $this->error("更新失败，请稍候再试！!");
     }

      /**
     * 权限恢复
     */
    public function resume()
    {
        if (DataService::update($this->table)) {
            $this->success("启用成功！", '');
        }
        $this->error("启用失败，请稍候再试！");
    }

}