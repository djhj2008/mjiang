<?php
namespace Home\Controller;
use Tools\HomeController;
use Think\Controller;
class ManagerController extends HomeController
{

    public function index()
    {
        $psnid=$_SESSION['psnid'];
    		$name=$_SESSION['name'];

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
					//dump($field);
				}
				$this->assign('name', $name);
        $this->assign('field', $field);
        $this->display();
    }


    public function addshed()
    {
    	
        $psnid=$_SESSION['psnid'];
    		$name=$_SESSION['name'];
				$shed=$_POST['shed'];
				$area=$_POST['area'];
				$fold=$_POST['fold'];
				
				$worker1=$_POST['worker1'];
				$worker2=$_POST['worker2'];
				
				
				if(!empty($shed)){
						$filed=array(
										'shedid'=>$shed,
										'areas'=>$area,
										'folds'=>$fold,
										'workerid1'=>$worker1,
										'workerid2'=>$worker2,
										'psnid'=>$psnid,
						);
						$fieldfind = M('field')->where(array('psnid'=>$psnid,'shedid'=>$shed))->find();
						if(empty($fieldfind)){
							$savefield = M('field')->add($filed);
						}else{
							
						}

						$this->redirect('manager/chkshed', NULL, 0, '');
						exit;
				}
			
        $workers1 = M('worker')->where(array('psnid'=>$psnid,'type'=>1))->select();
				$workers2 = M('worker')->where(array('psnid'=>$psnid,'type'=>2))->select();
        $this->assign('workers1', $workers1);
        $this->assign('workers2', $workers2);
				$this->assign('name', $name);
				
        $this->display();
    }

    public function addworker()
    {
        $psnid=$_SESSION['psnid'];
    		$name=$_SESSION['name'];
    		
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
    		$name=$_SESSION['name'];
        $psnid=$_SESSION['psnid'];


        $type = M('anltype')->select();
				$kind = M('anlkind')->select();
				$entertype = M('entertype')->select();
				$field = M('field')->where(array('psnid'=>$psnid))->select();
				
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
					//var_dump($field);
					//exit;
					
				}
				
				$this->assign('field', $field);
				
        if(empty($type)){

        }else{
            $this->assign('kind', $kind);
            $this->assign('type', $type);
            $this->assign('entertype', $entertype);
        }
				$this->assign('name', $name);
        $this->display();
    }


    public function upload()
    {
        $id=$_GET['userid'];
    		$name=$_SESSION['name'];
        $psnid=$_SESSION['psnid'];
				
        $sn = $_POST['sn'];
        $id = $_POST['id'];

        $sex = $_POST['sex'];
        $kind = $_POST['kind'];
        $type = $_POST['type'];
        
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
					
				if($area==1){
					$ware['area']="A";
				}else{
					$ware['area']="B";
				}
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
        $id=$_GET['userid'];
        $sn = $_POST['sn'];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 31457280;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'pdf');// 设置附件上传类型
        $upload->rootPath = 'Home/Public/uploads/'; // 设置附件上传根目录
        $upload->savePath = $sn . '/'; // 设置附件上传（子）目录ch
        // 上传文件
        $info = $upload->upload();

        $i=0;
        if(!$info) {// 上传错误提示错误信息
            $a[$i]['flag']="no";
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
        $psnid=$_SESSION['psnid'];
    		$name=$_SESSION['name'];

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
    		$shedid=$_GET['shedid'];
    		$name=$_SESSION['name'];
        $psnid=$_SESSION['psnid'];
        
        $user = M('animal');
        $wares = $user->where(array('psnid'=>$psnid,'shedid'=>$shedid,'state'=>0))->order('id asc')->select();
        //var_dump($user->getLastSql());

				$this->assign('name', $name);
				$this->assign('shedid', $shedid);
        $this->assign('wares', $wares);
        $this->display();
    }

    public function chkwareview()
    {
    		$name=$_SESSION['name'];
        $psnid=$_SESSION['psnid'];
        $id=$_GET['id'];
        
        if(empty($id)){
        	$sn=$_GET['sn'];
	        $user = M('animal');
	        $ani = $user->where(array('sn'=>$sn))->order('id asc')->find();
        }else{
	        $user = M('animal');
	        $ani = $user->where(array('id'=>$id))->order('id asc')->find();
        }
        //var_dump($user->getLastSql());

        $shedid=$ani['shedid'];
        if($ani['devid']==0){
        	$ani['devid']="";
        }
        if($ani['fold']==0){
        	$ani['fold']="";
        }
				$this->assign('ani', $ani);

        $type = M('anltype')->order('id asc')->select();
        $typesize=count($type);
				for($i=0;$i< $typesize;$i++){					
					if($type[$i]['id']==$ani['type']){
						$this->assign('typeindex', $i);
					}
				}
				
				$kind = M('anlkind')->select();
        $kindsize=count($kind);
				for($i=0;$i< $kindsize;$i++){					
					if($kind[$i]['id']==$ani['kind']){
						$this->assign('kindindex', $i);
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
            $this->assign('kind', $kind);
            $this->assign('type', $type);
            $this->assign('entertype', $entertype);
        }

				$this->assign('name', $name);
				$this->assign('shedid', $shedid);
        $this->assign('wares', $wares);
        $this->display();
    }
    
    public function chkwareedit()
    {
    		$name=$_SESSION['name'];
        $psnid=$_SESSION['psnid'];
        
        $sn = $_POST['sn'];
        $devid = $_POST['devid'];

        $sex = $_POST['sex'];
        $kind = $_POST['kind'];
        $type = $_POST['type'];
        
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
				if(!empty($oweight)&&$oweight!=$ani['leaveweight	']){
					$anisave['leaveweight	']=$oweight;
				}
				
				if(!empty($pic_url)&&$pic_url!=$ani['photo']){
					$anisave['photo']=$pic_url;
				}
				if(!empty($finfo)&&$finfo!=$ani['info']){
					$anisave['info']=$finfo;
				}

				if(!empty($ani)){
        	$ani = D('animal')->where(array('id' => $ani_id))->save($anisave);
        	$this->redirect('manager/chkwareview', array('id'=>$ani_id), 0, '');
      	}
				
				
    }

    public function chkworkeredit()
    {
    		$name=$_SESSION['name'];
        $psnid=$_SESSION['psnid'];
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
    		$name=$_SESSION['name'];
        $psnid=$_SESSION['psnid'];
        $id=$_GET['id'];


        $user = M('worker');
        $worker = $user->where(array('id'=>$id))->delete();

        $this->redirect('manager/chkworker', NULL, 0, '');
    }
    
    public function chkshed()
    {
        $psnid=$_SESSION['psnid'];
    		$name=$_SESSION['name'];

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
					//dump($field);
				}
				$this->assign('name', $name);
        $this->assign('field', $field);
        $this->display();

    }
    
    public function chkshededit()
    {
    		$name=$_SESSION['name'];
        $psnid=$_SESSION['psnid'];
        $id=$_GET['id'];

				$shedid=$_POST['shed'];
				$areas=$_POST['area'];
				$folds=$_POST['fold'];
				$workerid1=$_POST['worker1'];
				$workerid2=$_POST['worker2'];

        $user = M('field');
        $field = $user->where(array('id'=>$id))->find();
        //var_dump($user->getLastSql());
        
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
  		  
        if(!empty($fieldsave)){
        	$ret = D('field')->where(array('id' => $id))->save($fieldsave);
        }
        $this->redirect('manager/chkshed', NULL, 0, '');
    }
    
    public function delshed()
    {
    		$name=$_SESSION['name'];
        $psnid=$_SESSION['psnid'];
        $id=$_GET['id'];

        $user = M('field');
        $worker = $user->where(array('id'=>$id))->delete();

        $this->redirect('manager/chkshed', NULL, 0, '');
    }
    
    public function search()
    {
    		$name=$_SESSION['name'];
        $psnid=$_SESSION['psnid'];
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
    	  $name=$_SESSION['name'];
        $psnid=$_SESSION['psnid'];
        
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
        $info=$_POST['info'];
        
        if(empty($sn)){
		        $type = M('exittype')->order('id asc')->select();
		        $workers1 = M('worker')->where(array('psnid'=>$psnid,'type'=>3))->order('id asc')->select();
		    	
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
    	  $name=$_SESSION['name'];
        $psnid=$_SESSION['psnid'];
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
    	  $name=$_SESSION['name'];
        $psnid=$_SESSION['psnid'];
        
        $sn=$_GET['sn'];
        
    		$ret = M('exitmanager')->where(array('psnid'=>$psnid,'sn'=>$sn))->delete();
      	$anisave = M('animal')->where(array('sn'=>$sn))->save(array('state'=>0));
    		
    		$this->redirect('manager/chkexitview1', NULL, 0, '');
    }
    
    public function todayValue(){
				$name=$_SESSION['name'];
        $devid = $_GET["devid"];
        $psnid=$_SESSION['psnid'];
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
}
?>