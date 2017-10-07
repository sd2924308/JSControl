<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/Users/yanglong/phpProject/JSControl/application/wechat/view/tags.form.html";i:1507395493;}*/ ?>
<form class="layui-form layui-box" style='padding:25px 30px 20px 0' action="__SELF__" data-auto="true" method="post">

    <div class="layui-form-item">
        <label class="layui-form-label">应用名称</label>
        <div class="layui-input-block">
            <input type="text" name="appname" value='<?php echo (isset($vo['appname']) && ($vo['appname'] !== '')?$vo['appname']:""); ?>' required="required" title="请输入应用名称" placeholder="请输入标签名称"
                class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">控制ID</label>
        <div class="layui-input-block">
            <input type="text" name="colurl" value='<?php echo (isset($vo['colurl']) && ($vo['colurl'] !== '')?$vo['colurl']:""); ?>' placeholder="控制地址" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">底部导航</label>
        <div class="layui-input-block">
            <label class="think-radio">
                <input <?php echo (isset($vo['ismenu']) && ($vo['ismenu'] !== '')?$vo['ismenu']:"0")=="1"?"checked":""; ?>  type="radio" name="ismenu" value="1" lay-ignore> 有 
            </label>
            <label class="think-radio">
                <input <?php echo (isset($vo['ismenu']) && ($vo['ismenu'] !== '')?$vo['ismenu']:"0")=="0"?"checked":""; ?>  type="radio" name="ismenu" value="0" lay-ignore> 无
            </label>
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">应用包名</label>
        <div class="layui-input-block">
            <input type="text" name="appid" value='<?php echo (isset($vo['appid']) && ($vo['appid'] !== '')?$vo['appid']:""); ?>' title="请输入应用包名" placeholder="请输入标签名称" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">目标网站</label>
        <div class="layui-input-block">
            <input type="text" name="tourl" value='<?php echo (isset($vo['tourl']) && ($vo['tourl'] !== '')?$vo['tourl']:""); ?>' placeholder="启用后app转向地址" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">上架平台</label>
        <div class="layui-input-block">
            <select name='center' class='layui-select full-width'>
               
                <option  value=''>请选择上架平台<?php echo (isset($vo['center']) && ($vo['center'] !== '')?$vo['center']:""); ?></option>
                <option <?php echo (isset($vo['center']) && ($vo['center'] !== '')?$vo['center']:"")=="百度"?"selected":""; ?> value='百度'>百度</option>
                <option <?php echo (isset($vo['center']) && ($vo['center'] !== '')?$vo['center']:"")=="VIVO"?"selected":""; ?> value='VIVO'>VIVO</option>
                <option <?php echo (isset($vo['center']) && ($vo['center'] !== '')?$vo['center']:"")=="安智"?"selected":""; ?> value='安智'>安智</option>
                <option <?php echo (isset($vo['center']) && ($vo['center'] !== '')?$vo['center']:"")=="三星"?"selected":""; ?> value='安智'>三星</option>
                <option <?php echo (isset($vo['center']) && ($vo['center'] !== '')?$vo['center']:"")=="360"?"selected":""; ?> value='360'>360</option>
                <option <?php echo (isset($vo['center']) && ($vo['center'] !== '')?$vo['center']:"")=="应用宝"?"selected":""; ?> value='应用宝'>应用宝</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属用户</label>

        <div class="layui-input-block">
            <?php if((session('user.username'))=="admin"): ?>
            <select name='username' class='layui-select full-width'>
                <?php foreach($users as $user): if((isset($vo['username']) and $user['username']==$vo['username'])): ?>
                    <option selected value='<?php echo $user['username']; ?>'>  <?php echo $user['username']; ?></option>
                    <?php else: ?>
                    <option value='<?php echo $user['username']; ?>'>  <?php echo $user['username']; ?></option>
                    <?php endif; endforeach; ?>
                
            </select> 
            <?php else: ?>
            <input type="text" name="username" value="<?php echo session('user.username'); ?>" readonly class="layui-input">
             <?php endif; ?>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">APP下载地址</label>
        <div class="layui-input-block">
            <input type="text" name="appurl" value='<?php echo (isset($vo['appurl']) && ($vo['appurl'] !== '')?$vo['appurl']:""); ?>' placeholder="上架成功后填写" class="layui-input">
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">

        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo $vo['id']; ?>' name='id' /><?php endif; ?>

        <button class="layui-btn" type='submit'>保存数据</button>

        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button>

    </div>

</form>

<script>
    (function () {
        window.form.render();
    })();
</script>