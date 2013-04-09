<?php

/**
 * Interest filter form base class.
 *
 * @package    facebook
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseInterestFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'use_id'           => new sfWidgetFormFilterInput(),
      'int_id'           => new sfWidgetFormFilterInput(),
      'int_name'         => new sfWidgetFormFilterInput(),
      'int_category'     => new sfWidgetFormFilterInput(),
      'int_created_time' => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'use_id'           => new sfValidatorPass(array('required' => false)),
      'int_id'           => new sfValidatorPass(array('required' => false)),
      'int_name'         => new sfValidatorPass(array('required' => false)),
      'int_category'     => new sfValidatorPass(array('required' => false)),
      'int_created_time' => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('interest_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Interest';
  }

  public function getFields()
  {
    return array(
      'int_id2'          => 'Number',
      'use_id'           => 'Text',
      'int_id'           => 'Text',
      'int_name'         => 'Text',
      'int_category'     => 'Text',
      'int_created_time' => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
