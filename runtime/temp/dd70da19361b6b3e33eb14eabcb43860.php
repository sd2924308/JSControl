<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/Users/yanglong/phpProject/JSControl/application/admin/view/config.index.html";i:1506619972;s:78:"/Users/yanglong/phpProject/JSControl/application/extra/view/admin.content.html";i:1506619972;}*/ ?>
<div class="ibox">
    
    <?php if(isset($title)): ?>
    <div class="ibox-title notselect">
        <h5><?php echo $title; ?></h5>
        
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
        
<form onsubmit="return false;" action="__SELF__" data-auto="true" method="post" class='form-horizontal' style='padding-top:20px'>

    <div class="form-group">
        <label class="col-sm-2 control-label">SiteName <span class="nowrap">(网站名称)</span></label>
        <div class='col-sm-8'>
            <input type="text" name="site_name" required="required" title="请输入网站名称" placeholder="请输入网站名称" value="<?php echo sysconf('site_name'); ?>" class="layui-input">
            <p class="help-block">网站名称，显示在浏览器标签上</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Copyright <span class="nowrap">(版权信息)</span></label>
        <div class='col-sm-8'>
            <input type="text" name="site_copy" required="required" title="请输入版权信息" placeholder="请输入版权信息" value="<?php echo sysconf('site_copy'); ?>" class="layui-input">
            <p class="help-block">程序的版权信息设置，在后台登录页面显示</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">AppName <span class="nowrap">(程序名称)</span></label>
        <div class='col-sm-8'>
            <input type="text" name="app_name" required="required" title="请输入程序名称" placeholder="请输入程序名称" value="<?php echo sysconf('app_name'); ?>" class="layui-input">
            <p class="help-block">当前程序名称，在后台主标题上显示</p>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">AppVersion <span class="nowrap">(程序版本)</span></label>
        <div class='col-sm-8'>
            <input type="text" name="app_version" required="required" title="请输入程序版本" placeholder="请输入程序版本" value="<?php echo sysconf('app_version'); ?>" class="layui-input">
            <p class="help-block">当前程序版本号，在后台主标题上标显示</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Baidu <span class="nowrap">(百度统计)</span></label>
        <div class='col-sm-8'>
            <input type="text" name="tongji_baidu_key" maxlength="32" pattern="^[0-9a-z]{32}$" title="请输入32位百度统计应用ID" placeholder="请输入32位百度统计应用ID" value="<?php echo sysconf('tongji_baidu_key'); ?>" class="layui-input">
            <p class="help-block">百度统计应用ID，可以在<a target="_blank" href="https://tongji.baidu.com">百度网站统计</a>申请并获取</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">BrowserIcon <span class="nowrap">(浏览器图标)</span></label>
        <div class='col-sm-8'>
            <img data-tips-image style="height:auto;max-height:32px;min-width:32px" src="<?php echo sysconf('browser_icon'); ?>"/>
            <input type="hidden" name="browser_icon" onchange="$(this).prev('img').attr('src', this.value)"
                   value="<?php echo sysconf('browser_icon'); ?>" class="layui-input">
            <a class="btn btn-link" data-file="one" data-type="ico,png" data-field="browser_icon">上传图片</a>
            <p>建议上传ICO图标的尺寸为128x128px，此图标用于网站标题前，ICON在线制作。</p>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="col-sm-4 col-sm-offset-2">
        <div class="layui-form-item text-center">
            <button class="layui-btn" type="submit">保存配置</button>
        </div>
    </div>

</form>


    </div>
    
</div>