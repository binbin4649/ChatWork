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
		$this->pageTitle = 'ChatWork ユーザー一覧';
		$conditions = [];
		if($this->request->is('post')){
			$data = $this->request->data;
			if($data['ChatWorkUser']['mypage_id']) $conditions[] = array('ChatWorkUser.mypage_id' => $data['ChatWorkUser']['mypage_id']);
		}
		$this->paginate = array('conditions' => $conditions,
			'order' => 'ChatWorkUser.created DESC',
			'limit' => 50
		);
		$ChatWorkUsers = $this->paginate('ChatWorkUser');
		$this->set('ChatWorkUsers', $ChatWorkUsers);
	}
	
	public function admin_edit($mypage_id){
		$this->pageTitle = 'ChatWork ユーザー編集';
		if($this->request->data){
			if($this->ChatWorkUser->save($this->request->data)){
				$this->setMessage( '編集しました。');
			}else{
				$this->setMessage( 'エラー：編集に失敗しました。', true);
			}
		}else{
			$this->request->data = $this->ChatWorkUser->findUser($mypage_id);
		}
		$this->set('data', $this->request->data);
	}
	
	
	public function edit(){
		$user = $this->BcAuth->user();
		if($this->request->data){
			if($this->ChatWorkUser->save($this->request->data)){
				$this->setMessage( '編集しました。');
			}else{
				$this->setMessage( 'エラー：編集に失敗しました。', true);
			}
		}else{
			$this->request->data = $this->ChatWorkUser->findUser($user['id']);
		}
	}





}






?>