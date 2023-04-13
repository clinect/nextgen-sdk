<?php

namespace Clinect\NextGen\Requests;

trait RequestResources
{
    public function appointments(int|string|null $id = null): AppointmentsRequest
    {
        return new AppointmentsRequest($id);
    }

    public function auditEvents(int|string|null $id = null): AuditEventsRequest
    {
        return new AuditEventsRequest($id);
    }

    public function authenticationServices(): AuthenticationServicesRequest
    {
        return new AuthenticationServicesRequest();
    }

    public function departments(int|string|null $id = null): DepartmentsRequest
    {
        return new DepartmentsRequest($id);
    }

    public function healthHistoryForms(int|string|null $id = null): HealthHistoryFormsRequest
    {
        return new HealthHistoryFormsRequest($id);
    }

    public function insurances(int|string|null $id = null): InsurancesRequest
    {
        return new InsurancesRequest($id);
    }

    public function master(): MasterRequest
    {
        return new MasterRequest();
    }

    public function patients(int|string|null $id = null): PatientsRequest
    {
        return new PatientsRequest($id);
    }

    public function persons(int|string|null $id = null): PersonsRequest
    {
        return new PersonsRequest($id);
    }

    public function core(): CoreRequest
    {
        return new CoreRequest();
    }

    public function favorites(): FavoritesRequest
    {
        return new FavoritesRequest();
    }

    public function financial(): FinancialRequest
    {
        return new FinancialRequest();
    }

    public function documentsBatches(int|string|null $id = null): DocumentBatchesRequest
    {
        return new DocumentBatchesRequest($id);
    }
}
