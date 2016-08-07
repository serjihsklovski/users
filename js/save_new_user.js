$('document').ready(function() {
  $('#btn_save').click(function() {
    var _uname = $('#uname').val();
    var _email = $('#email').val();

    $.post({
      url: "../../../php/save_new_user.php",
      data: {
        uname: _uname,
        email: _email
      }
    }).done(function(data) {
      data = data.split('|');
      $('#my_table').append(
        `<tr>
           <th>${data[0]}</th>
           <th>${_uname}</th>
           <th>${_email}</th>
           <th>${data[1]}</th>
           <th>
             <div class="btn-group">
               <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
               <button type="submit" class="btn btn-danger">&times;</button>
             </div>
           </th>
         </tr>`
      );
    });
  });
});
