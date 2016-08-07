<?php

include_once ROOT . '/models/users_model.php';

class UsersController {
  public function action_view($lim_1=false, $lim_2=false, $sort=false, $desc=false, $field='id') {
    $users_list = UsersModel::get_users_list($lim_1, $lim_2, $sort, $desc, $field);
    require_once(ROOT . '/views/users/index.php');
    return true;
  }

  public function action_add($uname, $email) {
    UsersModel::insert_user($uname, $email, date("Y-m-d H:i:m"));
    $users_list = UsersModel::get_users_list();
    require_once(ROOT . '/views/users/index.php');
    return true;
  }

  public function action_delete($id) {
    UsersModel::delete_user($id);
    $users_list = UsersModel::get_users_list();
    require_once(ROOT . '/views/users/index.php');
    return true;
  }

  public function action_edit($id, $uname, $email) {
    UsersModel::update_user($id, $uname, $email);
    $users_list = UsersModel::get_users_list();
    require_once(ROOT . '/views/users/index.php');
    return true;
  }
}
