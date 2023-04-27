<?php

class Model_List extends Model
{
    public function get_task_by_id($task_id) {
        include 'db.php';
        $token = mysqli_real_escape_string($this->mysqli, $task_id);
        $result = $this->mysqli->query('SELECT * FROM tasks WHERE id = '.$task_id.' ')->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function set_task_done_by_id($task_id) {
        $task_id = mysqli_real_escape_string($this->mysqli, $task_id);
        if ($this->mysqli->query('UPDATE tasks SET status = "done" WHERE id = '.$task_id.' ') === TRUE) {
            return 'updated';
        } else {
            return 'could_not_update';
        }
    }

    public function add_new_task($username, $email, $text) {
        $username = mysqli_real_escape_string($this->mysqli, $username);
        $email = mysqli_real_escape_string($this->mysqli, $email);
        $text = mysqli_real_escape_string($this->mysqli, $text);
        $result = $this->mysqli->query('INSERT INTO tasks (name, email, text, status) VALUES ("'.$username.'", "'.$email.'", "'.$text.'", "created") ');
        return $result;
    }

    public function edit_task_by_id($task_id, $text) {
        $task_id = mysqli_real_escape_string($this->mysqli, $task_id);
        $text = mysqli_real_escape_string($this->mysqli, $text);
        if ($this->mysqli->query('UPDATE tasks SET status = "edited", text = "'.$text.'" WHERE id = '.$task_id.' ') === TRUE) {
            return 'updated';
        } else {
            return 'could_not_update';
        }
    }
}
