<?php

namespace GeTracker\OctaneHelpers\Facades;

use Illuminate\Support\Facades\Facade;

class ExecutionTime extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return \GeTracker\OctaneHelpers\Support\ExecutionTime::class;
    }
}
