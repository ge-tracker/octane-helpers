<?php

namespace GeTracker\OctaneHelpers\Facades;

use Illuminate\Support\Facades\Facade;

class OctaneRoute extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return \GeTracker\OctaneHelpers\Routing\OctaneRoute::class;
    }
}
