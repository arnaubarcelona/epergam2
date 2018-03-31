<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubscriptionState Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $photo
 * @property string $photo_dir
 * @property int $photo_size
 * @property string $photo_type
 *
 * @property \App\Model\Entity\User[] $users
 */
class SubscriptionState extends Entity
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
        'created' => true,
        'modified' => true,
        'photo' => true,
        'photo_dir' => true,
        'photo_size' => true,
        'photo_type' => true,
        'users' => true
    ];
}
