<?php

/**
 * Likes form base class.
 *
 * @method Likes getObject() Returns the current form's model object
 *
 * @package    facebook
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLikesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'lik_id2'          => new sfWidgetFormInputHidden(),
      'use_id2'          => new sfWidgetFormPropelChoice(array('model' => 'Users', 'add_empty' => false)),
      'pag_id'           => new sfWidgetFormInputText(),
      'use_id'           => new sfWidgetFormInputText(),
      'lik_id'           => new sfWidgetFormInputText(),
      'con_id'           => new sfWidgetFormPropelChoice(array('model' => 'Concurso', 'add_empty' => false)),
      'lik_name'         => new sfWidgetFormInputText(),
      'lik_category'     => new sfWidgetFormInputText(),
      'lik_created_time' => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'lik_id2'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getLikId2()), 'empty_value' => $this->getObject()->getLikId2(), 'required' => false)),
      'use_id2'          => new sfValidatorPropelChoice(array('model' => 'Users', 'column' => 'use_id2')),
      'pag_id'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'use_id'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'lik_id'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'con_id'           => new sfValidatorPropelChoice(array('model' => 'Concurso', 'column' => 'con_id')),
      'lik_name'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'lik_category'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'lik_created_time' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('likes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Likes';
  }


}
