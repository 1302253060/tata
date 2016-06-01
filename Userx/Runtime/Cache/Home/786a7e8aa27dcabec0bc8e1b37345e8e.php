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
<!--[if!IE]><!-->
<html>
<!--<![endif]-->

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
<script type="text/javascript" src="/bitStyle/js/layer.js"></script>
<script src="/cssmmm/jquery.countdown.js"></script>

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
    $('.approve_remaining_time').each(function() {
      var _rid = $(this).attr('id');
      var _seconds = parseInt($(this).attr('rel'));
      if (_seconds > 0) {
        $(this).html(remaining.getString(_seconds, _i18n, false))
      } else {
        $(this).html('剩余0天')
      }
      _allsecs[_rid] = _seconds;
      _allsecs2[_rid] = _seconds
    });
    timer = setInterval(function() {
      var now = new Date();
      true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000);
      $('.approve_remaining_time').each(function() {
        var _rid = $(this).attr('id');
        if (typeof _allsecs[_rid] == 'undefined') {
          _allsecs[_rid] = parseInt($(this).attr('rel'))
        }
        _seconds = _allsecs[_rid];
        if (typeof _allsecs2[_rid] == 'undefined') {
          _allsecs2[_rid] = parseInt($(this).attr('rel'))
        }
        _diff_sec = _allsecs2[_rid] - _seconds;
        if (_diff_sec < true_elapsed) {
          _seconds = _allsecs2[_rid] - true_elapsed
        }
        if (_seconds > 0) {
          $(this).html(remaining.getString(_seconds, _i18n, false));
          _allsecs[_rid] = --_seconds
        } else {
          $("#too_many_user").hide();
          $("#login_btn").removeAttr("disabled");
          $(this).html('剩余0天')
        }
      })
    },
    1000)
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
    $('.roi_distribute_remaining_time').each(function() {
      var _rid = $(this).attr('id');
      var _seconds = parseInt($(this).attr('rel'));
      if (_seconds > 0) {
        $(this).html(remaining.getString(_seconds, _i18n, false))
      } else {
        $(this).html('剩余0天')
      }
      _allsecs[_rid] = _seconds;
      _allsecs2[_rid] = _seconds
    });
    timer = setInterval(function() {
      var now = new Date();
      true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000);
      $('.roi_distribute_remaining_time').each(function() {
        var _rid = $(this).attr('id');
        if (typeof _allsecs[_rid] == 'undefined') {
          _allsecs[_rid] = parseInt($(this).attr('rel'))
        }
        _seconds = _allsecs[_rid];
        if (typeof _allsecs2[_rid] == 'undefined') {
          _allsecs2[_rid] = parseInt($(this).attr('rel'))
        }
        _diff_sec = _allsecs2[_rid] - _seconds;
        if (_diff_sec < true_elapsed) {
          _seconds = _allsecs2[_rid] - true_elapsed
        }
        if (_seconds > 0) {
          $(this).html(remaining.getString(_seconds, _i18n, false));
          _allsecs[_rid] = --_seconds
        } else {
          $("#too_many_user").hide();
          $("#login_btn").removeAttr("disabled");
          $(this).html('剩余0天')
        }
      })
    },
    1000)
  });
