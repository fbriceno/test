<?php

/**
 * Pages form base class.
 *
 * @method Pages getObject() Returns the current form's model object
 *
 * @package    facebook
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePagesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'pag_id2'      => new sfWidgetFormInputHidden(),
      'use_id2'      => new sfWidgetFormPropelChoice(array('model' => 'Users', 'add_empty' => false)),
      'use_id'       => new sfWidgetFormInputText(),
      'pag_id'       => new sfWidgetFormInputText(),
      'con_id'       => new sfWidgetFormPropelChoice(array('model' => 'Concurso', 'add_empty' => false)),
      'pag_name'     => new sfWidgetFormInputText(),
      'pag_picture'  => new sfWidgetFormInputText(),
      'pag_link'     => new sfWidgetFormInputText(),
      'pag_category' => new sfWidgetFormInputText(),
      'pag_likes'    => new sfWidgetFormInputText(),
      'pag_website'  => new sfWidgetFormInputText(),
      'pag_founded'  => new sfWidgetFormInputText(),
      'pag_products' => new sfWidgetFormInputText(),
      'pag_checkins' => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'pag_id2'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getPagId2()), 'empty_value' => $this->getObject()->getPagId2(), 'required' => false)),
      'use_id2'      => new sfValidatorPropelChoice(array('model' => 'Users', 'column' => 'use_id2')),
      'use_id'       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'pag_id'       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'con_id'       => new sfValidatorPropelChoice(array('model' => 'Concurso', 'column' => 'con_id')),
      'pag_name'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pag_picture'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pag_link'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pag_category' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pag_likes'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pag_website'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pag_founded'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pag_products' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pag_checkins' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pages[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pages';
  }


}
