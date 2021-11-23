<?php
class ControllerUsers {
    private $conn;
    public function __construct($db) {
        $this->conn = $db->getConnect();
    }

    public function index() {
        include_once 'app/Models/ModelUsers.php';
        $users = (new User())::all($this->conn);
        include_once 'Views/Users.php';
    }

    public function addForm() {
        include_once 'Views/AddUsers.php';
    }

    public function add() {
        include_once 'app/Models/ModelUsers.php';
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (trim($name) !== "" && trim($email) !== "" && trim($gender) !== "") {
            $user = new User($name, $email, $gender);
            $user->add($this->conn);
        }
        header('Location: ?controller=users');
    }

    public function delete() {
        include_once 'app/Models/ModelUsers.php';

        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (trim($id) !== "" && is_numeric($id)) {
            (new User())::delete($this->conn, $id);
        }
        header('Location: ?controller=users');
    }
}