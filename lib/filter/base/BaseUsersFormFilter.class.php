<?php

/**
 * Users filter form base class.
 *
 * @package    facebook
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseUsersFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'use_id'          => new sfWidgetFormFilterInput(),
      'con_id'          => new sfWidgetFormPropelChoice(array('model' => 'Concurso', 'add_empty' => true)),
      'use_name'        => new sfWidgetFormFilterInput(),
      'use_first_name'  => new sfWidgetFormFilterInput(),
      'use_middle_name' => new sfWidgetFormFilterInput(),
      'use_last_name'   => new sfWidgetFormFilterInput(),
      'use_gender'      => new sfWidgetFormFilterInput(),
      'use_locale'      => new sfWidgetFormFilterInput(),
      'use_link'        => new sfWidgetFormFilterInput(),
      'use_birthday'    => new sfWidgetFormFilterInput(),
      'use_email'       => new sfWidgetFormFilterInput(),
      'use_location'    => new sfWidgetFormFilterInput(),
      'use_website'     => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'use_id'          => new sfValidatorPass(array('required' => false)),
      'con_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Concurso', 'column' => 'con_id')),
      'use_name'        => new sfValidatorPass(array('required' => false)),
      'use_first_name'  => new sfValidatorPass(array('required' => false)),
      'use_middle_name' => new sfValidatorPass(array('required' => false)),
      'use_last_name'   => new sfValidatorPass(array('required' => false)),
      'use_gender'      => new sfValidatorPass(array('required' => false)),
      'use_locale'      => new sfValidatorPass(array('required' => false)),
      'use_link'        => new sfValidatorPass(array('required' => false)),
      'use_birthday'    => new sfValidatorPass(array('required' => false)),
      'use_email'       => new sfValidatorPass(array('required' => false)),
      'use_location'    => new sfValidatorPass(array('required' => false)),
      'use_website'     => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('users_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Users';
  }

  public function getFields()
  {
    return array(
      'use_id2'         => 'Number',
      'use_id'          => 'Text',
      'con_id'          => 'ForeignKey',
      'use_name'        => 'Text',
      'use_first_name'  => 'Text',
      'use_middle_name' => 'Text',
      'use_last_name'   => 'Text',
      'use_gender'      => 'Text',
      'use_locale'      => 'Text',
      'use_link'        => 'Text',
      'use_birthday'    => 'Text',
      'use_email'       => 'Text',
      'use_location'    => 'Text',
      'use_website'     => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
