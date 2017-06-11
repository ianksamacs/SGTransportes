		
		<form id="formulario" action="Acoes/efetuarCadastro.php" method="POST" enctype="multipart/form-data">
	
			NOME 				<input id="Nome" 	type="text" 	name="nome" 	placeholder="Informe seu nome" type="texto" /></BR></BR>
			CPF 				<input id="CPF" 	type="Number" 	name="cpf" 		placeholder="Informe seu CPF aqui" /></BR></BR>
			E-mail				<input id="Email" 	type="text" 	name="email" 	placeholder="Informe seu E-mail aqui" /></BR></BR>
			Senha 				<input id="Senha" 	type="text" 	name="senha" 	placeholder="Informe uma senha aqui" /></BR></BR>
			Bairro 				<input id="End_Br" 	type="text" 	name="bairro" 		placeholder="Informe seu bairro aqui" /></BR></BR>
			Rua 				<input id="End_Rua" type="text" 	name="rua" 	placeholder="Informe sua rua aqui" /></BR></BR>
			Nº 					<input id="End_Num" type="text" 	name="numero" 		placeholder="Informe o número aqui" /></BR></BR>
			Semestre Entrada 	
				<select name="sem_en">
					<option value="2010.1">2010.1</option>
					<option value="2010.2">2010.2</option>
					<option value="2011.1">2011.1</option>
					<option value="2011.2">2011.2</option>
					<option value="2012.1">2012.1</option>
					<option value="2012.2">2012.2</option>
					<option value="2013.1">2013.1</option>
					<option value="2013.2">2013.2</option>
					<option value="2014.1">2014.1</option>
					<option value="2014.2">2014.2</option>
					<option value="2015.1">2015.1</option>
					<option value="2015.2">2015.2</option>
					<option value="2016.1">2016.1</option>
					<option value="2016.2">2016.2</option>
					<option value="2017.1">2017.1</option>
					<option value="2017.2">2017.2</option>
				</select> </BR></BR>
			
			Semestre Atual 	
				<select name="sem_at">
					<option value="1º">1º</option>
					<option value="2º">2º</option>
					<option value="3º">3º</option>
					<option value="4º">4º</option>
					<option value="5º">5º</option>
					<option value="6º">6º</option>
					<option value="7º">7º</option>
					<option value="8º">8º</option>
					<option value="9º">9º</option>
					<option value="10º">10º</option>
					<option value="11º">11º</option>
					<option value="12º">12º</option>
					<option value="13º">13º</option>
					<option value="14º">14º</option>
					<option value="15º">15º</option>
					<option value="16º">16º</option>
					<option value="17º">17º</option>
					<option value="18º">18º</option>
					<option value="19º">19º</option>
					<option value="20º">20º</option>
				</select> </BR></BR>
				
			Selecionar Curso
			<select name="id_cur">
					<option value="1">Engenharia de Computação</option>
			</select></BR></BR>
			
			Foto      						<input type="file" name="Arquivo_Foto" id="Arquivo_Foto"></BR></BR> 
			Comprovante de Residência       <input type="file" name="Arquivo_Res"  id="Arquivo_Res"></BR></BR> 
			Guia de Matricula      			<input type="file" name="Arquivo_Mat"  id="Arquivo_Mat"></BR></BR> 

					
			<input type="submit" name="cadastrar" value="Cadastrar">
		</form>

		
  

