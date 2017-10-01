<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/Users/yanglong/phpProject/JSControl/application/admin/view/user.auth.html";i:1506619972;}*/ ?>
<form class="layui-form layui-box" style='padding:25px 30px 20px 0' action="__SELF__" data-auto="true" method="post">

    <div class="layui-form-item">
        <label class="layui-form-label">用户账号</label>
        <div class="layui-input-block">
            <?php if($vo and $vo['username']): ?>
            <input type="text" readonly="" disabled="" name="username" value='<?php echo (isset($vo['username']) && ($vo['username'] !== '')?$vo['username']:""); ?>'
                   required="required" title="请输入用户名称" placeholder="请输入用户名称" class="layui-input disabled">
            <?php else: ?>
            <input type="text" name="username" value='<?php echo (isset($vo['username']) && ($vo['username'] !== '')?$vo['username']:""); ?>' required="required"
                   title="请输入用户名称" placeholder="请输入用户名称" class="layui-input">
            <?php endif; ?>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">访问授权</label>
        <div class="layui-input-block">
            <?php foreach($authorizes as $authorize): if(in_array($authorize['id'],$vo['authorize'])): ?>
            <label class="think-checkbox">
                <input type="checkbox" checked name="authorize[]" value="<?php echo $authorize['id']; ?>" lay-ignore> <?php echo $authorize['title']; ?>
            </label>
            <?php else: ?>
            <label class="think-checkbox">
                <input type="checkbox" checked name="authorize[]" value="<?php echo $authorize['id']; ?>" lay-ignore> <?php echo $authorize['title']; ?>
            </label>
            <?php endif; endforeach; if(empty($authorizes)): ?>
            <span class="color-desc" style="line-height:36px">未配置权限</span>
            <?php endif; ?>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo $vo['id']; ?>' name='id'/><?php endif; ?>
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button>
    </div>
    <script>window.form.render();</script>
</form>
