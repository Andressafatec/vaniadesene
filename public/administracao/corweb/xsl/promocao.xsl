<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:decimal-format name="pt-br" decimal-separator="," grouping-separator="." minus-sign="-" percent="%" /> 
	<xsl:variable	name="TIPO_VISUALIZA">5</xsl:variable>
	<xsl:variable	name="EXIBIRINFORMACOES">0</xsl:variable>
	<xsl:variable name="PASTA_SERVIDOR">/corweb/</xsl:variable>
	<xsl:variable name="THUMB">thumb.php</xsl:variable>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>

	<xsl:template name="navegacao">
		<xsl:element name="table">
			<xsl:attribute name="id">tabelaImoveisNavegacao</xsl:attribute>
			<xsl:attribute name="class">tabelaImoveisNavegacao</xsl:attribute>
			<xsl:attribute name="align">center</xsl:attribute>
			<xsl:element name="tr">
				<xsl:attribute name="class">tabelaImoveisNavegacaoPg</xsl:attribute>
				<xsl:choose>
					<xsl:when test="count(navegacao/paginas/pagina) &gt; 0">
						<xsl:if test="number(navegacao/paginas/ini) &gt; 1">
							<xsl:element name="td">
								<xsl:attribute name="class">tabelaImoveisNavegacaoIni</xsl:attribute>
								<xsl:element name="a">
									<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
									<xsl:attribute name="onclick">PROMOCOESV.carregaPagina(0);</xsl:attribute>
									&lt;&lt;
								</xsl:element>
							</xsl:element>
						</xsl:if>
						<xsl:for-each select="navegacao/paginas/pagina">
							<xsl:element name="td">
								<xsl:attribute name="class">tabelaImoveisNavegacaoPg</xsl:attribute>
								<xsl:choose>
									<xsl:when test="number(valor)!=number(../../pagina)">
										<xsl:element name="a">
											<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
											<xsl:attribute name="onclick">PROMOCOESV.carregaPagina(<xsl:value-of select="valor"/>);</xsl:attribute>
											<xsl:value-of select="number(valor)+1"/>
										</xsl:element>
									</xsl:when>
									<xsl:otherwise>
										<xsl:element name="span">
											<xsl:attribute name="class">spanLista</xsl:attribute>
											<xsl:value-of select="number(valor)+1"/>
										</xsl:element>
									</xsl:otherwise>
								</xsl:choose>
							</xsl:element>
						</xsl:for-each>
						<xsl:if test="number(navegacao/paginas/fim/valor) &gt; 1">
							<xsl:element name="td">
								<xsl:attribute name="class">tabelaImoveisNavegacaoFim</xsl:attribute>
								<xsl:element name="a">
									<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
									<xsl:attribute name="onclick">PROMOCOESV.carregaPagina(<xsl:value-of select="number(navegacao/paginas/fim/valor)-1"/>);</xsl:attribute>
									&gt;&gt;
								</xsl:element>
							</xsl:element>
						</xsl:if>
					</xsl:when>
				</xsl:choose>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="imo">
		<xsl:variable name="URL_SERVIDOR"><xsl:value-of select="../navegacao/servidor"/></xsl:variable>
		<xsl:element name="div">
			<xsl:attribute name="id">cardImovel<xsl:value-of select="position()"/></xsl:attribute>
			<xsl:attribute name="class">cardImovel</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divTit</xsl:attribute>
				<xsl:attribute name="class">divTit</xsl:attribute>
				<xsl:element name="a">
					<xsl:attribute name="href">&#35;<xsl:value-of select="referencia"/></xsl:attribute>
					<xsl:attribute name="onclick">exibirDetalhes(&#39;cardImovel<xsl:value-of select="position()"/>&#39;,<xsl:value-of select="referencia"/>,<xsl:copy-of select="$TIPO_VISUALIZA"/>,PROMOCOESV.getAnchor());</xsl:attribute>
					<xsl:attribute name="alt">Clique aqui para visualizar a ficha do Im&#243;vel/Bem <xsl:value-of select="referencia"/></xsl:attribute>
					<xsl:value-of select="contrato"/>&#160;Ref&#46;&#160;
					<xsl:value-of select="referencia"/>
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divFoto</xsl:attribute>
				<xsl:attribute name="class">divFoto</xsl:attribute>
				<xsl:element name="img">
					<xsl:attribute name="src"><xsl:copy-of select="$URL_SERVIDOR"/><xsl:copy-of select="$PASTA_SERVIDOR"/><xsl:copy-of select="$THUMB"/>&#63;foto&#61;<xsl:choose><xsl:when test="string-length(fotos/foto/valor)>0"><xsl:value-of select="fotos/foto/valor"/></xsl:when><xsl:otherwise></xsl:otherwise></xsl:choose>&amp;altura&#61;99&amp;largura&#61;128</xsl:attribute>
					<xsl:attribute name="onclick">exibirDetalhes(&#39;cardImovel<xsl:value-of select="position()"/>&#39;,<xsl:value-of select="referencia"/>,<xsl:copy-of select="$TIPO_VISUALIZA"/>,PROMOCOESV.getAnchor());</xsl:attribute>
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">panelAnu<xsl:value-of select="position()"/></xsl:attribute>
				<xsl:attribute name="class">panelAnu</xsl:attribute>
				<xsl:element name="div">
					<xsl:attribute name="id">panelHeaderAnu<xsl:value-of select="position()"/></xsl:attribute>
					<xsl:attribute name="class">panelHeader</xsl:attribute>
					<xsl:value-of select="regiao"/>
				</xsl:element>
				<xsl:element name="div">
					<xsl:attribute name="id">panelContentAnu<xsl:value-of select="position()"/></xsl:attribute>
					<xsl:attribute name="class">panelContent</xsl:attribute>
					<xsl:value-of select="anuncio"/>
				</xsl:element>
			</xsl:element>
			<xsl:if test="number($EXIBIRINFORMACOES)>0">
				<xsl:element name="div">
					<xsl:attribute name="id">panelVal</xsl:attribute>
					<xsl:attribute name="class">panelVal</xsl:attribute>
					<xsl:element name="div">
						<xsl:attribute name="id">panelHeaderVal<xsl:value-of select="position()"/></xsl:attribute>
						<xsl:attribute name="class">panelHeader</xsl:attribute>
						Valores
					</xsl:element>
					<xsl:element name="div">
						<xsl:attribute name="id">panelContentVal<xsl:value-of select="position()"/></xsl:attribute>
						<xsl:attribute name="class">panelContent</xsl:attribute>
						<xsl:element name="table">
							<xsl:attribute name="id">tabelaValor<xsl:value-of select="position()"/></xsl:attribute>
							<xsl:attribute name="class">tabelaValor</xsl:attribute>
							<xsl:element name="tbody">
								<xsl:element name="tr">
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorCab</xsl:attribute>
										Valor
									</xsl:element>
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorVal</xsl:attribute>
										<xsl:value-of select="format-number(valor,'###.##0','pt-br')"/>
									</xsl:element>
								</xsl:element>
								<xsl:if test="string-length(saldo/valor)>0">
									<xsl:element name="tr">
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorCab</xsl:attribute>
											Saldo Devedor
										</xsl:element>
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorVal</xsl:attribute>
											<xsl:value-of select="format-number(saldo/valor,'###.##0','pt-br')"/>
										</xsl:element>
									</xsl:element>
									<xsl:if test="string-length(saldo/prestacao)>0">
										<xsl:element name="tr">
											<xsl:element name="td">
												<xsl:attribute name="class">tdValorCab</xsl:attribute>
												Presta&#231;&#227;o
											</xsl:element>
											<xsl:element name="td">
												<xsl:attribute name="class">tdValorVal</xsl:attribute>
												<xsl:value-of select="format-number(saldo/prestacao,'###.##0','pt-br')"/>
											</xsl:element>
										</xsl:element>
									</xsl:if>
								</xsl:if>
								<xsl:if test="string-length(condominio/valor)>0">
									<xsl:element name="tr">
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorCab</xsl:attribute>
											Condom&#237;nio
										</xsl:element>
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorVal</xsl:attribute>
											<xsl:value-of select="format-number(condominio/valor,'###.##0','pt-br')"/>
										</xsl:element>
									</xsl:element>
								</xsl:if>
								<xsl:if test="string-length(iptu/valor)>0">
									<xsl:element name="tr">
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorCab</xsl:attribute>
											IPTU
										</xsl:element>
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorVal</xsl:attribute>
											<xsl:value-of select="format-number(iptu/valor,'###.##0','pt-br')"/>
										</xsl:element>
									</xsl:element>
								</xsl:if>
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:element>
				<xsl:element name="div">
					<xsl:attribute name="id">panelDet</xsl:attribute>
					<xsl:attribute name="class">panelDet</xsl:attribute>
					<xsl:element name="div">
						<xsl:attribute name="id">panelHeaderDet<xsl:value-of select="position()"/></xsl:attribute>
						<xsl:attribute name="class">panelHeader</xsl:attribute>
						Detalhes
					</xsl:element>
					<xsl:element name="div">
						<xsl:attribute name="id">panelContentDet<xsl:value-of select="position()"/></xsl:attribute>
						<xsl:attribute name="class">panelContent</xsl:attribute>
						<xsl:element name="table">
							<xsl:attribute name="id">tabelaDet<xsl:value-of select="position()"/></xsl:attribute>
							<xsl:attribute name="class">tabelaValor</xsl:attribute>
							<xsl:element name="tbody">
								<xsl:if test="string-length(exclusividade/valor)>0">
									<xsl:element name="tr">
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorCab</xsl:attribute>
											Exclusividade
										</xsl:element>
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorCab</xsl:attribute>
											<xsl:element name="input">
												<xsl:attribute name="type">checkbox</xsl:attribute>
												<xsl:attribute name="checked">true</xsl:attribute>
												<xsl:attribute name="disabled">true</xsl:attribute>
											</xsl:element>
										</xsl:element>
									</xsl:element>
								</xsl:if>
								<xsl:element name="tr">
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorCab</xsl:attribute>
										<xsl:attribute name="colspan">2</xsl:attribute>
										<xsl:value-of select="tipoimovel"/>
									</xsl:element>
								</xsl:element>
								<xsl:element name="tr">
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorCab</xsl:attribute>
										<xsl:attribute name="colspan">2</xsl:attribute>
										<xsl:value-of select="cidade"/>
									</xsl:element>
								</xsl:element>
								<xsl:element name="tr">
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorCab</xsl:attribute>
										<xsl:attribute name="colspan">2</xsl:attribute>
										<xsl:value-of select="regiao"/>
									</xsl:element>
								</xsl:element>
								<xsl:if test="string-length(bairro)>0">
									<xsl:element name="tr">
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorCab</xsl:attribute>
											<xsl:attribute name="colspan">2</xsl:attribute>
											<xsl:value-of select="bairro"/>
										</xsl:element>
									</xsl:element>
								</xsl:if>
								<xsl:if test="string-length(dormitorio/campo/descricao)>0">
									<xsl:element name="tr">
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorCab</xsl:attribute>
											<xsl:value-of select="dormitorio/campo/descricao"/>
										</xsl:element>
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorDet</xsl:attribute>
											<xsl:value-of select="format-number(dormitorio/campo/valor,'###.##0','pt-br')"/>
										</xsl:element>
									</xsl:element>
								</xsl:if>
								<xsl:if test="string-length(suite/campo/descricao)>0">
									<xsl:element name="tr">
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorCab</xsl:attribute>
											<xsl:value-of select="suite/campo/descricao"/>
										</xsl:element>
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorDet</xsl:attribute>
											<xsl:value-of select="format-number(suite/campo/valor,'###.##0','pt-br')"/>
										</xsl:element>
									</xsl:element>
								</xsl:if>
								<xsl:if test="string-length(garagem/campo/descricao)>0">
									<xsl:element name="tr">
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorCab</xsl:attribute>
											<xsl:value-of select="garagem/campo/descricao"/>
										</xsl:element>
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorDet</xsl:attribute>
											<xsl:value-of select="format-number(garagem/campo/valor,'###.##0','pt-br')"/>
										</xsl:element>
									</xsl:element>
								</xsl:if>
								<xsl:for-each select="campos/campo">
									<xsl:element name="tr">
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorCab</xsl:attribute>
											<xsl:value-of select="descricao"/>
										</xsl:element>
										<xsl:element name="td">
											<xsl:attribute name="class">tdValorDet</xsl:attribute>
											<xsl:element name="input">
												<xsl:attribute name="type">checkbox</xsl:attribute>
												<xsl:attribute name="checked">true</xsl:attribute>
												<xsl:attribute name="disabled">true</xsl:attribute>
											</xsl:element>
										</xsl:element>
									</xsl:element>
								</xsl:for-each>
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:if>
		</xsl:element>
	</xsl:template>
	<xsl:template match="imoveis">
		<xsl:element name="div">
			<xsl:attribute name="class">divPromocoes</xsl:attribute>
			<xsl:for-each select="imovel">
				<xsl:if test="string-length(referencia)>0">
					<xsl:call-template name="imo"/>
				</xsl:if>
			</xsl:for-each>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="class">divPromocoesPg</xsl:attribute>
			<xsl:attribute name="lala">Venda</xsl:attribute>
			<xsl:call-template name="navegacao"/>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="class">divPromocoesTrabalho</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="class">divPesquisaTrabalho</xsl:attribute>
				<xsl:attribute name="style">position:relative;left:45%;top:30%;display:block;</xsl:attribute>
			</xsl:element>
		</xsl:element>
	</xsl:template>
</xsl:stylesheet>
