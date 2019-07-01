<?php
namespace Home\Controller;
use Tools\HomeController;
use Think\Controller;
class ManagerController extends HomeController
{

    public function index()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
    		
    		if(empty($psnid)||empty($name)||empty($mj_tsntype)){
    			$this->redirect('/login/index', NULL, 0, '');
    		}	
    		
				$type = M('purptype')->where(array('anitype'=>$mj_tsntype))->select();

				$field = M('field')->where(array('psnid'=>$psnid))->order('shedid asc')->select();
				$fieldsize=count($field);
				for($i=0;$i< $fieldsize;$i++){
					$workerid1=$field[$i]['workerid1'];
					$workerid2=$field[$i]['workerid2'];
					$workerid3=$field[$i]['workerid3'];
				
					$worker1=M('worker')->where(array('id'=>$workerid1,'psnid'=>$psnid))->find();
					$worker2=M('worker')->where(array('id'=>$workerid2,'psnid'=>$psnid))->find();
					$worker3=M('worker')->where(array('id'=>$workerid3,'psnid'=>$psnid))->find();
					
					$field[$i]['workername1']=$worker1['name'];
					$field[$i]['workername2']=$worker2['name'];
					$field[$i]['workername3']=$worker3['name'];
					$typeid=$field[$i]['type'];
					$field[$i]['typename']=$type[$typeid]['name'];
					
					$shedid = $field[$i]['shedid'];
					$anicount = M('animal')->where(array('psnid'=>$psnid,'shedid'=>$shedid,'state'=>0))->count();
					$field[$i]['count']=$anicount;
					//dump($field);
				}
				$this->assign('tsntype', $tsntype);
				$this->assign('name', $name);
        $this->assign('field', $field);
        $this->display();
    }


    public function addshed()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
    		
				$shed=$_POST['shed'];
				$area=$_POST['area'];
				$fold=$_POST['fold'];
				$type=$_POST['type'];
				
				$worker1=$_POST['worker1'];
				$worker2=$_POST['worker2'];

				if($shed){
					$filed['psnid']=$psnid;
					$filed['shedid']=$shed;
				}
				if($area){
					$filed['areas']=$area;
				}
				if($shed){
					$filed['folds']=$fold;
				}
				if($shed){
					$filed['type']=$type;
				}
				if($shed){
					$filed['workerid1']=$worker1;
				}
				if($shed){
					$filed['workerid2']=$worker2;
				}

				if(count($filed)==7){
						$fieldfind = M('field')->where(array('psnid'=>$psnid,'shedid'=>$shed))->find();
						if(empty($fieldfind)){
							$savefield = M('field')->add($filed);
						}else{
	            Alert("该舍已存在!","back",NULL);
	            exit;
						}

						$this->redirect('manager/chkshed', NULL, 0, '');
						exit;
				}

				$type = M('purptype')->where(array('anitype'=>$mj_tsntype))->select();
        $workers1 = M('worker')->where(array('psnid'=>$psnid,'type'=>1))->select();
				$workers2 = M('worker')->where(array('psnid'=>$psnid,'type'=>2))->select();
				if(empty($workers1)||empty($workers2)){
            Alert("请先添加员工信息!",NULL,"/manager/addworker");
            exit;
				}
        $this->assign('workers1', $workers1);
        $this->assign('workers2', $workers2);
				$this->assign('name', $name);
				$this->assign('type', $type);
				
        $this->display();
    }

    public function addshedhome()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
    		
				$shed=$_POST['shed'];
				$area=$_POST['area'];
				$fold=$_POST['fold'];
				$type=$_POST['type'];
				
				$worker1=$_POST['worker1'];
				$worker2=$_POST['worker2'];

				if($shed){
					$filed['psnid']=$psnid;
					$filed['shedid']=$shed;
				}
				if($area){
					$filed['areas']=$area;
				}
				if($shed){
					$filed['folds']=$fold;
				}
				if($shed){
					$filed['type']=$type;
				}
				if($shed){
					$filed['workerid1']=$worker1;
				}
				if($shed){
					$filed['workerid2']=$worker2;
				}

				if(count($filed)==7){
						$fieldfind = M('field')->where(array('psnid'=>$psnid,'shedid'=>$shed))->find();
						if(empty($fieldfind)){
							$savefield = M('field')->add($filed);
						}else{
	            Alert("该舍已存在!","back",NULL);
	            exit;
						}

						$this->redirect('manager/index', NULL, 0, '');
						exit;
				}
			
				$type = M('purptype')->where(array('anitype'=>$mj_tsntype))->select();
        $workers1 = M('worker')->where(array('psnid'=>$psnid,'type'=>1))->select();
				$workers2 = M('worker')->where(array('psnid'=>$psnid,'type'=>2))->select();
				if(empty($workers1)||empty($workers2)){
            Alert("请先添加员工信息!",NULL,"/manager/addworker");
            exit;
				}
				
        $this->assign('workers1', $workers1);
        $this->assign('workers2', $workers2);
				$this->assign('name', $name);
				$this->assign('type', $type);
				
        $this->display();
    }
    
    public function addworker()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
    		
				$workername=$_POST['name'];
				$phone=$_POST['phone'];
				$type=$_POST['workertype'];
			
				if(empty($workername)){
        		$workertype = M('workertype')->select();
        		$this->assign('workertype', $workertype);
						$this->assign('name', $name);
						$this->display();
						exit;
				}
				
				$worker['name']=$workername;
				$worker['type']=$type;
				$worker['phone']=$phone;
				$worker['psnid']=$psnid;
				
				$savefield = M('worker')->add($worker);
				$this->redirect('manager/chkworker', NULL, 0, '');
    }

    public function addanimal()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
    		
				$field_id =$_GET['id'];

        $type = M('anltype')->where(array('type'=>$mj_tsntype))->select();
				$kind1 = M('anlkind')->where(array('subtype'=>1,'type'=>$mj_tsntype))->select();
				$kind2 = M('anlkind')->where(array('subtype'=>2,'type'=>$mj_tsntype))->select();
				$entertype = M('entertype')->select();
				$field = M('field')->where(array('psnid'=>$psnid))->select();

				$fieldsize=count($field);
				
				$shed_index=-1;
				for($i=0;$i< $fieldsize;$i++){
					$workerid1=$field[$i]['workerid1'];
					$workerid2=$field[$i]['workerid2'];
					$workerid3=$field[$i]['workerid3'];
				
					$worker1=M('worker')->where(array('id'=>$workerid1,'psnid'=>$psnid))->find();
					$worker2=M('worker')->where(array('id'=>$workerid2,'psnid'=>$psnid))->find();
					$worker3=M('worker')->where(array('id'=>$workerid3,'psnid'=>$psnid))->find();
					
					$field[$i]['workername1']=$worker1['name'];
					$field[$i]['workername2']=$worker2['name'];
					$field[$i]['workername3']=$worker3['name'];	
					if($field_id){
						if($field[$i]['id']==$field_id){
							$shed_index=$i;
						}
					}
				}
				$this->assign('shed_index', $shed_index);
				$this->assign('field', $field);
				

        if(empty($type)){

        }else{
            $this->assign('kind1', $kind1);
            $this->assign('kind2', $kind2);
            $this->assign('type', $type);
            $this->assign('entertype', $entertype);
        }
				$this->assign('name', $name);
        $this->display();
    }


    public function upload()
    {
    	
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
				
        $sn = $_POST['sn'];
        $id = $_POST['id'];

        $sex = $_POST['sex'];
        
        $type = $_POST['type'];
        
        $typefind = M('anltype')->where(array('id'=>$type))->find();
        if($typefind){
        	$sub_type=$typefind['sub_type'];
        }
				
        if($sub_type==1){
        	$kind = $_POST['kind1'];
      	}else{
      		$kind = $_POST['kind2'];
      	}
      	
        $shedid = $_POST['shedid'];
        $area = $_POST['area'];
        $fold = $_POST['fold'];
        
        $bdate = $_POST['bdate'];
        $bweight = $_POST['bweight'];
        $childnum = $_POST['childnum'];        
        
        $fasn = $_POST['fasn'];
        $mosn = $_POST['mosn'];
        $entertype = $_POST['entertype'];
        $oweight = $_POST['oweight'];
        
        $insource = $_POST['insource'];
        $indate = $_POST['indate'];
        
        $pic_url =  $_POST['pic_url'];
				$info = $_POST['info'];
        $finfo = str_replace("\r\n", "<br>", $info);
        
        $ret = D('animal')->where(array('sn' => $sn))->find();
        if (!empty($ret)) {
            echo "<script language=\"JavaScript\">\r\n";
            echo " alert(\"编号重复，请修改编号!\");\r\n";
            echo " history.back();\r\n";
            echo "</script>";
            exit;
        }

				$ani=array();
				$ani['psnid']=$psnid;
				$ani['sn']=$sn;
				$ani['sex']=$sex;
				$ani['kind']=$kind;
				$ani['type']=$type;
				
				if(!empty($shedid)){
					$fieldfind = M('field')->where(array('psnid'=>$psnid,'id'=>$shedid))->find();
					$ani['shedid']=$fieldfind['shedid'];
        }
				
				$ani['area']=$area;
				
				if(!empty($id)){
					$devfind= D('device')->where(array('devid' => $id,'psn'=>$psnid))->find();
					if(!empty($devfind)){
						 //$devsave = D('device')->where(array('devid' => $id,'psn'=>$psnid))->save(array('sn' => $sn));
						 $ani['devid']=$id;
					}
				}

        if(!empty($fold)){
            $ani['fold']=$fold;
        }
        if(!empty($bdate)){
            $ani['birthday']=$bdate;
        }
        if(!empty($bweight)){
            $ani['birthweight']=$bweight;
        }
        if(!empty($childnum)){
            $ani['childnum']=$childnum;
        }
        
        if(!empty($fasn)){
            $ani['fathersn']=$fasn;
        }
        if(!empty($mosn)){
            $ani['mothersn']=$mosn;
        }
        
        if(!empty($entertype)){
            $ani['entertype']=$entertype;
        }
        if(!empty($indate)){
            $ani['enterdate']=$indate;
        }
        
        if(!empty($oweight)){
            $ani['leaveweight']=$oweight;
        }
                
        if(!empty($insource)){
            $ani['entersource']=$insource;
        }
        
        if(!empty($info)){
            $ani['info']=$finfo;
        }
        if(!empty($pic_url)){
            $ani['photo']=$pic_url;
        }
        
        $anisave = D('animal')->add($ani);
        //dump($ani);

				$ware = $ani;
			
				if($sex==1){
					$ware['sex']="公";
				}else{
					$ware['sex']="母";
				}
				$kindfind = M('anlkind')->where(array('id'=>$kind))->find();
				$ware['kind']=$kindfind['name'];
        $typefind = M('anltype')->where(array('type'=>$type))->find();
				$ware['type']=$typefind['name'];

				$areas = array('A','B','C','D','E','F','G','H','I','J');
				$ware['area']=$areas[$area-1];
		
				if(!empty($fold)){
					$ware['fold']=$fold;
				}

				if(!empty($entertype)){
					//dump($entertype);
					$entertypefind = M('entertype')->where(array('id'=>$entertype))->find();
					$ware['entertype']=$entertypefind['name'];
				}
				
				$this->assign('name', $name);
        $this->assign('ware', $ware);
        $this->assign('filename', $pic_url);
        $this->display();
    }

    public function upload2()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
    		
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 31457280;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'pdf');// 设置附件上传类型
        $upload->rootPath = 'Home/Public/uploads/'; // 设置附件上传根目录
        $upload->savePath = $psnid . '/'; // 设置附件上传（子）目录ch
        // 上传文件
        $info = $upload->upload();
        $i=0;
        if(!$info) {// 上传错误提示错误信息
            $a[$i]['flag']="no";
            $a[$i]['err']=$upload->getError();
            $this->ajaxReturn($a,'JSON');
        }else{// 上传成功 获取上传文件信息
            foreach($info as $file){
                $a[$i]['flag']=$file['savepath'].$file['savename'];
                $i++;
            }
        }
        $this->ajaxReturn($a,'JSON');

    }

    public function chkworker()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];

        $user = M('worker');
        $worker = $user->where(array('psnid'=>$psnid))->order('id asc')->select();
        //var_dump($user->getLastSql());
        $user = M('workertype');
        $workertype = $user->order('id asc')->select();
        $workersize = count($worker);
        //dump($workersize);
        for($i=0;$i< $workersize;$i++){
        	$index = $worker[$i]['type']-1;
        	$worker[$i]['typename']=$workertype[$index]['name'];
        }
        //dump($worker);
        //exit;
				$this->assign('name', $name);
				$this->assign('worker', $worker);
				$this->assign('workertype', $workertype);
        $this->display();

    }

    public function chkwaremore()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
    		
    		$shedid=$_GET['shedid'];
        $areas = array('A','B','C','D','E','F','G','H','I','J');
        
        $user = M('animal');
        $wares = $user->where(array('psnid'=>$psnid,'shedid'=>$shedid,'state'=>0))->order('id asc')->select();
        //var_dump($user->getLastSql());
				for($i=0;$i<count($wares);$i++){
					$index=$wares[$i]['area']-1;
					$wares[$i]['areaname']=$areas[$index];
				}

				$this->assign('name', $name);
				$this->assign('shedid', $shedid);
        $this->assign('wares', $wares);
        $this->display();
    }

    public function chkwareview()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
        $id=$_GET['id'];
        
        if(empty($id)){
        	$sn=$_GET['sn'];
	        $user = M('animal');
	        $ani = $user->where(array('sn'=>$sn,'psnid'=>$psnid))->find();
        }else{
	        $user = M('animal');
	        $ani = $user->where(array('id'=>$id))->find();
        }

        $shedid=$ani['shedid'];
        if($ani['devid']==0){
        	$ani['devid']="";
        }
        if($ani['fold']==0){
        	$ani['fold']="";
        }
				$this->assign('ani', $ani);

        $type = M('anltype')->where(array('type'=>$mj_tsntype))->order('id asc')->select();
        $typesize=count($type);
				for($i=0;$i< $typesize;$i++){					
					if($type[$i]['id']==$ani['type']){
						$this->assign('typeindex', $i);
					}
				}
				
				$kind1 = M('anlkind')->where(array('subtype'=>1,'type'=>$mj_tsntype))->select();
        $kind1size=count($kind1);
        $this->assign('kind1index', 0);
				for($i=0;$i< $kind1size;$i++){					
					if($kind1[$i]['id']==$ani['kind']){
						$this->assign('kind1index', $i);
					}
				}
				
				$kind2 = M('anlkind')->where(array('subtype'=>2,'type'=>$mj_tsntype))->select();
        $kind2size=count($kind2);
        $this->assign('kind2index', 0);
				for($i=0;$i< $kind2size;$i++){					
					if($kind2[$i]['id']==$ani['kind']){
						$this->assign('kind2index', $i);
					}
				}

				$entertype = M('entertype')->select();
        $entertypesize=count($entertype);
				for($i=0;$i< $entertypesize;$i++){					
					if($entertype[$i]['id']==$ani['entertype']){
						$this->assign('entertypeindex', $i);
					}
				}
				
				
				
				$field = M('field')->where(array('psnid'=>$psnid))->order('shedid asc')->select();
				$fieldsize=count($field);
				for($i=0;$i< $fieldsize;$i++){
					$workerid1=$field[$i]['workerid1'];
					$workerid2=$field[$i]['workerid2'];
					$workerid3=$field[$i]['workerid3'];
				
					$worker1=M('worker')->where(array('id'=>$workerid1,'psnid'=>$psnid))->find();
					$worker2=M('worker')->where(array('id'=>$workerid2,'psnid'=>$psnid))->find();
					$worker3=M('worker')->where(array('id'=>$workerid3,'psnid'=>$psnid))->find();
					
					$field[$i]['workername1']=$worker1['name'];
					$field[$i]['workername2']=$worker2['name'];
					$field[$i]['workername3']=$worker3['name'];
					
					if($field[$i]['shedid']==$ani['shedid']){
						$this->assign('shedindex', $i);
					}
				}
				
				$this->assign('field', $field);
				
        if(empty($type)){

        }else{
            $this->assign('kind1', $kind1);
            $this->assign('kind2', $kind2);
            $this->assign('type', $type);
            $this->assign('entertype', $entertype);
        }

				$this->assign('name', $name);
				$this->assign('shedid', $shedid);
        $this->assign('wares', $wares);
        $this->display();
    }
    
    public function delanibyid()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
        $id=$_GET['id'];
        
        if(empty($id)){
        	//
        }else{
	        $user = M('animal');
	        $ani = $user->where(array('id'=>$id))->find();
        }
        $shedid=$ani['shedid'];
        $ret=$user->where(array('id'=>$id))->delete();
        $this->redirect('manager/chkwaremore', array('shedid'=>$shedid), 0, '');
        
    }
    
    public function chkwareedit()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
        
        $sn = $_POST['sn'];
        $devid = $_POST['devid'];

        $sex = $_POST['sex'];
        $type = $_POST['type'];
        
        if($type==1){
        	$kind = $_POST['kind1'];
        }else{
        	$kind = $_POST['kind2'];
        }

        $shedid = $_POST['shedid'];
        $area = $_POST['area'];
        $fold = $_POST['fold'];
        
        $bdate = $_POST['bdate'];
        $bweight = $_POST['bweight'];
        $childnum = $_POST['childnum'];        
        
        $fasn = $_POST['fasn'];
        $mosn = $_POST['mosn'];
        $entertype = $_POST['entertype'];
        $oweight = $_POST['oweight'];
        
        $insource = $_POST['insource'];
        $indate = $_POST['indate'];
        
        $pic_url =  $_POST['pic_url'];
				$info = $_POST['info'];
        $finfo = str_replace("\r\n", "<br>", $info);
        
        $ani = D('animal')->where(array('psnid'=>$psnid,'sn'=>$sn))->find();
        if (!empty($ret)) {
            echo "<script language=\"JavaScript\">\r\n";
            echo " alert(\"编号重复，请修改编号!\");\r\n";
            echo " history.back();\r\n";
            echo "</script>";
            exit;
        }
        //$anisave=array();
				$ani_id=$ani['id'];
				if(!empty($sn)&&$sn!=$ani['sn']){
					$anisave['sn']=$sn;
				}
				if(!empty($devid)&&$devid!=$ani['devid']){
					$anisave['devid']=$devid;
				}
				if(!empty($sex)&&$sex!=$ani['sex']){
					$anisave['sex']=$sex;
				}
				if(!empty($kind)&&$kind!=$ani['kind']){
					$anisave['kind']=$kind;
				}
				if(!empty($type)&&$type!=$ani['type']){
					$anisave['type']=$type;
				}
				
				if(!empty($shedid)&&$shedid!=$ani['shedid']){
					$anisave['shedid']=$shedid;
				}
				if(!empty($area)&&$area!=$ani['area']){
					$anisave['area']=$area;
				}
				if(!empty($fold)&&$fold!=$ani['fold']){
					$anisave['fold']=$fold;
				}
				
				if(!empty($bdate)&&$bdate!=$ani['birthday']){
					$anisave['birthday']=$bdate;
				}
				if(!empty($bweight)&&$bweight!=$ani['birthweight']){
					$anisave['birthweight']=$bweight;
				}
				if(!empty($childnum)&&$childnum!=$ani['childnum']){
					$anisave['childnum']=$childnum;
				}

				if(!empty($fasn)&&$fasn!=$ani['fathersn']){
					$anisave['fathersn']=$fasn;
				}
				if(!empty($mosn)&&$mosn!=$ani['mothersn']){
					$anisave['mothersn']=$mosn;
				}
				if(!empty($entertype)&&$entertype!=$ani['entertype']){
					$anisave['entertype']=$entertype;
				}
				
				if(!empty($insource)&&$insource!=$ani['entersource']){
					$anisave['entersource']=$insource;
				}
				if(!empty($indate)&&$indate!=$ani['enterdate']){
					$anisave['enterdate']=$indate;
				}
				if(!empty($oweight)&&$oweight!=$ani['leaveweight']){
					$anisave['leaveweight']=$oweight;
				}

				if(!empty($pic_url)&&$pic_url!=$ani['photo']){
					$anisave['photo']=$pic_url;
				}
				if(!empty($finfo)&&$finfo!=$ani['info']){
					$anisave['info']=$finfo;
				}

				if(!empty($anisave)){
        	$ani = D('animal')->where(array('id' => $ani_id))->save($anisave);
        	$this->redirect('manager/chkwareview', array('id'=>$ani_id), 0, '');
      	}
				
				
    }

    public function chkworkeredit()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
        $id=$_GET['id'];

				$workername=$_POST['name'];
				$phone=$_POST['phone'];
				$type=$_POST['workertype'];

        $user = M('worker');
        $worker = $user->where(array('id'=>$id))->order('id asc')->find();
        //var_dump($user->getLastSql());
        
        if(empty($workername)){

					$workertype = M('workertype')->select();
					$this->assign('name', $name);
					$this->assign('worker', $worker);
					$this->assign('workertype', $workertype);
	        $this->display();
	        exit;
        }
        
        if($workername!=$worker['name']){
        	$workersave['name']=$workername;
        }
        if($phone!=$worker['phone']){
        	$workersave['phone']=$phone;
        }
        if($type!=$worker['type']){
        	$workersave['type']=$type;
        }
        
        if(!empty($workersave)){
        	$ret = D('worker')->where(array('id' => $id))->save($workersave);
        }
        $this->redirect('manager/chkworker', NULL, 0, '');
    }
    
    public function delworker()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
        $id=$_GET['id'];


        $user = M('worker');
        $worker = $user->where(array('id'=>$id))->delete();

        $this->redirect('manager/chkworker', NULL, 0, '');
    }
    
    public function chkshed()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];

				$type = M('purptype')->where(array('anitype'=>$mj_tsntype))->select();
				$field = M('field')->where(array('psnid'=>$psnid))->order('shedid asc')->select();
				$fieldsize=count($field);
				for($i=0;$i< $fieldsize;$i++){
					$workerid1=$field[$i]['workerid1'];
					$workerid2=$field[$i]['workerid2'];
					$workerid3=$field[$i]['workerid3'];
				
					$worker1=M('worker')->where(array('id'=>$workerid1,'psnid'=>$psnid))->find();
					$worker2=M('worker')->where(array('id'=>$workerid2,'psnid'=>$psnid))->find();
					$worker3=M('worker')->where(array('id'=>$workerid3,'psnid'=>$psnid))->find();
					
					$field[$i]['workername1']=$worker1['name'];
					$field[$i]['workername2']=$worker2['name'];
					$field[$i]['workername3']=$worker3['name'];
					$shedid = $field[$i]['shedid'];
					$anicount = M('animal')->where(array('psnid'=>$psnid,'shedid'=>$shedid,'state'=>0))->count();
					$field[$i]['count']=$anicount;
					$typeid=$field[$i]['type'];
					$field[$i]['typename']=$type[$typeid]['name'];
					//dump($field);
				}
				$this->assign('name', $name);
        $this->assign('field', $field);
        $this->display();

    }
    
    public function chkshededit()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
        $id=$_GET['id'];

				$shedid=$_POST['shed'];
				$areas=$_POST['area'];
				$folds=$_POST['fold'];
				$workerid1=$_POST['worker1'];
				$workerid2=$_POST['worker2'];
				$typeid=$_POST['type'];

        $user = M('field');
        $field = $user->where(array('id'=>$id))->find();
        //var_dump($user->getLastSql());
        $type = M('purptype')->where(array('anitype'=>$mj_tsntype))->select();
        if(empty($shedid)){

	        $workers1 = M('worker')->where(array('psnid'=>$psnid,'type'=>1))->order('id asc')->select();
					$workers2 = M('worker')->where(array('psnid'=>$psnid,'type'=>2))->order('id asc')->select();
					for($i=0;$i< count($workers1);$i++){
						if($field['workerid1']==$workers1[$i]['id']){
							$workerindex1=$i;
							break;
						}
					}
					for($i=0;$i< count($workers2);$i++){
						if($field['workerid2']==$workers2[$i]['id']){
							$workerindex2=$i;
							break;
						}
					}
					$this->assign('type', $type);
					$this->assign('workerindex1', $workerindex1);
					$this->assign('workerindex2', $workerindex2);
	        $this->assign('workers1', $workers1);
	        $this->assign('workers2', $workers2);
					$this->assign('field', $field);
					$this->assign('name', $name);
	        $this->display();
	        exit;
        }
        
        if($shedid!=$field['shedid']){
        	$fieldsave['shedid']=$shedid;
        }
        if($areas!=$field['areas']){
        	$fieldsave['areas']=$areas;
        }
        if($folds!=$field['folds']){
        	$fieldsave['folds']=$folds;
        }

        if($workerid1!=$field['workerid1']){
        	$fieldsave['workerid1']=$workerid1;
        }
        if($workerid2!=$field['workerid2']){
        	$fieldsave['workerid2']=$workerid2;
        }
        if($typeid!=$field['type']){
        	$fieldsave['type']=$typeid;
        }
        if(!empty($fieldsave)){
        	$ret = D('field')->where(array('id' => $id))->save($fieldsave);
        }
        $this->redirect('manager/chkshed', NULL, 0, '');
    }
    
    public function delshed()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
        $id=$_GET['id'];

        $user = M('field');
        $field = $user->where(array('id'=>$id))->find();
        $shedid=$field['shedid'];
        
        $anicount = M('animal')->where(array('psnid'=>$psnid,'shedid'=>$shedid,'state'=>0))->count();
        
        if($anicount==0){
        	$worker = $user->where(array('id'=>$id))->delete();
        	$this->redirect('manager/chkshed', NULL, 0, '');
        }else{
        	Alert("该舍内存在动物,无法删除.","back",NULL);
        }
    }
    
    public function searchold()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
        //$id=$_POST['search'];
        $sn=$_GET['sn'];
        $this->assign('sn', $sn);
				$this->assign('name', $name);
				if(empty($sn)&&empty($id)){
					$this->display();
					exit;
				}
				
				if(!empty($id)){
					$where['sn'] = array('like','%'.$id.'%');
				}
				if(!empty($sn)){
					$where['sn'] = array('like','%'.$sn.'%');
				}
				if(!empty($where)){
	        $user = M('animal');
	        $ani = $user->where($where)->select();
      	}
        $this->assign('ani', $ani);
        $this->display();
    }
    
    public function exitfieldview1()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
        
        $id=$_GET['id'];
        $user = M('animal');
        $ani = $user->where(array('id'=>$id))->order('id asc')->find();
        //var_dump($user->getLastSql());
        
        $sn=$_POST['sn'];
        $date=$_POST['date'];
        $type=$_POST['type'];
        $rcause=$_POST['rcause'];
        $direction=$_POST['direction'];
        $workerid=$_POST['workerid'];
        $weight=$_POST['weight'];
        $info=$_POST['info'];
        
        if(empty($sn)){
		        $type = M('exittype')->order('id asc')->select();
		        $workers1 = M('worker')->where(array('psnid'=>$psnid,'type'=>3))->order('id asc')->select();
		    		
						if(empty($workers1)){
		            Alert("请先添加牧场管理员!",NULL,"/manager/addworker");
		            exit;
						}
		    		
		    		$this->assign('name', $name);
		    		$this->assign('worker', $workers1);
		        $this->assign('ani', $ani);
		        $this->assign('type', $type);
		        $this->display();
		        exit;
        }
        
	      $exitsave['sn']=$sn;
	      $exitsave['shedid']=$ani['shedid'];
	      $exitsave['psnid']=$psnid;
       	$exitsave['date']=$date;
       	$exitsave['type']=$type;
       	$exitsave['rcause']=$rcause;
       	$exitsave['direction']=$direction;
       	$exitsave['weight']=$weight;
        $exitsave['workerid']=$workerid;
        if(!empty($info)){
        	$exitsave['info']=$info;
        }
        $ret = M('exitmanager')->where(array('sn'=>$sn,'psnid'=>$psnid))->find();
        if(empty($ret)){
        	$type = M('exitmanager')->add($exitsave);
        	$anisave = M('animal')->where(array('id'=>$id))->save(array('state'=>1));
        }
        $this->redirect('manager/chkwaremore', array('shedid'=>$ani['shedid']), 0, '');
    }
    
    public function chkexitview1()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
    		$ani = M('exitmanager')->where(array('psnid'=>$psnid))->order('id asc')->select();
    		
    		$anicount=count($ani);
    		$type = M('exittype')->order('id asc')->select();
    		
    		for($i=0;$i< $anicount;$i++){
    			$workid=$ani[$i]['workerid'];
    			$typeid=$ani[$i]['type']-1;
    			$work=M('worker')->where(array('id'=>$workid))->find();
    			$ani[$i]['workername']=$work['name'];
    			$ani[$i]['typename']=$type[$typeid]['name'];
    		}
    		
    		$this->assign('name', $name);
        $this->assign('ani', $ani);
        $this->display();
    }
    
    public function repairexitview1()
    {
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
        
        $sn=$_GET['sn'];
        
    		$ret = M('exitmanager')->where(array('psnid'=>$psnid,'sn'=>$sn))->delete();
      	$anisave = M('animal')->where(array('sn'=>$sn,'psnid'=>$psnid))->save(array('state'=>0));
    		
    		$this->redirect('manager/chkexitview1', NULL, 0, '');
    }
    
    public function todayValue(){
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
    		
        $devid = $_GET["devid"];
        $now = time();
        $postArr = array();
        $postArr['devid'] = $devid;
        $postArr['psn'] = $psnid;
        
				$now = time();
				$time =date('Y-m-d',$now);
				
				$start_time = strtotime($time)-86400;
				$end_time = strtotime($time)+86400;
        //var_dump($start_time);
        //var_dump($psnid);
        
        $dateArr = array();
        $temp1Arr = array();
        $temp2Arr = array();
        
      	$psn = M('psn')->where(array('id'=>$psnid))->find();
				if(empty($psn)){
					echo "PSN NULL.";
					exit;
				}
				$btemp=$psn['base_temp'];
				$temp_value=$psn['check_value'];

				//dump($btemp);
				//dump($temp_value);
        
				$dev=M('device')->where(array('devid'=>$devid,'psn'=>$psnid))->find();
				if($dev==NULL){
					//echo "<script type='text/javascript'>alert('设备不存在.');distory.back();</script>";
					$this->display();
					exit;
				}
        $avg=(float)$dev['avg_temp'];
        $postArr['time']=array('between',array($start,$end));
        if($selectSql=M('access')->where('devid ='.$devid.' and psn= '.$psnid.' and time >= '.$start_time.' and time <= '.$end_time)
													        ->group('time')
													        ->order('id desc')
													        ->select())
        {
           $todayData = array_slice($selectSql,0,24);
           $dataCount= count($todayData);
         
           for($j=0;$j< $dataCount;$j++){
							$time=($todayData[$j][time]);
							$date=date('m-d H:i',$time);
							$temp1=$todayData[$j]['temp1'];
							$temp2=$todayData[$j]['temp2'];
							$temp3=$todayData[$j]['env_temp'];
							$a=array($temp1,$temp2);
							$t=max($a);
							$vt=(float)$t;
							if($vt< 20){
								$ntemp=$vt;
							}else{
								$ntemp= round($btemp+($vt-$avg)*$temp_value,2);
							}
							//$ntemp= round($btemp+($vt-$avg)*$temp_value,2);
							$selectSql[$j]['ntemp']=$ntemp;
							//var_dump($date);
							//var_dump($vt);
							//var_dump($avg);
							array_push($dateArr,$date);
							array_push($temp1Arr,$ntemp);
							array_push($temp2Arr,$todayData[$j]['env_temp']);
           }
           
				}
    	$this->assign('name', $name);
      $this->assign('temp1Arr',json_encode(array_reverse($temp1Arr)));
      $this->assign('temp2Arr',json_encode(array_reverse($temp2Arr)));
      $this->assign('dateArr',json_encode(array_reverse($dateArr)));

      $this->display();

		}
		
		public function search(){
        $psnid=$_SESSION['mj_psnid'];
    		$name=$_SESSION['mj_name'];
    		$mj_tsntype=$_SESSION['mj_tsntype'];
    		
	      $areas = array('A','B','C','D','E','F','G','H','I','J');
	      
        $sn=$_POST['sn'];
        $devid=$_POST['devid'];
				
        $field = M('field')->where(array('psnid'=>$psnid))->order('shedid asc')->select();
      	$this->assign('name', $name);
      	$this->assign('field', $field);
      	
				if(empty($sn)&&empty($devid)){
	        $shedid=$_POST['shedid'];
	    		$area=$_POST['area'];
	    		$fold=$_POST['fold'];
	        
	        if(empty($shedid)||empty($area)){
	        	$this->display();
	        	exit;
	        }
	        $where['state']=0;
	        $where['psnid']=$psnid;
	        $where['shedid']=$shedid;
	        $where['area']=$area;
	        
	        if($fold){
	        	$where['fold']=$fold;
	        }
	        
	        $user = M('animal');
	        $wares = $user->where($where)->order('id asc')->select();
	        //var_dump($user->getLastSql());
					for($i=0;$i<count($wares);$i++){
						$index=$wares[$i]['area']-1;
						$wares[$i]['areaname']=$areas[$index];
					}

	        $this->assign('ani', $wares);
	        $this->display();
					exit;
				}
				
        $where['state']=0;
        $where['psnid']=$psnid;
				if(!empty($sn)){
					$where['sn'] = array('like','%'.$sn.'%');
				}
				if(!empty($devid)){
					$where['devid'] = array('like','%'.$devid.'%');
				}
				if(!empty($where)){
	        $user = M('animal');
	        $ani = $user->where($where)->select();
      	}
				for($i=0;$i<count($ani);$i++){
					$index=$ani[$i]['area']-1;
					$ani[$i]['areaname']=$name[$index];
				}
        $this->assign('ani', $ani);
        $this->display();
                
    }
    
}
?>