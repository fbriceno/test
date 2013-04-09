<?php

/**
 * Statuses filter form base class.
 *
 * @package    facebook
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseStatusesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'use_id2'            => new sfWidgetFormFilterInput(),
      'sta_id'             => new sfWidgetFormFilterInput(),
      'sta_message'        => new sfWidgetFormFilterInput(),
      'sta_updated_time'   => new sfWidgetFormFilterInput(),
      'sta_like_count'     => new sfWidgetFormFilterInput(),
      'sta_comments_count' => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'use_id2'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sta_id'             => new sfValidatorPass(array('required' => false)),
      'sta_message'        => new sfValidatorPass(array('required' => false)),
      'sta_updated_time'   => new sfValidatorPass(array('required' => false)),
      'sta_like_count'     => new sfValidatorPass(array('required' => false)),
      'sta_comments_count' => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('statuses_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Statuses';
  }

  public function getFields()
  {
    return array(
      'sta_id2'            => 'Number',
      'use_id2'            => 'Number',
      'sta_id'             => 'Text',
      'sta_message'        => 'Text',
      'sta_updated_time'   => 'Text',
      'sta_like_count'     => 'Text',
      'sta_comments_count' => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
