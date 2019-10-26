<?php

namespace App\Certificates\Repositories;
use App\Certificates\Models\CertificateModel;

interface ICertificateContract 
{
	public function store(CertificateModel $modelObj);

	public function update($modelObj, $id);

	public function fetchAllCertificates();

	public function fetchCertificateById($certificateId);
}