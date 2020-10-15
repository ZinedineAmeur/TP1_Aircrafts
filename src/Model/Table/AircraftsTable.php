<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class AircraftsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
		$this->hasMany('engines');
		$this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
    }
	
	public function beforeSave($event, $entity, $options)
	{
		if ($entity->isNew() && !$entity->slug) {
			$sluggedTitle = Text::slug($entity->Modele);
			// trim slug to maximum length defined in schema
			$entity->slug = substr($sluggedTitle, 0, 191);
		}
	}
	
	public function validationDefault(Validator $validator)
	{
		$validator
			->allowEmptyString('Modele', false)
			->minLength('Modele', 5)
			->maxLength('Modele', 255)

			->allowEmptyString('Moteur', false)
			->minLength('Moteur', 5)
			->maxLength('Moteur', 255)
			
			->allowEmptyString('Armee', false)
			->minLength('Armee', 5)
			->maxLength('Armee', 255);

		return $validator;
	}
}