<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Requests\Providers\FavoritesRequest;
use Clinect\NextGen\Requests\Providers\ApprovalQueueRequest;
use Clinect\NextGen\Requests\Providers\MedicationRefillRequest;
use Clinect\NextGen\Requests\Providers\DiagnosisCategoriesRequest;

class ProvidersRequest extends Request
{
    public function __construct(
        public int|string|null $id = null,
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return '/providers';
    }

    public function approvalQueue(int|string|null $id = null): ApprovalQueueRequest
    {
        $this->cleanUpEndpoint();
        return new ApprovalQueueRequest($this->endpoint, $id);
    }

    public function diagnosisCategories(int|string|null $id = null): DiagnosisCategoriesRequest
    {
        $this->cleanUpEndpoint();
        return new DiagnosisCategoriesRequest($this->endpoint, $id);
    }

    public function diagnosticTests()
    {
        return $this->addEndpoint('/diagnostic-tests');
    }

    public function durReasons()
    {
        return $this->addEndpoint('/dur-reasons');
    }

    public function encounters()
    {
        return $this->addEndpoint('/encounters');
    }

    public function erxInfo()
    {
        return $this->addEndpoint('/erx-info');
    }

    public function favorites(int|string|null $id = null): FavoritesRequest
    {
        $this->cleanUpEndpoint();
        return new FavoritesRequest($this->endpoint, $id);
    }

    public function labTests()
    {
        return $this->addEndpoint('/lab-tests');
    }

    public function medicationRefillRequests(int|string|null $id = null): MedicationRefillRequest
    {
        $this->cleanUpEndpoint();
        return new MedicationRefillRequest($this->endpoint, $id);
    }
}
