<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if gt IE 8]> <html class="ie gt-ie8 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
<head>


<script type="text/javascript" src="/bitStyle/js/jquery.js"></script>
<script type="text/javascript" src="/bitStyle/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/bitStyle/js/modernizr.js"></script>
<script type="text/javascript" src="/bitStyle/js/selectivizr.js"></script>
<script type="text/javascript" src="/bitStyle/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/bitStyle/js/scripts.js"></script>
<script type="text/javascript" src="/bitStyle/js/remaining.js"></script>
<script type="text/javascript" src="/bitStyle/js/fn_number_format.js"></script>
<script type="text/javascript" src="/bitStyle/js/9acba5c0d35076a1ccd574dfc21b8b2b.js"></script>
    <script type="text/javascript">
      var _gNow = new Date();
      
      setInterval(function(){
        $.ajax({
          url: '?aj=1&type=check_login',
          data: {'uid': 82662186},
          dataType: 'json',
          error: function(){},
          success: function(data){
            if(data.loggedout == '1'){
              window.location.href = "/bitStyle/zh-CN/";
            }
          }
        })
      }, 300000); //5min
    </script>
    

<script type="text/javascript">
jQuery(document).ready(function($){
  var gdBtn = $('#gdBtn');
  var pdBtn = $('#pdBtn');
  
  pdBtn.click(function(){
    $(this).toggleClass('active');
    gdBtn.removeClass('active');
    $('#pdWrap').stop(true, false).slideToggle('fast');
    $('#gdWrap').stop(true, false).slideUp('fast').removeClass('open');
    return false;
  });
  // if user status is freeze or just unblock and not yet do the maintain
  gdBtn.click(function(){
    $(this).toggleClass('active');
    pdBtn.removeClass('active');
    $('#gdWrap').stop(true, false).slideToggle('fast');
    $('#pdWrap').stop(true, false).slideUp('fast').removeClass('open');
    return false;
  });
    
  // Tooltips
  $('.tip').tooltip({placement: 'top'});
  $('.tipr').tooltip({placement: 'right'});
  $('.tipb').tooltip({placement: 'bottom'});
  $('.tipl').tooltip({placement: 'left'});
  
  $("a[href='#top']").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
  });
  
  var _server_time = new Date(),
        _server_time2 = new Date(),
        _local_time = new Date(),
        _local_time2 = new Date();
    _server_time2 = new Date(2016, 1-1, 14,
    11, 57, 19),
    _local_time = new Date(2016, 1-1, 14,
    11, 57, 19),
    _local_time2 = new Date(2016, 1-1, 14,
    11, 57, 19);
  
  _timer = setInterval(function(){
    var now = new Date();
    true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000);    //synchronize & increment 1 second
    second = _local_time.getTime() + 1000;
    elapsed = Math.round((second - _local_time2.getTime()) / 1000);
    if(elapsed < true_elapsed){
      diff = true_elapsed - elapsed;
      second += (diff * 1000);
    }
    _local_time.setTime(second);
    second = _server_time.getTime() + 1000;
    elapsed = Math.round((second - _server_time2.getTime()) / 1000);
    if(elapsed < true_elapsed){
      diff = true_elapsed - elapsed;
      second += (diff * 1000);
    }
    _server_time.setTime(second);
    
    //update server time
    date_text = padNumber(_server_time.getHours())+':'+padNumber(_server_time.getMinutes())+':'+padNumber(_server_time.getSeconds());
    date_text += ' ' + _server_time.getDate()+'/'+(_server_time.getMonth()+1)+'/'+_server_time.getFullYear();
    $('#server_time_text').html(date_text);
    //update local time
    date_text = padNumber(_local_time.getHours())+':'+padNumber(_local_time.getMinutes())+':'+padNumber(_local_time.getSeconds());
    date_text += ' ' + _local_time.getDate()+'/'+(_local_time.getMonth()+1)+'/'+_local_time.getFullYear();
    $('#local_time_text').html(date_text);
  }, 1000);
  
  /**
  * @param number An integer
  * @return Integer padded with a 0 if necessary
  */
  function padNumber(number) {
    return (number >= 0 && number < 10) ? '0' + number : number;
  }
});
</script>

