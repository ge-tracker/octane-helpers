<?php

namespace GeTracker\OctaneHelpers\Support;

use JetBrains\PhpStorm\Pure;

class ExecutionTime
{
    private float $start;

    public function boot(): void
    {
        $this->start = microtime(true);
    }

    public function getStartTime(): float
    {
        return $this->start;
    }

    public function getExecutionTime(): float
    {
        return microtime(true) - $this->start;
    }

    #[Pure]
    public function getExecutionTimeMs(): float
    {
        return $this->getExecutionTime() * 1000;
    }
}
