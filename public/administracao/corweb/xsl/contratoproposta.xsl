<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:template match="contrato">
		<xsl:element name="table">
			<xsl:attribute name="border">0</xsl:attribute>
			<xsl:attribute name="width">100%</xsl:attribute>
			<xsl:element name="tbody">
				<xsl:element name="tr">
					<xsl:attribute name="align">center</xsl:attribute>
					<xsl:element name="td">
						<xsl:attribute name="colspan">2</xsl:attribute>
						<xsl:element name="div">
							<xsl:attribute name="id">divTexto</xsl:attribute>
						</xsl:element>
					</xsl:element>
				</xsl:element>
				<xsl:element name="tr">
					<xsl:attribute name="align">center</xsl:attribute>
					<xsl:element name="td">
						<xsl:attribute name="colspan">2</xsl:attribute>
						<xsl:element name="hr"></xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:element name="tfoot">
				<xsl:element name="tr">
					<xsl:attribute name="align">center</xsl:attribute>
					<xsl:element name="td">
						<xsl:element name="input">
							<xsl:attribute name="id">optPropS</xsl:attribute>
							<xsl:attribute name="name">optProp</xsl:attribute>
							<xsl:attribute name="type">radio</xsl:attribute>
							<xsl:attribute name="align">center</xsl:attribute>
							<xsl:attribute name="onclick">$(&#39;cmdConfirmar&#39;).value=&#39;Sim aceito o Contrato&#39;;</xsl:attribute>
						</xsl:element>
						Sim aceito o Contrato
					</xsl:element>
					<xsl:element name="td">
						<xsl:element name="input">
							<xsl:attribute name="id">optPropN</xsl:attribute>
							<xsl:attribute name="name">optProp</xsl:attribute>
							<xsl:attribute name="type">radio</xsl:attribute>
							<xsl:attribute name="align">center</xsl:attribute>
							<xsl:attribute name="onclick">$(&#39;cmdConfirmar&#39;).value=&#39;Não aceito o Contrato&#39;;</xsl:attribute>
						</xsl:element>
						N&#227;o aceito o Contrato
					</xsl:element>
				</xsl:element>
				<xsl:element name="tr">
					<xsl:attribute name="align">center</xsl:attribute>
					<xsl:element name="td">
						<xsl:attribute name="colspan">2</xsl:attribute>
						<xsl:element name="input">
							<xsl:attribute name="id">cmdConfirmar</xsl:attribute>
							<xsl:attribute name="name">cmdConfirmar</xsl:attribute>
							<xsl:attribute name="class">cmdConfirmar</xsl:attribute>
							<xsl:attribute name="type">button</xsl:attribute>
							<xsl:attribute name="value">Confirmar</xsl:attribute>
						</xsl:element>
					</xsl:element>
				</xsl:element>
				<xsl:element name="tr">
					<xsl:element name="td">
						<xsl:attribute name="id">tdMensCtrProp</xsl:attribute>
						<xsl:attribute name="align">center</xsl:attribute>
						<xsl:attribute name="colspan">2</xsl:attribute>
						<xsl:attribute name="style">padding: 5px; color: red;</xsl:attribute>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
</xsl:stylesheet>