</script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    var mdid, pdid, gdid, amount, status;
    var img_field = $("#upload_clone").clone();
    $("button[name^=load_pdgd_matching_]").click(function() {
      var pdid = $(this).val();
      $("#pd_matching_list_" + pdid).html('<img src="/bitStyle/images/loader2.gif"/>');
       $("#pd_matching_list_" + pdid).load("?pdid=" + pdid,
      function() {
        $('.transactionWrap').hide();
      });
    });
    $('[data-toggle="tooltip"]').tooltip({
      container: 'body',
    });
    $('.hireTable').live("click",
    function() {
      $('.' + $(this).attr('value') + '.donate-body-' + $(this).attr('rel')).slideToggle('normal')
    });
    $('.btn-details').live("click",
    function() {
      $(this).parents('table').siblings('.transactionWrap').stop(true, false).slideUp('normal');
      $(this).parents('table').next().stop(true, false).slideToggle('normal');
      return false
    });
    $('#show_message_box').live("click",
    function(e) {
      e.preventDefault();
      json = $(this).attr('data');
      data = JSON && JSON.parse(json) || $.parseJSON(json);
      mdid = data.mdid;
      var spUrl = $(this).attr('src');
      $("#message_div").load(spUrl);
      $("input[name=mdid]").val(mdid)
    });
    $('a[id^=show_report_box]').live("click",
    function() {
      json = $(this).attr('data');
      data = JSON && JSON.parse(json) || $.parseJSON(json);
      $("input[name=report_uid]").val(data.uid);
      $("input[name=report_mdid]").val(data.mdid)
    });
    $('a[id^=show_confirm_box]').live("click",
    function() {
      json = $(this).attr('data');
      data = JSON && JSON.parse(json) || $.parseJSON(json);
      $("input[name=confirm_mdid]").val(data.mdid)
    });
    $("a[id^=show_image]").live("click",
    function() {
      $("#image_div").html("<img alt='' class='img-responsive' src='" + $(this).attr('data') + "'>")
    });
    $("a[id^=show_message_image]").live("click",
    function() {
      $("#image_div").html("<img alt='' class='img-responsive' src='" + $(this).attr('data') + "'>")
    });
    $("#pdgd_message_form").on('submit',
    function(events) {
      events.preventDefault();
      if ($("input[name=uid]").val() != 82662186) {
        $('#message_text').html('程序出错，请再试一次。')
      } else {
        $.ajax({
          url: '?aj=1&type=add_pdgd_message',
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            var show_image = '';
            json = data.split('<', 1)[0];
            details = JSON && JSON.parse(json) || $.parseJSON(json);
            if (details.error == "") {
              $('#message_text').html('');
              if (details.upload != "") {
                show_image = '<a href="#dialog-photo" id="show_message_image" data="' + details.upload + '" data-toggle="modal" class=""><img height="100px" width="100px" src="' + details.upload + '"></a>'
              }
              var html = '<div class="innerMessage message-toggle"><div class="fullMessage clearfix"><div class="pull-left"><strong class="blue">' + details.username + '</strong></div><div class="pull-right calendar ml5"><i class="fa fa-calendar mr5"></i><span class="title-date">2016年1月11日 4:18:14PM</span></div><div class="clearfix"></div><div class="mt5"><p class="nm">' + details.message + '</p>' + show_image + '</div></div></div>';
              $('#message_div').append(html);
              $("#upload").html(img_field);
              img_field = $("#upload_clone").clone();
              $("textarea[name=message]").val('')
            } else {
              $('#message_text').html(details.error)
            }
          }
        })
      }
    });
    if (0) {
      $('#prompt-repd').modal('show')
    }
    $('#prompt-repd').on('click', '#click-pd',
    function(e) {
      e.preventDefault();
      $("#pdBtn").trigger("click");
      $('#prompt-repd').modal('hide')
    })
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
      return false
    });
    gdBtn.click(function() {
      $(this).toggleClass('active');
      pdBtn.removeClass('active');
      $('#gdWrap').stop(true, false).slideToggle('fast');
      $('#pdWrap').stop(true, false).slideUp('fast').removeClass('open');
      return false
    });
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
      return false
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
      true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000);
      second = _local_time.getTime() + 1000;
      elapsed = Math.round((second - _local_time2.getTime()) / 1000);
      if (elapsed < true_elapsed) {
        diff = true_elapsed - elapsed;
        second += (diff * 1000)
      }
      _local_time.setTime(second);
      second = _server_time.getTime() + 1000;
      elapsed = Math.round((second - _server_time2.getTime()) / 1000);
      if (elapsed < true_elapsed) {
        diff = true_elapsed - elapsed;
        second += (diff * 1000)
      }
      _server_time.setTime(second);
      date_text = padNumber(_server_time.getHours()) + ':' + padNumber(_server_time.getMinutes()) + ':' + padNumber(_server_time.getSeconds());
      date_text += ' ' + _server_time.getDate() + '/' + (_server_time.getMonth() + 1) + '/' + _server_time.getFullYear();
      $('#server_time_text').html(date_text);
      date_text = padNumber(_local_time.getHours()) + ':' + padNumber(_local_time.getMinutes()) + ':' + padNumber(_local_time.getSeconds());
      date_text += ' ' + _local_time.getDate() + '/' + (_local_time.getMonth() + 1) + '/' + _local_time.getFullYear();
      $('#local_time_text').html(date_text)
    },
    1000);
    function padNumber(number) {
      return (number >= 0 && number < 10) ? '0' + number: number
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
        $(this).html(remaining.getString(_seconds, _i18n, false))
      } else {
        $(this).html('剩余0天')
      }
      _allsecs[_rid] = _seconds;
      _allsecs2[_rid] = _seconds
    });
    timer = setInterval(function() {
      var now = new Date();
      true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000);
      $('.maintain_remain_time').each(function() {
        var _rid = $(this).attr('id');
        if (typeof _allsecs[_rid] == 'undefined') {
          _allsecs[_rid] = parseInt($(this).attr('rel'))
        }
        _seconds = _allsecs[_rid];
        if (typeof _allsecs2[_rid] == 'undefined') {
          _allsecs2[_rid] = parseInt($(this).attr('rel'))
        }
        _diff_sec = _allsecs2[_rid] - _seconds;
        if (_diff_sec < true_elapsed) {
          _seconds = _allsecs2[_rid] - true_elapsed
        }
        if (_seconds > 0) {
          $(this).html(remaining.getString(_seconds, _i18n, false));
          _allsecs[_rid] = --_seconds
        } else {
          $("#too_many_user").hide();
          $("#login_btn").removeAttr("disabled");
          $(this).html('剩余0天')
        }
      })
    },
    1000)
  });
