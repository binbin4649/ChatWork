<?php

class ChatWorkUserFixture extends CakeTestFixture {
	
	public $import = array('model' => 'ChatWork.ChatWorkUser');
	
	
	public function init(){
		$this->records = [
			[
				'id' => 1,
				'mypage_id' => 1,
				'api_token' => 'f7e95acce18e8341683fce14e57d6990',
				'room_id' => '159417824',
				'created' => '2018-08-01 18:26:01',
				'modified' => '2018-08-01 18:26:01'
			],
		];
		parent::init();
	}

}