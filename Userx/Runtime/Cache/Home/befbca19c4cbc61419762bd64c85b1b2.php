<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0022) -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
    <!-- Page title -->
    <title>TVB国际互助 | 互助 慈善 付出 赠与</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="/assets/vendor/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="/assets/vendor/metisMenu/dist/metisMenu.css">
    <link rel="stylesheet" href="/assets/vendor/animate.css/animate.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendor/sweetalert/lib/sweet-alert.css">
    <link rel="stylesheet" href="/assets/vendor/toastr/build/toastr.min.css">
    

    <!-- App styles -->
    <link rel="stylesheet" href="/assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="/assets/fonts/pe-icon-7-stroke/css/helper.css">
    <link rel="stylesheet" href="/assets/styles/style.css">

<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
<body>

<!-- Main Wrapper -->

 <p><strong>订单号码:R<span id="order_id"><?php echo ($ppddxx["id"]); ?></span></strong></p>

                <p>TVB国际互助会员请求援助总金额为:<font id="amount_order" color="#FF0000"><?php echo ($ppddxx["jb"]); ?></font>人民币</p>
                <p><strong>你必须在<font id="expire_date"></font>之前根据银行提供进一步的细节：</strong></p>

                <div style="border:1px solid #009">
                    <p>输入完整的受益人银行资料如下：</p>

                    <p><strong>受益人银行:<font id="bank_name"><?php echo ($g_user["yhmc"]); ?></font></strong></p>

                    <p><strong>受益人姓名:<font id="bank_user"><?php echo ($g_user["ue_truename"]); ?></font></strong></p>

                    <p><strong>受益人账户号码: <font id="bank_number"><?php echo ($g_user["yhzh"]); ?></font></strong></p>

                     <p><strong>受益人微信号: <font id="wechat"><?php echo ($g_user["weixin"]); ?></font></strong></p>

                      <p><strong>受益人支付宝: <font id="alipay"><?php echo ($g_user["zfb"]); ?></font></strong></p>

                   

                    <p>发送者的附加信息：为了更快速的确认，请在转账后发送 <font class="receiver_phone" color="#0000FF"></font></p>

                    <p>---------------------</p>

                    <p><font color="#FF0000">警告!</font>当转账时，请注意付款的用途，有的银行在转账时是要求指定的账号或者用户卡的。这是由于这笔货币会先转到代理银行中，之后再转到客户账户上。这种情况，你不可以人工翻译！请注意收件人的建议！</p>
                </div>
                <p>在提供帮助后，请按“我提供的帮助”按钮并附上付款确认文件(支票扫描、收据扫描或网上交易操作屏幕截图)放在一个新窗口上。</p>

                <p>在收到资金之前不要确认支付，因为确认了就不能撤销了，系统会默认你已经收到钱了！</p>

                <p><font color="#FF0000">注意!</font>由于一些银行希望我们要求你不能提及到关于TVB国际互助的支付目的，使用非标准的方式来表达即可！</p>

                <p>应一些参与者有效使用自己银行账号用于个人用途的要求，我们要求你增加订单总额最后两个数字，使你的转账身份识别更简单。例如订单R111111169转账3000.000，你可以转账3000.069人民币。谢谢。</p>
                <p><strong>接收者:<font id="receiver_lid"><?php echo ($g_user["ue_theme"]); ?></font>, 手机号:<font class="receiver_phone"><?php echo ($g_user["ue_phone"]); ?></font>,联系微信:<font class="receiver_wechat_contact"><?php echo ($g_user["weixin"]); ?></font></strong></p>
                <p><strong>接收者经理:<font id="receiver_manager_lid"><?php echo ($g_user_t["ue_theme"]); ?></font>,接收者经理手机号:<font id="receiver_manager_phone"><?php echo ($g_user_t["ue_phone"]); ?></font>,联系微信:<font class="receiver_manager_wechat_contact"><?php echo ($g_user_t["weixin"]); ?></font></strong></p>

                <p><strong>发送者:<font id="sender_lid"><?php echo ($p_user["ue_theme"]); ?></font>, 手机号:<font id="sender_phone"><?php echo ($p_user["ue_phone"]); ?></font>,联系微信:<font id="sender_wechat_contact"><?php echo ($p_user["weixin"]); ?></font></strong></p>
				
                <p><strong>发送者经理:<font id="sender_manager_lid"><?php echo ($p_user_t["ue_theme"]); ?></font>,发送者经理手机号:<font id="sender_manager_phone"><?php echo ($p_user_t["ue_phone"]); ?></font>,联系微信:<font id="sender_manager_wechat_contact"><?php echo ($p_user_t["weixin"]); ?></font></strong></p>

                <p><font color="#FF0000">注意！</font></p>

                <p>1)发送者必须提供指定的帮助金额

                </p><p>假如汇款或个人用户卡（一张没有连接系统），佣金由发送者支付；假如转账来自一个系统账户，佣金有系统支付。你将在适当的界面上显示出佣金总额。</p>

                <p>2)万一订单在<font id="expire_date"></font>还没有完成，你的账号将被封锁并不能再使用该系统。你的订单将给（转移）另一个参与者。</p>

                <p>附：万一请求没有全额显示在应用程序上，不要紧张！请求余额将在10天内全部接受回归你的应用程序中。
                    :-))</p>
