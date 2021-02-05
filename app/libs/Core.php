<?php

class Core
{
    // Set Controller default name
    protected $controller   = 'HomeController';

    // Set Controller default method
    protected $method       = 'index';

    // Set the default params
    protected $params       = [];

    public function __construct()
    {
        // Call the parseUrl function
        $url = $this->parseUrl();

        // Check if the Controller' file exists
        if (file_exists(CONTROLLER . ucfirst($url[0] ?? 'home') . 'Controller.php')) :
            $this->controller = ucfirst($url[0] ?? 'home') . 'Controller';
            unset($url[0]);
        endif;

        // Require the Controller' file
        require_once CONTROLLER . $this->controller . '.php';

        // Instantiate a new Controller
        $this->controller = new $this->controller;

        // Check if the Controller' method exists 
        if (isset($url[1])) :
            if (method_exists($this->controller, $url[1])) :
                $this->method = $url[1];
                unset($url[1]);
            endif;
        endif;

        // Assign the rest of the URL with the variable params
        $this->params = $url ? array_values((array) $url) : [];

        // Call the Controller' method and provide it with the params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Parse the URL
     *
     * @return void
     */
    public function parseUrl()
    {
        if (isset($_GET['url'])) :
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        endif;
    }
}
