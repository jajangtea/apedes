<?php

class MainPageM extends MainPage {     
    /**     
     * show menu item administrasi umum  [administrasi umum]
     */
    public $showMenuADMUmum=false; 
    /**     
     * show menu item administrasi penduduk  [administrasi penduduk]
     */
    public $showMenuADMPenduduk=false; 
    /**     
     * show page buku induk penduduk  [administrasi penduduk]
     */
    public $showBukuIndukPenduduk=false; 
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