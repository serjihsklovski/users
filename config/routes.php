<?php

return array(
  'users/view' => 'users/view',
  'users/view/(\d+)' => 'users/view/$1',
  'users/view/(\d+)/([01])' => 'users/view/$1/$2',
  'users/view/(\d+)/([01])/([01])' => 'users/view/$1/$2/$3',
  'users/view/(\d+)/([01])/([01])/([a-z_]+)' => 'users/view/$1/$2/$3/$4',
  'users/add/([\pL\s]+)/([a-z][a-z\d\._]*@[a-z][a-z\d\._]*\.[a-z][a-z\d\._]*)' => 'users/add/$1/$2',
  'users/del/(\d+)' => 'users/delete/$1',
  'users/edt/(\d+)/([\pL\s]+)/([a-z][a-z\d\._]*@[a-z][a-z\d\._]*\.[a-z][a-z\d\._])' => 'users/edit/$1/$2/$3',
);
