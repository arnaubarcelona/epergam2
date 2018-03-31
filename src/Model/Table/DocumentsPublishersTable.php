<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DocumentsPublishers Model
 *
 * @property \App\Model\Table\DocumentsTable|\Cake\ORM\Association\BelongsTo $Documents
 * @property \App\Model\Table\PublishersTable|\Cake\ORM\Association\BelongsTo $Publishers
 *
 * @method \App\Model\Entity\DocumentsPublisher get($primaryKey, $options = [])
 * @method \App\Model\Entity\DocumentsPublisher newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DocumentsPublisher[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DocumentsPublisher|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentsPublisher patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentsPublisher[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentsPublisher findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DocumentsPublishersTable extends Table
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

        $this->setTable('documents_publishers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Documents', [
            'foreignKey' => 'document_id'
        ]);
        $this->belongsTo('Publishers', [
            'foreignKey' => 'publisher_id'
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
        $rules->add($rules->existsIn(['document_id'], 'Documents'));
        $rules->add($rules->existsIn(['publisher_id'], 'Publishers'));

        return $rules;
    }
}
