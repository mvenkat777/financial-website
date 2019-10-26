<?php

namespace App\Certificates\Controllers;

use App\Certificates\Repositories\CertificatesRepository;
use App\Certificates\Models\CertificateModel;
use App\Certificates\Models\BonusCertificateModel;
use App\Certificates\Models\GuaranteeCertificateModel;
use Spatie\ArrayToXml\ArrayToXml;

class CertificatesController
{
	protected $certificatesRepository;	
	
    /**
     * [__construct controller requires repository]
     * @param CertificatesRepository $certificatesRepository [injected repository]
     */
	public function __construct(CertificatesRepository $certificatesRepository){
		$this->certificatesRepository = $certificatesRepository;
	}

    /**
     * [create collect post data and setup to store]
     * @param  [array] $postData [collected post variables]
     * @return [int]           [returns one or zero for success or failure]
     */
	public function create($postData)
    {
    	$modelObj = new CertificateModel();
    	$modelObj->setIsin($postData['isin']);
    	$modelObj->setTradingMarket($postData['market']);
    	$modelObj->setCurrency($postData['currency']);
    	$modelObj->setIssuer($postData['issuer']);
    	$modelObj->setIssuingPrice($postData['issuing_price']);
    	$modelObj->setCurrentPrice($postData['current_price']);
    	$modelObj->setVersion(0);
    	$modelObj->setUpdatedAt(date('Y-m-d H:i:s'));
    	return $this->certificatesRepository->store($modelObj);
    	//echo "<pre>COMING";print_r($_POST);exit();
    }

    /**
     * [update setup data to update certificate]
     * @param  [type] $postData [collected post variables]
     * @return [type]           [description]
     */
    public function update($postData)
    {
        //die(print_r($postData));
        if($postData['type'] == "BONUS" && !empty($postData['bonus_barrier_level'])){
            $modelObj = new BonusCertificateModel();
            $modelObj = $this->setValuesCertificateModel($modelObj, $postData);    
            $modelObj->setBarrierLevel($postData['bonus_barrier_level']);
        }elseif($postData['type'] == "GUARANTEE" && !empty($postData['guarantee_participation_rate'])){
            $modelObj = new GuaranteeCertificateModel();
            $modelObj = $this->setValuesCertificateModel($modelObj, $postData);    
            $modelObj->setParticipationRate($postData['guarantee_participation_rate']);
        }else{
            $modelObj = new CertificateModel();
            $modelObj = $this->setValuesCertificateModel($modelObj, $postData);    
        }
        $modelObj->setType($postData['type']);               
        return $this->certificatesRepository->update($modelObj, $postData['certificate_id']);
        //echo "<pre>COMING";print_r($_POST);exit();
    }

    /**
     * [getAllCertificates Get all certificate data]
     * @return [collection] [description]
     */
    public function getAllCertificates()
    {
        return $this->certificatesRepository->fetchAllCertificates();
    }

    /**
     * [getCertificateById get data based on certificate id]
     * @param  [integer] $certificateId [Id passed]
     * @return [Object]                [returns one Stdclass object]
     */
    public function getCertificateById($certificateId)
    {
        return $this->certificatesRepository->fetchCertificateById($certificateId);
    }

    /**
     * [getCertificateWithSpecialAttributes description]
     * @param  [type] $certificateId [description]
     * @return [type]                [description]
     */
    public function getCertificateWithSpecialAttributes($certificateId){
        return $this->certificatesRepository->fetchCertificateWithBonusGuarantee($certificateId);
    }

    /**
     * [setValuesCertificateModel set values of model]
     * @param [type] $modelObj [model object]
     * @param [type] $postData [incoming post variables]
     */
    public function setValuesCertificateModel($modelObj, $postData)
    {
        $modelObj->setIsin($postData['isin']);
        $modelObj->setTradingMarket($postData['market']);
        $modelObj->setCurrency($postData['currency']);
        $modelObj->setIssuer($postData['issuer']);
        $modelObj->setIssuingPrice($postData['issuing_price']);
        $modelObj->setCurrentPrice($postData['current_price']);
        $modelObj->setVersion($postData['version']+1);
        $modelObj->setUpdatedAt(date('Y-m-d H:i:s'));

        return $modelObj;
    }

    /**
     * [toXml Convert array to Xml]
     * @param  [array] $data [passed array]
     * @return [string]       [return xml string]
     */
    public function toXml($data)
    {
        $certificateArray = json_decode(json_encode($data), true);
        $certificateArray = array_filter($certificateArray, function($value) { return ($value != ''); });
        $result = ArrayToXml::convert($certificateArray);
        return $result;
    }
}	