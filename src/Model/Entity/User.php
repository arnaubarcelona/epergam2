<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $mail1
 * @property string $mail2
 * @property string $phone1
 * @property string $phone2
 * @property \Cake\I18n\FrozenDate $birth_date
 * @property int $group_id
 * @property int $subscription_state_id
 * @property string $photo
 * @property string $photo_dir
 * @property int $photo_size
 * @property string $photo_type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\SubscriptionState $subscription_state
 * @property \App\Model\Entity\Lending[] $lendings
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'mail1' => true,
        'mail2' => true,
        'phone1' => true,
        'phone2' => true,
        'birth_date' => true,
        'group_id' => true,
        'subscription_state_id' => true,
        'photo' => true,
        'photo_dir' => true,
        'photo_size' => true,
        'photo_type' => true,
        'created' => true,
        'modified' => true,
        'group' => true,
        'subscription_state' => true,
        'lendings' => true
    ];

	protected function _setPassword($value)
	{
	if (strlen($value)) {
	$hasher = new DefaultPasswordHasher();
	return $hasher->hash($value);
	}
	}
    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
