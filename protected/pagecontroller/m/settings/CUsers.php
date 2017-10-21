<?php
prado::using ('Application.MainPageM');
class CUsers extends MainPageM {
	public function onLoad ($param) {		
		parent::onLoad ($param);  
        $this->showUsers=true;
        $this->createObj('DMaster');
		if (!$this->IsPostBack&&!$this->IsCallBack) {	
            if (!isset($_SESSION['currentPageUsers'])||$_SESSION['currentPageUsers']['page_name']!='m.settings.Users') {
                $_SESSION['currentPageUsers']=array('page_name'=>'m.settings.Users','page_num'=>0,'roles'=>'m','search'=>false);												
			}     
            $_SESSION['currentPageUsers']['search']=false;
            $this->cmbRoles->Text=$_SESSION['currentPageUsers']['roles'];
            $this->labelfiltered->Text='[selected]';
			$this->populateData ();			
		}
	}
    public function renderCallback ($sender,$param) {
		$this->RepeaterS->render($param->NewWriter);	
	}	
	public function Page_Changed ($sender,$param) {
		$_SESSION['currentPageUsers']['page_num']=$param->NewPageIndex;
		$this->populateData($_SESSION['currentPageUsers']['search']);
	} 
    public function filterRoles ($sender,$param) {
        $_SESSION['currentPageUsers']['search']=false;
		$_SESSION['currentPageUsers']['roles']=$this->cmbRoles->Text;
		$this->populateData();
	}
    public function searchRecord ($sender,$param) {
		$_SESSION['currentPageUsers']['search']=true;
        $this->populateData($_SESSION['currentPageUsers']['search']);
	}
	protected function populateData ($search=false) {
        $roles=$_SESSION['currentPageUsers']['roles'];
        $str = "SELECT userid,username,page,nama_urusan,email,active FROM user us LEFT JOIN urusan b  ON (us.idurusan=b.idurusan) WHERE page='$roles' ";        
        if ($search) {
            $txtsearch=$this->txtKriteria->Text;
            switch ($this->cmbKriteria->Text) {
                case 'username' :
                    $cluasa="AND username LIKE '%$txtsearch%'";
                    $jumlah_baris=$this->DB->getCountRowsOfTable ("user WHERE page='$roles' $cluasa",'userid');
                    $str = "$str $cluasa";
                break;
                case 'email' :
                    $cluasa="AND email LIKE '%$txtsearch%'";
                    $jumlah_baris=$this->DB->getCountRowsOfTable ("user WHERE page='$roles' $cluasa",'userid');
                    $str = "$str $cluasa";
                break;
            }
        }else {
            $jumlah_baris=$this->DB->getCountRowsOfTable ("user WHERE page='$roles'",'userid');		
        }		
        $this->RepeaterS->CurrentPageIndex=$_SESSION['currentPageUsers']['page_num'];
		$this->RepeaterS->VirtualItemCount=$jumlah_baris;
		$currentPage=$this->RepeaterS->CurrentPageIndex;
		$offset=$currentPage*$this->RepeaterS->PageSize;		
		$itemcount=$this->RepeaterS->VirtualItemCount;
		$limit=$this->RepeaterS->PageSize;
		if (($offset+$limit)>$itemcount) {
			$limit=$itemcount-$offset;
		}
		if ($limit < 0) {$offset=0;$limit=10;$_SESSION['currentPageUsers']['page_num']=0;}
        $str = "$str LIMIT $offset,$limit";        
		$this->DB->setFieldTable(array('userid','username','page','nama_urusan','email','active'));
		$r=$this->DB->getRecord($str);        
		$this->RepeaterS->DataSource=$r;
		$this->RepeaterS->dataBind();      		
	}
    public function addProcess ($sender,$param) {
        $this->idProcess='add';
        $this->cmbAddRoles->Text=$_SESSION['currentPageUsers']['roles'];
        $this->cmbAddUrusan->DataSource=$this->DMaster->getListUrusan ();
        $this->cmbAddUrusan->dataBind();
    }
    public function dataBound ($sender,$param) {
		$item=$param->Item;
		if ($item->ItemType === 'Item' || $item->ItemType === 'AlternatingItem') {	
            if ($item->DataItem['userid']==1){
                $item->btnDelete->Enabled=false;
            }else{
                $item->btnDelete->Attributes->OnClick="if(!confirm('Apakah Anda ingin menghapus data user ini ?')) return false";
            }
        }
    }
    public function checkUsername ($sender,$param) {
		$this->idProcess=$sender->getId()=='addUsername'?'add':'edit';
        $username=$param->Value;		
        if ($username != '') {
            try {   
                if ($this->hiddenusername->Value!=$username) {                    
                    if ($this->DB->checkRecordIsExist('username','user',$username)) {                                
                        throw new Exception ("Username ($username) sudah tidak tersedia silahkan ganti dengan yang lain.");		
                    }                               
                }                
            }catch (Exception $e) {
                $param->IsValid=false;
                $sender->ErrorMessage=$e->getMessage();
            }	
        }	
    }
    public function checkEmail ($sender,$param) {
		$this->idProcess=$sender->getId()=='addEmail'?'add':'edit';
        $email=$param->Value;		
        if ($email != '') {
            try {   
                if ($this->hiddenemail->Value!=$email) {                    
                    if ($this->DB->checkRecordIsExist('email','user',$email)) {                                
                        throw new Exception ("Email ($email) sudah tidak tersedia silahkan ganti dengan yang lain.");		
                    }                               
                }                
            }catch (Exception $e) {
                $param->IsValid=false;
                $sender->ErrorMessage=$e->getMessage();
            }	
        }	
    }
    public function saveData($sender,$param) {		
        if ($this->Page->IsValid) {		
            $username=$this->txtAddUsername->Text;            
            $alamatemail=$this->txtAddEmail->Text;            
            $page=$this->cmbAddRoles->Text;
            $data=$this->Pengguna->createHashPassword($this->txtAddPassword->Text);
            $salt=$data['salt'];
            $password=$data['password'];
            $idurusan=$page == 'k' ?$this->cmbAddUrusan->Text:'';
            $str = "INSERT INTO user SET userid=NULL,username='$username',userpassword='$password',salt='$salt',page='$page',idurusan='$idurusan',email='$alamatemail',photo_profile='resources/user/no_photos_thub.jpg',theme='limitless',active=1";
                    
            $this->DB->insertRecord($str);
            $this->redirect('settings.Users',true);
        }
	}
    public function editRecord ($sender,$param) {		
		$this->idProcess='edit';
		$id=$this->getDataKeyField($sender,$this->RepeaterS);        
		$this->hiddenuserid->Value=$id;
        $str = "SELECT username,email,page,idurusan FROM user WHERE userid='$id'";
        $this->DB->setFieldTable(array('username','email','page','idurusan'));
        $r=$this->DB->getRecord($str);    
		$result = $r[1];        				
        $this->hiddenusername->Value=$result['username'];
        $this->hiddenemail->Value=$result['email'];
		$this->txtEditUsername->Text=$result['username'];		
        $this->txtEditUsername->Enabled=$result['page']=='p'?false:true;
		$this->txtEditEmail->Text=$result['email'];		        
		$this->cmbEditRoles->Text=$result['page'];		
        $this->cmbEditRoles->Enabled=$result['page']=='p'?false:true;
        $this->cmbEditUrusan->DataSource=$this->DMaster->getListUrusan ();
        $this->cmbEditUrusan->Text=$result['idurusan'];
        $this->cmbEditUrusan->dataBind();
        if ($id == 1) {
            $this->txtEditUsername->Enabled=false;
            $this->cmbEditRoles->Enabled=false;
            $this->cmbEditUrusan->Enabled=false;
        }
        
	}
    public function updateData($sender,$param) {		
        if ($this->Page->IsValid) {		
            $id=$this->hiddenuserid->Value;
            $username=$this->txtEditUsername->Text;            
            $alamatemail=$this->txtEditEmail->Text;            
            $page=$this->cmbEditRoles->Text;
            $idurusan=$page == 'u' ?$this->cmbEditUrusan->Text:'';
            if ($this->txtEditPassword->Text == '') {
                $str = "UPDATE user SET username='$username',page='$page',idurusan='$idurusan',email='$alamatemail',active=1 WHERE userid=$id";
            }else {
                $data=$this->Pengguna->createHashPassword($this->txtEditPassword->Text);
                $salt=$data['salt'];
                $password=$data['password'];
                $str = "UPDATE user SET username='$username',userpassword='$password',salt='$salt',page='$page',idurusan='$idurusan',email='$alamatemail',active=1 WHERE userid=$id";
            }
            $this->DB->updateRecord($str);           
            $this->redirect('settings.Users',true);
        }
	}
    public function deleteRecord ($sender,$param) {
		$id=$this->getDataKeyField($sender,$this->RepeaterS);
		$this->DB->deleteRecord("user WHERE userid=$id");
        $this->redirect('settings.Users',true);
	}
}

?>