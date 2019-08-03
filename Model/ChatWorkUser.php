<?php
App::import('Model', 'AppModel');

class ChatWorkUser extends AppModel {

	public $name = 'ChatWorkUser';
	
/*
	public $belongsTo = [
		'Mypage' => [
			'className' => 'Members.Mypage',
			'foreignKey' => 'mypage_id']
	];
*/
	
	public $validate = [
		'api_token' => [
            'maxLength' => [
                'rule' => ['maxLength', 100],
                'message' => '100文字以内で入力してください。'],
            'alphaNumeric' => [
                'rule' => 'alphaNumeric',
                'message' => '英数字のみで入力してください。'],
        ],
        'room_id' => [
            'maxLength' => [
                'rule' => ['maxLength', 100],
                'message' => '100文字以内で入力してください。'],
        ],
	];
	
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->ChatWorkLog = ClassRegistry::init('ChatWork.ChatWorkLog');
	}
	
	public function beforeValidate($options = array()){
	    if(isset($this->data[$this->name]['room_id'])){
		    $this->data[$this->name]['room_id'] = $this->numbersOnly($this->data[$this->name]['room_id']);
	    }
	    return true;
    }
    
    public function numbersOnly($data){
	    $data = mb_convert_kana($data, 'n');
	    $data = preg_replace('/[^0-9]/', '', $data);
	    return $data;
    }
	
	//無かったら作って返す
	public function findUser($mypage_id){
		$ChatWorkUser = $this->findByMypageId($mypage_id);
		if(empty($ChatWorkUser)){
			$ChatWorkUser['ChatWorkUser'] = [
				'mypage_id' => $mypage_id
			];
			$this->create();
			if($this->save($ChatWorkUser)){
				$ChatWorkUser['ChatWorkUser']['id'] = $this->getLastInsertId();
			}else{
				$this->log('ChatWorkUser.php findUser error. '.print_r($ChatWorkUser, true));
			}
		}
		return $ChatWorkUser;
	}
	
	// notification
	
	public function notificationMessage($mypage_id, $message){
		if(Configure::read('MccPlugin.TEST_MODE')){
			$ChatWorkLog['ChatWorkLog'] = [
				'mypage_id' => $mypage_id,
				'message_id' => 'test',
				'text' => $message,
				'status' => 'test'
			];
			return $ChatWorkLog;
		}
		$ChatWorkUser = $this->findUser($mypage_id);
		$api_token = $ChatWorkUser['ChatWorkUser']['api_token'];
		$room_id = $ChatWorkUser['ChatWorkUser']['room_id'];
		$url = 'https://api.chatwork.com/v2/rooms/'.$room_id.'/messages';
		if(empty($api_token) && empty($room_id)){
			return false;
		}
		
		//送信
		//header("Content-type: text/html; charset=utf-8");
		$params = ["body" => $message];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-ChatWorkToken: '. $api_token));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);		// 結果を文字列で返す
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	// サーバー証明書の検証を行わない
		curl_setopt($ch, CURLOPT_POST, true);				// HTTP POSTを実行
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params, '', '&'));
		$rsp = curl_exec($ch);
		curl_close($ch);
		if($rsp){
			$res = json_decode($rsp);
			$message_id = $res->message_id;
			$status = 'success';
		}else{
			$message_id = null;
			$status = 'error';
		}
		//保存
		$ChatWorkLog['ChatWorkLog'] = [
			'mypage_id' => $mypage_id,
			'message_id' => $message_id,
			'text' => $message,
			'status' => $status
		];
		$this->ChatWorkLog->create();
		if($this->ChatWorkLog->save($ChatWorkLog)){
			$ChatWorkLog['ChatWorkLog']['id'] = $this->ChatWorkLog->getLastInsertId();
		}else{
			$this->log('ChatWorkUser.php notificationMessage error. '.print_r($ChatWorkLog, true));
		}
		return $ChatWorkLog;
	}
	
	
	

}
