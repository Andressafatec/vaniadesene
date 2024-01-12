<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:template match="contratos">
		<xsl:element name="script">
			<xsl:attribute name="language">JavaScript</xsl:attribute>
			<xsl:attribute name="type">text/javascript</xsl:attribute>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divForm</xsl:attribute>
			<xsl:element name="form">
				<xsl:attribute name="action">#</xsl:attribute>
				<xsl:element name="label">
					<xsl:attribute name="for">cboLocal</xsl:attribute>
					Cadastro
				</xsl:element>
				<xsl:element name="select">
					<xsl:attribute name="id">cboLocal</xsl:attribute>
					<xsl:element name="option">
						<xsl:attribute name="value" />
						Todo o Cadastro
					</xsl:element>
					<xsl:element name="option">
						<xsl:attribute name="selected">true</xsl:attribute>
						<xsl:attribute name="value">0</xsl:attribute>
						Somente Disponiveis
					</xsl:element>
					<xsl:element name="option">
						<xsl:attribute name="value">1</xsl:attribute>
						Somente Morto
					</xsl:element>
					<xsl:element name="option">
						<xsl:attribute name="value">2</xsl:attribute>
						Somente Temporario
					</xsl:element>
					<xsl:element name="option">
						<xsl:attribute name="value">3</xsl:attribute>
						Somente Alugados
					</xsl:element>
				</xsl:element>
				<xsl:element name="label">
					<xsl:attribute name="for">cboQtd</xsl:attribute>
					Quantidade Maxima
				</xsl:element>
				<xsl:element name="select">
					<xsl:attribute name="id">cboQtd</xsl:attribute>
					<xsl:element name="option">
						<xsl:attribute name="selected">true</xsl:attribute>
						<xsl:attribute name="value">10</xsl:attribute>
						Ate 10
					</xsl:element>
					<xsl:element name="option">
						<xsl:attribute name="value">100</xsl:attribute>
						Ate 100
					</xsl:element>
					<xsl:element name="option">
						<xsl:attribute name="value">500</xsl:attribute>
						Ate 500
					</xsl:element>
					<xsl:element name="option">
						<xsl:attribute name="value">1000</xsl:attribute>
						Ate 1000
					</xsl:element>
					<xsl:element name="option">
						<xsl:attribute name="value">2000</xsl:attribute>
						Ate 2000
					</xsl:element>
					<xsl:element name="option">
						<xsl:attribute name="value">5000</xsl:attribute>
						Ate 5000
					</xsl:element>
					<xsl:element name="option">
						<xsl:attribute name="value">10000</xsl:attribute>
						Ate 10000
					</xsl:element>
					<xsl:element name="option">
						<xsl:attribute name="value">15000</xsl:attribute>
						Ate 15000
					</xsl:element>
				</xsl:element>
				<xsl:element name="input">
					<xsl:attribute name="onclick">inicializar();</xsl:attribute>
					<xsl:attribute name="type">button</xsl:attribute>
					<xsl:attribute name="value">Carregar Imoveis</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divImoveis</xsl:attribute>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divExecuta</xsl:attribute>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divAmpulheta</xsl:attribute>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divTrabalho</xsl:attribute>
			<xsl:attribute name="class">divPesquisaTrabalho</xsl:attribute>
			<xsl:attribute name="style">position:absolute;display:none;</xsl:attribute>
		</xsl:element>
		<xsl:element name="a">
			<xsl:attribute name="name">fim</xsl:attribute>
		</xsl:element>
	</xsl:template>
</xsl:stylesheet>
