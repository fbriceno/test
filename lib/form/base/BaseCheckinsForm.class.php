<?php

/**
 * Checkins form base class.
 *
 * @method Checkins getObject() Returns the current form's model object
 *
 * @package    facebook
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCheckinsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'che_id2'         => new sfWidgetFormInputHidden(),
      'use_id2'         => new sfWidgetFormPropelChoice(array('model' => 'Users', 'add_empty' => false)),
      'use_id'          => new sfWidgetFormInputText(),
      'che_id'          => new sfWidgetFormInputText(),
      'con_id'          => new sfWidgetFormPropelChoice(array('model' => 'Concurso', 'add_empty' => false)),
      'che_name'        => new sfWidgetFormInputText(),
      'che_place'       => new sfWidgetFormInputText(),
      'che_message'     => new sfWidgetFormInputText(),
      'che_latitude'    => new sfWidgetFormInputText(),
      'che_longitude'   => new sfWidgetFormInputText(),
      'che_application' => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'che_id2'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getCheId2()), 'empty_value' => $this->getObject()->getCheId2(), 'required' => false)),
      'use_id2'         => new sfValidatorPropelChoice(array('model' => 'Users', 'column' => 'use_id2')),
      'use_id'          => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'che_id'          => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'con_id'          => new sfValidatorPropelChoice(array('model' => 'Concurso', 'column' => 'con_id')),
      'che_name'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'che_place'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'che_message'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'che_latitude'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'che_longitude'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'che_application' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('checkins[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Checkins';
  }


}
