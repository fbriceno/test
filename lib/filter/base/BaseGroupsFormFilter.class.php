<?php

/**
 * Groups filter form base class.
 *
 * @package    facebook
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseGroupsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'use_id2'           => new sfWidgetFormPropelChoice(array('model' => 'Users', 'add_empty' => true)),
      'use_id'            => new sfWidgetFormFilterInput(),
      'gro_id'            => new sfWidgetFormFilterInput(),
      'con_id'            => new sfWidgetFormPropelChoice(array('model' => 'Concurso', 'add_empty' => true)),
      'gro_version'       => new sfWidgetFormFilterInput(),
      'gro_name'          => new sfWidgetFormFilterInput(),
      'gro_administrator' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'use_id2'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Users', 'column' => 'use_id2')),
      'use_id'            => new sfValidatorPass(array('required' => false)),
      'gro_id'            => new sfValidatorPass(array('required' => false)),
      'con_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Concurso', 'column' => 'con_id')),
      'gro_version'       => new sfValidatorPass(array('required' => false)),
      'gro_name'          => new sfValidatorPass(array('required' => false)),
      'gro_administrator' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('groups_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Groups';
  }

  public function getFields()
  {
    return array(
      'gro_id2'           => 'Number',
      'use_id2'           => 'ForeignKey',
      'use_id'            => 'Text',
      'gro_id'            => 'Text',
      'con_id'            => 'ForeignKey',
      'gro_version'       => 'Text',
      'gro_name'          => 'Text',
      'gro_administrator' => 'Text',
    );
  }
}
