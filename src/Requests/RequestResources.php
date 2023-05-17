<?php

namespace Clinect\NextGen\Requests;

trait RequestResources
{
    public function appointments(int|string|null $id = null): AppointmentsRequest
    {
        return new AppointmentsRequest('', $id);
    }

    public function auditEvents(int|string|null $id = null): AuditEventsRequest
    {
        return new AuditEventsRequest($id);
    }

    public function authenticationServices(): AuthenticationServicesRequest
    {
        return new AuthenticationServicesRequest();
    }

    public function master(): MasterRequest
    {
        return new MasterRequest();
    }

    public function persons(int|string|null $id = null): PersonsRequest
    {
        return new PersonsRequest($id);
    }

    public function providers(int|string|null $id = null): ProvidersRequest
    {
        return new ProvidersRequest($id);
    }

    public function resources(int|string|null $id = null): ResourcesRequest
    {
        return new ResourcesRequest($id);
    }

    public function users(int|string|null $id = null): UsersRequest
    {
        return new UsersRequest($id);
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

    public function ccda(): CcdaRequest
    {
        return new CcdaRequest();
    }
}
