<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if gt IE 8]> <html class="ie gt-ie8 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
<head>


<script type="text/javascript" src="/bitStyle/js/jquery.js"></script>
<script type="text/javascript" src="/bitStyle/js/fn_number_format.js"></script>
<script type="text/javascript" src="/bitStyle/js/9acba5c0d35076a1ccd574dfc21b8b2b.js"></script>
<script type="text/javascript" src="/bitStyle/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/bitStyle/js/modernizr.js"></script>
<script type="text/javascript" src="/bitStyle/js/selectivizr.js"></script>
<script type="text/javascript" src="/bitStyle/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/bitStyle/js/scripts.js"></script>
<script type="text/javascript" src="/bitStyle/js/remaining.js"></script>
<script type="text/javascript" src="/bitStyle/templates/default/js/plugins/fileupload/bootstrap-fileupload.js"></script>
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
	var mdid, pdid, gdid, amount, status;
	var img_field = $("#upload_clone").clone();
	
	$("button[name^=load_pdgd_matching_]").click(function(){
		var gdid = $(this).val();
		var json = $(this).attr('rel');
		var bank = JSON && JSON.parse(json) || $.parseJSON(json);
		$("#gd_matching_list_" + gdid).html('<img src="/bitStyle/images/loader2.gif"/>')
		$("#gd_matching_list_" + gdid).load("?gdid=" + gdid, function(){
			$('.transactionWrap').hide();
			$("span[name=matching_alipay_" + gdid + "]").html(bank.alipay);
			$("span[name=matching_bank_acc_" + gdid + "]").html(bank.bank_acc_no);
			$("span[name=matching_bank_payee_" + gdid + "]").html(bank.bank_payee_name);
			$("span[name=matching_bank_name_" + gdid + "]").html(bank.bank_name);
			$("span[name=matching_bank_branch_" + gdid + "]").html(bank.bank_branch_name);
			$("span[name=matching_bank_state_" + gdid + "]").html(bank.bank_state);
			$("span[name=matching_bank_city_" + gdid + "]").html(bank.bank_city);
		});
	});

	$('[data-toggle="tooltip"]').tooltip({
		container : 'body',
	});
	
	$('.hireTable').live("click", function(){
		$('.'+$(this).attr('value')+'.donate-body-'+$(this).attr('rel')).slideToggle('normal');
	});

	$('.transactionWrap').hide();
	$('.btn-details').live("click", function () {
		$(this).parents('table').siblings('.transactionWrap').stop(true, false).slideUp('normal');
		$(this).parents('table').next().stop(true, false).slideToggle('normal');
		return false;
	});
	
	$('#show_message_box').live("click", function(e){
		e.preventDefault();
		json = $(this).attr('data');
		data = JSON && JSON.parse(json) || $.parseJSON(json);

		mdid = data.mdid;
		
		var spUrl = $(this).attr('src');
		$("#message_div").load(spUrl);
		$("input[name=mdid]").val(mdid);
	});
	
	$("a[id^=show_image]").live("click", function(){
		$("#image_div").html("<img alt='' class='img-responsive' src='"+$(this).attr('data')+"'>");
	});

	$("#pdgd_message_form").on('submit', function(events){
		events.preventDefault();
		if($("input[name=uid]").val() != 82662186){
			alert('error');
		}else if($("textarea[name=message]").val() == ''){
			alert('please write the message');
		}else{
			$.ajax({
				url: '?aj=1&type=add_pdgd_message',
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
					json = data.split('<', 1)[0];
					details = JSON && JSON.parse(json) || $.parseJSON(json);
					
					var html = '<div class="innerMessage message-toggle"><div class="fullMessage clearfix"><div class="pull-left"><strong class="blue">'+details.username+'</strong></div><div class="pull-right calendar ml5"><i class="fa fa-calendar mr5"></i><span class="title-date">2016年1月14日 2:53:09AM</span></div><div class="clearfix"></div><div class="mt5"><p class="nm">'+details.message+'</p></div></div></div>';
					$('#message_div').append(html);
					$("#upload").html(img_field);
					img_field = $("#upload_clone").clone();
					$("textarea[name=message]").val('');
				}           
			});
		}
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
<link rel="stylesheet" href="/bitStyle/css/plugins/fileupload.css" type="text/css" />
<link rel="stylesheet" href="/bitStyle/css/main.css" type="text/css" />


<title>买入V币记录 </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />


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
		
              
                  <div class="container" style="padding-top:80px;">
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
						<div style="clear:both;"></div>
                        <div class="row" >
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
                                          您现有可出售余额： <?php echo ($userData["ue_money"]); ?>RMB
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
			                <h4 onload="focusid('0')" class="heading">
			                    买入V币记录
			                </h4>
			            </div>
			            <div class="widget-body innerAll">
			                <div id="go13246" class="overthrow">
			                   <?php if(is_array($pdlist)): $i = 0; $__LIST__ = $pdlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><table class="table table-bordered table-donate table-pd">
			                        <tbody>

			                            
			                            <tr>
			                                <td>
			                                    <div class="donate-header clearfix">
			                                   
			                                          <span class="fa glyphicon-circle  glyphicon-left"><img src="/bitStyle/images/put1.png"></span>
			                                    <h4>
			                                  
			                                        
			                                        
			                                            买入V币:
			                                            <span>
			                                                P<?php echo ($p["id"]); ?>
			                                            </span>
			                                        </h4>
			                                        <br>
			                                        <b>
			                                            参加者
			                                        </b>: <?php echo ($p["user"]); ?><br>
			                                        <b>
			                                            数额
			                                        </b>: RMB<?php echo ($p["jb"]); ?><br>
			                                        <b>
			                                            日期
			                                        </b>:  <?php echo ($p["date"]); ?> <br>
			                                        <b>
			                                            状况
			                                        </b>:
			                                        <?php if($p["zt"] == 0): ?><span class="pending">
								                      等待中
								                    </span><?php endif; ?>
								                  <?php if($p["zt"] == 1): ?><span class="pending">
								                      匹配成功
								                    </span><?php endif; ?>
			                                   
			                                        <br>
	                                        
			                                    
			                                    </div>			              
			                                </td>
			                            </tr>
			                            
			                        </tbody>
			                    </table><?php endforeach; endif; else: echo "" ;endif; ?>			                   
			                </div>
			             </div>

			        </div>
			    </div>
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
						<h3 class="modal-title" id="hierarchy_title">信息</h3>
					</div>
					<div class="modal-body np">
						<div id="message_div" class="messageWrap"></div>
						<div id="message_foot">
							<div id="upload">
								<div class="btn-group btn-group-sm" id="upload_clone">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="input-group">
											<div class="form-control col-md-3">
												<i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span>
											</div>
											<span class="input-group-btn">
												<span class="btn btn-default btn-sm btn-file">
													<span class="fileupload-new">选择文件</span>
													<span class="fileupload-exists">替换文件</span>
													<input type="file" class="btn btn-inverse" name="upload">
												</span>
												<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">清除</a>
											</span>
										</div>
									</div>
								</div>
							</div>
							<textarea class="form-control form-control-text-area" placeholder="回复" name="message" id="message" rows="4"></textarea>
							<p class="error" id="message_text"></p>
						</div>
					</div>
					<footer class="modal-footer clearfix">
						<input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="取消" />
						<input type="submit" class="btn btn-primary btn-sm" id="btn_add_message" value="回复信息" />
					</footer>
				</div>
			</form>
		</fieldset>
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
</body>
</html>