<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/Users/yanglong/phpProject/JSControl/application/admin/view/auth.apply.html";i:1506619972;s:78:"/Users/yanglong/phpProject/JSControl/application/extra/view/admin.content.html";i:1506619972;}*/ ?>
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
        

<style>
    ul.ztree li span.button.switch{margin-right:5px}
    ul.ztree ul ul li{display:inline-block;white-space:normal}
    ul.ztree>li>ul>li{padding:5px}
    ul.ztree>li{background: #dae6f0}
    ul.ztree>li:nth-child(even)>ul>li:nth-child(even){background: #eef5fa}
    ul.ztree>li:nth-child(even)>ul>li:nth-child(odd){background: #f6fbff}
    ul.ztree>li:nth-child(odd)>ul>li:nth-child(even){background: #eef5fa}
    ul.ztree>li:nth-child(odd)>ul>li:nth-child(odd){background: #f6fbff}
    ul.ztree>li>ul{margin-top:12px}
    ul.ztree>li{padding:15px;padding-right:25px}
    ul.ztree li{white-space:normal!important}
    ul.ztree>li>a>span{font-size:15px;font-weight:700}
</style>

<ul id="zTree" class="ztree loading">
    <li style="height:100px;"></li>
</ul>

<div class="hr-line-dashed"></div>

<div class="layui-form-item text-center">
    <button class="layui-btn" data-submit-role type='button'>保存数据</button>
    <button class="layui-btn layui-btn-danger" type='button' onclick="window.history.back()">取消编辑</button>
</div>

<script>
    require(['jquery.ztree'], function () {
        function showTree() {
            this.data = {};
            this.ztree = null;
            this.setting = {
                view: {showLine: false, showIcon: false, dblClickExpand: false},
                check: {enable: true, nocheck: false, chkboxType: {"Y": "ps", "N": "ps"}},
                callback: {
                    beforeClick: function (treeId, treeNode) {
                        if (treeNode.children.length < 1) {
                            window.roleForm.ztree.checkNode(treeNode, !treeNode.checked, null, true);
                        } else {
                            window.roleForm.ztree.expandNode(treeNode);
                        }
                        return false;
                    }}};
            this.listen();
        }
        showTree.prototype = {
            constructor: showTree,
            listen: function () {
                this.getData(this);
            },
            getData: function (self) {
                $.msg.loading();
                jQuery.get('<?php echo url(); ?>?id=<?php echo $vo['id']; ?>', {action: 'getNode'}, function (ret) {
                    $.msg.close();
                    function renderChildren(data, level) {
                        var childrenData = [];
                        for (var i in data) {
                            var children = {};
                            children.open = true;
                            children.node = data[i].node;
                            children.name = data[i].title || data[i].node;
                            children.checked = data[i].checked || false;
                            children.children = renderChildren(data[i]._sub_, level + 1);
                            childrenData.push(children);
                        }
                        return childrenData;
                    }
                    self.data = renderChildren(ret.data, 1);
                    self.showTree();
                }, 'JSON');
            },
            showTree: function () {
                this.ztree = jQuery.fn.zTree.init(jQuery("#zTree"), this.setting, this.data);
                while (true) {
                    var reNodes = this.ztree.getNodesByFilter(function (node) {
                        return  (!node.node && node.children.length < 1);
                    });
                    if (reNodes.length < 1) {
                        break;
                    }
                    for (var i in reNodes) {
                        this.ztree.removeNode(reNodes[i]);
                    }
                }
            },
            submit: function () {
                var nodes = [];
                var data = this.ztree.getCheckedNodes(true);
                for (var i in data) {
                    (data[i].node) && nodes.push(data[i].node);
                }
                $.form.load('<?php echo url(); ?>?id=<?php echo $vo['id']; ?>&action=save', {nodes: nodes}, 'POST');
            }};
        window.roleForm = new showTree();
        $('[data-submit-role]').on('click', function () {
            window.roleForm.submit();
        });
    });
</script>


    </div>
    
</div>