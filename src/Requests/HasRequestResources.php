<?php

namespace Clinect\NextGen\Requests;

use Clinect\NextGen\Resources\AppointmentsResource;
use Clinect\NextGen\Resources\BalancesResource;
use Clinect\NextGen\Resources\ChargesResource;
use Clinect\NextGen\Resources\ChartsResource;
use Clinect\NextGen\Resources\PersonsResource;
use Clinect\NextGen\Resources\PatientsResource;
use Clinect\NextGen\Resources\DepartmentsResource;
use Clinect\NextGen\Resources\EncountersResource;
use Clinect\NextGen\Resources\HealthHistoryResource;

trait HasRequestResources
{
    public function patients(): PatientsResource
    {
        return new PatientsResource($this);
    }

    public function persons($personId = null): PersonsResource
    {
        return new PersonsResource($this, $personId);
    }

    public function departments(): DepartmentsResource
    {
        return new DepartmentsResource($this);
    }

    public function appointments(): AppointmentsResource
    {
        return new AppointmentsResource($this);
    }

    public function healthHistory(): HealthHistoryResource
    {
        return new HealthHistoryResource($this);
    }

     // option 2, $nextGen->balances(). option 1: $nextGen->persons()->balances()
    public function balances(): BalancesResource 
    {
        return new BalancesResource($this);
    }

     // option 2, $nextGen->charges(). option 1: $nextGen->persons()->charges()
    public function charges(): ChargesResource
    {
        return new ChargesResource($this);
    }

     // option 2, $nextGen->charts(). option 1: $nextGen->persons()->charts()
    public function charts(): ChartsResource
    {
        return new ChartsResource($this);
    }

     // option 2, $nextGen->encounters(). option 1: $nextGen->persons()->encounters()
    public function encounters(): EncountersResource
    {
        return new EncountersResource($this);
    }
}