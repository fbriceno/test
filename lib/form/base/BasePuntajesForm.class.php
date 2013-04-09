<?php

/**
 * Puntajes form base class.
 *
 * @method Puntajes getObject() Returns the current form's model object
 *
 * @package    facebook
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePuntajesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'pun_id'     => new sfWidgetFormInputHidden(),
      'pun_nombre' => new sfWidgetFormInputText(),
      'pun_valor'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'pun_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->getPunId()), 'empty_value' => $this->getObject()->getPunId(), 'required' => false)),
      'pun_nombre' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pun_valor'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('puntajes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Puntajes';
  }


}
