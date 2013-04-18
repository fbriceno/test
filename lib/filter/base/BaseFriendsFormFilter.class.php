<?php

/**
 * Friends filter form base class.
 *
 * @package    facebook
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseFriendsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'use_id2'         => new sfWidgetFormPropelChoice(array('model' => 'Users', 'add_empty' => true)),
      'use_id'          => new sfWidgetFormFilterInput(),
      'fri_id'          => new sfWidgetFormFilterInput(),
      'con_id'          => new sfWidgetFormPropelChoice(array('model' => 'Concurso', 'add_empty' => true)),
      'fri_name'        => new sfWidgetFormFilterInput(),
      'fri_first_name'  => new sfWidgetFormFilterInput(),
      'fri_middle_name' => new sfWidgetFormFilterInput(),
      'fri_last_name'   => new sfWidgetFormFilterInput(),
      'fri_gender'      => new sfWidgetFormFilterInput(),
      'fri_locale'      => new sfWidgetFormFilterInput(),
      'fri_link'        => new sfWidgetFormFilterInput(),
      'fri_birthday'    => new sfWidgetFormFilterInput(),
      'fri_email'       => new sfWidgetFormFilterInput(),
      'fri_location'    => new sfWidgetFormFilterInput(),
      'fri_website'     => new sfWidgetFormFilterInput(),
      'fri_invite'      => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'use_id2'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Users', 'column' => 'use_id2')),
      'use_id'          => new sfValidatorPass(array('required' => false)),
      'fri_id'          => new sfValidatorPass(array('required' => false)),
      'con_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Concurso', 'column' => 'con_id')),
      'fri_name'        => new sfValidatorPass(array('required' => false)),
      'fri_first_name'  => new sfValidatorPass(array('required' => false)),
      'fri_middle_name' => new sfValidatorPass(array('required' => false)),
      'fri_last_name'   => new sfValidatorPass(array('required' => false)),
      'fri_gender'      => new sfValidatorPass(array('required' => false)),
      'fri_locale'      => new sfValidatorPass(array('required' => false)),
      'fri_link'        => new sfValidatorPass(array('required' => false)),
      'fri_birthday'    => new sfValidatorPass(array('required' => false)),
      'fri_email'       => new sfValidatorPass(array('required' => false)),
      'fri_location'    => new sfValidatorPass(array('required' => false)),
      'fri_website'     => new sfValidatorPass(array('required' => false)),
      'fri_invite'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('friends_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Friends';
  }

  public function getFields()
  {
    return array(
      'fri_id2'         => 'Number',
      'use_id2'         => 'ForeignKey',
      'use_id'          => 'Text',
      'fri_id'          => 'Text',
      'con_id'          => 'ForeignKey',
      'fri_name'        => 'Text',
      'fri_first_name'  => 'Text',
      'fri_middle_name' => 'Text',
      'fri_last_name'   => 'Text',
      'fri_gender'      => 'Text',
      'fri_locale'      => 'Text',
      'fri_link'        => 'Text',
      'fri_birthday'    => 'Text',
      'fri_email'       => 'Text',
      'fri_location'    => 'Text',
      'fri_website'     => 'Text',
      'fri_invite'      => 'Number',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
