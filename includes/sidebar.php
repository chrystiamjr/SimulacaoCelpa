<!-- Sidebar -->
	<div class="sidebar">
		<div class="sidebar-dropdown"><a href="#">Navigation</a></div>
		<div class="sidebar-inner">
			<!-- <div style="margin-bottom: -12px;">&nbsp;</div> -->
			<!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
			<ul class="navi">
				<!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->

				<li class="nred current"><a href="/SimulacaoCelpa/view/Dashboard/dash.php"><i class="fa fa-desktop"></i> Tela inicial</a></li>

				<!-- Menu with sub menu -->
				<li class="has_submenu nlightblue">
					<a href="#">
						<!-- Menu name with icon -->
						<i class="fa fa-th"></i> Cadastro 
						<!-- Icon for dropdown -->
						<span class="pull-right"><i class="fa fa-angle-right"></i></span>
					</a>
					<ul>
						<li><a href="/SimulacaoCelpa/view/Atividades/cadastroAtividade.php"><i class="fa fa-asterisk" aria-hidden="true"></i>  Atividades</a></li> 
						<li><a href="/SimulacaoCelpa/view/Colaborador/cadastroColaborador.php"><i class="fa fa-asterisk" aria-hidden="true"></i>  Colaboradores</a></li>
						<li><a href="/SimulacaoCelpa/view/Equipamentos/cadastroEquipamento.php"><i class="fa fa-asterisk" aria-hidden="true"></i>  Equipamentos</a></li> 
						<li><a href="/SimulacaoCelpa/view/Equipe/cadastroEquipe.php"><i class="fa fa-asterisk" aria-hidden="true"></i>  Equipes</a></li>
						<li><a href="/SimulacaoCelpa/view/Instalacoes/cadastroInstalacao.php"><i class="fa fa-asterisk" aria-hidden="true"></i>  Instalações</a></li> 
						<li><a href="/SimulacaoCelpa/view/Obras/cadastroObra.php"><i class="fa fa-asterisk" aria-hidden="true"></i>  Obras</a></li> 
<!--						<li><a href="widgets1.html"><i class="fa fa-asterisk" aria-hidden="true"></i>  Regional</a></li> -->
						<li><a href="/SimulacaoCelpa/view/Usuario/cadastroUsuario.php"><i class="fa fa-asterisk" aria-hidden="true"></i>  Usuários</a></li>
						<li><a href="/SimulacaoCelpa/view/Veiculos/cadastroVeiculo.php"><i class="fa fa-asterisk" aria-hidden="true"></i> Veículos</a></li> 
					</ul>
				</li>

				<li class="has_submenu nviolet">
					<a href="#">
						<!-- Menu name with icon -->
						<i class="fa fa-sitemap"></i> Relacionamento
						<!-- Icon for dropdown -->
						<span class="pull-right"><i class="fa fa-angle-right"></i></span>
					</a>
					<ul>
						<li><a href="/SimulacaoCelpa/view/Colaborador/relacionamentoColaboradorEquipe.php"><i class="fa fa-asterisk" aria-hidden="true"></i>  Colaboradores e Equipes</a></li>
						<li><a href="/SimulacaoCelpa/view/Colaborador/relacionamentoColaboradorEquipamento.php"><i class="fa fa-asterisk" aria-hidden="true"></i>  Colaboradores e Equipamentos</a></li>
						<li><a href="/SimulacaoCelpa/view/Equipe/relacionamentoEquipeEquipamento.php"><i class="fa fa-asterisk" aria-hidden="true"></i>  Equipes e Equipamentos</a></li>
					</ul>
				</li>

			</ul>
			<!--/ Sidebar navigation -->

			<!-- Date -->
			<div class="sidebar-widget">
				<div id="todaydate"></div>
			</div>
		</div>
	</div>
<!-- Sidebar ends -->