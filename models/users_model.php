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

  /*
   * returns list of users
   * list can be sorted ($sort = true)
   */
  public static function get_users_list($begin, $count, $sort=false, $desc=false, $field='id') {
    $conn = Database::connect();
    $users_list = array();
    $sql = "SELECT id, uname, email, aedt FROM users";

    if ($sort) {
      $sql .= " ORDER BY $id";

      if ($decl) {
        $sql .= " DECL";
      }
    }

    $sql .= " LIMIT $begin, $count";

    $res = $conn->query($sql);

    $i = 0;
    while ($row = $res->fetch()) {
      $users_list[$i]['id'] = $row['id'];
      $users_list[$i]['uname'] = $row['uname'];
      $users_list[$i]['email'] = $row['email'];
      $users_list[$i]['aedt'] = $row['aedt'];

      $i++;
    }

    return $users_list;
  }
}
