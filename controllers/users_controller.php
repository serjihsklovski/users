<?php

include_once ROOT . '/models/users_model.php';

class UsersController {
  public function action_view($page=0, $sort=false, $desc=false, $field='id') {
    $users_list = UsersModel::get_users_list($page * 8, 8, $sort, $desc, $field);
    $page_count = intval((UsersModel::row_count() - 1) / 8) + 1;
    require_once(ROOT . '/views/users/index.php');
    return true;
  }

  public function action_add($uname, $email) {
    UsersModel::insert_user($uname, $email, date("Y-m-d H:i:m"));
    return $this->action_view(0);
  }

  public function action_delete($id) {
    UsersModel::delete_user($id);
    return $this->action_view(0);
  }

  public function action_edit($id, $uname, $email) {
    UsersModel::update_user($id, $uname, $email);
    return $this->action_view(0);
  }
}
