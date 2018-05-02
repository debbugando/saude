<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">    
    <?php echo $this->Html->link( $descricaoApp, ['controller' =>'Uploads', 'action' => 'index'], ['class' => 'navbar-brand']); ?>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">            
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Uploads">
              <a class="nav-link" href="<?php echo $this->Url->build(["controller" => "Uploads", "action" => "index"]); ?>">
                <i class="fa fa-fw fa-file"></i>
                <span class="nav-link-text">Uploads</span>
              </a>
            </li>
            <?php if($authUser): ?>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Usuários">
                <a class="nav-link" href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index"]); ?>">
                  <i class="fa fa-fw fa-user"></i>
                  <span class="nav-link-text">Usuários</span>
                </a>
              </li>            
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Perfil">
                <a class="nav-link" href="<?php echo $this->Url->build(["controller" => "Roles", "action" => "index"]); ?>">
                  <i class="fa fa-fw fa-id-card"></i>
                  <span class="nav-link-text">Perfil</span>
                </a>
              </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Categorias">
                <a class="nav-link" href="<?php echo $this->Url->build(["controller" => "Categories", "action" => "index"]); ?>">
                  <i class="fa fa-fw fa-sitemap"></i>
                  <span class="nav-link-text">Categorias</span>
                </a>
              </li>              
              <?php if($authUser['role']==1): ?>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Logs">
                <a class="nav-link" href="<?php echo $this->Url->build(["controller" => "Logs", "action" => "index"]); ?>">
                  <i class="fa fa-fw fa-gears"></i>
                  <span class="nav-link-text">Logs</span>
                </a>
              </li>
            <?php endif; ?>
          <?php endif; ?>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
            <?php 
            if(!$authUser):
                echo $this->Html->link('Login', ['controller' => 'users', 'action' =>'login']);
            else:
                echo $this->Html->link(
                    'Logout',
                    ['controller' => 'Users', 'action' => 'logout'],
                    ['confirm' => 'Deseja Sair?']
                );
                
            endif;
            ?>
            </li>
        </ul>
    </div>
</nav>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Deseja Sair?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <?php echo $this->Html->link('Confirmar', ['controller' => 'users', 'action' =>'logout'], ['class' => 'btn btn-primary']);?>
      </div>
    </div>
  </div>
</div>