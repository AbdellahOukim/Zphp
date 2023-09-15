<?php

namespace app\core;


class Route
{

    protected static array $routes = [];
    protected $request;
    protected $view;

    public function __construct()
    {
        $this->request = new Request();
        $this->view = new View();
    }

    public static function get($path, $callback)
    {
        $pathInfos = self::pathHasParams($path);
        if ($pathInfos['hasParams']) {
            $path = $pathInfos['basePath'];
            array_push($callback, $pathInfos['paramsKey']);
        }
        self::$routes['get'][$path] = $callback;
    }

    public static function post($path, $callback)
    {
        $pathInfos = self::pathHasParams($path);
        if ($pathInfos['hasParams']) {
            array_push($callback, $pathInfos['paramsKey']);
            $path = $pathInfos['basePath'];
        }

        self::$routes['post'][$path] = $callback;
    }

    public static function pathHasParams($path)
    {
        $position = strpos($path, ':');
        $basePath = substr($path, 0, $position);
        $params = explode('/:', $path);
        array_shift($params);
        return ['hasParams' => $position, 'basePath' => $basePath, 'paramsKey' => $params];
    }


    public function resolveWithParams($currentPath)
    {
    }


    public function resolve()
    {



        $currentMethod = $this->request->getMethod();
        $currentPath = $this->request->getPath();




        foreach (self::$routes as $method => $path) {

            foreach ($path as $url => $callback) {
                if (is_array($callback)) {

                    if ($method === $currentMethod) {

                        $callbackLen = sizeof($callback);

                        if ($callbackLen > 2) {



                            if (str_contains($currentPath, $url)) {
                                $paramsInUrl = substr($currentPath, strlen($url), strlen($currentPath));
                                $paramsInUrl = explode('/', $paramsInUrl);
                                $finalParams = [];

                                for ($i = 0; $i < sizeof($callback[2]); $i++) {
                                    $finalParams[$callback[2][$i]] = $paramsInUrl[$i];
                                }

                                $controller = new $callback[0];
                                return $controller->{$callback[1]}($this->request, ...$finalParams);
                            }
                        }
                    } else {
                        $callback = false;
                    }
                }
            }
        }


        $callback = self::$routes[$currentMethod][$currentPath] ?? false;




        if (!$callback) {

            return $this->view->render('http.404');
        }

        if (is_array($callback)) {
            $controller = new $callback[0];
            return $controller->{$callback[1]}($this->request);
        }


        return call_user_func($callback);
    }
}
