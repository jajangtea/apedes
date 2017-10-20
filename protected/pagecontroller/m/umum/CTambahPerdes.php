<?php
prado::using ('Application.MainPageM');
class CTambahPerdes extends MainPageM { 
    public function onLoad($param) {		
        parent::onLoad($param);		            
        $this->showDashboard=true;
        if (!$this->IsPostBack&&!$this->IsCallBack) {              
            
        }                
    }  
   
}
?>