<script type="text/javascript">
jQuery(document).ready(function($){
  var _allsecs = new Array();
  var _allsecs2 = new Array();
  var _i18n = {
    weeks: ['星期', '星期'],
    days: ['天', '天'],
    hours: ['小时', '小时'],
    minutes: ['分', '分'],
    seconds: ['秒', '秒']
  };
  $('.maintain_remain_time').each(function(){
    var _rid = $(this).attr('id');
    var _seconds = parseInt($(this).attr('rel'));
    if(_seconds > 0){
      $(this).html(
        remaining.getString(_seconds, _i18n, false)
      );
    }
    else{
      $(this).html('剩余0天');
    }
    _allsecs[_rid] = _seconds;
    _allsecs2[_rid] = _seconds;
  });
  timer = setInterval(function(){
    var now = new Date();
    true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000);    $('.maintain_remain_time').each(function(){
      var _rid = $(this).attr('id');
      if(typeof _allsecs[_rid] == 'undefined'){
        _allsecs[_rid] = parseInt($(this).attr('rel'));
      }
      _seconds = _allsecs[_rid];
      if(typeof _allsecs2[_rid] == 'undefined'){
        _allsecs2[_rid] = parseInt($(this).attr('rel'));
      }
      //synchronize
      _diff_sec = _allsecs2[_rid] - _seconds;
      if(_diff_sec < true_elapsed){
        _seconds = _allsecs2[_rid] - true_elapsed;
      }
      if(_seconds > 0){
        $(this).html(
          remaining.getString(_seconds, _i18n, false)
        );
        _allsecs[_rid] = --_seconds;
      }
      else{
        $("#too_many_user").hide();
        $("#login_btn").removeAttr("disabled");
        $(this).html('剩余0天');
      }
    });
  }, 1000);
});
</script>

<script type="text/javascript">

</script>

<script type="text/javascript">
jQuery(document).ready(function($){
  var pin_message = "此次执行需要{quantity}PIN。";
    $('#maintain_back_btn, #pd_back_btn, #gd_back_btn').click(function(){
    $('input[name=__req]').val('start'); //back to starting step
  });
  
  if("0"){
    $("#pd_pin").text(pin_message.replace("{quantity}", parseInt(0 / 0.5)));
  }else{
    $("#pd_pin").text(pin_message.replace("{quantity}", 1));
  }
  
  $("input[name=from_wallet]").change(function(){
    if($(this).val() == 'cwallet'){
      $("#minimum_amount").text("BTC0.50000000");
    }else{
      $("#minimum_amount").text("BTC0.50000000");
    }
  });
  
  $("#show_pd_amount").html(format_monetary_value(0));
  $("#show_gd_amount").html(format_monetary_value(0));
  
  $("#pd_amount").keyup(function(){
    $("#show_pd_amount").html(format_monetary_value($(this).val()));
    if($(this).val() > 0.5 && $(this).val() % 0.5 == 0){
      $("#pd_pin").text(pin_message.replace("{quantity}", $(this).val() / 0.5));
    }else{
      $("#pd_pin").text(pin_message.replace("{quantity}", 1));
    }
  });
  $("#gd_amount").keyup(function(){
    $("#show_gd_amount").html(format_monetary_value($(this).val()));
  });
  
  if(false){
    $("#recalc-ep-message").text("您的额外回酬已计算。请稍候片刻再尝试。");
    $("#recalc-ep-button").attr("disabled", "disabled");
    setTimeout(function(){
      $("#recalc-ep-button").removeAttr("disabled");
      $("#recalc-ep-message").text("");
    }, 0);
  }
  
  $("#recalc-ep-button").on("click", function(e){
    e.preventDefault();
    $("#recalc-ep-message").text("您的额外回酬已计算成功。如果想再计算，请稍候片刻再尝试。");
    $(this).attr("disabled", "disabled");
    $.ajax({
      url: '?aj=1&type=recalc_user_ep',
      data: {'uid': 82662186},
      type: 'post',
      dataType: 'json',
      error:function(data){
        console.log(data);
      },
      success: function(data){
        if(data.percent > 0){
          $("#current_ep").html(data.percent);
        }
      }
    });
    setTimeout(function(){
      $("#recalc-ep-button").removeAttr("disabled");
      $("#recalc-ep-message").text("");
    }, 1800000);
  });
});
</script>
<link rel="stylesheet" href="/bitStyle/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="/bitStyle/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="/bitStyle/css/main.v001.css" type="text/css" />
<link rel="stylesheet" href="/bitStyle/css/zh-CN.css" type="text/css" />
<link rel="stylesheet" href="/zTree_v3/css/zTreeStyle/zTreeStyle.css" type="text/css" />


<title>我的团队 </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />


<!-- Favicons -->
<link rel="shortcut icon" href="/bitStyle/favicon.ico" type="image/x-icon">



