<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0022) -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
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
<link rel="stylesheet" href="/Public/Uploadify/uploadify.css"/>
<script type="text/javascript" src='/Public/Uploadify/jquery.uploadify.min.js'></script>
 <script type='text/javascript'>
    
        var PUBLIC = '/Public';
        var uploadUrl = '<?php echo U("Common/uploadFace");?>';
        var ROOT = '';
    </script>




 
 
 
 <script type="text/javascript">
 //上传插件
$(function() {
 
 $('#face').uploadify({
		swf : PUBLIC + '/Uploadify/uploadify.swf',	//引入Uploadify核心Flash文件
		uploader : uploadUrl,	//PHP处理脚本地址
		width : 120,	//上传按钮宽度
		height : 30,	//上传按钮高度
		buttonImage : PUBLIC + '/Uploadify/browse-btn.png',	//上传按钮背景图地址
		fileTypeDesc : 'Image File',	//选择文件提示文字
		fileTypeExts : '*.jpeg; *.jpg; *.png; *.gif',	//允许选择的文件类型
//		formData : {'session_id' : sid},
		//上传成功后的回调函数
		onUploadSuccess : function (file, data, response) {
			eval('var data = ' + data);
			if (data.status) {
				$('#face-img').attr('src', ROOT + '/Uploads/' + data.path);
				$('input[name=face180]').val('/Uploads/'+data.path);
			} else {
				alert(data.msg);
			}
		}
	});
 
 
 });
 </script>
<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
<body>

<!-- Main Wrapper -->

  <div class="color-line"></div>
            <div class="modal-header">
                <h5 class="modal-title" id="title24">买入V币者-超过48小时未打款投诉</h5>
                <small class="font-bold"></small>
            </div> <form class="" method="post" id="pfrom" enctype="multipart/form-data" action="/Home/Index/home_ddxx_g_wdk_cl/">
			<div class="modal-body" style="height:300px;">
                匹配成功后,想尽快的收到款,请立即与"买入V币"用户取得联系(电话或威信)!<br>
              如果重匹配成功起48小时内会员未打款,可以在此投诉,管理员审核通过后将重新匹配!
				<br>

                <input type="radio" class="comfir" value="1" name="comfir">确认投诉<br>
                <input type="radio" class="comfir" value="2" name="comfir">取消投诉<br>
                <!--<input type="radio" class="comfir" value="3" name="comfir"/>延长付款24小时<br>-->

                <input type="hidden" value="<?php echo ($id); ?>" id="id" name="id"><br>
<br>

<input name="提交" type="submit" id="提交" value="提交" class="btn-primary">
            </div>
			</form>
<!--gethelp modal end-->






</body></html>