
<?php echo $this->BcForm->create('ChatWorkUser') ?>
会員番号:<?php echo $this->BcForm->input('ChatWorkUser.mypage_id', array('type'=>'text', 'size'=>2)) ?>　　　
<?php echo $this->BcForm->submit('　検索　', array('div' => false, 'class' => 'button', 'style'=>'padding:4px;')) ?>
<?php echo $this->BcForm->end() ?>

<div id="DataList">
<?php $this->BcBaser->element('pagination') ?>
<table cellpadding="0" cellspacing="0" class="list-table" id="ListTable">
<thead>
	<tr>
		<th style="width:100px" class="list-tool"></th>
		<th>Id</th>
		<th>API登録</th>
		<th>更新</th>
	</tr>
</thead>
<tbody>
	<?php if (!empty($ChatWorkUsers)): ?>
		<?php foreach ($ChatWorkUsers as $data): ?>
			<?php
				$element_array = ['width' => 24, 'height' => 24, 'alt' => '編集', 'class' => 'btn'];
				$link_edit = ['action' => 'edit', $data['ChatWorkUser']['mypage_id']];
				$input = '';
				if(!empty($data['ChatWorkUser']['api_token']) && !empty($data['ChatWorkUser']['room_id'])){
					$input = '登録あり';
				}
			?>
			<tr>
				<td class="row-tools">
					<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', $element_array), $link_edit, ['title'=>'編集']); ?>
				</td>
				<td><?php echo $data['ChatWorkUser']['mypage_id']; ?></td>
				<td><?php echo $input; ?></td>
				<td><?php echo $this->BcTime->format('Y-m-d H:i:s', $data['ChatWorkUser']['modified']); ?></td>
			</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="8"><p class="no-data">データが見つかりませんでした。</p></td>
		</tr>
	<?php endif; ?>
</tbody>
</table>
</div>
<div class="section">
<p>ページングと検索は同時に使えません。（仕様です）<br>
</p>
</div>