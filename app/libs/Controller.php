<?php

class Controller
{
    /**
     * Return the model
     *
     * @param  filename $model
     * @return void
     */
    protected function model($model)
    {
        require_once MODEL . $model . '.php';
        $model = str_replace('Admin/', '', $model);
        $model = str_replace('Home/', '', $model);
        $model = ucfirst($model);
        return new $model;
    }


    /**
     * Return the view
     *
     * @param  filename $view
     * @return void
     */
    protected function view($view, $data = [])
    {
        $view = explode('/', $view);
        $view = implode(DS, $view);
        require_once VIEW . $view . '.php';
    }
}
