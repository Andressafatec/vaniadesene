<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:template match="regioes">
		<xsl:for-each select="regiao">
			<xsl:element name="div">
				<xsl:attribute name="id">divChk<xsl:value-of select="key"/></xsl:attribute>
				<xsl:attribute name="class">divChk</xsl:attribute>
				<xsl:attribute name="onmouseover">COMBOS.mouseOver(&#39;<xsl:value-of select="key"/>&#39;);</xsl:attribute>
				<xsl:attribute name="onmouseout">COMBOS.mouseOut();</xsl:attribute>
				<xsl:element name="input">
					<xsl:attribute name="id"><xsl:value-of select="key"/></xsl:attribute>
					<xsl:attribute name="class">chkRegiao</xsl:attribute>
					<xsl:attribute name="type">checkbox</xsl:attribute>
					<xsl:attribute name="onclick">COMBOS.click(&#39;regiao&#39;);</xsl:attribute>
					<xsl:if test="padrao=1">
						<xsl:attribute name="checked">true</xsl:attribute>
					</xsl:if>
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="class">spanLabelChk</xsl:attribute>
					<xsl:value-of select="nome"/>
				</xsl:element>
			</xsl:element>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
