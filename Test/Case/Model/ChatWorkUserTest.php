<?php
App::uses('ChatWorkUser', 'ChatWork.Model');

class ChatWorkUserTest extends BaserTestCase {
    public $fixtures = array(
        'plugin.chat_work.Default/ChatWorkLog',
        'plugin.chat_work.Default/ChatWorkUser',
        'plugin.chat_work.Default/Mypage',
    );

    public function setUp() {
        $this->ChatWorkUser = ClassRegistry::init('ChatWork.ChatWorkUser');
        Configure::write('MccPlugin.TEST_MODE', true);
        parent::setUp();
    }
    
    public function tearDown(){
	    unset($this->ChatWorkUser);
	    parent::tearDown();
    }
	
/*
	public function testMonthlyReasonIdBook(){
		$ym = date('Ym');
		$mypage_ids[] = '40';
		$r = $this->PointBook->monthlyUserBook($ym, $mypage_ids);
		$this->assertEquals('-100', $r[0]['PointBook']['point']);
		$this->assertFalse($r);
	}
*/

	public function testFindUser(){
		$mypage_id = '1';
		$r = $this->ChatWorkUser->findUser($mypage_id);
		$this->assertEquals('1', $r['ChatWorkUser']['id']);
	}
	
	public function testNotificationMessage(){
		//Configure::write('MccPlugin.TEST_MODE', false);
		$mypage_id = '1';
		$message = '[To:4083869]テスト5';
		$r = $this->ChatWorkUser->notificationMessage($mypage_id, $message);
		$this->assertEquals('test', $r['ChatWorkLog']['status']);
	}
	
	
	
}