<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:variable name="URL">/corweb/</xsl:variable>
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:template name="identificacao">
		<xsl:element name="div">
			<xsl:attribute name="id">divIdent</xsl:attribute>
			<xsl:attribute name="class">divIdent</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divTitIdent</xsl:attribute>
				<xsl:attribute name="class">divTit</xsl:attribute>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitIdent</xsl:attribute>
					<xsl:attribute name="class">spanTit spanTitIdent</xsl:attribute>
					Identifica&#231;&#227;o
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitFecharIdent</xsl:attribute>
					<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
					<xsl:element name="img">
						<xsl:attribute name="id">imgFecharIdent</xsl:attribute>
						<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
						<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/fechar.gif</xsl:attribute>
						<xsl:attribute name="onclick">INDENT.fechar();</xsl:attribute>
						<xsl:attribute name="onmouseover">INDENT.fechar_mouseout();</xsl:attribute>
						<xsl:attribute name="onmouseout">INDENT.fechar_mouseover();</xsl:attribute>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divIdentQ</xsl:attribute>
				<xsl:element name="p">Ao identificar-se, voc&#234; receber&#225; nossas ofertas em primeira m&#227;o, no momento que cadastrarmos em nosso banco de dados. &#201; simples, informe-nos apenas seu nome, sobrenome e e-mail.</xsl:element>
				<xsl:element name="p">Gostaria de se identificar agora?</xsl:element>
				<xsl:element name="p">
					<xsl:attribute name="align">left</xsl:attribute>
					<xsl:element name="input">
						<xsl:attribute name="id">optIndentS</xsl:attribute>
						<xsl:attribute name="class">optIndent</xsl:attribute>
						<xsl:attribute name="type">radio</xsl:attribute>
					</xsl:element>
					Sim. Pretendo me identificar agora.
					<xsl:element name="br"/>
					<xsl:element name="input">
						<xsl:attribute name="id">optIndentN</xsl:attribute>
						<xsl:attribute name="class">optIndent</xsl:attribute>
						<xsl:attribute name="type">radio</xsl:attribute>
					</xsl:element>
					N&#227;o. Desejo Permanecer An&#244;nimo ainda.
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divIdentNada</xsl:attribute>
				<xsl:element name="div">
					<xsl:attribute name="id">divIdentificacao</xsl:attribute>
					<xsl:attribute name="class">divIdentificacao</xsl:attribute>
					<xsl:element name="table">
						<xsl:element name="tbody">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="align">right</xsl:attribute>
									<xsl:element name="img">
										<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
										<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
									</xsl:element>
									Nome:
								</xsl:element>
								<xsl:element name="td">
									<xsl:element name="input">
										<xsl:attribute name="id">txtNome</xsl:attribute>
										<xsl:attribute name="class">txtNome</xsl:attribute>
										<xsl:attribute name="maxlength">60</xsl:attribute>
										<xsl:attribute name="size">50</xsl:attribute>
										<xsl:attribute name="type">text</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="align">right</xsl:attribute>
									Telefone:
								</xsl:element>
								<xsl:element name="td">
									<xsl:element name="input">
										<xsl:attribute name="id">txtTelefone</xsl:attribute>
										<xsl:attribute name="class">txtTelefone</xsl:attribute>
										<xsl:attribute name="maxlength">16</xsl:attribute>
										<xsl:attribute name="size">16</xsl:attribute>
										<xsl:attribute name="type">text</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:element>							
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="align">right</xsl:attribute>
									<xsl:element name="img">
										<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
										<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
									</xsl:element>
									Email:
								</xsl:element>
								<xsl:element name="td">
									<xsl:element name="input">
										<xsl:attribute name="id">txtEmail</xsl:attribute>
										<xsl:attribute name="class">txtEmail</xsl:attribute>
										<xsl:attribute name="maxlength">60</xsl:attribute>
										<xsl:attribute name="size">50</xsl:attribute>
										<xsl:attribute name="type">text</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tfoot">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:attribute name="style">padding: 5px;</xsl:attribute>
									<xsl:attribute name="align">center</xsl:attribute>
									<xsl:element name="img">
										<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
										<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
									</xsl:element>
									Indica preenchimento Obrigat&#243;rio
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:attribute name="style">padding: 5px;</xsl:attribute>
									<xsl:attribute name="align">center</xsl:attribute>
									<xsl:element name="input">
										<xsl:attribute name="id">cmdEnvia</xsl:attribute>
										<xsl:attribute name="class">cmdEnvia</xsl:attribute>
										<xsl:attribute name="type">button</xsl:attribute>
										<xsl:attribute name="value">Enviar</xsl:attribute>
									</xsl:element>
									Indica preenchimento Obrigat&#243;rio
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="id">tdMens</xsl:attribute>
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:attribute name="style">padding: 5px; color: red;</xsl:attribute>
									<xsl:attribute name="align">center</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
</xsl:stylesheet>
