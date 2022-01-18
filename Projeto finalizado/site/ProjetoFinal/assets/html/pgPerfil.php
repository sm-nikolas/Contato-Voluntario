<!doctype html>
<html lang="pt-BR">

    <head>

		<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Contato voluntário - Perfil</title>

        <!-- CSS -->
		<link rel="stylesheet" href="../css/perfil.css">
		<link rel="stylesheet" href="../css/cssBtn.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="../img/icone.png">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		
		<script src="../js/edita.js"></script>
		<script>
			function somente_letras(){
				var sDigitos="abcdefghijklmnopqrstuvwyxzABCDEFGHIJKLMNOPQRSTUVWXYZãõñÃÕÑáéíóúÁÉÍÓÚêâôÂÊÔàè ÀÈ";
				var cTecla = event.key;
				if(sDigitos.indexOf(cTecla)==-1){
					return false;
				}else{
					return true;
				}
			}

			function somenteNumeros(){
				var sDigitos ="0123456789,.-()";
				var cTecla = event.key;
				if(sDigitos.indexOf(cTecla)==-1){
					return false;
				}else{
					return true;
				}
			}
		</script>
    </head>

    <body class="tela">
		<div>	
			<nav class="nav">
				<div class="container">
					<div class="logo">
						<a  href="../../../index.php"><img class="logoNav" src="../img/logoP.png"></a>
					</div>
					<div id="mainListDiv" class="main_list">
						<ul class="navlinks">
							<li><a href="#" data-bs-toggle="modal" data-bs-target="#teste"><i class="fas fa-user"></i></a></li>  
						</ul>
					</div>
					<span class="navTrigger">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</div>
			</nav>
		</div>

		<!-- Modal logout -->
		<div class="modal fade" id="teste" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header bg-dark">
						<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user icon"></i></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" id="xizinho2" aria-label="Close"></button>
						</div>
						<div class="container">
							<div class="row engloba">
								<div class="modal-body bg-light">
									<div class="col-sm-6 col-md-6 col-lg-6 engloba">
										<br>
										<a href="../../../login/logout.php"><button id="btnLogout" class="btn  btn-default"><i class="fas fa-door-open"></i><b> Logout</b></button></a>
									</div>
								</div>
							</div>
						</div>
						
						<div class="modal-footer bg-dark">
						<button type="button" id="btnFechaModal2" class="btn btn-default" data-bs-dismiss="modal"><b>Fechar</b></button>
					</div>
				</div>
			</div>
		</div>
		
		<br><br><br><br><br><br>
	

		<div class="container">
		<?php
					include 'conexao.php';
					$id = $_COOKIE["id"];
					
					$getRequests = mysqli_query($conexao,"SELECT * FROM usuario where id_usuario = '$id'");
		?>
			<div class="row">
				<h3 class="display-6">Perfil</h3>
				<div class="col-lg-4 foto">
					
				<?php
					
					while($aux = $getRequests->fetch_assoc()){
						echo "<img src='../../../login/imgCarregadas/".$aux['imagem']."' class='ftPerfil' <br>";
						echo "<p class='tInfoImg display-6'>".$aux['nome_usuario']."</p>";
					}
				?>	
				</div>
				<div class="col-lg-1">
					<br><br><br>
				</div>
					
				<div class="col-lg-7 foto">
					<div class="infos">
					<?php
						$getRequests = mysqli_query($conexao,"SELECT * FROM usuario where id_usuario = '$id'");

						while($aux = $getRequests->fetch_assoc()){
							if($aux['tipo_usuario']==2){

								echo "<p class='tInfo tituloPerf'>Informações da ONG</p> <p></p>";
								echo "<p class='tInfo display'>Nome</p>";
								echo "<p class='pInfo'>".$aux['nome_usuario']."</p>";
								$recebeRamo = mysqli_query($conexao,"SELECT * FROM ramo where id_usuario = '$id'");
								$row_recebeRamo   = mysqli_fetch_assoc($recebeRamo);
								echo "<p class='tInfo display'>Trabalho desejado</p>";
								echo "<p class='pInfo'> ".$row_recebeRamo["ramo"]."</p>";
							}else{
								echo "<p class='tInfo tituloPerf'>Informações Pessoais</p> <p></p>";
								echo "<p class='tInfo display'>Nome</p>";
								echo "<p class='pInfo'> ".$aux['nome_usuario']."</p>";
								echo "<p class='tInfo display'>CPF</p>";
								echo "<p class='pInfo'> ".$aux['cpf']."</p>";
								$recebeServico    = mysqli_query($conexao,"SELECT * FROM servico where id_usuario = '$id'");
								$row_recebeServ   = mysqli_fetch_assoc($recebeServico);
								echo "<p class='tInfo display'>Serviço</p>";
								echo "<p class='pInfo'> ".$row_recebeServ["servico"]."</p>";
							}
						
							echo "<hr class='linha'>";
							echo "<p class='tInfo tituloPerf'>Contatos</p> <p></p>";
							echo "<div class='row'>";
									echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
										echo "<p class='tInfo display'>E-mail</p>";
										echo "<p class='pInfo'> ".$aux['email']."</p>";
									echo "</div>";
									echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
										if($aux['telefone2']==""){
											echo "<p class='tInfo display'>Telefone</p>";
											echo "<p class='pInfo'> ".$aux['telefone1']."</p> <p>";
										}else{
											echo "<p class='tInfo display'>Telefones</p>";
											echo "<div class='row'>";
												echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
													echo "<p class='pInfo'> ".$aux['telefone1']."</p>";
												echo "</div>";
												echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
													echo "<p class='pInfo'> ".$aux['telefone2']."</p>";
												echo "</div>";
											echo "</div>";
										}
									echo "</div>";
								echo "</div>";
							echo "<hr class='linha'>";
							echo "<p class='tInfo tituloPerf'>Endereço</p> <p></p>";
							echo "<div class='row'>";
									echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
										echo "<p class='tInfo display'>CEP</p>";
										echo "<p class='pInfo' id='pegaCep'>".$aux['cep']."</p>";
									echo "</div>";
									
								
							
							function get_endereco($cep){
								$cep = preg_replace("/[^0-9]/", "", $cep);
								$url = "http://viacep.com.br/ws/$cep/xml/";

								$xml = simplexml_load_file($url);
								return $xml;
							}
							
							$endereco = get_endereco($aux['cep']);
								echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
									echo "<p class='tInfo display'>Rua</p>";
									echo "<p class='pInfo'> ". $endereco->logradouro."</p>";
								echo "</div>";
								echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
									echo "<p class='tInfo display'>Bairro</p>";
									echo "<p class='pInfo'> ". $endereco->bairro."</p>";
								echo "</div>";
								echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
									echo "<p class='tInfo display'>Cidade</p>";
									echo "<p class='pInfo'> ". $endereco->localidade."</p>";
								echo "</div>";
								if($aux['complemento']==""){
									echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
										echo "<p class='tInfo display'>Número</p>";
										echo "<p class='pInfo'> ".$aux['num_resid']."</p>";
									echo "</div>";
								}else{
									echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
										echo "<p class='tInfo display'>Número</p>";
										echo "<p class='pInfo'> ".$aux['num_resid']."</p>";
									echo "</div>";
									echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
										echo "<p class='tInfo display'>Complemento</p>";
										echo "<p class='pInfo'> ".$aux['complemento']."</p>";
									echo "</div>";
								}
							echo "</div>";
						}
					?>
					
						

					<!-- Modal de edição -->

					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-pencil-alt"></i> Editar informações</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form action="passaEdita.php" method="POST" enctype="multipart/form-data">
									<?php
										$getUser     = mysqli_query($conexao,"SELECT * FROM usuario where id_usuario = '$id'");	
										$arrayRecebe = mysqli_fetch_assoc($getUser);

										$getRamo = mysqli_query($conexao,"SELECT * FROM ramo where id_usuario = '$id'");
										$arrayRecebeRamo = mysqli_fetch_assoc($getRamo);

										$getServ = mysqli_query($conexao,"SELECT * FROM servico where id_usuario = '$id'");
										$arrayRecebeServ = mysqli_fetch_assoc($getServ);

									?>
									
									<div class="mb-3">
									<?php 
											$sql_busca_info = mysqli_query($conexao, "SELECT nome_usuario, cpf FROM usuario where id_usuario = '$id'");
											$array_busca = mysqli_fetch_array($sql_busca_info);

											$nome = $array_busca['nome_usuario'];
											$cpf = $array_busca['cpf'];

											echo "<label for='recipient-name' class='lead'>Nome</label>";
											echo "<input type='text' class='form-control' id='recipient-name' value='$nome' disabled>";
										
											if($arrayRecebe['tipo_usuario']==1){
												echo "<label for='recipient-name' class='lead'>CPF</label>";
										
												echo "<input type='text' class='form-control' value='$cpf' disabled>";
										
											}else if($arrayRecebe['tipo_usuario']==2){
											}
									?>
										
									</div>
									<div class="mb-3">
										<label for="recipient-name" class="lead">Trabalho desejado</label>
										<?php
											if($arrayRecebe['tipo_usuario']==1){
												echo "<select class='custom-select form-control' id='inputGroupSelect01' name='servico'>";
											}else if($arrayRecebe['tipo_usuario']==2){
												echo "<select class='custom-select form-control' id='inputGroupSelect01' name='ramo'>";
											}
										?>
											<option selected><?php

											if($arrayRecebe['tipo_usuario']==1){
												$sql_busca_serv = mysqli_query($conexao, "SELECT servico FROM servico where id_usuario = '$id'");
												$array_serv = mysqli_fetch_array($sql_busca_serv);

												$servico = $array_serv['servico'];
												echo $servico;
											}else if($arrayRecebe['tipo_usuario']==2){
												$sql_busca_ramo = mysqli_query($conexao, "SELECT ramo FROM ramo WHERE id_usuario='$id'");
												$array_ramo = mysqli_fetch_array($sql_busca_ramo);

												$ramo = $array_ramo['ramo'];
												echo $ramo;
											}

											?>
											</option>
											<option>Animador</option>
											<option>Arquiteto</option>
											<option>Artista plástico</option>
											<option>Biblioteconomista</option>
											<option>Cozinheiro</option>
											<option>Cientista da computação</option>
											<option>Cooperativista</option>
											<option>Cuidador</option>
											<option>Dentista</option>
											<option>Diarista</option>
											<option>Doador</option=>
											<option>Educador</option>
											<option>Educomunicador</option>
											<option>Eletricista</option>
											<option>Enfermeiro</option>
											<option>Fotógrafo</option>
											<option>Fisioterapeuta</option>
											<option>Gestor</option>
											<option>Jardineiro</option>
											<option>Marqueteiro</option>
											<option>Músico</option>
											<option>Nutricionista</option>
											<option>Pedagogo</option>
											<option>Pedreiro Geral</option>
											<option>Pedreiro Azuleijista</option>
											<option>Pedreiro de Acabamento</option>
											<option>Pedreiro de Alvenaria</option>
											<option>Pedreiro de OAC</option>
											<option>Pedreiro de Manutenção Geral</option>
											<option>Pintor</option>
											<option>Profissional em Educação Física</option>
											<option>Psicólogo</option>
											<option>Psiquiatra</option>
										</select>
									</div>
									<div class="mb-3">
										<label class="lead">E-mail</label>
										<input type="text" class="form-control" name="email" id="email" value=<?php echo $arrayRecebe['email'];?> onkeypress="return formata_email()" onblur="emailMask()" required>
										<p id="informaEmail" class="informa"></p>
										
										<?php 
											$sql_busca_tel = mysqli_query($conexao, "SELECT telefone1, telefone2 FROM usuario where id_usuario = '$id'");
											$array_tel = mysqli_fetch_array($sql_busca_tel);

											$tel1 = $array_tel['telefone1'];
											$tel2 = $array_tel['telefone2'];

											if($tel2 == ""){
										?>
												<label class='lead'>Telefone</label>
												<input type='tel' class='form-control' name='telefone1' id='tel1' onkeypress="$(this).mask('(99) 9 9999-9999');" onkeypress='return somenteNumeros();' maxlength='16' value='<?php echo $tel1 ?>' required>
												<label class='lead'>Telefone 2 </label>&nbsp&nbsp&nbsp <label class='lead'><small> (Não obrigatório) </small></label>
												<input type='tel' class='form-control' name='telefone2' id='tel2' onkeypress="$(this).mask('(99) 9 9999-9999');" onkeypress='return somenteNumeros();' maxlength='16' value='<?php echo $tel2 ?>'>
										<?php
											}else{
										?>
												<label class='lead'>Telefone 1</label>
												<input type='tel' class='form-control' name='telefone1' id='tel1' onkeypress="$(this).mask('(99) 9 9999-9999');" onkeypress='return somenteNumeros();' maxlength='16' value='<?php echo $tel1 ?>' required>
												<label class='lead'>Telefone 2 </label>&nbsp&nbsp&nbsp<label class='lead'><small> (Não obrigatório) </small></label>
												<input type='tel' class='form-control' name='telefone2' id='tel2' onkeypress="$(this).mask('(99) 9 9999-9999');" onkeypress='return somenteNumeros();' maxlength='16' value='<?php echo $tel2 ?>'>
										<?php
											}
										?>
										
									</div>
									<div class="mb-3">
											
										<div>
											<label class="lead">CEP</label>
											<input type="text" name="cep" id="cep" value=<?php echo $arrayRecebe['cep']?>  class="cad form-control" onkeypress="$(this).mask('99999-999');" onblur="pesquisacep(this.value);" required>
											<p id="informaCEP" class="informa"></p>
										</div>
										<div class="row">    
											<div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
												<label class="cep lead">Endereço</label>
												<input id="rua2" type="text" class="cad form-control" name="rua" required>
											</div>    
											<div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
												<label class="cep lead">Número</label>
												<input id="numeroResi" class="cad form-control" name="numeroResi" type="number" value="<?php echo $arrayRecebe['num_resid']?>" required>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">         
												<label class="cep lead">Bairro</label>
												<input id="bairro2" class="cad form-control" type="text" required/>
											</div>
											<div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
												<label class="cep lead">Cidade</label>
												<input id="cidade2" class="cad form-control" type="text" required/>
											</div>   
											<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
												<p class="cep2 lead text-center">Complemento</p>
												<input id="complemento" class="cad form-control" name="complemento" type="text"/>
											</div> 
										</div>
									</div>	

									<div class="row">
										<div class="mb-3">
											<p for="formFile" class="lead text-center">Alterar foto de perfil</p>
											<input class="form-control" accept="image/*" type="file" id="formFile" name="imagem">
										</div>
									</div>		
								
								
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<button type="submit" class="btn btn-primary">Salvar Alterações</button>
								</div>
								</div>
							</form>
						</div>
					</div>

					<!-- Modal exluir user -->
					
					<div class="modal fade" id="excluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title text-black" id="exampleModalLabel"><i class="fas fa-trash-alt" id="textExcluir"></i> Exclusão de conta</h5>
								<button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
							<br>
								<form method="POST" action="passaApagaUser.php">
									<input type="hidden" name="idUser" id="idUser" value=<?php $idRecebe = $_COOKIE["id"]; echo $idRecebe; ?>>
									<div class="mb-3">
										<p style="text-align: center; color: black;">Você tem certeza que deseja excluir sua conta?</p>
									</div>
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-dark text-white" data-bs-dismiss="modal">Não</button>
								<button type="submit" class="btn btn-danger text-white">Excluir</button>
								</form>
							</div>
							</div>
						</div>
					</div>
						<br><br>
						<div class="row centraliza">
							<div class="col-sm-6 col-md-6 col-lg-4">
								<button type="button" class="btn btn-light" id="btnEditar" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-pencil-alt"></i> Editar informações</button>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-5">
								<button type="button" class="btn btn-danger text-white" id="btnExclui" data-bs-toggle="modal" data-bs-target="#excluir"><i class="fas fa-trash-alt"></i> Excluir</button>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br><br><br><br>
			
		<div class="rodape" id="rodape">
			<br><br><br><br>
			<div class="container anime3">
				<div class="row">
					<div class="col-lg-7">
						<h2 class="display-6 trodape">Converse conosco</h2>
						<p class="txtRodape">Envie-nos um email através do formulário abaixo ou siga-nos nas nossas redes sociais.</p>
					</div>
					<br><br><br><br><br><br>
					<div class="col-lg-5">
						<h3 class="display-6 trodape">Redes sociais</h3>
						<div class="section-6-social">
							<a href="#"><i><a href="#"><i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="rgb(255,255,255)" class="bi bi-facebook" viewBox="0 0 16 16">
								<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
							</svg></i></a>
							<a href="#"><i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="rgb(255,255,255)" class="bi bi-twitter" viewBox="0 0 16 16">
								<path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
							  </svg></i></a>
							<a href="#"><i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="rgb(255,255,255)" class="bi bi-instagram" viewBox="0 0 16 16">
								<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
							  </svg></i></a>
							<a href="#"><i> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="rgb(255,255,255)" class="bi bi-whatsapp" viewBox="0 0 16 16">
								<path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
							</svg></i></a>
						</div>
					</div>
					<br><br><br>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h3 class="display-6 trodape">Por email</h2>
						<div class="">
							<form action="assets/contact.php" method="post">
								<div class="form-group orange-border">
									<label class="sr-only" for="contact-email">Email</label>
									<input type="text" name="email" placeholder="Email..."  class="form-control" id="exampleFormControlTextarea4-email">
								</div>
								<br>
								<div class="form-group orange-border">
									<label class="sr-only" for="contact-subject">Sujeito(a)</label>
									<input type="text" name="Sujeito(a)" placeholder="Sujeito(a)..." class="form-control" id="exampleFormControlTextarea4">
								</div>
								<br>
								<div class="form-group orange-border">
									<textarea  name="Menssagem" placeholder="Mensagem..." class="form-control" id="txtArea" rows="5"></textarea>
								  </div>
								<br><br>
								<button type="button" class="btn btn-warning" id="btnSM"><i class="fas fa-paper-plane"></i> Enviar mensagem</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<br><br><br><br><br>
		</div>
		<footer class="rodape2">
            &copy;Conecte 2021
        </footer>
	<!-- Jquery needed -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<!-- Function used to shrink nav bar removing paddings and adding black background -->
		<script>
			$(window).scroll(function() {
				if ($(document).scrollTop() > 50) {
					$('.nav').addClass('affix');
					console.log("OK");
				} else {
					$('.nav').removeClass('affix');
				}
			});
		</script>
    	
    	<!-- Javascript -->
		
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
		
        <script src="../js/scripts.js"></script>
	</body>
    
</html>