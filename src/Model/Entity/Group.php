<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Group Entity
 *
 * @property int $id
 * @property string $name
 * @property $photo
 * @property string $photo_dir
 * @property int $photo_size
 * @property string $photo_type
 * @property int $lending_policy_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Document[] $documents
 * @property \App\Model\Entity\LendingPolicy[] $lending_policies
 * @property \App\Model\Entity\User[] $users
 */
class Group extends Entity
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
        'name' => true,
        'photo' => true,
        'photo_dir' => true,
        'photo_size' => true,
        'photo_type' => true,
        'lending_policy_id' => true,
        'created' => true,
        'modified' => true,
        'documents' => true,
        'lending_policies' => true,
        'users' => true
    ];
}
