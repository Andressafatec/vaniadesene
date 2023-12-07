<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:variable	name="TIPO_VISUALIZA">4</xsl:variable>
	<xsl:variable	name="largura_p">15</xsl:variable>
	<xsl:variable	name="altura_p">12</xsl:variable>
	<xsl:decimal-format name="pt-br" decimal-separator="," grouping-separator="." minus-sign="-" percent="%" /> 
	<xsl:variable name="PASTA_SERVIDOR">/corweb/</xsl:variable>
	<xsl:variable name="URL">/corweb/</xsl:variable>
	<xsl:variable name="THUMB">thumb.php</xsl:variable>
	
	<xsl:template name="cabecalho">
		<xsl:element name="thead">
			<xsl:attribute name="class">tabelaImoveisHead</xsl:attribute>
			<xsl:element name="tr">
				<xsl:element name="th">
					<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
					<xsl:element name="div">
						<xsl:attribute name="id">tabelaImoveisThDivRef</xsl:attribute>
						<xsl:attribute name="class">tabelaImoveisThDivRef</xsl:attribute>
						<xsl:attribute name="onmouseover">PESQUISAR.exibeOrganizar();</xsl:attribute>
						<xsl:attribute name="onmouseout">PESQUISAR.escondeOrganizar();</xsl:attribute>
						<xsl:attribute name="onclick">PESQUISAR.organiza('referencia',<xsl:choose><xsl:when test="pesquisa/direcao &gt; 0">-1</xsl:when><xsl:otherwise>1</xsl:otherwise></xsl:choose>);</xsl:attribute>
						<xsl:element name="span">
							<xsl:attribute name="class">tabelaImoveisThSpanLabel</xsl:attribute>
							<xsl:value-of select="campos/referencia"/>
						</xsl:element>		
						<xsl:element name="span">
							<xsl:if test="pesquisa/ordem='referencia'">
								<xsl:choose>
									<xsl:when test="pesquisa/direcao &gt; 0">	
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/up.gif</xsl:attribute></xsl:element>
									</xsl:when>
									<xsl:otherwise>
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/down.gif</xsl:attribute></xsl:element>
									</xsl:otherwise>
								</xsl:choose>
							</xsl:if>
						</xsl:element>		
					</xsl:element>
				</xsl:element>
				<xsl:element name="th">
					<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
					<xsl:element name="div">
						<xsl:attribute name="id">tabelaImoveisThDivReg</xsl:attribute>
						<xsl:attribute name="class">tabelaImoveisThDivReg</xsl:attribute>
						<xsl:attribute name="onmouseover">PESQUISAR.exibeOrganizar();</xsl:attribute>
						<xsl:attribute name="onclick">PESQUISAR.organiza('regiao',<xsl:choose><xsl:when test="pesquisa/direcao &gt; 0">-1</xsl:when><xsl:otherwise>1</xsl:otherwise></xsl:choose>);</xsl:attribute>
						<xsl:element name="span">
							<xsl:attribute name="class">tabelaImoveisThSpanLabel</xsl:attribute>
							<xsl:choose>
								<xsl:when test="pesquisa/bairroNaPesquisa &gt; 0">
									<xsl:value-of select="substring(campos/bairro,1,12)"/>
								</xsl:when>
								<xsl:otherwise>
									<xsl:value-of select="substring(campos/regiao,1,12)"/>
								</xsl:otherwise>
							</xsl:choose>
						</xsl:element>		
						<xsl:element name="span">
							<xsl:if test="pesquisa/ordem='regiao'">
								<xsl:choose>
									<xsl:when test="pesquisa/direcao &gt; 0">	
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/up.gif</xsl:attribute></xsl:element>
									</xsl:when>
									<xsl:otherwise>
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/down.gif</xsl:attribute></xsl:element>
									</xsl:otherwise>
								</xsl:choose>
							</xsl:if>
						</xsl:element>		
					</xsl:element>
				</xsl:element>
				<xsl:element name="th">
					<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
					<xsl:element name="div">
						<xsl:attribute name="id">tabelaImoveisThDivTipo</xsl:attribute>
						<xsl:attribute name="class">tabelaImoveisThDivTipo</xsl:attribute>
						<xsl:attribute name="onmouseover">PESQUISAR.exibeOrganizar();</xsl:attribute>
						<xsl:attribute name="onclick">PESQUISAR.organiza('tipoimovel',<xsl:choose><xsl:when test="pesquisa/direcao &gt; 0">-1</xsl:when><xsl:otherwise>1</xsl:otherwise></xsl:choose>);</xsl:attribute>
						<xsl:element name="span">
							<xsl:attribute name="class">tabelaImoveisThSpanLabel</xsl:attribute>
							<xsl:value-of select="substring(campos/tipoimovel,1,10)"/>
						</xsl:element>		
						<xsl:element name="span">
							<xsl:if test="pesquisa/ordem='tipoimovel'">
								<xsl:choose>
									<xsl:when test="pesquisa/direcao &gt; 0">	
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/up.gif</xsl:attribute></xsl:element>
									</xsl:when>
									<xsl:otherwise>
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/down.gif</xsl:attribute></xsl:element>
									</xsl:otherwise>
								</xsl:choose>
							</xsl:if>
						</xsl:element>		
					</xsl:element>
				</xsl:element>
				<xsl:element name="th">
					<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
					<xsl:element name="div">
						<xsl:attribute name="id">tabelaImoveisThDivDor</xsl:attribute>
						<xsl:attribute name="class">tabelaImoveisThDivDor</xsl:attribute>
						<xsl:attribute name="onmouseover">PESQUISAR.exibeOrganizar();</xsl:attribute>
						<xsl:attribute name="onclick">PESQUISAR.organiza('dormitorio',<xsl:choose><xsl:when test="pesquisa/direcao &gt; 0">-1</xsl:when><xsl:otherwise>1</xsl:otherwise></xsl:choose>);</xsl:attribute>
						<xsl:element name="span">
							<xsl:attribute name="class">tabelaImoveisThSpanLabel</xsl:attribute>
							<xsl:value-of select="substring(campos/dormitorio,1,6)"/>
						</xsl:element>		
						<xsl:element name="span">
							<xsl:if test="pesquisa/ordem='dormitorio'">
								<xsl:choose>
									<xsl:when test="pesquisa/direcao &gt; 0">	
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/up.gif</xsl:attribute></xsl:element>
									</xsl:when>
									<xsl:otherwise>
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/down.gif</xsl:attribute></xsl:element>
									</xsl:otherwise>
								</xsl:choose>
							</xsl:if>
						</xsl:element>		
					</xsl:element>
				</xsl:element>
				<xsl:element name="th">
					<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
					<xsl:element name="div">
						<xsl:attribute name="id">tabelaImoveisThDivDop</xsl:attribute>
						<xsl:attribute name="class">tabelaImoveisThDivDop</xsl:attribute>
						<xsl:attribute name="onmouseover">PESQUISAR.exibeOrganizar();</xsl:attribute>
						<xsl:attribute name="onclick">PESQUISAR.organiza('suite',<xsl:choose><xsl:when test="pesquisa/direcao &gt; 0">-1</xsl:when><xsl:otherwise>1</xsl:otherwise></xsl:choose>);</xsl:attribute>
						<xsl:element name="span">
							<xsl:attribute name="class">tabelaImoveisThSpanLabel</xsl:attribute>
							<xsl:value-of select="substring(campos/suite,1,6)"/>
						</xsl:element>		
						<xsl:element name="span">
							<xsl:if test="pesquisa/ordem='suite'">
								<xsl:choose>
									<xsl:when test="pesquisa/direcao &gt; 0">	
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/up.gif</xsl:attribute></xsl:element>
									</xsl:when>
									<xsl:otherwise>
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/down.gif</xsl:attribute></xsl:element>
									</xsl:otherwise>
								</xsl:choose>
							</xsl:if>
						</xsl:element>		
					</xsl:element>
				</xsl:element>
				<xsl:element name="th">
					<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
					<xsl:element name="div">
						<xsl:attribute name="id">tabelaImoveisThDivGar</xsl:attribute>
						<xsl:attribute name="class">tabelaImoveisThDivGar</xsl:attribute>
						<xsl:attribute name="onmouseover">PESQUISAR.exibeOrganizar();</xsl:attribute>
						<xsl:attribute name="onclick">PESQUISAR.organiza('garagem',<xsl:choose><xsl:when test="pesquisa/direcao &gt; 0">-1</xsl:when><xsl:otherwise>1</xsl:otherwise></xsl:choose>);</xsl:attribute>
						<xsl:element name="span">
							<xsl:attribute name="class">tabelaImoveisThSpanLabel</xsl:attribute>
							<xsl:value-of select="substring(campos/garagem,1,6)"/>
						</xsl:element>		
						<xsl:element name="span">
							<xsl:if test="pesquisa/ordem='garagem'">
								<xsl:choose>
									<xsl:when test="pesquisa/direcao &gt; 0">	
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/up.gif</xsl:attribute></xsl:element>
									</xsl:when>
									<xsl:otherwise>
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/down.gif</xsl:attribute></xsl:element>
									</xsl:otherwise>
								</xsl:choose>
							</xsl:if>
						</xsl:element>		
					</xsl:element>
				</xsl:element>
				<xsl:element name="th">
					<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
					<xsl:element name="div">
						<xsl:attribute name="id">tabelaImoveisThDivValor</xsl:attribute>
						<xsl:attribute name="class">tabelaImoveisThDivValor</xsl:attribute>
						<xsl:attribute name="onmouseover">PESQUISAR.exibeOrganizar();</xsl:attribute>
						<xsl:attribute name="onclick">PESQUISAR.organiza('valor',<xsl:choose><xsl:when test="pesquisa/direcao &gt; 0">-1</xsl:when><xsl:otherwise>1</xsl:otherwise></xsl:choose>);</xsl:attribute>
						<xsl:element name="span">
							<xsl:attribute name="class">tabelaImoveisThSpanLabel</xsl:attribute>
							<xsl:value-of select="campos/valor"/>
						</xsl:element>		
						<xsl:element name="span">
							<xsl:if test="pesquisa/ordem='valor'">
								<xsl:choose>
									<xsl:when test="pesquisa/direcao &gt; 0">	
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/up.gif</xsl:attribute></xsl:element>
									</xsl:when>
									<xsl:otherwise>
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/down.gif</xsl:attribute></xsl:element>
									</xsl:otherwise>
								</xsl:choose>
							</xsl:if>
						</xsl:element>		
					</xsl:element>
				</xsl:element>
				<xsl:element name="th">
					<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
					<xsl:element name="div">
						<xsl:attribute name="id">tabelaImoveisThDivCond</xsl:attribute>
						<xsl:attribute name="class">tabelaImoveisThDivCond</xsl:attribute>
						<xsl:attribute name="onmouseover">PESQUISAR.exibeOrganizar();</xsl:attribute>
						<xsl:attribute name="onclick">PESQUISAR.organiza('condominio',<xsl:choose><xsl:when test="pesquisa/direcao &gt; 0">-1</xsl:when><xsl:otherwise>1</xsl:otherwise></xsl:choose>);</xsl:attribute>
						<xsl:element name="span">
							<xsl:attribute name="class">tabelaImoveisThSpanLabel</xsl:attribute>
							<xsl:value-of select="campos/condominio"/>
						</xsl:element>		
						<xsl:element name="span">
							<xsl:if test="pesquisa/ordem='condominio'">
								<xsl:choose>
									<xsl:when test="pesquisa/direcao &gt; 0">	
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/up.gif</xsl:attribute></xsl:element>
									</xsl:when>
									<xsl:otherwise>
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/down.gif</xsl:attribute></xsl:element>
									</xsl:otherwise>
								</xsl:choose>
							</xsl:if>
						</xsl:element>		
					</xsl:element>
				</xsl:element>
				<xsl:element name="th">
					<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
					<xsl:element name="div">
						<xsl:attribute name="id">tabelaImoveisThDivIPTU</xsl:attribute>
						<xsl:attribute name="class">tabelaImoveisThDivIPTU</xsl:attribute>
						<xsl:attribute name="onmouseover">PESQUISAR.exibeOrganizar();</xsl:attribute>
						<xsl:attribute name="onclick">PESQUISAR.organiza('iptu',<xsl:choose><xsl:when test="pesquisa/direcao &gt; 0">-1</xsl:when><xsl:otherwise>1</xsl:otherwise></xsl:choose>);</xsl:attribute>
						<xsl:element name="span">
							<xsl:attribute name="class">tabelaImoveisThSpanLabel</xsl:attribute>
							<xsl:value-of select="campos/iptu"/>
						</xsl:element>		
						<xsl:element name="span">
							<xsl:if test="pesquisa/ordem='iptu'">
								<xsl:choose>
									<xsl:when test="pesquisa/direcao &gt; 0">	
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/up.gif</xsl:attribute></xsl:element>
									</xsl:when>
									<xsl:otherwise>
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/down.gif</xsl:attribute></xsl:element>
									</xsl:otherwise>
								</xsl:choose>
							</xsl:if>
						</xsl:element>		
					</xsl:element>
				</xsl:element>
				<xsl:element name="th">
					<xsl:attribute name="class">tabelaImoveisTh</xsl:attribute>
					<xsl:element name="div">
						<xsl:attribute name="id">tabelaImoveisThDivFotos</xsl:attribute>
						<xsl:attribute name="class">tabelaImoveisThDivFotos</xsl:attribute>
						<xsl:attribute name="onmouseover">PESQUISAR.exibeOrganizar();</xsl:attribute>
						<xsl:attribute name="onclick">PESQUISAR.organiza('foto',<xsl:choose><xsl:when test="pesquisa/direcao &gt; 0">-1</xsl:when><xsl:otherwise>1</xsl:otherwise></xsl:choose>);</xsl:attribute>
						<xsl:element name="span">
							<xsl:attribute name="class">tabelaImoveisThSpanLabel</xsl:attribute>
							<xsl:value-of select="campos/foto"/>
						</xsl:element>		
						<xsl:element name="span">
							<xsl:if test="pesquisa/ordem='foto'">
								<xsl:choose>
									<xsl:when test="pesquisa/direcao &gt; 0">	
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/up.gif</xsl:attribute></xsl:element>
									</xsl:when>
									<xsl:otherwise>
										<xsl:element name="img"><xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/down.gif</xsl:attribute></xsl:element>
									</xsl:otherwise>
								</xsl:choose>
							</xsl:if>
						</xsl:element>		
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="linha">
		<xsl:variable name="URL_SERVIDOR"><xsl:value-of select="../pesquisa/servidor"/></xsl:variable>
		<xsl:element name="tr">
			<xsl:attribute name="class">tabelaImoveisLinha<xsl:value-of select="position() mod 2"/></xsl:attribute>
			<xsl:element name="td">
				<xsl:attribute name="class">tabelaImoveisTD tabelaImoveisTDValor</xsl:attribute>
				<xsl:attribute name="id">tdRef<xsl:value-of select="referencia"/></xsl:attribute>
				<xsl:element name="a">
					<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
					<xsl:attribute name="onclick">exibirDetalhes(&#39;tdRef<xsl:value-of select="referencia"/>&#39;,<xsl:value-of select="referencia"/>,<xsl:copy-of select="$TIPO_VISUALIZA"/>,&#39;tdRef<xsl:value-of select="referencia"/>&#39;);</xsl:attribute>
					<xsl:attribute name="onmouseover">PESQUISAR.exibeResumo(<xsl:value-of select="referencia"/>);</xsl:attribute>
					<xsl:attribute name="onmouseout">PESQUISAR.escondeResumo();</xsl:attribute>
					<xsl:attribute name="alt">Clique aqui para visualizar a ficha do Im&#243;vel/Bem <xsl:value-of select="referencia"/></xsl:attribute>
					<xsl:value-of select="referencia"/>
				</xsl:element>
			</xsl:element>
			<xsl:element name="td">
				<xsl:attribute name="class">tabelaImoveisTD</xsl:attribute>
				<xsl:choose>
					<xsl:when test="../pesquisa/bairroNaPesquisa &gt; 0">
						<xsl:value-of select="substring(bairro,1,15)"/>
					</xsl:when>
					<xsl:otherwise>
						<xsl:value-of select="substring(regiao,1,15)"/>
					</xsl:otherwise>
				</xsl:choose>
				
			</xsl:element>
			<xsl:element name="td">
				<xsl:attribute name="class">tabelaImoveisTD</xsl:attribute>
				<xsl:value-of select="tipoimovel"/>
			</xsl:element>
			<xsl:element name="td">
				<xsl:attribute name="class">tabelaImoveisTD tabelaImoveisTDValor</xsl:attribute>
				<xsl:choose>
					<xsl:when test="string-length(dormitorio/campo/valor)=0">&#160;</xsl:when>
					<xsl:otherwise><xsl:value-of select="format-number(dormitorio/campo/valor,'###.##0','pt-br')"/></xsl:otherwise>
				</xsl:choose>
			</xsl:element>
			<xsl:element name="td">
				<xsl:attribute name="class">tabelaImoveisTD tabelaImoveisTDValor</xsl:attribute>
				<xsl:choose>
					<xsl:when test="string-length(suite/campo/valor)=0">&#160;</xsl:when>
					<xsl:otherwise><xsl:value-of select="format-number(suite/campo/valor,'###.##0','pt-br')"/></xsl:otherwise>
				</xsl:choose>
			</xsl:element>
			<xsl:element name="td">
				<xsl:attribute name="class">tabelaImoveisTD tabelaImoveisTDValor</xsl:attribute>
				<xsl:choose>
					<xsl:when test="string-length(garagem/campo/valor)=0">&#160;</xsl:when>
					<xsl:otherwise><xsl:value-of select="format-number(garagem/campo/valor,'###.##0','pt-br')"/></xsl:otherwise>
				</xsl:choose>
			</xsl:element>
			<xsl:element name="td">
				<xsl:attribute name="class">tabelaImoveisTD tabelaImoveisTDValor</xsl:attribute>
				<xsl:value-of select="format-number(valor,'###.##0','pt-br')"/>
			</xsl:element>
			<xsl:element name="td">
				<xsl:attribute name="class">tabelaImoveisTD tabelaImoveisTDValor</xsl:attribute>
				<xsl:choose>
					<xsl:when test="string-length(condominio/valor)=0">&#160;</xsl:when>
					<xsl:otherwise><xsl:value-of select="format-number(condominio/valor,'###.##0','pt-br')"/></xsl:otherwise>
				</xsl:choose>
			</xsl:element>
			<xsl:element name="td">
				<xsl:attribute name="class">tabelaImoveisTD tabelaImoveisTDValor</xsl:attribute>
				<xsl:choose>
					<xsl:when test="string-length(iptu/valor)=0">&#160;</xsl:when>
					<xsl:otherwise><xsl:value-of select="format-number(iptu/valor,'###.##0','pt-br')"/></xsl:otherwise>
				</xsl:choose>
			</xsl:element>
			<xsl:element name="td">
				<xsl:attribute name="class">tabelaImoveisTD tabelaImoveisTDFoto</xsl:attribute>
				<xsl:choose>
					<xsl:when test="count(fotos/foto) &lt; 1">&#160;</xsl:when>
					<xsl:otherwise>
						<xsl:element name="img">
							<xsl:attribute name="src"><xsl:copy-of select="$URL_SERVIDOR"/><xsl:copy-of select="$PASTA_SERVIDOR"/><xsl:copy-of select="$THUMB"/>&#63;foto&#61;<xsl:value-of select="fotos/foto/valor"/>&amp;altura&#61;<xsl:copy-of select="$altura_p" />&amp;largura&#61;<xsl:copy-of select="$largura_p" /></xsl:attribute>
							<xsl:attribute name="onmouseover">PESQUISAR.exibirFoto(&#39;<xsl:copy-of select="$URL_SERVIDOR"/><xsl:copy-of select="$PASTA_SERVIDOR"/><xsl:copy-of select="$THUMB"/>&#63;foto&#61;<xsl:value-of select="fotos/foto/valor"/>&#39;)</xsl:attribute>
							<xsl:attribute name="onmouseout">PESQUISAR.fecharFoto(PESQUISAR)</xsl:attribute>
							<xsl:attribute name="height"><xsl:copy-of select="$altura_p" /></xsl:attribute>
						</xsl:element>
					</xsl:otherwise>
				</xsl:choose>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="corpo">
		<xsl:element name="tbody">
			<xsl:for-each select="imovel">
				<xsl:call-template name="linha"/>
			</xsl:for-each>
		</xsl:element>
	</xsl:template>
	<xsl:template name="rodape">
		<xsl:element name="tfoot">
			<xsl:element name="tr">
				<xsl:attribute name="class">tabelaImoveisFoot</xsl:attribute>
				<xsl:attribute name="onmouseover">PESQUISAR.escondeResumo();</xsl:attribute>
				<xsl:element name="td">
					<xsl:attribute name="colspan">11</xsl:attribute>
					<xsl:attribute name="align">center</xsl:attribute>
					<xsl:element name="table">
						<xsl:attribute name="id">tabelaImoveisNavegacao</xsl:attribute>
						<xsl:attribute name="name">tabelaImoveisNavegacao</xsl:attribute>
						<xsl:attribute name="class">tabelaImoveisNavegacao</xsl:attribute>
						<xsl:element name="tr">
							<xsl:attribute name="class">tabelaImoveisNavegacaoPg</xsl:attribute>
							<xsl:choose>
								<xsl:when test="count(pesquisa/navegacao/pagina) &gt; 0">
									<xsl:if test="number(pesquisa/navegacao/ini) &gt; 1">
										<xsl:element name="td">
											<xsl:attribute name="class">tabelaImoveisNavegacaoIni</xsl:attribute>
											<xsl:element name="a">
												<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
												<xsl:attribute name="onclick">PESQUISAR.carregaPagina(0);</xsl:attribute>
												&lt;&lt;
											</xsl:element>
										</xsl:element>
									</xsl:if>
									<xsl:for-each select="pesquisa/navegacao/pagina">
										<xsl:element name="td">
											<xsl:attribute name="class">tabelaImoveisNavegacaoPg</xsl:attribute>
											<xsl:choose>
												<xsl:when test="number(valor)!=number(../../pagina)">
													<xsl:element name="a">
														<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
														<xsl:attribute name="onclick">PESQUISAR.carregaPagina(<xsl:value-of select="valor"/>);</xsl:attribute>
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
									<xsl:if test="number(pesquisa/navegacao/fim) &gt; 1">
										<xsl:element name="td">
											<xsl:attribute name="class">tabelaImoveisNavegacaoFim</xsl:attribute>
											<xsl:element name="a">
												<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
												<xsl:attribute name="onclick">PESQUISAR.carregaPagina(<xsl:value-of select="pesquisa/navegacao/fim/valor"/>);</xsl:attribute>
												&gt;&gt;
											</xsl:element>
										</xsl:element>
									</xsl:if>
								</xsl:when>
							</xsl:choose>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:attribute name="class">tabelaImoveisNavegacaoResumo</xsl:attribute>
							<xsl:element name="td">
								<xsl:attribute name="class">tabelaImoveisNavegacaoResumo</xsl:attribute>
								<xsl:attribute name="colspan"><xsl:value-of select="(count(pesquisa/navegacao/pagina)+count(pesquisa/navegacao/ini)+count(pesquisa/navegacao/fim))"/></xsl:attribute>
								Resultado da Pesquisa <xsl:value-of select="pesquisa/total"/> Imóveis/Bens
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template match="imoveis">
		<xsl:choose>
			<xsl:when test="count(imovel) &gt; 0">
				<xsl:element name="table">
					<xsl:attribute name="id">tabelaImoveis</xsl:attribute>
					<xsl:attribute name="name">tabelaImoveis</xsl:attribute>
					<xsl:attribute name="class">tabelaImoveis</xsl:attribute>
					<xsl:call-template name="cabecalho"/>
					<xsl:call-template name="corpo"/>
					<xsl:call-template name="rodape"/>
				</xsl:element>
			</xsl:when>
			<xsl:otherwise>
				<xsl:element name="div">
					<xsl:element name="p">
						Infelizmente n&#227;o encontramos Im&#243;veis/Bens para satisfazer suas exig&#234;ncias.<br/>
						Tente novamente alterando a faixa de Valores ou defina outras Regi&#245;es ou desligue todos os Filtros Avan&#231;ados
					</xsl:element>
				</xsl:element>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
</xsl:stylesheet>
