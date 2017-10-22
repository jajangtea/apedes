<?php
prado::using ('Application.MainPageM');
class CIndukPenduduk extends MainPageM { 
    public function onLoad($param) {		
        parent::onLoad($param);		            
        $this->showDashboard=true;
        if (!$this->IsPostBack&&!$this->IsCallBack) {              
            
        }                
    }  
   
}
?>