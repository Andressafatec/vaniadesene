<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:template match="suites">
		<xsl:element name="span">
			<xsl:attribute name="id">spanLabelSui</xsl:attribute>
			<xsl:attribute name="class">CampoEsq</xsl:attribute>
			<xsl:element name="label">
				<xsl:attribute name="id">labelSuites</xsl:attribute>
				<xsl:attribute name="for">suites</xsl:attribute>
				<xsl:value-of select="campo/descricao"/>&#160;
			</xsl:element>
		</xsl:element>
		<xsl:element name="span">
			<xsl:attribute name="id">spanComboSui</xsl:attribute>
			<xsl:attribute name="class">CampoDir</xsl:attribute>
			<xsl:element name="select">
				<xsl:attribute name="id">suites</xsl:attribute>
				<xsl:attribute name="class">selectPesquisa</xsl:attribute>
				<xsl:attribute name="onchange">COMBOS.click(&#39;suites&#39;);</xsl:attribute>
				<xsl:for-each select="suite">
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
		</xsl:element>
	</xsl:template>
</xsl:stylesheet>
