<?php

/**
 * Checkins filter form base class.
 *
 * @package    facebook
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCheckinsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'use_id2'         => new sfWidgetFormPropelChoice(array('model' => 'Users', 'add_empty' => true)),
      'use_id'          => new sfWidgetFormFilterInput(),
      'che_id'          => new sfWidgetFormFilterInput(),
      'con_id'          => new sfWidgetFormPropelChoice(array('model' => 'Concurso', 'add_empty' => true)),
      'che_name'        => new sfWidgetFormFilterInput(),
      'che_place'       => new sfWidgetFormFilterInput(),
      'che_message'     => new sfWidgetFormFilterInput(),
      'che_latitude'    => new sfWidgetFormFilterInput(),
      'che_longitude'   => new sfWidgetFormFilterInput(),
      'che_application' => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'use_id2'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Users', 'column' => 'use_id2')),
      'use_id'          => new sfValidatorPass(array('required' => false)),
      'che_id'          => new sfValidatorPass(array('required' => false)),
      'con_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Concurso', 'column' => 'con_id')),
      'che_name'        => new sfValidatorPass(array('required' => false)),
      'che_place'       => new sfValidatorPass(array('required' => false)),
      'che_message'     => new sfValidatorPass(array('required' => false)),
      'che_latitude'    => new sfValidatorPass(array('required' => false)),
      'che_longitude'   => new sfValidatorPass(array('required' => false)),
      'che_application' => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('checkins_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Checkins';
  }

  public function getFields()
  {
    return array(
      'che_id2'         => 'Number',
      'use_id2'         => 'ForeignKey',
      'use_id'          => 'Text',
      'che_id'          => 'Text',
      'con_id'          => 'ForeignKey',
      'che_name'        => 'Text',
      'che_place'       => 'Text',
      'che_message'     => 'Text',
      'che_latitude'    => 'Text',
      'che_longitude'   => 'Text',
      'che_application' => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
