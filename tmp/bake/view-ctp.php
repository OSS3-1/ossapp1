<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'] + $associations['HasOne'];
$associationFields = collection($fields)
    ->map(function($field) use ($immediateAssociations) {
        foreach ($immediateAssociations as $alias => $details) {
            if ($field === $details['foreignKey']) {
                return [$field => $details];
            }
        }
    })
    ->filter()
    ->reduce(function($fields, $value) {
        return $fields + $value;
    }, []);

$pk = "\$$singularVar->{$primaryKey[0]}";

$relations = $associations['HasMany'] + $associations['BelongsToMany'];

$hidden_fields = ['password', 'created', 'created_by', 'modified', 'modified_by'];
?>

<div class="<?= $pluralVar ?> view">
	<h2><CakePHPBakeOpenTagphp echo ___('<?= strtolower($singularHumanName) ?>'); CakePHPBakeCloseTag></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<CakePHPBakeOpenTagphp
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $<?= $singularVar ?>->id]);
		CakePHPBakeCloseTag>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
<?php
			foreach ($fields as $field) 
			{
			    if(isset($associationFields[$field]))
				{
					$isKey = false;
					if (!empty($associations['BelongsTo'])) {
						foreach ($associations['BelongsTo'] as $alias => $details) {
						
					        if(!in_array($details['alias'], ['Creator', 'Editor']))
					        {
							    if ($field === $details['foreignKey']) {
								    $isKey = true;
?>
				<dt><CakePHPBakeOpenTagphp echo __('<?= Inflector::humanize(Inflector::underscore($details['property'])) ?>'); CakePHPBakeCloseTag></dt>
				<dd>
					<CakePHPBakeOpenTagphp echo $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?>, ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['primaryKey'][0] ?>]) : '' CakePHPBakeCloseTag>
				</dd>
					
<?php
							        break;
							    }
							}
						}
					}
				}
				elseif(!in_array($field, $primaryKey) && !in_array($field, $hidden_fields))
				{
?>
				<dt><CakePHPBakeOpenTag= ___('<?= $field ?>'); CakePHPBakeCloseTag></dt>
				<dd>
					<CakePHPBakeOpenTagphp 
<?php
					$fieldData = $schema->column($field);
					
					if(in_array($fieldData['type'] , ['date', 'datetime']))
					{
?>
					echo h($<?= $singularVar ?>->to_display_timezone('<?= $field ?>'));
<?php
					}
					elseif(in_array($fieldData['type'] , ['boolean']))
					{
?>
					echo $this->AlaxosHtml->yesNo($<?= $singularVar ?>-><?= $field ?>);
<?php
					}
					else
					{
?>
					echo h($<?= $singularVar ?>-><?= $field ?>);
<?php
					}
?>
					CakePHPBakeCloseTag>
				</dd>
				
<?php
				}
			}
?>
			</dl>
			<CakePHPBakeOpenTagphp 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $<?= $singularVar ?>], ['plugin' => 'Alaxos']);
			CakePHPBakeCloseTag>
			<div>
			</div>
		</div>
	</div>
</div>
	
