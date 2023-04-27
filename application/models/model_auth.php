<?php

class Model_Auth extends Model
{
    public function get_user_by_token($token) {
        $token = mysqli_real_escape_string($this->mysqli, $token);
        $result = $this->mysqli->query('SELECT * FROM users WHERE token = "'.$token.'"')->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}
