<?php

class Router
{
  private $request;
  private $supportedHttpMethods = array(
    "GET",
    "POST"
  );

  function __construct(IRequest $request)
  {
    $this->request = $request;
  }

  /**
   * __call : dynamically create an associative array that map routes to callbacks. 
   *
   * @param  mixed $name : Method Name
   * @param  mixed $args : Argument Data
   * @return void
   */
  function __call($name, $args)
  {
    list($route, $method) = $args;

    // check for supported methods
    if (!in_array(strtoupper($name), $this->supportedHttpMethods)) {
      $this->invalidMethodHandler();
    }

    $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
  }

  /**
   * Removes trailing forward slashes from the right of the route.
   * @param route (string)
   */
  private function formatRoute($route)
  {
    $result = rtrim($route, '/');
    if ($result === '') {
      return '/';
    }
    // echo $result;
    return $result;
  }

  private function invalidMethodHandler()
  {
    header("{$this->request->serverProtocol} 405 Method Not Allowed", true);
  }

  private function defaultRequestHandler()
  {
    header("{$this->request->serverProtocol} 404 Not Found");
  }

  /**
   * Resolves a route
   */
  function resolve()
  {

    $methodDictionary = $this->{strtolower($this->request->requestMethod)};
    $formatedRoute = $this->formatRoute($this->request->requestUri);
    $method = $methodDictionary[$formatedRoute];
    if (is_null($method)) {
      $this->defaultRequestHandler();
      return;
    }
    call_user_func_array($method, array($this->request));
  }

  function __destruct()
  {
    $this->resolve();
  }
}