<!--gethelp modal end-->




<script src="/cssmmm/jquery.min.js"></script>
<script src="/cssmmm/jquery-ui.min.js"></script>
<script src="/cssmmm/jquery.slimscroll.min.js"></script>
<script src="/cssmmm/bootstrap.min.js"></script>
<script src="/cssmmm/jquery.flot.js"></script>
<script src="/cssmmm/jquery.flot.resize.js"></script>
<script src="/cssmmm/jquery.flot.pie.js"></script>
<script src="/cssmmm/curvedLines.js"></script>
<script src="/cssmmm/index.js"></script>
<script src="/cssmmm/metisMenu.min.js"></script>
<script src="/cssmmm/icheck.min.js"></script>
<script src="/cssmmm/jquery.peity.min.js"></script>
<script src="/cssmmm/index(1).js"></script>
<script src="/cssmmm/sweet-alert.min.js"></script>
<script src="/cssmmm/toastr.min.js"></script>
<script src="/cssmmm/jquery.countdown.min.js"></script>


<!-- App scripts -->
<script src="/cssmmm/homer.js"></script>
<script src="/cssmmm/alert.js"></script>
<script src="/cssmmm/charts.js"></script>

<script>
    
   
</script>


<script>
    $(function () {
                
              $('.time_countdown').each(function()
            {
                var $this = $(this);
                var time = $this.data('time')+'';




                 var y = time.split(' ');
                  var ys  =  y[0].split('-');

                 var sd = y[1].split(':');

                 for (var i = 0; i < sd.length; i++) {
                     ys.push(sd[i]);
                 };

                 console.log(ys);

                var datez = new Date(ys[0],ys[1],ys[2],ys[3],ys[4],ys[5]).getTime();
                //datez = datez+172800000;


                var date = new Date(datez);
                    Y = date.getFullYear() + '/';
                    M = date.getMonth()+'/';
                    D = date.getDate() + ' ';
                    h = date.getHours() + ':';
                    m = date.getMinutes() + ':';
                    s = date.getSeconds(); 

                    dates = Y+M+D+h+m+s;
                    console.log(Y+M+D+h+m+s+'.......'); 

                $this.countdown(dates, function(event) {


                    $(this).text(
                            event.strftime('%-D 天 %-H 小时 %M 分钟 %S 秒')
                    );
                });

                datez = null;
            });   


           $("#canyuzhi").change(function(){

                //alert($(this).val());

                $("#regs").submit();


           });   


            var $from =  null;
            
            $(".cancel").click(function(){  
                $from = $(this).parents().eq(0);

           
                $div = $(this).parents().eq(2);
            
                
                //$("#myModa31").modal('toggle');
                var order_id = $(this).data('id');
                
                 swal({
                        title: "您确定要取消吗？",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "是的，我要取消",
                        cancelButtonText: "不，我不取消",
                        closeOnConfirm: false,
                        closeOnCancel: true },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.post('/tu/cancel_provide_request',{order_id:order_id},function(data){
                                if(data){
                                    swal("已取消", "取消成功.", "success");
                                    $div.remove();
                                }
                            });
                            
                        } else {
                            swal("", "", "error");
                        }
                    });
            
            });
            
            
            $(".cancel2").click(function(){ 
                $from = $(this).parents().eq(0);
                $div = $(this).parents().eq(2);
                
                
                //$("#myModa31").modal('toggle');
                var order_id = $(this).data('id');
                
                 swal({
                        title: "您确定要取消吗？",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "是的，我要取消",
                        cancelButtonText: "不，我不取消",
                        closeOnConfirm: false,
                        closeOnCancel: true },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.post('/tu/cancel_get_request',{order_id:order_id},function(data){
                                if(data){
                                    swal("已取消", "取消成功.", "success");
                                    $div.remove();
                            }
                            });
                            
                        } else {
                            swal("", "", "error");
                        }
                    });
            
            });
            
            
            
            
            $("#yes_cancel").click(function(){
            
                console.log($from);
                
                $("#wait").submit();
                //$from.submit();
            });
            
            

            
            /*$("#next32").click(function(){
                $("#myModa32").modal('toggle');
            });
            
            $("#next30").click(function(){
                $("#myModa30").modal('toggle');
            });*/
            
            
            
            
            $(".btngethelp").click(function(){
            $(".balance").val($(this).data("cp"));
            $(".sell").val($(this).data("cp"));
            $(".get_amount").val("");
            $("#wallet_type").val($(this).data("wallet_type"));
            $("#gethelpmodal").modal("toggle");
        });
         $(".get_amount").bind("change",function(){
                if(isNaN($(this).val())){
                $(this).val(0);
                }
            var ths=$(this).val();
            var mat=Math.floor(ths/10);
            $(this).val(mat*10);
            var amount=mat*10;
            var cp=parseInt($(".balance").val());
            var maxx=parseInt("2000");
            var min=parseInt("100");
            var getvalue=amount*7;
            $("#gh_amount").text(amount);
            $("#gh").text(getvalue);
            if(amount<=cp&&amount<=maxx&&amount>=min){
            $("#gh_amount").css("color","#00FF00");
            $("#gh").css("color","#00FF00");
            $('.btnconfirm').removeAttr("disabled");
            }else{
            $('.btnconfirm').attr('disabled',"true");
                $("#gh_amount").css("color","red");
                $("#gh").css("color","red");
                }
                 $("#amount_get").text(getvalue);
        });
            $(".btn_get_next").click(function () {
            //alert("ss");
                 var sstr = '';
                 $('.ckbox2').each(function(index, element) {
                if($(this).prop('checked')){
                        sstr+=$(this).val()+',';    
                    }
            });
            $("#payment_method2").val(sstr);
           $("#get_help").submit();
           //alert(1);
        });

        $("#select_fanshi").click(function(){

            var id = $("#comid").val();
            var status = $('.comfir:checked').val();

            $.post('/tu/updateStatus',{status:status,id:id},function(data){

                 if (data != 0) {

                     alert('操作成功!');
                    window.location.reload();
                }else
                {
                    alert('操作失败!');
                    window.location.reload();

                }

            });

        });


        $("#select_fanshi2").click(function(){

            var id = $("#completid").val();

            var status = $('.comfir2:checked').val();

            $("#pro_status").val(status);

            if(status == 1){
                $("#myModa25").modal('toggle');
            }else{

                $.post('/tu/cancel',{provide_status:status,id:id},function(data){

                    if(data != 0){

                        alert('操作成功');
                        window.location.reload();
                    }else{
                         alert('操作失败');
                        window.location.reload();
                    }

                });

            }

        });

        $("#select_fanshi3").click(function(){

            var id = $("#completid").val();

            $("#myModa25").modal('close');

        });







        
        
