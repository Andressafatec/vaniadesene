<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:template match="logradouros">
		<xsl:for-each select="logradouro">
			<xsl:element name="span">
				<xsl:attribute name="id">spanMatch<xsl:value-of select="position()-1"/></xsl:attribute>
				<xsl:attribute name="class">spanMatch</xsl:attribute>
				<xsl:value-of select="nome"/>,&#160;<xsl:value-of select="tipo"/>&#160;&#45;&#160;<xsl:value-of select="bairro"/>&#160;&#45;&#160;<xsl:value-of select="cep"/><xsl:if test="string-length(trecho)>0">&#160;&#45;&#160;<xsl:value-of select="trecho"/></xsl:if>
			</xsl:element>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
