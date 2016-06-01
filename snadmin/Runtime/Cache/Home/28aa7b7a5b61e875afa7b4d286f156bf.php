<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>无标题文档</title>
    <link href="/sncss/css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/zTree_v3/css/zTreeStyle/zTreeStyle.css" type="text/css"/>
    <script type=text/javascript src="/zTree_v3/js/jquery.min.js"></script>
    <script type="text/javascript" src="/zTree_v3/js/jquery.ztree.core-3.5.js"></script>

    <script type=text/javascript>
        var setting = {
            view: {
                showLine: true
            },
            data: {
                simpleData: {
                    enable: true
                }
            }
        };

        var zNodes = [
            {id: 1, pId: 0, name: "父節點1 - 展開", open: true},
            {id: 11, pId: 1, name: "父節點11 - 摺疊"},
            {id: 111, pId: 11, name: "葉子節點111"},
            {id: 112, pId: 11, name: "葉子節點112"},
            {id: 113, pId: 11, name: "葉子節點113"},
            {id: 114, pId: 11, name: "葉子節點114"},
            {id: 12, pId: 1, name: "父節點12 - 摺疊"},
            {id: 121, pId: 12, name: "葉子節點121"},
            {id: 122, pId: 12, name: "葉子節點122"},
            {id: 123, pId: 12, name: "葉子節點123"},
            {id: 124, pId: 12, name: "葉子節點124"},
            {id: 13, pId: 1, name: "父節點13 - 沒有子節點", isParent: true},
            {id: 2, pId: 0, name: "父節點2 - 摺疊"},
            {id: 21, pId: 2, name: "父節點21 - 展開", open: true},
            {id: 211, pId: 21, name: "葉子節點211"},
            {id: 212, pId: 21, name: "葉子節點212"},
            {id: 213, pId: 21, name: "葉子節點213"},
            {id: 214, pId: 21, name: "葉子節點214"},
            {id: 22, pId: 2, name: "父節點22 - 摺疊"},
            {id: 221, pId: 22, name: "葉子節點221"},
            {id: 222, pId: 22, name: "葉子節點222"},
            {id: 223, pId: 22, name: "葉子節點223"},
            {id: 224, pId: 22, name: "葉子節點224"},
            {id: 23, pId: 2, name: "父節點23 - 摺疊"},
            {id: 231, pId: 23, name: "葉子節點231"},
            {id: 232, pId: 23, name: "葉子節點232"},
            {id: 233, pId: 23, name: "葉子節點233"},
            {id: 234, pId: 23, name: "葉子節點234"},
            {id: 3, pId: 0, name: "父節點3 - 沒有子節點", isParent: true}
        ];


        $(document).ready(function () {
            var $user1 = $('#user1').val();
            $.ajax({
                type: "post",
                dataType: "json",
                global: false,
                url: "/admin.php/Home/Common/getTree",
                data: {
                    user1: $user1
                },
                success: function (data, textStatus) {
                    if (data.status == 0) {
                        zNodes1 = data.data;
                        $.fn.zTree.init($("#treeDemo"), setting, zNodes1);
                    } else {
                        alert("您還沒有");
                    }

                    return;
                }

            });

            //$.fn.zTree.init($("#treeDemo"), setting, zNodes);
        });


        $(function () {


            $('#btn').click(function () {

                var $user = $('#user').val();
                $.ajax({
                    type: "post",
                    dataType: "json",
                    global: false,

                    url: "/admin.php/Home/Common/getTreeso",
                    data: {
                        user: $user
                    },
                    success: function (data, textStatus) {
                        if (data.status == 0) {
                            //alert(data.nr);

                            zNodes1 = data.data;
                            $.fn.zTree.init($("#treeDemo"), setting, zNodes1);
                        } else {
                            alert(data.data);
                        }

                        return;
                    }

                });


            })


        })


    </script>
</head>
<style>
    input {
        border: 1px #cccccc solid;
        height: 25px;
        line-height: 25px;
    }
</style>
<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">奖金设定 日期:<?php echo ($hda["date"]); ?>  当日金额量:<?php echo ($hda["num"]); ?></a></li>
    </ul>
</div>

