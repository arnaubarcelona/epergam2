<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuthoritiesDocuments Model
 *
 * @property \App\Model\Table\AuthoritiesTable|\Cake\ORM\Association\BelongsTo $Authorities
 * @property \App\Model\Table\DocumentsTable|\Cake\ORM\Association\BelongsTo $Documents
 *
 * @method \App\Model\Entity\AuthoritiesDocument get($primaryKey, $options = [])
 * @method \App\Model\Entity\AuthoritiesDocument newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AuthoritiesDocument[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AuthoritiesDocument|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AuthoritiesDocument patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AuthoritiesDocument[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AuthoritiesDocument findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuthoritiesDocumentsTable extends Table
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

        $this->setTable('authorities_documents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Authorities', [
            'foreignKey' => 'authority_id'
        ]);
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
        $rules->add($rules->existsIn(['authority_id'], 'Authorities'));
        $rules->add($rules->existsIn(['document_id'], 'Documents'));

        return $rules;
    }
}
