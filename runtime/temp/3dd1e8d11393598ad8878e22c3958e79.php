<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/Users/yanglong/phpProject/JSControl/application/wechat/view/news.index.html";i:1506619972;s:78:"/Users/yanglong/phpProject/JSControl/application/extra/view/admin.content.html";i:1506619972;}*/ ?>
<div class="ibox">
    
<style>

    #news_box {
        position: relative;
    }

    #news_box .news_item {
        top: 0;
        left: 0;
        padding: 5px;
        margin: 10px;
        width: 300px;
        position: relative;
        border: 1px solid #ccc;
        box-sizing: content-box;
    }

    #news_box .news_item .news_articel_item {
        width: 100%;
        height: 150px;
        overflow: hidden;
        position: relative;
        background-size: 100%;
        background-position: center center;
    }

    #news_box .news_item .news_articel_item p {
        bottom: 0;
        width: 100%;
        color: #fff;
        padding: 5px;
        max-height: 5em;
        font-size: 12px;
        overflow: hidden;
        position: absolute;
        text-overflow: ellipsis;
        background: rgba(0, 0, 0, 0.7);
    }

    #news_box .news_item .news_articel_item.other {
        height: 50px;
        padding: 5px 0;
    }

    #news_box .news_item .news_articel_item .left-image {
        width: 50px;
        height: 50px;
        float: left;
        overflow: hidden;
        position: relative;
        background-size: 100%;
        background-position: center center;
    }

    #news_box .news_item .news_articel_item .right-text {
        float: left;
        width: 250px;
        padding-right: 10px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    #news_box .news_item .hr-line-dashed:last-child {
        display: none
    }

    #news_box .hr-line-dashed {
        margin: 6px 0 1px 0
    }

    #news_box .news_tools {
        top: 0;
        z-index: 80;
        color: #fff;
        width: 312px;
        padding: 0 5px;
        margin-left: -6px;
        line-height: 38px;
        text-align: right;
        position: absolute;
        background: rgba(0, 0, 0, 0.7);
    }

    #news_box .news_tools a {
        color: #fff;
        margin-left: 10px
    }

</style>

    <?php if(isset($title)): ?>
    <div class="ibox-title notselect">
        <h5><?php echo $title; ?></h5>
        
<div class="nowrap pull-right" style="margin-top:10px">
    <button data-open="<?php echo url('add'); ?>" class='layui-btn layui-btn-small'>添加图文</button>
</div>

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
        

<div id="news_box">
    <?php foreach($list as $vo): ?>
    <div class="news_item">
        <div class='news_tools hide'>
            <a data-phone-view="<?php echo url('@wechat/review'); ?>?type=news&content=<?php echo $vo['id']; ?>" href='javascript:void(0)'>预览</a>
            <a data-modal="<?php echo url('push'); ?>?id=<?php echo $vo['id']; ?>" href='javascript:void(0)'>推送</a>
            <a data-open='<?php echo url("edit"); ?>?id=<?php echo $vo['id']; ?>' href='javascript:void(0)'>编辑</a>
            <a data-news-del="<?php echo $vo['id']; ?>" href='javascript:void(0)'>删除</a>
        </div>
        <?php foreach($vo['articles'] as $k => $v): if($k < 1): ?>
        <div data-tips-image='<?php echo $v['local_url']; ?>' class='news_articel_item' style='background-image:url("<?php echo $v['local_url']; ?>")'>
            <?php if($v['title']): ?><p><?php echo $v['title']; ?></p><?php endif; ?>
        </div>
        <div class="hr-line-dashed"></div>
        <?php else: ?>
        <div class='news_articel_item other'>
            <div class='right-text'><?php echo $v['title']; ?></div>
            <div data-tips-image='<?php echo $v['local_url']; ?>' class='left-image' style='background-image:url("<?php echo $v['local_url']; ?>");'>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <?php endif; endforeach; ?>
    </div>
    <?php endforeach; ?>
    <div style="clear:both"></div>
    <?php if(empty($list)): ?>
    <p class="help-block">暂时无记录</p>
    <?php endif; ?>
</div>
<?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; ?>


    </div>
    
<script>

    $('body').on('mouseenter', '.news_item', function () {
        $(this).find('.news_tools').removeClass('hide');
    }).on('mouseleave', '.news_item', function () {
        $(this).find('.news_tools').addClass('hide');
    });

    require(['jquery.masonry'], function (Masonry) {
        var container = document.querySelector('#news_box');
        var msnry = new Masonry(container, {itemSelector: '.news_item', columnWidth: 0});
        msnry.layout();
        $('body').on('click', '[data-news-del]', function () {
            var self = this;
            $.msg.confirm('确定要删除图文吗？', function () {
                $.form.load('<?php echo url("del"); ?>', {
                    field: 'delete',
                    value: 0,
                    id: self.getAttribute('data-news-del')
                }, 'post', function (ret) {
                    if (ret.code) {
                        $(self).parents('.news_item').remove();
                        return $.msg.success(ret.msg), msnry.layout(), false;
                    }
                    return $.msg.error(ret.msg), false;
                });
            });
        });
    });

</script>

</div>