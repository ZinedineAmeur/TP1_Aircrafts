<h1><?= h($aircraft->Modele) ?></h1>
<p><?= __('Created the: ') ?><?= h($aircraft->AnneeDev) ?></p>
<p><?= __('Army: ') ?><?= h($aircraft->Armee) ?></p>
<p><small>Created: <?= $aircraft->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $aircraft->slug]) ?></p>