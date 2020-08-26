<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="#">AMID</a>

		<?php 
    $name=$this->session->userdata('name');
    if(isset($name)){ ?>
		<p class="navbar-brand-p">Usuario: <?php echo $this->session->userdata('name');?> </p>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
			aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>inicio/main">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>inicio/perfil">Perfil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>inicio/reportes">Reportes</a>
				</li>
				<li class="nav-item">
					<a class="bt btn btn-danger" href="<?php echo base_url();?>inicio">Cerrar sesión</a></button>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
