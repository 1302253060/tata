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
    12, 19, 23),
    _local_time = new Date(2016, 1-1, 14,
    12, 19, 23),
    _local_time2 = new Date(2016, 1-1, 14,
    12, 19, 23);
  
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


<title>我团队的提供与接受 </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />


<!-- Favicons -->
<link rel="shortcut icon" href="/bitStyle/favicon.ico" type="image/x-icon">



</head>
<body class="zh-CN " id="">


  <header class="navbar navbar-static-top" id="top" role="header">
    <div class="container">
      <div class="navbar-header" style="background-color: #000000;">
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
        <a href="/Home/Index/index.html" class="navbar-brand">
          <img src="/bitStyle/images/logo_white.png" alt="">
        </a>
      </div>

      <div style="padding-top:10px;" class="form-group col-md-6">
        <label style="padding-top:5px;" class="col-xs-4 col-md-2 col-sm-3 control-label">推广链接:</label>
        <div class="col-xs-6 col-md-7"><input type="text" style="max-width:300px;display:inline-block;color: #999;" value="<?php echo ($tgurl); ?>" class="form-control" id="copy-num"></div>
        <button class="btn btn-sm" type="button" onClick="jsCopy()">复制</button>
      </div>
      
      <ul class="nav navbar-nav navbar-right" role="sub-navigation">
        <li class="dropdown" id="lang_nav">
          <a href="/" class="" data-toggle="dropdown">
            <span class="language-sel-zh-CN fa-lang">
            </span>
            <span class="language-text hidden-xs">
              简体中文
            </span>
          </a>
          <ul class="dropdown-menu language-box allbox-shadow" role="languageMenu">
              <li>
              <a href="/Home/Index/index.html">
                <span class="language-sel-zh-CN">
                </span>
                简体中文
              </a>
            </li>
             <li>
              <a href="/Home/Index/english.html">
                <span class="language-sel-en">
                </span>
                English
              </a>
            </li>  
             <li>
              <a href="/Home/Index/korea.html">
                <span class="language-sel-ko-KR">
                </span>
                 한국어
              </a>
            </li>           
          </ul>
        </li>
        <li class="dropdown" id="wallet_nav">
          <a href="#" class="" data-toggle="dropdown">
            <span class="glyphicon glyphicon-usd">
            </span>
            <span class="hidden-xs">
              我的钱包
            </span>
          </a>
          <ul class="walletNav dropdown-menu allbox-shadow clearfix">
            <li class="clearfix"><a href="/Home/Index/index.html" style="color:#7C7C7C;">
              <img src="/bitStyle/images/e-wallet.png" alt="" class="img">
              <span class="wallet">
                
                  总钱包
                <br>
                <strong class="wallet-color">
                <?php echo ($userData["ue_money"]); ?>RMB
                </strong>
              </span></a>
            </li>
            <li class="clearfix"><a href="/Home/Index/jingli.html" style="color:#7C7C7C;">
              <img src="/bitStyle/images/r-wallet.png" alt="" class="img">
              <span class="wallet">
                经理奖钱包
                <br>
                <strong class="wallet-color">
                  0RMB
                </strong>
              </span></a>
            </li>
            <li class="clearfix"><a href="/Home/Index/tuijian.html" style="color:#7C7C7C;">
              <img src="/bitStyle/images/n-wallet.png" alt="" class="img">
              <span class="wallet">
                推荐奖钱包
                <br>
                <strong class="wallet-color">
                 <?php echo ($userData["jl_he"]); ?>RMB
                </strong>
              </span></a>
            </li>
            <li class="clearfix"><a href="/Home/Info/pin.html" style="color:#7C7C7C;">
              <img src="/bitStyle/images/i-wallet.png" alt="" class="img">
              <span class="wallet">
               PIN数量
                <br>
                <strong class="wallet-color">
               <?php echo ($pin_zs); ?>                </strong>
              </span></a>
            </li>
          </ul>
        </li>
        <li class="dropdown" id="profile_nav">
          <a href="" class="top-button" data-toggle="dropdown">
            <span class="glyphicon glyphicon-user top-button">
            </span>
            <span class="hidden-xs">
              我的档案
            </span>
          </a>
          <ul class="dropdown-menu allbox-shadow pull-right" id="user-details">
            <li class="clearfix">
              <span class="details">
                编号
              </span>
              <span class="count">
                <?php echo (substr(md5($userData['ue_id']),0,10)); ?>              </span>
            </li>
            <li class="clearfix">
              <span class="details">
                账号
              </span>
              <span class="count">
                <?php echo ($userData['ue_account']); ?>              </span>
            </li>
            <li class="clearfix">
              <span class="details">
                手机号
              </span>
              <span class="count">
               <?php echo ($userData['ue_phone']); ?>           </span>
            </li>
            <li class="clearfix">
              <span class="details">
                钱包
              </span>
              <span class="count">
                
                    <?php echo ($userData['ue_money']); ?>              
                <script data-cfhash='f9e31' type="text/javascript">
                  function jsCopy(){
                    var e=document.getElementById("copy-num");//对象是copy-num1
                    e.select(); //选择对象
                    document.execCommand("Copy"); //执行浏览器复制命令
                    alert("复制成功");
                }
                  /* <![CDATA[ */
                  !
                  function() {
                    try {
                      var t = "currentScript" in document ? document.currentScript: function() {
                        for (var t = document.getElementsByTagName("script"), e = t.length; e--;) if (t[e].getAttribute("data-cfhash")) return t[e]
                      } ();
                      if (t && t.previousSibling) {
                        var e, r, n, i, c = t.previousSibling,
                        a = c.getAttribute("data-cfemail");
                        if (a) {
                          for (e = "", r = parseInt(a.substr(0, 2), 16), n = 2; a.length - n; n += 2) i = parseInt(a.substr(n, 2), 16) ^ r,
                          e += String.fromCharCode(i);
                          e = document.createTextNode(e),
                          c.parentNode.replaceChild(e, c)
                        }
                        t.parentNode.removeChild(t);
                      }
                    } catch(u) {}
                  } ()
                  /* ]]> */
                  
                </script>
              </span>
            </li>
          </ul>
        </li>
        <li>
          <a href="/Home/Index/messageInbox.html">
            <span class="glyphicon glyphicon-envelope">
            </span>
            <span class="hidden-xs">
              信息
            </span>
          </a>
        </li>
        <li>
          <a href="/Home/Reg/logout.html">
            <span class="hidden-xs">
              退出
            </span>
            <span class="glyphicon glyphicon-share-alt">
            </span>
          </a>
        </li>
      </ul>
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






