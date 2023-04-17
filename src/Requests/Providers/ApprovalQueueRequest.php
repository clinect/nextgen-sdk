<?php

namespace Clinect\NextGen\Requests\Providers;

use Clinect\NextGen\Requests\Request;

class ApprovalQueueRequest extends Request
{
    public function __construct(
        public string $endPoint,
        public int|string|null $id = null
    ) {
        $this->withUriParamId($this->id);
    }

    public function defaultEndpoint(): string
    {
        return $this->endPoint . '/approval-queue';
    }

    public function history()
    {
        return $this->addEndpoint('history','-');
    }

    public function comments()
    {
        return $this->addEndpoint('/comments');
    }
}
