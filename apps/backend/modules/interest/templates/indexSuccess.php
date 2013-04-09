<?php use_helper('I18N', 'Date') ?>
<?php include_partial('interest/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Lista de Intsreses', array(), 'messages') ?></h1>
  <ul class="navList">
  <li><?php include_partial('interest/list_actions', array('helper' => $helper)) ?></li>
  <li><a href="javascript:void(0);" onclick="abrirventana('<?php echo url_for('interest'); ?>/buscar/',420,480)" title="Buscar" >Buscar</a></li>

    <li><?php echo link_to('Limpiar Busqueda', 'interest_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?></li>
  </ul>
  <?php include_partial('interest/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('interest/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php //include_partial('interest/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('interest_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('interest/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('interest/list_batch_actions', array('helper' => $helper)) ?>
      <?php //include_partial('interest/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('interest/list_footer', array('pager' => $pager)) ?>
  </div>
</div>