<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    }
    
    public function syncani2dev(){
    		$psnid=$_GET['psnid'];
    		dump('psnid:'.$psnid);
    		$fields = M('field')->where(array('psnid'=>$psnid))->order('shedid asc')->select();
				$fieldsize=count($fields);
				foreach($fields as $field){
					$shedid=$field['shedid'];
					dump('shedid:'.$shedid);
					$anis = M('animal')->where(array('psnid'=>$psnid,'shedid'=>$shedid))->select();
					foreach($anis as $ani){
						$devid=$ani['devid'];
						dump('devid:'.$devid);
						dump('sn:'.$ani['sn']);
						if($devid!=NULL&&$devid!=0){
							$dev = M('device')->where(array('psn'=>$psnid,'devid'=>$devid))->find();
							if($dev['shedid']!=$shedid){
								$devsave['sheid']=$shedid;
							}
							if($dev['area']!=$ani['area']){
								$devsave['sheid']=$ani['area'];
							}
							if($dev['fold']!=$ani['fold']){
								$devsave['fold']=$ani['fold'];
							}
							if(!empty($devsave)){
								dump($devsave);
								//$ret = M('device')->where(array('psn'=>$psnid,'devid'=>$devid))->save($devsave);
								//$ret2 = M('sickness')->where(array('psnid'=>$psnid,'devid'=>$devid))->save($devsave);
							}
							
						}
						
					}
				}
    		exit;
    	
    	
    }
    
    public function syncdev2ani(){
    		$psnid=$_GET['psnid'];
    		dump('psnid:'.$psnid);
    		$fields = M('field')->where(array('psnid'=>$psnid))->order('shedid asc')->select();
				$fieldsize=count($fields);
				foreach($fields as $field){
					$shedid=$field['shedid'];
					dump('shedid:'.$shedid);
					$anis = M('animal')->where(array('psnid'=>$psnid,'shedid'=>$shedid))->select();
					foreach($anis as $ani){
						$sn=$ani['sn'];
						dump('sn:'.$ani['sn']);
						if($sn){
							$dev = M('device')->where(array('psn'=>$psnid,'sn'=>$sn))->find();
							if(empty($dev)){
								continue;
							}
							$devid=$dev['devid'];
							dump('devid:'.$devid);
							if($devid&&$ani['shedid']!=$devid){
								$anisave['sheid']=$devid;
							}

							if(!empty($anisave)){
								dump($anisave);
								//$ret = M('animal')->where(array('id'=>$ani['id']))->find();
								//dump($ret);
								//$ret = M('device')->where(array('psn'=>$psnid,'devid'=>$devid))->save($devsave);
								//$ret2 = M('sickness')->where(array('psnid'=>$psnid,'devid'=>$devid))->save($devsave);
							}
						}
					}
				}
    		exit;
    }
}