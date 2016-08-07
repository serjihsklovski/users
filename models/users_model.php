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
  public static function get_users_list($lim_1=false, $lim_2=false, $sort=false, $desc=false, $field='id') {
    $conn = Database::connect();
    $users_list = array();
    $sql = "SELECT id, uname, email, aedt FROM users";

    if ($sort) {
      $sql .= " ORDER BY $id";

      if ($decl) {
        $sql .= " DECL";
      }
    }

    if ($lim_1) {
      $sql .= " LIMIT $lim_1";

      if ($lim_2) {
        $sql .= ", $lim_2";
      }
    }

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

  /*
   * inserts new user in the table
   */
  public static function insert_user($uname, $email, $aedt) {
    $conn = Database::connect();
    $conn->query("INSERT INTO users VALUES(NULL, '$uname', '$email', '$aedt')");
  }

  /*
   * deletes user from the table by id
   */
  public static function delete_user($id) {
    $conn = Database::connect();
    $conn->query("DELETE FROM users WHERE id=$id");
  }

  /*
   * edites user in table by id
   */
  public static function edit_user($id, $uname, $email, $aedt) {
    $conn = Database::connect();
    $conn->query("UPDATE users SET uname='$uname', email='$email', aedt='$aedt'"
        . " WHERE id=$id");
  }

  /*
   * just updates information about user
   */
  public static function update_user($id, $uname, $email) {
    Database::edit_user($id, $uname, $email, date("Y:m:d H:i:s"));
  }
}
