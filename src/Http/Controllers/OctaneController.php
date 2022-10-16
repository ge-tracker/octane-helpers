<?php

namespace GeTracker\OctaneHelpers\Http\Controllers;

use Illuminate\Http\Response;

abstract class OctaneController
{
    protected function response(?string $content = '', int $status = 200, array $headers = []): Response
    {
        return new Response($content, $status, $headers);
    }
}
