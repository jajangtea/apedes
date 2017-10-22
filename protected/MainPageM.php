<?php

class MainPageM extends MainPage {     
    /**     
     * show menu item administrasi umum  [setting]
     */
    public $showMenuADMUmum=false;   
    /**     
     * show menu setting [setting]
     */
    public $showMenuSetting=false;
    /**     
     * show page users [setting]
     */
    public $showUsers=false;
    /**     
     * show page cache[setting]
     */
    public $showCache=false;
	public function onLoad ($param) {		
		parent::onLoad($param);	
	}
}
?>