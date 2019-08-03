<!-- form -->
<?php echo $this->BcForm->create('ChatWorkUser') ?>
<?php echo $this->BcForm->input('ChatWorkUser.mypage_id', array('type' => 'hidden')) ?>
<?php echo $this->BcForm->input('ChatWorkUser.id', array('type' => 'hidden')) ?>
<div class="section">
	<table cellpadding="0" cellspacing="0" class="form-table">
		<tr>
			<th class="col-head" width="150">会員番号</th>
			<td class="col-input">
				<?php echo $data['ChatWorkUser']['mypage_id'] ?>
			</td>
		</tr>
		<tr>
			<th class="col-head" width="150"><?php echo $this->BcForm->label('ChatWorkUser.account_id', 'アカウントID') ?></th>
			<td class="col-input">
			<?php echo $this->BcForm->input('ChatWorkUser.account_id', array('type'=>'text')) ?>
			<?php echo $this->BcForm->error('ChatWorkUser.account_id') ?></td>
		</tr>
		<tr>
			<th class="col-head" width="150"><?php echo $this->BcForm->label('ChatWorkUser.room_id', 'Room Id (Group Id)') ?></th>
			<td class="col-input">
			<?php echo $this->BcForm->input('ChatWorkUser.room_id', array('type'=>'text')) ?>
			<?php echo $this->BcForm->error('ChatWorkUser.room_id') ?></td>
		</tr>
	</table>
</div>
<!-- button -->
<div class="submit">
<?php echo $this->BcForm->submit('登録', array('div' => false, 'class' => 'button')) ?>
</div>
<?php echo $this->BcForm->end() ?>

<div class="section">
<ul>
	<li></li>
</ul>
</div>