<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Alaxos\Model\Entity\TimezonedTrait;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 */
class User extends Entity
{
	use TimezonedTrait;

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
