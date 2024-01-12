<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:decimal-format name="pt-br" decimal-separator="," grouping-separator="." minus-sign="-" percent="%" />
  <xsl:variable	name="largura_g">486</xsl:variable>
  <xsl:variable	name="altura_g">374</xsl:variable>
  <xsl:variable	name="largura_p">42</xsl:variable>
  <xsl:variable	name="altura_p">32</xsl:variable>
  <xsl:variable	name="exibiranuncio">0</xsl:variable>
  <xsl:variable	name="exibirobsger">1</xsl:variable>
  <xsl:variable	name="exibirobsimo">1</xsl:variable>
	<xsl:variable name="THUMB">thumb.php</xsl:variable>
	<xsl:variable name="PASTA_SERVIDOR">/corweb/</xsl:variable>
  <xsl:variable name="URL">/corweb/</xsl:variable>
  <xsl:output method="html"/>
  <xsl:template match="/">
    <xsl:apply-templates/>
  </xsl:template>
  <xsl:template name="detalhes">
		<xsl:element name="table">
			<xsl:attribute name="id">tabelaDet<xsl:value-of select="position()"/></xsl:attribute>
			<xsl:attribute name="class">tabelaValor</xsl:attribute>
			<xsl:element name="tbody">
				<xsl:choose>
					<xsl:when test="autenticado &lt;1 and (string-length(interessado)&gt;0) or (string-length(preinteressado)&gt;0)">
						<xsl:call-template name="links"/>
					</xsl:when>
					<xsl:otherwise>
						<xsl:call-template name="identificar"/>
					</xsl:otherwise>
				</xsl:choose>
				<xsl:if test="contrato='Empreendimento'">
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="colspan">3</xsl:attribute>
							<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
							<xsl:element name="a">
								<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
								<xsl:attribute name="onclick">IMO.financiamento.show();</xsl:attribute>
								Simule seu financiamento
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:if>
			</xsl:element>
			<xsl:call-template name="campos"/>
			<xsl:call-template name="obsimo"/>
			<xsl:if test="autenticado&gt;0"><xsl:call-template name="contato"/></xsl:if>
			<xsl:if test="autenticado&gt;0"><xsl:call-template name="proposta"/></xsl:if>
			<xsl:if test="autenticado&gt;0"><xsl:call-template name="obsger"/></xsl:if>
		</xsl:element>
  </xsl:template>
  <xsl:template name="campos">
		<xsl:if test="string-length(geoposicao/coordenadas)&gt;0">
			<xsl:element name="tr">
				<xsl:element name="td">
					<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
					<xsl:attribute name="colspan">2</xsl:attribute>
					<xsl:element name="a">
						<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
						<xsl:attribute name="onclick">visualizarMapa(<xsl:value-of select="referencia"/>,&#39;<xsl:value-of select="geoposicao/coordenadas"/>&#39;,<xsl:value-of select="geoposicao/tipo"/>)</xsl:attribute>
						Visualizar o mapa do Local
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:if>
		<xsl:element name="tr">
			<xsl:element name="td">
				<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
				<xsl:attribute name="colspan">2</xsl:attribute>
				<xsl:element name="a">
					<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
					<xsl:attribute name="onclick">IMO.indicarImovel(<xsl:value-of select="referencia"/>);</xsl:attribute>
					Indique para Amigo(a)
				</xsl:element>
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
		<xsl:if test="string-length(saldo/valor)&gt;0">
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
			<xsl:if test="string-length(saldo/prestacao)&gt;0">
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
			<xsl:if test="string-length(saldo/credor)&gt;0">
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
		<xsl:if test="string-length(condominio/valor)&gt;0">
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
		<xsl:if test="string-length(iptu/valor)&gt;0">
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
		<xsl:if test="string-length(exclusividade/valor)&gt;0">
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
		<xsl:if test="autenticado&gt;0"><xsl:call-template name="endereco"/></xsl:if>
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
				<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
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
				<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
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
				<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
				<xsl:value-of select="regiao"/>
			</xsl:element>
			<xsl:element name="td">
				<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
			</xsl:element>
		</xsl:element>
		<!--<xsl:if test="(autenticado&gt;0 and string-length(bairro)&gt;0) or (bairroNaPesquisa&gt;0 and string-length(bairro)&gt;0)">-->
		<xsl:if test="string-length(bairro)&gt;0">
			<xsl:element name="tr">
				<xsl:element name="td">
					<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
					Bairro
				</xsl:element>
				<xsl:element name="td">
					<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
					<xsl:attribute name="colspan">2</xsl:attribute>
					<xsl:value-of select="bairro"/>
				</xsl:element>
				<xsl:element name="td">
					<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:if>
		<xsl:if test="string-length(edificio/nome)&gt;0">
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
		<xsl:if test="string-length(dormitorio/campo/valor)&gt;0">
			<xsl:element name="tr">
				<xsl:element name="td">
					<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
					<xsl:value-of select="dormitorio/campo/descricao"/>
				</xsl:element>
				<xsl:element name="td">
					<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
					<xsl:value-of select="format-number(dormitorio/campo/valor,'###.##0','pt-br')"/>&#160;<xsl:value-of select="dormitorio/campo/detalhe"/>
				</xsl:element>
				<xsl:element name="td">
					<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:if>
		<xsl:if test="string-length(suite/campo/descricao)&gt;0">
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
		<xsl:if test="string-length(garagem/campo/valor)&gt;0">
			<xsl:element name="tr">
				<xsl:element name="td">
					<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
					<xsl:value-of select="garagem/campo/descricao"/>
				</xsl:element>
				<xsl:element name="td">
					<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
					<xsl:value-of select="format-number(garagem/campo/valor,'###.##0','pt-br')"/>&#160;<xsl:value-of select="garagem/campo/detalhe"/>
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
						<xsl:when test="string-length(detalhe)&gt;0">
							<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
							<xsl:value-of select="detalhe"/>
						</xsl:when>
						<xsl:otherwise>
							<xsl:choose>
								<xsl:when test="tipo='b'">
									<xsl:attribute name="class">tdValorChkImo</xsl:attribute>
									<xsl:element name="img">
										<xsl:attribute name="src">corweb/imagens/check.gif</xsl:attribute>
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
  </xsl:template>
  <xsl:template name="fotos">
		<xsl:variable name="URL_SERVIDOR"><xsl:value-of select="servidor"/></xsl:variable>
    <xsl:element name="div">
      <xsl:attribute name="id">divFotografia</xsl:attribute>
      <xsl:attribute name="class">divFotografia</xsl:attribute>
      <xsl:element name="div">
        <xsl:attribute name="id">divFotoG</xsl:attribute>
        <xsl:attribute name="class">divFotoG</xsl:attribute>
        <xsl:element name="img">
          <xsl:attribute name="id">imgFoto</xsl:attribute>
          <xsl:attribute name="class">imgFoto</xsl:attribute>
          <xsl:attribute name="src"><xsl:copy-of select="$URL_SERVIDOR"/><xsl:copy-of select="$PASTA_SERVIDOR"/><xsl:copy-of select="$THUMB"/>&#63;foto&#61;<xsl:choose><xsl:when test="string-length(fotos/foto/valor)&gt;0"><xsl:value-of select="fotos/foto/valor"/></xsl:when><xsl:otherwise></xsl:otherwise></xsl:choose>&amp;altura&#61;<xsl:copy-of select="$altura_g" />&amp;largura&#61;<xsl:copy-of select="$largura_g" /></xsl:attribute>
          <xsl:attribute name="alt"></xsl:attribute>
        </xsl:element>
      </xsl:element>
      <xsl:element name="div">
        <xsl:attribute name="id">divThumbs</xsl:attribute>
        <xsl:attribute name="class">divThumbs</xsl:attribute>
        <xsl:for-each select="filmes/filme">
          <xsl:element name="span">
            <xsl:attribute name="id">spanThumbsFilme<xsl:value-of select="position()"/></xsl:attribute>
            <xsl:attribute name="class">spanThumbs</xsl:attribute>
            <xsl:element name="img">
              <xsl:attribute name="id">imgFilme<xsl:value-of select="position()"/></xsl:attribute>
              <xsl:attribute name="class">imgFotoThumb<xsl:value-of select="position()"/></xsl:attribute>
              <xsl:attribute name="src">corweb/imagens/play.gif</xsl:attribute>
              <xsl:attribute name="alt">Clique para ver o Filme <xsl:value-of select="descricao"/></xsl:attribute>
              <xsl:attribute name="onclick">IMO.tocarFilme(<xsl:value-of select="position()"/>,&#39;<xsl:value-of select="tipo"/>&#39;);</xsl:attribute>
            </xsl:element>
          </xsl:element>
        </xsl:for-each>
        <xsl:for-each select="fotos/foto">
          <xsl:element name="span">
            <xsl:attribute name="id">spanThumbs<xsl:value-of select="position()"/></xsl:attribute>
            <xsl:attribute name="class">spanThumbs</xsl:attribute>
            <xsl:element name="img">
              <xsl:attribute name="id">imgFoto<xsl:value-of select="position()"/></xsl:attribute>
              <xsl:attribute name="class">imgFotoThumb</xsl:attribute>
              <xsl:attribute name="src"><xsl:copy-of select="$URL_SERVIDOR"/><xsl:copy-of select="$PASTA_SERVIDOR"/><xsl:copy-of select="$THUMB"/>&#63;foto&#61;<xsl:value-of select="valor"/>&amp;altura&#61;<xsl:copy-of select="$altura_p" />&amp;largura&#61;<xsl:copy-of select="$largura_p" /></xsl:attribute>
              <xsl:attribute name="alt">Clique para ver a Foto<xsl:value-of select="descricao"/></xsl:attribute>
              <xsl:attribute name="onclick">IMO.trocarImagem(&#39;<xsl:copy-of select="$URL_SERVIDOR"/>&#39;,&#39;<xsl:copy-of select="$PASTA_SERVIDOR"/>&#39;,&#39;<xsl:copy-of select="$THUMB"/>&#39;,&#39;<xsl:value-of select="valor"/>&#39;,<xsl:copy-of select="$largura_g" />,<xsl:copy-of select="$altura_g" />);</xsl:attribute>
            </xsl:element>
          </xsl:element>
        </xsl:for-each>
      </xsl:element>
    </xsl:element>
  </xsl:template>
  <xsl:template name="identificar">
		<xsl:if test="autenticado&lt;1">
			<xsl:element name="tr">
				<xsl:element name="td">
					<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
					<xsl:attribute name="align">center</xsl:attribute>
					<xsl:attribute name="colspan">2</xsl:attribute>
					Gostou deste Im&#243;vel&#63;
					<xsl:element name="br"/><xsl:element name="a">
						<xsl:attribute name="href">&#35;<xsl:value-of select="referencia"/></xsl:attribute>
						<xsl:attribute name="onclick">pedirIdentificacao(IMO.anchor,<xsl:value-of select="referencia"/>,<xsl:value-of select="tipovisualizacao"/>,IMO.anchor);IMO.fechar();</xsl:attribute>
						Identifique-se e entraremos em contato
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:if>
  </xsl:template>
  <xsl:template name="links">
		<xsl:element name="tr">
			<xsl:element name="td">
				<xsl:attribute name="colspan">2</xsl:attribute>
				<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
				<xsl:element name="a">
					<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
					<xsl:attribute name="onclick">IMO.mensagem.show();</xsl:attribute>
					Quero fazer uma pergunta ao Corretor
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
					<xsl:attribute name="onclick">IMO.visita.enviar();</xsl:attribute>
					Quero agendar uma Visita
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
					<xsl:attribute name="onclick">IMO.proposta.carregaCtr();</xsl:attribute>
					Quero fazer uma Proposta
				</xsl:element>
			</xsl:element>
			<xsl:element name="td">
				<xsl:attribute name="class">tdValorSepImo</xsl:attribute>
			</xsl:element>
		</xsl:element>
	</xsl:template>
  <xsl:template name="endereco">
		<xsl:if test="string-length(endereco)&gt;0">
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
  </xsl:template>
  <xsl:template name="contato">
		<xsl:if test="string-length(contato/nome)&gt;0">
			<xsl:element name="tr">
				<xsl:element name="td">
					<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
					<xsl:attribute name="colspan">3</xsl:attribute>
					<xsl:attribute name="align">center</xsl:attribute>
					Contato
				</xsl:element>
			</xsl:element>
			<xsl:if test="string-length(contato/nome)&gt;0">
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
			<xsl:if test="string-length(contato/telefone)&gt;0">
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
			<xsl:if test="string-length(contato/observacoes)&gt;0">
				<xsl:element name="tr">
					<xsl:element name="td">
						<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
						<xsl:attribute name="colspan">3</xsl:attribute>
						<xsl:attribute name="align">center</xsl:attribute>
						Observa&#231;&#245;es sobre o Contato
					</xsl:element>
				</xsl:element>
				<xsl:element name="tr">
					<xsl:element name="td">
						<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
						<xsl:attribute name="colspan">2</xsl:attribute>
						<xsl:value-of select="contato/observacoes"/>
					</xsl:element>
				</xsl:element>
			</xsl:if>
		</xsl:if>
  </xsl:template>
  <xsl:template name="proposta">
		<xsl:if test="string-length(proposta/descricao)&gt;0">
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
  </xsl:template>
  <xsl:template name="obsimo">
		<xsl:if test="number($exibirobsimo)>0">
			<xsl:if test="string-length(observacoes/imovel)&gt;0">
				<xsl:element name="tr">
					<xsl:element name="td">
						<xsl:attribute name="class">tdValorCabImo</xsl:attribute>
						<xsl:attribute name="colspan">3</xsl:attribute>
						<xsl:attribute name="align">center</xsl:attribute>
						Observa&#231;&#245;es sobre o Im&#243;vel
					</xsl:element>
				</xsl:element>
				<xsl:element name="tr">
					<xsl:element name="td">
						<xsl:attribute name="class">tdValorDetImo</xsl:attribute>
						<xsl:attribute name="colspan">3</xsl:attribute>
						<xsl:value-of select="observacoes/imovel"/>
					</xsl:element>
				</xsl:element>
			</xsl:if>
		</xsl:if>
  </xsl:template>
  <xsl:template name="obsger">
		<xsl:if test="number($exibirobsger)>0">
			<xsl:if test="string-length(observacoes/gerais)&gt;0">
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
  </xsl:template>
  <!--###############################################################-->
  <xsl:template match="imovel">
    <xsl:element name="div">
      <xsl:attribute name="id">divTitImovel</xsl:attribute>
      <xsl:attribute name="class">divTit</xsl:attribute>
      <xsl:element name="span">
        <xsl:attribute name="id">spanTitImovel</xsl:attribute>
        <xsl:attribute name="class">spanTit spanTitImovel</xsl:attribute>
        <xsl:if test="string-length(exclusividade/valor)>0">Exclusividade em</xsl:if><xsl:value-of select="contrato"/>&#160;Ref&#46;&#160;<xsl:value-of select="referencia"/>
      </xsl:element>
      <xsl:element name="span">
        <xsl:attribute name="id">spanTitFechar</xsl:attribute>
        <xsl:attribute name="class">spanTitBotoes</xsl:attribute>
        <xsl:element name="img">
          <xsl:attribute name="id">imgFechar</xsl:attribute>
					<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
          <xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/fechar.gif</xsl:attribute>
          <xsl:attribute name="onclick">IMO.fechar();</xsl:attribute>
          <xsl:attribute name="onmouseover">IMO.fechar_mouseover();</xsl:attribute>
          <xsl:attribute name="onmouseout">IMO.fechar_mouseout();</xsl:attribute>
        </xsl:element>
      </xsl:element>
    </xsl:element>
		<xsl:call-template name="fotos"/>
    <xsl:element name="div">
      <xsl:attribute name="id">divInfos</xsl:attribute>
      <xsl:attribute name="class">divInfos</xsl:attribute>
			<xsl:call-template name="detalhes"/>
    </xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divRodapeImo</xsl:attribute>
			<xsl:attribute name="class">divRodapeImo</xsl:attribute>
			<xsl:element name="b">Aten&#231;&#227;o&#58;&#32;</xsl:element>Disponibilidade&#44; pre&#231;o e condi&#231;&#245;es sujeitas a confirma&#231;&#227;o&#46;</xsl:element>
  </xsl:template>
</xsl:stylesheet>
