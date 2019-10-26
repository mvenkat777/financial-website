<?php

namespace App\Certificates\Repositories;

use App\Certificates\Models\CertificateModel;
use Illuminate\Database\Capsule\Manager as Capsule;

class CertificatesRepository implements ICertificateContract
{
    /**
     * [store persists certificate data]
     * @param  CertificateModel $modelObj [model object set and sent]
     * @return [integer]                  [returns one or zero]
     */
    public function store(CertificateModel $modelObj)
    {
        //echo "<pre>";print_r($modelObj);exit();
        $insertData =
            ['isin' => $modelObj->getIsin(),
            'trading_market' => $modelObj->getTradingMarket(),
            'currency' => $modelObj->getCurrency(),
            'issuer' => $modelObj->getIssuer(),
            'issuing_price' => $modelObj->getIssuingPrice(),
            'current_price' => $modelObj->getCurrentPrice(),
            'version' => $modelObj->getVersion(),
            'updated_at' => $modelObj->getUpdatedAt()
            ];
        //echo "<pre>";print_r($insertData);exit();
        return Capsule::table('certificates')->insert($insertData);       	
    }

    /**
     * [update certificate data is modified and price history is logged]
     * @param  [object] $modelObj [set in controller and sent]
     * @param  [integer] $id       [pointer to update the record]
     * @return [integer]           [returns one or zero]
     */
    public function update($modelObj, $id)
    {        
        if($modelObj->getType() == "BONUS"){
            Capsule::table('certificates_bonus')->updateOrInsert(['certificates_id' => $id], 
                ['barrier_level' => $modelObj->getBarrierLevel()]);    
        }elseif($modelObj->getType() == "GUARANTEE"){
            Capsule::table('certificates_guarantee')->updateOrInsert(['certificates_id' => $id],
                ['participation_rate' => $modelObj->getParticipationRate()]);    
        }

        $certificate = $this->fetchCertificateById($id);
        if($certificate->issuing_price != $modelObj->getIssuingPrice() && 
            $certificate->current_price != $modelObj->getCurrentPrice()){
            $historyData =['certificates_id' => $id, 
            'issuing_price' => $certificate->issuing_price,
            'current_price' => $certificate->current_price,
            'version' => $certificate->version,
            'changed_date_time' => date('Y-m-d H:i:s')
            ];
            Capsule::table('certificates_prices_history')->insert($historyData);
        }

        $updateData =
            ['isin' => $modelObj->getIsin(),
            'trading_market' => $modelObj->getTradingMarket(),
            'currency' => $modelObj->getCurrency(),
            'issuer' => $modelObj->getIssuer(),
            'issuing_price' => $modelObj->getIssuingPrice(),
            'current_price' => $modelObj->getCurrentPrice(),
            'version' => $modelObj->getVersion(),
            'updated_at' => $modelObj->getUpdatedAt()
            ];
            
        return Capsule::table('certificates')->where('id', $id)->update($updateData);
        
    }

    /**
     * [fetchAllCertificates Returns all certificates]
     * @return [collection] [Returns collection of data]
     */
    public function fetchAllCertificates(){
        //echo "COMING HERE<br>";
        //$certificates = Capsule::table('certificates')->get()->toArray();
        //echo "REPO<pre>";print_r($certificates);exit();
        return Capsule::table('certificates')->get();
    }

    /**
     * [fetchCertificateById Get certificate for respective id]
     * @param  [integer] $certificateId [Id at which certificate needs to be fetched]
     * @return [array]                [returns array]
     */
    public function fetchCertificateById($certificateId){
        return Capsule::table('certificates')->find($certificateId);
    }

    /**
     * [fetchCertificateWithBonusGuarantee Get certificate data with its all types and special parameters]
     * @param  [integer] $certificateId [Id at which data needs to be fetched]
     * @return [array]                [fetches array]
     */
    public function fetchCertificateWithBonusGuarantee($certificateId){
        return Capsule::table('certificates')
                ->leftJoin('certificates_bonus', 'certificates.id', '=', 'certificates_bonus.certificates_id')
                ->leftJoin('certificates_guarantee', 'certificates.id', '=', 'certificates_guarantee.certificates_id')
                ->select('certificates.*', 'certificates_bonus.barrier_level', 'certificates_guarantee.participation_rate')
                ->where('certificates.id', $certificateId)
                ->first();
    }    

}