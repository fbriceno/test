<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />
    <meta name="description" content="Administrador facebook" />
    
	<title>Buscar users</title>
    
  
    <link href="<?php echo url_for('@homepage'); ?>../admin/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo url_for('@homepage'); ?>../admin/css/filtros.css" rel="stylesheet" type="text/css" />
	<link type="text/css" href="<?php echo url_for('@homepage'); ?>../admin/css/ui-lightness/jquery-ui-1.7.3.custom.css" rel="stylesheet" />	
	<script type="text/javascript" src="<?php echo url_for('@homepage'); ?>../admin/js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="<?php echo url_for('@homepage'); ?>../admin/js/jquery-ui-1.7.3.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo url_for('@homepage'); ?>../admin/js/jquery.ui.datepicker-es.js"></script>
	</head>
<body>
<h4>Buscar users</h4>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div class="sf_admin_filter">
  <?php if ($form->hasGlobalErrors()): ?>
    <?php echo $form->renderGlobalErrors() ?>
  <?php endif; ?>
  <form onsubmit="if (!opener.closed) {
if (opener.name) {this.target=opener.name;}
else {
    this.target = opener.name ='popupWindow';
}}" action="<?php echo url_for('users_collection', array('action' => 'filter')) ?>" method="post">
    <table cellspacing="0">
      <tfoot>
        <tr>
          <td colspan="2">
            <?php echo $form->renderHiddenFields() ?>
            <?php /*echo link_to('Resetear', 'users_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post'))*/ ?>
            <input type="submit" value="<?php echo 'Buscar'; ?>" />
            <a class="boton cancelar" href="<?php echo url_for('users/index'); ?>" onclick ="javascript:window.close();" >Cerrar</a></ul>          </td>
        </tr>
      </tfoot>
      <tbody>
	  
 		<?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?>
        <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>                                                                                                                
          <?php include_partial('users/filters_field', array(
            'name'       => $name,
            'attributes' => $field->getConfig('attributes', array()),
            'label'      => $field->getConfig('label'),
            'help'       => $field->getConfig('help'),
            'form'       => $form,
            'field'      => $field,
            'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name,
          )) ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </form>
</div>
</body>
</html>
