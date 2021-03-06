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


<title>激活码记录 </title>
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



<script type="text/javascript" src="/bitStyle/js/jquery.js"></script>
<script type="text/javascript" src="/bitStyle/js/fn/fn_nl2br.js"></script>
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
jQuery(document).ready(function($) {
	if($("#form-wizard").length > 0){
        $("#form-wizard").bootstrapWizard({"tabClass": "form-wizard-levels"});
    }
});
</script>

<script type="text/javascript">
jQuery(document).ready(function($){
	$('form[name=wallet_transfer_form]').submit(function(){
		$('input#transfer_btn,input#back_btn').attr('disabled','disabled');
	});
	
		$('#back_btn').click(function(){
		$('input[name=__req]').val('start'); //back to starting step
	});
	
		$('input[name=uid]').keyup(function(){
		if($(this).val() != ''){
			$('input[name=uid_choice]').parent().removeClass('checked').parent().removeClass('focus');
			$('#uid_choice--1').attr('checked', 'checked').parent().addClass('checked').parent().addClass('focus');
		}
	});
	
		var timer;
	$('.auto-ajax').keyup(function(){
		var name = $(this).attr('name');
		clearTimeout(timer);
		timer = setTimeout(function(){
			$('#check_user').trigger('click');
		}, 600);
	});

	//用户检查
		$('#check_user').click(function(){
		$('#user_text').html('').removeClass();
		if($('input[name=uid]').val() == ''){
			$('#user_text').html('请输入用户帐号。').addClass('error');
		}else{
			$('#user_text').html('查询中…');
			$(this).attr('disabled','disabled');
			var user = $("#username").val();
			$.ajax({
				url: '<?php echo U("Myuser/xm");?>',
				data: {'dfzh': user},
				type: 'post',
				dataType: 'json',
				error: function(){
					$('#user_text').html('核对中…').addClass('red');
				},
				success: function(data){
					//console.log(data);
					var mesg='';
					if(data.loggedout == '1'){
						mesg = '您已经成功退出系统。';
					}
					var status = data.sf;
					$('#user_text').html(data.nr).addClass(status == 1? '' : 'red');
				},
				complete: function(){
					$('#check_user').removeAttr('disabled');
				}
			});
		}
		
		return false;
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
		true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000); 		//synchronize & increment 1 second
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
		true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000); 		$('.maintain_remain_time').each(function(){
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


<title>激活码转账 </title>
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






<div id="wrapper" >

			<div class="row" style=" margin:0px auto;padding-top:60px;">


<div class="col-md-12">
									
					<div class="widget" style="border:0px;">
						
						<form class="form-horizontal margin-none" name="wallet_transfer_form" method="post" action="<?php echo U('Index/jbzzcl');?>">				
							<fieldset >
								
								<div class="widget-body" >
									<div class="form-group"  style="width:30%; float:left;">
										<label class="col-md-2 control-label" for="firstname">
											转账至:<span class="ast">*</span>
										</label>
										<div class="col-md-8">
											<div class="input-group">											
												<input name="user" type="text" id="username" placeholder="用户名" class="targetinput form-control form-control-group"><font id="alert_pemail"></font>												
												<span class="input-group-btn">
													 <input type="button" value="检查" name="Submit2" id="check_user" class="btn btn-info">
												</span>
											</div>
																						<p class="help-block" id="user_text"></p>
										</div>
									</div>
									<div class="form-group" style="width:420px; float:left;">
										<label class="control-label" for="firstname" style="float:left;" >
											转账款额:<span class="ast">*</span>
										</label>
										<div class="col-md-10" style="float:left;">
											<input name="sh" type="text" id="sh" placeholder="您的PIN余额为<?php if($pin_zs): echo ($pin_zs); else: ?>0<?php endif; ?>" class="form-control" style=" width:320px;" >
																						
									</div>
									
								</div>
								<div class="text-right " style=" float:left">
									<input type="submit" name="Submit" value="确认转让" class="btn btn-success btn-sm" style="background:#47a447; color:#fff">				
								</div>
							</fieldset>
						</form>
											</div>
				</div>
				
				
                <div class="col-md-12">
                    <div class="widget">
                        
                        <div class="widget-body innerAll overthrow">
                            <table class="table table-bordered table-primary">
                                <thead>
                                    <tr class="tac">
                                        <th style="background:#555; color:#fff">编号</th>
                                        <th  style="background:#555; color:#fff">用户</th>
                                        <th  style="background:#555; color:#fff">激活码</th>
                                        <th  style="background:#555; color:#fff">状态</th>
                                        <th  style="background:#555; color:#fff">生成时间</th>
                                        <th  style="background:#555; color:#fff">使用用户</th>
                                        <th  style="background:#555; color:#fff">使用时间</th>
                                        <th  style="background:#555; color:#fff"> 操作</th>
                                    </tr>
                                </thead>
                            <tbody>
                                    <?php if(is_array($list1)): foreach($list1 as $key=>$v): ?><tr role="row" class="odd">
                                      <td class="sorting_1"><?php echo ($v["id"]); ?></td>
                                      <td><?php echo ($v["user"]); ?></td>
                                      <td><?php echo ($v["pin"]); ?></td>
                                      <td>
                                      <?php if($v["zt"] == '0'): ?>未使用<?php endif; ?>
                                      <?php if($v["zt"] == '1'): ?>已使用<?php endif; ?>
                                      </td>
                                      <td><?php echo ($v["sc_date"]); ?></td>
                                      <td><?php echo ($v["sy_user"]); ?></td>
                                      <td><?php echo ($v["sy_date"]); ?></td>
                                      <td></td>
                                    </tr><?php endforeach; endif; ?>
                                    
                                    </tbody>
                                </table>
                                  <div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><?php echo ($page1); ?></div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>