<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LendingPolicy Entity
 *
 * @property int $id
 * @property int $lending_max_days
 * @property int $lending_max_items
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Group[] $groups
 */
class LendingPolicy extends Entity
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
        'lending_max_days' => true,
        'lending_max_items' => true,
        'created' => true,
        'modified' => true,
        'groups' => true
    ];
}