<div id="wrapper">
    <div class="page-title" style="background: #E9BC07;">
  <div class="container" >
    <h3 class="title col-md-3" >众联环球（中国）首页</h3>

 
      <nav class="collapse navbar-collapse" role="main-navigation" id="">
      <ul class="nav navbar-nav">
        <li >
          <a href="/" class="glyphicons home" ><i></i>首页</a>
        </li>

        <li   ><a href="/Home/Info/index.html" class="glyphicons user" ><i></i>管理档案</a></li>
      
      <li  class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >帐户管理 <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">                          
                            <li ><a href="/Home/Info/pintopin.html">激活码管理</a></li>
                            
              <li ><a href="/Home/Myuser/index.html">我的团队</a></li>
              <li ><a href="/Home/Myuser/xzzh.html">提供与得到记录</a></li>
                          </ul>
          </li>


          <li  class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >交易记录 <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu" >
              <li ><a href="/Home/Info/pdhistory.html">提供帮助记录</a></li>
              <li ><a href="/Home/Info/gdhistory.html">接受帮助记录</a></li>
              <li ><a href="/Home/Info/rwhistory.html">提供帮助交易记录</a></li>
              <li ><a href="/Home/Info/cwhistory.html">经理奖钱包记录</a></li>
              <li ><a href="/Home/Info/nwhistory.html">推荐钱包记录</a></li>
              <li ><a href="/Home/Info/pin.html">激活码交易记录</a></li>
            </ul>
          </li>


                    
          

          <li >
            <a href="/Home/Index/news.html" class="glyphicons home" ><i></i>新闻<span class="badge"></span></a>
          </li>


          <li    >
            <a href="/Home/Index/reg.html" class="glyphicons home" ><i></i>注册会员<span class="badge"></span></a>
          </li>      

          
        
          
          
          
              </ul>
    </nav>
  </div>
