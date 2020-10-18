<h1><?= __('Aircrafts') ?></h1>
<?= $this->Html->link(__('Add an aircraft'), ['action' => 'add']) ?>
<table>
    <tr>
        <th scope="col"><?= $this->Paginator->sort( ('Model')) ?></th>
        <th scope="col"><?= $this->Paginator->sort(('By')) ?></th>
        <th scope="col"><?= $this->Paginator->sort(('Created')) ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
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