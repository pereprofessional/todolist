<?php

class Controller_Main extends Controller
{
    function __construct() {
        $this->model = new Model_Main();
        $this->view = new View();

        require_once 'application/models/model_auth.php';
        $this->model_auth = new Model_Auth();
    }

	function action_index() {
        $limit = 3;

	    $page = 1;
	    if (is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        }

	    $sort = 'id';
	    if (($_GET['sort'] == 'id') || ($_GET['sort'] == 'name') || ($_GET['sort'] == 'email') || ($_GET['sort'] == 'status')) {
            $sort = $_GET['sort'];
        }

	    $order = 'desc';
	    if (($_GET['order'] == 'asc') || ($_GET['sort'] == 'desc')) {
            $order = $_GET['order'];
        }

        $tasks = $this->model->get_tasks($page, $limit, $order, $sort);
        $number_of_pages = intval(ceil($this->model->get_number_of_pages() / $limit));
        $user = $this->model_auth->get_user_by_token($_COOKIE['token']);
        $data = [
            'tasks' => $tasks,
            'number_of_pages' => $number_of_pages,
            'current_page' => $page,
            'user' => $user
        ];
        $this->view->generate('todo_view.php', 'template_view.php', $data);
	}
}