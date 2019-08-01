<?php 

class ChatWorkUsersController extends ChatWorkAppController {
  
  public $name = 'ChatWorkUsers';

  public $uses = array('Plugin', 'ChatWork.ChatWorkUser', 'ChatWork.ChatWorkLog', 'Members.Mypage');
  
  public $helpers = array('BcPage', 'BcHtml', 'BcTime', 'BcForm');
  
  public $components = ['BcAuth', 'Cookie', 'BcAuthConfigure'];
  
  public $subMenuElements = array('');

  public $crumbs = array(
    array('name' => 'マイページトップ', 'url' => array('plugin' => 'members', 'controller' => 'mypages', 'action' => 'index')),
  );

  public function beforeFilter() {
    parent::beforeFilter();
	if(preg_match('/^admin_/', $this->action)){
	   $this->subMenuElements = array('chat_work');
    }
    //$this->BcAuth->allow('');
  }

	public function admin_index() {
		$this->pageTitle = 'カスタマー（登録カード一覧）';
		
	}





}






?>