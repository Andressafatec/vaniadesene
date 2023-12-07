<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:template match="bairros">
		<xsl:element name="div">
			<xsl:attribute name="id">divBairrosTit</xsl:attribute>
			<xsl:attribute name="class">divBairrosTit</xsl:attribute>
			<xsl:attribute name="style">font-size:150%;</xsl:attribute>
			<xsl:value-of select="regiao"/>
		</xsl:element>
		<xsl:for-each select="bairro">
			<xsl:element name="div">
				<xsl:value-of select="nome"/>
			</xsl:element>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
