<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]>
  <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full sidebar sidebar-full sticky-sidebar">
  <![endif]-->
  <!--[if IE 7]>
    <html class="ie lt-ie9 lt-ie8 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar">
    <![endif]-->
    <!--[if IE 8]>
      <html class="ie lt-ie9 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar">
      <![endif]-->
      <!--[if gt IE 8]>
        <html class="ie gt-ie8 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar">
        <![endif]-->
        <!--[if !IE]><!-->
          <html>
            <!-- <![endif]-->
            
            <head>
              <script type="text/javascript" src="/bitStyle/js/jquery.js">
              </script>
              <script type="text/javascript" src="/bitStyle/js/bootstrap.min.js">
              </script>
              <script type="text/javascript" src="/bitStyle/js/modernizr.js">
              </script>
              <script type="text/javascript" src="/bitStyle/js/selectivizr.js">
              </script>
              <script type="text/javascript" src="/bitStyle//js/jquery.cookie.js">
              </script>
              <script type="text/javascript" src="/bitStyle/js/scripts.js">
              </script>
              <script type="text/javascript" src="/bitStyle/js/remaining.js">
              </script>
              <script type="text/javascript" src="/bitStyle/js/fn_number_format.js">
              </script>
              <script type="text/javascript" src="/bitStyle/js/9acba5c0d35076a1ccd574dfc21b8b2b.js">
              </script>
              <script type="text/javascript">
                var _gNow = new Date();

                setInterval(function() {
                  $.ajax({
                    url: '?aj=1&type=check_login',
                    data: {
                      'uid': 82662186
                    },
                    dataType: 'json',
                    error: function() {},
                    success: function(data) {
                      if (data.loggedout == '1') {
                        window.location.href = "/bitStyle/zh-CN/";
                      }
                    }
                  })
                },
                300000); //5min
                
              </script>
              <script type="text/javascript">
                jQuery(document).ready(function($) {
                  // prompt user a box to pd after completed a gd
                  if (0) {
                    // $('#prompt-repd').modal('show');
                  }
                  $('#prompt-repd').on('click', '#click-pd',
                  function(e) {
                    e.preventDefault();
                    $("#pdBtn").trigger("click");
                    $('#prompt-repd').modal('hide');
                  });

                  $("#load_expected_bonus").click(function() {
                    $("#expected_bonus_list").html('<img src="/bitStyle/images/loader2.gif"/>');
                    $("#expected_bonus_list").load("?uid=" + 82662186);
                  });
                });
              </script>
              <script type="text/javascript">
                jQuery(document).ready(function($) {
                  var gdBtn = $('#gdBtn');
                  var pdBtn = $('#pdBtn');

                  pdBtn.click(function() {
                    $(this).toggleClass('active');
                    gdBtn.removeClass('active');
                    $('#pdWrap').stop(true, false).slideToggle('fast');
                    $('#gdWrap').stop(true, false).slideUp('fast').removeClass('open');
                    return false;
                  });
                  // if user status is freeze or just unblock and not yet do the maintain
                  gdBtn.click(function() {
                    $(this).toggleClass('active');
                    pdBtn.removeClass('active');
                    $('#gdWrap').stop(true, false).slideToggle('fast');
                    $('#pdWrap').stop(true, false).slideUp('fast').removeClass('open');
                    return false;
                  });

                  // Tooltips
                  $('.tip').tooltip({
                    placement: 'top'
                  });
                  $('.tipr').tooltip({
                    placement: 'right'
                  });
                  $('.tipb').tooltip({
                    placement: 'bottom'
                  });
                  $('.tipl').tooltip({
                    placement: 'left'
                  });

                  $("a[href='#top']").click(function() {
                    $("html, body").animate({
                      scrollTop: 0
                    },
                    "slow");
                    return false;
                  });

                  var _server_time = new Date(),
        _server_time2 = new Date(),
        _local_time = new Date(),
        _local_time2 = new Date();
                  _server_time2 = new Date(),
                  _local_time = new Date(),
                  _local_time2 = new Date();

                  _timer = setInterval(function() {
                    var now = new Date();
                    true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000); //synchronize & increment 1 second
                    second = _local_time.getTime() + 1000;
                    elapsed = Math.round((second - _local_time2.getTime()) / 1000);
                    if (elapsed < true_elapsed) {
                      diff = true_elapsed - elapsed;
                      second += (diff * 1000);
                    }
                    _local_time.setTime(second);
                    second = _server_time.getTime() + 1000;
                    elapsed = Math.round((second - _server_time2.getTime()) / 1000);
                    if (elapsed < true_elapsed) {
                      diff = true_elapsed - elapsed;
                      second += (diff * 1000);
                    }
                    _server_time.setTime(second);

                    //update server time
                    date_text = padNumber(_server_time.getHours()) + ':' + padNumber(_server_time.getMinutes()) + ':' + padNumber(_server_time.getSeconds());
                    date_text += ' ' + _server_time.getDate() + '/' + (_server_time.getMonth() + 1) + '/' + _server_time.getFullYear();
                    $('#server_time_text').html(date_text);
                    //update local time
                    date_text = padNumber(_local_time.getHours()) + ':' + padNumber(_local_time.getMinutes()) + ':' + padNumber(_local_time.getSeconds());
                    date_text += ' ' + _local_time.getDate() + '/' + (_local_time.getMonth() + 1) + '/' + _local_time.getFullYear();
                    $('#local_time_text').html(date_text);
                  },
                  1000);

                  /**
    * @param number An integer
    * @return Integer padded with a 0 if necessary
    */
                  function padNumber(number) {
                    return (number >= 0 && number < 10) ? '0' + number: number;
                  }
                });
              </script>
              <script type="text/javascript">
                jQuery(document).ready(function($) {
                  var _allsecs = new Array();
                  var _allsecs2 = new Array();
                  var _i18n = {
                    weeks: ['星期', '星期'],
                    days: ['天', '天'],
                    hours: ['小时', '小时'],
                    minutes: ['分', '分'],
                    seconds: ['秒', '秒']
                  };
                  $('.maintain_remain_time').each(function() {
                    var _rid = $(this).attr('id');
                    var _seconds = parseInt($(this).attr('rel'));
                    if (_seconds > 0) {
                      $(this).html(remaining.getString(_seconds, _i18n, false));
                    } else {
                      $(this).html('剩余0天');
                    }
                    _allsecs[_rid] = _seconds;
                    _allsecs2[_rid] = _seconds;
                  });
                  timer = setInterval(function() {
                    var now = new Date();
                    true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000);
                    $('.maintain_remain_time').each(function() {
                      var _rid = $(this).attr('id');
                      if (typeof _allsecs[_rid] == 'undefined') {
                        _allsecs[_rid] = parseInt($(this).attr('rel'));
                      }
                      _seconds = _allsecs[_rid];
                      if (typeof _allsecs2[_rid] == 'undefined') {
                        _allsecs2[_rid] = parseInt($(this).attr('rel'));
                      }
                      //synchronize
                      _diff_sec = _allsecs2[_rid] - _seconds;
                      if (_diff_sec < true_elapsed) {
                        _seconds = _allsecs2[_rid] - true_elapsed;
                      }
                      if (_seconds > 0) {
                        $(this).html(remaining.getString(_seconds, _i18n, false));
                        _allsecs[_rid] = --_seconds;
                      } else {
                        $("#too_many_user").hide();
                        $("#login_btn").removeAttr("disabled");
                        $(this).html('剩余0天');
                      }
                    });
                  },
                  1000);
                });
              </script>
              <script type="text/javascript">
              </script>
              <script type="text/javascript">
                jQuery(document).ready(function($) {
                  var pin_message = "此次执行需要{quantity}PIN。";
                  $('#maintain_back_btn, #pd_back_btn, #gd_back_btn').click(function() {
                    $('input[name=__req]').val('start'); //back to starting step
                  });

                  if ("0") {
                    $("#pd_pin").text(pin_message.replace("{quantity}", parseInt(0 / 0.5)));
                  } else {
                    $("#pd_pin").text(pin_message.replace("{quantity}", 1));
                  }

                  $("input[name=from_wallet]").change(function() {
                    if ($(this).val() == 'cwallet') {
                      $("#minimum_amount").text("BTC0.50000000");
                    } else {
                      $("#minimum_amount").text("BTC0.50000000");
                    }
                  });

                  $("#show_pd_amount").html(format_monetary_value(0));
                  $("#show_gd_amount").html(format_monetary_value(0));

                  $("#pd_amount").keyup(function() {
                    $("#show_pd_amount").html(format_monetary_value($(this).val()));
                    if ($(this).val() > 0.5 && $(this).val() % 0.5 == 0) {
                      $("#pd_pin").text(pin_message.replace("{quantity}", $(this).val() / 0.5));
                    } else {
                      $("#pd_pin").text(pin_message.replace("{quantity}", 1));
                    }
                  });
                  $("#gd_amount").keyup(function() {
                    $("#show_gd_amount").html(format_monetary_value($(this).val()));
                  });

                  if (false) {
                    $("#recalc-ep-message").text("您的额外回酬已计算。请稍候片刻再尝试。");
                    $("#recalc-ep-button").attr("disabled", "disabled");
                    setTimeout(function() {
                      $("#recalc-ep-button").removeAttr("disabled");
                      $("#recalc-ep-message").text("");
                    },
                    0);
                  }

                  $("#recalc-ep-button").on("click",
                  function(e) {
                    e.preventDefault();
                    $("#recalc-ep-message").text("您的额外回酬已计算成功。如果想再计算，请稍候片刻再尝试。");
                    $(this).attr("disabled", "disabled");
                    $.ajax({
                      url: '?aj=1&type=recalc_user_ep',
                      data: {
                        'uid': 82662186
                      },
                      type: 'post',
                      dataType: 'json',
                      error: function(data) {
                        console.log(data);
                      },
                      success: function(data) {
                        if (data.percent > 0) {
                          $("#current_ep").html(data.percent);
                        }
                      }
                    });
                    setTimeout(function() {
                      $("#recalc-ep-button").removeAttr("disabled");
                      $("#recalc-ep-message").text("");
                    },
                    1800000);
                  });
                });
              </script>
              <script>
              </script>
              <link rel="stylesheet" href="/bitStyle/css/bootstrap.min.css" type="text/css"
              />
              <link rel="stylesheet" href="/bitStyle/css/font-awesome.min.css" type="text/css"
              />
              <link rel="stylesheet" href="/bitStyle/css/main.v001.css" type="text/css"
              />
              <link rel="stylesheet" href="/bitStyle/css/zh-CN.css" type="text/css"
              />
              <link rel="stylesheet" href="/bitStyle/css/fileupload.css" type="text/css"
              />
              <link rel="stylesheet" href="/bitStyle/css/style.css" type="text/css"
              />

              <style>

              body{
                font-size: 14px;
              }
              </style>
              <title>
                云致富万众普惠社区首页 
              </title>
              <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
              <meta name="apple-mobile-web-app-capable" content="yes">
              <meta name="apple-mobile-web-app-status-bar-style" content="black">
              <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"
              />
              <!-- Favicons -->
              <link rel="shortcut icon" href="/bitStyle/favicon.ico" type="image/x-icon">
              
            </head>
            
            <body class="zh-CN " id="">
             
                <header class="navbar navbar-static-top" id="top" role="header" style=" position:fixed; top:0px; width:100%; background:#FEF8E4">
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
      </div>

      <div style="padding-top:10px;" class="form-group col-md-6" style="overflow:hidden; ">
       
        <div class="col-xs-6 col-md-7"><input type="text" style="max-width:600px;display:inline-block;color: #999;" value="<?php echo ($tgurl); ?>" class="form-control" id="copy-num"></div>
        <button class="btn btn-sm" type="button" onClick="jsCopy()" style="background:#F9BD1A; ">复制</button>
      </div>
      
	  
	  
	  	  
	  <style>
	  .navbar-nav li a{ color:#000;}
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
      
  
  <li ><a href="/Home/Info/rwhistory.html">静态收益</a></li>
              <li ><a href="/Home/Info/cwhistory.html">经理奖钱包</a></li>
              <li ><a href="/Home/Info/nwhistory.html">直推奖</a></li>
             
              <li ><a href="/Home/Info/pin.html">激活码交易记录</a></li>
			    <li ><a href="/Home/Info/pin.html">激活管理</a></li>
				
				
				
        

                    
          

          <li >
            <a href="/Home/Index/news.html" class="glyphicons home" ><i></i>信息<span class="badge"></span></a>
          </li>


       
          
        
          
          
          
              </ul>
    </nav>
	
	
	
	
	
      
              <span class="count">
                
                              
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
                <div class="blue-bg" style="min-height:1000px;">
                    <div class="page-title">
  <div class="container">
    <h3 class="title col-md-3" >Everyone is the boss</h3>

 
       <nav class="collapse navbar-collapse" role="main-navigation" id="">

      <ul class="nav navbar-nav">

        <li <?php if($home): ?>class="active"<?php endif; ?>>

          <a href="/" class="glyphicons home"><i></i>首页</a>

        </li>

      

                    

          <li <?php if($reg): ?>class="active"<?php endif; ?>>

            <a href="<?php echo U('Index/reg');?>" class="glyphicons home"><i></i>注册会员<span class="badge"></span></a>

          </li>



          <li <?php if($reg): ?>class="active"<?php endif; ?>>

            <a href="<?php echo U('Index/news');?>" class="glyphicons home"><i></i>新闻<span class="badge"></span></a>

          </li>      



          <li <?php if($profile): ?>class="active"<?php endif; ?>><a href="<?php echo U('Info/index');?>" class="glyphicons user"><i></i>管理档案</a></li>



                            

          <li <?php if($manage): ?>class="dropdown active"<?php else: ?>class="dropdown"<?php endif; ?>>

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">帐户管理 <span class="caret"></span></a>

            <ul class="dropdown-menu" role="menu">                          

                            <li ><a href="<?php echo U('Info/pintopin');?>">激活码转账</a></li>

              <li ><a href="<?php echo U('Myuser/index');?>">我的家族</a></li>

              <li ><a href="<?php echo U('Myuser/xzzh');?>">家族买与卖</a></li>

                          </ul>

          </li>

          

          <li <?php if($detail): ?>class="dropdown active"<?php else: ?>class="dropdown"<?php endif; ?>>

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">交易记录 <span class="caret"></span></a>

            <ul class="dropdown-menu" role="menu">

              <li ><a href="<?php echo U('Info/pdhistory');?>">买入V币记录</a></li>

              <li ><a href="<?php echo U('Info/gdhistory');?>">卖出V币记录</a></li>

              <li ><a href="<?php echo U('Info/rwhistory');?>">买入V币交易记录</a></li>

              <li ><a href="<?php echo U('Info/cwhistory');?>">经理奖钱包记录</a></li>

              <li ><a href="<?php echo U('Info/nwhistory');?>">奖金钱包记录</a></li>

              <li ><a href="<?php echo U('Info/pin');?>">激活码交易记录</a></li>

            </ul>

          </li>



        

          

          <!-- <li class=""><a href="/bitStyle/zh-CN/platform/commission"class="glyphicons down_arrow"><i></i>佣金</a></li> -->

          

              </ul>

    </nav>
  </div>
</div>
                  <div class="clockWrap">
                    <div class="container clearfix">
                      <div class="pull-left" id="userRank">
                        <span class="glyphicon glyphicon-user">
                        </span>
                       <span style="color:red"><?php echo ($userData['ue_account']); ?></span> 级别 : <?php echo ($userData['levelname']); ?>
                      </div>
                      <div class="clock-location">
                        <strong class="mr5">
                          服务器时间
                        </strong>
                        <span id="server_time_text">
                           <?php echo date('Y-m-d H:i:s'); ?>
                        </span>
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
                                买入V币
                              </span>
                            </a>
                          </div>
                          <div class="col-sm-6">
                            <a class="btn btn-block " id="gdBtn" >
                              <span class="g-donation">
                                经理奖钱包
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
                                    买入V币
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
                                      <label>

                                          <input type="checkbox" checked="" name="zffs4" class="ckbox2" value="1">

                                          比特币支付

                                        </label>
                                  
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">
                                      买入V币金额
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" class="form-control get_amount" placeholder="输入<?php echo ($jj01s); ?>-<?php echo ($jj01m); ?>,<?php echo ($jj01); ?>的整数倍"
                                      name="amount" id="amount" autocomplete="off" required>
                                      <p class="help-block">
                                        目前，每月增长50%-300%
                                      </p>
                                      <p class="help-block">
                                        警告，我已完全了解所有风险。我决定参与云致富万众普惠社区,尊重云致富万众普惠社区文化与传统。
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <footer class="data-footer innerAll half text-right clearfix">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">
                                    取消
                                  </button>
                                  <!-- <button type="button" class="btn_next btn-warning btn-sm" data-dismiss="modal"
                                  data-toggle="modal" data-target="#myModal2">买入V币</button>-->
                                  <input name="jhwjjc" id="jhwjjc" type="submit" class="btn_next btn-warning btn-sm btn btn-primary "
                                  value="买入V币">
                                </footer>
                              </form>
                            </div>
                          </div>
                          <div class="col-md-12" id="gdWrap" style="">
                            <div class="widget widget-body-white">
                              <form action="/Home/Index/jsbzcl1" method="post" name="wallet_transfer_form"
                              class="form-horizontal margin-none" id="get_help">
                                <input type="hidden" value="" id="wallet_type" name="wallet_type">
                                <fieldset>
                                  <div class="widget-head widget-head-blue">
                                    <h4 class="heading">
                                      经理奖钱包
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
                                        <label>

                                          <input type="checkbox" checked="" name="zffs4" class="ckbox2" value="1">

                                          比特币支付

                                        </label>                                      
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-md-3 control-label">
                                        卖出V币总额:
                                        <span class="ast">
                                          *
                                        </span>
                                      </label>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control get_amount" placeholder="输入RMB,<?php echo ($jl_start); ?>到<?php echo ($jl_e); ?>,且为<?php echo ($jl_beishu); ?>的倍数"
                                        name="get_amount" autocomplete="off" required>
                                        <p class="help-block">
                                          您现有可出售经理奖余额： <?php echo ($userData['jl_he']); ?>RMB
                                        </p>
                                        <p class="help-block">
                                          您最低出售数量 <?php if($txthemin > $userData['ue_money']): echo ($userData['ji_he']); else: echo ($jl_start); endif; ?>RMB
                                        </p>
                                        <p class="help-block">
                                          警告，我已完全了解所有风险。我决定参与云致富万众普惠社区,尊重云致富万众普惠社区文化与传统。
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="data-footer innerAll half text-right clearfix">
                                    <button value="继续" id="withdraw_btn" type="submit" class="btn btn-primary btn-sm">
                                      卖出V币
                                    </button>
                                  </div>
                                </fieldset>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                   <div class="row">
      <div class="col-md-9">
          <div class="widget">
            <div class="widget-head clearfix">
              <h4 class="heading"><i class="fa fa-usd">
                 </i> 买入V币</h4>
            </div>
            <div class="widget-body innerAll overthrow">
              <table class="table table-bordered table-primary">
                <thead>
                  <tr class="tac">
                    <th>
                      编号
                    </th>
                    <th>
                      交易进度
                    </th>
                    <th>
                      交易时间
                    </th>
                    <th>
                      接受会员
                    </th>
                    <th>
                      付款方式
                    </th>
                    <th>
                      付款金额
                    </th>
                    <th>
                      接受会员
                    </th>
                    <th>
                      操作
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(is_array($plist)): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><tr class="odd">
                      <td>
                        <i>
                          <?php if($o["zt"] == 0): ?><img src="/cssmmm/zt0.jpg"><?php endif; ?>
                          <?php if($o["zt"] == 1): ?><img src="/cssmmm/zt1.jpg"><?php endif; ?>
                          <?php if($o["zt"] == 2): ?><img src="/cssmmm/zt2.jpg"><?php endif; ?>
                        </i>
                        <br>
                        <p class="text-center">R<?php echo ($o["id"]); ?></p>
                      </td>
                      <td>
                        <?php if($o["zt"] == 0): ?>待付款<?php endif; ?>
                        <?php if($o["zt"] == 1): ?>已付款<?php endif; ?>
                        <?php if($o["zt"] == 2): ?><font color="#017F01">
                            交易成功
                          </font><?php endif; ?>
                      </td>
                      </td>
                      <td>
                        <small>
                          配对时间<?php echo ($a1=$o["date"]); ?>
                          <div style="display: none">
                            <?php echo ($aab=$o["g_user"]); ?>
                          </div>
                        </small>
                        <br>
                        <?php if($o["zt"] == 0): ?><small style="font-size:14px;font-weight:bold;color:#ff0000;">
                            剩余打款时间：
                            <span data="<?php echo (datedqsj($a1,$aa1)); ?>" class="countdownbox">
                            </span>
                            <div style="display: none">
                              <?php echo ($aab=$v3["p_user"]); ?>
                            </div>
                          </small><?php endif; ?>
                        <?php if($o["zt"] == 1): ?><small style="font-size:14px;font-weight:bold;color:#ff0000;">
                            剩余确认时间：
                            <span data="<?php echo (datedqsj($aa1,$aaa1)); ?>" class="countdownbox">
                            </span>
                            <div style="display: none">
                              <?php echo ($aab=$o["p_user"]); ?>
                            </div>
                          </small><?php endif; ?>
                        <?php if($o["zt"] == 2): ?><small>
                            汇款时间<?php echo ($aa1=$o["date_hk"]); ?>
                            <div style="display: none">
                              <?php echo ($aab=$o["p_user"]); ?>
                            </div>
                          </small><?php endif; ?>
                      </td>
                      <td>
                        <?php echo ($o["g_user"]); ?>
                      </td>
                      <td>
                        <?php if($o["zffs1"] == 1): ?>银行<?php endif; ?>
                        <?php if($o["zffs2"] == 1): ?>支付宝<?php endif; ?>
                        <?php if($o["zffs3"] == 1): ?>微信<?php endif; ?>
                      </td>
                      <td>
                        <?php echo ($o["jb"]); ?>元
                        <br>
                        <br>
                        <?php if($o["pic"] != '0'): ?><a href="<?php echo ($o["pic"]); ?>" target="_blank">
                            <i style="font-size: 14px;wallet-colorr:#ff0000;display: inline-block;font: normal normal normal 14px/1 FontAwesome;">
                              付款凭证
                            </i>
                          </a><?php endif; ?>
                      </td>
                      <td>
                        <?php echo (cx_user($o["g_user"])); ?>
                      </td>
                      <td>
                        <input style="width:80px;margin-bottom:3px;background:#4CBDEB" name="btn2"
                        id="btn2<?php echo ($o["id"]); ?>" type="button" value="留　言" class="btn btn-info btn-xs addmsg"
                        data-toggle="modal" data-id="8802104" data-target="#myModal7">
                        <br>
                        <input style="width:80px;background:#34495E " name="btn" id="btn<?php echo ($o["id"]); ?>"
                        type="button" value="详细资料" class="btn_detail btn-primary btn-xs" data-toggle="modal" 
                        data-target="#myModal5">
                        <br>
                        <?php if($o["zt"] == '0'): if($o["ts_zt"] == '1'): ?>48小时未汇款
                            <br>
                            请联系对方取
                            <br>
                            消投诉!
                            <?php else: ?>
                            <input style="width:80px;" name="btn3" id="btn33<?php echo ($o["id"]); ?>" type="button"
                            value="确认已付款" class="btn_detail btn-primary btn-xs" data-toggle="modal"
                            data-target="#myModa24">
                            <script>
                              $(function() {
                                $('#btn33<?php echo ($o["id"]); ?>').click(function() {
                                  $("#mainframe13", parent.document.body).attr("src", "/Home/Index/home_ddxx_pcz/id/<?php echo ($o["id"]); ?>/"); $("#mainframe13").reload()
                                })
                              })
                            </script><?php endif; endif; ?>
                        <?php if($o["zt"] == 1): if($o["ts_zt"] == '2'): ?>你已被对方投诉请与
                            <br>
                            对方取得联系!
                            <?php else: ?>
                            <span <?php echo (datedqsj2($o["date"])); ?>>
                              <input style="width:120px;" name="btn3" id="btn33<?php echo ($o["id"]); ?>" type="button"
                              value="<?php echo ($jjdktime); ?>小时未确认投诉" class="btn_detail btn-primary btn-xs" data-toggle="modal"
                              data-target="#myModa24">
                              </span>
                              <script>
                                $(function() {
                                  $('#btn33<?php echo ($o["id"]); ?>').click(function() {
                                    $("#mainframe13", parent.document.body).attr("src", "/Home/Index/home_ddxx_g_wqr/id/<?php echo ($o["id"]); ?>/"); $("#mainframe13").reload()
                                  })
                                })
                              </script><?php endif; endif; ?>
                      </td>
                    </tr>
                    <script>
                      $(function() {
                        $('#btn<?php echo ($o["id"]); ?>').click(function() {
                          $("#mainframe11", parent.document.body).attr("src", "/Home/Index/home_ddxx/id/<?php echo ($o["id"]); ?>/"); $("#mainframe11").reload();
                        });
                        $('#btn2<?php echo ($o["id"]); ?>').click(function() {
                          $("#mainframe12", parent.document.body).attr("src", "/Home/Index/home_ddxx_ly/id/<?php echo ($o["id"]); ?>/"); $("#mainframe12").reload();
                        });
                      });
                    </script><?php endforeach; endif; else: echo "" ;endif; ?>
              </table>
            </div>
          </div>


          <div class="widget">
            <div class="widget-head clearfix">
              <h4 class="heading"><i class="fa fa-usd">
                </i>
                  卖出V币</h4>
            </div>
            <div class="widget-body innerAll overthrow">
              <table class="table table-bordered table-primary">
                <thead>
                  <tr class="tac">
                    <th>
                      编号
                    </th>
                    <th>
                      交易进度
                    </th>
                    <th>
                      交易时间
                    </th>
                    <th>
                      提供会员
                    </th>
                    <th>
                      付款方式
                    </th>
                    <th>
                      付款金额
                    </th>
                    <th>
                      接受会员
                    </th>
                    <th>
                      操作
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(is_array($glist)): $i = 0; $__LIST__ = $glist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><tr class="odd" role="row">
                      <td>
                        <i>
                          <?php if($o["zt"] == 0): ?><img src="/cssmmm/zt0.jpg"><?php endif; ?>
                          <?php if($o["zt"] == 1): ?><img src="/cssmmm/zt1.jpg"><?php endif; ?>
                          <?php if($o["zt"] == 2): ?><img src="/cssmmm/zt2.jpg"><?php endif; ?>
                        </i>
                        <p class="text-center">S<?php echo ($o["id"]); ?></p>
                      </td>
                      <td>
                        <?php if($o["zt"] == 0): ?>待付款<?php endif; ?>
                        <?php if($o["zt"] == 1): ?>已付款<?php endif; ?>
                        <?php if($o["zt"] == 2): ?><font color="#017F01">
                            交易成功
                          </font><?php endif; ?>
                      </td>
                      </td>
                      <td>
                        <small>
                          配对时间<?php echo ($a1=$o["date"]); ?>
                          <div style="display: none">
                            <?php echo ($aab=$o["g_user"]); ?>
                          </div>
                        </small>
                        <br>
                        <?php if($o["zt"] == 0): ?><small style="font-size:14px;font-weight:bold;color:#ff0000;">
                            剩余打款时间：
                            <span data="<?php echo (datedqsj($a1,$aa1)); ?>" class="countdownbox">
                            </span>
                            <div style="display: none">
                              <?php echo ($aab=$v3["p_user"]); ?>
                            </div>
                          </small><?php endif; ?>
                        <?php if($o["zt"] == 1): ?><small style="font-size:14px;font-weight:bold;color:#ff0000;">
                            剩余确认时间：
                            <span data="<?php echo (datedqsj($o["date"])); ?>" class="countdownbox">
                            </span>
                            <div style="display: none">
                              <?php echo ($aab=$o["p_user"]); ?>
                            </div>
                          </small><?php endif; ?>
                        <?php if($o["zt"] == 2): ?><small>
                            汇款时间<?php echo ($aa1=$o["date_hk"]); ?>
                            <div style="display: none">
                              <?php echo ($aab=$o["p_user"]); ?>
                            </div>
                          </small><?php endif; ?>
                      </td>
                      <td>
                        <?php echo ($o["p_user"]); ?>
                      </td>
                      <td>
                        <?php if($o["zffs1"] == 1): ?>银行<?php endif; ?>
                        <?php if($o["zffs2"] == 1): ?>支付宝<?php endif; ?>
                        <?php if($o["zffs3"] == 1): ?>微信<?php endif; ?>
                      </td>
                      <td>
                        <?php echo ($o["jb"]); ?>元
                        <br>
                        <?php if($o["pic"] != '0'): ?><a href="<?php echo ($o["pic"]); ?>" target="_blank">
                            <i style="font-size: 14px;wallet-colorr:#ff0000;display: inline-block;font: normal normal normal 14px/1 FontAwesome;">
                              付款凭证
                            </i>
                          </a><?php endif; ?>
                      </td>
                      <td>
                        自己
                      </td>
                      <td>
                        <input style="width:80px;margin-bottom:3px;background:#4CBDEB" name="btn2"
                        id="btn2<?php echo ($o["id"]); ?>" type="button" value="留　言" class="btn btn-info btn-xs addmsg"
                        data-toggle="modal" data-id="8802104" data-target="#myModal7">
                        <br>
                        <input style="width:80px;background:#34495E " name="btn" id="btn<?php echo ($o["id"]); ?>"
                        type="button" value="详细资料" class="btn_detail btn-primary btn-xs" data-toggle="modal" 
                        data-target="#myModal5">
                        <br>

                      <?php if($o["zt"] == 1): if($o["ts_zt"] == '3'): ?>48小时未确认收款,<br>
                            已被投诉,请联系对<br>
                            方取消投诉!

                            <?php else: ?>
                            <input style="width:80px;" name="btn23" id="btn23<?php echo ($o["id"]); ?>" type="button" value="确认收款" class="btn_detail btn-primary btn-xs" data-toggle="modal"  data-target="#myModa23"><?php endif; ?>
                            <script>
                            $(function(){
                            $('#btn23<?php echo ($o["id"]); ?>').click(function(){
                            $("#mainframe188",parent.document.body).attr("src","/Home/Index/home_ddxx_gcz/id/<?php echo ($o["id"]); ?>/") 
                            $("#mainframe188").reload();
                            })
                            })
                            </script><?php endif; ?>


                        <?php if($o["zt"] == 0): if($o["ts_zt"] == '2'): ?>你已被对方投诉请与
                            <br>
                            对方取得联系!
                            <?php else: ?>
                              <span <?php echo (datedqsj2($a1,$aa2)); ?>>
                              <input style="width:120px;" name="btn23" id="btn23<?php echo ($v3["id"]); ?>" type="button" value="<?php echo ($jjdktime); ?>小时未打款投诉" class="btn_detail btn-primary btn-xs" data-toggle="modal"  data-target="#myModa23"></span>   
                             <script>
                              $(function(){
                                $('#btn23<?php echo ($v3["id"]); ?>').click(function(){
                                $("#mainframe188",parent.document.body).attr("src","/Home/Index/home_ddxx_g_wdk/id/<?php echo ($vo["id"]); ?>/") 
                                $("#mainframe188").reload();
                                });
                              });
                              </script><?php endif; endif; ?>
                      </td>
                    </tr>
                    <script>
                      $(function() {
                        $('#btn<?php echo ($o["id"]); ?>').click(function() {
                          $("#mainframe11", parent.document.body).attr("src", "/Home/Index/home_ddxx/id/<?php echo ($o["id"]); ?>/"); $("#mainframe11").reload();
                        });
                        $('#btn2<?php echo ($o["id"]); ?>').click(function() {
                          $("#mainframe12", parent.document.body).attr("src", "/Home/Index/home_ddxx_ly/id/<?php echo ($o["id"]); ?>/"); $("#mainframe12").reload();
                        });
                      });
                    </script><?php endforeach; endif; else: echo "" ;endif; ?>
              </table>
            </div>
          </div>











        </div>







        <div class="col-md-3">
          <?php if(is_array($tlist)): $i = 0; $__LIST__ = $tlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="widget donate-sidebar pdContainer-pending ">
              <div class="widget-body">
                <div class="donateHead clearfix">
                  <span class="fa fa-arrow-right glyphicon-circle glyphicon-left">
                  </span>
                  <div class="title">
                    买入V币:
                    <span>
                      P<?php echo (strtolower(substr(md5($v["id"]),0,6))); ?>
                    </span>
                  </div>
                </div>
                <b>
                  参加者
                </b>
                :<?php echo ($v["user_nc"]); ?>
                <br/>
                <b>
                  数额
                </b>
                :<?php echo (hk($v["jb"])); ?>
                <br/>      
                <b>
                  日期
                </b>
                :<?php echo ($v["date"]); ?>
                <br/>
                <b>
                  状况:
                  <?php if($v["zt"] == 0): ?><span class="pending">
                      等待中
                    </span><?php endif; ?>
                  <?php if($v["zt"] == 1): ?><span class="pending">
                      匹配成功
                    </span><?php endif; ?>
                  </fb>
                  <br>
                </b>
                <b>
                  <?php if($v["zt"] == 0): ?><div style="">
                                               <!--<form method="post" id="wait" action="/tu/cancel_provide_request"> -->

                                                
                        <a href="javascript:if(confirm(' 确定要取消此定单吗?'))location='/Home/Index/tgbz_del/id/<?php echo ($v["id"]); ?>/'"  class="btn btn-danger btn-xs">取消</a>                                             
                         <!--<button type="button" class="btn btn-info btn-xs" style="float:right">详细资料>></button> -->
                                            <!--</form>-->
                        </div><?php endif; ?>

               </b>
              </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>


          <?php if(is_array($jlist)): $i = 0; $__LIST__ = $jlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="widget donate-sidebar gdContainer-pending ">
              <div class="widget-body">
                <div class="donateHead clearfix">
                  <span class="fa fa-arrow-right glyphicon-circle glyphicon-left">
                  </span>
                  <div class="title">
                    卖出V币:
                    <span>
                      G<?php echo (strtolower(substr(md5($v["id"]),0,6))); ?>
                    </span>
                  </div>
                </div>
                <b>
                  参加者
                </b>
                :<?php echo ($v["user_nc"]); ?>
                <br/>
                <b>
                  数额
                </b>
                :<?php echo (hk($v["jb"])); ?>
                <br/>              
                <b>
                  日期
                </b>
                :<?php echo ($v["date"]); ?>
                <br/>
                <b>
                  状况:
                  <?php if($v["zt"] == 0): ?><span class="pending">
                      等待中
                    </span><?php endif; ?>
                  <?php if($v["zt"] == 1): ?><span class="pending">
                      匹配成功
                    </span><?php endif; ?>
                  </b>                  
                  <br>

                <?php if($v["zt"] == 0): ?><div style="">
                         <!--<form method="post" id="wait" action="/tu/cancel_provide_request"> -->

                         <a href="javascript:if(confirm(' 确定要取消此定单吗?'))location='/Home/Index/jsbz_del/id/<?php echo ($v["id"]); ?>/'"  class="btn btn-danger btn-xs">取消</a>                                                <!--<button type="button" class="btn btn-info btn-xs" style="float:right">详细资料>></button> -->
                      <!--</form>-->
                      </div><?php endif; ?>
              </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="color-line">
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="title">
          详细的订单信息
        </h5>
        <small class="font-bold">
        </small>
      </div>
      <div class="modal-body" style="height:400px; overflow:auto">
        <iframe src='' id="mainframe11" width="100%;" height="350px;">
        </iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-default" data-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>
    <div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="color-line">
          </div>
          <div class="modal-header">
            <h5 class="modal-title" id="title2">
              留言信息
            </h5>
            <small class="font-bold">
            </small>
          </div>
          <div class="modal-body" style="height:300px; overflow:auto">
            <iframe src='' id="mainframe12" width="830px;" height="350px;">
            </iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn-default" data-dismiss="modal">
              关闭
            </button>
          </div>
        </div>
      </div>
    </div>
<div class="modal fade" id="dialog-msg">
  <div class="modal-dialog">
    <fieldset>
      <form id="pdgd_message_form" method="post">
        <input type="hidden" name="uid" value="82662186">
        <input type="hidden" name="mdid">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="hierarchy_title">
              信息
            </h3>
          </div>
          <div class="modal-body np">
            <div id="message_div" class="messageWrap">
            </div>
            <div id="message_foot">
              <div id="upload">
                <div class="btn-group btn-group-sm" id="upload_clone">
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="input-group">
                      <div class="form-control col-md-3">
                        <i class="fa fa-file fileupload-exists">
                        </i>
                        <span class="fileupload-preview">
                        </span>
                      </div>
                      <span class="input-group-btn">
                        <span class="btn btn-default btn-sm btn-file">
                          <span class="fileupload-new">
                            选择文件
                          </span>
                          <span class="fileupload-exists">
                            替换文件
                          </span>
                          <input type="file" class="btn btn-inverse" name="upload">
                        </span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">
                          清除
                        </a>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <textarea class="form-control form-control-text-area" placeholder="回复"
              name="message" id="message" rows="4">
              </textarea>
              <p class="error" id="message_text">
              </p>
            </div>
          </div>
          <footer class="modal-footer clearfix">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal"
            value="取消" />
            <input type="submit" class="btn btn-primary btn-sm" id="btn_add_message"
            value="回复信息" />
          </footer>
        </div>
      </form>
    </fieldset>
  </div>
</div>
<div class="modal fade" id="dialog-confirm-confirm">
  <div class="modal-dialog">
    <form id="approve_pdgd_form" enctype="multipart/form-data" method="post">
      <input type="hidden" name="__req" value="12">
      <input type="hidden" name="__nonce" value="658026269a5cc1d7205b34c6b6e35efcee9d5c2c51b388305200daabf13efd20">
      <input type="hidden" name="confirm_mdid">
      <fieldset>
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="hierarchy_title">
              确认
            </h3>
          </div>
          <div class="modal-body">
            您确定要肯定此合并舍得吗?
            <br/>
            <br/>
            为了双方资金安全抵达，系统新上了上传汇款交易成功图片，您可以选择直接点上确认，或者上传付款证明以确认此舍得合并，才点上确认都可以。
            <br/>
            <br/>
            在得的会员，对方在能点上批准时，会看到您所上传的打款交易照片！
            <br/>
            <br/>
            <div id="confirm_upload_images_div">
              <div id="confirm_message_div" class="messageWrap">
              </div>
              <div id="confirm_message_foot">
                <div id="confirm_upload">
                  <div class="btn-group btn-group-sm" id="confirm_upload_clone">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="input-group">
                        <div class="form-control col-md-3">
                          <i class="fa fa-file fileupload-exists">
                          </i>
                          <span class="fileupload-preview">
                          </span>
                        </div>
                        <span class="input-group-btn">
                          <span class="btn btn-default btn-sm btn-file">
                            <span class="fileupload-new">
                              选择文件
                            </span>
                            <span class="fileupload-exists">
                              替换文件
                            </span>
                            <input type="file" class="btn btn-inverse" name="confirm_upload[]">
                          </span>
                          <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">
                            清除
                          </a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="confirm_message_div" class="messageWrap">
              </div>
              <div id="confirm_message_foot">
                <div id="confirm_upload">
                  <div class="btn-group btn-group-sm" id="confirm_upload_clone">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="input-group">
                        <div class="form-control col-md-3">
                          <i class="fa fa-file fileupload-exists">
                          </i>
                          <span class="fileupload-preview">
                          </span>
                        </div>
                        <span class="input-group-btn">
                          <span class="btn btn-default btn-sm btn-file">
                            <span class="fileupload-new">
                              选择文件
                            </span>
                            <span class="fileupload-exists">
                              替换文件
                            </span>
                            <input type="file" class="btn btn-inverse" name="confirm_upload[]">
                          </span>
                          <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">
                            清除
                          </a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="confirm_message_div" class="messageWrap">
              </div>
              <div id="confirm_message_foot">
                <div id="confirm_upload">
                  <div class="btn-group btn-group-sm" id="confirm_upload_clone">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="input-group">
                        <div class="form-control col-md-3">
                          <i class="fa fa-file fileupload-exists">
                          </i>
                          <span class="fileupload-preview">
                          </span>
                        </div>
                        <span class="input-group-btn">
                          <span class="btn btn-default btn-sm btn-file">
                            <span class="fileupload-new">
                              选择文件
                            </span>
                            <span class="fileupload-exists">
                              替换文件
                            </span>
                            <input type="file" class="btn btn-inverse" name="confirm_upload[]">
                          </span>
                          <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">
                            清除
                          </a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="confirm_message_div" class="messageWrap">
              </div>
              <div id="confirm_message_foot">
                <div id="confirm_upload">
                  <div class="btn-group btn-group-sm" id="confirm_upload_clone">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="input-group">
                        <div class="form-control col-md-3">
                          <i class="fa fa-file fileupload-exists">
                          </i>
                          <span class="fileupload-preview">
                          </span>
                        </div>
                        <span class="input-group-btn">
                          <span class="btn btn-default btn-sm btn-file">
                            <span class="fileupload-new">
                              选择文件
                            </span>
                            <span class="fileupload-exists">
                              替换文件
                            </span>
                            <input type="file" class="btn btn-inverse" name="confirm_upload[]">
                          </span>
                          <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">
                            清除
                          </a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="confirm_message_div" class="messageWrap">
              </div>
              <div id="confirm_message_foot">
                <div id="confirm_upload">
                  <div class="btn-group btn-group-sm" id="confirm_upload_clone">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="input-group">
                        <div class="form-control col-md-3">
                          <i class="fa fa-file fileupload-exists">
                          </i>
                          <span class="fileupload-preview">
                          </span>
                        </div>
                        <span class="input-group-btn">
                          <span class="btn btn-default btn-sm btn-file">
                            <span class="fileupload-new">
                              选择文件
                            </span>
                            <span class="fileupload-exists">
                              替换文件
                            </span>
                            <input type="file" class="btn btn-inverse" name="confirm_upload[]">
                          </span>
                          <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">
                            清除
                          </a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer" id="confirm_cancel_btn">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
              取消
            </button>
            <input type="submit" id="btn_approve_donation" class="btn btn-primary btn-sm"
            value="确定" />
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>
<div class="modal fade" id="dialog-report-confirm">
  <div class="modal-dialog">
    <form id="report_pdgd_form" enctype="multipart/form-data" method="post">
      <input type="hidden" name="__req" value="8">
      <input type="hidden" name="__nonce" value="db1938e53e777acaafe76bdaa833d43352a4303272baa4541d4dbbf5560859c4">
      <input type="hidden" name="report_uid">
      <input type="hidden" name="report_mdid">
      <fieldset>
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="hierarchy_title">
              确认举报
            </h3>
          </div>
          <div class="modal-body">
            <p>
              请提供您欲举报此合并舍得的原因。
            </p>
            <label>
              选项:
            </label>
            <select class="form-control" name="report_reason">
              <option value="">
                请选择
              </option>
              <option value="6">
                已经打款,对方没有确认
              </option>
              <option value="7">
                对方银行账号错误
              </option>
              <option value="8">
                联系方式有问题
              </option>
              <option value="5">
                其他
              </option>
            </select>
            <span id="report_reason_err_text" class="error">
            </span>
            <br/>
            <label>
              信息:
            </label>
            <textarea class="form-control form-control-text-area" placeholder="Reply here..."
            name="report_message" rows="4">
            </textarea>
            <div id="confirm_upload_images_div">
              <div id="confirm_message_div" class="messageWrap">
              </div>
              <div id="confirm_message_foot">
                <div id="report_upload">
                  <div class="btn-group btn-group-sm" id="confirm_upload_clone">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="input-group">
                        <div class="form-control col-md-3">
                          <i class="fa fa-file fileupload-exists">
                          </i>
                          <span class="fileupload-preview">
                          </span>
                        </div>
                        <span class="input-group-btn">
                          <span class="btn btn-default btn-sm btn-file">
                            <span class="fileupload-new">
                              选择文件
                            </span>
                            <span class="fileupload-exists">
                              替换文件
                            </span>
                            <input type="file" class="btn btn-inverse" name="report_upload">
                          </span>
                          <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">
                            清除
                          </a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer" id="approve_cancel_btn">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
              取消
            </button>
            <input type="submit" id="btn_cancel_donation" class="btn btn-primary btn-sm"
            value="确定" />
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>
<div class="modal fade" id="dialog-photo">
  <div class="modal-dialog">
    <form name="cancel_order_form" method="post" action="">
      <input type="hidden" name="" value="">
      <input type="hidden" name="" value="">
      <input type="hidden" name="pboid" value>
      <div class="modal-content">
        <div class="modal-body np" id="image_div">
        </div>
      </div>
    </form>
  </div>
</div>


<div class="modal fade" id="myModa23" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="color-line"></div>
            <div class="modal-header">
                <h5 class="modal-title" id="title23">请选择</h5>
                <small class="font-bold"></small>
            </div>
            <div class="modal-body" style="height:400px; overflow:auto">
              <iframe src='' id="mainframe188" width="830px;" height="350px;" ></iframe>
            </div>
            <div class="modal-footer">
                
                  <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <!--  
                <button type="button" class="btn-primary" data-dismiss="modal" id="select_fanshi">确认</button>-->
            </div>



        </div>
    </div>
</div>

<div class="modal fade" id="myModa24" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="color-line"></div>
            <div class="modal-header">
                <h5 class="modal-title" id="title24">请选择</h5>
                <small class="font-bold"></small>
            </div>
            <div class="modal-body" style="height:400px; overflow:auto">
              <iframe src='' id="mainframe13" width="830px;" height="350px;" ></iframe>
            </div>
            <div class="modal-footer">
                
                  <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                 
                <!--<button type="button" class="btn-primary" data-dismiss="modal" id="select_fanshi2">确认</button> -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="prompt-repd">
  <div class="modal-dialog">
    <fieldset>
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="hierarchy_title">
            完成舍与得程序
          </h3>
        </div>
        <div class="modal-body np">
          <div id="message_foot">
            您已经完成了一个舍与得程序。请问您想继续买入V币吗?
          </div>
        </div>
        <footer class="modal-footer clearfix">
          <input type="continue" class="btn btn-green btn-sm" value="继续" id="click-pd"
          />
          <input type="button" class="btn btn-red btn-sm" data-dismiss="modal" value="迂回"
          />
        </footer>
      </div>
    </fieldset>
  </div>
</div>    
            </body>
          
          </html>