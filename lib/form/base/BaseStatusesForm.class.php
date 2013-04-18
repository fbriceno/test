<?php

/**
 * Statuses form base class.
 *
 * @method Statuses getObject() Returns the current form's model object
 *
 * @package    facebook
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseStatusesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'sta_id2'            => new sfWidgetFormInputHidden(),
      'use_id2'            => new sfWidgetFormPropelChoice(array('model' => 'Users', 'add_empty' => true)),
      'sta_id'             => new sfWidgetFormInputText(),
      'con_id'             => new sfWidgetFormPropelChoice(array('model' => 'Concurso', 'add_empty' => false)),
      'sta_message'        => new sfWidgetFormInputText(),
      'sta_updated_time'   => new sfWidgetFormInputText(),
      'sta_like_count'     => new sfWidgetFormInputText(),
      'sta_comments_count' => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'sta_id2'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getStaId2()), 'empty_value' => $this->getObject()->getStaId2(), 'required' => false)),
      'use_id2'            => new sfValidatorPropelChoice(array('model' => 'Users', 'column' => 'use_id2', 'required' => false)),
      'sta_id'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'con_id'             => new sfValidatorPropelChoice(array('model' => 'Concurso', 'column' => 'con_id')),
      'sta_message'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'sta_updated_time'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'sta_like_count'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'sta_comments_count' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('statuses[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Statuses';
  }


}
