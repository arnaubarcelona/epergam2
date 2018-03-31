<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LendingPolicies Model
 *
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\HasMany $Groups
 *
 * @method \App\Model\Entity\LendingPolicy get($primaryKey, $options = [])
 * @method \App\Model\Entity\LendingPolicy newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LendingPolicy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LendingPolicy|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LendingPolicy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LendingPolicy[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LendingPolicy findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LendingPoliciesTable extends Table
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

        $this->setTable('lending_policies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Groups', [
            'foreignKey' => 'lending_policy_id'
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
            ->integer('lending_max_days')
            ->allowEmpty('lending_max_days');

        $validator
            ->integer('lending_max_items')
            ->allowEmpty('lending_max_items');

        return $validator;
    }
}
