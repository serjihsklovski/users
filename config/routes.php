<?php

return array(
  'users/view' => 'users/view',
  'users/view/(\d+)' => 'users/view/$1',
  'users/view/(\d+)/(\d+)' => 'users/view/$1/$2',
  'users/view/(\d+)/(\d+)/([01])' => 'users/view/$1/$2/$3',
  'users/view/(\d+)/(\d+)/([01])/([01])' => 'users/view/$1/$2/$3/$4',
  'users/view/(\d+)/(\d+)/([01])/([01])/([a-z_]+)' => 'users/view/$1/$2/$3/$4/$5',
);
