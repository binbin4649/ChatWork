<?php
 
$config['BcApp.adminNavi.chatwork'] = array(
  'name' => 'ChatWork',
  'contents' => array(
    array('name' => 'User List', 'url' => array('admin' => true, 'plugin' => 'chatwork', 'controller' => 'chat_work_users', 'action' => 'index')),
    array('name' => 'Log', 'url' => array('admin' => true, 'plugin' => 'chatwork', 'controller' => 'chat_work_logs', 'action' => 'index')),
  )
);


?>