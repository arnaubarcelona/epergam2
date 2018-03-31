<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuthorTypes Model
 *
 * @property \App\Model\Table\AuthoritiesTable|\Cake\ORM\Association\HasMany $Authorities
 *
 * @method \App\Model\Entity\AuthorType get($primaryKey, $options = [])
 * @method \App\Model\Entity\AuthorType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AuthorType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AuthorType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AuthorType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AuthorType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AuthorType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuthorTypesTable extends Table
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

        $this->setTable('author_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Authorities', [
            'foreignKey' => 'author_type_id'
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
            ->allowEmpty('photo');

        $validator
            ->scalar('photo_dir')
            ->maxLength('photo_dir', 255)
            ->allowEmpty('photo_dir');

        $validator
            ->integer('photo_size')
            ->allowEmpty('photo_size');

        $validator
            ->scalar('photo_type')
            ->maxLength('photo_type', 255)
            ->allowEmpty('photo_type');

        return $validator;
    }
}
