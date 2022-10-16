# Octane Helpers

This package will provide some basic functionality to our various Laravel Octane projects.

## Installation

```bash
$ composer require ge-tracker/octane-helpers
```

After installation, the `BootApplication` class should be added to the `RequestReceived` listener in `octane.php`:

```php
'listeners' => [
    ...
    
    RequestReceived::class => [
        ...Octane::prepareApplicationForNextOperation(),
        ...Octane::prepareApplicationForNextRequest(),
        \GeTracker\OctaneHelpers\Listeners\BootApplication::class,
    ],
```

## Routing

We can make use of Octane's builtin routing to serve requests that bypass Laravel's router (and middleware) to serve data very fast.

With a basic controller that extends `OctaneController`:

```php
<?php

namespace GeTracker\OctaneHelpers\Http\Controllers;

class ServerTimeController extends OctaneController
{
    public function getServerTime()
    {
        return time();
    }
}
```

We can add the following to our `web.php` routes file:

```php
<?php
use GeTracker\OctaneHelpers\Facades\OctaneRoute;

OctaneRoute::get('/api/server-time', [ServerTimeController::class, 'getServerTime']);
```
