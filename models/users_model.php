<?php

class UsersModel {
  public static function get_user_by_id($id) {
    $id = intval($id);

    if ($id) {
      $conn = Database::connect();
      $res = $conn->query("SELECT FROM users WHERE id=$id");
      $res->setFetchMode(PDO::FETCH_ASSOC);
      
      return $res->fetch();
    }
  }
}
