<?php
namespace Home\Controller;
use Tools\HomeController; 
use Think\Controller;
class LoginController extends HomeController {
		public function index(){
			$ip = get_client_ip();
			$pwd   =trim($_POST['password']);
			$name  =trim($_POST['name']);
			$fid=$_GET['fid'];
			if(empty($fid)){
				$fid=5;
			}
			$fFind=M('user')->where(array('autoid'=>$fid))->find();
			$this->assign('fname',$fFind['info']);
			
			if(empty($pwd)||empty($name)){
				$this->display();
				exit;
			}
			
			$nameFind=M('user')->where(array('name'=>$name))->find();
			if($nameFind==NULL){
					$this->assign('ret',"10000101");
          $this->display();
          //dump("user not find");
          exit;
			}
			if($nameFind['autoid']!=$fid){
					$this->assign('ret',"10000101");
          $this->display();
          //dump("user not find");
          exit;
			}

      $nameArr=array(
          'name'=>$name,
          'pwd'=>md5($pwd)
          );
      $userFind=M('user')->where($nameArr)->find();
      
      if($userFind) {
          $token = md5($ip.$userFind['id']);
          $userid = $userFind['autoid'];
          session('mj_name',$userFind['info']);
          $psnfind=M('psn')->where(array('userid'=>$userid))->find();
          $psnid= $psnfind['id'];
          $tsn=$psnfind['tsn'];
          $tsntype=substr($tsn,0,1);
          //dump($tsntype);
          session('mj_tsntype',$tsntype);
          session('mj_psnid',$psnid);
         	$this->redirect('manager/index', NULL, 0, '');
          
			}else{
				$this->assign('ret',"10000102");
				//dump("password error");
				$this->display();
				exit;
			}

		}
	
		public function logout(){
				$psnid = $_SESSION['mj_psnid'];
				$psnfind=M('psn')->where(array('id'=>$psnid))->find();
				$fid=$psnfind['userid'];
				//dump($fid);
				session('mj_tsntype',	NULL);
				session('mj_psnid',	NULL);
      	$this ->redirect('/login/index',array('fid'=>$fid),0,'');
      	exit;
		}
		
		public function register(){
			$this->display();
		}

		
}

?>