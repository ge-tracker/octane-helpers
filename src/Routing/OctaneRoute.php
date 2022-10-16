<?php

namespace GeTracker\OctaneHelpers\Routing;

use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Laravel\Octane\Facades\Octane;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class OctaneRoute
{
    public function addRoute(string|array $methods, string $uri, array $action): void
    {
        $methods = Arr::wrap($methods);

        foreach ($methods as $method) {
            Octane::route($method, $uri, $this->createRoute($action));
        }
    }

    public function get(string $uri, array $action): void
    {
        $this->addRoute(['GET', 'HEAD'], $uri, $action);
    }

    public function post(string $uri, array $action): void
    {
        $this->addRoute('POST', $uri, $action);
    }

    public function put(string $uri, array $action): void
    {
        $this->addRoute('PUT', $uri, $action);
    }

    public function patch(string $uri, array $action): void
    {
        $this->addRoute('PATCH', $uri, $action);
    }

    public function delete(string $uri, array $action): void
    {
        $this->addRoute('DELETE', $uri, $action);
    }

    public function options(string $uri, array $action): void
    {
        $this->addRoute('OPTIONS', $uri, $action);
    }

    protected function createRoute(array $action): \Closure
    {
        return fn () => $this->makeRoute($action);
    }

    protected function makeRoute(array $action): Response|SymfonyResponse
    {
        $value = $this->invokeAction($action);

        return $value instanceof SymfonyResponse
            ? $value
            : $this->makeResponse($value);
    }

    protected function invokeAction(array $action)
    {
        $controller = app()->make($action[0]);

        return call_user_func([$controller, $action[1]]);
    }

    protected function makeResponse($content = '', $status = 200, array $headers = []): Response
    {
        return new Response($content, $status, $headers);
    }
}
