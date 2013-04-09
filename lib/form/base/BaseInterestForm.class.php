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
      'use_id'           => new sfWidgetFormInputText(),
      'int_id'           => new sfWidgetFormInputText(),
      'int_name'         => new sfWidgetFormInputText(),
      'int_category'     => new sfWidgetFormInputText(),
      'int_created_time' => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'int_id2'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getIntId2()), 'empty_value' => $this->getObject()->getIntId2(), 'required' => false)),
      'use_id'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'int_id'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
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
