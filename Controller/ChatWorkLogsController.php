<?php 

class ChatWorkLogsController extends ChatWorkAppController {
  
  public $name = 'ChatWorkLogs';

  public $uses = array('Plugin', 'ChatWork.ChatWorkUser', 'ChatWork.ChatWorkLog', 'Members.Mypage');
  
  public $helpers = array('BcPage', 'BcHtml', 'BcTime', 'BcForm');
  
  public $components = ['BcAuth', 'Cookie', 'BcAuthConfigure'];
  
  public $subMenuElements = array('');

  public $crumbs = array(
    array('name' => 'マイページトップ', 'url' => array('plugin' => 'members', 'controller' => 'mypages', 'action' => 'index')),
  );

  public function beforeFilter() {
    parent::beforeFilter();
    //$this->BcAuth->allow('');
    if(preg_match('/^admin_/', $this->action)){
	   $this->subMenuElements = array('chat_work');
    }
    //$this->Security->unlockedActions = array('payment');
  }
  
  
  
  
  
  
}


?>