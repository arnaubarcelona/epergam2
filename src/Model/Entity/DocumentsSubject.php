<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentsSubject Entity
 *
 * @property int $id
 * @property int $document_id
 * @property int $subject_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Document $document
 * @property \App\Model\Entity\Subject $subject
 */
class DocumentsSubject extends Entity
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
        'document_id' => true,
        'subject_id' => true,
        'created' => true,
        'modified' => true,
        'document' => true,
        'subject' => true
    ];
}
