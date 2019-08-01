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
	
	
	
}