<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Documents Model
 *
 * @property \App\Model\Table\CdusTable|\Cake\ORM\Association\BelongsTo $Cdus
 * @property \App\Model\Table\FormatsTable|\Cake\ORM\Association\BelongsTo $Formats
 * @property \App\Model\Table\CollectionsTable|\Cake\ORM\Association\BelongsTo $Collections
 * @property \App\Model\Table\PublicationPlacesTable|\Cake\ORM\Association\BelongsTo $PublicationPlaces
 * @property \App\Model\Table\LocationsTable|\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\CatalogueStatesTable|\Cake\ORM\Association\BelongsTo $CatalogueStates
 * @property \App\Model\Table\ConservationStatesTable|\Cake\ORM\Association\BelongsTo $ConservationStates
 * @property \App\Model\Table\LendingsTable|\Cake\ORM\Association\HasMany $Lendings
 * @property \App\Model\Table\AuthoritiesTable|\Cake\ORM\Association\BelongsToMany $Authorities
 * @property \App\Model\Table\LanguagesTable|\Cake\ORM\Association\BelongsToMany $Languages
 * @property \App\Model\Table\LevelsTable|\Cake\ORM\Association\BelongsToMany $Levels
 * @property \App\Model\Table\PublishersTable|\Cake\ORM\Association\BelongsToMany $Publishers
 * @property \App\Model\Table\SubjectsTable|\Cake\ORM\Association\BelongsToMany $Subjects
 *
 * @method \App\Model\Entity\Document get($primaryKey, $options = [])
 * @method \App\Model\Entity\Document newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Document[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Document|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Document patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Document[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Document findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DocumentsTable extends Table
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

        $this->setTable('documents');
        $this->setDisplayField('fullname');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$randstr=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
		$this->addBehavior('Josegonzalez/Upload.Upload', [
            'photo' => [
				'path' => 'webroot{DS}img{DS}{model}{DS}' . $randstr,
                'fields' => [
                    'dir' => 'photo_dir',
                    'size' => 'photo_size',
                    'type' => 'photo_type'
                ],
                'nameCallback' => function ($table, $entity, $data, $field, $settings) {
                    return strtolower($data['name']);
                },
                'transformer' =>  function ($table, $entity, $data, $field, $settings) {
                    $extension = pathinfo($data['name'], PATHINFO_EXTENSION);

                    // Store the thumbnail in a temporary file
                    $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                    // Use the Imagine library to DO THE THING
                    $size = new \Imagine\Image\Box(256, 256);
                    $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                    $imagine = new \Imagine\Gd\Imagine();

                    // Save that modified file to our temp file
                    $imagine->open($data['tmp_name'])
                        ->thumbnail($size, $mode)
                        ->save($tmp);

                    // Now return the original *and* the thumbnail
                    return [
                        $data['tmp_name'] => $data['name'],
                        $tmp => 'thumbnail-' . $data['name'],
                    ];
                },
                'deleteCallback' => function ($path, $entity, $field, $settings) {
                    // When deleting the entity, both the original and the thumbnail will be removed
                    // when keepFilesOnDelete is set to false
                    return [
                        $path . $entity->{$field},
                        $path . 'thumbnail-' . $entity->{$field}
                    ];
                },
                'keepFilesOnDelete' => false
            ]
        ]);
        $this->hasMany('Documents', [
            'foreignKey' => 'catalogue_state_id'
        ]);
        $this->belongsTo('Cdus', [
            'foreignKey' => 'cdu_id'
        ]);
        $this->belongsTo('Formats', [
            'foreignKey' => 'format_id'
        ]);
        $this->belongsTo('Collections', [
            'foreignKey' => 'collection_id'
        ]);
        $this->belongsTo('PublicationPlaces', [
            'foreignKey' => 'publication_place_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('CatalogueStates', [
            'foreignKey' => 'catalogue_state_id'
        ]);
        $this->belongsTo('ConservationStates', [
            'foreignKey' => 'conservation_state_id'
        ]);
        $this->belongsTo('LendingStates', [
            'foreignKey' => 'lending_state_id'
        ]);
        $this->hasMany('Lendings', [
            'foreignKey' => 'document_id'
        ]);
        $this->belongsToMany('Authorities', [
            'foreignKey' => 'document_id',
            'targetForeignKey' => 'authority_id',
            'joinTable' => 'authorities_documents'
        ]);
        $this->belongsToMany('Languages', [
            'foreignKey' => 'document_id',
            'targetForeignKey' => 'language_id',
            'joinTable' => 'documents_languages'
        ]);
        $this->belongsToMany('Levels', [
            'foreignKey' => 'document_id',
            'targetForeignKey' => 'level_id',
            'joinTable' => 'documents_levels'
        ]);
        $this->belongsToMany('Publishers', [
            'foreignKey' => 'document_id',
            'targetForeignKey' => 'publisher_id',
            'joinTable' => 'documents_publishers'
        ]);
        $this->belongsToMany('Subjects', [
            'foreignKey' => 'document_id',
            'targetForeignKey' => 'subject_id',
            'joinTable' => 'documents_subjects'
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
            ->notEmpty('name');

        $validator
            ->scalar('isbn')
            ->maxLength('isbn', 20)
            ->allowEmpty('isbn');

        $validator
            ->integer('collection_item')
            ->allowEmpty('collection_item');

        $validator
            ->integer('edition_date')
            ->allowEmpty('edition_date');

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

        $validator
            ->scalar('abstract')
            ->allowEmpty('abstract');

        $validator
            ->scalar('notes')
            ->allowEmpty('notes');

        $validator
            ->scalar('url')
            ->maxLength('url', 2083)
            ->allowEmpty('url');

        $validator
            ->integer('height')
            ->allowEmpty('height');

        $validator
            ->integer('width')
            ->allowEmpty('width');

        $validator
            ->integer('volume')
            ->allowEmpty('volume');

        $validator
            ->integer('pagecount')
            ->allowEmpty('pagecount');

        $validator
            ->integer('length')
            ->allowEmpty('length');

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
        $rules->add($rules->existsIn(['cdu_id'], 'Cdus'));
        $rules->add($rules->existsIn(['format_id'], 'Formats'));
        $rules->add($rules->existsIn(['collection_id'], 'Collections'));
        $rules->add($rules->existsIn(['publication_place_id'], 'PublicationPlaces'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['catalogue_state_id'], 'CatalogueStates'));
        $rules->add($rules->existsIn(['conservation_state_id'], 'ConservationStates'));        
        $rules->add($rules->existsIn(['lending_state_id'], 'LendingStates'));

        return $rules;
    }
}
