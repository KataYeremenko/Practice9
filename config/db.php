<?php
class Db {
    public function __construct(){
    }
    public function getConnect(){
        $conn = mysqli_connect("127.0.0.1", "root", "password", "newsite");
        if (!$conn) {
            echo "Could not connect MySQL.";
            echo "Код ошибки error: " . mysqli_connect_errno();
            echo "Текст ошибки error: " . mysqli_connect_error();
            exit;
        }
        return $conn;
    }
}