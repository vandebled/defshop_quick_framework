<?php

class UserModel extends Model {

  public function insertUser($data) {
    $result = $this->insert($data);
    return $result;
  }

  public function getUser($username, $password) {
    $sql = "SELECT * FROM $this->table WHERE username = '$username' AND password = '" . md5($password) . "'";
    $user = $this->db->getRow($sql);
    return $user;
  }

}
