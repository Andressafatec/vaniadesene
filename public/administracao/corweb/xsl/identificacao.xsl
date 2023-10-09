<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	
	<xsl:template match="identificacao">
		<xsl:choose>
			<xsl:when test="count(preinteressado)=1">
				<xsl:element name="table">
					<xsl:attribute name="id">tabelaCliente</xsl:attribute>
					<xsl:attribute name="class">tabelaImoveis</xsl:attribute>
					<xsl:attribute name="width">150px</xsl:attribute>
					<xsl:element name="tbody">
						<xsl:element name="tr">
							<xsl:attribute name="class">tabelaImoveisLinha0</xsl:attribute>
							<xsl:element name="td">
								<xsl:value-of select="preinteressado/nome"/>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:attribute name="class">tabelaImoveisLinha1</xsl:attribute>
							<xsl:element name="td">
								<xsl:value-of select="preinteressado/contato"/>
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:when>
			<xsl:otherwise>
				<xsl:if test="count(interessado)=1">
					<xsl:element name="table">
						<xsl:attribute name="id">tabelaCliente</xsl:attribute>
						<xsl:attribute name="class">tabelaImoveis</xsl:attribute>
						<xsl:attribute name="width">150px</xsl:attribute>
						<xsl:element name="tbody">
							<xsl:element name="tr">
								<xsl:attribute name="class">tabelaImoveisLinha0</xsl:attribute>
								<xsl:element name="td">
									<xsl:value-of select="interessado/nome"/>
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:attribute name="class">tabelaImoveisLinha1</xsl:attribute>
								<xsl:element name="td">
									<xsl:value-of select="interessado/corretor"/>
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:attribute name="class">tabelaImoveisLinha0</xsl:attribute>
								<xsl:element name="td">
									<xsl:value-of select="interessado/contato"/>
								</xsl:element>
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:if>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
</xsl:stylesheet>
