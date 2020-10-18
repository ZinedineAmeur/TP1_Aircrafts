<h1><?= __('Add an aircraft') ?></h1>
<?php
    echo $this->Form->create($aircraft);
    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('Modele');
	echo $this->Form->control('AnneeDev');
    echo $this->Form->control('Armee');
	echo $this->Form->control('engines._ids', ['options' => $engines]);
    echo $this->Form->button(__('Save the aircraft'));
    echo $this->Form->end();
?>