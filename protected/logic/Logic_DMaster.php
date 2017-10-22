<?php
/**
* digunakan untuk memproses data master
*/
prado::using ('Application.logic.Logic_Global');
class Logic_DMaster extends Logic_Global { 
    /**
     * @param type $db
     */
   	public function __construct ($db) {
		parent::__construct ($db);	        
	}   
    /**
     * digunakan untuk mendapatkan daftar urusan
     */
    public function getListUrusan () {
        if ($this->Application->Cache) {            
            $dataitem=$this->Application->Cache->get('listurusan');            
            if (!isset($dataitem['none'])) {
                $str = 'SELECT idurusan,nama_urusan FROM urusan ORDER BY nama_urusan ASC';
                $this->db->setFieldTable(array('idurusan','nama_urusan'));
                $r=$this->db->getRecord($str);
                $dataitem=array('none'=>'DAFTAR URUSAN');
                while (list($k,$v)=each($r)){
                    $dataitem[$v['idurusan']]=$v['nama_urusan']. ' ['.$v['idurusan'].']';
                }
                $this->Application->Cache->set('listurusan',$dataitem);
            }
        }else {                        
            $str = 'SELECT idurusan,nama_urusan FROM urusan ORDER BY nama_urusan ASC';
            $this->db->setFieldTable(array('idurusan','nama_urusan'));
            $r=$this->db->getRecord($str);
            $dataitem=array('none'=>'DAFTAR URUSAN');
            while (list($k,$v)=each($r)){
                $dataitem[$v['idurusan']]=$v['nama_urusan']. ' ['.$v['idurusan'].']';
            }    
        }
        return $dataitem;        
    }
}
?>