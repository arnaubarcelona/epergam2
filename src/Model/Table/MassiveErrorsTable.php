<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MassiveErrors Model
 *
 * @method \App\Model\Entity\MassiveError get($primaryKey, $options = [])
 * @method \App\Model\Entity\MassiveError newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MassiveError[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MassiveError|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MassiveError patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MassiveError[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MassiveError findOrCreate($search, callable $callback = null, $options = [])
 */
class MassiveErrorsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('massive_errors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->belongsTo('Documents', [
            'foreignKey' => 'document_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('isbn')
            ->maxLength('isbn', 20)
            ->requirePresence('isbn', 'create')
            ->notEmpty('isbn');

        return $validator;
    }
}