$('input:checkbox').each(function() {
        
        if ($(this).attr('checked') ==true) {
                alert($(this).val());
        }
});
        $(".addmsg").click(function(){

            var id = $(this).data('id');
            $("#orderid").text(id);

            $.post('/tu/showMsg',{id:id},function(data){

                var html = [];
                var htmlstr = null;

                console.log(eval(data));

                var data = eval(data);

                if(data){
                    for(var i= 0,len = data.length;i<len;i++){

                        html.push('<p>'+data[i].time+' , '+data[i].lid+'</p>');

                        html.push('<p>'+data[i].context+'</p>');

                    }
                    htmlstr = html.join('');
                    $("#msg").html(htmlstr);
                }else{
                    $("#msg").html('');
                }

            });


            $("#id").val($(this).data('id'));

            $("#mesg").focus();

        });

         $('.btn_next').click(function () {
             var str = '';
             $('.ckbox').each(function(index, element) {
                if($(this).prop('checked')){
                        str+=$(this).val()+','; 
                    }
            });
            
            $("#payment_method").val(str);
             
             var amount=$("#amount").val();
             $("#amountpay").text(amount*7);
         });

        $('.btnNext').click(function () {
            $("#provide_help").submit();
        });
        $(".btn_detail").click(function () {


            $("#expire_date").text($(this).data("expire_date"));
            $("#bank_number").text($(this).data("bank_number"));
            $("#bank_user").text($(this).data("bank_user"));
            $("#bank_name").text($(this).data("bank_name"));

            $("#wechat").text($(this).data("wechat"));

            $("#alipay").text($(this).data("alipay"));

            $("#order_id").text($(this).data('id'));
            $(".receiver_phone").text($(this).data("receiver_phone"));
            $("#sender_phone").text($(this).data("sender_phone"));
            $("#sender_lid").text($(this).data("sender_lid"));
            $("#receiver_lid").text($(this).data("receiver_lid"));
			 $(".receiver_wechat_contact").text($(this).data("receiver_wechat_contact"));
            $("#amount_order").text($(this).data('amount_order'));
			 $("#sender_wechat_contact").text($(this).data("sender_wechat_contact"));
            $("#sender_manager_lid").text($(this).data('sender_manager_lid'));
            $("#sender_manager_phone").text($(this).data('sender_manager_phone'));
			 $("#sender_manager_wechat_contact").text($(this).data('sender_manager_wechat_contact'));
            $("#receiver_manager_lid").text($(this).data('receiver_manager_lid'));
            $("#receiver_manager_phone").text($(this).data('receiver_manager_phone'));
			$(".receiver_manager_wechat_contact").text($(this).data('receiver_manager_wechat_contact'));


        });

        $(".provide_complete").click(function(){

            $("#expire_date2").text($(this).data("expire_date"));
            $("#bank_number2").text($(this).data("bank_number"));
            $("#bank_user2").text($(this).data("bank_user"));
            $("#bank_name2").text($(this).data("bank_name"));
            $("#mavro").text($(this).data('mavro'));
            $("#rmb").text(Number($(this).data('mavro'))*7);
            $("#comid").val($(this).data('id'));

        });


        $(".complete").click(function(){

            $("#completid").val($(this).data('id'));


        });



        var selec = $("#amount").val();
        var tt = selec * 7;
        $("#select").text(selec);
        $("#pay").text(tt);
        $("#amount").bind("change", function () {
            $("#select").text($("#amount").val());
            $("#pay").text($("#amount").val() * 7);
        });


        $("#ad").height($("#aa").css('height'));
        $("#bd").height($("#ba").css('height'));
        $("#cc").height($("#ca").css('height'));
    });

    //js timestamp -- data
    function formatDate(timestamp, accuracy) {
        var time = new Date(timestamp);
        var year = time.getFullYear();
        var month = time.getMonth() + 1;
        var date = time.getDate();
        var hour = time.getHours();
        var minute = time.getMinutes();
        var second = time.getSeconds();
        var result = "";

        switch (accuracy) {
            case "year":
            {
                result = year;
            }
                break;
            case "month":
            {
                result = year + "-" + month;
            }
                break;
            case "day":
            {
                result = year + "-" + month + "-" + date;
            }
                break;
            case "hour":
            {
                result = year + "-" + month + "-" + date + " " + hour + ":00";
            }
                break;
            case "minute":
            {
                result = year + "-" + month + "-" + date + " " + hour + ":" + minute;
            }
                break;
            case "second":
            {
                result = year + "-" + month + "-" + date + " " + hour + ":" + minute + ":" + second;
            }
                break;
            default:
                break;
        }
        return result;
    }


    src="

</script>

</body></html>