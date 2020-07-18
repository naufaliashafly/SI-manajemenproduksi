<body class="bg-gradient-success">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-6">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col m-auto">
								<div class="col mx-auto mt-4">
									<img src="assets/img/logo_frinsa.png" class="mx-auto d-block" style="height:150px" alt="Logo Frinsa">
								</div>
								<div class="col">
									<div class="p-5 mx-auto">
										<div class="text-center">
											<h1 class="h4 text-gray-900 mb-4">Silahkan login terlebih dahulu!</h1>
										</div>
										<?php if ($this->session->flashdata('status') == "gagal") { ?>
											<div class="alert alert-danger"><?php echo $this->session->flashdata('message') ?></div>
										<?php } ?>
										<?= $this->session->flashdata('message'); ?>
										<form class="user" method="post" action="<?= base_url('login/login'); ?>">
											<div class="form-group">
												<input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username">
											</div>
											<div class="form-group">
												<input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
											</div>
											<button type="submit" class="btn btn-success btn-user btn-block">
												Login
											</button>
											<!-- <a href="registrasi" class="btn btn-danger btn-user btn-block">
												Registrasi
											</a> -->
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>