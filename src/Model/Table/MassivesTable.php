<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Massives Model
 *
 * @property \App\Model\Table\LocationsTable|\Cake\ORM\Association\BelongsTo $Locations
 *
 * @method \App\Model\Entity\Massife get($primaryKey, $options = [])
 * @method \App\Model\Entity\Massife newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Massife[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Massife|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Massife patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Massife[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Massife findOrCreate($search, callable $callback = null, $options = [])
 */
class MassivesTable extends Table
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

        $this->setTable('massives');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
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
            ->scalar('data')
            ->maxLength('data', 4294967295)
            ->requirePresence('data', 'create')
            ->notEmpty('data');

		$validator
            ->boolean('ignore_duplicate')
            ->requirePresence('ignore_duplicate', 'create')
            ->notEmpty('ignore_duplicate');
            
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
