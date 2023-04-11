<?php

namespace Clinect\NextGen\Requests;

trait RequestResources
{
    public function appointments(int|string|null $id = null): AppointmentRequests
    {
        return new AppointmentRequests($id);
    }

    public function departments(int|string|null $id = null): DepartmentRequests
    {
        return new DepartmentRequests($id);
    }

    public function healthHistoryForms(int|string|null $id = null): HealthHistoryFormRequests
    {
        return new HealthHistoryFormRequests($id);
    }

    public function insurances(int|string|null $id = null): InsuranceRequests
    {
        return new InsuranceRequests($id);
    }

    public function master(int|string|null $id = null): MasterRequests
    {
        return new MasterRequests($id);
    }

    public function patients(int|string|null $id = null): PatientRequests
    {
        return new PatientRequests($id);
    }

    public function persons(int|string|null $id = null): PersonRequests
    {
        return new PersonRequests($id);
    }
}
