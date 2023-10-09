<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<xsl:output method="html"/>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	
	<xsl:decimal-format name="pt-br" decimal-separator="," grouping-separator="." minus-sign="-" percent="%" /> 
	
	<xsl:variable	name="largura_g">354</xsl:variable>
	<xsl:variable	name="altura_g">270</xsl:variable>
	<xsl:variable	name="largura_p">195</xsl:variable>
	<xsl:variable	name="altura_p">150</xsl:variable>
	<xsl:variable	name="largura_p1">215</xsl:variable>
	<xsl:variable	name="altura_p1">160</xsl:variable>
	<xsl:variable	name="exibiranuncio">0</xsl:variable>
	<xsl:variable	name="exibirobsger">1</xsl:variable>
	
	<xsl:template match="imovel">
		<xsl:element name="div">
			<xsl:attribute name="id">divTopo</xsl:attribute>
			<xsl:attribute name="class">divTopo</xsl:attribute>
				<xsl:element name="table">					
					<xsl:attribute name="id">tabelaDet<xsl:value-of select="position()"/></xsl:attribute>
					<xsl:attribute name="class">tabelaValor</xsl:attribute>
					<xsl:element name="tbody">
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorChkImo</xsl:attribute>
								<xsl:attribute name="colspan">2</xsl:attribute>
								ATEN&#199;&#195;O&#58; Disponibilidade&#44; pre&#231;o e condi&#231;&#245;es sujeitas a confirma&#231;&#227;o&#46;
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
								<xsl:element name="td">
								<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
								Valor
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorValImo</xsl:attribute>
								<xsl:value-of select="format-number(valor,'###.##0','pt-br')"/>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:if test="string-length(saldo/valor)>0">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									Saldo Devedor
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorValImo</xsl:attribute>
									<xsl:value-of select="format-number(saldo/valor,'###.##0','pt-br')"/>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
							<xsl:if test="string-length(saldo/prestacao)>0">
								<xsl:element name="tr">
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
										Presta&#231;&#227;o
									</xsl:element>
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorValImo</xsl:attribute>
										<xsl:value-of select="format-number(saldo/prestacao,'###.##0','pt-br')"/>
									</xsl:element>
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:if>
							<xsl:if test="string-length(saldo/credor)>0">
								<xsl:element name="tr">
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
										Agente Credor
									</xsl:element>
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
										<xsl:value-of select="saldo/credor"/>
									</xsl:element>
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:if>
						</xsl:if>
						<xsl:if test="string-length(condominio/valor)>0">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									Condom&#237;nio
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorValImo</xsl:attribute>
									<xsl:value-of select="format-number(condominio/valor,'###.##0','pt-br')"/>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:if>
						<xsl:if test="string-length(iptu/valor)>0">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									IPTU
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorValImo</xsl:attribute>
									<xsl:value-of select="format-number(iptu/valor,'###.##0','pt-br')"/>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:if>
						<xsl:if test="string-length(interessado)>0">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									<xsl:element name="a">
										<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
										<xsl:attribute name="onclick">agendarVisita(<xsl:value-of select="referencia"/>,&#39;<xsl:value-of select="interessado"/>&#39;,&#39;interessado&#39;)</xsl:attribute>
										Agendar Visita									
									</xsl:element>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									<xsl:element name="a">
										<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
										<xsl:attribute name="onclick">marcarProposta(<xsl:value-of select="referencia"/>,&#39;<xsl:value-of select="interessado"/>&#39;,&#39;interessado&#39;)</xsl:attribute>
										Quero fazer uma Proposta
									</xsl:element>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:if>
						<xsl:if test="string-length(preinteressado)>0">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									<xsl:element name="a">
										<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
										<xsl:attribute name="onclick">agendarVisita(<xsl:value-of select="referencia"/>,&#39;<xsl:value-of select="preinteressado"/>&#39;,&#39;preinteressado&#39;)</xsl:attribute>
										Agendar Visita									
									</xsl:element>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									<xsl:element name="a">
										<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
										<xsl:attribute name="onclick">marcarProposta(<xsl:value-of select="referencia"/>,&#39;<xsl:value-of select="preinteressado"/>&#39;,&#39;preinteressado&#39;)</xsl:attribute>
										Quero fazer uma Proposta
									</xsl:element>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:if>
						<xsl:if test="string-length(exclusividade/valor)>0">
							<xsl:element name="tr">								
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									Exclusividade
								</xsl:element>
								<xsl:element name="td">		
									<xsl:attribute name="class">tdValorChkImo</xsl:attribute>
									<xsl:element name="input">
										<xsl:attribute name="type">checkbox</xsl:attribute>
										<xsl:attribute name="checked">true</xsl:attribute>
										<xsl:attribute name="disabled">true</xsl:attribute>
									</xsl:element>
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:element>
						</xsl:if>
						<xsl:if test="string-length(endereco)>0">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									Endere&#231;o
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
									<xsl:value-of select="endereco"/>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:if>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
								<xsl:attribute name="colspan">2</xsl:attribute>
								<xsl:value-of select="tipoimovel/descricao"/>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
								Finalidade
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
								<xsl:value-of select="finalidade"/>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
								Cidade
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
								<xsl:value-of select="cidade"/>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
								Regi&#227;o
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
								<xsl:value-of select="regiao"/>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
							</xsl:element>
						</xsl:element>
						<xsl:if test="string-length(bairro)>0">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									Bairro
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:value-of select="bairro"/>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:if>
						<xsl:if test="string-length(edificio/nome)>0">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									Edif&#237;cio
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
									<xsl:value-of select="edificio/nome"/>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:if>
						<xsl:if test="string-length(dormitorio/campo/valor)>0">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									<xsl:value-of select="dormitorio/campo/descricao"/>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
									<xsl:value-of select="format-number(dormitorio/campo/valor,'###.##0','pt-br')"/>&#160;
									<xsl:value-of select="dormitorio/campo/detalhe"/>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:if>
						<xsl:if test="string-length(suite/campo/descricao)>0">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									<xsl:value-of select="suite/campo/descricao"/>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
									<xsl:value-of select="format-number(suite/campo/valor,'###.##0','pt-br')"/>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:if>
						<xsl:if test="string-length(garagem/campo/valor)>0">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									<xsl:value-of select="garagem/campo/descricao"/>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
									<xsl:value-of select="format-number(garagem/campo/valor,'###.##0','pt-br')"/>&#160;
									<xsl:value-of select="garagem/campo/detalhe"/>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:if>
						<xsl:for-each select="campos/campo">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									<xsl:value-of select="descricao"/>
								</xsl:element>
								<xsl:element name="td">
									<xsl:choose>
										<xsl:when test="string-length(detalhe)>0">
											<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
											<xsl:value-of select="detalhe"/>
										</xsl:when>
										<xsl:otherwise>
											<xsl:choose>
												<xsl:when test="tipo='b'">
													<xsl:attribute name="class">tdValorChkImo</xsl:attribute>
													<xsl:element name="input">															
														<xsl:attribute name="type">checkbox</xsl:attribute>
														<xsl:attribute name="checked">true</xsl:attribute>
														<xsl:attribute name="disabled">true</xsl:attribute>
													</xsl:element>
												</xsl:when>
												<xsl:otherwise>
													<xsl:value-of select="format-number(valor,'###.##0','pt-br')"/>
												</xsl:otherwise>
											</xsl:choose>
										</xsl:otherwise>
									</xsl:choose>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:for-each>
						<xsl:if test="string-length(contato/nome)>0">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									<xsl:attribute name="colspan">3</xsl:attribute>
									<xsl:attribute name="align">center</xsl:attribute>
									Contato
								</xsl:element>
							</xsl:element>
							<xsl:if test="string-length(contato/nome)>0">
								<xsl:element name="tr">
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
										Nome
									</xsl:element>
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
										<xsl:value-of select="contato/nome"/>
									</xsl:element>
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:if>
							<xsl:if test="string-length(contato/telefone)>0">
								<xsl:element name="tr">
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
										Telefone
									</xsl:element>
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
										<xsl:value-of select="contato/telefone"/>
									</xsl:element>
								</xsl:element>
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
								</xsl:element>
							</xsl:if>
							<xsl:if test="string-length(contato/observacoes)>0">
								<xsl:element name="tr">
									<xsl:element name="td">
										<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
										<xsl:attribute name="colspan">2</xsl:attribute>
										<xsl:value-of select="contato/observacoes"/>
									</xsl:element>
								</xsl:element>
							</xsl:if>
						</xsl:if>
					</xsl:element>
					<xsl:if test="string-length(proposta/descricao)>0">
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
								<xsl:attribute name="colspan">3</xsl:attribute>
								<xsl:attribute name="align">center</xsl:attribute>
								Proposta
							</xsl:element>
						</xsl:element>
						<xsl:for-each select="proposta/descricao">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
									<xsl:attribute name="colspan">3</xsl:attribute>
									<xsl:value-of select="."/><br/>
								</xsl:element>
							</xsl:element>
						</xsl:for-each>
					</xsl:if>
					<xsl:if test="number($exibirobsger)>0">
						<xsl:if test="string-length(observacoes/gerais)>0">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
									<xsl:attribute name="colspan">3</xsl:attribute>
									<xsl:attribute name="align">center</xsl:attribute>
									Observa&#231;&#245;es Gerais
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
									<xsl:attribute name="colspan">3</xsl:attribute>
									<xsl:value-of select="observacoes/gerais"/>
								</xsl:element>
							</xsl:element>
						</xsl:if>
					</xsl:if>
				</xsl:element>
			<xsl:if test="string-length(fotos/foto/valor)>0">
				<xsl:for-each select="fotos/foto">
					<xsl:if test="position()&lt;=1">
                        <xsl:element name="img">
                            <xsl:attribute name="id">imgFoto<xsl:value-of select="position()"/></xsl:attribute>
                            <xsl:attribute name="class">imgFoto</xsl:attribute>
                            <xsl:attribute name="src">thumb.php&#63;foto&#61;<xsl:value-of select="valor"/>&amp;altura&#61;<xsl:copy-of select="$altura_g" />&amp;largura&#61;<xsl:copy-of select="$largura_g" /></xsl:attribute>
                            <xsl:attribute name="alt"></xsl:attribute>
                        </xsl:element>
					</xsl:if>
				</xsl:for-each>
			</xsl:if>
		</xsl:element>		
		<xsl:if test="string-length(fotos/foto/valor)>0">
			<xsl:element name="div">
				<xsl:attribute name="id">divThumbs</xsl:attribute>
				<xsl:attribute name="class">divThumbs</xsl:attribute>
				<xsl:for-each select="fotos/foto">
					<xsl:if test="position()&gt;2">
						<xsl:if test="position()&lt;6">
							<xsl:element name="span">
								<xsl:attribute name="id">spanThumb<xsl:value-of select="position()"/></xsl:attribute>
								<xsl:attribute name="class">spanThumb</xsl:attribute>
								<xsl:element name="img">
									<xsl:attribute name="id">imgThumb<xsl:value-of select="position()"/></xsl:attribute>
									<xsl:attribute name="class">imgThumb</xsl:attribute>
									<xsl:attribute name="src">thumb.php&#63;foto&#61;<xsl:value-of select="valor"/>&amp;altura&#61;<xsl:copy-of select="$altura_p" />&amp;largura&#61;<xsl:copy-of select="$largura_p" /></xsl:attribute>
									<xsl:attribute name="alt"></xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:if>
					</xsl:if>
				</xsl:for-each>
			</xsl:element>		
			<xsl:element name="div">
				<xsl:attribute name="id">divThumbs1</xsl:attribute>
				<xsl:attribute name="class">divThumbs</xsl:attribute>
				<xsl:for-each select="fotos/foto">
					<xsl:if test="position()&gt;5">
						<xsl:if test="position()&lt;9">
							<xsl:element name="span">
								<xsl:attribute name="id">spanThumb<xsl:value-of select="position()"/></xsl:attribute>
								<xsl:attribute name="class">spanThumb</xsl:attribute>
								<xsl:element name="img">
									<xsl:attribute name="id">imgThumb<xsl:value-of select="position()"/></xsl:attribute>
									<xsl:attribute name="class">imgThumb</xsl:attribute>
									<xsl:attribute name="src">thumb.php&#63;foto&#61;<xsl:value-of select="valor"/>&amp;altura&#61;<xsl:copy-of select="$altura_p" />&amp;largura&#61;<xsl:copy-of select="$largura_p" /></xsl:attribute>
									<xsl:attribute name="alt"></xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:if>
					</xsl:if>
				</xsl:for-each>
			</xsl:element>		
		</xsl:if>
	</xsl:template>
</xsl:stylesheet>
