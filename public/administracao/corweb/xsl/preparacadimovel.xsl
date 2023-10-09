<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:variable name="URL">/corweb/</xsl:variable>
	<xsl:output method="html"/>
	<xsl:decimal-format name="pt-br" decimal-separator="," grouping-separator="." minus-sign="-" percent="%" /> 
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:template name="proprietario">	
		<xsl:element name="div">
			<xsl:attribute name="id">divProp</xsl:attribute>
			<xsl:attribute name="class">divProp</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divTitPro</xsl:attribute>
				<xsl:attribute name="class">divTit</xsl:attribute>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitPro</xsl:attribute>
					<xsl:attribute name="class">spanTit spanTitPro</xsl:attribute>
					<xsl:attribute name="style">float: left;</xsl:attribute>
					Identifica&#231;&#227;o
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitFecharPro</xsl:attribute>
					<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
					<xsl:element name="img">
						<xsl:attribute name="id">imgFecharPro</xsl:attribute>
						<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
						<xsl:attribute name="onmouseout">CADASTRO.proprietario.mouseout();</xsl:attribute>
						<xsl:attribute name="onmouseover">CADASTRO.proprietario.mouseover();</xsl:attribute>
						<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/fechar.gif</xsl:attribute>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divProQ</xsl:attribute>
				<xsl:element name="table">
					<xsl:attribute name="id">tabelaProp</xsl:attribute>
					<xsl:attribute name="border">0</xsl:attribute>
					<xsl:attribute name="name">tabelaProp</xsl:attribute>
					<xsl:element name="thead">
						<xsl:element name="td"><xsl:attribute name="colspan">10</xsl:attribute>&#160;</xsl:element>
					</xsl:element>
					<xsl:element name="tbody">
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="class">tdLabel</xsl:attribute>
								<xsl:attribute name="colspan">1</xsl:attribute>
								<xsl:element name="img">
									<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
									<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
								</xsl:element>
								<xsl:element name="label">
									<xsl:attribute name="id">labelNomePro</xsl:attribute>
									<xsl:attribute name="class">labelNome</xsl:attribute>
									<xsl:attribute name="for">txtNomePro</xsl:attribute>
									Nome:
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">4</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">txtNomePro</xsl:attribute>
									<xsl:attribute name="class">txtNome</xsl:attribute>
									<xsl:attribute name="maxlength">60</xsl:attribute>
									<xsl:attribute name="name">txtNomePro</xsl:attribute>
									<xsl:attribute name="size">50</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdLabel</xsl:attribute>
								<xsl:attribute name="colspan">1</xsl:attribute>
								<xsl:element name="label">
									<xsl:attribute name="id">labelCpf</xsl:attribute>
									<xsl:attribute name="class">labelCpf</xsl:attribute>
									<xsl:attribute name="for">txtCpf</xsl:attribute>
									CPF/CNPJ:
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">2</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">txtCpf</xsl:attribute>
									<xsl:attribute name="class">txtCpf</xsl:attribute>
									<xsl:attribute name="maxlength">20</xsl:attribute>
									<xsl:attribute name="name">txtCpf</xsl:attribute>
									<xsl:attribute name="size">17</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="class">tdLabel</xsl:attribute>
								<xsl:attribute name="colspan">1</xsl:attribute>
								<xsl:element name="img">
									<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
									<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
								</xsl:element>
								<xsl:element name="label">
									<xsl:attribute name="id">labelEmailPro</xsl:attribute>
									<xsl:attribute name="class">labelEmail</xsl:attribute>
									<xsl:attribute name="for">txtEmailPro</xsl:attribute>
									Email:
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">4</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">txtEmailPro</xsl:attribute>
									<xsl:attribute name="class">txtEmail</xsl:attribute>
									<xsl:attribute name="maxlength">60</xsl:attribute>
									<xsl:attribute name="name">txtEmailPro</xsl:attribute>
									<xsl:attribute name="size">40</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdLabel</xsl:attribute>
								<xsl:attribute name="colspan">1</xsl:attribute>
								<xsl:element name="img">
									<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
									<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
								</xsl:element>
								<xsl:element name="label">
									<xsl:attribute name="id">labelTelPro</xsl:attribute>
									<xsl:attribute name="class">labelTelPro</xsl:attribute>
									<xsl:attribute name="for">txtTelefonePro</xsl:attribute>
									Telefone:
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">2</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">txtTelefonePro</xsl:attribute>
									<xsl:attribute name="class">txtTelefone</xsl:attribute>
									<xsl:attribute name="maxlength">16</xsl:attribute>
									<xsl:attribute name="name">txtTelefonePro</xsl:attribute>
									<xsl:attribute name="size">16</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="class">tdLabel</xsl:attribute>
								<xsl:attribute name="colspan">1</xsl:attribute>
								<xsl:element name="label">
									<xsl:attribute name="id">labelUF</xsl:attribute>
									<xsl:attribute name="class">labelUF</xsl:attribute>
									<xsl:attribute name="for">cboUF</xsl:attribute>
									Estado:
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="id">tdUF</xsl:attribute>
								<xsl:attribute name="colspan">1</xsl:attribute>
								<xsl:element name="select">
									<xsl:attribute name="id">cboUF</xsl:attribute>
									<xsl:attribute name="name">cboUF</xsl:attribute>
									<xsl:element name="option">
										<xsl:attribute name="value">SP</xsl:attribute>
										SP
									</xsl:element>
								</xsl:element>
								<xsl:element name="span">
									<xsl:attribute name="id">spanCarregaUF</xsl:attribute>
									<xsl:attribute name="class">carrega spanCarregaUF</xsl:attribute>
									<xsl:attribute name="style">display: inline;</xsl:attribute>
									<xsl:element name="img">
										<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
										&#160;
									</xsl:element>
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdLabel</xsl:attribute>
								<xsl:attribute name="colspan">1</xsl:attribute>
								<xsl:element name="label">
									<xsl:attribute name="id">labelCidade</xsl:attribute>
									<xsl:attribute name="class">labelCidade</xsl:attribute>
									<xsl:attribute name="for">cboCidade</xsl:attribute>
									Cidade:
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="id">tdCid</xsl:attribute>
								<xsl:attribute name="colspan">5</xsl:attribute>
								<xsl:element name="select">
									<xsl:attribute name="id">cboCidade</xsl:attribute>
									<xsl:attribute name="name">cboCidade</xsl:attribute>
									<xsl:element name="option">
										<xsl:attribute name="value">SBC</xsl:attribute>
										S&#227;o Bernardo do Campo
									</xsl:element>
								</xsl:element>
								<xsl:element name="span">
									<xsl:attribute name="id">spanCarregaCidade</xsl:attribute>
									<xsl:attribute name="class">carrega spanCarregaCidade</xsl:attribute>
									<xsl:attribute name="style">display: inline;</xsl:attribute>
									<xsl:element name="img">
										<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
										&#160;
									</xsl:element>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="class">tdLabel</xsl:attribute>
								<xsl:attribute name="colspan">1</xsl:attribute>
								<xsl:element name="label">
									<xsl:attribute name="id">labelEnd</xsl:attribute>
									<xsl:attribute name="class">labelEnd</xsl:attribute>
									<xsl:attribute name="for">txtEnd</xsl:attribute>
									Endere&#231;o:
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">4</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">txtEnd</xsl:attribute>
									<xsl:attribute name="class">txtEnd</xsl:attribute>
									<xsl:attribute name="maxlength">120</xsl:attribute>
									<xsl:attribute name="name">txtEnd</xsl:attribute>
									<xsl:attribute name="size">50</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdLabel</xsl:attribute>
								<xsl:attribute name="colspan">1</xsl:attribute>
								<xsl:element name="label">
									<xsl:attribute name="id">labelNum</xsl:attribute>
									<xsl:attribute name="class">labelNum</xsl:attribute>
									<xsl:attribute name="for">txtNum</xsl:attribute>
									N&#250;mero:
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">2</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">txtNum</xsl:attribute>
									<xsl:attribute name="class">txtNum</xsl:attribute>
									<xsl:attribute name="maxlength">10</xsl:attribute>
									<xsl:attribute name="name">txtNum</xsl:attribute>
									<xsl:attribute name="size">10</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="class">tdLabel</xsl:attribute>
								<xsl:attribute name="colspan">1</xsl:attribute>
								<xsl:element name="label">
									<xsl:attribute name="id">labelCompl</xsl:attribute>
									<xsl:attribute name="class">labelCompl</xsl:attribute>
									<xsl:attribute name="for">txtCompl</xsl:attribute>
									Compl.:
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">2</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">txtCompl</xsl:attribute>
									<xsl:attribute name="class">txtCompl</xsl:attribute>
									<xsl:attribute name="maxlength">40</xsl:attribute>
									<xsl:attribute name="name">txtCompl</xsl:attribute>
									<xsl:attribute name="size">20</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdLabel</xsl:attribute>
								<xsl:attribute name="colspan">1</xsl:attribute>
								<xsl:element name="label">
									<xsl:attribute name="id">labelBairro</xsl:attribute>
									<xsl:attribute name="class">labelBairro</xsl:attribute>
									<xsl:attribute name="for">txtBairro</xsl:attribute>
									Bairro:
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">2</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">txtBairro</xsl:attribute>
									<xsl:attribute name="class">txtBairro</xsl:attribute>
									<xsl:attribute name="maxlength">40</xsl:attribute>
									<xsl:attribute name="name">txtBairro</xsl:attribute>
									<xsl:attribute name="size">15</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdLabel</xsl:attribute>
								<xsl:attribute name="colspan">1</xsl:attribute>
								<xsl:element name="label">
									<xsl:attribute name="id">labelCep</xsl:attribute>
									<xsl:attribute name="class">labelCep</xsl:attribute>
									<xsl:attribute name="for">txtCep</xsl:attribute>
									Cep:
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">1</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">txtCep</xsl:attribute>
									<xsl:attribute name="class">txtCep</xsl:attribute>
									<xsl:attribute name="maxlength">15</xsl:attribute>
									<xsl:attribute name="name">txtCep</xsl:attribute>
									<xsl:attribute name="size">12</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tfoot">
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="align">center</xsl:attribute>
								<xsl:attribute name="colspan">8</xsl:attribute>
								<xsl:attribute name="style">padding: 5px;</xsl:attribute>
								<xsl:element name="img">
									<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
									<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
								</xsl:element>
								Indica preenchimento Obrigat&#243;rio
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="align">center</xsl:attribute>
								<xsl:attribute name="colspan">8</xsl:attribute>
								<xsl:attribute name="style">padding: 5px;</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">cmdEnviaPro</xsl:attribute>
									<xsl:attribute name="class">cmdEnvia</xsl:attribute>
									<xsl:attribute name="type">button</xsl:attribute>
									<xsl:attribute name="value">Enviar</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="id">tdMensPro</xsl:attribute>
								<xsl:attribute name="align">center</xsl:attribute>
								<xsl:attribute name="colspan">8</xsl:attribute>
								<xsl:attribute name="style">padding: 5px; color: red;</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="localizacao">
		<xsl:element name="div">
			<xsl:attribute name="id">divCadImovel1</xsl:attribute>
			<xsl:attribute name="class">panelContentCadImovel</xsl:attribute>
			<xsl:element name="table">
				<xsl:attribute name="id">tabelaCadImo1</xsl:attribute>
				<xsl:attribute name="border">0</xsl:attribute>
				<xsl:attribute name="cellpadding">0</xsl:attribute>
				<xsl:attribute name="cellspacing">0</xsl:attribute>
				<xsl:attribute name="name">tabelaCadImo1</xsl:attribute>
				<xsl:element name="thead">
					<xsl:element name="td"><xsl:attribute name="colspan">10</xsl:attribute>&#160;</xsl:element>
				</xsl:element>
				<xsl:element name="tbody">
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoTipo</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">cboImoTipo</xsl:attribute>
								Tipo:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="id">tdImoTipo</xsl:attribute>
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="select">
								<xsl:attribute name="id">cboImoTipo</xsl:attribute>
								<xsl:attribute name="name">cboImoTipo</xsl:attribute>
								<xsl:element name="option">
									<xsl:attribute name="value">AP</xsl:attribute>
									Apartamento
								</xsl:element>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanCarregaImoTipo</xsl:attribute>
								<xsl:attribute name="class">carrega spanCarregaImoTipo</xsl:attribute>
								<xsl:attribute name="style">display: inline;</xsl:attribute>
								<xsl:element name="img">
									<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
								</xsl:element>
								&#160;
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoCtr</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">cboImoCtr</xsl:attribute>
								Contrato:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="id">tdCtr</xsl:attribute>
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="select">
								<xsl:attribute name="id">cboImoCtr</xsl:attribute>
								<xsl:attribute name="name">cboImoCtr</xsl:attribute>
								<xsl:element name="option">
									<xsl:attribute name="value">1</xsl:attribute>
									Venda
								</xsl:element>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanCarregaImoCtr</xsl:attribute>
								<xsl:attribute name="class">carrega spanCarregaImoCtr</xsl:attribute>
								<xsl:attribute name="style">display: inline;</xsl:attribute>
								<xsl:element name="img">
									<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
								</xsl:element>
								&#160;
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">&#160;</xsl:element>
						<xsl:element name="td">&#160;</xsl:element>
						<xsl:element name="td">&#160;</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoUF</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">cboImoUF</xsl:attribute>
								UF:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="id">tdImoUF</xsl:attribute>
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="select">
								<xsl:attribute name="id">cboImoUF</xsl:attribute>
								<xsl:attribute name="name">cboImoUF</xsl:attribute>
								<xsl:element name="option">
									<xsl:attribute name="value">SP</xsl:attribute>
									SP
								</xsl:element>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanCarregaImoUF</xsl:attribute>
								<xsl:attribute name="class">carrega spanCarregaTipoImovel</xsl:attribute>
								<xsl:attribute name="style">display: inline;</xsl:attribute>
								<xsl:element name="img">
									<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
									&#160;
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoCid</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">cboImoCid</xsl:attribute>
								Cidade:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="id">tdImoCid</xsl:attribute>
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="select">
								<xsl:attribute name="id">cboImoCid</xsl:attribute>
								<xsl:attribute name="name">cboImoCid</xsl:attribute>
								<xsl:element name="option">
									<xsl:attribute name="value">1</xsl:attribute>
									S&#227;o Bernardo do Campo
								</xsl:element>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanCarregaImoCid</xsl:attribute>
								<xsl:attribute name="class">carrega spanCarregaImoCid</xsl:attribute>
								<xsl:attribute name="style">display: inline;</xsl:attribute>
								<xsl:element name="img">
									<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
									&#160;
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoBai</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">txtImoBai</xsl:attribute>
								Bairro:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoBai</xsl:attribute>
								<xsl:attribute name="class">txtImoBai</xsl:attribute>
								<xsl:attribute name="maxlength">40</xsl:attribute>
								<xsl:attribute name="name">txtImoBai</xsl:attribute>
								<xsl:attribute name="size">20</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoEnd</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoEnd</xsl:attribute>
								Endere&#231;o:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">8</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoEnd</xsl:attribute>
								<xsl:attribute name="class">txtImoEnd</xsl:attribute>
								<xsl:attribute name="maxlength">120</xsl:attribute>
								<xsl:attribute name="name">txtImoEnd</xsl:attribute>
								<xsl:attribute name="size">80</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoNum</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoNum</xsl:attribute>
								N&#250;mero:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoNum</xsl:attribute>
								<xsl:attribute name="class">txtImoNum</xsl:attribute>
								<xsl:attribute name="maxlength">20</xsl:attribute>
								<xsl:attribute name="name">txtImoNum</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoAPT</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoAPT</xsl:attribute>
								Apto:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoAPT</xsl:attribute>
								<xsl:attribute name="class">txtImoAPT</xsl:attribute>
								<xsl:attribute name="maxlength">20</xsl:attribute>
								<xsl:attribute name="name">txtImoAPT</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoBLC</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoBLC</xsl:attribute>
								Bloco:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoBLC</xsl:attribute>
								<xsl:attribute name="class">txtImoBLC</xsl:attribute>
								<xsl:attribute name="maxlength">20</xsl:attribute>
								<xsl:attribute name="name">txtImoBLC</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoCep</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoCep</xsl:attribute>
								Cep:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoCep</xsl:attribute>
								<xsl:attribute name="class">txtImoCep</xsl:attribute>
								<xsl:attribute name="maxlength">15</xsl:attribute>
								<xsl:attribute name="name">txtImoCep</xsl:attribute>
								<xsl:attribute name="size">15</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">&#160;</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoPtoRef</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoPtoRef</xsl:attribute>
								Pto. Ref.:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">8</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoPtoRef</xsl:attribute>
								<xsl:attribute name="class">txtImoPtoRef</xsl:attribute>
								<xsl:attribute name="maxlength">240</xsl:attribute>
								<xsl:attribute name="name">txtImoPtoRef</xsl:attribute>
								<xsl:attribute name="size">80</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoObsLocal</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoObsLocal</xsl:attribute>
								Obs. Local:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">7</xsl:attribute>
							<xsl:element name="textarea">
								<xsl:attribute name="id">txtImoObsLocal</xsl:attribute>
								<xsl:attribute name="class">txtImoObsLocal</xsl:attribute>
								<xsl:attribute name="cols">80</xsl:attribute>
								<xsl:attribute name="name">txtImoObsLocal</xsl:attribute>
								<xsl:attribute name="rows">2</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">&#160;</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoPAD</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">cboImoPAD</xsl:attribute>
								Pad. Constr.:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="id">tdImoPAD</xsl:attribute>
							<xsl:element name="select">
								<xsl:attribute name="id">cboImoPAD</xsl:attribute>
								<xsl:attribute name="name">cboImoPAD</xsl:attribute>
								<xsl:element name="option">
									<xsl:attribute name="value">1</xsl:attribute>
									Popular
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoFin</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">cboImoFin</xsl:attribute>
								Finalidade:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="id">tdImoPAD</xsl:attribute>
							<xsl:element name="select">
								<xsl:attribute name="id">cboImoFin</xsl:attribute>
								<xsl:attribute name="name">cboImoFin</xsl:attribute>
								<xsl:element name="option">
									<xsl:attribute name="value">1</xsl:attribute>
									Residencial
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">2</xsl:attribute>
									Comercial
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">3</xsl:attribute>
									Estabelecimento
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">4</xsl:attribute>
									Res/Com&#160;
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">&#160;</xsl:element>
						<xsl:element name="td">&#160;</xsl:element>
						<xsl:element name="td">&#160;</xsl:element>
						<xsl:element name="td">&#160;</xsl:element>
						<xsl:element name="td">&#160;</xsl:element>
					</xsl:element>
				</xsl:element>
				<xsl:element name="tfoot">
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="align">center</xsl:attribute>
							<xsl:attribute name="colspan">9</xsl:attribute>
							<xsl:attribute name="style">padding: 5px;</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							Indica preenchimento Obrigat&#243;rio
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="align">right</xsl:attribute>
							<xsl:attribute name="colspan">9</xsl:attribute>
							<xsl:attribute name="style">padding: 5px;</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">cmdMostraDet</xsl:attribute>
								<xsl:attribute name="class">cmdEnvia</xsl:attribute>
								<xsl:attribute name="onclick">CADASTRO.showTab(0,1);</xsl:attribute>
								<xsl:attribute name="type">button</xsl:attribute>
								<xsl:attribute name="value">Pr&#243;ximo</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="id">tdMensImoLoc</xsl:attribute>
							<xsl:attribute name="align">center</xsl:attribute>
							<xsl:attribute name="colspan">9</xsl:attribute>
							<xsl:attribute name="style">padding: 5px; color: red;</xsl:attribute>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="descricao">
		<xsl:element name="div">
			<xsl:attribute name="id">divCadImovel2</xsl:attribute>
			<xsl:attribute name="class">panelContentCadImovel</xsl:attribute>
			<xsl:element name="table">
				<xsl:attribute name="id">tabelaCadImo2</xsl:attribute>
				<xsl:attribute name="border">0</xsl:attribute>
				<xsl:attribute name="cellpadding">0</xsl:attribute>
				<xsl:attribute name="cellspacing">0</xsl:attribute>
				<xsl:attribute name="name">tabelaCadImo2</xsl:attribute>
				<xsl:element name="thead">
					<xsl:element name="td">&#160;</xsl:element>
				</xsl:element>
				<xsl:element name="tbody">
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoDOR</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoDOR</xsl:attribute>
								Dormit&#243;rios:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoDOR</xsl:attribute>
								<xsl:attribute name="class">txtImoDOR</xsl:attribute>
								<xsl:attribute name="maxlength">10</xsl:attribute>
								<xsl:attribute name="name">txtImoDOR</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoDOR');</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
								<xsl:attribute name="value">0</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoDOP</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoDOP</xsl:attribute>
								Su&#237;tes:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoDOP</xsl:attribute>
								<xsl:attribute name="class">txtImoDOP</xsl:attribute>
								<xsl:attribute name="maxlength">10</xsl:attribute>
								<xsl:attribute name="name">txtImoDOP</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoDOP');</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
								<xsl:attribute name="value">0</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoDORObs</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoDORObs</xsl:attribute>
								Obs:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">5</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoDORObs</xsl:attribute>
								<xsl:attribute name="class">txtImoDORObs</xsl:attribute>
								<xsl:attribute name="maxlength">60</xsl:attribute>
								<xsl:attribute name="name">txtImoDORObs</xsl:attribute>
								<xsl:attribute name="size">40</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoGAR</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoGAR</xsl:attribute>
								Garagens:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoGAR</xsl:attribute>
								<xsl:attribute name="class">txtImoGAR</xsl:attribute>
								<xsl:attribute name="maxlength">10</xsl:attribute>
								<xsl:attribute name="name">txtImoGAR</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoGAR');</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
								<xsl:attribute name="value">0</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoGARObs</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoGARObs</xsl:attribute>
								Obs:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">8</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoGARObs</xsl:attribute>
								<xsl:attribute name="class">txtImoGARObs</xsl:attribute>
								<xsl:attribute name="maxlength">60</xsl:attribute>
								<xsl:attribute name="name">txtImoGARObs</xsl:attribute>
								<xsl:attribute name="size">40</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoSAL</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoSAL</xsl:attribute>
								Sala:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoSAL</xsl:attribute>
								<xsl:attribute name="class">txtImoSAL</xsl:attribute>
								<xsl:attribute name="maxlength">60</xsl:attribute>
								<xsl:attribute name="name">txtImoSAL</xsl:attribute>
								<xsl:attribute name="size">20</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoCOZ</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoCOZ</xsl:attribute>
								Cozinha:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoCOZ</xsl:attribute>
								<xsl:attribute name="class">txtImoCOZ</xsl:attribute>
								<xsl:attribute name="maxlength">60</xsl:attribute>
								<xsl:attribute name="name">txtImoCOZ</xsl:attribute>
								<xsl:attribute name="size">20</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoBAN</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoBAN</xsl:attribute>
								Banheiro:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoBAN</xsl:attribute>
								<xsl:attribute name="class">txtImoBAN</xsl:attribute>
								<xsl:attribute name="maxlength">60</xsl:attribute>
								<xsl:attribute name="name">txtImoBAN</xsl:attribute>
								<xsl:attribute name="size">20</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoARS</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoARS</xsl:attribute>
								&#193;rea de Servi&#231;o:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoARS</xsl:attribute>
								<xsl:attribute name="class">txtImoARS</xsl:attribute>
								<xsl:attribute name="maxlength">10</xsl:attribute>
								<xsl:attribute name="name">txtImoARS</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoARU</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoARU</xsl:attribute>
								&#193;rea &#250;til:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoARU</xsl:attribute>
								<xsl:attribute name="class">txtImoARU</xsl:attribute>
								<xsl:attribute name="maxlength">10</xsl:attribute>
								<xsl:attribute name="name">txtImoARU</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoARU');</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
								<xsl:attribute name="value">0</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoART</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoART</xsl:attribute>
								&#193;rea Terreno:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoART</xsl:attribute>
								<xsl:attribute name="class">txtImoART</xsl:attribute>
								<xsl:attribute name="maxlength">10</xsl:attribute>
								<xsl:attribute name="name">txtImoART</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoART');</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoACO</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoACO</xsl:attribute>
								&#193;rea Total:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoACO</xsl:attribute>
								<xsl:attribute name="class">txtImoACO</xsl:attribute>
								<xsl:attribute name="maxlength">10</xsl:attribute>
								<xsl:attribute name="name">txtImoACO</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoACO');</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoDIM</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoDIM</xsl:attribute>
								Dimens&#245;es:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoDIM</xsl:attribute>
								<xsl:attribute name="class">txtImoDIM</xsl:attribute>
								<xsl:attribute name="maxlength">10</xsl:attribute>
								<xsl:attribute name="name">txtImoDIM</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoAPR</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">cboImoAPR</xsl:attribute>
								Apar&#234;ncia:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="id">tdImoAPR</xsl:attribute>
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:element name="select">
								<xsl:attribute name="id">cboImoAPR</xsl:attribute>
								<xsl:attribute name="name">cboImoAPR</xsl:attribute>
								<xsl:element name="option">
									<xsl:attribute name="value">1</xsl:attribute>
									Excelente
								</xsl:element>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoFAC</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">cboImoFAC</xsl:attribute>
								Face:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="id">tdImoFAC</xsl:attribute>
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:element name="select">
								<xsl:attribute name="id">cboImoFAC</xsl:attribute>
								<xsl:attribute name="name">cboImoFAC</xsl:attribute>
								<xsl:element name="option">
									<xsl:attribute name="value">1</xsl:attribute>
									Norte
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoIDA</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoIDA</xsl:attribute>
								Idade:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoIDA</xsl:attribute>
								<xsl:attribute name="class">txtImoIDA</xsl:attribute>
								<xsl:attribute name="maxlength">10</xsl:attribute>
								<xsl:attribute name="name">txtImoIDA</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoAND</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoAND</xsl:attribute>
								Andares:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoAND</xsl:attribute>
								<xsl:attribute name="class">txtImoAND</xsl:attribute>
								<xsl:attribute name="maxlength">10</xsl:attribute>
								<xsl:attribute name="name">txtImoAND</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoAND');</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoELE</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoELE</xsl:attribute>
								Elevadores:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoELE</xsl:attribute>
								<xsl:attribute name="class">txtImoELE</xsl:attribute>
								<xsl:attribute name="maxlength">10</xsl:attribute>
								<xsl:attribute name="name">txtImoELE</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoELE');</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoAPA</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoAPA</xsl:attribute>
								Apto por Andar:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">7</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoAPA</xsl:attribute>
								<xsl:attribute name="class">txtImoAPA</xsl:attribute>
								<xsl:attribute name="maxlength">10</xsl:attribute>
								<xsl:attribute name="name">txtImoAPA</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoAPA');</xsl:attribute>
								<xsl:attribute name="size">10</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoOCU</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">cboImoOCU</xsl:attribute>
								Ocupa&#231;&#227;o:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="id">tdImoOCU</xsl:attribute>
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:element name="select">
								<xsl:attribute name="id">cboImoOCU</xsl:attribute>
								<xsl:attribute name="name">cboImoOCU</xsl:attribute>
								<xsl:element name="option">
									<xsl:attribute name="value">0</xsl:attribute>
									Vago
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">1</xsl:attribute>
									Propriet&#225;rio
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">2</xsl:attribute>
									Outro
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoDes</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoDes</xsl:attribute>
								Desocupa&#231;&#227;o:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">8</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoDes</xsl:attribute>
								<xsl:attribute name="class">txtImoDes</xsl:attribute>
								<xsl:attribute name="maxlength">40</xsl:attribute>
								<xsl:attribute name="name">txtImoDes</xsl:attribute>
								<xsl:attribute name="size">40</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoVis</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoVis</xsl:attribute>
								Visita&#231;&#227;o:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">5</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoVis</xsl:attribute>
								<xsl:attribute name="class">txtImoVis</xsl:attribute>
								<xsl:attribute name="maxlength">40</xsl:attribute>
								<xsl:attribute name="name">txtImoVis</xsl:attribute>
								<xsl:attribute name="size">40</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoCha</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoCha</xsl:attribute>
								Chaves:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">5</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoCha</xsl:attribute>
								<xsl:attribute name="class">txtImoCha</xsl:attribute>
								<xsl:attribute name="maxlength">40</xsl:attribute>
								<xsl:attribute name="name">txtImoCha</xsl:attribute>
								<xsl:attribute name="size">40</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:attribute name="rowspan">4</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoObsImo</xsl:attribute>
								<xsl:attribute name="class">labelEnd</xsl:attribute>
								<xsl:attribute name="for">txtImoObsImo</xsl:attribute>
								<xsl:element name="br">Observa&#231;&#245;es sobre o Im&#243;vel:</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">5</xsl:attribute>
							<xsl:attribute name="rowspan">4</xsl:attribute>
							<xsl:element name="textarea">
								<xsl:attribute name="id">txtImoObsImo</xsl:attribute>
								<xsl:attribute name="class">txtImoObsImo</xsl:attribute>
								<xsl:attribute name="cols">40</xsl:attribute>
								<xsl:attribute name="name">txtImoObsImo</xsl:attribute>
								<xsl:attribute name="rows">4</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">chkAGU</xsl:attribute>
								<xsl:attribute name="name">chkAGU</xsl:attribute>
								<xsl:attribute name="type">checkbox</xsl:attribute>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanChkAGU</xsl:attribute>
								Agua Quente
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">chkARC</xsl:attribute>
								<xsl:attribute name="name">chkARC</xsl:attribute>
								<xsl:attribute name="type">checkbox</xsl:attribute>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanChkARC</xsl:attribute>
								Sl. Jogos
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">chkCON</xsl:attribute>
								<xsl:attribute name="name">chkCON</xsl:attribute>
								<xsl:attribute name="type">checkbox</xsl:attribute>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanChkCON</xsl:attribute>
								Quadra Poli
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">chkESQ</xsl:attribute>
								<xsl:attribute name="name">chkESQ</xsl:attribute>
								<xsl:attribute name="type">checkbox</xsl:attribute>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanChkESQ</xsl:attribute>
								Churrasqueira
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">chkINT</xsl:attribute>
								<xsl:attribute name="name">chkINT</xsl:attribute>
								<xsl:attribute name="type">checkbox</xsl:attribute>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanChkINT</xsl:attribute>
								Sauna
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">chkISO</xsl:attribute>
								<xsl:attribute name="name">chkISO</xsl:attribute>
								<xsl:attribute name="type">checkbox</xsl:attribute>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanChkISO</xsl:attribute>
								Port.Eletr&#244;nico
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">chkLAR</xsl:attribute>
								<xsl:attribute name="name">chkLAR</xsl:attribute>
								<xsl:attribute name="type">checkbox</xsl:attribute>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanChkLAR</xsl:attribute>
								Qt. Empreg.
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">chkLAT</xsl:attribute>
								<xsl:attribute name="name">chkLAT</xsl:attribute>
								<xsl:attribute name="type">checkbox</xsl:attribute>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanChkLAT</xsl:attribute>
								Sl. Ginastica
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">chkPIS</xsl:attribute>
								<xsl:attribute name="name">chkPIS</xsl:attribute>
								<xsl:attribute name="type">checkbox</xsl:attribute>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanChkPIS</xsl:attribute>
								Piscina
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">chkPLA</xsl:attribute>
								<xsl:attribute name="name">chkPLA</xsl:attribute>
								<xsl:attribute name="type">checkbox</xsl:attribute>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanChkPLA</xsl:attribute>
								Play Ground
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">chkPOR</xsl:attribute>
								<xsl:attribute name="name">chkPOR</xsl:attribute>
								<xsl:attribute name="type">checkbox</xsl:attribute>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanChkPOR</xsl:attribute>
								Guarita
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">chkQNT</xsl:attribute>
								<xsl:attribute name="name">chkQNT</xsl:attribute>
								<xsl:attribute name="type">checkbox</xsl:attribute>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanChkQNT</xsl:attribute>
								Sl. Festas
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:element>
				<xsl:element name="tfoot">
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="align">center</xsl:attribute>
							<xsl:attribute name="colspan">12</xsl:attribute>
							<xsl:attribute name="style">padding: 5px;</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							Indica preenchimento Obrigat&#243;rio
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="align">left</xsl:attribute>
							<xsl:attribute name="colspan">6</xsl:attribute>
							<xsl:attribute name="style">padding: 5px;</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">cmdMostraLoc</xsl:attribute>
								<xsl:attribute name="class">cmdEnvia</xsl:attribute>
								<xsl:attribute name="onclick">CADASTRO.showTab(1,0);</xsl:attribute>
								<xsl:attribute name="type">button</xsl:attribute>
								<xsl:attribute name="value">Anterior</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="align">right</xsl:attribute>
							<xsl:attribute name="colspan">6</xsl:attribute>
							<xsl:attribute name="style">padding: 5px;</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">cmdMostraVal</xsl:attribute>
								<xsl:attribute name="class">cmdEnvia</xsl:attribute>
								<xsl:attribute name="onclick">CADASTRO.showTab(1,2);</xsl:attribute>
								<xsl:attribute name="type">button</xsl:attribute>
								<xsl:attribute name="value">Pr&#243;ximo</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="id">tdMensImoDesc</xsl:attribute>
							<xsl:attribute name="align">center</xsl:attribute>
							<xsl:attribute name="colspan">12</xsl:attribute>
							<xsl:attribute name="style">padding: 5px; color: red;</xsl:attribute>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="valores">
		<xsl:element name="div">
			<xsl:attribute name="id">divCadImovel1</xsl:attribute>
			<xsl:attribute name="class">panelContentCadImovel</xsl:attribute>
			<xsl:element name="table">
				<xsl:attribute name="id">tabelaCadImo2</xsl:attribute>
				<xsl:attribute name="border">0</xsl:attribute>
				<xsl:attribute name="cellpadding">0</xsl:attribute>
				<xsl:attribute name="cellspacing">0</xsl:attribute>
				<xsl:attribute name="name">tabelaCadImo2</xsl:attribute>
				<xsl:element name="thead">
					<xsl:element name="td"><xsl:attribute name="colspan">10</xsl:attribute>&#160;</xsl:element>
				</xsl:element>
				<xsl:element name="tbody">
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoVal</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">txtImoVal</xsl:attribute>
								Valor:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoVal</xsl:attribute>
								<xsl:attribute name="class">txtImoVal</xsl:attribute>
								<xsl:attribute name="maxlength">20</xsl:attribute>
								<xsl:attribute name="name">txtImoVal</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoVal');</xsl:attribute>
								<xsl:attribute name="size">20</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
								<xsl:attribute name="value">0</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoCond</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">txtImoCond</xsl:attribute>
								Condom&#237;nio:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoCond</xsl:attribute>
								<xsl:attribute name="class">txtImoCond</xsl:attribute>
								<xsl:attribute name="maxlength">20</xsl:attribute>
								<xsl:attribute name="name">txtImoCond</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoCond');</xsl:attribute>
								<xsl:attribute name="size">20</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
								<xsl:attribute name="value">0</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoIPTU</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">txtImoIPTU</xsl:attribute>
								I.P.T.U:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoIPTU</xsl:attribute>
								<xsl:attribute name="class">txtImoIPTU</xsl:attribute>
								<xsl:attribute name="maxlength">20</xsl:attribute>
								<xsl:attribute name="name">txtImoIPTU</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoIPTU');</xsl:attribute>
								<xsl:attribute name="size">20</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
								<xsl:attribute name="value">0</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="colspan">6</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">chkImoSaldo</xsl:attribute>
								<xsl:attribute name="name">chkImoSaldo</xsl:attribute>
								<xsl:attribute name="onclick">CADASTRO.showSaldo();</xsl:attribute>
								<xsl:attribute name="type">checkbox</xsl:attribute>
							</xsl:element>
							<xsl:element name="span">
								<xsl:attribute name="id">spanChkSaldo</xsl:attribute>
								Possui Saldo Devedor
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoSaldoVal</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">txtImoSaldoVal</xsl:attribute>
								Valor do Saldo:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoSaldoVal</xsl:attribute>
								<xsl:attribute name="class">txtImoSaldoVal</xsl:attribute>
								<xsl:attribute name="disabled">true</xsl:attribute>
								<xsl:attribute name="maxlength">20</xsl:attribute>
								<xsl:attribute name="name">txtImoSaldoVal</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoSaldoVal');</xsl:attribute>
								<xsl:attribute name="size">20</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
								<xsl:attribute name="value">0</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoSaldoTmp</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">txtImoSaldoTmp</xsl:attribute>
								Tempo Restante:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoSaldoTmp</xsl:attribute>
								<xsl:attribute name="class">txtImoSaldoTmp</xsl:attribute>
								<xsl:attribute name="disabled">true</xsl:attribute>
								<xsl:attribute name="maxlength">20</xsl:attribute>
								<xsl:attribute name="name">txtImoSaldoTmp</xsl:attribute>
								<xsl:attribute name="size">20</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoSaldoAg</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">txtImoSaldoAg</xsl:attribute>
								Agente Credor:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoSaldoAg</xsl:attribute>
								<xsl:attribute name="class">txtImoSaldoAg</xsl:attribute>
								<xsl:attribute name="disabled">true</xsl:attribute>
								<xsl:attribute name="maxlength">40</xsl:attribute>
								<xsl:attribute name="name">txtImoSaldoAg</xsl:attribute>
								<xsl:attribute name="size">40</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoSaldoPrest</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">txtImoSaldoPrest</xsl:attribute>
								Valor Presta&#231;&#227;o:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:element name="input">
								<xsl:attribute name="id">txtImoSaldoPrest</xsl:attribute>
								<xsl:attribute name="class">txtImoSaldoPrest</xsl:attribute>
								<xsl:attribute name="disabled">true</xsl:attribute>
								<xsl:attribute name="maxlength">20</xsl:attribute>
								<xsl:attribute name="name">txtImoSaldoPrest</xsl:attribute>
								<xsl:attribute name="onblur">CADASTRO.testaNum('txtImoSaldoPrest');</xsl:attribute>
								<xsl:attribute name="size">20</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
								<xsl:attribute name="value">0</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoSaldoPer</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="for">cboImoSaldoPer</xsl:attribute>
								Per&#237;odo Reaj.:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:element name="select">
								<xsl:attribute name="id">cboImoSaldoPer</xsl:attribute>
								<xsl:attribute name="disabled">true</xsl:attribute>
								<xsl:attribute name="name">cboImoSaldoPer</xsl:attribute>
								<xsl:element name="option">
									<xsl:attribute name="value">0</xsl:attribute>
									Mensal
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">1</xsl:attribute>
									Bimestral
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">2</xsl:attribute>
									Trimestral
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">3</xsl:attribute>
									Quadrimestral
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">4</xsl:attribute>
									Semestral
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="selected">true</xsl:attribute>
									<xsl:attribute name="value">5</xsl:attribute>
									Anual
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="class">tdLabel</xsl:attribute>
							<xsl:element name="label">
								<xsl:attribute name="id">labelImoSaldoMes</xsl:attribute>
								<xsl:attribute name="class">labelNome</xsl:attribute>
								<xsl:attribute name="disabled">true</xsl:attribute>
								<xsl:attribute name="for">cboImoSaldoMes</xsl:attribute>
								M&#234;s Reaj.:
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:element name="select">
								<xsl:attribute name="id">cboImoSaldoMes</xsl:attribute>
								<xsl:attribute name="disabled">true</xsl:attribute>
								<xsl:attribute name="name">cboImoSaldoMes</xsl:attribute>
								<xsl:element name="option">
									<xsl:attribute name="value">Janeiro</xsl:attribute>
									Janeiro
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">Fevereiro</xsl:attribute>
									Fevereiro
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">Março</xsl:attribute>
									Mar&#231;o
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">Abril</xsl:attribute>
									Abril
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">Maio</xsl:attribute>
									Maio
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">Junho</xsl:attribute>
									Junho
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">Julho</xsl:attribute>
									Julho
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">Agosto</xsl:attribute>
									Agosto
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">Setembro</xsl:attribute>
									Setembro
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">Outubro</xsl:attribute>
									Outubro
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">Novembro</xsl:attribute>
									Novembro
								</xsl:element>
								<xsl:element name="option">
									<xsl:attribute name="value">Dezembro</xsl:attribute>
									Dezembro
								</xsl:element>
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:element>
				<xsl:element name="tfoot">
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="align">center</xsl:attribute>
							<xsl:attribute name="colspan">9</xsl:attribute>
							<xsl:attribute name="style">padding: 5px;</xsl:attribute>
							<xsl:element name="img">
								<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
								<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
							</xsl:element>
							Indica preenchimento Obrigat&#243;rio
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="align">left</xsl:attribute>
							<xsl:attribute name="colspan">5</xsl:attribute>
							<xsl:attribute name="style">padding: 5px;</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">cmdMostraDet</xsl:attribute>
								<xsl:attribute name="class">cmdEnvia</xsl:attribute>
								<xsl:attribute name="onclick">CADASTRO.showTab(2,1);</xsl:attribute>
								<xsl:attribute name="type">button</xsl:attribute>
								<xsl:attribute name="value">Anterior</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="align">right</xsl:attribute>
							<xsl:attribute name="colspan">6</xsl:attribute>
							<xsl:attribute name="style">padding: 5px;</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">cmdMostraVal</xsl:attribute>
								<xsl:attribute name="class">cmdEnvia</xsl:attribute>
								<xsl:attribute name="onclick">CADASTRO.showTab(2,3);</xsl:attribute>
								<xsl:attribute name="type">button</xsl:attribute>
								<xsl:attribute name="value">Pr&#243;ximo</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="id">tdMensImoVal</xsl:attribute>
							<xsl:attribute name="align">center</xsl:attribute>
							<xsl:attribute name="colspan">9</xsl:attribute>
							<xsl:attribute name="style">padding: 5px; color: red;</xsl:attribute>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="fotos">	
		<xsl:element name="div">
			<xsl:attribute name="id">divCadImovel1</xsl:attribute>
			<xsl:attribute name="class">panelContentCadImovel</xsl:attribute>
			<xsl:element name="table">
				<xsl:attribute name="id">tabelaCadImo2</xsl:attribute>
				<xsl:attribute name="border">0</xsl:attribute>
				<xsl:attribute name="cellpadding">0</xsl:attribute>
				<xsl:attribute name="cellspacing">0</xsl:attribute>
				<xsl:attribute name="name">tabelaCadImo2</xsl:attribute>
				<xsl:element name="thead">
					<xsl:element name="td"><xsl:attribute name="colspan">10</xsl:attribute>&#160;</xsl:element>
				</xsl:element>
				<xsl:element name="tbody">
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:element name="iframe">
								<xsl:attribute name="id">ifrmFotos</xsl:attribute>
								<xsl:attribute name="frameborder">0</xsl:attribute>
								<xsl:attribute name="height">250px</xsl:attribute>
								<xsl:attribute name="width">680px</xsl:attribute>
								<xsl:attribute name="name">ifrmFotos</xsl:attribute>
								<xsl:attribute name="scrolling">no</xsl:attribute>
								<xsl:attribute name="src">corweb/uploadfoto.htm</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:element>
				<xsl:element name="tfoot">
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="align">left</xsl:attribute>
							<xsl:attribute name="colspan">5</xsl:attribute>
							<xsl:attribute name="style">padding: 5px;</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">cmdMostraDet</xsl:attribute>
								<xsl:attribute name="class">cmdEnvia</xsl:attribute>
								<xsl:attribute name="onclick">CADASTRO.showTab(3,2);</xsl:attribute>
								<xsl:attribute name="type">button</xsl:attribute>
								<xsl:attribute name="value">Anterior</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="td">
							<xsl:attribute name="align">right</xsl:attribute>
							<xsl:attribute name="colspan">6</xsl:attribute>
							<xsl:attribute name="style">padding: 5px;</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">cmdImoArquiva</xsl:attribute>
								<xsl:attribute name="class">cmdEnvia</xsl:attribute>
								<xsl:attribute name="onclick">CADASTRO.arquivar();</xsl:attribute>
								<xsl:attribute name="type">button</xsl:attribute>
								<xsl:attribute name="value">Concluir</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="id">tdMensImoVal</xsl:attribute>
							<xsl:attribute name="align">center</xsl:attribute>
							<xsl:attribute name="colspan">9</xsl:attribute>
							<xsl:attribute name="style">padding: 5px; color: red;</xsl:attribute>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="basicos">
		<xsl:element name="div">
			<xsl:attribute name="id">divCliente</xsl:attribute>
			<xsl:attribute name="class">divCliente</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divConcluido</xsl:attribute>
			<xsl:attribute name="class">divConcluido</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divTitConcluido</xsl:attribute>
				<xsl:attribute name="class">divTit</xsl:attribute>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitConcluido</xsl:attribute>
					<xsl:attribute name="class">spanTit spanTitConcluido</xsl:attribute>
					Seu Im&#243;vel foi Cadastrado
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitFecharConcluido</xsl:attribute>
					<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
					<xsl:element name="img">
						<xsl:attribute name="id">imgFecharConcluido</xsl:attribute>
						<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
						<xsl:attribute name="onclick">CADASTRO.proprietario.hide();OPTIONS={venda:true,locacao:true,empreendimento:false,offset:7};iniciaPromocoes();</xsl:attribute>
						<xsl:attribute name="onmouseout">CADASTRO.mouseOutConcluido();</xsl:attribute>
						<xsl:attribute name="onmouseover">CADASTRO.mouseOverConcluido();</xsl:attribute>
						<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/fechar.gif</xsl:attribute>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divConcluidoQ</xsl:attribute>
				<xsl:element name="p">Seu Im&#243;vel foi cadastrado com sucesso!!!</xsl:element>
				<xsl:element name="p">Aguarde contato de Um corretor para efetivar o cadastro.</xsl:element>
			</xsl:element>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divPros</xsl:attribute>
			<xsl:attribute name="class">divBairros</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divPesquisaTrabalho</xsl:attribute>
			<xsl:attribute name="class">divPesquisaTrabalho</xsl:attribute>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divMarket</xsl:attribute>
			<xsl:attribute name="class">divMarket</xsl:attribute>
			Tecnologia de:&#160;
			<xsl:element name="a">
				<xsl:attribute name="href">http://www.sistemasprofissionais.com.br</xsl:attribute>
				<xsl:attribute name="style">font-size:xx-small;</xsl:attribute>
				Sistemas Profissionais(Especializada em Softwares para o Ramo Imobili&#225;rio)
			</xsl:element>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divAmpulheta</xsl:attribute>
		</xsl:element>
	</xsl:template>
	<xsl:template match="contratos">
		<xsl:element name="div">
			<xsl:attribute name="id">divTabsImovel</xsl:attribute>
			<xsl:attribute name="class">divTabsImovel</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divTabsImovelTit</xsl:attribute>
				<xsl:element name="div">
					<xsl:attribute name="id">panelCadImoLoc</xsl:attribute>
					<xsl:attribute name="class">panelHeaderCadImovel</xsl:attribute>
					Localiza&#231;&#227;o
				</xsl:element>
				<xsl:element name="div">
					<xsl:attribute name="id">panelCadImoDesc</xsl:attribute>
					<xsl:attribute name="class">panelHeaderCadImovel</xsl:attribute>
					Descri&#231;&#227;o
				</xsl:element>
				<xsl:element name="div">
					<xsl:attribute name="id">panelCadImoVal</xsl:attribute>
					<xsl:attribute name="class">panelHeaderCadImovel</xsl:attribute>
					Valores
				</xsl:element>
				<xsl:element name="div">
					<xsl:attribute name="id">panelCadFotos</xsl:attribute>
					<xsl:attribute name="class">panelHeaderCadImovel</xsl:attribute>
					Fotos
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="class">panelContentContainerCadImovel</xsl:attribute>
				<xsl:call-template name="localizacao"/>
				<xsl:call-template name="descricao"/>
				<xsl:call-template name="valores"/>
				<xsl:call-template name="fotos"/>
			</xsl:element>
		</xsl:element>
		<xsl:call-template name="proprietario"/>
		<xsl:call-template name="basicos"/>
	</xsl:template>
</xsl:stylesheet>