</script>
<script type="text/javascript">
</script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    var pin_message = "此次执行需要{quantity}PIN。";
    $('#maintain_back_btn, #pd_back_btn, #gd_back_btn').click(function() {
      $('input[name=__req]').val('start')
    });
    if ("0") {
      $("#pd_pin").text(pin_message.replace("{quantity}", parseInt(0 / 0.5)))
    } else {
      $("#pd_pin").text(pin_message.replace("{quantity}", 1))
    }
    $("input[name=from_wallet]").change(function() {
      if ($(this).val() == 'cwallet') {
        $("#minimum_amount").text("BTC0.50000000")
      } else {
        $("#minimum_amount").text("BTC0.50000000")
      }
    });
    $("#show_pd_amount").html(format_monetary_value(0));
    $("#show_gd_amount").html(format_monetary_value(0));
    $("#pd_amount").keyup(function() {
      $("#show_pd_amount").html(format_monetary_value($(this).val()));
      if ($(this).val() > 0.5 && $(this).val() % 0.5 == 0) {
        $("#pd_pin").text(pin_message.replace("{quantity}", $(this).val() / 0.5))
      } else {
        $("#pd_pin").text(pin_message.replace("{quantity}", 1))
      }
    });
    $("#gd_amount").keyup(function() {
      $("#show_gd_amount").html(format_monetary_value($(this).val()))
    });
    if (false) {
      $("#recalc-ep-message").text("您的额外回酬已计算。请稍候片刻再尝试。");
      $("#recalc-ep-button").attr("disabled", "disabled");
      setTimeout(function() {
        $("#recalc-ep-button").removeAttr("disabled");
        $("#recalc-ep-message").text("")
      },
      0)
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
          console.log(data)
        },
        success: function(data) {
          if (data.percent > 0) {
            $("#current_ep").html(data.percent)
          }
        }
      });
      setTimeout(function() {
        $("#recalc-ep-button").removeAttr("disabled");
        $("#recalc-ep-message").text("")
      },
      1800000)
    })
  });
</script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    $("#btn_cancel_donation").live("click",
    function(e) {
      if ($("select[name=report_reason]").val() == "") {
        e.preventDefault();
        $("#report_reason_err_text").text("请选择一个选项。")
      } else {
        $("#report_reason_err_text").text("")
      }
    })
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
<title>
注册会员
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"
/>
<!--Favicons-->
<link rel="shortcut icon" href="/bitStyle/favicon.ico" type="image/x-icon">
  <style>
    body{
      font-size: 12px;
      color:#000;
   
    }
  </style>

</head>

<body class="zh-CN " id="">

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
  $(document).ready(function() {});
</script>
<div id="wrapper">
 
       <div class="row" style="margin:0px auto; padding-top:60px; width:50%;">
            <div class="col-md-8 col-md-offset-2">                                                                                             
                
                <form class="form-horizontal margin-none" name="register_form" action="<?php echo U('Index/regadd');?>" method="post" id="register_form">                 
                
                    <div class="widget widget-body-white padding-none">
                        <div class="widget-head" style="background:#555;">
                            <h4 class="heading" style="color:#fff">注册新会员</h4>
                        </div>
                        <div class="widget-body">
                          <div class="form-group">
                                <label class="col-md-3 control-label">登录账号<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="realname" name="email" value="" type="text"/></div>
                            </div>  
                           <div class="form-group">
                                <label class="col-md-3 control-label">手机号码<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="mobile" name="phone" value="" type="text"/></div>
                                <!-- <input type="button" class="btn btn-primary" onclick="time(this);" value="发送"/> -->
                            </div>
                    <!--         <div class="form-group">
                                <label class="col-md-3 control-label">手机验证码<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="email" name="phone_check" value="" type="text"/></div>
                            </div> -->
         
                            <div class="form-group">
                                <label class="col-md-3 control-label">姓名<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="realname" name="username" value="" type="text"/></div>
                            </div>                    
                                                   
                            <div class="form-group">
                                <label class="col-md-3 control-label">推荐人账号<span class="ast">*</span></label>
                                <div class="col-md-9">
                    
                                        <input type="text" class="form-control auto-ajax " placeholder="" name="pemail" id="recommended" value="<?php echo ($userData['ue_account']); ?>" autocomplete="off"/>
                                        
                                
                                    
                                </div>
                            </div>                        
                            <div class="form-group">
                                <label class="col-md-3 control-label">登录密码<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="password" name="password"  type="password"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">确认密码<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="cpassword" name="password2"  type="password"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">二级密码<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="password2" name="secpwd"  type="password"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">确认二级密码<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="cpassword2" name="resecpwd"  type="password"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">安全问题<span class="ast">*</span></label>
                                <div class="col-md-9">
                                <select class="form-control" name="question">
                                    <option value="0">----请选择问题----</option>
                                    <option value="q1">您的生日是什么时间？</option>
                                    <option value="q2">您最喜欢人的叫什么名字？</option>
                                    <option value="q3">您最喜欢的是什么？</option>
                                    <option value="q4">您父亲的名字叫什么？</option>                        
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">问题答案<span class="ast">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="adsfd form-control" autocomplete="off" id="answer" name="answer">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">激活码<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="password2" name="code"  type="text" value="<?php echo ($pin1["pin"]); ?>"></div>
                            </div>
                                <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9"><input name="ty" type="checkbox" id="ty" value="ye" checked>
                              我已完全了解所有风险。</div>
                            </div>
                        </div>          
                              
                        <div class="data-footer innerAll half text-right clearfix" style="text-align:center; padding:10px;">
                            <button type="button" class="btn btn-block btn-primary" onClick="reg()">注册</button>                         
                            <input type="hidden" name="MemberId" value="-1" />
                        </div>          
                    </div>
                    
                    

                    <!--<div class="widget widget-body-white padding-none">                        -->
                    <!--</div>-->
                </form>
            </div>
        </div>


