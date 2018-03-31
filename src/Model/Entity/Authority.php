<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Authority Entity
 *
 * @property int $id
 * @property int $author_id
 * @property int $author_type_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Author $author
 * @property \App\Model\Entity\AuthorType $author_type
 * @property \App\Model\Entity\Document[] $documents
 */
class Authority extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'author_id' => true,
        'author_type_id' => true,
        'created' => true,
        'modified' => true,
        'author' => true,
        'author_type' => true,
        'documents' => true
    ];
}
