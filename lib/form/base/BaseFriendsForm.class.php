<?php

/**
 * Friends form base class.
 *
 * @method Friends getObject() Returns the current form's model object
 *
 * @package    facebook
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseFriendsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fri_id2'         => new sfWidgetFormInputHidden(),
      'use_id2'         => new sfWidgetFormPropelChoice(array('model' => 'Users', 'add_empty' => false)),
      'use_id'          => new sfWidgetFormInputText(),
      'fri_id'          => new sfWidgetFormInputText(),
      'con_id'          => new sfWidgetFormPropelChoice(array('model' => 'Concurso', 'add_empty' => false)),
      'fri_name'        => new sfWidgetFormInputText(),
      'fri_first_name'  => new sfWidgetFormInputText(),
      'fri_middle_name' => new sfWidgetFormInputText(),
      'fri_last_name'   => new sfWidgetFormInputText(),
      'fri_gender'      => new sfWidgetFormInputText(),
      'fri_locale'      => new sfWidgetFormInputText(),
      'fri_link'        => new sfWidgetFormInputText(),
      'fri_birthday'    => new sfWidgetFormInputText(),
      'fri_email'       => new sfWidgetFormInputText(),
      'fri_location'    => new sfWidgetFormInputText(),
      'fri_website'     => new sfWidgetFormInputText(),
      'fri_invite'      => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'fri_id2'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getFriId2()), 'empty_value' => $this->getObject()->getFriId2(), 'required' => false)),
      'use_id2'         => new sfValidatorPropelChoice(array('model' => 'Users', 'column' => 'use_id2')),
      'use_id'          => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'fri_id'          => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'con_id'          => new sfValidatorPropelChoice(array('model' => 'Concurso', 'column' => 'con_id')),
      'fri_name'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fri_first_name'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fri_middle_name' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fri_last_name'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fri_gender'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fri_locale'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fri_link'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fri_birthday'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fri_email'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fri_location'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fri_website'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fri_invite'      => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('friends[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Friends';
  }


}
