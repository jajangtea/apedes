<?php
prado::using ('Application.MainPageM');
class CTambahPendudukSementara extends MainPageM { 
    public function onLoad($param) {		
        parent::onLoad($param);		            
        $this->showMenuADMPenduduk=true;
        $this->showBukuIndukPenduduk=true;        
        if (!$this->IsPostBack&&!$this->IsCallBack) {              
            
        }                
    }  
   
}
?>