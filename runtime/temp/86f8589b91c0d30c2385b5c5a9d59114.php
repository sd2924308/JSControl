<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/Users/yanglong/phpProject/JSControl/application/wechat/view/fans.form.html";i:1512837364;}*/ ?>
<form class="layui-form layui-box" style='padding:25px 30px 20px 0' action="__SELF__" data-auto="true" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">所属应用</label>
        <div class="layui-input-block" style="line-height: 36px;">
            <select name='appid' class='layui-select full-width'>
                <?php foreach($apps as $app): ?>
                <option <?php echo (isset($vo['appid']) && ($vo['appid'] !== '')?$vo['appid']:"")==$app['colurl']?"selected": ""; ?> value='<?php echo $app['colurl']; ?>'><?php echo $app['appname']; ?></option>

                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">市场来源</label>
        <div class="layui-input-block" style="line-height: 36px;">
            <select name='appmarket' class='layui-select full-width'>
                <?php foreach($marklist as $key=>$mk): ?>
                <option <?php echo (isset($vo['appmarket']) && ($vo['appmarket'] !== '')?$vo['appmarket']:"")==$key?"selected": ""; ?> value='<?php echo $key; ?>'><?php echo $mk; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-block">
            <input type="text" name="username" value='<?php echo (isset($vo['username']) && ($vo['username'] !== '')?$vo['username']:""); ?>' required="required" title="姓名" placeholder="请输入姓名" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">电话</label>
        <div class="layui-input-block">
            <input type="text" name="tel" value='<?php echo (isset($vo['tel']) && ($vo['tel'] !== '')?$vo['tel']:""); ?>' required="required" title="电话" placeholder="请输入电话" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">用户状态</label>
        <div class="layui-input-block">
            <label class="think-radio">
                <input <?php echo (isset($vo['usataus']) && ($vo['usataus'] !== '')?$vo['usataus']:"0")=="0"?"checked": ""; ?> type="radio" name="usataus" value="0" lay-ignore> 未审核
            </label>
            <label class="think-radio">
                <input <?php echo (isset($vo['usataus']) && ($vo['usataus'] !== '')?$vo['usataus']:"0")=="1"?"checked": ""; ?> type="radio" name="usataus" value="1" lay-ignore> 已审核
            </label>
            <label class="think-radio">
                <input <?php echo (isset($vo['usataus']) && ($vo['usataus'] !== '')?$vo['usataus']:"0")=="2"?"checked": ""; ?> type="radio" name="usataus" value="2" lay-ignore> 黑名单
            </label>
            <label class="think-radio">
                <input <?php echo (isset($vo['usataus']) && ($vo['usataus'] !== '')?$vo['usataus']:"0")=="3"?"checked": ""; ?> type="radio" name="usataus" value="3" lay-ignore> VIP
            </label>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">备注</label>
        <div class="layui-input-block">
            <textarea placeholder="请输入备注" title="请输入备注" class="layui-textarea" name="remark"><?php echo (isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:""); ?></textarea>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">

        <?php if(isset($vo['id'])): ?>
        <input type='hidden' value='<?php echo $vo['id']; ?>' name='id' /><?php endif; ?>

        <button class="layui-btn" type='submit'>保存数据</button>

        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button>

    </div>

</form>

<script>
    (function () {
        window.form.render();
    })();
</script>