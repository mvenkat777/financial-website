<?php 

namespace App\Certificates\Models; 

class GuaranteeCertificateModel extends CertificateModel{

	protected $participationRate;

	public function getParticipationRate(){
		return $this->participationRate;
	}

	public function setParticipationRate($participationRate){
		$this->participationRate = $participationRate;
	}
	
}

?>