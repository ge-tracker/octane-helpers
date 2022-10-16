<?php

namespace GeTracker\OctaneHelpers\Listeners;

use GeTracker\OctaneHelpers\Facades\ExecutionTime;

class BootApplication
{
    public function handle(): void
    {
        ExecutionTime::boot();
    }
}
