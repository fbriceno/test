<?php

/**
 * Interest form base class.
 *
 * @method Interest getObject() Returns the current form's model object
 *
 * @package    facebook
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseInterestForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'int_id2'          => new sfWidgetFormInputHidden(),
      'use_id2'          => new sfWidgetFormPropelChoice(array('model' => 'Users', 'add_empty' => false)),
      'use_id'           => new sfWidgetFormInputText(),
      'int_id'           => new sfWidgetFormInputText(),
      'con_id'           => new sfWidgetFormPropelChoice(array('model' => 'Concurso', 'add_empty' => false)),
      'int_name'         => new sfWidgetFormInputText(),
      'int_category'     => new sfWidgetFormInputText(),
      'int_created_time' => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'int_id2'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getIntId2()), 'empty_value' => $this->getObject()->getIntId2(), 'required' => false)),
      'use_id2'          => new sfValidatorPropelChoice(array('model' => 'Users', 'column' => 'use_id2')),
      'use_id'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'int_id'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'con_id'           => new sfValidatorPropelChoice(array('model' => 'Concurso', 'column' => 'con_id')),
      'int_name'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'int_category'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'int_created_time' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('interest[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Interest';
  }


}
