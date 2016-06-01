<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if gt IE 8]> <html class="ie gt-ie8 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if !IE]><!-->
<html><!-- <![endif]-->
<head>


<script type="text/javascript" src="/bitStyle/js/jquery.js"></script>
<script type="text/javascript" src="/bitStyle/js/remaining.js"></script>
<script type="text/javascript" src="/bitStyle/js/layer.js"></script>

<script type="text/javascript">
    var _gNow = new Date();
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
    $('.login_remain_time').each(function(){
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
        true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000);        $('.login_remain_time').each(function(){
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
<link rel="stylesheet" href="/bitStyle/css/bootstrap.min.css" type="text/css" />


<title>会员注册 | 云致富万众普惠社区</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />

<!-- Favicons -->
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link href='/css/css?family=Roboto:500,400' rel='stylesheet' type='text/css'>

<style>
/* LOGIN PAGE ================================================== */
.login{
   background: url("/bitStyle/images/login-bg.jpg") no-repeat left top;
}
.login .navbar {
    min-height: initial;
    background: #0354b0;
    
}
.login ul[role="sub-navigation"] {margin:0}
.login .wrapper{
    max-width: 354px;
    min-width: 300px;
    margin: 140px auto 0;
    position: relative;
}
    .login .wrapper .brand{
        margin-bottom: 20px;
        text-align: center;
    }
        .login .wrapper .brand h2{
            font-size: 22px;
            color: #FFF;
            line-height: 32px;
            margin: 0;
            font-style: italic;
            text-shadow: 0px 1px 1px rgba(0,0,0,0.8);
        }
    .login .wrapper .widget{
        background: transparent;
        margin: 0 auto 15px;
    }
    .login .wrapper .widget .widget-body{
        background: #fafafa;
        background: rgba(250,250,250,0.85);
        position: relative;
        padding: 15px;
    }
    .login .wrapper .widget .widget-body h1{
        font-size: 20pt;
        /*text-align: center;*/
        margin: 10px 0 20px 0;
        display: block;
        text-shadow: 0 1px 0 #fff;
    }
    .login .wrapper .widget .widget-body label{
        font-size: 13px;
        color: #7c7c7c;
        font-weight: 500;
    }
    
    .login .wrapper input[type="text"], .login .wrapper input[type="password"] {
        font-size: 13px;
        height: auto;
        margin-bottom: 10px;
        padding: 5px 9px;
        box-shadow: inset 1px 1px 1px rgba(255,255,255,0),inset -1px -1px 1px rgba(0,0,0,0);
        background: #fff;
    }
    body.login .wrapper .password {
        float: right;
        font-size: 12px;
        font-weight: 400;
    }
    body.login .wrapper .separator{padding: 0 0 15px;}
    
    
    /* Navbar ============== */
    .navbar-nav > li > a {
        color: #ececec;
        font-size: 12px;
        padding: 10px;
    }
    .navbar-nav > li.active > a,
    .navbar-nav > li > a:focus,
    .navbar-nav > li > a:hover{
        outline: 0;
        background: #7d2118;
        box-shadow: inset 0px -1px 0px rgba(0,0,0,0.2);
    }
    .nav .open>a, .nav .open>a:hover, .nav .open>a:focus{
        background: #424242;
    }
    
    .navbar-nav>li>.dropdown-menu{
        background: #c0392b;
        border: 1px solid #a33024;
    }
        .navbar-nav>li>.dropdown-menu li a{
            color: #FFF;
            font-size: 12px;
            padding: 10px 15px;
        }
        .navbar-nav>li>.dropdown-menu li a:focus,
        .navbar-nav>li>.dropdown-menu li a:hover{
            background: #7d2118;
        }
        .dropdown-menu>.active>a,
        .dropdown-menu>.active>a:hover,
        .dropdown-menu>.active>a:focus{background: #424242;}
    
    /* Navbar Right - Language Dropdown ============== */
    [class*="language-sel-"] {
        width:16px;
        height:11px;
        top: 1px;
        margin-right:5px;
        position: relative;
        display: inline-block;
    }
    
    /* Button ============== */
    .btn-inverse{
        background: #45484d;
        color: #fff;
    }
    .btn-inverse:focus,
    .btn-inverse:hover{
        color: #fff;
        background: #222;
    }
    
    
    /* Copyright ============== */
    .copyright{
        color: #FFF;
        text-align: center;
        text-shadow: 0px 1px 2px #000;
    }
    
    
    @media (max-width: 767px){
        .navbar-toggle .icon-bar{background: #FFF;}
        
        nav[role="main-navigation"]{
            float: none;
            margin: 0 !important;
        }
        
        ul[role="sub-navigation"]{text-align: right; margin: 0;}
        ul[role="sub-navigation"] > li{display: inline-block;}
        ul[role="sub-navigation"] .open .dropdown-menu{
            position: absolute;
            float: left;
            left: auto;
            right: 0;
            background-color: #000
        }
        ul[role="sub-navigation"] .open .dropdown-menu li a{
            text-align: left;
            padding: 5px 15px;
        }
    }
</style>

</head>
<body class="login">





<div class="container">             
    <div class="innerContent">  
        <div class="row">
            <div class="col-md-12" style="max-width:800px">                                                                                             
                
                <form class="form-horizontal margin-none" name="register_form" action="/Home/Reg/forgotcl.html" method="post">                 
                
                    <div class="widget widget-body-white padding-none">
                        <div class="widget-head">
                            <h4 class="heading" style="color:#FFF">找回密码</h4>
                        </div>
                        <div class="widget-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label" style="color:#FFF">登录账号<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="account" name="account" value="" type="text"/></div>
                            </div> 
         
                           <div class="form-group">
                                <label class="col-md-3 control-label" style="color:#FFF">安全问题<span class="ast">*</span></label>
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
                                <label class="col-md-3 control-label" style="color:#FFF">问题答案<span class="ast">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="adsfd form-control" autocomplete="off" id="answer" name="answer">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" style="color:#FFF">登录密码<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="password" name="password"  type="password"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" style="color:#FFF">确认密码<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="cpassword" name="repassword"  type="password"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" style="color:#FFF">二级密码<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="password2" name="secpwd"  type="password"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" style="color:#FFF">确认二级密码<span class="ast">*</span></label>
                                <div class="col-md-9"><input class="form-control" id="cpassword2" name="resecpwd"  type="password"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" style="color:#FFF">验证码<span class="ast">*</span></label>
                                <div class="col-md-6"><input class="form-control" name="yzm"  type="password"></div>
                      
                			<img height="30" onClick="this.src='<?php echo U('Login/verify');?>?'+Math.random();" id="myHeader" name="myHeader" src="<?php echo U('Login/verify');?>" class="col-md-3">
                         </div>                           
                            
                        </div>          
                                        
                    </div>
                    
                    

                    <div class="widget widget-body-white padding-none">                     
                        <div class="data-footer innerAll half text-right clearfix" style="text-align:center; padding:10px;">
                            <input  type="submit" class="btn btn-block btn-primary" value="找回密码">                         
                            <input type="hidden" name="MemberId" value="-1" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="/bitStyle/js/modernizr.js"></script>
<script type="text/javascript" src="/bitStyle/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/bitStyle/js/jquery.cookie.js"></script>


</body>
</html>