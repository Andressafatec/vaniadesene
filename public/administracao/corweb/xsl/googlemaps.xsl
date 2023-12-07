<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	
		<xsl:element name="script">
			<xsl:attribute name="type">text/javascript</xsl:attribute>
			<xsl:attribute name="language">Javascript</xsl:attribute>
			<xsl:attribute name="src"><xsl:value-of select="googlemaps/src"/>&#63;file&#61;<xsl:value-of select="googlemaps/tipo"/>&#38;v&#61;<xsl:value-of select="googlemaps/versao"/>&#38;key&#61;<xsl:value-of select="googlemaps/key"/></xsl:attribute>
		</xsl:element>
	</xsl:template>
</xsl:stylesheet>
