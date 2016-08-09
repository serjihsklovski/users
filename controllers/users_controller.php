<?php

include_once ROOT . '/models/users_model.php';
define('FIRST_PAGE', 0);
define('ROW_COUNT_ONE_PAGE', 8);

class UsersController {
  public function action_view($page=0, $sort=false, $desc=false, $field='id') {
    $users_list = UsersModel::get_users_list($page * ROW_COUNT_ONE_PAGE,
                                             ROW_COUNT_ONE_PAGE, $sort,
                                             $desc, $field);

    $page_count = ceil(UsersModel::row_count() / ROW_COUNT_ONE_PAGE);

    if ($page < 0 || $page >= $page_count) {
      throw new Error_404;
    }

    require_once(ROOT . '/views/users/index.php');
    return true;
  }

  public function action_add($uname, $email) {
    UsersModel::insert_user($uname, $email, date("Y-m-d H:i:m"));
    return $this->action_view(FIRST_PAGE);
  }

  public function action_delete($id) {
    UsersModel::delete_user($id);
    return $this->action_view(FIRST_PAGE);
  }

  public function action_edit($id, $uname, $email) {
    UsersModel::update_user($id, $uname, $email);
    return $this->action_view(FIRST_PAGE);
  }

  public function action_sort($page) {
    $users_list = UsersModel::get_users_list($page * ROW_COUNT_ONE_PAGE,
                                             ROW_COUNT_ONE_PAGE, true, true,
                                             'aedt');

    $page_count = ceil(UsersModel::row_count() / ROW_COUNT_ONE_PAGE);

    require_once(ROOT . '/views/users/index.php');
    return true;
  }
}
