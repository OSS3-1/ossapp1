<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Dealerships
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('username');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->belongsTo('Dealerships', [
            'foreignKey' => 'dealership_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('Jobs', [
            'foreignKey' => 'user_id'
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
			return $validator
				->notEmpty('username', 'A username is required')
				
				->requirePresence('password')
        ->notEmpty('password','Please enter Password')
        ->add('confirm_password', [
	            'compare' => [
	            'rule' => ['compareWith','password'],
	            'message' => 'Confirm Password does not match with Password.'
	            ]])
	            ->requirePresence('confirm_password')
	            ->notEmpty('confirm_password','Please enter Confirm Password')
	            
	      ->requirePresence('email')
        ->notEmpty('email','Please enter email')
        ->add('email', 'validFormat', [
			        'rule' => 'email',
			        'message' => 'E-mail must be valid'
				])
        ->add('confirm_email', [
	            'compare' => [
	            'rule' => ['compareWith','email'],
	            'message' => 'Confirm email does not match with Email.'
	            ]])
	            ->requirePresence('confirm_email')
	            ->notEmpty('confirm_email','Please enter Confirm Email')
	            
				->notEmpty('role', 'A role is required')
				->add('role', 'inList', [
				    'rule' => ['inList', ['admin', 'requester','employee']],
				    'message' => 'Please enter a valid role'
				]);
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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['dealership_id'], 'Dealerships'));
        return $rules;
    }
}
