<?php

class HomeController extends ServiceController {

    public function index()
    {
        return View::make('home');
    }
}
