<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends CommonController {
	// 首页
	public function index() {
		$this->redirect('/Home/Index/home');
	}
	
  public function uploadify()
    {
        if (!empty($_FILES)) {
            //图片上传设置
            $config = array(   
                'maxSize'    =>    3145728, 
                'savePath'   =>    '',  
                'saveName'   =>    array('uniqid',''), 
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
                'autoSub'    =>    true,   
                'subName'    =>    array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if($images){
                $info=$images['Filedata']['savepath'].$images['Filedata']['savename'];
                //返回文件地址和名给JS作回调用
                echo $info;
            }
            else{
                //$this->error($upload->getError());//获取失败信息
            }
        }
    }


 public function english(){
 	$this->error('由于你未在该国。暂时无法提供该类服务!，对此我们感到很抱歉');
 }



 public function korea(){
 	$this->error('由于你未在该国。暂时无法提供该类服务!，对此我们感到很抱歉');
 }
	
	
public function home() {

		//////////////////----------
		$User = M ( 'tgbz' ); // 实例化User对象
		
		$map['user']=$_SESSION['uname'];
		$count = $User->where ( $map )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p = getpage($count,100);
		
		$tlist = $User->where ( $map )->order ( 'id DESC' )->limit ( $p->firstRow, $p->listRows )->select ();
						if(!empty($tlist)) {
			foreach($tlist as $t_key=>$t_value) {
				if($p_value['zt'] == 0) {
					$pay_limit_time = floor((strtotime($t_value['date']) + $jjdktime * 3600 - time())/3600);
					$tlist[$t_key]['pay_limit_time'] = empty($pay_limit_time)? 0:$pay_limit_time;
				}
			}
		}
		$this->assign ( 'tlist', $tlist ); // 赋值数据集
		$this->assign ( 'page', $p->show() ); // 赋值分页输出
		/////////////////----------------
		
		
		
		
		//////////////////----------
		$User = M ( 'jsbz' ); // 实例化User对象
		
		$map1['user']=$_SESSION['uname'];
		$count1 = $User->where ( $map1 )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p1 = getpage($count1,100);
		
		$jlist = $User->where ( $map1 )->order ( 'id DESC' )->limit ( $p1->firstRow, $p1->listRows )->select ();
		$jjdktime = C('jjdktime');
		$this->assign ( 'jlist', $jlist ); // 赋值数据集
		$this->assign ( 'jjdktime', $jjdktime ); // 赋值数据集
		$this->assign ( 'page1', $p1->show() ); // 赋值分页输出
		/////////////////----------------
		
		
		//推广链接
		$userInfo = $User->where ( $map )->find();
		$tgurl = "http://" . $_SERVER["HTTP_HOST"] . u("Reg/index", array("uname" => $map1['user']));
		$this->tgurl = $tgurl;
		//////////////////----------
		$User = M ( 'ppdd' ); // 实例化User对象
		
		$map2['p_user']=$_SESSION['uname'];
		$count2 = $User->where ( $map2 )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p2 = getpage($count2,100);
		
		$plist = $User->where ( $map2 )->order ( 'id DESC' )->limit ( $p2->firstRow, $p2->listRows )->select ();
				if(!empty($plist)) {
			foreach($plist as $p_key=>$p_value) {
				if($p_value['zt'] == 0) {
					//$pay_limit_time = floor((strtotime($p_value['date']) + $jjdktime * 3600 - time())%($jjdktime * 3600)/3600);
					$pay_limit_time = floor((strtotime($p_value['date']) + $jjdktime * 3600 - time())/3600);
					$pay_limit_time_min = floor((strtotime($p_value['date']) + $jjdktime * 3600 - time())%($jjdktime * 3600)/60%60);
					$plist[$p_key]['pay_limit_time'] = $pay_limit_time . '小时' . abs($pay_limit_time_min) . '分';
				}
				if($p_value['zt'] == 1) {
					//$pay_limit_time = floor((strtotime($p_value['date_hk']) + $jjdktime * 3600 - time())%($jjdktime * 3600)/3600);
					$pay_limit_time = floor((strtotime($p_value['date_hk']) + $jjdktime * 3600 - time())/3600);
					$pay_limit_time_min = floor((strtotime($p_value['date_hk']) + $jjdktime * 3600 - time())%($jjdktime * 3600)/60%60);
					$plist[$p_key]['pay_limit_time'] = $pay_limit_time . '小时' . abs($pay_limit_time_min) . '分';
				}
			}
		}
		$this->assign ( 'plist', $plist ); // 赋值数据集
		$this->assign ( 'page2', $p2->show() ); // 赋值分页输出
		/////////////////----------------
		
		
		//////////////////----------
		$User = M ( 'ppdd' ); // 实例化User对象
		
		$map3['g_user']=$_SESSION['uname'];
		$count3 = $User->where ( $map3 )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p3 = getpage($count3,100);
		
		$list3 = $User->where ( $map3 )->order ( 'id DESC' )->limit ( $p3->firstRow, $p3->listRows )->select ();
		if(!empty($list3)) {
			foreach($list3 as $l_key=>$l_value) {
				if($l_value['zt'] == 0) {
					//$pay_limit_time = floor((strtotime($l_value['date']) + $jjdktime * 3600 - time())/3600);
					$pay_limit_time = floor((strtotime($l_value['date']) + $jjdktime * 3600 - time())/3600);
					$pay_limit_time_min = floor((strtotime($l_value['date']) + $jjdktime * 3600 - time())%($jjdktime * 3600)/60%60);
					$list3[$l_key]['pay_limit_time'] = $pay_limit_time . '小时' . abs($pay_limit_time_min) . '分';
				}
				if($l_value['zt'] == 1) {
					$pay_limit_time = floor((strtotime($l_value['date_hk']) + $jjdktime * 3600 - time())/3600);
					$pay_limit_time_min = floor((strtotime($l_value['date_hk']) + $jjdktime * 3600 - time())%($jjdktime * 3600)/60%60);
					$list3[$l_key]['pay_limit_time'] = $pay_limit_time . '小时' . abs($pay_limit_time_min) . '分';
				}
			}
		}
		$this->assign ( 'glist', $list3 ); // 赋值数据集
		$this->assign ( 'page3', $p3->show() ); // 赋值分页输出
		/////////////////----------------
		
		$this->display ( 'home' );
	}



	public function jingli(){
		//////////////////----------
		$User = M ( 'tgbz' ); // 实例化User对象
		
		$map['user']=$_SESSION['uname'];
		$count = $User->where ( $map )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p = getpage($count,100);
		
		$tlist = $User->where ( $map )->order ( 'id DESC' )->limit ( $p->firstRow, $p->listRows )->select ();
		$this->assign ( 'tlist', $tlist ); // 赋值数据集
		$this->assign ( 'page', $p->show() ); // 赋值分页输出
		/////////////////----------------
		
		
		
		
		//////////////////----------
		$User = M ( 'jsbz' ); // 实例化User对象
		
		$map1['user']=$_SESSION['uname'];
		$count1 = $User->where ( $map1 )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p1 = getpage($count1,100);
		
		$jlist = $User->where ( $map1 )->order ( 'id DESC' )->limit ( $p1->firstRow, $p1->listRows )->select ();
		$this->assign ( 'jlist', $jlist ); // 赋值数据集
		$this->assign ( 'page1', $p1->show() ); // 赋值分页输出
		/////////////////----------------
		
		
		//推广链接
		$userInfo = $User->where ( $map )->find();
		$tgurl = "http://" . $_SERVER["HTTP_HOST"] . u("Reg/index", array("uname" => $map1['user']));
		$this->tgurl = $tgurl;
		//////////////////----------
		$User = M ( 'ppdd' ); // 实例化User对象
		
		$map2['p_user']=$_SESSION['uname'];
		$count2 = $User->where ( $map2 )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p2 = getpage($count2,100);
		
		$plist = $User->where ( $map2 )->order ( 'id DESC' )->limit ( $p2->firstRow, $p2->listRows )->select ();
		$this->assign ( 'plist', $plist ); // 赋值数据集
		$this->assign ( 'page2', $p2->show() ); // 赋值分页输出
		/////////////////----------------
		
		
		//////////////////----------
		$User = M ( 'ppdd' ); // 实例化User对象
		
		$map3['g_user']=$_SESSION['uname'];
		$count3 = $User->where ( $map3 )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p3 = getpage($count3,100);
		
		$list3 = $User->where ( $map3 )->order ( 'id DESC' )->limit ( $p3->firstRow, $p3->listRows )->select ();
		$this->assign ( 'glist', $list3 ); // 赋值数据集
		$this->assign ( 'page3', $p3->show() ); // 赋值分页输出
		/////////////////----------------
		
/*		$this->assign ( 'mm001', C("mm001") );
		$this->assign ( 'mm002', C("mm002") );
		$this->assign ( 'mm003', C("mm003") );
		$this->assign ( 'mm004', C("mm004") );
		$this->assign ( 'mm005', C("mm005") );

		$this->assign ( 'jj01s', C("jj01s") );
		$this->assign ( 'jj01m', C("jj01m") );
		$this->assign ( 'jj01', C("jj01") );
		$this->assign ( 'jjdktime', C("jjdktime") );

		//提现设置
		$this->assign ( 'jl_start', C("jl_start") );
		$this->assign('jl_e',C('jl_e'));
		$this->assign ( 'jl_beishu', C("jl_beishu") );*/
		$this->display ( 'jingli' );

	}



	public function tuijian(){
		//////////////////----------
		$User = M ( 'tgbz' ); // 实例化User对象
		
		$map['user']=$_SESSION['uname'];
		$count = $User->where ( $map )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p = getpage($count,100);
		
		$tlist = $User->where ( $map )->order ( 'id DESC' )->limit ( $p->firstRow, $p->listRows )->select ();
		$this->assign ( 'tlist', $tlist ); // 赋值数据集
		$this->assign ( 'page', $p->show() ); // 赋值分页输出
		/////////////////----------------
		
		
		
		
		//////////////////----------
		$User = M ( 'jsbz' ); // 实例化User对象
		
		$map1['user']=$_SESSION['uname'];
		$count1 = $User->where ( $map1 )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p1 = getpage($count1,100);
		
		$jlist = $User->where ( $map1 )->order ( 'id DESC' )->limit ( $p1->firstRow, $p1->listRows )->select ();
		$this->assign ( 'jlist', $jlist ); // 赋值数据集
		$this->assign ( 'page1', $p1->show() ); // 赋值分页输出
		/////////////////----------------
		
		
		//推广链接
		$userInfo = $User->where ( $map )->find();
		$tgurl = "http://" . $_SERVER["HTTP_HOST"] . u("Reg/index", array("uname" => $map1['user']));
		$this->tgurl = $tgurl;
		//////////////////----------
		$User = M ( 'ppdd' ); // 实例化User对象
		
		$map2['p_user']=$_SESSION['uname'];
		$count2 = $User->where ( $map2 )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p2 = getpage($count2,100);
		
		$plist = $User->where ( $map2 )->order ( 'id DESC' )->limit ( $p2->firstRow, $p2->listRows )->select ();
		$this->assign ( 'plist', $plist ); // 赋值数据集
		$this->assign ( 'page2', $p2->show() ); // 赋值分页输出
		/////////////////----------------
		
		
		//////////////////----------
		$User = M ( 'ppdd' ); // 实例化User对象
		
		$map3['g_user']=$_SESSION['uname'];
		$count3 = $User->where ( $map3 )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p3 = getpage($count3,100);
		
		$list3 = $User->where ( $map3 )->order ( 'id DESC' )->limit ( $p3->firstRow, $p3->listRows )->select ();
		$this->assign ( 'glist', $list3 ); // 赋值数据集
		$this->assign ( 'page3', $p3->show() ); // 赋值分页输出
		/////////////////----------------
		
	
/*
		//提现设置
		$this->assign ( 'tj_start', C("tj_start") );
		$this->assign('tj_e',C('tj_e'));
		$this->assign ( 'tj_beishu', C("tj_beishu") );*/
		$this->display ( 'tuijian' );
	}

	
	// 注册模块
	public function reg() {
		//////////////////----------
		$User = M ( 'user' ); // 实例化User对象
	
			$map['zcr']=$_SESSION['uname'];
		$count = $User->where ( $map )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p = getpage($count,20);
		iniInfo();
		$list = $User->where ( $map )->order ( 'UE_ID DESC' )->limit ( $p->firstRow, $p->listRows )->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $p->show() ); // 赋值分页输出
		/////////////////----------------
		
		$this->email=sprintf("%0".strlen(9)."d", mt_rand(0,99999999999)).'@qq.com';
		
		$this->pin1=M('pin')->where(array('user'=>$_SESSION['uname'],'zt'=>'0'))->find();
		//dump($pin1);die;
		$this->moren = $_SESSION ['uname'];
		$this->display ( 'reg' );
	}
	
	// 添加会员
	public function regadd() {
		$dqzhxx=M('user')->where(array('UE_account'=>$_SESSION['uname']))->find();
		if(0){
		//if($dqzhxx['sfjl']==0){
			die("<script>alert('您不是经理,不可注册会员!');history.back(-1);</script>");
		}else{
			$data_P = I ( 'post.' );
			
			//$this->ajaxReturn( $data_P ['account1']);
			$data_arr ["UE_account"] = $data_P ['email'];
			$data_arr ["UE_account1"] = $data_P ['email'];
			$data_arr ["UE_accName"] = $data_P ['pemail'];
			$data_arr ["UE_accName1"] = $data_P ['pemail'];
			$data_arr ["UE_theme"] = $data_P ['username'];
			$data_arr ["UE_password"] = $data_P ['password'];
			$data_arr ["UE_repwd"] = $data_P ['password2'];
			$data_arr ["pin"] = $data_P ['code'];
			$data_arr ["pin2"] = $data_P ['code'];
			$data_arr ["UE_secpwd"] = $data_P ['secpwd'];
			$data_arr ["UE_resecpwd"] = $data_P ['resecpwd'];
			$data_arr ["UE_status"] = '0'; // 用户状态
			$data_arr ["UE_level"] = '0'; // 用户等级
			$data_arr ["UE_check"] = '1'; // 是否通过验证
			//$data_arr ["UE_sfz"] = $data_P ['sfz'];
			$data_arr ["UE_truename"] = $data_P ['username'];
			//$data_arr ["UE_qq"] = $data_P ['qq'];
			$data_arr ["UE_phone"] = $data_P ['phone'];

			$data_arr ["UE_question"] = $data_P['question'];

            $data_arr ["UE_answer"] = $data_P['answer'];
			//$data_arr ["email"] = $data_P ['email'];
			$data_arr ["UE_regIP"] = get_client_ip();
			$data_arr ["zcr"] = $_SESSION['uname'];
			$data_arr ["UE_regTime"] = date ( 'Y-m-d H:i:s', time () );
			//$data_arr ["__hash__"] = $data_P ['__hash__'];
			//$this->ajaxReturn($data_arr ["UE_theme"]);die;
			$data = D ( User );
			
			
			//dump($data_arr);die;
			
			 
			if ($data->create ( $data_arr )) {
				
				if(I ( 'post.ty' )<>'ye'){
					$this->error('请先勾选,我已完全了解所有风险!');
					/*$this->ajaxReturn(array(
							'error' =>1,
							'msg' => '请先勾选,我已完全了解所有风险!',
						));*/
				}else{
				
				if ($data->add ()) {
					//
				if(M('pin')->where(array('pin'=>$data_P ['code']))->save(array('zt'=>'1','sy_user'=>$data_P ['email'],'sy_date'=>date ( 'Y-m-d H:i:s', time () )))){
					//===2015/12/1 QQ54885782 add
					mmtjrennumadd($data_arr ["UE_accName"]);
					//===end
					jlsja($data_P ['pemail']);
					newuserjl($data_P ['email'],C("reg_jiangli"),'新用户注册奖励'.C("reg_jiangli").'元');
					/*$this->ajaxReturn(array(
							'error' =>0,
							'msg' => '注册成功!',
						));*/
					$this->success('注册成功！',U('Index/home'));
					}else{
						$this->error('注册会员失败,继续注册请刷新页面!');
						/*$this->ajaxReturn(array(
							'error' =>1,
							'msg' => '注册会员失败,继续注册请刷新页面!',
						));*/
					    
					}
				} else {
					$this->error('注册会员失败,继续注册请刷新页面!');
						/*$this->ajaxReturn(array(
							'error' =>1,
							'msg' => '注册会员失败,继续注册请刷新页面!',
						));*/
		
				}
				}
			} else {
				//$this->success( );
				/*die("<script>alert('".$data->getError ()."');history.back(-1);</script>");*/

				$this->error($data->getError ());
				//$this->ajaxReturn( array('nr'=>,'sf'=>0) );
			}
		}
	}
	
	
	public function reg2() {
	
			$this->data_P = I ( 'get.' );
			$this->display('reg2');
			
	}
	
	
	// 新闻列表页
	public function news() {
		$User = M ( 'info' ); // 实例化User对象
		$count = $User->where ( array (
				'IF_type' => 'news' 
		) )->count (); // 查询满足要求的总记录数
		$page = new \Think\Page ( $count, 20 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		                                       
		// $page->lastSuffix=false;
		$page->setConfig ( 'header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录    第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>' );
		$page->setConfig ( 'prev', '上一页' );
		$page->setConfig ( 'next', '下一页' );
		$page->setConfig ( 'last', '末页' );
		$page->setConfig ( 'first', '首页' );
		$page->setConfig ( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
		;
		
		$show = $page->show (); // 分页显示输出
		                        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where ( array (
				'IF_type' => 'news' 
		) )->order ( 'IF_ID DESC' )->limit ( $page->firstRow . ',' . $page->listRows )->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $show ); // 赋值分页输出
		
		
		
		
		//////////////////----------
		$User = M ( 'info' ); // 实例化User对象
		
		$map1['IF_type']='bzzx';
		$count1 = $User->where ( $map1 )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p1 = getpage($count1,100);
		
		$list1 = $User->where ( $map1 )->order ( 'IF_ID DESC' )->limit ( $p1->firstRow, $p1->listRows )->select ();
		$this->assign ( 'list1', $list1 ); // 赋值数据集
		$this->assign ( 'page1', $p1->show() ); // 赋值分页输出
		
		
		
		
		$this->display ( 'news' ); // 输出模板
	}
	// 新闻内页
	public function newsPage() {
		header ( "Content-Type:text/html; charset=utf-8" );
		$id = I ( 'id' );
		$data = M ( 'info' )->where ( array (
				'IF_ID' => $id 
		) )->find ();
		$this->data = $data;
		$this->display ( 'news_page' );
	}


	// 帮助中心
	public function helpCenter() {
		header ( "Content-Type:text/html; charset=utf-8" );
		$User = M ( 'infoweb' ); // 实例化User对象
		$count = $User->where ( array (
				'IW_type' => 'bzzx' 
		) )->count (); // 查询满足要求的总记录数
		$page = new \Think\Page ( $count, 20 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		                                       
		// $page->lastSuffix=false;
		$page->setConfig ( 'header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录    第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>' );
		$page->setConfig ( 'prev', '上一页' );
		$page->setConfig ( 'next', '下一页' );
		$page->setConfig ( 'last', '末页' );
		$page->setConfig ( 'first', '首页' );
		$page->setConfig ( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
		;
		
		$show = $page->show (); // 分页显示输出
		                        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where ( array (
				'IW_type' => 'bzzx' 
		) )->order ( 'IW_ID DESC' )->limit ( $page->firstRow . ',' . $page->listRows )->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $show ); // 赋值分页输出
		$this->display ( 'bzzx' ); // 输出模板
	}
	// 帮助中心内页
	public function helpCenterPage() {
		header ( "Content-Type:text/html; charset=utf-8" );
		$id = I ( 'id' );
		$data = M ( 'infoweb' )->where ( array (
				'IW_ID' => $id 
		) )->find ();
		$this->data = $data;
		$this->display ( 'bzzx_xx' );
	}
	// 新手入门
	public function novice() {
		header ( "Content-Type:text/html; charset=utf-8" );
		$data = M ( 'infoweb' )->where ( array (
				'IW_ID' => 11 
		) )->find ();
		$this->data = $data;
		$this->display ( 'bzzx_xx' );
	}
	// 安全中心
	public function safe() {
		
		$this->mbzt = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();
		
		$this->display ( 'zhaq' );
	}
	// 一键收币
	
	// 金币明细
	public function jbmx() {
		header ( "Content-Type:text/html; charset=utf-8" );
		$User = M ( 'userget' ); // 实例化User对象
		$date1 = I ( 'post.date1', '', '/^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$/' );
		$date2 = I ( 'post.date2', '', '/^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$/' );
		$map ['UG_account'] = $_SESSION ['uname'];
		$map ['UG_type'] = 'jb';
		//$map ['UG_dataType'] = array('IN',array('mrfh','tjj','kdj','mrldj','glj'));
		
		if (! empty ( $date1 ) && ! empty ( $date2 )) {
			$map ['UG_getTime'] = array (
					array (
							'gt',
							$date1 
					),
					array (
							'lt',
							$date2 
					),
					'and' 
			);
		}
		$count = $User->where ( $map )->count (); // 查询满足要求的总记录数
		$page = new \Think\Page ( $count, 12 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		                                        
		// $page->lastSuffix=false;
		$page->setConfig ( 'header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录    第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>' );
		$page->setConfig ( 'prev', '上一页' );
		$page->setConfig ( 'next', '下一页' );
		$page->setConfig ( 'last', '末页' );
		$page->setConfig ( 'first', '首页' );
		$page->setConfig ( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
		;
		
		$show = $page->show (); // 分页显示输出
		                        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where ( $map )->order ( 'UG_ID DESC' )->limit ( $page->firstRow . ',' . $page->listRows )->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $show ); // 赋值分页输出
		
		
		$ztj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'tjj'))->sum('UG_money');
		$ztj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'tjj'))->sum('UG_integral');
		$this->ztj = $ztj1+$ztj2;
		
		
		$bdj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'kdj'))->sum('UG_money');
		$bdj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'kdj'))->sum('UG_integral');
		$this->bdj = $bdj1+$bdj2;
		
		$fhj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrfh'))->sum('UG_money');
		$fhj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrfh'))->sum('UG_integral');
		$this->fhj = $fhj1+$fhj2;
		
		$ldj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrldj'))->sum('UG_money');
		$ldj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrldj'))->sum('UG_integral');
		$this->ldj = $ldj1+$ldj2;
		
		
		$glj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'glj'))->sum('UG_money');
		$glj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'glj'))->sum('UG_integral');
		$this->glj = $glj1+$glj2;
		
		
		
		
		$this->display ( 'jbmx' ); // 输出模板
	}
	
	public function ybmx() {
		header ( "Content-Type:text/html; charset=utf-8" );
		$User = M ( 'userget' ); // 实例化User对象
		$date1 = I ( 'post.date1', '', '/^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$/' );
		$date2 = I ( 'post.date2', '', '/^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$/' );
		$map ['UG_account'] = $_SESSION ['uname'];
		$map ['UG_type'] = 'yb';
		//$map ['UG_dataType'] = array('IN',array('mrfh','tjj','kdj','mrldj','glj'));
	
		if (! empty ( $date1 ) && ! empty ( $date2 )) {
			$map ['UG_getTime'] = array (
					array (
							'gt',
							$date1
					),
					array (
							'lt',
							$date2
					),
					'and'
			);
		}
		$count = $User->where ( $map )->count (); // 查询满足要求的总记录数
		$page = new \Think\Page ( $count, 12 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
	
		// $page->lastSuffix=false;
		$page->setConfig ( 'header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录    第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>' );
		$page->setConfig ( 'prev', '上一页' );
		$page->setConfig ( 'next', '下一页' );
		$page->setConfig ( 'last', '末页' );
		$page->setConfig ( 'first', '首页' );
		$page->setConfig ( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
		;
	
		$show = $page->show (); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where ( $map )->order ( 'UG_ID DESC' )->limit ( $page->firstRow . ',' . $page->listRows )->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $show ); // 赋值分页输出
	
	
		$ztj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'tjj'))->sum('UG_money');
		$ztj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'tjj'))->sum('UG_integral');
		$this->ztj = $ztj1+$ztj2;
	
	
		$bdj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'kdj'))->sum('UG_money');
		$bdj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'kdj'))->sum('UG_integral');
		$this->bdj = $bdj1+$bdj2;
	
		$fhj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrfh'))->sum('UG_money');
		$fhj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrfh'))->sum('UG_integral');
		$this->fhj = $fhj1+$fhj2;
	
		$ldj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrldj'))->sum('UG_money');
		$ldj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrldj'))->sum('UG_integral');
		$this->ldj = $ldj1+$ldj2;
	
	
		$glj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'glj'))->sum('UG_money');
		$glj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'glj'))->sum('UG_integral');
		$this->glj = $glj1+$glj2;
	
	
	
	
		$this->display ( 'ybmx' ); // 输出模板
	}
	
	public function zsbmx() {
		header ( "Content-Type:text/html; charset=utf-8" );
		$User = M ( 'userget' ); // 实例化User对象
		$date1 = I ( 'post.date1', '', '/^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$/' );
		$date2 = I ( 'post.date2', '', '/^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$/' );
		$map ['UG_account'] = $_SESSION ['uname'];
		$map ['UG_type'] = 'zsb';
		//$map ['UG_dataType'] = array('IN',array('mrfh','tjj','kdj','mrldj','glj'));
	
		if (! empty ( $date1 ) && ! empty ( $date2 )) {
			$map ['UG_getTime'] = array (
					array (
							'gt',
							$date1
					),
					array (
							'lt',
							$date2
					),
					'and'
			);
		}
		$count = $User->where ( $map )->count (); // 查询满足要求的总记录数
		$page = new \Think\Page ( $count, 12 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
	
		// $page->lastSuffix=false;
		$page->setConfig ( 'header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录    第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>' );
		$page->setConfig ( 'prev', '上一页' );
		$page->setConfig ( 'next', '下一页' );
		$page->setConfig ( 'last', '末页' );
		$page->setConfig ( 'first', '首页' );
		$page->setConfig ( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
		;
	
		$show = $page->show (); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where ( $map )->order ( 'UG_ID DESC' )->limit ( $page->firstRow . ',' . $page->listRows )->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $show ); // 赋值分页输出
	
	
		$ztj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'tjj'))->sum('UG_money');
		$ztj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'tjj'))->sum('UG_integral');
		$this->ztj = $ztj1+$ztj2;
	
	
		$bdj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'kdj'))->sum('UG_money');
		$bdj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'kdj'))->sum('UG_integral');
		$this->bdj = $bdj1+$bdj2;
	
		$fhj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrfh'))->sum('UG_money');
		$fhj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrfh'))->sum('UG_integral');
		$this->fhj = $fhj1+$fhj2;
	
		$ldj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrldj'))->sum('UG_money');
		$ldj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrldj'))->sum('UG_integral');
		$this->ldj = $ldj1+$ldj2;
	
	
		$glj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'glj'))->sum('UG_money');
		$glj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'glj'))->sum('UG_integral');
		$this->glj = $glj1+$glj2;
	
	
	
	
		$this->display ( 'zsbmx' ); // 输出模板
	}
	
	
	// 奖金明细
	public function jjjl() {
		header ( "Content-Type:text/html; charset=utf-8" );
		$User = M ( 'userget' ); // 实例化User对象
		$date1 = I ( 'post.date1', '', '/^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$/' );
		$date2 = I ( 'post.date2', '', '/^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$/' );
		$map ['UG_account'] = $_SESSION ['uname'];
		$map ['UG_dataType'] = array('IN',array('mrfh','tjj','tjj1','tjj2','tjj3','bdj','mrldj'));
	
		if (! empty ( $date1 ) && ! empty ( $date2 )) {
			$map ['UG_getTime'] = array (
					array (
							'gt',
							$date1
					),
					array (
							'lt',
							$date2
					),
					'and'
			);
		}
		
		//$map  = array('tjj','kdj','glj');
		//	$map['UE_Faccount']  = $_SESSION ['uname']
		//$ljtc1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>array('IN',$map)))->sum('UG_money');
		
		$count = $User->where ( $map )->count (); // 查询满足要求的总记录数
		$page = new \Think\Page ( $count, 12 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
	
		// $page->lastSuffix=false;
		$page->setConfig ( 'header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录    第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>' );
		$page->setConfig ( 'prev', '上一页' );
		$page->setConfig ( 'next', '下一页' );
		$page->setConfig ( 'last', '末页' );
		$page->setConfig ( 'first', '首页' );
		$page->setConfig ( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
		;
	
		$show = $page->show (); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where ( $map )->order ( 'UG_ID DESC' )->limit ( $page->firstRow . ',' . $page->listRows )->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $show ); // 赋值分页输出
		
		
// 		$ztj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'tjj'))->sum('UG_money');
// 		$ztj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'tjj'))->sum('UG_integral');
// 		$this->ztj = $ztj1+$ztj2;
		
		
// 		$bdj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'kdj'))->sum('UG_money');
// 		$bdj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'kdj'))->sum('UG_integral');
// 		$this->bdj = $bdj1+$bdj2;
		
// 		$fhj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrfh'))->sum('UG_money');
// 		$fhj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrfh'))->sum('UG_integral');
// 		$this->fhj = $fhj1+$fhj2;
		
// 		$ldj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrldj'))->sum('UG_money');
// 		$ldj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'mrldj'))->sum('UG_integral');
// 		$this->ldj = $ldj1+$ldj2;
		
		
// 		$glj1 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'glj'))->sum('UG_money');
// 		$glj2 = M('userget')->where(array('UG_account'=>$_SESSION ['uname'],'UG_dataType'=>'glj'))->sum('UG_integral');
// 		$this->glj = $glj1+$glj2;
		
		
		
		$this->display ( 'jjjl' ); // 输出模板
	}
	
	// 金币转账
	public function jbzz() {
		header ( "Content-Type:text/html; charset=utf-8" );
		$userData = M ( 'user' )->where ( array (
				'UE_account' => $_SESSION ['uname'] 
		) )->find ();
		$this->userData = $userData;
		$this->display ( 'jbzz' );
	}
	// 金币转账处理
public function jbzzcl() {
		if (IS_POST) {
			$pin_zs=M('pin')->where ( array('user'=>$_SESSION['uname'],'zt'=>0) )->count ();
			$data_P = I ( 'post.' );
			//$user = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();
			//$user1 = M ();
			$user_df = M ( 'user' )->where ( array (UE_account => $data_P['user']) )->find ();
			//! $this->check_verify ( I ( 'post.yzm' ) )
			//! $user1->autoCheckToken ( $_POST )
			$userxx=M('user')->where(array('UE_account'=>$_SESSION['uname']))->find();
				
			//dump($userxx);die;
				
			//$userxx['ue_secpwd']<>md5($data_P['ejmm'])
			if(false){
				die("<script>alert('二级密码输入有误！');history.back(-1);</script>");
			}else{
			
			
			$jbhe=$data_P ['sh'];
			if (! preg_match ( '/^[0-9]{1,10}$/', $data_P ['sh'] )||!$data_P ['sh']>0) {
				die("<script>alert('数量输入有勿！');history.back(-1);</script>");
			} elseif ($pin_zs < $jbhe) {
				die("<script>alert('门票不足！');history.back(-1);</script>");
			}elseif (!$user_df) {
				die("<script>alert('对方账号不存在！');history.back(-1);</script>");
			//}elseif ($user_df['sfjl']=='0') {
			//	die("<script>alert('对方不是经理,不可转出！');history.back(-1);</script>");
			} else {
				
				$pin_zs_df=M('pin')->where ( array('user'=>$data_P['user'],'zt'=>0) )->count ();
				
				
				for ($i=0;$i<$data_P ['sh'];$i++){
					
					$pin_xx=M('pin')->where ( array('user'=>$_SESSION['uname'],'zt'=>0) )->find();
						
					M('pin')->where ( array('id'=>$pin_xx['id'],'zt'=>0) )->save(array('user'=>$data_P['user']));
				}
				
				$pin_zs_xz=M('pin')->where ( array('user'=>$_SESSION['uname'],'zt'=>0) )->count ();
				$pin_zs_df_xz=M('pin')->where ( array('user'=>$data_P['user'],'zt'=>0) )->count ();
				
				$note3 = "激活码转出";
				$record3 ["UG_account"] = $_SESSION['uname']; // 登入转出账户
				$record3 ["UG_type"] = 'mp';
				$record3 ["UG_allGet"] = $pin_zs; // 金币
				$record3 ["UG_money"] = '-'.$jbhe; //
				$record3 ["UG_balance"] = $pin_zs_xz; // 当前推荐人的金币馀额
				$record3 ["UG_dataType"] = 'jbzc'; // 金币转出
				$record3 ["UG_note"] = $note3; // 推荐奖说明
				$record3["UG_getTime"]		= date ( 'Y-m-d H:i:s', time () ); //操作时间
				$reg4 = M ( 'userget' )->add ( $record3 );
				
				$note3 = "激活码转入";
				$record3 ["UG_account"] = $data_P['user']; // 登入转出账户
				$record3 ["UG_type"] = 'mp';
				$record3 ["UG_allGet"] = $pin_zs_df; // 金币
				$record3 ["UG_money"] = '+'.$jbhe; //
				$record3 ["UG_balance"] = $pin_zs_df_xz; // 当前推荐人的金币馀额
				$record3 ["UG_dataType"] = 'jbzr'; // 金币转出
				$record3 ["UG_note"] = $note3; // 推荐奖说明
				$record3["UG_getTime"]		= date ( 'Y-m-d H:i:s', time () ); //操作时间
				$reg4 = M ( 'userget' )->add ( $record3 );
				
				
				$this->success('转让成功!');
			}
			}
		}
	}
	public function ldtj() {
		if(IS_AJAX){
			//$this->ajaxReturn ( array ('nr' => '验证码错误!','sf' => 0 ) );
			if (false) {
				$this->ajaxReturn ( array ('nr' => '验证码错误!','sf' => 0 ) );
			}else {
			
		$user = M('user');
		$ztname=$user->where(array('UE_accName'=>$_SESSION ['uname'],'UE_Faccount'=>'0','UE_check'=>'1','UE_stop'=>'1'))->getField('ue_account',true);
		$zttj = count($ztname);
		$reg=$ztname;
		$datazs = $zttj;
		if($zttj<=10){
			$s=$zttj;
		}else{
			$s=10;
		}
		if($zttj!=0){

		  for($i=1;$i<$s;$i++){
				if($reg!=''){
					$reg=$user->where(array('UE_accName'=>array('IN',$reg),'UE_Faccount'=>'0','UE_check'=>'1','UE_stop'=>'1'))->getField('ue_account',true);
					$datazs +=count($reg);
				}
			}
			
		}
		
		$this->ajaxReturn(array ('nr' => $datazs,'sf' => 0 ) );
			}
		}
		
	}
	public function zzjl() {
		$User = M ( 'userjyinfo' ); // 实例化User对象
		
	$map ['UJ_usercount'] = $_SESSION ['uname'];
	$map ['UJ_dataType'] = 'zs';
	
	
	
	
	$count = $User->where ( $map )->count (); // 查询满足要求的总记录数
	//dump($var)
	$page = new \Think\Page ( $count, 12 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
	
	// $page->lastSuffix=false;
	$page->setConfig ( 'header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录    第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>' );
	$page->setConfig ( 'prev', '上一页' );
	$page->setConfig ( 'next', '下一页' );
	$page->setConfig ( 'last', '末页' );
	$page->setConfig ( 'first', '首页' );
	$page->setConfig ( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
	;
	
	$show = $page->show (); // 分页显示输出
	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
	$list = $User->where ( $map )->order ( 'UJ_ID DESC' )->limit ( $page->firstRow . ',' . $page->listRows )->select ();
	
	//dump($list);die;
	
	$this->assign ( 'list', $list ); // 赋值数据集
	$this->assign ( 'page', $show ); // 赋值分页输出
	$this->display ( 'zzjl' );
	}
	
	
	
	
	
	
	//提供帮助
	public function tgbzcl() {
		if (IS_POST) {
			
				$data_P = I ( 'post.' );
				//dump($data_P);die;
				$user = M ( 'user' )->where ( array (
						UE_account => $_SESSION ['uname']    //获取用户详细信息
				) )->find ();
				if (empty($user['yhmc']) || empty($user['yhzh'])) {
					die("<script>alert('请在我的页面完善资料');history.back(-1);</script>");
				}
				if (md5($data_P['pass2']) != $user['ue_secpwd']){
					die("<script>alert('二级密码输入错误，请重新输入');history.back(-1);</script>");
				}
				if ($user['levelname'] == '普通会员' && ($data_P['amount'] < 1000 || $data_P['amount'] > 5000)) {
					die("<script>alert('该账号提供帮助金额必须在1000-5000之间');history.back(-1);</script>");
				}
				if ($user['levelname'] == '组长' && ($data_P['amount'] < 2000 || $data_P['amount'] > 10000)) {
                                        die("<script>alert('该账号提供帮助金额必须在2000-10000之间');history.back(-1);</script>");
                                }
				if ($user['levelname'] == '主任' && ($data_P['amount'] < 3000 || $data_P['amount'] > 15000)) {
                                        die("<script>alert('该账号提供帮助金额必须在3000-15000之间');history.back(-1);</script>");
                                }
				if ($user['levelname'] == '经理' && ($data_P['amount'] < 4000 || $data_P['amount'] > 20000)) {
                                        die("<script>alert('该账号提供帮助金额必须在4000-20000之间');history.back(-1);</script>");
                                }
                if ($user['levelname'] == '总裁' && ($data_P['amount'] < 5000 || $data_P['amount'] > 30000)) {
                    die("<script>alert('该账号提供帮助金额必须在5000-30000之间');history.back(-1);</script>");
                }
				//$user1 = M ();
				//! $this->check_verify ( I ( 'post.yzm' ) )
				//! $user1->autoCheckToken ( $_POST )
				
				$usermm = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();

				//仅为新注册用户冻结天数不是交易冻结天数
				if(C("reg_days")>0){
					if((strtotime($usermm['ue_regtime'])+C("reg_days")*3600*24 )> time()){
						die("<script>alert('该帐号仍在冻结时间内！冻结时为注册日期".C("reg_days")."天');history.back(-1);</script>");
					}
				}
				//是否开启时间限制
				if(C('time_limit')){

					//每天排单开始时间
					$time_unix = strtotime(date('Ymd'));
					$now_time_unix = time();
					$start_info = explode(':', C('paidan_time_start'));
					$start_unix = 0;
					if(is_array($start_info)){
						$start_unix = $start_info[0]*3600 +$start_info[1]*60;					
					}
					//每天排单结束时间
					$end_info = explode(':', C('paidan_time_end'));
					$end_unix = 0;
					if(is_array($end_info)){
						$end_unix = $end_info[0]*3600 +$end_info[1]*60;
					}

					$paidan_time_start = $time_unix+$start_unix;
					$paidan_time_end = $time_unix + $end_unix;
					if($now_time_unix<$paidan_time_start){
						die("<script>alert('不好意思今天排单时间还早哦！每日排单时间为". C('paidan_time_start')."到". C('paidan_time_end')."');history.back(-1);</script>");
					}elseif($now_time_unix>$paidan_time_end){
						die("<script>alert('很遗憾你已经错过了排单时间！每日排单时间为". C('paidan_time_start')."到". C('paidan_time_end')."');history.back(-1);</script>");
					}
				}




			/*	$tgbztj=M('tgbz')->where("user='".$_SESSION ['uname']."' and (qr_zt=0 or zt =0)")->sum('jb');
                //$tgbztj=M('tgbz')->where("user='".$_SESSION ['uname']."' and qr_zt=0")->sum('jb');   原来
                if($tgbztj>0) {
					die("<script>alert('提交失败,您还有未交易成功的订单！');history.back(-1);</script>");
				}*/
				//每天排单数量
				$paidan_num =   C('paidan_num');
				if($paidan_num>0){
					$uname = $_SESSION ['uname'];
					$starttime = date('Y-m-d 00:00:01', time());
		            $endtime = date('Y-m-d 23:59:59', time());
		            $count = M("tgbz")->where("date>='$starttime' and date<='$endtime' and user='$uname'")->count();
		            if ($count >= $paidan_num) {
		                die("<script>alert('排单失败，每天只允许排单".$paidan_num."次！');history.back(-1);</script>");
		            }
				}

	            //每天用户个人排单总额度
	            $paidan_jbs = C('paidan_jbs');
				
	            if($paidan_jbs>0){
		            $count = M("tgbz")->where("date>='$starttime' and date<='$endtime' and user='$uname'")->sum('jb');		     
		            if ($count >= $paidan_jbs) {
		                die("<script>alert('排单失败，每天只允许总排单".$paidan_jbs."元！');history.back(-1);</script>");
		            }
	        	}
				//每天用户个人排单总额度
	            $allcanbuy = C('allcanbuy');
				
				
	            









			
			//修改------>您还有未完成的订单未处理，不能继续申请 bug   by olnho@qq.com
				$ppdd= M('ppdd');
				$where=array();
				$where['g_user'] = $_SESSION ['uname'];
				$where['zt'] =array('NEQ',2);
				$ppdd_num=$ppdd->where($where)->count();

				$tgbz_num = M('tgbz')->where(array('user'=>$_SESSION['uname'],'zt'=>0))->count();
				$dealing_num = $tgbz_num + $ppdd_num; 
//				if( $dealing_num > 0)
//				{
//					die("<script>alert('您还有未完成的订单未处理，不能继续申请');history.back(-1);</script>");
//				}
                $iTgbzDays = 3;
                if ($user['levelname'] == '普通会员') {
                    $iTgbzDays = 7;
                }
                $tgbz_data = M('tgbz')->where(array('user'=>$_SESSION['uname']))->order('id desc')->limit(1)->select();
                if (time() - strtotime($tgbz_data[0]['date']) < $iTgbzDays * 24 * 3600) {
                    die("<script>alert('" . $iTgbzDays . "天内不能再次提供帮助');history.back(-1);</script>");
                }

                $iCountNum = 1;
                switch($user['levelname']) {
                    case "普通会员":
                        $iCountNum = 1;
                        break;
                    case "组长":
                        $iCountNum = 2;
                        break;
                    case "主任":
                        $iCountNum = 3;
                        break;
                    case "经理":
                        $iCountNum = 4;
                        break;
                    case "总裁":
                        $iCountNum = 5;
                        break;
                    default:
                        $iCountNum = 1;
                        break;
                }

                if($iCountNum > $user['ue_cyj']){
                    die("<script>alert('排单币余额不足，请及时充值!,每次排单需要排单币".$iCountNum."');history.back(-1);</script>");
                }

//                $iTime = 30 * 24 * 3600;
//
//                $iNum = 1;
//                $iEndNum = 4;
//                switch($user['levelname']) {
//                    case "普通会员":
//                        $iNum = 1;
//                        $iEndNum = 4;
//                        break;
//                    case "组长":
//                        $iNum = 2;
//                        $iEndNum = 7;
//                        break;
//                    case "主任":
//                        $iNum = 3;
//                        $iEndNum = 8;
//                        break;
//                    case "经理":
//                        $iNum = 4;
//                        $iEndNum = 9;
//                        break;
//                    case "总裁":
//                        $iNum = 5;
//                        $iEndNum = 10;
//                        break;
//                    default:
//                        $iNum = 1;
//                        $iEndNum = 4;
//                        break;
//                }
//                $sEndTime   = date('Y-m-d H:i:s', time());
//                $sStartTime = date('Y-m-d H:i:s', (time() - $iTime));
//                $iShijianCount = M('tgbz')->where(array('user'=>$_SESSION['uname'],'date'=>array(array('EGT', $sStartTime), array('ELT', $sEndTime))))->count();
//                if (time() > (strtotime($user['ue_regtime']) + $iTime) && $iShijianCount < $iNum) {
//                    M('user')->where(array(UE_account => $_SESSION ['uname']))->save(array('UE_status' => '1'));
//                    die("<script>alert('对不起，因为上月提供帮助不满足".$iNum."单，所以你的账号已经被冻结！');history.back(-1);</script>");
//                }
//                if ($iShijianCount > $iEndNum) {
//                    die("<script>alert('对不起，因为上月提供帮助超过".$iEndNum."单，所以不能再提单！');history.back(-1);</script>");
//                }


                //add   new code by olnho@qq.com

                //用户买入V币最多允许等待匹配单数
                $oneByone = C('oneByone');
                if($oneByone>0){
                	$tgbz_count=M('tgbz')->where("user='".$_SESSION ['uname']."' and zt =0")->count();
	                //$tgbztj=M('tgbz')->where("user='".$_SESSION ['uname']."' and qr_zt=0")->sum('jb');   原来
	                if($tgbz_count > $oneByone) {
						die("<script>alert('用户买入V币最多允许等待匹配".$oneByone."单！');history.back(-1);</script>");
					}
                }
                $peidui = C('peidui');
                if($peidui >0 ){
                	$ppdd= M('ppdd');
					$where=array();
					$where['g_user'] = $_SESSION ['uname'];  //这里用g_user也就是确认收款这。及时确认
					$where['zt'] =array('NEQ',2);
					$rs=$ppdd->where($where)->find();
					if ( $rs )
					{
						die("<script>alert('您还有未完成的".$peidui."个订单未处理，不能继续申请');history.back(-1);</script>");
					}
                }
                

				if ($data_P ['zffs1']<>'1'&&$data_P ['zffs2']<>'1'&&$data_P ['zffs3']<>'1') {
					die("<script>alert('至少选择一个收款方式！');history.back(-1);</script>");
				}  elseif ($data_P ['amount']<C("jj01s")||$data_P ['amount']>C("jj01m") || $data_P ['amount']% C("jj01") > 0) {
					//帮助金额500-20000,并且是100的倍数！
					die("<script>alert('帮助金额".C("jj01s")."-".C("jj01m").",并且是".C("jj01")."的倍数！');history.back(-1);</script>");

				}/*elseif ($data_P ['amount']% C("jj01") > 0) {
					die("<script>alert('帮助金额".C("jj01s")."-".C("jj01m").",并且是".C("jj01")."的倍数！');history.back(-1);</script>");
				} */
				else {
					//$data_P ['amount']=$data_P ['amount']*6;
					$timea=time ();
					$kssj=strtotime($user['date_leiji'])+86400*30;
					$startTime = date('Y-m-d H:i:s',$kssj);
					if($user['tz_leiji']=='0'||$timea>=$kssj){  //如果他还没有超过当月累计或者已经过了一个月  $user['tz_leiji'] ===>每月金额的统计
						M('user')->where(array(UE_account => $_SESSION ['uname']))->save(array('date_leiji'=>date('Y-m-d H:i:s',$timea),'tz_leiji'=>'0'));
						//$user = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();  原来  多此一举 by olnho@qq.com
					}
					//
					if($user['tz_leiji']+$data_P ['amount']>C("month_max")){

						die("<script>alert('当前投资加当月累计超过".$user['tz_leiji'].'|'.C("month_max").",请在".$startTime."以后在试！');history.back(-1);</script>");
					}else{
						
						
						//如此可以看出他是在排单等待中就添加金额		  tz_leiji-----》投资累计
						M('user')->where(array(UE_account => $_SESSION ['uname']))->setInc('tz_leiji',$data_P ['amount']);
						//M('user')->where(array(UE_account => $_SESSION ['uname']))->setInc('tz_leiji',$data_P ['amount']);
                        M('user')->where(array(UE_account => $_SESSION ['uname']))->setDec('UE_cyj',$iCountNum);

						//支付方式
						if($data_P ['zffs1']=='1'){$data['zffs1']='1';}else{$data['zffs1']='0';}
						if($data_P ['zffs2']=='1'){$data['zffs2']='1';}else{$data['zffs2']='0';}
						if($data_P ['zffs3']=='1'){$data['zffs3']='1';}else{$data['zffs3']='0';}
						$data['user']=$user['ue_account'];
						$data['jb']=$data_P ['amount'] * 0.95;
						$data['user_nc']=$user['ue_theme'];//昵称
						$data['user_tjr']=$user['zcr']; //推荐人
						$data['date']=date ( 'Y-m-d H:i:s', time () ); //排单时间
						$data['zt']=0; //等待匹配
						$data['qr_zt']=0; //未确认
						$data['mark']='95%';

                        $iCount = M("tgbz")->where(array('user' => $user['ue_accname'], 'zt' => '0', 'jb' => array('egt', $data_P['amount'] * 0.95)))->count();
                        if ($iCount > 0) {
                            $data['is_sh']='0';
                        } else {
                            $data['is_sh']='1';
                        }
						if($allcanbuy>0){
							$count22 = M("allbuy")->where("id>='1'")->find();	
							$data22=substr($count22['date'],0,10);
							$nowdata22=date('Y-m-d',time());
							
							
							$total22=(intval($count22['num'])+intval($data_P ['amount']));
							if($data22==$nowdata22){
								
								if($total22>$allcanbuy){
									 die("<script>alert('今天申请已经超过限额,请明天赶早');history.back(-1);</script>");
								}else{
									M("allbuy")->where("id>='1'")->save(array('num'=>$total22));
								}
							}else{
								M("allbuy")->where("id>='1'")->save(array('num'=>$data_P ['amount'],'date'=>date('Y-m-d h:i:s',time())));
							}
						}
						if(M('tgbz')->add($data)){
							$data['jb']=$data_P ['amount'] * 0.05;
							$data['mark']='5%';
							M('tgbz')->add($data);
					//		if($allcanbuy>0){
					//		$count22 = M("allbuy")->where("id>='1'")->find();	
					//		$data22=substr($count22['date'],0,10);
					//		$nowdata22=date('Y-m-d',time());
					//		
					//		
					//		$total22=(intval($count22['num'])+intval($data_P ['amount']));
					//		if($data22==$nowdata22){
					//			
					//			if($total22>$allcanbuy){
					//				 die("<script>alert('今天申请已经超过限额,请明天赶早');history.back(-1);</script>");
					//			}else{
					//				M("allbuy")->where("id>='1'")->save(array('num'=>$total22));
					//			}
					//		}else{
					//			M("allbuy")->where("id>='1'")->save(array('num'=>$data_P ['amount'],'date'=>date('Y-m-d h:i:s',time())));
					//		}
					//	}
							
						//	lkdsjfsdfj($_SESSION ['uname'],$data_P ['amount']);   //计算推荐人的经理奖
							
							die("<script>alert('提交成功！');window.location.href='/';</script>");
						}else{
							die("<script>alert('提交失败！');history.back(-1);</script>");
						}
					}
				}
		}
	}

	//---------------------------------->直接体现暂时没发现什么用意
	public function mmtixian() {
		if (IS_POST) {
			
			$data_P = I ( 'post.' );
			//echo "<pre>";print_r($data_P);die;
			$user = M ( 'user' )->where ( array (
					UE_account => $_SESSION ['uname']
			) )->find ();
			$user1 = M ();
			//! $this->check_verify ( I ( 'post.yzm' ) )
			//! $user1->autoCheckToken ( $_POST )

			$usermm = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();
			if((strtotime($usermm['UE_regTime'])+C("reg_days")*3600*24 )> time()){
				die("<script>alert('该帐号仍在冻结时间内！冻结时为注册日期".C("reg_days")."天');history.back(-1);</script>");
			}

			if (!in_array($data_P ['zffs'],array('1','2','3'))) {
				die("<script>alert('至少选择一种收款方式！');history.back(-1);</script>");
			} elseif ($data_P ['get_amount']<C("txthemin")) {
					die("<script>alert('提现金额".C("txthemin")."起并且是".C("txthebeishu")."的倍数！');history.back(-1);</script>");
			} elseif ($data_P ['get_amount']% C("txthebeishu") > 0) {
					die("<script>alert('提现金额".C("txthemin")."起并且是".C("txthebeishu")."的倍数！');history.back(-1);</script>");
			} elseif ($user['ue_money']<$data_P ['get_amount']) {
				die("<script>alert('余额不足！');history.back(-1);</script>");
			} else {

				$data['zffs']=$data_P ['zffs'];
				$data['UG_account']=$user['ue_account'];
				$data['TX_money']=$data_P ['get_amount'];
				$data['status']='0';
				$data['addtime']=date ( 'Y-m-d H:i:s', time () );

				M('user')->where(array('UE_account' => $_SESSION ['uname']))->setDec('UE_money',$data_P ['get_amount']);
				
				if(M('tixian')->add($data)){
					die("<script>alert('提交成功！');window.location.href='/';</script>");
				}else{
					die("<script>alert('提交失败！');history.back(-1);</script>");
				}
			}
				
		}
	}

	//接受帮助
	public function jsbzcl() {
		if (IS_POST) {
			
			$data_P = I ( 'post.' );
			$usermm = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();
			echo '<br/>';
			$tgbzCount = M("tgbz")->where(array('user' => $_SESSION['uname'], 'zt' => 0))->count();
			if ($tgbzCount <= 0) {
				die("<script>alert('你没有提供帮助，不能接受帮助');history.back(-1);</script>");
			}
			if(md5($data_P['pass2'])!==$usermm['ue_secpwd']){
				die("<script>alert('二级密码错误');history.back(-1);</script>");
			}
			if($data_P['favorite']=='静态收益'){
					//dump($data_P);die;
				$user = M ( 'user' )->where ( array (
						UE_account => $_SESSION ['uname']
				) )->find ();
				$user1 = M ();
				//! $this->check_verify ( I ( 'post.yzm' ) )
				//! $user1->autoCheckToken ( $_POST )

				$usermm = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();
				if((strtotime($usermm['UE_regTime'])+C("reg_days")*3600*24 )> time()){
					die("<script>alert('该帐号仍在冻结时间内！冻结时为注册日期".C("reg_days")."天');history.back(-1);</script>");
				}

				if ($data_P ['zffs1']<>'1'&&$data_P ['zffs2']<>'1'&&$data_P ['zffs3']<>'1') {
					die("<script>alert('至少选择一种收款方式！');history.back(-1);</script>");
				} elseif ($data_P ['get_amount']<C("txthemin")) {
						die("<script>alert('接受帮助金额".C("txthemin")."起并且是".C("txthebeishu")."的倍数！');history.back(-1);</script>");
				} elseif ($data_P ['get_amount']% C("txthebeishu") > 0) {
						die("<script>alert('接受帮助金额".C("txthemin")."起并且是".C("txthebeishu")."的倍数！！');history.back(-1);</script>");
				} elseif($data_P ['get_amount']>C("txthemax")){
					die("<script>alert('接受帮助最大金额为".C("txthemax")."');history.back(-1);</script>");
				}elseif ($user['ue_money']<$data_P ['get_amount']) {
					die("<script>alert('余额不足！');history.back(-1);</script>");
				} else {
					//支付方式
					if($data_P ['zffs1']=='1'){$data['zffs1']='1';}else{$data['zffs1']='0';}
					if($data_P ['zffs2']=='1'){$data['zffs2']='1';}else{$data['zffs2']='0';}
					if($data_P ['zffs3']=='1'){$data['zffs3']='1';}else{$data['zffs3']='0';}
					$data['user']=$user['ue_account'];  //提交接收帮助的人
					$data['jb']=$data_P ['get_amount'];  //金额
					$data['user_nc']=$user['ue_theme']; //昵称
					$data['user_tjr']=$user['zcr'];  //推荐人
					$data['date']=date ( 'Y-m-d H:i:s', time () );  //时间
					$data['zt']=0;  //为匹配
					$data['qr_zt']=0;  //为确认收款
					$user_zq=M('user')->where(array('UE_ID'=>$_SESSION['uid']))->find();

					
					
					M('user')->where(array('UE_account' => $_SESSION ['uname']))->setDec('UE_money',$data_P ['get_amount']);
					
					$user_xz=M('user')->where(array('UE_ID'=>$_SESSION['uid']))->find();
					$note3 = "接受帮助扣款";
					$record3 ["UG_account"] = $_SESSION['uname']; // 登入转出账户
					$record3 ["UG_type"] = 'jb';
					$record3 ["UG_allGet"] = $user_zq['ue_money']; // 金币
					$record3 ["UG_money"] = '-'.$data_P ['get_amount']; //
					$record3 ["UG_balance"] = $user_xz['ue_money']; // 当前推荐人的金币馀额
					$record3 ["UG_dataType"] = 'jsbz'; // 金币转出
					$record3 ["UG_note"] = $note3; // 推荐奖说明
					$record3["UG_getTime"]		= date ( 'Y-m-d H:i:s', time () ); //操作时间
					$jsbz_id = M('jsbz')->add($data);
					$record3["jsbzID"] = $jsbz_id;
					$reg4 = M ( 'userget' )->add ( $record3 );


					/*if(M('jsbz')->add($data)){
						die("<script>alert('提交成功！');window.location.href='/';</script>");
					}else{
						die("<script>alert('提交失败！');history.back(-1);</script>");
					}*/

					if($jsbz_id){
						die("<script>alert('提交成功！');window.location.href='/';</script>");
					}else{
						die("<script>alert('提交失败！');history.back(-1);</script>");
					}
				}
				
			}elseif($data_P['favorite']=='经理钱包'){
				//dump($data_P);die;
				$user = M ( 'user' )->where ( array (
						UE_account => $_SESSION ['uname']
				) )->find ();
				$user1 = M ();
				//! $this->check_verify ( I ( 'post.yzm' ) )
				//! $user1->autoCheckToken ( $_POST )
				$usermm = M ( 'user' )->where ( array ('UE_account' => $_SESSION ['uname']) )->find ();
				$jlll=M('jsbz')->where ( array ('user' => $_SESSION ['uname'],'qb'=>1) )->limit(1)->order('id DESC')->find ();
				$taasad=substr($jlll['date'],0,10);
				$nowasas=date('Y-m-d',time());
				if($taasad==$nowasas)
				die("<script>alert('经理钱包每天只能提现一次');history.back(-1);</script>");
			
				if((strtotime($usermm['UE_regTime'])+C("reg_days")*3600*24 )> time()){
					die("<script>alert('该帐号仍在冻结时间内！冻结时为注册日期".C("reg_days")."天');history.back(-1);</script>");
				}
				if ($data_P ['zffs1']<>'1'&&$data_P ['zffs2']<>'1'&&$data_P ['zffs3']<>'1') {
					die("<script>alert('至少选择一种收款方式！');history.back(-1);</script>");
				}  elseif ($data_P ['get_amount']<C("jl_start")) {
						die("<script>alert('接受帮助金额".C("jl_start")."起并且是".C("jl_beishu")."的倍数！');history.back(-1);</script>");
				} elseif ($data_P ['get_amount']>C("jl_e")) {
						die("<script>alert('接受帮助金额不能大于".C("jl_e")."并且是".C("jl_beishu")."的倍数！');history.back(-1);</script>");
				}elseif ($data_P ['get_amount']% C("jl_beishu") > 0) {
						die("<script>alert('接受帮助金额".C("txthemin")."起并且是".C("jl_beishu")."的倍数！！');history.back(-1);</script>");
				} elseif ($user['jl_he']<$data_P ['get_amount']) {
					die("<script>alert('余额不足！');history.back(-1);</script>");
				} else {
					
					$timea=time ();
					//$kssj=strtotime($user['tx_date'])+86400*7;
					$kssj=strtotime($user['tx_date'])+86400;
					$startTime = date('Y-m-d H:i:s',$kssj);
					if($user['tx_leiji']=='0'||$timea>=$kssj){
						M('user')->where(array(UE_account => $_SESSION ['uname']))->save(array('tx_date'=>date('Y-m-d H:i:s',$timea),'tx_leiji'=>'0'));
						$user = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();
					}
					
					if($user['tx_leiji']+$data_P ['get_amount']>C("month_max")){
						die("<script>alert('经理奖金本日提现超过".C("month_max")."RMB,请在".$startTime."以后在试！');history.back(-1);</script>");
					}else{
						M('user')->where(array(UE_account => $_SESSION ['uname']))->setInc('tx_leiji',$data_P ['get_amount']);
					
					if($data_P ['zffs1']=='1'){$data['zffs1']='1';}else{$data['zffs1']='0';}
					if($data_P ['zffs2']=='1'){$data['zffs2']='1';}else{$data['zffs2']='0';}
					if($data_P ['zffs3']=='1'){$data['zffs3']='1';}else{$data['zffs3']='0';}
					$data['user']=$user['ue_account'];
					$data['jb']=$data_P ['get_amount'];
					$data['user_nc']=$user['ue_theme'];
					$data['user_tjr']=$user['zcr'];
					$data['date']=date ( 'Y-m-d H:i:s', time () );
					$data['zt']=0;
					$data['qr_zt']=0;
					$data['qb']=1;
					$user_zq=M('user')->where(array('UE_ID'=>$_SESSION['uid']))->find();
		
		
		
					M('user')->where(array('UE_account' => $_SESSION ['uname']))->setDec('jl_he',$data_P ['get_amount']);
		
					$user_xz=M('user')->where(array('UE_ID'=>$_SESSION['uid']))->find();
					$note3 = "接受帮助扣款";
					$record3 ["UG_account"] = $_SESSION['uname']; // 登入转出账户
					$record3 ["UG_type"] = 'jb';
					$record3 ["UG_allGet"] = $user_zq['jl_he']; // 金币
					$record3 ["UG_money"] = '-'.$data_P ['get_amount']; //
					$record3 ["UG_balance"] = $user_xz['jl_he']; // 当前推荐人的金币馀额
					$record3 ["UG_dataType"] = 'jsbz'; // 金币转出
					$record3 ["UG_note"] = $note3; // 推荐奖说明
					$record3["UG_getTime"]		= date ( 'Y-m-d H:i:s', time () ); //操作时间
					$reg4 = M ( 'userget' )->add ( $record3 );
					
					//if(M('user_jl')->add($data)){
					if(M('jsbz')->add($data)){

                        //支付方式
                        $tgbz_data['zffs1']='1';
                        $tgbz_data['zffs2']='1';
                        $tgbz_data['zffs3']='1';
                        $tgbz_data['user']=$user['ue_account'];
                        $tgbz_data['jb']=$data_P['get_amount'];
                        $tgbz_data['user_nc']=$user['ue_theme'];//昵称
                        $tgbz_data['user_tjr']=$user['zcr']; //推荐人
                        $tgbz_data['date']=date ( 'Y-m-d H:i:s', time () ); //排单时间
                        $tgbz_data['zt']=0; //等待匹配
                        $tgbz_data['qr_zt']=0; //未确认
                        $tgbz_data['mark']='';
                        $tgbz_data['is_sh']='0';
                        M('tgbz')->add($tgbz_data);


						die("<script>alert('提交成功！');window.location.href='/';</script>");
					}else{
						die("<script>alert('提交失败！');history.back(-1);</script>");
					}

				}
				}
					
				
			}elseif($data_P['favorite']=='直推收益'){
				$user = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();
				$user1 = M ();
				//! $this->check_verify ( I ( 'post.yzm' ) )
				//! $user1->autoCheckToken ( $_POST )

				$usermm = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();
				if((strtotime($usermm['UE_regTime'])+C("reg_days")*3600*24 )> time()){
					die("<script>alert('该帐号仍在冻结时间内！冻结时为注册日期".C("reg_days")."天');history.back(-1);</script>");
				}
                $jlll=M('jsbz')->where ( array ('user' => $_SESSION ['uname'],'qb'=>2) )->limit(1)->order('id DESC')->find ();
				$taasad=substr($jlll['date'],0,10);
				$nowasas=date('Y-m-d',time());
				if($taasad==$nowasas)
				die("<script>alert('直推钱包每次只能提现一次');history.back(-1);</script>");
				if ($data_P ['zffs1']<>'1'&&$data_P ['zffs2']<>'1'&&$data_P ['zffs3']<>'1') {
					die("<script>alert('至少选择一种收款方式！');history.back(-1);</script>");
				}  elseif ($data_P ['get_amount']<C("tj_start")) {
						die("<script>alert('接受帮助金额".C("tj_start")."起并且是".C("tj_beishu")."的倍数！');history.back(-1);</script>");
				} elseif ($data_P ['get_amount']>C("tj_e")) {
						die("<script>alert('接受帮助金额要小于".C("tj_e")."并且是".C("tj_beishu")."的倍数！');history.back(-1);</script>");
				}elseif ($data_P ['get_amount']% C("txthebeishu") > 0) {
						die("<script>alert('接受帮助金额".C("tj_start")."起并且是".C("tj_beishu")."的倍数！！');history.back(-1);</script>");
				} elseif ($user['tj_he']<$data_P ['get_amount']) {
					die("<script>alert('余额不足！');history.back(-1);</script>");
				} else {
					if($data_P ['zffs1']=='1'){$data['zffs1']='1';}else{$data['zffs1']='0';}
					if($data_P ['zffs2']=='1'){$data['zffs2']='1';}else{$data['zffs2']='0';}
					if($data_P ['zffs3']=='1'){$data['zffs3']='1';}else{$data['zffs3']='0';}
					$data['user']=$user['ue_account'];
					$data['jb']=$data_P ['get_amount'];
					$data['user_nc']=$user['ue_theme'];
					$data['user_tjr']=$user['zcr'];
					$data['date']=date ( 'Y-m-d H:i:s', time () );
					$data['zt']=0;
					$data['qr_zt']=0;
					$data['qb']=2;
					$user_zq=M('user')->where(array('UE_ID'=>$_SESSION['uid']))->find();
		
		
		
					M('user')->where(array('UE_account' => $_SESSION ['uname']))->setDec('tj_he',$data_P ['get_amount']);
		
					$user_xz=M('user')->where(array('UE_ID'=>$_SESSION['uid']))->find();
					$note3 = "接受帮助扣款";
					$record3 ["UG_account"] = $_SESSION['uname']; // 登入转出账户
					$record3 ["UG_type"] = 'jb';
					$record3 ["UG_allGet"] = $user_zq['tj_he']; // 金币
					$record3 ["UG_money"] = '-'.$data_P ['get_amount']; //
					$record3 ["UG_balance"] = $user_xz['tj_he']; // 当前推荐人的金币馀额
					$record3 ["UG_dataType"] = 'jsbz'; // 金币转出
					$record3 ["UG_note"] = $note3; // 推荐奖说明
					$record3["UG_getTime"]		= date ( 'Y-m-d H:i:s', time () ); //操作时间
					$reg4 = M ( 'userget' )->add ( $record3 );
		
					if(M('jsbz')->add($data)){

                        //支付方式
                        $tgbz_data['zffs1']='1';
                        $tgbz_data['zffs2']='1';
                        $tgbz_data['zffs3']='1';
                        $tgbz_data['user']=$user['ue_account'];
                        $tgbz_data['jb']=$data_P['get_amount'];
                        $tgbz_data['user_nc']=$user['ue_theme'];//昵称
                        $tgbz_data['user_tjr']=$user['zcr']; //推荐人
                        $tgbz_data['date']=date ( 'Y-m-d H:i:s', time () ); //排单时间
                        $tgbz_data['zt']=0; //等待匹配
                        $tgbz_data['qr_zt']=0; //未确认
                        $tgbz_data['mark']='';
                        $tgbz_data['is_sh']='0';
                        M('tgbz')->add($tgbz_data);


						die("<script>alert('提交成功！');window.location.href='/';</script>");
					}else{
						die("<script>alert('提交失败！');history.back(-1);</script>");
					}
				}
				
			}
			
				
		}
	}
	public function jsbzcl1() {
		if (IS_POST) {
				
			$data_P = I ( 'post.' );
			//dump($data_P);die;
			$user = M ( 'user' )->where ( array (
					UE_account => $_SESSION ['uname']
			) )->find ();
			$user1 = M ();
			//! $this->check_verify ( I ( 'post.yzm' ) )
			//! $user1->autoCheckToken ( $_POST )
			$usermm = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();
			if((strtotime($usermm['UE_regTime'])+C("reg_days")*3600*24 )> time()){
				die("<script>alert('该帐号仍在冻结时间内！冻结时为注册日期".C("reg_days")."天');history.back(-1);</script>");
			}
			if ($data_P ['zffs1']<>'1'&&$data_P ['zffs2']<>'1'&&$data_P ['zffs3']<>'1') {
				die("<script>alert('至少选择一种收款方式！');history.back(-1);</script>");
			}  elseif ($data_P ['get_amount']<C("txthemin")) {
					die("<script>alert('接受帮助金额".C("txthemin")."起并且是".C("txthebeishu")."的倍数！');history.back(-1);</script>");
			} elseif ($data_P ['get_amount']% C("txthebeishu") > 0) {
					die("<script>alert('接受帮助金额".C("txthemin")."起并且是".C("txthebeishu")."的倍数！！');history.back(-1);</script>");
			} elseif ($user['jl_he']<$data_P ['get_amount']) {
				die("<script>alert('余额不足！');history.back(-1);</script>");
			} else {
				
				$timea=time ();
				$kssj=strtotime($user['tx_date'])+86400*7;
				$startTime = date('Y-m-d H:i:s',$kssj);
				if($user['tx_leiji']=='0'||$timea>=$kssj){
					M('user')->where(array(UE_account => $_SESSION ['uname']))->save(array('tx_date'=>date('Y-m-d H:i:s',$timea),'tx_leiji'=>'0'));
					$user = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();
				}
				
				if($user['tx_leiji']+$data_P ['get_amount']>C("month_max")){
					die("<script>alert('经理奖金本周提现超过".C("month_max")."RMB,请在".$startTime."以后在试！');history.back(-1);</script>");
				}else{
					M('user')->where(array(UE_account => $_SESSION ['uname']))->setInc('tx_leiji',$data_P ['get_amount']);
				
				if($data_P ['zffs1']=='1'){$data['zffs1']='1';}else{$data['zffs1']='0';}
				if($data_P ['zffs2']=='1'){$data['zffs2']='1';}else{$data['zffs2']='0';}
				if($data_P ['zffs3']=='1'){$data['zffs3']='1';}else{$data['zffs3']='0';}
				$data['user']=$user['ue_account'];
				$data['jb']=$data_P ['get_amount'];
				$data['user_nc']=$user['ue_theme'];
				$data['user_tjr']=$user['zcr'];
				$data['date']=date ( 'Y-m-d H:i:s', time () );
				$data['zt']=0;
				$data['qr_zt']=0;
				$data['qb']=1;
				$user_zq=M('user')->where(array('UE_ID'=>$_SESSION['uid']))->find();
	
	
	
				M('user')->where(array('UE_account' => $_SESSION ['uname']))->setDec('jl_he',$data_P ['get_amount']);
	
				$user_xz=M('user')->where(array('UE_ID'=>$_SESSION['uid']))->find();
				$note3 = "接受帮助扣款";
				$record3 ["UG_account"] = $_SESSION['uname']; // 登入转出账户
				$record3 ["UG_type"] = 'jb';
				$record3 ["UG_allGet"] = $user_zq['jl_he']; // 金币
				$record3 ["UG_money"] = '-'.$data_P ['get_amount']; //
				$record3 ["UG_balance"] = $user_xz['jl_he']; // 当前推荐人的金币馀额
				$record3 ["UG_dataType"] = 'jsbz'; // 金币转出
				$record3 ["UG_note"] = $note3; // 推荐奖说明
				$record3["UG_getTime"]		= date ( 'Y-m-d H:i:s', time () ); //操作时间
				$reg4 = M ( 'userget' )->add ( $record3 );
				
				if(M('user_jl')->add($data)){
					die("<script>alert('提交成功！');window.location.href='/';</script>");
				}else{
					die("<script>alert('提交失败！');history.back(-1);</script>");
				}

			}
			}
		}
	}
	
	public function jsbzcl2() {
		if (IS_POST) {
	
			$data_P = I ( 'post.' );
			//dump($data_P);die;
			$user = M ( 'user' )->where ( array (
					UE_account => $_SESSION ['uname']
			) )->find ();
			$user1 = M ();
			//! $this->check_verify ( I ( 'post.yzm' ) )
			//! $user1->autoCheckToken ( $_POST )

			$usermm = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();
			if((strtotime($usermm['UE_regTime'])+C("reg_days")*3600*24 )> time()){
				die("<script>alert('该帐号仍在冻结时间内！冻结时为注册日期".C("reg_days")."天');history.back(-1);</script>");
			}

			if ($data_P ['zffs1']<>'1'&&$data_P ['zffs2']<>'1'&&$data_P ['zffs3']<>'1') {
				die("<script>alert('至少选择一种收款方式！');history.back(-1);</script>");
			}  elseif ($data_P ['get_amount']<C("txthemin")) {
					die("<script>alert('接受帮助金额".C("txthemin")."起并且是".C("txthebeishu")."的倍数！');history.back(-1);</script>");
			} elseif ($data_P ['get_amount']% C("txthebeishu") > 0) {
					die("<script>alert('接受帮助金额".C("txthemin")."起并且是".C("txthebeishu")."的倍数！！');history.back(-1);</script>");
			} elseif ($user['tj_he']<$data_P ['get_amount']) {
				die("<script>alert('余额不足！');history.back(-1);</script>");
			} else {
				if($data_P ['zffs1']=='1'){$data['zffs1']='1';}else{$data['zffs1']='0';}
				if($data_P ['zffs2']=='1'){$data['zffs2']='1';}else{$data['zffs2']='0';}
				if($data_P ['zffs3']=='1'){$data['zffs3']='1';}else{$data['zffs3']='0';}
				$data['user']=$user['ue_account'];
				$data['jb']=$data_P ['get_amount'];
				$data['user_nc']=$user['ue_theme'];
				$data['user_tjr']=$user['zcr'];
				$data['date']=date ( 'Y-m-d H:i:s', time () );
				$data['zt']=0;
				$data['qr_zt']=0;
				$data['qb']=2;
				$user_zq=M('user')->where(array('UE_ID'=>$_SESSION['uid']))->find();
	
	
	
				M('user')->where(array('UE_account' => $_SESSION ['uname']))->setDec('tj_he',$data_P ['get_amount']);
	
				$user_xz=M('user')->where(array('UE_ID'=>$_SESSION['uid']))->find();
				$note3 = "接受帮助扣款";
				$record3 ["UG_account"] = $_SESSION['uname']; // 登入转出账户
				$record3 ["UG_type"] = 'jb';
				$record3 ["UG_allGet"] = $user_zq['tj_he']; // 金币
				$record3 ["UG_money"] = '-'.$data_P ['get_amount']; //
				$record3 ["UG_balance"] = $user_xz['tj_he']; // 当前推荐人的金币馀额
				$record3 ["UG_dataType"] = 'jsbz'; // 金币转出
				$record3 ["UG_note"] = $note3; // 推荐奖说明
				$record3["UG_getTime"]		= date ( 'Y-m-d H:i:s', time () ); //操作时间
				$reg4 = M ( 'userget' )->add ( $record3 );
	
				if(M('jsbz')->add($data)){
					die("<script>alert('提交成功！');window.location.href='/';</script>");
				}else{
					die("<script>alert('提交失败！');history.back(-1);</script>");
				}
			}
	
		}
	}
	public function tgbz_del() {
		if (!preg_match ( '/^[0-9]{1,10}$/', I ('get.id') )) {
			$this->success('非法操作,将冻结账号!');
		}else{
			$userinfo = M ( 'tgbz' )->where ( array ('id' => I ('get.id'),'zt'=>'0') )->find ();
			//dump(I ('get.id'));
			//dump($userinfo['ue_accname']);die;
			if ($userinfo['user']<>$_SESSION ['uname']) {
				$this->success('订单当前状态不可取消!');
			}else{
				lkdsjfsdfj($userinfo['user'],'-'.$userinfo['jb']);
				$info = M ( 'tgbz' )->where(array ('id' => I ('get.id')))->find();
				$reg = M ( 'tgbz' )->where(array ('id' => I ('get.id')))->delete();
				$allcanbuy = C('allcanbuy');
				           if($allcanbuy>0){
							$count22 = M("allbuy")->where("id>='1'")->find();	
							$data22=substr($count22['date'],0,10);
							$nowdata22=date('Y-m-d',time());
							$total12=(intval($count22['num'])-intval($info['jb']));
							if($data22==$nowdata22){
						
									M("allbuy")->where("id>='1'")->save(array('num'=>$total12));
						
							}
						}
				
				if ($reg) {
					die("<script>alert('取消成功!');window.location.href='/';</script>");
				}else {
					die("<script>alert('取消失败!');window.location.href='/';</script>");
				}
			}
		}
	}
	//取消等待接受帮助
	public function jsbz_del() {
		//die("<script>alert('不可取消!');window.location.href='/';</script>");
		if (!preg_match ( '/^[0-9]{1,10}$/', I ('get.id') )) {
			$this->success('非法操作,将冻结账号!');
		}else{
			$userinfo = M ( 'jsbz' )->where ( array ('id' => I ('get.id'),'zt'=>'0') )->find ();
			//dump(I ('get.id'));
			//dump($userinfo['ue_accname']);die;
			if ($userinfo['user']<>$_SESSION ['uname']) {
				$this->success('订单当前状态不可取消!');
			}else{
				
				$reg = M ( 'jsbz' )->where(array ('id' => I ('get.id')))->delete();
				$del_getInfo =  M ( 'userget' )->where(array ('jsbzID' => I('get.id')))->delete();
				if ($reg  && M('user')->where(array('UE_account' => $userinfo['user']))->setInc('UE_money',$userinfo['jb'])) {
					die("<script>alert('取消成功!');window.location.href='/';</script>");
				}else {
					die("<script>alert('取消失败!');window.location.href='/';</script>");
				}
			}
		}
	}
	
	
	
	public function pipei() {
		
		$xypipeije=10;
		$data=array(1,2,3,4,5,6,7,8);
		$tj=count($data);
		$sf_tcpp='0';
		for ($b=0;$b<$tj;$b++){
			if($sf_tcpp=='1'){break;}
			$tj_j=$tj-1;
			echo '===========<br>';
		for ($i=0;$i<$tj;$i++){
			if($b<$i){
				$pipeihe=$data[$b]+$data[$tj_j];
				if($pipeihe==$xypipeije){
					echo $data[$b].'+'.$data[$tj_j].'<br>';$sf_tcpp='1';break;
				}
				
			
			
			$tj_j--;
			}
		}
		}
		
	}
	
	public function home_ddxx(){
		 
		$ppddxx=M('ppdd')->where(array('id'=>I('get.id')))->find();
		$g_user=M('user')->where(array('UE_account'=>$ppddxx['g_user']))->find();
		$g_user_t=M('user')->where(array('UE_account'=>$g_user['ue_accname']))->find();
		$p_user=M('user')->where(array('UE_account'=>$ppddxx['p_user']))->find();
		$p_user_t=M('user')->where(array('UE_account'=>$p_user['ue_accname']))->find();
		
		$this->ppddxx=$ppddxx;
		$this->g_user=$g_user;
		$this->p_user=$p_user;
		
		$this->g_user_t=$g_user_t;
		$this->p_user_t=$p_user_t;
		$this->display('home_ddxx');
	}
	
	public function home_ddxx_ly(){
		$ppddxx=M('ppdd')->where(array('id'=>I('get.id')))->find();;
		$this->ppddxx=$ppddxx;
		
		
		
		//////////////////----------
		$User = M ( 'ppdd_ly' ); // 实例化User对象
		
		$map['ppdd_id']=I('get.id');
		$list = $User->where ( $map )->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		//dump($list);die;
		/////////////////----------------
		
		
		
		$this->display('home_ddxx_ly');
	}
	
	
	public function home_ddxx_ly_cl(){
		 
		$data_P = I ( 'post.' );
		//echo strlen(trim($data_P['mesg']));die;
		$ppddxx=M('ppdd')->where(array('id'=>$data_P['id']))->find();
		
		$user1 = M ();
		if ($ppddxx['p_user']<>$_SESSION['uname']&&$ppddxx['g_user']<>$_SESSION['uname']) {
		
			die("<script>alert('非法操作！');history.back(-1);</script>");
		} elseif( strlen(trim($data_P['mesg']))<1) {
		    die("<script>alert('留言内容不能为空！');history.back(-1);</script>");
		}else {
			$userData = M ( 'user' )->where ( array (
					'UE_ID' => $_SESSION ['uid']
			) )->find ();
		
			$record['ppdd_id'] = $ppddxx['id'];
			$record['user']	= $_SESSION['uname'];
			$record['user_nc']	= $userData['ue_theme'];
			$record['nr']	= $data_P['mesg'];
			$record['date']		= date ( 'Y-m-d H:i:s', time () );;
		
			$reg = M ( 'ppdd_ly' )->add ( $record );
				
		
		
		
			if ($reg) {
				$this->success( '留言成功!' );
			} else {
				$this->success( '留言失败!' );
			}
		
		}
		
	}
	
	public function home_ddxx_pcz(){
		
	
	$this->id = I ( 'get.id' );
	
		$this->display('home_ddxx_pcz');
	}
	
	

	public function home_ddxx_pcz_cl(){

		$data_P = I ( 'post.' );
		//echo strlen(trim($data_P['mesg']));die;
		$ppddxx=M('ppdd')->where(array('id'=>$data_P['id'],'zt'=>'0'))->find();
	
		if (empty($data_P['face180'])) {
			die("<script>alert('请上传图片！');history.back(-1);</script>");
		}	
		//如果不是本人
		if ($ppddxx['p_user']<>$_SESSION['uname']) {
		
			die("<script>alert('非法操作！');history.back(-1);</script>");
		}elseif($data_P['comfir2']<>'1') {
		    die("<script>alert('请选择,我完成打款！');history.back(-1);</script>");
		}else {
			if($data_P['comfir2']=='1'){
			M('ppdd')->where(array('id'=>$data_P['id'],'zt'=>'0'))->save(array('pic'=>$data_P['face180'],'zt'=>'1','date_hk'=>date ( 'Y-m-d H:i:s', time () ), 'days' => $data_P['days']));
			}
			
			if($data_P['content']<>''){
			
				$userData = M ( 'user' )->where ( array (
						'UE_ID' => $_SESSION ['uid']
				) )->find ();
			
				$record['ppdd_id'] = $ppddxx['id'];            //-------------------->ppddd的外键id
				$record['user']	= $_SESSION['uname'];         //------------------------>留言者也就是打款人
				$record['user_nc']	= $userData['ue_theme'];    //-------------------->留言者也就是打款人的昵称
				$record['nr']	= $data_P['content'];                //------------------------------->打款时的留言
				$record['date']		= date ( 'Y-m-d H:i:s', time () );       //------------------>打款时间
			
				$reg = M ( 'ppdd_ly' )->add ( $record );
			}
			if(M('user_jj')->where(array('r_id'=>$ppddxx['id']))->find()){
				$get_user=M('user')->where(array('UE_account'=>$ppddxx['g_user']))->find();
				if($get_user['ue_phone']) sendSMS($get_user['ue_phone'],"您好，您申请得到帮助的会员账号".$ppddxx['jb']."已匹配成功，请登录官方网站查看匹配信息【塔塔互助】");
				die("<script>alert('提交成功,请联系对方！');parent.location.reload();</script>");
			}else{
				
				
				$peiduidate=M('tgbz')->where(array('id'=>$ppddxx['p_id'],'user'=>$ppddxx['p_user']))->find();
				$data2['user']=$ppddxx['p_user'];
				$data2['r_id']=$ppddxx['id'];	//------------------------->ppdd的外键id
				$data2['date']=$peiduidate['date'];            //---------------------->配对时间
				$data2['note']='买入V币';				//------------------>说明
				$data2['jb']=$ppddxx['jb'];          //--------------------------------
				if(M('user_jj')->add($data2)){       //--------------------------
					
					$mmtemparr = explode(',',C("jjjldsrate"));              //------------------------->jjjldsrate   经理代数奖
					//经理奖金订单
					$tgbz_user_xx=M('user')->where(array('UE_account'=>$ppddxx['p_user']))->find();//充值人详细

                    if ($peiduidate['is_sh'] == 0) {
                        //第一个参数 买入V币的直接推荐人      推荐奖金额           说明                   1          ppdd外键id
                        jlj3($tgbz_user_xx['ue_accname'],$ppddxx['jb']*C("jjtuijianrate")/100,'直推奖'.C("jjtuijianrate").'%',1,$ppddxx['id']);
                    }

					if($tgbz_user_xx['zcr']<>''){
						$asasddd=M('user')->where(array('UE_account'=>$tgbz_user_xx['zcr']))->find();
						switch($asasddd['levelname']){
							case '主任':
							$mmtemparr = explode(',',C("gjjldsrate"));
							break;
							case '经理':
							$mmtemparr = explode(',',C("zcjldsrate"));
							break;
                            case '总裁':
                                $mmtemparr = explode(',',C("zcjldsrate_new"));
                                break;
							default:
							$mmtemparr = explode(',',C("jjjldsrate"));
							break;
							
						}
						
						$zcr2=jlj2($tgbz_user_xx['zcr'],$ppddxx['jb']*((float)$mmtemparr[0])/100,'经理奖'.$mmtemparr[0].'%',1,$ppddxx['id']);
						if($zcr2<>''){
							$asasddd=M('user')->where(array('UE_account'=>$zcr2))->find();
							switch($asasddd['levelname']){
                                case '主任':
                                    $mmtemparr = explode(',',C("gjjldsrate"));
                                    break;
                                case '经理':
                                    $mmtemparr = explode(',',C("zcjldsrate"));
                                    break;
                                case '总裁':
                                    $mmtemparr = explode(',',C("zcjldsrate_new"));
                                    break;
                                default:
                                    $mmtemparr = explode(',',C("jjjldsrate"));
                                    break;
								
							}
							$zcr3=jlj2($zcr2,$ppddxx['jb']*((float)$mmtemparr[1])/100,'经理奖'.$mmtemparr[1].'%',2,$ppddxx['id']);
							//echo $ppddxx['p_user'].'sadfsaf';die;
							if($zcr3<>''){
								$asasddd=M('user')->where(array('UE_account'=>$zcr3))->find();
									switch($asasddd['levelname']){
                                        case '主任':
                                            $mmtemparr = explode(',',C("gjjldsrate"));
                                            break;
                                        case '经理':
                                            $mmtemparr = explode(',',C("zcjldsrate"));
                                            break;
                                        case '总裁':
                                            $mmtemparr = explode(',',C("zcjldsrate_new"));
                                            break;
                                        default:
                                            $mmtemparr = explode(',',C("jjjldsrate"));
                                            break;
										
									}
								$zcr4=jlj2($zcr3,$ppddxx['jb']*((float)$mmtemparr[2])/100,'经理奖'.$mmtemparr[2].'%',3,$ppddxx['id']);
								if($zcr4<>''){
									$asasddd=M('user')->where(array('UE_account'=>$zcr4))->find();
										switch($asasddd['levelname']){
                                            case '主任':
                                                $mmtemparr = explode(',',C("gjjldsrate"));
                                                break;
                                            case '经理':
                                                $mmtemparr = explode(',',C("zcjldsrate"));
                                                break;
                                            case '总裁':
                                                $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                break;
                                            default:
                                                $mmtemparr = explode(',',C("jjjldsrate"));
                                                break;
											
										}
									$zcr5=jlj2($zcr4,$ppddxx['jb']*((float)$mmtemparr[3])/100,'经理奖'.$mmtemparr[3].'%',4,$ppddxx['id']);
									if($zcr5<>''){
										$asasddd=M('user')->where(array('UE_account'=>$zcr5))->find();
											switch($asasddd['levelname']){
                                                case '主任':
                                                    $mmtemparr = explode(',',C("gjjldsrate"));
                                                    break;
                                                case '经理':
                                                    $mmtemparr = explode(',',C("zcjldsrate"));
                                                    break;
                                                case '总裁':
                                                    $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                    break;
                                                default:
                                                    $mmtemparr = explode(',',C("jjjldsrate"));
                                                    break;
												
											}
										$zcr6=jlj2($zcr5,$ppddxx['jb']*((float)$mmtemparr[4])/100,'经理奖'.$mmtemparr[4].'%',5,$ppddxx['id']);
										if($zcr6<>''){
											$asasddd=M('user')->where(array('UE_account'=>$zcr6))->find();
												switch($asasddd['levelname']){
                                                    case '主任':
                                                        $mmtemparr = explode(',',C("gjjldsrate"));
                                                        break;
                                                    case '经理':
                                                        $mmtemparr = explode(',',C("zcjldsrate"));
                                                        break;
                                                    case '总裁':
                                                        $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                        break;
                                                    default:
                                                        $mmtemparr = explode(',',C("jjjldsrate"));
                                                        break;
													
												}
											$zcr7=jlj2($zcr6,$ppddxx['jb']*((float)$mmtemparr[5])/100,'经理奖'.$mmtemparr[5].'%',6,$ppddxx['id']);
											if($zcr7<>''){
												$asasddd=M('user')->where(array('UE_account'=>$zcr7))->find();
													switch($asasddd['levelname']){
                                                        case '主任':
                                                            $mmtemparr = explode(',',C("gjjldsrate"));
                                                            break;
                                                        case '经理':
                                                            $mmtemparr = explode(',',C("zcjldsrate"));
                                                            break;
                                                        case '总裁':
                                                            $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                            break;
                                                        default:
                                                            $mmtemparr = explode(',',C("jjjldsrate"));
                                                            break;
														
													}
												$zcr8=jlj2($zcr7,$ppddxx['jb']*((float)$mmtemparr[6])/100,'经理奖'.$mmtemparr[6].'%',7,$ppddxx['id']);
												if($zcr8<>''){
													$asasddd=M('user')->where(array('UE_account'=>$zcr8))->find();
														switch($asasddd['levelname']){
                                                            case '主任':
                                                                $mmtemparr = explode(',',C("gjjldsrate"));
                                                                break;
                                                            case '经理':
                                                                $mmtemparr = explode(',',C("zcjldsrate"));
                                                                break;
                                                            case '总裁':
                                                                $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                                break;
                                                            default:
                                                                $mmtemparr = explode(',',C("jjjldsrate"));
                                                                break;
															
														}
													$zcr9=jlj2($zcr8,$ppddxx['jb']*((float)$mmtemparr[7])/100,'经理奖'.$mmtemparr[7].'%',8,$ppddxx['id']);
													if($zcr9<>''){
														$asasddd=M('user')->where(array('UE_account'=>$zcr9))->find();
															switch($asasddd['levelname']){
                                                                case '主任':
                                                                    $mmtemparr = explode(',',C("gjjldsrate"));
                                                                    break;
                                                                case '经理':
                                                                    $mmtemparr = explode(',',C("zcjldsrate"));
                                                                    break;
                                                                case '总裁':
                                                                    $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                                    break;
                                                                default:
                                                                    $mmtemparr = explode(',',C("jjjldsrate"));
                                                                    break;
																
															}
														$zcr10=jlj2($zcr9,$ppddxx['jb']*((float)$mmtemparr[8])/100,'经理奖'.$mmtemparr[8].'%',9,$ppddxx['id']);
                                                        if($zcr10<>''){
                                                            $asasddd=M('user')->where(array('UE_account'=>$zcr10))->find();
                                                            switch($asasddd['levelname']){
                                                                case '主任':
                                                                    $mmtemparr = explode(',',C("gjjldsrate"));
                                                                    break;
                                                                case '经理':
                                                                    $mmtemparr = explode(',',C("zcjldsrate"));
                                                                    break;
                                                                case '总裁':
                                                                    $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                                    break;
                                                                default:
                                                                    $mmtemparr = explode(',',C("jjjldsrate"));
                                                                    break;

                                                            }
                                                            $zcr11=jlj2($zcr10,$ppddxx['jb']*((float)$mmtemparr[9])/100,'经理奖'.$mmtemparr[9].'%',10,$ppddxx['id']);
                                                            if($zcr11<>''){
                                                                $asasddd=M('user')->where(array('UE_account'=>$zcr11))->find();
                                                                switch($asasddd['levelname']){
                                                                    case '主任':
                                                                        $mmtemparr = explode(',',C("gjjldsrate"));
                                                                        break;
                                                                    case '经理':
                                                                        $mmtemparr = explode(',',C("zcjldsrate"));
                                                                        break;
                                                                    case '总裁':
                                                                        $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                                        break;
                                                                    default:
                                                                        $mmtemparr = explode(',',C("jjjldsrate"));
                                                                        break;

                                                                }
                                                                $zcr12=jlj2($zcr11,$ppddxx['jb']*((float)$mmtemparr[10])/100,'经理奖'.$mmtemparr[10].'%',11,$ppddxx['id']);
                                                                if($zcr12<>''){
                                                                    $asasddd=M('user')->where(array('UE_account'=>$zcr12))->find();
                                                                    switch($asasddd['levelname']){
                                                                        case '主任':
                                                                            $mmtemparr = explode(',',C("gjjldsrate"));
                                                                            break;
                                                                        case '经理':
                                                                            $mmtemparr = explode(',',C("zcjldsrate"));
                                                                            break;
                                                                        case '总裁':
                                                                            $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                                            break;
                                                                        default:
                                                                            $mmtemparr = explode(',',C("jjjldsrate"));
                                                                            break;

                                                                    }
                                                                    $zcr13=jlj2($zcr12,$ppddxx['jb']*((float)$mmtemparr[11])/100,'经理奖'.$mmtemparr[11].'%',12,$ppddxx['id']);
                                                                    if($zcr13<>''){
                                                                        $asasddd=M('user')->where(array('UE_account'=>$zcr13))->find();
                                                                        switch($asasddd['levelname']){
                                                                            case '主任':
                                                                                $mmtemparr = explode(',',C("gjjldsrate"));
                                                                                break;
                                                                            case '经理':
                                                                                $mmtemparr = explode(',',C("zcjldsrate"));
                                                                                break;
                                                                            case '总裁':
                                                                                $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                                                break;
                                                                            default:
                                                                                $mmtemparr = explode(',',C("jjjldsrate"));
                                                                                break;

                                                                        }
                                                                        $zcr14=jlj2($zcr13,$ppddxx['jb']*((float)$mmtemparr[12])/100,'经理奖'.$mmtemparr[12].'%',13,$ppddxx['id']);
                                                                        if($zcr14<>''){
                                                                            $asasddd=M('user')->where(array('UE_account'=>$zcr14))->find();
                                                                            switch($asasddd['levelname']){
                                                                                case '主任':
                                                                                    $mmtemparr = explode(',',C("gjjldsrate"));
                                                                                    break;
                                                                                case '经理':
                                                                                    $mmtemparr = explode(',',C("zcjldsrate"));
                                                                                    break;
                                                                                case '总裁':
                                                                                    $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                                                    break;
                                                                                default:
                                                                                    $mmtemparr = explode(',',C("jjjldsrate"));
                                                                                    break;

                                                                            }
                                                                            $zcr15=jlj2($zcr14,$ppddxx['jb']*((float)$mmtemparr[13])/100,'经理奖'.$mmtemparr[13].'%',14,$ppddxx['id']);
                                                                            if($zcr15<>''){
                                                                                $asasddd=M('user')->where(array('UE_account'=>$zcr15))->find();
                                                                                switch($asasddd['levelname']){
                                                                                    case '主任':
                                                                                        $mmtemparr = explode(',',C("gjjldsrate"));
                                                                                        break;
                                                                                    case '经理':
                                                                                        $mmtemparr = explode(',',C("zcjldsrate"));
                                                                                        break;
                                                                                    case '总裁':
                                                                                        $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                                                        break;
                                                                                    default:
                                                                                        $mmtemparr = explode(',',C("jjjldsrate"));
                                                                                        break;

                                                                                }
                                                                                $zcr16=jlj2($zcr15,$ppddxx['jb']*((float)$mmtemparr[14])/100,'经理奖'.$mmtemparr[14].'%',15,$ppddxx['id']);
                                                                                if($zcr16<>''){
                                                                                    $asasddd=M('user')->where(array('UE_account'=>$zcr16))->find();
                                                                                    switch($asasddd['levelname']){
                                                                                        case '主任':
                                                                                            $mmtemparr = explode(',',C("gjjldsrate"));
                                                                                            break;
                                                                                        case '经理':
                                                                                            $mmtemparr = explode(',',C("zcjldsrate"));
                                                                                            break;
                                                                                        case '总裁':
                                                                                            $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                                                            break;
                                                                                        default:
                                                                                            $mmtemparr = explode(',',C("jjjldsrate"));
                                                                                            break;

                                                                                    }
                                                                                    $zcr17=jlj2($zcr16,$ppddxx['jb']*((float)$mmtemparr[15])/100,'经理奖'.$mmtemparr[15].'%',16,$ppddxx['id']);
                                                                                    if($zcr17<>''){
                                                                                        $asasddd=M('user')->where(array('UE_account'=>$zcr17))->find();
                                                                                        switch($asasddd['levelname']){
                                                                                            case '主任':
                                                                                                $mmtemparr = explode(',',C("gjjldsrate"));
                                                                                                break;
                                                                                            case '经理':
                                                                                                $mmtemparr = explode(',',C("zcjldsrate"));
                                                                                                break;
                                                                                            case '总裁':
                                                                                                $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                                                                break;
                                                                                            default:
                                                                                                $mmtemparr = explode(',',C("jjjldsrate"));
                                                                                                break;

                                                                                        }
                                                                                        $zcr18=jlj2($zcr17,$ppddxx['jb']*((float)$mmtemparr[16])/100,'经理奖'.$mmtemparr[16].'%',17,$ppddxx['id']);
                                                                                        if($zcr18<>''){
                                                                                            $asasddd=M('user')->where(array('UE_account'=>$zcr18))->find();
                                                                                            switch($asasddd['levelname']){
                                                                                                case '主任':
                                                                                                    $mmtemparr = explode(',',C("gjjldsrate"));
                                                                                                    break;
                                                                                                case '经理':
                                                                                                    $mmtemparr = explode(',',C("zcjldsrate"));
                                                                                                    break;
                                                                                                case '总裁':
                                                                                                    $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                                                                    break;
                                                                                                default:
                                                                                                    $mmtemparr = explode(',',C("jjjldsrate"));
                                                                                                    break;

                                                                                            }
                                                                                            $zcr19=jlj2($zcr18,$ppddxx['jb']*((float)$mmtemparr[17])/100,'经理奖'.$mmtemparr[17].'%',18,$ppddxx['id']);
                                                                                            if($zcr19<>''){
                                                                                                $asasddd=M('user')->where(array('UE_account'=>$zcr19))->find();
                                                                                                switch($asasddd['levelname']){
                                                                                                    case '主任':
                                                                                                        $mmtemparr = explode(',',C("gjjldsrate"));
                                                                                                        break;
                                                                                                    case '经理':
                                                                                                        $mmtemparr = explode(',',C("zcjldsrate"));
                                                                                                        break;
                                                                                                    case '总裁':
                                                                                                        $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                                                                        break;
                                                                                                    default:
                                                                                                        $mmtemparr = explode(',',C("jjjldsrate"));
                                                                                                        break;

                                                                                                }
                                                                                                $zcr20=jlj2($zcr19,$ppddxx['jb']*((float)$mmtemparr[18])/100,'经理奖'.$mmtemparr[18].'%',19,$ppddxx['id']);
                                                                                                if($zcr20<>''){
                                                                                                    $asasddd=M('user')->where(array('UE_account'=>$zcr20))->find();
                                                                                                    switch($asasddd['levelname']){
                                                                                                        case '主任':
                                                                                                            $mmtemparr = explode(',',C("gjjldsrate"));
                                                                                                            break;
                                                                                                        case '经理':
                                                                                                            $mmtemparr = explode(',',C("zcjldsrate"));
                                                                                                            break;
                                                                                                        case '总裁':
                                                                                                            $mmtemparr = explode(',',C("zcjldsrate_new"));
                                                                                                            break;
                                                                                                        default:
                                                                                                            $mmtemparr = explode(',',C("jjjldsrate"));
                                                                                                            break;

                                                                                                    }
                                                                                                    $zcr21=jlj2($zcr20,$ppddxx['jb']*((float)$mmtemparr[19])/100,'经理奖'.$mmtemparr[19].'%',20,$ppddxx['id']);

                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
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
					
					// 														for($ib=9;$ib>0;$ib++){
					// 															if($zcr9==''){break;}
					// 															$zcr9=jlj2($zcr9,$ppddxx['jb']*0.0001,'经理奖0.01%',5,$ppddxx['id']);
					// 														}	
					
					
					$get_user=M('user')->where(array('UE_account'=>$ppddxx['g_user']))->find();
				//if($get_user['ue_phone']) sendSMS($get_user['ue_phone'],"您好！您申请帮助的资金的会员账号".$ppddxx['jb']."对方已打款。请查收！V社区与您同在!【Vcommunity】");
				if($get_user['ue_phone']) sendSMS($get_user['ue_phone'],"您好！您申请帮助的资金的会员账号".$ppddxx['jb']."对方已打款。请查收！【塔塔互助】");
					die("<script>alert('提交成功,请联系对方确认收款！');parent.location.reload();</script>");
				}else{
					die("<script>alert('提交失败,请联系管理员！');history.back(-1);</script>");
				}
				
			}
		}
	}
	
	public function home_ddxx_gcz(){
	
	
		$this->id = I ( 'get.id' );
	
		$this->display('home_ddxx_gcz');
	}
	






	//确认收款处理函数


	/*array (
	  'comfir' => '1',
	  'face180' => '/Uploads/145292475316503.jpg',
	  'id' => '4',
	)
		*/
	public function home_ddxx_gcz_cl(){

	
		$data_P = I ( 'post.' );
		//dump($data_P);die;
		//echo strlen(trim($data_P['mesg']));die;
		$ppddxx=M('ppdd')->where(array('id'=>$data_P['id'],'zt'=>'1'))->find();   //获取提交的id所对应的并且已经支付的数据
	
	
		if ($ppddxx['g_user']<>$_SESSION['uname']) {
	
			die("<script>alert('非法操作！');history.back(-1);</script>");
		}elseif($data_P['comfir']<>'1'&&$data_P['comfir']<>'2'&&$data_P['comfir']<>'3') {
			die("<script>alert('请选择,确认收款或未收到款投诉！');history.back(-1);</script>");
		}elseif($ppddxx['ts_zt']=='3') {
			die("<script>alert('".C("jjdktime")."小时未确认收款,已被投诉！');history.back(-1);</script>");
		}else {
			if($data_P['comfir']=='1'){
				//在配对表中写人zt = 2 说明已经交易成功
				M('ppdd')->where(array('id'=>$data_P['id'],'zt'=>'1'))->save(array('zt'=>'2'));//更新此订单状态
				//获取接收帮助交易的金额
				$txyqr=M('ppdd')->where(array('g_id'=>$ppddxx['g_id'],'zt'=>'2'))->sum('jb');
				
				//其实这里应该加个排序限制下
				$txzs=M('jsbz')->where(array('id'=>$ppddxx['g_id']))->find();
				if($txzs['jb']==$txyqr){
					M('jsbz')->where(array('id'=>$ppddxx['g_id']))->save(array('qr_zt'=>'1'));//提现订单已确认
				}
				
				
				$czyqr=M('ppdd')->where(array('p_id'=>$ppddxx['p_id'],'zt'=>'2'))->sum('jb');
				
				
				$czzs=M('tgbz')->where(array('id'=>$ppddxx['p_id']))->find();
				if($czzs['jb']==$czyqr){
					M('tgbz')->where(array('id'=>$ppddxx['p_id']))->save(array('qr_zt'=>'1'));//提现订单已确认
				}
				
				jlsja($ppddxx['p_user']);  //处理买入V币的是否可以升级为经理的考核
				
				////更新提现订单状态
				
				//M('tgbz')->where(array('id'=>$ppddxx['p_id']))->setInc('jycg_ds',1);
				//前面已经处理下列出现所以注释了 olnho
// 			    $tgbzcs=M('tgbz')->where(array('id'=>$ppddxx['p_id']))->find();
// 			    if($tgbzcs['cf_ds']==$tgbzcs['jycg_ds']){
// 			    	M('tgbz')->where(array('id'=>$ppddxx['p_id']))->save(array('qr_zt'=>'1'));//更新充值订单状态
// 			    }
				
			    //推荐奖10%
			    //获取买入V币人的详细信息
			    $tgbz_user_xx=M('user')->where(array('UE_account'=>$ppddxx['p_user']))->find();//充值人详细
			    //echo $ppddxx['p_id'];die;
			    //如果买入V币有推荐人
			    if($tgbz_user_xx['ue_accname']<>''){
			    	jlsja($tgbz_user_xx['ue_accname']);  //处理买入V币的推荐人是否可以升级为经理的考核
					//===2015/12/1 QQ54885782 add
					//-------------------------->
						fftuijianmoney($tgbz_user_xx['ue_accname'],$ppddxx['jb'],1);          //---------------------------------------------------->计算推荐奖和会员级别奖

					//===end
/*				    $money=$ppddxx['jb']*C("jjtuijianrate")/100;
				    $accname_zq=M('user')->where(array('UE_account'=>$tgbz_user_xx['ue_accname']))->find();
				    M('user')->where(array('UE_account'=>$tgbz_user_xx['ue_accname']))->setInc('tj_he',$money);
				    $accname_xz=M('user')->where(array('UE_account'=>$tgbz_user_xx['ue_accname']))->find();
				    
					
				    $note3 = "推荐奖".C("jjtuijianrate")."%";
				    $record3 ["UG_account"] = $tgbz_user_xx['ue_accname']; // 登入转出账户 --------------------------------------------------------------->已经封装成fftuijianmoney
				    $record3 ["UG_type"] = 'jb';
				    $record3 ["UG_allGet"] = $accname_zq['tj_he']; // 金币
				    $record3 ["UG_money"] = '+'.$money; //
				    $record3 ["UG_balance"] = $accname_xz['tj_he']; // 当前推荐人的金币馀额
				    $record3 ["UG_dataType"] = 'tjj'; // 金币转出
				    $record3 ["UG_note"] = $note3; // 推荐奖说明
				    $record3["UG_getTime"]		= date ( 'Y-m-d H:i:s', time () ); //操作时间
				    $reg4 = M ( 'userget' )->add ( $record3 );*/
                    if ($czzs['is_sh'] == 0) {
				        jlj3_ok($tgbz_user_xx['ue_accname'],$ppddxx['jb']*C("jjtuijianrate")/100,'直推奖'.C("jjtuijianrate").'%',1,$ppddxx['id']);
                    }
				    //$money_jlj1=;
				    //经理代数奖 如  5,3,2,1,1,1,1,1,1  olnho
				    $mmtemparr = explode(',',C("jjjldsrate"));
				    //推荐人用户名  zcr 
				    //如果存在推荐人
				    if($tgbz_user_xx['zcr']<>''){
				    	//推荐人  经理代数奖金额  文字说明
					    $zcr1=jlj($tgbz_user_xx['zcr'],$ppddxx['jb']*((float)$mmtemparr[0])/100,'经理奖'.$mmtemparr[0].'%');
					    if($zcr1<>''){
					    	$zcr2=jlj($zcr1,$ppddxx['jb']*((float)$mmtemparr[1])/100,'经理奖'.$mmtemparr[1].'%');
					    	//echo $ppddxx['p_user'].'sadfsaf';die;
					    	if($zcr2<>''){
					    		$zcr3=jlj($zcr2,$ppddxx['jb']*((float)$mmtemparr[2])/100,'经理奖'.$mmtemparr[2].'%');
					    		if($zcr3<>''){
					    			$zcr4=jlj($zcr3,$ppddxx['jb']*((float)$mmtemparr[3])/100,'经理奖'.$mmtemparr[3].'%');
					    			if($zcr4<>''){
					    				$zcr5=jlj($zcr4,$ppddxx['jb']*((float)$mmtemparr[4])/100,'经理奖'.$mmtemparr[4].'%');
					    				if($zcr5<>''){
					    					$zcr6=jlj($zcr5,$ppddxx['jb']*((float)$mmtemparr[5])/100,'经理奖'.$mmtemparr[5].'%');
					    					if($zcr6<>''){
					    						$zcr7=jlj($zcr6,$ppddxx['jb']*((float)$mmtemparr[6])/100,'经理奖'.$mmtemparr[6].'%');                 //------------------------------------------->计算经理代数奖
					    						if($zcr7<>''){
					    							$zcr8=jlj($zcr7,$ppddxx['jb']*((float)$mmtemparr[7])/100,'经理奖'.$mmtemparr[7].'%');
					    							if($zcr8<>''){
					    								$zcr9=jlj($zcr8,$ppddxx['jb']*((float)$mmtemparr[8])/100,'经理奖'.$mmtemparr[8].'%');
					    								if($zcr9 <> ''){
					    									$zcr10=jlj($zcr9,$ppddxx['jb']*((float)$mmtemparr[8])/100,'经理奖'.$mmtemparr[8].'%');
					    									if($zcr10 <> ''){
						    									$zcr11=jlj($zcr10,$ppddxx['jb']*((float)$mmtemparr[9])/100,'经理奖'.$mmtemparr[8].'%');
                                                                if($zcr11 <> ''){
                                                                    $zcr12=jlj($zcr11,$ppddxx['jb']*((float)$mmtemparr[10])/100,'经理奖'.$mmtemparr[9].'%');
                                                                    if($zcr12 <> ''){
                                                                        $zcr13=jlj($zcr11,$ppddxx['jb']*((float)$mmtemparr[11])/100,'经理奖'.$mmtemparr[10].'%');
                                                                        if($zcr13 <> ''){
                                                                            $zcr14=jlj($zcr13,$ppddxx['jb']*((float)$mmtemparr[12])/100,'经理奖'.$mmtemparr[11].'%');
                                                                            if($zcr14 <> ''){
                                                                                $zcr15=jlj($zcr14,$ppddxx['jb']*((float)$mmtemparr[13])/100,'经理奖'.$mmtemparr[12].'%');
                                                                                if($zcr15 <> ''){
                                                                                    $zcr16=jlj($zcr15,$ppddxx['jb']*((float)$mmtemparr[14])/100,'经理奖'.$mmtemparr[13].'%');
                                                                                    if($zcr16 <> ''){
                                                                                        $zcr17=jlj($zcr16,$ppddxx['jb']*((float)$mmtemparr[15])/100,'经理奖'.$mmtemparr[14].'%');
                                                                                        if($zcr17 <> ''){
                                                                                            $zcr18=jlj($zcr17,$ppddxx['jb']*((float)$mmtemparr[16])/100,'经理奖'.$mmtemparr[15].'%');
                                                                                            if($zcr18 <> ''){
                                                                                                $zcr19=jlj($zcr18,$ppddxx['jb']*((float)$mmtemparr[17])/100,'经理奖'.$mmtemparr[16].'%');
                                                                                                if($zcr19 <> ''){
                                                                                                    $zcr20=jlj($zcr19,$ppddxx['jb']*((float)$mmtemparr[18])/100,'经理奖'.$mmtemparr[17].'%');
                                                                                                    if($zcr20 <> ''){
                                                                                                        $zcr21=jlj($zcr20,$ppddxx['jb']*((float)$mmtemparr[19])/100,'经理奖'.$mmtemparr[18].'%');
                                                                                                        if($zcr21 <> ''){
                                                                                                            $zcr22=jlj($zcr21,$ppddxx['jb']*((float)$mmtemparr[20])/100,'经理奖'.$mmtemparr[19].'%');
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
					    								}					    							
					    							}

					    						}
					    					}
					    				}
					    			}
					    		}
					    	}
						}
				    }
				    
				    
				    // 			    							for($ib=9;$ib>0;$ib++){
				    // 			    								if($zcr9==''){break;}
				    // 			    								$zcr9=jlj($zcr9,$ppddxx['jb']*0.0001,'经理奖0.01%',5,$ppddxx['id']);
				    // 			    							}
			    
			    
			    }

			    
			    ////经理奖金订单
			   /* lkdsjfsdfj($ppddxx['p_user'],'-'.$ppddxx['jb']);*/              //------------------------------------------------>
			    
			    
				die("<script>alert('此次交易成功！');parent.location.reload();</script>");
	
				
			}elseif($data_P['comfir']=='2'){
				if($ppddxx['ts_zt']=='2'){
					die("<script>alert('您已经投诉过了,请等待管理员审核！');parent.location.reload();</script>");
				}else{
					
					if($data_P['face180']==''){
						die("<script>alert('请上传截图！');parent.location.reload();</script>");
					}else{
					M('ppdd')->where(array('id'=>$data_P['id'],'zt'=>'1'))->save(array('ts_zt'=>'2','pic2'=>$data_P['face180']));
					die("<script>alert('投诉成功,等待管理员审核,如果在审核过程中你收到款了,您还可以确认收款！');parent.location.reload();</script>");
					}
				}
			}
	
	
	
	
			
				
	
		}
	}

	public function home_ddxx_pic_no(){
	
	
		$this->id = I ( 'get.id' );
	
		$this->display('home_ddxx_pic_no');
	}
	
	public function home_ddxx_g_wdk(){
	
	
		$this->id = I ( 'get.id' );
		$this->display('home_ddxx_g_wdk');
	}
	public function home_ddxx_g_wqr(){
	
	
		$this->id = I ( 'get.id' );
	
		$this->display('home_ddxx_g_wqr');
	}
	

	//------------------------------------------------》投诉处理
	public function home_ddxx_g_wdk_cl(){
	
		$data_P = I ( 'post.' );
		
		
		
		
// 		$NowTime = '2015-07-01 01:56:17';
// 		$aab=strtotime($NowTime);
// 		$aab2=$aab+86400+86400;
		
// 		echo "Today:",date('Y-m-d H:i:s',$aab),"<br>";
// echo "Tomorrow:",date('Y-m-d H:i:s',$aab2);die;
	
		

		
		
		
		
		//echo strlen(trim($data_P['mesg']));die;
		$ppddxx=M('ppdd')->where(array('id'=>$data_P['id'],'zt'=>'0'))->find();
		$NowTime = $ppddxx['date'];
		$aab=strtotime($NowTime);
		$aab2=$aab+3600*C("jjdktime");
		$bba = date('Y-m-d H:i:s',time());
		$bba2=strtotime($bba);
	
		if (0) {
	
			die("<script>alert('非法操作！');history.back(-1);</script>");
		}elseif($aab2>$bba2) {
			die("<script>alert('汇款时间未超过".C("jjdktime")."小时,暂不能投诉,如未打款,请与买入V币者取得联系！');history.back(-1);</script>");
		}elseif($data_P['comfir']<>'1'&&$data_P['comfir']<>'2') {
			die("<script>alert('请选择,确认投诉！');history.back(-1);</script>");
		}elseif($ppddxx['ts_zt']=='1'&&$data_P['comfir']<>'2') {
			die("<script>alert('您已经投诉过了,请等待管理员处理！');history.back(-1);</script>");
		}else {
			
			//echo '成功';die;
			if($data_P['comfir']=='1'){
				M('ppdd')->where(array('id'=>$data_P['id'],'zt'=>'0'))->save(array('ts_zt'=>'1'));
				die("<script>alert('投诉提交成功,请等待管理员审核通过！');parent.location.reload();</script>");
			}elseif($data_P['comfir']=='2'){
				M('ppdd')->where(array('id'=>$data_P['id'],'zt'=>'0'))->save(array('ts_zt'=>'0'));
				die("<script>alert('投诉取消成功,卖家可以继续汇款！');parent.location.reload();</script>");
			}
	
	
	
	
			
	
	
		}
	}
	
	
	
	
	public function home_ddxx_g_wqr_cl(){
	
		$data_P = I ( 'post.' );
	
	//dump($data_P);die;
	
	
		// 		$NowTime = '2015-07-01 01:56:17';
		// 		$aab=strtotime($NowTime);
		// 		$aab2=$aab+86400+86400;
	
		// 		echo "Today:",date('Y-m-d H:i:s',$aab),"<br>";
		// echo "Tomorrow:",date('Y-m-d H:i:s',$aab2);die;
	
	
	
	
	
	
	
		//echo strlen(trim($data_P['mesg']));die;
		$ppddxx=M('ppdd')->where(array('id'=>$data_P['id'],'zt'=>'1'))->find();
		$NowTime = $ppddxx['date_hk'];
		$aab=strtotime($NowTime);
		$aab2=$aab+3600*C("jjdktime");
		$bba = date('Y-m-d H:i:s',time());
		$bba2=strtotime($bba);
	
		if ($ppddxx['p_user']<>$_SESSION['uname']) {
	
			die("<script>alert('非法操作！');history.back(-1);</script>");
		}elseif($aab2>$bba2) {
			die("<script>alert('确认时间未超过".C("jjdktime")."小时,暂不能投诉,如未确认,请与对方取得联系！');history.back(-1);</script>");
		}elseif($data_P['comfir']<>'1'&&$data_P['comfir']<>'2') {
			die("<script>alert('请选择,确认或取消！');history.back(-1);</script>");
		}elseif($ppddxx['ts_zt']=='2') {
			die("<script>alert('您已被对方投诉,请与对方取得联系！');history.back(-1);</script>");
		}else{
			
			
			
			
			
			
			
			
			
		
			//dump($data_P);die;
			//echo strlen(trim($data_P['mesg']));die;
			
			
			
			
				if($data_P['comfir']=='1'){
			
					M('ppdd')->where(array('id'=>$data_P['id'],'zt'=>'1'))->save(array('zt'=>'2'));//更新此订单状态
			
					$txyqr=M('ppdd')->where(array('g_id'=>$ppddxx['g_id'],'zt'=>'2'))->sum('jb');
			
			
					$txzs=M('jsbz')->where(array('id'=>$ppddxx['g_id']))->find();
					if($txzs['jb']==$txyqr){
						M('jsbz')->where(array('id'=>$ppddxx['g_id']))->save(array('qr_zt'=>'1'));//提现订单已确认
					}
			
			
					$czyqr=M('ppdd')->where(array('p_id'=>$ppddxx['p_id'],'zt'=>'2'))->sum('jb');
			
			
					$czzs=M('tgbz')->where(array('id'=>$ppddxx['p_id']))->find();
					if($czzs['jb']==$czyqr){
						M('tgbz')->where(array('id'=>$ppddxx['p_id']))->save(array('qr_zt'=>'1'));//提现订单已确认
					}
			
			
			
					////更新提现订单状态
			
					//M('tgbz')->where(array('id'=>$ppddxx['p_id']))->setInc('jycg_ds',1);
			
					// 			    $tgbzcs=M('tgbz')->where(array('id'=>$ppddxx['p_id']))->find();
					// 			    if($tgbzcs['cf_ds']==$tgbzcs['jycg_ds']){
					// 			    	M('tgbz')->where(array('id'=>$ppddxx['p_id']))->save(array('qr_zt'=>'1'));//更新充值订单状态
					// 			    }
			
					//推荐奖10%
					 
					$tgbz_user_xx=M('user')->where(array('UE_account'=>$ppddxx['p_user']))->find();//充值人详细
					//echo $ppddxx['p_id'];die;
					if($tgbz_user_xx['ue_accname']<>''){
						//===2015/12/1 QQ54885782 add
							fftuijianmoney($tgbz_user_xx['ue_accname'],$ppddxx['jb'],1);
						//===end
						/*
						$money=$ppddxx['jb']*C("jjtuijianrate")/100;
						$accname_zq=M('user')->where(array('UE_account'=>$tgbz_user_xx['ue_accname']))->find();
						M('user')->where(array('UE_account'=>$tgbz_user_xx['ue_accname']))->setInc('UE_money',$money);
						$accname_xz=M('user')->where(array('UE_account'=>$tgbz_user_xx['ue_accname']))->find();
						 
						$note3 = "推荐奖".C("jjtuijianrate")."%";
						$record3 ["UG_account"] = $tgbz_user_xx['ue_accname']; // 登入转出账户
						$record3 ["UG_type"] = 'jb';
						$record3 ["UG_allGet"] = $accname_zq['ue_money']; // 金币
						$record3 ["UG_money"] = '+'.$money; //
						$record3 ["UG_balance"] = $accname_xz['ue_money']; // 当前推荐人的金币馀额
						$record3 ["UG_dataType"] = 'tjj'; // 金币转出
						$record3 ["UG_note"] = $note3; // 推荐奖说明
						$record3["UG_getTime"]		= date ( 'Y-m-d H:i:s', time () ); //操作时间
						$reg4 = M ( 'userget' )->add ( $record3 );*/
						 
						//$money_jlj1=;
						
						$mmtemparr = explode(',',C("jjjldsrate"));

						if($tgbz_user_xx['zcr']<>''){
							$zcr2=jlj($tgbz_user_xx['zcr'],$ppddxx['jb']*((float)$mmtemparr[0])/100,'经理奖'.$mmtemparr[0].'%');
							if($zcr2<>''){
								$zcr3=jlj($zcr2,$ppddxx['jb']*((float)$mmtemparr[1])/100,'经理奖'.$mmtemparr[1].'%');
								//echo $ppddxx['p_user'].'sadfsaf';die;
								if($zcr3<>''){
									$zcr4=jlj($zcr3,$ppddxx['jb']*((float)$mmtemparr[2])/100,'经理奖'.$mmtemparr[2].'%');
									if($zcr4<>''){
										$zcr5=jlj($zcr4,$ppddxx['jb']*((float)$mmtemparr[3])/100,'经理奖'.$mmtemparr[3].'%');
										if($zcr5<>''){
											jlj($zcr5,$ppddxx['jb']*((float)$mmtemparr[4])/100,'经理奖'.$mmtemparr[4].'%');
										}
									}
								}
							}
						}
						 
						 
						 
						 
						 
					}
					 
					 
					 
					 
					 
					 
					die("<script>alert('系统自动处理成功！');parent.location.reload();</script>");
			
			
				}
			
			
			
					

			
			
			
	
	
	
	
	
				
	
	
		}
	}
	
	public function tgbz_list_cf(){
	
	
		$User = M ( 'tgbz' ); // 实例化User对象
		$data = I ( 'post.user' );
	
		$this->z_jgbz=$User->sum('jb');
		$this->z_jgbz2=$User->where(array('qr_zt'=>'1'))->sum('jb');
		$this->z_jgbz3=$User->where(array('qr_zt'=>array('neq','1')))->sum('jb');
		//$map ['UG_dataType'] = array('IN',array('mrfh','tjj','kdj','mrldj','glj'));
	
		$map['zt']=0;
	
		if(I ( 'get.cz' )==1){
			$map['zt']=1;
		}
		if($data<>''){
			$map['user']=$data;
		}
		$count = $User->where ( $map )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
	
		$p = getpage($count,20);
	
		$list = $User->where ( $map )->order ( 'id DESC' )->limit ( $p->firstRow, $p->listRows )->select ();
		//dump($list);die;
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $p->show() ); // 赋值分页输出
	
	
	
		$this->display('index/tgbz_list_cf');
	}
	
	
	public function jsbz_list_cf(){
	
	
	
		$User = M ( 'jsbz' ); // 实例化User对象
		$data = I ( 'post.user' );
	
		$this->z_jgbz=$User->sum('jb');
		$this->z_jgbz2=$User->where(array('qr_zt'=>'1'))->sum('jb');
		$this->z_jgbz3=$User->where(array('qr_zt'=>array('neq','1')))->sum('jb');
		//$map ['UG_dataType'] = array('IN',array('mrfh','tjj','kdj','mrldj','glj'));
	
		$map['zt']=0;
	
		if(I ( 'get.cz' )==1){
			$map['zt']=1;
		}
		if($data<>''){
			$map['user']=$data;
		}
		$count = $User->where ( $map )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
	
		$p = getpage($count,20);
	
		$list = $User->where ( $map )->order ( 'id DESC' )->limit ( $p->firstRow, $p->listRows )->select ();
		//dump($list);die;
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $p->show() ); // 赋值分页输出
	
	
	
		$this->display('index/jsbz_list_cf');
	}
	
	public function tgbz_list_cf_cl(){
		$data=I('post.');
		$p_user=M('tgbz')->where(array('id'=>$data['pid']))->find();
		if (! preg_match ( '/^[0-9,]{1,100}$/', I('post.arrid') )) {
			$this->error( '格式不对!' );
			die;
		}
		$arr = explode(',',I('post.arrid'));
		//dump($arr);
		if(array_sum($arr)<>$p_user['jb']){
			$this->error( '拆分金额不对!' );
			die;
		}
	
	
	
	
		$p_user1=M('tgbz')->where(array('id'=>$data['pid']))->find();
	
		$pipeits=0;
		foreach($arr as $value){
			if($value<>''){
				$data2['zffs1']=$p_user1['zffs1'];
				$data2['zffs2']=$p_user1['zffs2'];
				$data2['zffs3']=$p_user1['zffs3'];
				$data2['user']=$p_user1['user'];
				$data2['jb']=$value;
				$data2['user_nc']=$p_user1['user_nc'];
				$data2['user_tjr']=$p_user1['user_tjr'];
				$data2['date']=$p_user1['date'];
				$data2['zt']=$p_user1['zt'];
				$data2['qr_zt']=$p_user1['qr_zt'];
				$varid = M('tgbz')->add($data2);
				$pipeits++;
			}
			 
	
		}
	
		M('tgbz')->where(array('id'=>$data['pid']))->delete();
	
	
	
	
		$this->success('匹配成功!拆分成'.$pipeits.'条订单!');
	}
	
	public function jsbz_list_cf_cl(){
		$data=I('post.');
		$p_user=M('jsbz')->where(array('id'=>$data['pid']))->find();
		if (! preg_match ( '/^[0-9,]{1,100}$/', I('post.arrid') )) {
			$this->error( '格式不对!' );
			die;
		}
		$arr = explode(',',I('post.arrid'));
		//dump($arr);
		if(array_sum($arr)<>$p_user['jb']){
			$this->error( '拆分金额不对!' );
			die;
		}
		 
		 
		 
		 
		$p_user1=M('jsbz')->where(array('id'=>$data['pid']))->find();
		 
		$pipeits=0;
		foreach($arr as $value){
			if($value<>''){
				$data2['zffs1']=$p_user1['zffs1'];
				$data2['zffs2']=$p_user1['zffs2'];
				$data2['zffs3']=$p_user1['zffs3'];
				$data2['user']=$p_user1['user'];
				$data2['jb']=$value;
				$data2['user_nc']=$p_user1['user_nc'];
				$data2['user_tjr']=$p_user1['user_tjr'];
				$data2['date']=$p_user1['date'];
				$data2['zt']=$p_user1['zt'];
				$data2['qr_zt']=$p_user1['qr_zt'];
				$varid = M('jsbz')->add($data2);
				$pipeits++;
			}
	
			 
		}
		 
		M('jsbz')->where(array('id'=>$data['pid']))->delete();
		 
		 
		 
		 
		$this->success('匹配成功!拆分成'.$pipeits.'条订单!');
	}



		// QQ 742224183
	public function jujue(){
		if(IS_POST){
			$id =I('id',0,'intval');
			if($id>0){
				
				if(empty($pipei)){
					echo json_encode(array(
					'error' => 1,
					'msg' => '拒绝付款失败!无法重新匹配',
					));
				}
				//买入V币者表单信息

				//file_put_contents('./t.txt',var_export(M('jsbz')->where(array('id'=>$pipei['p_id']))->find(),true));
				$applyData = M('tgbz')->where(array('id'=>$pipei['p_id']))->save(array('zt'=>0,'cf_ds'=>0));
				//接收帮助者表单信息

				$needData = M('jsbz')->where(array('id'=>$pipei['g_id']))->save(array('zt'=>0,'cf_ds'=>0));

				 M("ppdd")->where(array('id'=>$id))->delete();
				echo json_encode(array(
						'error' => 0,
						'msg' => '拒绝付款成功，等待匹配中',
					));
			}else{
				echo json_encode(array(
					'error' => 1,
					'msg' => '拒绝付款失败!无法重新匹配',
				));
			}
		}else{
			$this->error('非法操作！');
		}
    }	

    public function chongxinpipei($id){
    	$pipei  = M("ppdd")->where(array('id'=>$id))->find();

		$applyData = M('tgbz')->where(array('id'=>$pipei['p_id']))->save(array('zt'=>0,'cf_ds'=>0));
		//接收帮助者表单信息

		$needData = M('jsbz')->where(array('id'=>$pipei['g_id']))->save(array('zt'=>0,'cf_ds'=>0));

		 M("ppdd")->where(array('id'=>$id))->delete();
    }



    	public function messageInbox(){
		$this->display("Index/messageInbox");
	}
	 
	public function pdList(){
		$User = M ( 'tgbz' ); // 实例化User对象
		
		$map['user']=$_SESSION['uname'];
		$count = $User->where ( $map )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p = getpage($count,100);
		
		$list = $User->where ( $map )->order ( 'id DESC' )->limit ( $p->firstRow, $p->listRows )->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $p->show() ); // 赋值分页输出
		
		//买入V币配对流程
		//////////////////----------
		$User = M ( 'ppdd' ); // 实例化User对象
		
		$map2['p_user']=$_SESSION['uname'];
		$count2 = $User->where ( $map2 )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p2 = getpage($count2,100);
		
		$Plists = $User->where ( $map2 )->order ( 'id DESC' )->limit ( $p2->firstRow, $p2->listRows )->select ();
		$this->assign ( 'Plists', $Plists ); // 赋值数据集
		$this->assign ( 'page2', $p2->show() ); // 赋值分页输出

		//导航激活
		$this->she_list = true;

		$this->display('Index/pdList');
	}

	public function  gdList(){
		//////////////////----------
		$User = M ( 'jsbz' ); // 实例化User对象
		
		$map['user']=$_SESSION['uname'];
		$count = $User->where ( $map )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p = getpage($count,100);
		
		$list = $User->where ( $map)->order ( 'id DESC' )->limit ( $p->firstRow, $p->listRows )->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $p->show() ); // 赋值分页输出
		/////////////////----------------






		$User = M ( 'ppdd' ); // 实例化User对象
		
		$map3['g_user']=$_SESSION['uname'];
		$count3 = $User->where ( $map3 )->count (); // 查询满足要求的总记录数
		//$page = new \Think\Page ( $count, 3 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$p3 = getpage($count3,100);
		
		$glist = $User->where ( $map3 )->order ( 'id DESC' )->limit ( $p3->firstRow, $p3->listRows )->select ();
		$this->assign ( 'glist', $glist ); // 赋值数据集
		$this->assign ( 'gpage', $p3->show() ); // 赋值分页输出


		//导航激活
		$this->de_list = true;

		$this->display('Index/gdList');
	}


    // 金币转账处理
    public function cyjzzcl() {
        if (IS_POST) {

            $data_P = I ( 'post.' );
            //$user = M ( 'user' )->where ( array (UE_account => $_SESSION ['uname']) )->find ();
            //$user1 = M ();
            $user_df = M ( 'user' )->where ( array (UE_account => $data_P['user']) )->find ();   //
            //! $this->check_verify ( I ( 'post.yzm' ) )
            //! $user1->autoCheckToken ( $_POST )
            $userxx=M('user')->where(array('UE_account'=>$_SESSION['uname']))->find();

            //dump($userxx);die;

            //$userxx['ue_secpwd']<>md5($data_P['ejmm'])
            if(false){
                die("<script>alert('二级密码输入有误！');history.back(-1);</script>");
            }else{


                $jbhe=$data_P ['sh'];
                if (! preg_match ( '/^[0-9]{1,10}$/', $data_P ['sh'] )||!$data_P ['sh']>0) {
                    die("<script>alert('数量输入有勿！');history.back(-1);</script>");
                } elseif ($userxx['ue_cyj'] < $jbhe) {
                    die("<script>alert('排单币不足！');history.back(-1);</script>");
                }elseif (!$user_df) {
                    die("<script>alert('对方账号不存在！');history.back(-1);</script>");
                    //}elseif ($user_df['sfjl']=='0') {
                    //	die("<script>alert('对方不是经理,不可转出！');history.back(-1);</script>");
                } else {



                    M ( 'user' )->where ( array (UE_account => $data_P['user']) )->setInc('UE_cyj',$jbhe);
                    M('user')->where(array('UE_account'=>$_SESSION['uname']))->setDec('UE_cyj',$jbhe);

                    $note3 = "排单币转出给".$data_P['user'];
                    $record3 ["UG_account"] = $_SESSION['uname']; // 登入转出账户
                    $record3 ["UG_type"] = 'mp';
                    $record3 ["UG_allGet"] = $userxx['ue_cyj']; // 金币
                    $record3 ["UG_money"] = '-'.$jbhe; //
                    $record3 ["UG_balance"] = $userxx['ue_cyj'] - $jbhe; // 当前推荐人的金币馀额
                    $record3 ["UG_dataType"] = 'cyjzc'; // 金币转出
                    $record3 ["UG_note"] = $note3; // 推荐奖说明
                    $record3["UG_getTime"]		= date ( 'Y-m-d H:i:s', time () ); //操作时间
                    $reg4 = M ( 'userget' )->add ( $record3 );

                    $note3 = "排单币转转入到".$data_P['user'];
                    $record3 ["UG_account"] = $data_P['user']; // 登入转出账户
                    $record3 ["UG_type"] = 'mp';
                    $record3 ["UG_allGet"] = $user_df['ue_cyj']; // 金币
                    $record3 ["UG_money"] = '+'.$jbhe; //
                    $record3 ["UG_balance"] = $user_df['ue_cyj'] + $jbhe; // 当前推荐人的金币馀额
                    $record3 ["UG_dataType"] = 'cyjzr'; // 金币转出
                    $record3 ["UG_note"] = $note3; // 推荐奖说明
                    $record3["UG_getTime"]		= date ( 'Y-m-d H:i:s', time () ); //操作时间
                    $reg4 = M ( 'userget' )->add ( $record3 );


                    $this->success('转让成功!');
                }
            }
        }
    }


}
