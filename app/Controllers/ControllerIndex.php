<?php
class ControllerIndex {
    public function __construct($db) {
    }

    public function index() {
        include_once 'Views/Home.php';
    }
}