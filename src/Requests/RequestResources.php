<?php

namespace Clinect\NextGen\Requests;

trait RequestResources
{
    public function appointments(int|string|null $id = null): AppointmentsRequest
    {
        return new AppointmentsRequest($id);
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

    public function master(int|string|null $id = null): MasterRequest
    {
        return new MasterRequest($id);
    }

    public function patients(int|string|null $id = null): PatientsRequest
    {
        return new PatientsRequest($id);
    }

    public function persons(int|string|null $id = null): PersonsRequest
    {
        return new PersonsRequest($id);
    }
}
