<?php

class HomeController{
    public function index(){
        include('View\layout\header.php');
        include('View\layout\home.php');
        include('View\layout\footer.php');
    }
}