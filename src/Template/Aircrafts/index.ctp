<h1>Aircrafts</h1>
<?= $this->Html->link('Add an aircraft', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Model</th>
		<th>By</th>
        <th>Created</th>
		<th>Action</th>
    </tr>

    <?php foreach ($aircrafts as $aircraft): ?>
    <tr>
        <td>
            <?= $this->Html->link($aircraft->Modele, ['action' => 'view', $aircraft->slug]) ?>
        </td>
		 <td>
            <?= $aircraft->user->username ?>
        </td>
        <td>
            <?= $aircraft->created->format(DATE_RFC850) ?>
        </td>
		<td>
            <?= $this->Html->link('Edit', ['action' => 'edit', $aircraft->slug]) ?>
			<?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $aircraft->slug],
                ['confirm' => 'Are you sure ?'])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>