<?php

/**
 * Likes filter form base class.
 *
 * @package    facebook
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLikesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'use_id2'          => new sfWidgetFormPropelChoice(array('model' => 'Users', 'add_empty' => true)),
      'pag_id'           => new sfWidgetFormFilterInput(),
      'use_id'           => new sfWidgetFormFilterInput(),
      'lik_id'           => new sfWidgetFormFilterInput(),
      'con_id'           => new sfWidgetFormPropelChoice(array('model' => 'Concurso', 'add_empty' => true)),
      'lik_name'         => new sfWidgetFormFilterInput(),
      'lik_category'     => new sfWidgetFormFilterInput(),
      'lik_created_time' => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'use_id2'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Users', 'column' => 'use_id2')),
      'pag_id'           => new sfValidatorPass(array('required' => false)),
      'use_id'           => new sfValidatorPass(array('required' => false)),
      'lik_id'           => new sfValidatorPass(array('required' => false)),
      'con_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Concurso', 'column' => 'con_id')),
      'lik_name'         => new sfValidatorPass(array('required' => false)),
      'lik_category'     => new sfValidatorPass(array('required' => false)),
      'lik_created_time' => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('likes_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Likes';
  }

  public function getFields()
  {
    return array(
      'lik_id2'          => 'Number',
      'use_id2'          => 'ForeignKey',
      'pag_id'           => 'Text',
      'use_id'           => 'Text',
      'lik_id'           => 'Text',
      'con_id'           => 'ForeignKey',
      'lik_name'         => 'Text',
      'lik_category'     => 'Text',
      'lik_created_time' => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
