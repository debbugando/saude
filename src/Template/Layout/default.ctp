<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $descricaoApp ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- Bootstrap core CSS-->
    <?= $this->Html->css('bootstrap.min.css') ?>
    <!-- Custom fonts for this template-->
    <?= $this->Html->css('font-awesome.min.css') ?>
    <!-- Page level plugin CSS-->
    <?= $this->Html->css('dataTables.bootstrap4.css') ?>
    <!-- Custom styles for this template-->
    <?= $this->Html->css('sb-admin.css') ?>
    <!-- Custom style -->
    <?= $this->Html->css('custom_style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <?php echo $this->element('navbar');?>    
    <div class="content-wrapper">         
        <div class="container-fluid">
            <!-- Breadcrumbs-->            
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <?php echo $this->Html->link( $descricaoApp, ['controller' =>'Uploads', 'action' => 'index']); ?>
                </li>
                <li class="breadcrumb-item active"><?= $this->fetch('title') ?></li>                
            </ol>            
            <?= $this->Flash->render() ?>
            <div class="container-fluid clearfix">
                <?= $this->fetch('content') ?>
            </div>
        </div>        
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->        
        <footer class="sticky-footer">
          <div class="container-fluid">
            <div class="text-center">
              <small>Copyright © Leandro Viturino 2018</small>
            </div>
          </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fa fa-angle-up"></i>
        </a>        
    <!-- Bootstrap core JavaScript-->
    <?= $this->Html->script('jquery.min') ?>
    <?= $this->Html->script('bootstrap.bundle.min') ?>
    <!-- Core plugin JavaScript-->
    <?= $this->Html->script('jquery.easing.min') ?>
    <!-- Page level plugin JavaScript-->
    <?= $this->Html->script('jquery.dataTables') ?>
    <?= $this->Html->script('Chart.min') ?>
    <?= $this->Html->script('dataTables.bootstrap4') ?>
    <!-- Custom scripts for all pages-->
    <?= $this->Html->script('sb-admin.min') ?>
  </div>  
</body>

</html>
