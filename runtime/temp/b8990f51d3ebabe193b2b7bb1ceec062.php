<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/Users/yanglong/phpProject/JSControl/application/wechat/view/fans.index.html";i:1512319836;s:78:"/Users/yanglong/phpProject/JSControl/application/extra/view/admin.content.html";i:1506619972;}*/ ?>
<div class="ibox">
    
    <?php if(isset($title)): ?>
    <div class="ibox-title notselect">
        <h5><?php echo $title; ?></h5>
         <?php if(auth("$classuri/add")): ?>
<div class="nowrap pull-right" style="margin-top:10px">
    <button data-modal="<?php echo url('add'); ?>" data-title="添加应用" class='layui-btn layui-btn-small'> 新增人员 </button>
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
        <?php foreach($apps as $app): ?>
        <div class="layui-form-item layui-inline"><a data-open="<?php echo url('index'); ?>?appid=<?php echo $app['colurl']; ?>" href='javascript:void(0)'><?php echo $app['appname']; ?></a></div>
        <?php endforeach; ?>
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
                <th class='text-center'>姓名</th>
                <th class='text-center' width="80px">电话</th>
                <th class='text-center'>APP名称</th>
                <th class='text-center' width="80px">联系状态</th>
                <th class='text-center'>APP市场</th>
                <th class='text-center'>备注</th>
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
                <td class='text-center'><?php echo (isset($vo['username']) && ($vo['username'] !== '')?$vo['username']:''); ?></td>
                
                <td class='text-center'><?php echo (isset($vo['tel']) && ($vo['tel'] !== '')?$vo['tel']:''); ?></td>
                <td class='text-center'><?php echo (isset($vo['appname']) && ($vo['appname'] !== '')?$vo['appname']:''); ?></td>
                <td class='text-center'>
                    <a target=_ blank href="/api/whereis?id=<?php echo (isset($vo['colurl']) && ($vo['colurl'] !== '')?$vo['colurl']:''); ?>"><?php echo (isset($vo['colurl']) && ($vo['colurl'] !== '')?$vo['colurl']:''); ?></a>
                    <?php if($vo['status'] == 0): ?>
                    <span style="font-size: 11px;color: red">【未联系】</span>
                    <?php else: ?>
                    <span style="font-size: 11px;color: green">【已联系】</span>
                    <?php endif; ?>
                </td>
                <td class='text-center'><?php echo (isset($vo['appmarket']) && ($vo['appmarket'] !== '')?$vo['appmarket']:''); ?></td>
                <td class='text-center'><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''); ?></td>
                <td class='text-center nowrap'>
                   <?php if(auth("$classuri/edit")): ?>
                    <span class="text-explode">|</span>
                    <a data-modal='<?php echo url("$classuri/edit"); ?>?id=<?php echo $vo['id']; ?>' data-title="编辑标签" href="javascript:void(0)">编辑</a>
                    <?php endif; if(auth("$classuri/del")): ?>
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
    
<script>
    (function () {
        window.form.render();
    })();
</script>

</div>