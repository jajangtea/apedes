<?php

class MainPageM extends MainPage {
    /**     
     * show menu item administrasi umum
     */
    public $showMenuADMUmum=false;
    /**     
     * show page cache[setting]
     */
    public $showCache=false;
	public function onLoad ($param) {		
		parent::onLoad($param);	
	}
}
?>