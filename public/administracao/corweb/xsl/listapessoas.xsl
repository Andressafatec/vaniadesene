<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:template match="identificacao">
		<xsl:element name="div">
			<xsl:attribute name="class">divIdTit</xsl:attribute>
			Escolha a op&#231;&#227;o correta
		</xsl:element>
		<xsl:element name="table">
			<xsl:attribute name="class">tabelaImoveis</xsl:attribute>
			<xsl:attribute name="width">100%</xsl:attribute>
			<xsl:element name="thead">
				<xsl:attribute name="class">tabelaImoveisHead</xsl:attribute>
				<xsl:element name="tr">
					<xsl:element name="th">&#32;</xsl:element>
					<xsl:element name="th">Nome</xsl:element>
					<xsl:element name="th">Telefone</xsl:element>
					<xsl:element name="th">E-Mail</xsl:element>
					<xsl:element name="th">CPF/CNPJ</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:for-each select="pessoa">
				<xsl:element name="tr">
					<xsl:attribute name="class">tabelaImoveisLinha<xsl:value-of select="(position()+1) mod 2"/></xsl:attribute>
					<xsl:element name="td">
						<xsl:element name="input">
							<xsl:attribute name="type">radio</xsl:attribute>
							<xsl:attribute name="onclick">CADASTRO.proprietario.seleciona(&#39;<xsl:value-of select="key"/>&#39;,true,&#39;<xsl:value-of select="tipo"/>&#39;);</xsl:attribute>
						</xsl:element>
					</xsl:element>
					<xsl:element name="td"><xsl:value-of select="nome"/></xsl:element>
					<xsl:element name="td"><xsl:value-of select="telefone"/></xsl:element>
					<xsl:element name="td"><xsl:value-of select="email"/></xsl:element>
					<xsl:element name="td"><xsl:value-of select="cpf"/></xsl:element>
				</xsl:element>
			</xsl:for-each>
			<xsl:element name="tr">
				<xsl:element name="td">
					<xsl:attribute name="colspan">5</xsl:attribute>
					<xsl:element name="hr"/>
				</xsl:element>
			</xsl:element>
			<xsl:element name="tr">
				<xsl:element name="td">
					<xsl:element name="input">
						<xsl:attribute name="type">radio</xsl:attribute>
						<xsl:attribute name="onclick">CADASTRO.proprietario.enviarDados(true);</xsl:attribute>
					</xsl:element>
				</xsl:element>
				<xsl:element name="td">
					<xsl:attribute name="colspan">4</xsl:attribute>
					Nenhuma coincid&#234;ncia
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
</xsl:stylesheet>
