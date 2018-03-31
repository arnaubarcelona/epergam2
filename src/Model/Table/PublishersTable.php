<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Publishers Model
 *
 * @property \App\Model\Table\DocumentsTable|\Cake\ORM\Association\BelongsToMany $Documents
 *
 * @method \App\Model\Entity\Publisher get($primaryKey, $options = [])
 * @method \App\Model\Entity\Publisher newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Publisher[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Publisher|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Publisher patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Publisher[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Publisher findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PublishersTable extends Table
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

        $this->setTable('publishers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Documents', [
            'foreignKey' => 'publisher_id',
            'targetForeignKey' => 'document_id',
            'joinTable' => 'documents_publishers'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmpty('name');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 255)
            ->requirePresence('photo', 'create')
            ->notEmpty('photo');

        $validator
            ->scalar('photo_dir')
            ->maxLength('photo_dir', 255)
            ->requirePresence('photo_dir', 'create')
            ->notEmpty('photo_dir');

        $validator
            ->integer('photo_size')
            ->requirePresence('photo_size', 'create')
            ->notEmpty('photo_size');

        $validator
            ->scalar('photo_type')
            ->maxLength('photo_type', 255)
            ->requirePresence('photo_type', 'create')
            ->notEmpty('photo_type');

        return $validator;
    }
}
