<?php 

namespace App\Certificates\Models; 

class BonusCertificateModel extends CertificateModel{

	protected $barrierLevel;

	public function getBarrierLevel(){
		return $this->barrierLevel;
	}

	public function setBarrierLevel($barrierLevel){
		$this->barrierLevel = $barrierLevel;
	}
	
}

?>