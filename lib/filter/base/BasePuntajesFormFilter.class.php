<?php

/**
 * Puntajes filter form base class.
 *
 * @package    facebook
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePuntajesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'pun_nombre' => new sfWidgetFormFilterInput(),
      'pun_valor'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'pun_nombre' => new sfValidatorPass(array('required' => false)),
      'pun_valor'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('puntajes_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Puntajes';
  }

  public function getFields()
  {
    return array(
      'pun_id'     => 'Number',
      'pun_nombre' => 'Text',
      'pun_valor'  => 'Number',
    );
  }
}
