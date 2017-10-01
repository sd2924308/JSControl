<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/Users/yanglong/phpProject/JSControl/application/wechat/view/tags.index.html";i:1506874876;s:78:"/Users/yanglong/phpProject/JSControl/application/extra/view/admin.content.html";i:1506619972;}*/ ?>
<div class="ibox">
    
    <?php if(isset($title)): ?>
    <div class="ibox-title notselect">
        <h5><?php echo $title; ?></h5>
        
<?php if(auth("$classuri/add")): ?>
<div class="nowrap pull-right" style="margin-top:10px">
    <button data-modal="<?php echo url('add'); ?>" data-title="添加应用" class='layui-btn layui-btn-small'> 添加应用 </button>
</div>
<?php endif; ?>

    </div>
    <?php endif; ?>
    <div class="ibox-content">
        <?php if(isset($alert)): ?>
        <div class="alert alert-<?php echo $alert['type']; ?> alert-dismissible" role="alert" style="border-radius:0">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php if(isset($alert['title'])): ?><p style="font-size:18px;padding-bottom:10px"><?php echo $alert['title']; ?></p><?php endif; if(isset($alert['content'])): ?><p style="font-size:14px"><?php echo $alert['content']; ?></p><?php endif; ?>
        </div>
        <?php endif; ?>
        

<!-- 表单搜索 开始 -->
<!-- <form class="animated form-search" action="__SELF__" onsubmit="return false" method="get"> -->
<form class="layui-form layui-form-pane form-search" action="__SELF__" onsubmit="return false" method="get">
    <!-- <div class="row"> -->

    <div class="layui-form-item layui-inline">
        <div class="layui-input-inline">
            <input type="text" name="appname" value="<?php echo (\think\Request::instance()->get('appname') ?: ''); ?>" placeholder="应用名称" class="input-sm form-control">
        </div>
    </div>
    <div class="layui-form-item layui-inline">
            <div class="layui-input-inline">
                <input type="text" name="colurl" value="<?php echo (\think\Request::instance()->get('colurl') ?: ''); ?>" placeholder="控制ID" class="input-sm form-control">
            </div>
        </div>
    <div class="layui-form-item layui-inline">
        <div class="layui-input-inline">
            <select name='center' class='layui-select full-width' style='display:block'>
                <option  value=''>选择平台</option>
                <option <?php echo \think\Request::instance()->get('center')=="百度"?"selected":""; ?> value='百度'>百度</option>
                <option <?php echo \think\Request::instance()->get('center')=="VIVO"?"selected":""; ?> value='VIVO'>VIVO</option>
                <option <?php echo \think\Request::instance()->get('center')=="安智"?"selected":""; ?> value='安智'>安智</option>
                <option <?php echo \think\Request::instance()->get('center')=="三星"?"selected":""; ?> value='安智'>三星</option>
                <option <?php echo \think\Request::instance()->get('center')=="360"?"selected":""; ?> value='360'>360</option>
                <option <?php echo \think\Request::instance()->get('center')=="应用宝"?"selected":""; ?> value='应用宝'>应用宝</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item layui-inline">
        <button type="submit" class="btn btn-sm btn-white"><i class="fa fa-search"></i> 搜索</button>
    </div>

    <!-- 
    </div> -->

</form>
<!-- 表单搜索 结束 -->

<form onsubmit="return false;" data-auto="" method="POST">
    <input type="hidden" value="resort" name="action" />
    <table class="table table-hover">
        <thead>
            <tr>
                <!-- <th class='list-table-check-td'>
                    <input data-none-auto="" data-check-target='.list-check-box' type='checkbox'/>
                </th> -->
                <th class='text-center' width="10px">ID</th>
                <th class='text-center'>应用名称</th>
                <th class='text-center' width="80px">平台</th>
                <th class='text-center'>控制ID</th>
                <th class='text-center'>应用包名</th>
                <th class='text-center'>目标url</th>
            
                <th class='text-center' width="100px">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list as $key=>$vo): ?>
            <tr>
                <!-- <td class='list-table-check-td'>
                    <input class="list-check-box" value='<?php echo $vo['id']; ?>' type='checkbox'/>
                </td> -->
                <td class='text-center'><?php echo (isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:'0'); ?></td>
                <td class='text-center'><?php echo (isset($vo['appname']) && ($vo['appname'] !== '')?$vo['appname']:''); ?></td>
                <td class='text-center'><?php echo (isset($vo['center']) && ($vo['center'] !== '')?$vo['center']:''); ?></td>
                <td class='text-center'><a target= _blank href="/api/whereis?id=<?php echo (isset($vo['colurl']) && ($vo['colurl'] !== '')?$vo['colurl']:''); ?>"><?php echo (isset($vo['colurl']) && ($vo['colurl'] !== '')?$vo['colurl']:''); ?></a>
                    <?php if($vo['status'] == 0): ?>
                    <span style="font-size: 11px;color: red">【未启用】</span>
                    <?php else: ?>
                    <span style="font-size: 11px;color: green">【已启用】</span> 
                    <?php endif; ?>
                </td>
                <td class='text-center'><?php echo (isset($vo['appid']) && ($vo['appid'] !== '')?$vo['appid']:''); ?></td>
                <td class='text-center'><?php echo (isset($vo['tourl']) && ($vo['tourl'] !== '')?$vo['tourl']:''); ?></td>
                <td class='text-center nowrap'>

                    <span class="text-explode">|</span> 
                    <?php if($vo['status'] == 0): ?>
                    <a data-update="<?php echo $vo['id']; ?>" data-field='status' data-value='1' data-action='<?php echo url("$classuri/resume"); ?>' style="color:green"
                        href="javascript:void(0)">启用</a> 
                        <?php elseif($vo['status'] == 1): ?>
                    <a data-update="<?php echo $vo['id']; ?>" data-field='status' data-value='0' data-action='<?php echo url("$classuri/forbid"); ?>' style="color:red" href="javascript:void(0)">停用</a>                    
                    <?php endif; if(auth("$classuri/edit")): ?>
                    <span class="text-explode">|</span>
                    <a data-modal='<?php echo url("$classuri/edit"); ?>?id=<?php echo $vo['id']; ?>' data-title="编辑标签" href="javascript:void(0)">编辑</a>                    
                 
                    <span class="text-explode">|</span>
                    <a data-update="<?php echo $vo['id']; ?>" data-field='delete' data-action='<?php echo url("$classuri/del"); ?>' href="javascript:void(0)">删除</a>                    
                    <?php endif; ?>

                </td>
            </tr>
            <?php endforeach; if(empty($list)): ?>
            <tr>
                <td colspan="6" style="text-align:center">没 有 记 录 了 哦 !</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?>
    <p><?php echo $page; ?></p><?php endif; ?>
</form>

    </div>
    
</div>