</head>
<body class="zh-CN " id="" >

  <header class="navbar navbar-static-top" id="top" role="header" style=" position:fixed; top:0px; width:100%; background:#555; color:#fff;border:0px;">
    <div>
      <div class="navbar-header" >
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
        data-target=".navbar-collapse">
          <span class="sr-only">
            Toggle navigation
          </span>
          <span class="icon-bar">
          </span>
          <span class="icon-bar">
          </span>
          <span class="icon-bar">
          </span>
        </button>
        <a href="/Home/Index/index.html" class="navbar-brand" >
          <img src="/bitStyle/images/logo_white.png" alt="">
        </a>
		   <div class="pull-left" id="userRank" style="margin-top:15px">
                        <span class="glyphicon glyphicon-user">
                        </span>
                       欢迎您： <?php echo ($userData['levelname']); ?> <span style=" color:red"><?php echo ($userData['ue_account']); ?></span> ，   <a href="/Home/Reg/logout.html" style="font-size:16px;color:#FAC847; font-weight:bold;">退出</a>                   </div>
      </div>

	  
	  
	  	  
	  <style>
	  .navbar-nav li a{ color:#fff;}
	  </style>
	  
	  
      <nav class="collapse navbar-collapse" role="main-navigation" id="">
      <ul class="nav navbar-nav">
        <li >
          <a href="/" class="glyphicons home" ><i></i>桌面</a>
        </li>
		
		   <li >
          <a href="/Home/Myuser/index.html" class="glyphicons home" ><i></i>参与者</a>
        </li>



        <li   ><a href="/Home/Info/index.html" class="glyphicons user" ><i></i>我的页面</a></li>
      
  
  <li ><a href="/Home/Info/rwhistory.html">静态收益记录</a></li>
              <li ><a href="/Home/Info/cwhistory.html">经理奖记录</a></li>
              <li ><a href="/Home/Info/nwhistory.html">直推奖记录</a></li>
             
              <li ><a href="/Home/Info/pin.html">激活码管理</a></li>
			 
				
				
        

                    
          

          <li >
            <a href="/Home/Index/news.html" class="glyphicons home" ><i></i>公告<span class="badge"></span></a>
          </li>
		  
		    <li >
            <a href="/Home/Index/messageInbox.html" class="glyphicons home" ><i></i>信箱<span class="badge"></span></a>
          </li>
		  
 <li >
            <a href="/Home/Index/reg.html" class="glyphicons home" ><i></i>注册会员<span class="badge"></span></a>
          </li>

       
          
        
          
          
          
              </ul>
    </nav>
	
	
	
	
	
      
       
    </div>

				  
				  
  </header>
  <script src="/cssmmm/jquery.countdown.js"></script>
<script type="text/javascript">
$(document).ready(function() {

//$(".top-button").click(function (e) {
//    e.stopPropagation();
//    $(".dropdown-menu").hide();
//    $(this).next().show();

//});

//$(".navbar-collapse").on('click', function(e){
  //e.stopPropagation();
//})
//$("body").on('click', function(e){
  //if ($(".navbar-collapse").hasClass("in")) {
    //$(".navbar-collapse").collapse('hide');
  //}
//})


//$(document).click(function (e) {
//    $(".dropdown-menu").hide();
//});



  
});
</script>




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

var zNodes =[
  { id:1, pId:0, name:"父節點1 - 展開", open:true},
  { id:11, pId:1, name:"父節點11 - 摺疊"},
  { id:111, pId:11, name:"葉子節點111"},
  { id:112, pId:11, name:"葉子節點112"},
  { id:113, pId:11, name:"葉子節點113"},
  { id:114, pId:11, name:"葉子節點114"},
  { id:12, pId:1, name:"父節點12 - 摺疊"},
  { id:121, pId:12, name:"葉子節點121"},
  { id:122, pId:12, name:"葉子節點122"},
  { id:123, pId:12, name:"葉子節點123"},
  { id:124, pId:12, name:"葉子節點124"},
  { id:13, pId:1, name:"父節點13 - 沒有子節點", isParent:true},
  { id:2, pId:0, name:"父節點2 - 摺疊"},
  { id:21, pId:2, name:"父節點21 - 展開", open:true},
  { id:211, pId:21, name:"葉子節點211"},
  { id:212, pId:21, name:"葉子節點212"},
  { id:213, pId:21, name:"葉子節點213"},
  { id:214, pId:21, name:"葉子節點214"},
  { id:22, pId:2, name:"父節點22 - 摺疊"},
  { id:221, pId:22, name:"葉子節點221"},
  { id:222, pId:22, name:"葉子節點222"},
  { id:223, pId:22, name:"葉子節點223"},
  { id:224, pId:22, name:"葉子節點224"},
  { id:23, pId:2, name:"父節點23 - 摺疊"},
  { id:231, pId:23, name:"葉子節點231"},
  { id:232, pId:23, name:"葉子節點232"},
  { id:233, pId:23, name:"葉子節點233"},
  { id:234, pId:23, name:"葉子節點234"},
  { id:3, pId:0, name:"父節點3 - 沒有子節點", isParent:true}
];


$(document).ready(function(){
    var $user = "<?php echo ($userData['ue_account']); ?>";
      $.ajax({
          type: "post",
          dataType : "json",
          global : false,

          url : "/index.php/Home/Common/getTree",
          data : {
          user : $user
          },
          success : function(data, textStatus) {
            if (data.status == 0)
            {
            //alert(data.nr);
            
              zNodes1 = data.data;
              $.fn.zTree.init($("#treeDemo"), setting, zNodes1);
            } else {
              alert(data.data);
            }
            
            return ;
          }
          
        });


   $('#btn').click(function(){

    var $user = $('#user').val();
    $.ajax({
        type: "post",
        dataType : "json",
        global : false,

        url : "/index.php/Home/Common/getTreeso",
        data : {
        user : $user
        },
        success : function(data, textStatus) {
          if (data.status == 0)
          {
          //alert(data.nr);
          
            zNodes1 = data.data;
            $.fn.zTree.init($("#treeDemo"), setting, zNodes1);
          } else {
            alert(data.data);
          }
          
          return ;
        }
        
      });
  });



});



$(function(){





var $user = "<?php echo ($userData['ue_account']); ?>";
$.ajax({
    type: "post",
    dataType : "json",
    global : false,

    url : "/index.php/Home/Common/getMyTreeso",
    data : {
    user : $user
    },
    success : function(data, textStatus) {
      if (data.status == 0)
      {
      //alert(data.nr);
      
        zNodes1 = data.data;
        $.fn.zTree.init($("#treeDemo"), setting, zNodes1);
      } else {
        alert(data.data);
      }
      
      return ;
    }
    
  });

});




</script>





























      <div class="row" style=" margin:0px auto; padding-top:60px; ">
        <div class="col-md-12" >
          <div class="widget">
           
            <div class="widget-body innerAll overthrow">
              <table class="table table-bordered table-primary">
                <thead>
                  <tr class="tac">
                    <th   style="background:#555; color:#fff">编号</th>
                    <th style="background:#555; color:#fff">昵称</th>
                    <th style="background:#555; color:#fff"> 级别</th>
                    <th style="background:#555; color:#fff">帐号</th>
                    <th style="background:#555; color:#fff">推荐人</th>
                    <th style="background:#555; color:#fff">注册人</th>
                    <th style="background:#555; color:#fff">加入时间</th>
                  </tr>
                </thead>
                <tbody>                
                                  
            
                  <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr role="row" class="odd">
                  <td class="sorting_1"><?php echo ($v["ue_id"]); ?></td>
                  <td><?php echo ($v["ue_theme"]); ?></td>
                  <td>VIP会员</td>
                  <td><?php echo ($v["ue_account"]); ?></td>
                  <td><?php echo ($v["ue_accname"]); ?></td>
                  <td><?php echo ($v["zcr"]); ?></td>
                  <td><?php echo ($v["ue_regtime"]); ?></td>
                  </tr><?php endforeach; endif; ?>
              </tbody>
                      </table>
                      <div class="dataTables_info" id="example_info" role="status" aria-live="polite"><?php echo ($page); ?></div>
					  
					  
<div class="formbody">
    
    <div class="core_con">
  <div style="font-size:9pt;"><form action="" method="get"><input name="user1" id="user1"  type="hidden" value="<?php echo ($user); ?>" />我的家谱 : <input id="user" name="user" type="text"> <input name="" type="button" id="btn" value="搜索" class="btn btn-info btn-sm">
  <span id="daishu"></span></form></div>
    <div class="content_wrap">
  <div class="zTreeDemoBackground ">
    <ul id="treeDemo" class="ztree"></ul>
  </div>
  <!-- <div class="right">
    <ul class="info">
      <li class="title"><h2>1、setting 配置信息說明</h2>
        <ul class="list">
        <li class="highlight_red">是否顯示連接線請設置 setting.view.showLine 屬性，詳細請參見 API 文檔中的相關內容</li>
        </ul>
      </li>
      <li class="title"><h2>2、treeNode 節點數據說明</h2>
        <ul class="list">
        <li>是否顯示連線，不需要 treeNode 節點數據提供特殊設置</li>
        </ul>
      </li>
    </ul>
  </div> -->
</div>





              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>