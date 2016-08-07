<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Пользователи</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../../../js/save_new_user.js"></script>
  </head>
  <body>
    <div class="panel panel-default">
      <!-- HEADER -->
      <div class="panel-heading">
        <div class="container">
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Добавить запись</button>
          <button type="button" class="btn btn-info btn-lg" name="button">Сортировать</button>
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Новая запись</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text" maxlength="128" placeholder="address@site.com" name="email" class="form-control" id="email" required="required">
                  </div>
                  <div class="form-group">
                    <label for="usr">ФИО:</label>
                    <input type="text" maxlength="128" placeholder="Иванов Иван Иванович" name="uname" class="form-control" id="uname" required="required">
                  </div>
                </div>
                <div class="modal-footer">
                  <button id="btn_save" type="button" class="btn btn-success">Сохранить</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>

      <!-- PANEL BODY -->
      <div class="panel-body">
        <div class="container">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>E-mail</th>
                <th>Добавлено / Обновлено</th>
                <th>Ред. / Удал.</th>
              </tr>
            </thead>
            <tbody id="my_table">
              <?php foreach ($users_list as $user): ?>
                <tr>
                  <th><?php echo $user['id']; ?></th>
                  <th><?php echo $user['uname']; ?></th>
                  <th><?php echo $user['email']; ?></th>
                  <th><?php echo $user['aedt']; ?></th>
                  <th>
                    <form action="index.php" method="post">
                      <input type="hidden" name="delete" value="yes">
                      <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                        <button type="submit" class="btn btn-danger">&times;</button>
                      </div>
                    </form>
                  </th>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- FOOTER -->
      <div class="panel-footer text-center navbar-fixed-bottom">
        <ul class="pagination pagination-panel pull-center">
          <?php
            echo "<li";

            if ($page == 0) {
              echo " class='disabled'><a href='#'>«</a></li>";
            } else {
              echo "><a href='/users/view/" . ($page - 1) . "'>«</a></li>";
            }

            for ($i = 0; $i < $page_count; $i++) {
              echo "<li" . ($i == $page ? " class='active'" : "")
                  . "><a href='/users/view/$i'>" . ($i + 1) . "</a></li>";
            }

            echo "<li";

            if ($page == ($page_count - 1)) {
              echo " class='disabled'><a href='#'>»</a></li>";
            } else {
              echo "><a href='/users/view/" . ($page + 1) . "'>»</a></li>";
            }
          ?>
        </ul>
      </div>
    </div>
  </body>
</html>
