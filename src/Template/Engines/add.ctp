<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Engine $engine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Engines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Aircrafts'), ['controller' => 'Aircrafts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aircraft'), ['controller' => 'Aircrafts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="engines form large-9 medium-8 columns content">
    <?= $this->Form->create($engine) ?>
    <fieldset>
        <legend><?= __('Add Engine') ?></legend>
        <?php
            echo $this->Form->control('Title');
            echo $this->Form->control('NbCylindre');
            echo $this->Form->control('Constructeur');
            echo $this->Form->control('AnneeConstruction');
            echo $this->Form->control('aircrafts._ids', ['options' => $aircrafts]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
