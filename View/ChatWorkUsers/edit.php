<?php $this->BcBaser->css(array('Mcc.mcc'), array('inline' => false)); ?>
<?php
if ($this->Session->check('Message.auth')) {
	$this->Session->flash('auth');
}
?>
<?php $this->BcBaser->flash() ?>
<div id="AlertMessage" class="message" style="display:none"></div>
<h1 class="h5 border-bottom py-3 mb-4 mb-md-5 text-secondary">ChatWork設定</h1>

<?php echo $this->BcForm->create('ChatWorkUser', array('url' => 'edit', 'class' => 'form-group')) ?>
<?php echo $this->BcForm->input('ChatWorkUser.mypage_id', array('type'=>'hidden')) ?>
<?php echo $this->BcForm->input('ChatWorkUser.id', array('type'=>'hidden')) ?>
<div class="row mb-3">
	<div class="col-md-4 text-md-right">
		<?php echo $this->BcForm->label('ComUser.mypage_id', '会員番号') ?>
	</div>
	<div class="col-md-8">
		<?php echo $user['id']; ?>
	</div>
</div>

<div class="row mb-3">
	<div class="col-md-4 text-md-right">
		<?php echo $this->BcForm->label('ChatWorkUser.account_id', 'アカウントID') ?>
	</div>
	<div class="col-md-8">
		<?php echo $this->BcForm->input('ChatWorkUser.account_id', array('type'=>'text', 'class' => 'form-control')) ?>
		<small>数字のみ。</small>
		<?php echo $this->BcForm->error('ChatWorkUser.account_id') ?>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md-4 text-md-right">
		<?php echo $this->BcForm->label('ChatWorkUser.room_id', 'Room Id (Group Id)') ?>
	</div>
	<div class="col-md-8">
		<?php echo $this->BcForm->input('ChatWorkUser.room_id', array('type'=>'text', 'class' => 'form-control')) ?>
		<small>rid に続く数字のみを入力。</small>
		<?php echo $this->BcForm->error('ChatWorkUser.room_id') ?>
	</div>
</div>


<div class="text-center my-3 pt-3">
	<?php echo $this->BcForm->submit('編集', array('div' => false, 'class' => 'btn btn-lg btn-primary btn-e', 'id' => 'BtnLogin')) ?>
</div>
<?php echo $this->BcForm->end() ?>
<div>
	<p><small>
		確認方法など詳しくは<a href="/howto/howto-member#chatwork">メンバーの使い方：ChatWork設定</a>をご参照ください。
	</small></p>
	<p></p>
</div>