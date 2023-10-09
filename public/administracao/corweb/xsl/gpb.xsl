<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	
	<xsl:template match="estados">
		<xsl:element name="select">
		<xsl:attribute name="id">cboUF</xsl:attribute>
		<xsl:attribute name="name">cboUF</xsl:attribute>
		<xsl:attribute name="onchange">aninhaCbo.on_Change(&#39;cboUF&#39;);</xsl:attribute>
		<xsl:for-each select="uf">
			<xsl:element name="option">
				<xsl:attribute name="value">
					<xsl:value-of select="key"/>
				</xsl:attribute>
				<xsl:if test="padrao=1">
					<xsl:attribute name="selected">selected</xsl:attribute>
				</xsl:if>
				<xsl:value-of select="key"/>
			</xsl:element>
		</xsl:for-each>
		</xsl:element>
	</xsl:template>
	
	<xsl:template match="cidades">
		<xsl:element name="select">
		<xsl:attribute name="id">cboCidade</xsl:attribute>
		<xsl:attribute name="name">cboCidade</xsl:attribute>
		<xsl:attribute name="onchange">mudaCidade(&#39;cboCidade&#39;);</xsl:attribute>
		<xsl:for-each select="cidade">
			<xsl:element name="option">
				<xsl:attribute name="value">
					<xsl:value-of select="key"/>
				</xsl:attribute>
				<xsl:if test="padrao=1">
					<xsl:attribute name="selected">selected</xsl:attribute>
				</xsl:if>
				<xsl:value-of select="nome"/>
			</xsl:element>
		</xsl:for-each>
		</xsl:element>
	</xsl:template>

</xsl:stylesheet>
