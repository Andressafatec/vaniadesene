<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:template match="estados">
		<xsl:element name="select">
			<xsl:attribute name="id">cboUF</xsl:attribute>
			<xsl:attribute name="onchange">CADASTRO.proprietario.ufClick(&#39;cboUF&#39;);</xsl:attribute>
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
</xsl:stylesheet>