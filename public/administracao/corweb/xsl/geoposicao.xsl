<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>

	<xsl:template match="edificios">
		<xsl:element name="p">
			<xsl:element name="a">
				<xsl:attribute name="href">#fim</xsl:attribute>
				Fim da p&#225;gina
			</xsl:element>
		</xsl:element>
		<xsl:element name="p">
			<xsl:element name="a">
				<xsl:attribute name="href">#imovel</xsl:attribute>
				Tabela de Im&#243;veis
			</xsl:element>
		</xsl:element>
		<xsl:if test="count(edificio)>0">
			<xsl:element name="p">
				<xsl:element name="a">
					<xsl:attribute name="name">edificio</xsl:attribute>
				</xsl:element>
			</xsl:element>
			<xsl:element name="table">
				<xsl:element name="caption">
					Edif&#237;cios
				</xsl:element>
				<xsl:attribute name="id">tabelaEdificios</xsl:attribute>
				<xsl:attribute name="name">tabelaEdificios</xsl:attribute>
				<xsl:attribute name="class">tabelaImoveis</xsl:attribute>
				<xsl:element name="thead">
					<xsl:attribute name="class">tabelaImoveisHead</xsl:attribute>
					<xsl:element name="tr">
						<xsl:element name="th">
							<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
							C&#243;digo
						</xsl:element>
						<xsl:element name="th">
							<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
							Endere&#231;o
						</xsl:element>
						<xsl:element name="th">
							<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
							Cidade
						</xsl:element>
						<xsl:element name="th">
							<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
							Estado
						</xsl:element>
						<xsl:element name="th">
							<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
							Geoposi&#231;&#227;o
						</xsl:element>
					</xsl:element>
				</xsl:element>
				<xsl:element name="tbody">
					<xsl:for-each select="edificio">
						<xsl:element name="tr">
							<xsl:attribute name="class">tabelaImoveisLinha<xsl:value-of select="position() mod 2"/></xsl:attribute>
							<xsl:element name="td">
								<xsl:element name="a">
									<xsl:attribute name="name">edificio<xsl:value-of select="key"/></xsl:attribute>
								</xsl:element>
								<xsl:attribute name="class">tabelaImoveisTD tabelaImoveisTDValor</xsl:attribute>
								<xsl:value-of select="key"/>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tabelaImoveisTD</xsl:attribute>
								<xsl:value-of select="endereco"/>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tabelaImoveisTD</xsl:attribute>
								<xsl:value-of select="cidade"/>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tabelaImoveisTD</xsl:attribute>
								<xsl:value-of select="estado"/>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="id">tdEdi<xsl:value-of select="key"/></xsl:attribute>
								<xsl:attribute name="class">tabelaImoveisTD</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:for-each>
				</xsl:element>
				<xsl:element name="tfoot">
					<xsl:element name="tr">
						<xsl:attribute name="class">tabelaImoveisFoot</xsl:attribute>
						<xsl:attribute name="align">center</xsl:attribute>
						<xsl:element name="td">
							<xsl:attribute name="class">tabelaImoveisNavegacaoResumo</xsl:attribute>
							<xsl:attribute name="colspan">5</xsl:attribute>
							Quantidade de Edif&#237;cios&#32;<xsl:value-of select="(count(edificio))"/>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:if>
	</xsl:template>

	<xsl:template match="imoveis">
		<xsl:element name="p">
			<xsl:element name="a">
				<xsl:attribute name="href">#edificio</xsl:attribute>
				Tabela de Edif&#237;cios
			</xsl:element>
		</xsl:element>
		<xsl:if test="count(imovel)>0">
			<xsl:element name="p">
				<xsl:element name="a">
					<xsl:attribute name="href">#fim</xsl:attribute>
					Fim da p&#225;gina
				</xsl:element>
			</xsl:element>
			<xsl:element name="p">
				<xsl:element name="a">
					<xsl:attribute name="name">imovel</xsl:attribute>
				</xsl:element>
			</xsl:element>
			<xsl:element name="table">
				<xsl:element name="caption">
					Im&#243;veis
				</xsl:element>
				<xsl:attribute name="id">tabelaImoveis</xsl:attribute>
				<xsl:attribute name="name">tabelaImoveis</xsl:attribute>
				<xsl:attribute name="class">tabelaImoveis</xsl:attribute>
				<xsl:element name="thead">
					<xsl:attribute name="class">tabelaImoveisHead</xsl:attribute>
					<xsl:element name="tr">
						<xsl:element name="th">
							<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
							Refer&#234;ncia
						</xsl:element>
						<xsl:element name="th">
							<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
							Endere&#231;o
						</xsl:element>
						<xsl:element name="th">
							<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
							Cidade
						</xsl:element>
						<xsl:element name="th">
							<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
							Estado
						</xsl:element>
						<xsl:element name="th">
							<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
							Geoposi&#231;&#227;o
						</xsl:element>
					</xsl:element>
				</xsl:element>
				<xsl:element name="tbody">
					<xsl:for-each select="imovel">
						<xsl:element name="tr">
							<xsl:attribute name="class">tabelaImoveisLinha<xsl:value-of select="position() mod 2"/></xsl:attribute>
							<xsl:element name="td">
								<xsl:element name="a">
									<xsl:attribute name="name">imovel<xsl:value-of select="key"/></xsl:attribute>
								</xsl:element>
								<xsl:attribute name="class">tabelaImoveisTD tabelaImoveisTDValor</xsl:attribute>
								<xsl:value-of select="key"/>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tabelaImoveisTD</xsl:attribute>
								<xsl:value-of select="endereco"/>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tabelaImoveisTD</xsl:attribute>
								<xsl:value-of select="cidade"/>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tabelaImoveisTD</xsl:attribute>
								<xsl:value-of select="estado"/>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="id">tdRef<xsl:value-of select="key"/></xsl:attribute>
								<xsl:attribute name="class">tabelaImoveisTD</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:for-each>
				</xsl:element>
				<xsl:element name="tfoot">
					<xsl:element name="tr">
						<xsl:attribute name="class">tabelaImoveisFoot</xsl:attribute>
						<xsl:attribute name="align">center</xsl:attribute>
						<xsl:element name="td">
							<xsl:attribute name="class">tabelaImoveisNavegacaoResumo</xsl:attribute>
							<xsl:attribute name="colspan">5</xsl:attribute>
							Quantidade de Im&#243;veis&#32;<xsl:value-of select="(count(imovel))"/>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:if test="count(/edificios/edificio)>0">
				<xsl:element name="p">
					<xsl:element name="a">
						<xsl:attribute name="href">#edificio</xsl:attribute>
						Tabela de Edif&#237;cios
					</xsl:element>
				</xsl:element>
			</xsl:if>
		</xsl:if>
	</xsl:template>
</xsl:stylesheet>
