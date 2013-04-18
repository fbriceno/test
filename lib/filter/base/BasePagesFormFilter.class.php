<?php

/**
 * Pages filter form base class.
 *
 * @package    facebook
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePagesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'use_id2'      => new sfWidgetFormPropelChoice(array('model' => 'Users', 'add_empty' => true)),
      'use_id'       => new sfWidgetFormFilterInput(),
      'pag_id'       => new sfWidgetFormFilterInput(),
      'con_id'       => new sfWidgetFormPropelChoice(array('model' => 'Concurso', 'add_empty' => true)),
      'pag_name'     => new sfWidgetFormFilterInput(),
      'pag_picture'  => new sfWidgetFormFilterInput(),
      'pag_link'     => new sfWidgetFormFilterInput(),
      'pag_category' => new sfWidgetFormFilterInput(),
      'pag_likes'    => new sfWidgetFormFilterInput(),
      'pag_website'  => new sfWidgetFormFilterInput(),
      'pag_founded'  => new sfWidgetFormFilterInput(),
      'pag_products' => new sfWidgetFormFilterInput(),
      'pag_checkins' => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'use_id2'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Users', 'column' => 'use_id2')),
      'use_id'       => new sfValidatorPass(array('required' => false)),
      'pag_id'       => new sfValidatorPass(array('required' => false)),
      'con_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Concurso', 'column' => 'con_id')),
      'pag_name'     => new sfValidatorPass(array('required' => false)),
      'pag_picture'  => new sfValidatorPass(array('required' => false)),
      'pag_link'     => new sfValidatorPass(array('required' => false)),
      'pag_category' => new sfValidatorPass(array('required' => false)),
      'pag_likes'    => new sfValidatorPass(array('required' => false)),
      'pag_website'  => new sfValidatorPass(array('required' => false)),
      'pag_founded'  => new sfValidatorPass(array('required' => false)),
      'pag_products' => new sfValidatorPass(array('required' => false)),
      'pag_checkins' => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('pages_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pages';
  }

  public function getFields()
  {
    return array(
      'pag_id2'      => 'Number',
      'use_id2'      => 'ForeignKey',
      'use_id'       => 'Text',
      'pag_id'       => 'Text',
      'con_id'       => 'ForeignKey',
      'pag_name'     => 'Text',
      'pag_picture'  => 'Text',
      'pag_link'     => 'Text',
      'pag_category' => 'Text',
      'pag_likes'    => 'Text',
      'pag_website'  => 'Text',
      'pag_founded'  => 'Text',
      'pag_products' => 'Text',
      'pag_checkins' => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
