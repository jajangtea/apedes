<?php
class Autorisasi extends TModule implements IUserManager {	
    /**
	* Obj DB
	*/
	private $db;
    public function __construct () {
		$this->db = $this->Application->getModule('db')->getLink();						
	}
	/**
	* @return string name for a guest user	
	*/		
	public function getGuestName () {
		return 'Guest';
	}
	/**
	* returns a user instance given the username
	* @param string username, null if it is a guest
	* @return TUser the user instance, null if the specified username is not the user database
	*
	*/
	public function getUser ($username=null) {				
		if ($username === null) {
			$user = new TUser ($this);
			$user->setIsGuest(true);
			return $user;
		}else {			
			$user = new TUser ($this);	
            $str = "SELECT userid,username,page,theme,photo_profile,active FROM user  WHERE username='$username'";
            $this->db->setFieldTable (array('userid','username','page','idurusan','kode_urusan','nama_urusan','theme','photo_profile','active'));							
            $r = $this->db->getRecord($str);
            switch ($r[1]['page']) {
                case 'm' :
                    $datauser['userid']=$r[1]['userid'];
                    $datauser['username']=$r[1]['username'];
                    $datauser['page']=$r[1]['page'];
                    $datauser['theme']=$r[1]['theme'];
                    $datauser['photo_profile']=$r[1]['photo_profile'];
                    $datauser['active']=$r[1]['active'];
                break;                
            }
            $user->setIsGuest (false);
			$user->setRoles($datauser['page']);						
			$user->setName ($datauser);									
			return $user;		
		}
	}
	
	/**
	* validate if the username and password is correct
	* @param string username
	* @param string password
	* @return boolean true if validation is sucessful, false otherwise
	*
	*/
	public function validateUser ($username,$password) {		
		$str = "SELECT userpassword,page,salt FROM `user` WHERE username='$username' AND active=1";
        $this->db->setFieldTable (array('userpassword','salt','page'));							
        $r = $this->db->getRecord($str); 
		$passwd=hash('sha256', $r[1]['salt'] . hash('sha256', $password));		        
		if (($r[1]['userpassword']==$passwd)) {
			return true;
		
        }else{
			return false;
        }
	}	
	/**
	* Dua method dibawah ini tidak dipakai. Tetapi harus tetap Ada.
	*
	*/			
	public function saveUserToCookie($cookie) { }
	
	public function getUserFromCookie($cookie) { }
	
	
}
?>