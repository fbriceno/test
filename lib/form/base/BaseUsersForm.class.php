<?php

/**
 * Users form base class.
 *
 * @method Users getObject() Returns the current form's model object
 *
 * @package    facebook
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseUsersForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'use_id2'         => new sfWidgetFormInputHidden(),
      'use_id'          => new sfWidgetFormInputText(),
      'use_name'        => new sfWidgetFormInputText(),
      'use_first_name'  => new sfWidgetFormInputText(),
      'use_middle_name' => new sfWidgetFormInputText(),
      'use_last_name'   => new sfWidgetFormInputText(),
      'use_gender'      => new sfWidgetFormInputText(),
      'use_locale'      => new sfWidgetFormInputText(),
      'use_link'        => new sfWidgetFormInputText(),
      'use_birthday'    => new sfWidgetFormInputText(),
      'use_email'       => new sfWidgetFormInputText(),
      'use_location'    => new sfWidgetFormInputText(),
      'use_website'     => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'use_id2'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getUseId2()), 'empty_value' => $this->getObject()->getUseId2(), 'required' => false)),
      'use_id'          => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'use_name'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'use_first_name'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'use_middle_name' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'use_last_name'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'use_gender'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'use_locale'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'use_link'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'use_birthday'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'use_email'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'use_location'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'use_website'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Users';
  }


}
