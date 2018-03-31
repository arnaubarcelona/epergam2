<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Authors Model
 *
 * @property \App\Model\Table\AuthoritiesTable|\Cake\ORM\Association\HasMany $Authorities
 *
 * @method \App\Model\Entity\Author get($primaryKey, $options = [])
 * @method \App\Model\Entity\Author newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Author[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Author|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Author patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Author[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Author findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuthorsTable extends Table
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

        $this->setTable('authors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Authorities', [
            'foreignKey' => 'author_id'
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
            ->maxLength('photo', 255)
            ->allowEmpty('photo');

        $validator
            ->maxLength('photo_dir', 255)
            ->allowEmpty('photo_dir');

        $validator
            ->integer('photo_size')
            ->allowEmpty('photo_size');

        $validator
            ->maxLength('photo_type', 255)
            ->allowEmpty('photo_type');

        return $validator;
    }
}
