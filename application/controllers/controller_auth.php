<?php

class Controller_Auth extends Controller
{
    function __construct() {
        $this->model = new Model_Auth();
    }

    function action_index() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (isset($_POST['username']) && (isset($_POST['password'])))
            $this->login($username, $password);
    }

    protected function login($username, $password) {
        $token = $this->generate_token($username, $password);

        if ((!$password) || (strlen($username) < 5)) {
            echo json_encode(['status' => 'fail', 'message' => 'invalid_data'], true);
            die;
        }

        $data = $this->model->get_user_by_token($token);
        if (!$data) {
            echo json_encode(['status' => 'fail', 'message' => 'wrong_username_or_password'], true);
            die;
        }

        echo json_encode(['status' => 'success', 'token' => $token]);
    }

    protected function generate_token($username, $password) {
        return hash('sha256', $username.':'.hash('sha256', $password));
    }
}