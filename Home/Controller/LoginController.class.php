<?php
namespace Home\Controller;
use Tools\HomeController; 
use Think\Controller;
class LoginController extends HomeController {
		public function index(){
			$ip = get_client_ip();
			$pwd   =trim($_POST['password']);
			$name  =trim($_POST['name']);
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
      $nameArr=array(
          'name'=>$name,
          'pwd'=>md5($pwd)
          );
      $userFind=M('user')->where($nameArr)->find();
      if($userFind) {
          $token = md5($ip.$userFind['id']);
          $userid = $userFind['id'];
          session('name',$userFind['info']);
          $psnfind=M('psn')->where(array('userid'=>$userid))->find();
          $psnid= $psnfind['id'];
          session('psnid',$psnid);
         	$this->redirect('manager/index', NULL, 0, '');
          
			}else{
				$this->assign('ret',"10000102");
				//dump("password error");
				$this->display();
				exit;
			}

		}
	
	
		public function register(){
			$this->display();
		}

		
}

?>