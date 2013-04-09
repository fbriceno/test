<ul class="sf_admin_actions">
<ul class="actionButtons">
<?php if ($form->isNew()): ?>
  <li><a title="Cancelar"  class="boton cancelar"  href="<?php echo url_for('@checkins') ?>">Cancelar</a></li>
  <li><?php //echo $helper->linkToList(array(  'label' => 'Cancelar',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?></li>
  <li><?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'Guardar',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?></li>
  <li><?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'label' => 'Guardar y crear',  'params' =>   array(  ),  'class_suffix' => 'save_and_add',)) ?></li>
<?php else: ?>
  <li><a title="Cancelar"  class="boton cancelar"  href="<?php echo url_for('@checkins') ?>">Cancelar</a></li>
  <li><?php //echo $helper->linkToList(array(  'label' => 'Cancelar',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?></li>
  <li><?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'Guardar',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?></li>
  <li><?php echo $helper->linkToDelete($form->getObject(), array(  'label' => 'Eliminar',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',)) ?></li>
<?php endif; ?>
</ul>
</ul>