<script type="text/javascript">
    $(document).ready(function($){
        $('form[name=login_form]').submit(function(){
            $('input#login_btn').attr('disabled','disabled');
        });     
        $('#username').focus();         
        $.removeCookie("alert", { path: '/' });
    });

    function reg() {
        if ($("#username").val() == "") {
            layer.msg("请填写用户名");
            return false;
        } else if ($("#recommended").val() == "") {
            layer.msg("请填写推荐人");
            return false;
        }
        else if ($("#password").val() == "") {
            layer.msg("请填写密码");
            return false;
        }
        else if ($("#password").val() != $("#cpassword").val()) {
            layer.msg("两次密码不一致");
            return false;
        }
        else if ($("#cpassword").val() == "") {
            layer.msg("请填写安全密码");
            return false;
        }
        else if ($("#cpassword2").val() != $("#cpassword2").val()) {
            layer.msg("两次安全密码不一致");
            return false;
        }
        else if ($("#realname").val() == "") {
            layer.msg("请填写姓名");
            return false;
        }
        else if ($("#email").val() == "") {
            layer.msg("请填写邮箱");
            return false;
        }
        else if ($("#mobile").val() == "") {
            layer.msg("请填写手机号");
            return false;
        }
        else if ($("#password").val() == "") {
            layer.msg("请填写密码");
            return false;
        }

        if (!isMobile($("#mobile").val())) {
            layer.msg("手机格式不正确");
            return false;
        }
/*
        if (!isEmail($("#email").val())) {
            layer.msg("邮箱格式不正确");
            return false;
        }*/
      /*  $.post("<?php echo U('Index/regadd');?>", $("form").serialize(), function(data) { 
            if (data.error) { 
                    layer.msg(data.msg);
                location.href = "<?php echo U('Index/tip',array('msg'=>'"+data.msg+"','success'=>0));?>";
            } else { */
                /*layer.msg(data.msg);*/
         /*       location.href = "<?php echo U('Index/tip',array('msg'=>'"+data.msg+"','success'=>1));?>";       
            }},'json');


*/    
    $("#register_form").submit();

    }

    function isMobile(str) {
        var myreg = /^([0]?)(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(16[0-9]{1})|(17[0-9]{1})|(18[0-9]{1})|(19[0-9]{1}))+\d{8})$/;
        return myreg.test(str);
    }

    function isEmail(str) {
        var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
        return reg.test(str);
    }

    var wait = 60;

    function time(o) {       

        if ($("#mobile").val() == "") {
            layer.msg("请填写手机号");
            return false;
        }       

        if (!isMobile($("#mobile").val())) {
            layer.msg("手机格式不正确");
            return false;
        }

        $.post("<?php echo U('Reg/sendPhone');?>", { phone: $("#mobile").val() }, function(msg) { layer.msg("验证码已经发送，注意查收"); });

        okssss(o);
    }
    var wait = 60;
    function okssss(o) {
        if (wait == 0) {
            $(o).removeAttr("disabled");
            $(o).val("免费获取验证码");
            wait = 120;
        } else {
            $(o).attr("disabled", true);
            $(o).val("重新发送(" + wait + ")");
            wait--;
            setTimeout(function() {
                okssss(o);
            },
            1000);
        }
    }
</script>









    </div>
  </div>
</div>
</body>

</html>