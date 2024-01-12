<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	
	<xsl:template match="estados">
		<xsl:element name="select">
		<xsl:attribute name="id">cboImoUF</xsl:attribute>
		<xsl:attribute name="name">cboImoUF</xsl:attribute>
		<xsl:attribute name="onchange">aninhaCadImoUF.on_Change(&#39;cboImoUF&#39;);</xsl:attribute>
		<xsl:for-each select="uf">
			<xsl:element name="option">
				<xsl:attribute name="value">
					<xsl:value-of select="key"/>
				</xsl:attribute>
				<xsl:if test="padrao=1"><xsl:attribute name="selected">selected</xsl:attribute></xsl:if>
				<xsl:value-of select="key"/>
			</xsl:element>
		</xsl:for-each>
		</xsl:element>
	</xsl:template>
	
	<xsl:template match="contratos">
		<xsl:element name="select">
		<xsl:attribute name="id">cboImoCtr</xsl:attribute>
		<xsl:attribute name="name">cboImoCtr</xsl:attribute>
		<xsl:for-each select="contrato">
			<xsl:element name="option">
				<xsl:attribute name="value">
					<xsl:value-of select="key"/>
				</xsl:attribute>
				<xsl:if test="padrao=1"><xsl:attribute name="selected">selected</xsl:attribute></xsl:if>
				<xsl:value-of select="nome"/>
			</xsl:element>
		</xsl:for-each>
		</xsl:element>
	</xsl:template>

	<xsl:template match="tipoimoveis">
		<xsl:element name="select">
		<xsl:attribute name="id">cboImoTipo</xsl:attribute>
		<xsl:attribute name="name">cboImoTipo</xsl:attribute>
		<xsl:attribute name="onchange">mudaTipoImovel();</xsl:attribute>
		<xsl:for-each select="tipoimovel">
			<xsl:element name="option">
				<xsl:attribute name="value">
					<xsl:value-of select="key"/>
				</xsl:attribute>
				<xsl:if test="padrao=1"><xsl:attribute name="selected">selected</xsl:attribute></xsl:if>
				<xsl:value-of select="nome"/>
			</xsl:element>
		</xsl:for-each>
		</xsl:element>
	</xsl:template>
	
	<xsl:template match="cidades">
		<xsl:element name="select">
		<xsl:attribute name="id">cboImoCid</xsl:attribute>
		<xsl:attribute name="name">cboImoCid</xsl:attribute>
		<xsl:for-each select="cidade">
			<xsl:element name="option">
				<xsl:attribute name="value">
					<xsl:value-of select="key"/>
				</xsl:attribute>
				<xsl:if test="padrao=1"><xsl:attribute name="selected">selected</xsl:attribute></xsl:if>
				<xsl:value-of select="nome"/>
			</xsl:element>
		</xsl:for-each>
		</xsl:element>
	</xsl:template>

</xsl:stylesheet>