<?php

class MainTemplate extends TTemplateControl {
    public function onLoad ($param) {
		parent::onLoad($param);	
        if (!$this->Page->IsPostBack&&!$this->Page->IsCallback) {
            $this->loggerJS->Visible=true;
		}  
	}
    public function logoutUser ($sender,$param) {
        if (!$this->User->isGuest) {
            $this->Application->getModule ('auth')->logout();
            $this->Page->Pengguna->insertNewActivity('logout',"berhasil keluar dari sistem simonev");
            $this->Page->redirect('Home');
		}
    }
}
?>