<?php use_helper('I18N', 'Date') ?>
<?php include_partial('likes/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Lista de Me Gusta', array(), 'messages') ?></h1>
  <ul class="navList">
  <li><?php include_partial('likes/list_actions', array('helper' => $helper)) ?></li>
  <li><a href="javascript:void(0);" onclick="abrirventana('<?php echo url_for('likes'); ?>/buscar/',420,480)" title="Buscar" >Buscar</a></li>

    <li><?php echo link_to('Limpiar Busqueda', 'likes_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?></li>
  </ul>
  <?php include_partial('likes/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('likes/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php //include_partial('likes/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('likes_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('likes/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('likes/list_batch_actions', array('helper' => $helper)) ?>
      <?php //include_partial('likes/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('likes/list_footer', array('pager' => $pager)) ?>
  </div>
</div>