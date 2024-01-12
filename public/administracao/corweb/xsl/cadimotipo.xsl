<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:variable name="URL">/corweb/</xsl:variable>
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:template match="tipoimoveis">
		<xsl:element name="select">
			<xsl:attribute name="id">cboImoTipo</xsl:attribute>
			<xsl:attribute name="onchange">CADASTRO.click(&#39;cboImoTipo&#39;)</xsl:attribute>
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
		<xsl:element name="span">
			<xsl:attribute name="id">spanCarregaImoTipo</xsl:attribute>
			<xsl:attribute name="class">carrega spanCarregaImoTipo</xsl:attribute>
			<xsl:attribute name="style">display: inline;</xsl:attribute>
			<xsl:element name="img">
				<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
			</xsl:element>
			&#160;
		</xsl:element>
	</xsl:template>
</xsl:stylesheet>
