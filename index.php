<?php 

use App\Certificates\Controllers\CertificatesController;
use App\Certificates\Repositories\CertificatesRepository;

include("Bootstrap.php");
include("DatabaseSetup.php");

$action = $_GET['action'] ?? '';
$certificateObj = new CertificatesController(new CertificatesRepository());
switch ($action) {
    case "certificate-add-show":
        include("templates/add_certificates.php");
        break;
    case "certificate-edit-show":
        $certificate = $certificateObj->getCertificateById($_GET['cid']);
        //echo "TEST<pre>";print_r($certificate);exit();
        include("templates/edit_certificates.php");
        break;    
    case "certificate-add-process":
    	$insertedObj = $certificateObj->create($_POST);
        //echo "<pre>";print_r($insertedObj);exit();
    	header("Location: index.php");
        //print_r($_POST);exit();
        //include("templates/add_certificates.php");
        break;
    case "certificate-edit-process":
        $updatedObj = $certificateObj->update($_POST);
        header("Location: index.php");
        break;
    case "certificate-display-html":
        $certificate = $certificateObj->getCertificateWithSpecialAttributes($_GET['cid']);
        //echo "TEST<pre>";print_r($certificate);exit();
        include("templates/display_certificate_html.php");
        break;
    case "certificate-display-xml":
        $certificateData = $certificateObj->getCertificateWithSpecialAttributes($_GET['cid']);
        if(empty($certificateData->participation_rate)){
            $result = $certificateObj->toXml($certificateData);    
        }else{
            $result = "XML geneartion for guarantee certificate is not allowed";
        }
        //echo "TEST<pre>";print_r($certificateData);exit();        
        include("templates/display_certificate_xml.php");
        break;                    
    default:
       $certificates = $certificateObj->getAllCertificates();
        //echo "TEST<pre>";print_r($certificates);exit();
       include("templates/list_certificates.php");
}
?>