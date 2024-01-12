<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:template match="campos">
		<xsl:for-each select="campo">
			<xsl:element name="div">
				<xsl:attribute name="id">div<xsl:value-of select="key"/></xsl:attribute>
				<xsl:attribute name="class">div<xsl:value-of select="key"/></xsl:attribute>
				<xsl:element name="input">
					<xsl:attribute name="type">checkbox</xsl:attribute>
					<xsl:attribute name="id"><xsl:value-of select="key"/></xsl:attribute>
					<xsl:attribute name="onclick">COMBOS.click(&#39;campo&#39;);</xsl:attribute>
					<xsl:attribute name="class">checkOpcionais</xsl:attribute>
					<xsl:if test="valor=1">
						<xsl:attribute name="checked">checked</xsl:attribute>
					</xsl:if>
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="id">spanDesc<xsl:value-of select="key"/></xsl:attribute>
					<xsl:attribute name="class">spanDesc</xsl:attribute>
					<xsl:value-of select="descricao"/>
				</xsl:element>
			</xsl:element>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>