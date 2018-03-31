<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AuthoritiesDocument Entity
 *
 * @property int $id
 * @property int $authority_id
 * @property int $document_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Authority $authority
 * @property \App\Model\Entity\Document $document
 */
class AuthoritiesDocument extends Entity
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
        'authority_id' => true,
        'document_id' => true,
        'created' => true,
        'modified' => true,
        'authority' => true,
        'document' => true
    ];
}
