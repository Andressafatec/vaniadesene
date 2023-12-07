<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:variable name="URL">/corweb/</xsl:variable>
	<xsl:output method="html"/>
	<xsl:template name="mapa">
		<xsl:element name="div">
			<xsl:attribute name="id">cardMapa</xsl:attribute>
			<xsl:attribute name="class">cardMapa</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divTitCardMapa</xsl:attribute>
				<xsl:attribute name="class">divTit</xsl:attribute>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitMapa</xsl:attribute>
					<xsl:attribute name="class">spanTitMapa</xsl:attribute>
					Geoposi&#231;&#227;o
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitMapaFechar</xsl:attribute>
					<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
					<xsl:element name="img">
						<xsl:attribute name="id">imgFecharMapa</xsl:attribute>
						<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
						<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/fechar.gif</xsl:attribute>
						<xsl:attribute name="onclick">MAPA.fechar();</xsl:attribute>
						<xsl:attribute name="onmouseover">MAPA.fechar_mouseover();</xsl:attribute>
						<xsl:attribute name="onmouseout">MAPA.fechar_mouseout();</xsl:attribute>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divMapaConteudo</xsl:attribute>
				<xsl:attribute name="class">divMapaConteudo</xsl:attribute>
			</xsl:element>
		</xsl:element>
	</xsl:template>
</xsl:stylesheet>