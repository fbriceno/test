<?php

/**
 * Groups form base class.
 *
 * @method Groups getObject() Returns the current form's model object
 *
 * @package    facebook
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseGroupsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'gro_id2'           => new sfWidgetFormInputHidden(),
      'use_id'            => new sfWidgetFormInputText(),
      'gro_id'            => new sfWidgetFormInputText(),
      'gro_version'       => new sfWidgetFormInputText(),
      'gro_name'          => new sfWidgetFormInputText(),
      'gro_administrator' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'gro_id2'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getGroId2()), 'empty_value' => $this->getObject()->getGroId2(), 'required' => false)),
      'use_id'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'gro_id'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'gro_version'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'gro_name'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'gro_administrator' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('groups[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Groups';
  }


}
