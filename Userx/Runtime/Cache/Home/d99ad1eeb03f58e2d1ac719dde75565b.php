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
$(document).ready(function() {
        
    $('#terminate-account').click(function(e){
        e.preventDefault();
        $('#dialog-terminate-account').modal('show');
    });
});
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
        _server_time2 = new Date(),
        _local_time = new Date(),
        _local_time2 = new Date();
    
    _timer = setInterval(function(){
        var now = new Date();
        true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000);        //synchronize & increment 1 second
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
        true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000);        $('.maintain_remain_time').each(function(){
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


<title>我的档案 </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />


<!-- Favicons -->
<link rel="shortcut icon" href="/bitStyle/favicon.ico" type="image/x-icon">



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





<div class="container" style="margin-top:60px;">

	  
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

            <div class="row">
                <div class="col-md-12">
                                                                                                                                        </div>
                <div class="col-md-6 tablet-column-reset" >
                    <div class="widget widget-body-white padding-none">
                        <div class="widget-head"  style="background:#555; ">
                            <h4 class="heading" style="color:#fff">帐户详情</h4>
                        </div>
                        <form class="form-horizontal margin-none" id="loginForm" method="post" action="<?php echo U('Home/Info/xgzlcl');?>" style="padding-top:7px; padding-bottom:5px;">       
						    					 <div class="widget-body" style="height:40px;">	<div class="form-group" >
        <label class=" col-md-4 control-label">推广链接：</label>
        <div  class="col-md-8"><div style="width:80%; float:left;"><input type="text" style="max-width:350px;display:inline-block;color: #999;" value="<?php echo ($tgurl); ?>" class="form-control" id="copy-num"> </div> <button class="btn btn-sm" type="button" onClick="jsCopy()" style="width:20%;">复制</button></div>
      
      </div></div>
	 <div style="clear:both;"></div>
                            <div class="widget-body">
	
      
                                <div class="form-group">
                                    <label class="col-md-4 control-label">姓名</label>
                                    <div class="col-md-8">
                                        <input type="" value="<?php echo ($userData['ue_theme']); ?>" id="" class="form-control" name="lid" required="" readonly="">
                                    </div>
                                </div>
                                                                <div class="form-group">
                                    <label class="col-md-4 control-label">手机号码</label>
                                    <div class="col-md-8">
                                        <input type="" value="<?php echo ($userData['ue_phone']); ?>" id="" class="form-control" name="phone" required="">
                                    </div>
                                </div>
                                                                <div class="form-group">
                                    <label class="col-md-4 control-label">登陆帐号</label>
                                    <div class="col-md-8">
                                        <input type="" value="<?php echo ($userData['ue_account']); ?>" id="" class="form-control" name="" readonly="">
                                    </div>
                                </div>
                                                                <div class="form-group">
                                    <label class="col-md-4 control-label">微信号</label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo ($userData['weixin']); ?>" id="wechat" class="form-control" name="wechat">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">支付宝</label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo ($userData['zfb']); ?>" id="alipay" class="form-control" name="alipay">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">银行名称</label>
                                    <div class="col-md-8">
                                        <input type="" value="<?php echo ($userData['yhmc']); ?>" id="" class="form-control" name="bank_name" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">银行账户号码</label>
                                    <div class="col-md-8">
                                        <input type="" value="<?php echo ($userData['yhzh']); ?>" id="" class="form-control" name="bank_number" required="">
                                    </div>
                                </div>
                              

                                                                <div class="form-group">
                                    <label class="col-md-4 control-label">二级密码</label>
                                    <div class="col-md-8"><input type="password" class="form-control" autocomplete="off" name="trade_pwd2" required=""></div>
                                </div>
                            </div>
                            <footer class="data-footer innerAll half text-right clearfix">
                                <button type="submit" class="btn btn-primary btn-sm">更新</button>
                            </footer>
                        </form>
                    </div>                    
                </div>
                
                <div class="col-md-6 tablet-column-reset">
                    <div class="widget widget-body-white padding-none">
                        <div class="widget-head"  style="background:#555; ">
                            <h4 class="heading" style="color:#fff">安全密码</h4>
                        </div>
                        <form class="form-horizontal margin-none" id="" method="post" action="<?php echo U('Info/xgejmmcl');?>">
                            <div class="widget-body" >
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="firstname">原二级密码</label>
                                    <div class="col-md-8">
                                        <div class="controls">
                                            <input type="password" class="form-control" name="yejmm" value=""/>
                                                                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="firstname">新二级密码</label>
                                    <div class="col-md-8">
                                        <div class="controls">
                                            <input type="password" class="form-control" name="xejmm" value=""/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">确认新二级密码</label>
                                    <div class="col-md-8"><input class="form-control" id="epassword2" name="xejmmqr" value="" type="password"></div>
                                </div>
                            </div>
                            <footer class="data-footer innerAll half text-right clearfix">
                                    <button type="submit" class="btn btn-primary btn-sm">更新</button>
                            </footer>
                        </form>
                    </div>

                    <div class="widget widget-body-white padding-none">
                        <div class="widget-head"  style="background:#555; ">
                            <h4 class="heading" style="color:#fff">帐户密码</h4>
                        </div>
                        <form class="form-horizontal margin-none" id="" method="post" action="<?php echo U('Info/xgyjmmcl');?>">                         
                            <div class="widget-body">
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="firstname">原密码</label>
                                    <div class="col-md-8">
                                        <div class="controls">
                                            <input type="password" class="form-control" name="ymm" value=""/>
                                                                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="firstname">新密码</label>
                                    <div class="col-md-8">
                                        <div class="controls">
                                            <input type="password" class="form-control" name="xmm" value=""/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">确认新密码</label>
                                    <div class="col-md-8"><input class="form-control" id="epassword2" name="xmmqr" value="" type="password"></div>
                                </div>
                            </div>
                            <footer class="data-footer innerAll half text-right clearfix">
                                <button type="submit" class="btn btn-primary btn-sm">更新</button>
                            </footer>
                        </form>
                    </div>
                    
                    <!-- <div class="widget widget-body-white padding-none">
                        <div class="widget-head">
                            <h4 class="heading">终止帐号</h4>
                        </div>
                        <div class="widget-body">
                            如果您想终止帐号， 请按以下按钮.<br>
                        </div>
                        <footer class="data-footer innerAll half text-right clearfix">
                            <a class="btn btn-sm btn-danger" id="terminate-account">终止服务</a>
                        </footer>
                    </div> -->
                </div>
            </div>

        </div>
    </div>
</div>
<!-- <div class="modal fade" id="dialog-terminate-account">
    <div class="modal-dialog">
        <fieldset>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">终止帐号</h3>
                </div>
                <div class="modal-body np">
                    <div id="message_foot">
                    您确定要自行终止账号吗？                    </div>
                </div>
                <footer class="modal-footer clearfix">
                    <a class="btn btn-red btn-sm" href="?terminate=1">确定</a>
                    <input type="button" class="btn btn-green btn-sm" data-dismiss="modal" value="迂回" />
                </footer>
            </div>
        </fieldset>
    </div>
</div> -->
<style>
.formcontrol {
    border-radius: 2px;
    font-size: 12px;
    height: 30px;
    line-height: 1.5;
    padding: 3px;
}

.formcontrol {
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    color: #555;
    display: block;
    font-size: 14px;
    height: 34px;
    line-height: 1.42857;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    width: 100%;
}

<style>
</body>
</html>