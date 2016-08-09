<?php
namespace App\Model\Table;

use App\Model\Entity\Image;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Images Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Jobs
 */
class ImagesTable extends Table
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

        $this->table('images');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Alaxos.UserLink');
        $this->addBehavior('Alaxos.Timezoned');

        $this->addBehavior('Proffer.Proffer', [
				    'photo' => [    // The name of your upload field
				        'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
				        'dir' => 'photo_dir',   // The name of the field to store the folder
				        'thumbnailSizes' => [ // Declare your thumbnails
				            'thumb' => [   // Define the prefix of your thumbnail
				                'w' => 200, // Width
				                'h' => 200, // Height
				                'fit' => true,
				                'jpeg_quality'  => 80
				            ],
				        ],
				        'thumbnailMethod' => 'gd'   // Options are Imagick or Gd
				    ]
				]);
				
			$this->belongsTo('Jobs', [
          'foreignKey' => 'job_id',
          'joinType' => 'INNER'
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
            ->requirePresence('photo', 'create')
            
						->allowEmpty('photo', 'update');


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
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));
        return $rules;
    }
}