<div class="rightinfo">
    <div class="tools"></div>
    <table class="tablelist">
        <form action="<?php echo U('Home/Index/jjset');?>" method="post">
            <thead>
            <tr>
                <th width="15%">仅需互助</th>
                <th width="85%"><input name="jj01s" value="<?php echo ($jj01s); ?>" type="" />元 — <input name="jj01m" value="<?php echo ($jj01m); ?>" type="" />元 必须<input name="jj01" value="<?php echo ($jj01); ?>" type="" />元的整倍数</th>
            </tr>
            <tr>
                <th width="15%">新用户注册奖励</th>
                <th width="85%"><input name="reg_jiangli" value="<?php echo ($reg_jiangli); ?>" type="number" />元</th>
            </tr>
            <tr>
                <th width="15%">排队分红天数</th>
                <th width="85%"><input name="pdfhdays" value="<?php echo ($pdfhdays); ?>" type="number" />天</th>
            </tr>
            <tr>
                <th width="15%">打款后分红天数</th>
                <th width="85%"><input name="jjfhdays" value="<?php echo ($jjfhdays); ?>" type="number" />天</th>
            </tr>
            <tr>
                <th width="15%">提现冻结小时</th>
                <th width="85%"><input name="jjdjdays" value="<?php echo ($jjdjdays); ?>" type="number" />小时</th>
            </tr>
            <tr>
                <th width="15%">刚注册用户买入V币冻结天数</th>
                <th width="85%"><input name="reg_days" value="<?php echo ($reg_days); ?>" type="number" />天&nbsp;&nbsp;(0表示不冻结，已注册就可以买入V币，1表示注册一天后，才可以买入V币，等其他操作)</th>
            </tr>
            <tr>
                <th width="15%">匹配天数</th>
                <th width="85%"><input name="jjppdays" value="<?php echo ($jjppdays); ?>" type="number" />天</th>
            </tr>
            <tr>
                <th width="15%">用户买入V币最多允许等待匹配单数</th>
                <th width="85%">
                    <input name="oneByone" value="<?php echo ($oneByone); ?>" type="number" />单&nbsp;&nbsp;(用户买入V币最多允许等待匹配单数，0表示无限制，1表示只能等待1单)
                </th>
            </tr>
			 <tr>
                <th width="15%">所有用户一天内买入V币最多允许数</th>
                <th width="85%">
                    <input name="allcanbuy" value="<?php echo ($allcanbuy); ?>" type="number" />&nbsp;&nbsp;
                </th>
            </tr>
            <tr>
                <th width="15%">用户买入V币配对之后最多允许等待交易单数</th>
                <th width="85%">
                    <input name="peidui" value="<?php echo ($peidui); ?>" type="number" />单&nbsp;&nbsp;(用户买入V币配对之后最多允许等待交易完成单数，0表示无限制，1表示只能等待1单)
                </th>
            </tr>
            <tr>
                <th width="15%">每天买入V币排单开始时间</th>
                <th width="85%"><input  name="paidan_time_start"  placeholder="请输入开始时间" value="<?php echo ($paidan_time_start); ?>">(格式：9:59,23:59,9:4不要输9:04)</th>
            </tr>
            <tr>
                <th width="15%">每天买入V币排单结束时间</th>
                <th width="85%"><input  name="paidan_time_end"  placeholder="请输入结束时间" value="<?php echo ($paidan_time_end); ?>">(格式：9:59,23:59,9:4不要输9:04)</th>
            </tr>
            <tr>
                <th width="15%">是否开启时间限制</th>
                <th width="85%">
                    <select name="time_limit">
                        <option <?php if($time_limit == 1): ?>selected<?php endif; ?> value="1">开启</option>
                        <option <?php if($time_limit == 0): ?>selected<?php endif; ?> value="0">关闭</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th width="15%">用户每天买入V币排单数量</th>
                <th width="85%"><input  name="paidan_num"  placeholder="用户每天排单数量" value="<?php echo ($paidan_num); ?>">单</th>
            </tr>
            <tr>
                <th width="15%">每天用户买入V币排单总额度</th>
                <th width="85%"><input  name="paidan_jbs"  placeholder="用户每天排单总额度" value="<?php echo ($paidan_jbs); ?>">元</th>
            </tr>
            <tr>
                <th width="15%">配对模式</th>
                <th width="85%">
					<select name="jjppms">
						<option <?php if($jjppms == 1): ?>selected<?php endif; ?> value="1">自动匹配</option>
						<option <?php if($jjppms == 0): ?>selected<?php endif; ?> value="0">手动匹配</option>
					</select>
				</th>
            </tr>

            <tr>
                <th width="15%">用户买入V币月投资额度封顶</th>
                <th width="85%"><input name="month_max" value="<?php echo ($month_max); ?>" type="number" />元</th>
            </tr>
            <tr>
                <th width="15%">直推奖</th>
                <th width="85%"><input name="jjtuijianrate" value="<?php echo ($jjtuijianrate); ?>" type="number" />%</th>
            </tr>
            <tr>
                <th width="15%">推荐奖</th>
                <th width="85%"><input name="jjtuijianratenew" value="<?php echo ($jjtuijianratenew); ?>" style="width:300px;" type="" />% 用,号分隔</th>
            </tr>
            <tr>
                <th width="15%">升级经理条件</th>
                <th width="85%">下线买入V币的金额达到<input name="xiaxian_jb" value="<?php echo ($xiaxian_jb); ?>" type="" />元的会员人数有<input name="xiaxian_num" value="<?php echo ($xiaxian_num); ?>" type="" />位 ，且自己买入V币的金额最少为<input name="my_jb" value="<?php echo ($my_jb); ?>" type="" />元</th>
            </tr>
            <tr>
                <th width="15%">经理代数奖</th>
                <th width="85%"><input name="jjjldsrate" value="<?php echo ($jjjldsrate); ?>" style="width:300px;" type="" />% 用,号分隔</th>
            </tr>
			<tr>
                <th width="15%">高级经理代数奖</th>
                <th width="85%"><input name="gjjldsrate" value="<?php echo ($gjjldsrate); ?>" style="width:300px;" type="" />% 用,号分隔</th>
            </tr>
			<tr>
                <th width="15%">总裁代数奖</th>
                <th width="85%"><input name="zcjldsrate" value="<?php echo ($zcjldsrate); ?>" style="width:300px;" type="" />% 用,号分隔</th>
            </tr>
              <tr>
                <th width="15%">是否必须经理才可以注册下线</th>
                <th width="85%">
                    <select name="iscan_reg">
                        <option <?php if($iscan_reg == 1): ?>selected<?php endif; ?> value="1">必须</option>
                        <option <?php if($iscan_reg == 0): ?>selected<?php endif; ?> value="0">不必</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th width="15%">开启会员级别奖励</th>
                <th width="85%">
					<select name="jjaccountflag">
						<option <?php if($jjaccountflag == 1): ?>selected<?php endif; ?> value="1">开启</option>
						<option <?php if($jjaccountflag == 0): ?>selected<?php endif; ?> value="0">关闭</option>
					</select>
				</th>
            </tr>
            <tr>
                <th width="15%">会员级别</th>
                <th width="85%"><input name="jjaccountlevel" value="<?php echo ($jjaccountlevel); ?>" style="width:300px;" type="" />用,号分隔 (从低到高)</th>
            </tr>
            <tr>
                <th width="15%">会员升级下线人数</th>
                <th width="85%"><input name="jjaccountnum" value="<?php echo ($jjaccountnum); ?>" style="width:300px;" type="" />用,号分隔 (从低到高)</th>
            </tr>

            <tr>
                <th width="15%">会员升级直推人数</th>
                <th width="85%"><input name="zhitui_num_level" value="<?php echo ($zhitui_num_level); ?>" style="width:300px;" type="" />用,号分隔 (从低到高)</th>
            </tr>

            <tr>
                <th width="15%">会员级别奖金比率</th>
                <th width="85%"><input name="jjaccountrate" value="<?php echo ($jjaccountrate); ?>" style="width:300px;" type="" />% 用,号分隔</th>
            </tr>
            <tr>
                <th width="15%">打款时间</th>
                <th width="85%"><input name="jjdktime" value="<?php echo ($jjdktime); ?>" type="number" />小时</th>
            </tr>
             <tr>
                <th width="15%">超时未打款冻结提示语</th>
                <th width="85%"><input name="jjhydjmsg" value="<?php echo ($jjhydjmsg); ?>" type="text" size="100"/></th>
            </tr>
             <tr>
                <th width="15%">超时未打款扣除上级金额</th>
                <th width="85%"><input name="jjhydjkcsjmoeney" value="<?php echo ($jjhydjkcsjmoeney); ?>" type="number" />元</th>
            </tr>

             <tr>
                <th width="15%">短信接口账号</th>
                <th width="85%"><input name="mobile_account" value="<?php echo ($mobile_account); ?>" type="text" /></th>
            </tr>

            <tr>
                <th width="15%">短信接口密码</th>
                <th width="85%"><input name="mobile_password" value="<?php echo ($mobile_password); ?>" type="text" /></th>
            </tr>


            <tr>
                <th></th>
                <th><input name="submit" value="提交" type="submit"/></th>
            </tr>
            </thead>
        </form>
    </table>

</div>
</body>
</html>