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
      'con_id'     => new sfWidgetFormPropelChoice(array('model' => 'Concurso', 'add_empty' => true)),
      'pun_nombre' => new sfWidgetFormFilterInput(),
      'pun_valor'  => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'con_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Concurso', 'column' => 'con_id')),
      'pun_nombre' => new sfValidatorPass(array('required' => false)),
      'pun_valor'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
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
      'con_id'     => 'ForeignKey',
      'pun_nombre' => 'Text',
      'pun_valor'  => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