</div>
                  <div class="clockWrap">
                    <div class="container clearfix">
                      <div class="pull-left" id="userRank">
                        <span class="glyphicon glyphicon-user">
                        </span>
                        级别 : <?php echo ($userData['levelname']); ?>                      </div>
                      <div class="clock-location">
                        <strong class="mr5">
                          服务器时间
                        </strong>
                        <span id="server_time_text">
                           2016-03-11 14:12:56                        </span>
                      </div>
                      <div class="clock-location">
                        <strong class="mr5">
                          当地时间
                        </strong>
                        <span id="local_time_text">
                         
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="container">
                    <div class="innerContent">
                      <div id="donationWrap">
                        <div class="row">
                          <div class="col-sm-6">
                            <a class="btn btn-block " id="pdBtn">
                              <span class="p-donation">
                                提供帮助
                              </span>
                            </a>
                          </div>
                          <div class="col-sm-6">
                            <a class="btn btn-block " id="gdBtn">
                              <span class="g-donation">
                                获得收益
                              </span>
                            </a>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12" id="pdWrap" style="">
                            <div class="widget widget-body-white">
                              <form method="post" action="/Home/Index/tgbzcl" name="buy_share_form"
                              class="form-horizontal margin-none" id="provide_help">
                                <div class="widget-head widget-head-blue">
                                  <h4 class="heading">
                                    提供帮助
                                  </h4>
                                </div>
                                <div class="widget-body">
                                  <div class="form-group">
                                    <p class="help-block apply_tip">
                                      申请完成后，请等待系统1-30日随机分配受善需求
                                    </p>
                                    <label class="col-md-3 control-label">
                                      支付方式
                                    </label>
                                    <div class="col-md-9">
                                      <label>
                                        <input type="checkbox" value="1" class="ckbox" name="zffs1" checked="">
                                        银行支付

                                      </label>
                                      <label>
                                        <input type="checkbox" value="1" class="ckbox" name="zffs2" checked="">
                                        支付宝支付
                                      </label>
                                      <label>
                                        <input type="checkbox" value="1" class="ckbox" name="zffs3" checked="">
                                        微信支付
                                      </label>
                                      
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">
                                      提供帮助金额
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" class="form-control get_amount" placeholder="输入500-2000"
                                      name="amount" id="amount" autocomplete="off" required>
                                      <p class="help-block">
                                        目前，每月增长50%-300%
                                      </p>
                                      <p class="help-block">
                                        警告，我已完全了解所有风险。我决定参与众联环球（中国）,尊重众联环球（中国）文化与传统。
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <footer class="data-footer innerAll half text-right clearfix">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">
                                    取消
                                  </button>
                                  <!-- <button type="button" class="btn_next btn-warning btn-sm" data-dismiss="modal"
                                  data-toggle="modal" data-target="#myModal2">提供帮助</button>-->
                                  <input name="jhwjjc" id="jhwjjc" type="submit" class="btn_next btn-warning btn-sm btn btn-primary "
                                  value="提供帮助">
                                </footer>
                              </form>
                            </div>
                          </div>
                          <div class="col-md-12" id="gdWrap" style="">
                            <div class="widget widget-body-white">
                              <form action="/Home/Index/jsbzcl" method="post" name="wallet_transfer_form"
                              class="form-horizontal margin-none" id="get_help">
                                <input type="hidden" value="" id="wallet_type" name="wallet_type">
                                <fieldset>
                                  <div class="widget-head widget-head-blue">
                                    <h4 class="heading">
                                      接受帮助
                                    </h4>
                                  </div>
                                  <div class="widget-body">
                                    <div class="form-group">
                                      <label class="col-md-3 control-label">
                                        支付方式
                                      </label>
                                      <div class="col-md-9">
                                        <label>
                                          <input type="checkbox" value="1" class="ckbox2" name="zffs1" checked="">
                                          银行支付
                                        </label>
                                        <label>
                                          <input type="checkbox" value="1" class="ckbox2" name="zffs2" checked="">
                                          支付宝支付
                                        </label>
                                        <label>
                                          <input type="checkbox" value="1" class="ckbox2" name="zffs3" checked="">
                                          微信支付
                                        </label>                                        
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-md-3 control-label">
                                        接受帮助总额:
                                        <span class="ast">
                                          *
                                        </span>
                                      </label>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control get_amount" placeholder="输入RMB200起,至100000,且为500的倍数"
                                        name="get_amount" autocomplete="off" required>
                                        <p class="help-block">
                                          您现有可出售余额： 0RMB
                                        </p>
                                        <p class="help-block">
                                          您最低出售数量 500RMB
                                        </p>
                                        <p class="help-block">
                                          警告，我已完全了解所有风险。我决定参与众联环球（中国）,尊重众联环球（中国）文化与传统。
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="data-footer innerAll half text-right clearfix">
                                    <button value="继续" id="withdraw_btn" type="submit" class="btn btn-primary btn-sm">
                                      接受帮助
                                    </button>
                                  </div>
                                </fieldset>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-head clearfix">
                <h4 class="heading">家族的买入V币</h4>
              </div>
              <div class="widget-body innerAll overthrow">
                <table class="table table-bordered table-primary">
                  <thead>
                    <tr class="tac">
                      <th>编号</th>
                      <th>金额</th>
                      <th>下单时间</th>
                      <th>下单天数</th>
                      <th>推荐人</th>
                      <th>用户</th>
                      <th>手机号</th>
                      <th>状态</th>
                      <th>交易状态</th>
                    </tr>
                  </thead>
                  <thbody>
                  <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr role="row" class="odd">
                      <td class="sorting_1">P<?php echo ($aab=$v["id"]); ?></td>
                                 <td><?php echo ($v["jb"]); ?></td>
                                 <td><?php echo ($v["date"]); ?></td>
                                 <td><?php echo (user_jj_tx($aab,$ztrs)); ?></td>
                                 <td><?php echo ($v["user_tjr"]); ?></td>
                                 <td><?php echo ($v["user"]); ?></td>
                                <td><?php echo (user_jj_sj($aab,$ztrs1)); ?></td>
                                <td>
                                                                <span style="color:red"><?php if($v["zt"] == 0): ?>等待中<?php endif; ?>
                                <?php if($v["zt"] == 1): ?>匹配成功<?php endif; ?></span>                         </td>
                                <td><?php if($v["qr_zt"] == 0): ?>未确认<?php endif; ?>
                                <?php if($v["qr_zt"] == 1): ?>已确认<?php endif; ?></td>
                      </tr><?php endforeach; endif; ?>
                    </tbody>
                  </table>
                  <div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><?php echo ($page); ?></div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        
      <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-head clearfix">
                <h4 class="heading">家族的卖出V币</h4>
              </div>
              <div class="widget-body innerAll overthrow">
                <table class="table table-bordered table-primary">
                  <thead>
                    <tr class="tac">
                      <th>编号</th>
                      <th>金额</th>
                      <th>下单时间</th>
                      <th>下单天数</th>
                      <th>用户</th>
                      <th>手机号</th>
                      <th>状态</th>
                      <th>交易状态</th>
                    </tr>
                  </thead>
                  <thbody>
                  <?php if(is_array($list1)): foreach($list1 as $key=>$b): ?><tr role="row" class="odd">
                      <td class="sorting_1">G<?php echo ($aab=$b["id"]); ?></td>
                       <td><?php echo ($b["jb"]); ?></td>
                       <td><?php echo ($b["date"]); ?></td>
                       <td><?php echo (user_jj_tx1($aab,$ztrs)); ?></td>
                      <td><?php echo ($b["user"]); ?></td>
                      <td><?php echo (user_jj_sj1($aab,$ztrs1)); ?></td>
                      <td>
                      <span style="color:red"><?php if($b["zt"] == 0): ?>等待中<?php endif; ?>
                      <?php if($b["zt"] == 1): ?>匹配成功<?php endif; ?></span>                         </td>
                      <td><?php if($b["qr_zt"] == 0): ?>未确认<?php endif; ?>
                      <?php if($b["qr_zt"] == 1): ?>已确认<?php endif; ?></td>
                      </tr><?php endforeach; endif; ?>
                 
                 
                 
                 </tbody>
              </table>
                 <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><?php echo ($page1); ?></div>
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