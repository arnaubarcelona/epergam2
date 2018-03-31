<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Authorities Model
 *
 * @property \App\Model\Table\AuthorsTable|\Cake\ORM\Association\BelongsTo $Authors
 * @property \App\Model\Table\AuthorTypesTable|\Cake\ORM\Association\BelongsTo $AuthorTypes
 * @property \App\Model\Table\DocumentsTable|\Cake\ORM\Association\BelongsToMany $Documents
 *
 * @method \App\Model\Entity\Authority get($primaryKey, $options = [])
 * @method \App\Model\Entity\Authority newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Authority[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Authority|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Authority patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Authority[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Authority findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuthoritiesTable extends Table
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

        $this->setTable('authorities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Authors', [
            'foreignKey' => 'author_id'
        ]);
        $this->belongsTo('AuthorTypes', [
            'foreignKey' => 'author_type_id'
        ]);
        $this->belongsToMany('Documents', [
            'foreignKey' => 'authority_id',
            'targetForeignKey' => 'document_id',
            'joinTable' => 'authorities_documents'
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
        $rules->add($rules->existsIn(['author_id'], 'Authors'));
        $rules->add($rules->existsIn(['author_type_id'], 'AuthorTypes'));

        return $rules;
    }
}
