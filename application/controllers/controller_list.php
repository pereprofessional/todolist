<?php

class Controller_List extends Controller
{
    function __construct() {
        $this->model = new Model_List();

        require_once 'application/models/model_auth.php';
        $this->model_auth = new Model_Auth();
    }

	function action_index() {
        if (isset($_POST['task_id']))
            $this->set_task_done_by_id($_POST['task_id']);

        if ((isset($_POST['username'])) && (isset($_POST['email'])) && (isset($_POST['text']))) {
            $this->add_new_task($_POST['username'], $_POST['email'], $_POST['text']);
        }

        if ((isset($_POST['id'])) && (isset($_POST['text']))) {
            $this->edit_task_by_id($_POST['id'], $_POST['text']);
        }
	}

	protected function edit_task_by_id($id, $text) {
        $user = $this->model_auth->get_user_by_token($_COOKIE['token']);
        if (!$user) {
            echo json_encode(['status' => 'fail', 'message' => 'no_login'], true);
            die;
        }

        $response = $this->model->edit_task_by_id($id, $text);
        echo json_encode(['status' => 'success', 'data' => $response], true);
    }

	protected function add_new_task($username, $email, $text) {
        if ((!$username) || ((!$text)) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
            echo json_encode(['status' => 'fail', 'message' => 'invalid_data'], true);
            die;
        }

        if (!$this->model->add_new_task($username, $email, $text)) {
            echo json_encode(['status' => 'fail', 'message' => 'could_not_insert_row'], true);
        }

        echo json_encode(['status' => 'success']);
    }

	protected function set_task_done_by_id($task_id) {
        $user = $this->model_auth->get_user_by_token($_COOKIE['token']);
        if (!$user) {
            echo json_encode(['status' => 'fail', 'message' => 'no_login'], true);
            die;
        }

        if (!is_numeric($task_id)) {
            echo json_encode(['status' => 'fail', 'message' => 'bad_task_id'], true);
            die;
        }

        $data = $this->model->get_task_by_id($task_id);
        if (!$data) {
            echo json_encode(['status' => 'fail', 'message' => 'task_does_not_exist'], true);
            die;
        }

        $response = $this->model->set_task_done_by_id($task_id);

        echo json_encode(['status' => 'success', 'data' => $response], true);

    }
}