<?php

namespace Clinect\NextGen\Requests\PersonsChart;

use Clinect\NextGen\Requests\Request;

class ObFlowSheetsRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/ob-flowsheets';
    }

    public function obMultiGestation(): static
    {
        return $this->addEndpoint('/ob-multi-gestation');
    }
}
