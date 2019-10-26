<?php 

namespace App\Certificates\Models; 

class CertificateModel{

	protected $isin;

	protected $tradingMarket;

	protected $currency;

	protected $issuer;

	protected $issuingPrice;

	protected $currentPrice;

	protected $version;

	protected $updatedAt;

	protected $type;	

	public function getIsin(){
		return $this->isin;
	}

	public function setIsin($isin){
		$this->isin = $isin;
	}

	public function getTradingMarket(){
		return $this->tradingMarket;
	}

	public function setTradingMarket($tradingMarket){
		$this->tradingMarket = $tradingMarket;
	}

	public function getCurrency(){
		return $this->currency;
	}

	public function setCurrency($currency){
		$this->currency = $currency;
	}

	public function getIssuer(){
		return $this->issuer;
	}

	public function setIssuer($issuer){
		$this->issuer = $issuer;
	}

	public function getIssuingPrice(){
		return $this->issuingPrice;
	}

	public function setIssuingPrice($issuingPrice){
		$this->issuingPrice = $issuingPrice;
	}

	public function getCurrentPrice(){
		return $this->currentPrice;
	}

	public function setCurrentPrice($currentPrice){
		$this->currentPrice = $currentPrice;
	}

	public function getVersion(){
		return $this->version;
	}

	public function setVersion($version){
		$this->version = $version;
	}

	public function getUpdatedAt(){
		return $this->updatedAt;
	}

	public function setUpdatedAt($updatedAt){
		$this->updatedAt = $updatedAt;
	}

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}			
}
?>