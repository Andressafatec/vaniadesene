<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:variable name="URL">/corweb/</xsl:variable>
	<xsl:output method="html"/>
	<xsl:template name="market">
		<xsl:element name="div">
			<xsl:attribute name="id">divMarket</xsl:attribute>
			<xsl:attribute name="class">divMarket</xsl:attribute>
			Tecnologia de:&#160;
			<xsl:element name="a">
				<xsl:attribute name="href">http://www.sistemasprofissionais.com.br</xsl:attribute>
				<xsl:attribute name="style">font-size:xx-small;</xsl:attribute>
				Sistemas Profissionais(Especializada em Softwares para o Ramo Imobili&#225;rio)
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="mensagem">
		<xsl:element name="div">
			<xsl:attribute name="id">divMensagem</xsl:attribute>
			<xsl:attribute name="class">divMensagem</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divTitMensagem</xsl:attribute>
				<xsl:attribute name="class">divTit</xsl:attribute>
				<xsl:attribute name="style">width:100%;</xsl:attribute>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitMensagem</xsl:attribute>
					<xsl:attribute name="class">spanTit spanTitMensagem</xsl:attribute>
					Mensagem para o Corretor
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitMensagemFechar</xsl:attribute>
					<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
					<xsl:element name="img">
						<xsl:attribute name="id">imgFecharMensagem</xsl:attribute>
						<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
						<xsl:attribute name="onclick">IMO.mensagem.hide();</xsl:attribute>
						<xsl:attribute name="onmouseout">IMO.mensagem.mouseOut();</xsl:attribute>
						<xsl:attribute name="onmouseover">IMO.mensagem.mouseOver();</xsl:attribute>
						<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/fechar.gif</xsl:attribute>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divMensagemConteudo</xsl:attribute>
				<xsl:attribute name="class">divMensagemConteudo</xsl:attribute>
				<xsl:element name="table">
					<xsl:attribute name="width">100%</xsl:attribute>
					<xsl:attribute name="border">0</xsl:attribute>
					<xsl:element name="tbody">
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="align">center</xsl:attribute>
								<xsl:element name="textarea">
									<xsl:attribute name="id">txtMens</xsl:attribute>
									<xsl:attribute name="cols">70</xsl:attribute>
									<xsl:attribute name="rows">20</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tfoot">
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="align">center</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">cmdEnviaMens</xsl:attribute>
									<xsl:attribute name="class">cmdEnvia</xsl:attribute>
									<xsl:attribute name="type">button</xsl:attribute>
									<xsl:attribute name="value">Enviar</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="id">tdMensErro</xsl:attribute>
								<xsl:attribute name="align">center</xsl:attribute>
								<xsl:attribute name="style">padding: 5px; color: red;</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="proposta">
		<xsl:element name="div">
			<xsl:attribute name="id">divCtrProposta</xsl:attribute>
			<xsl:attribute name="class">divCtrProposta</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divCtrPropTit</xsl:attribute>
				<xsl:attribute name="class">divTit</xsl:attribute>
				<xsl:attribute name="style">width:100%;</xsl:attribute>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitCtrProp</xsl:attribute>
					<xsl:attribute name="class">spanTit spanTitCtrProp</xsl:attribute>
					Contrato de Proposta
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitCtrPropFechar</xsl:attribute>
					<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
					<xsl:element name="img">
						<xsl:attribute name="id">imgFecharCtrProp</xsl:attribute>
						<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
						<xsl:attribute name="onclick">IMO.proposta.hideCtr();</xsl:attribute>
						<xsl:attribute name="onmouseout">IMO.proposta.ctrMouseOut();</xsl:attribute>
						<xsl:attribute name="onmouseover">IMO.proposta.ctrMouseOver();</xsl:attribute>
						<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/fechar.gif</xsl:attribute>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divCtrPropConteudo</xsl:attribute>
				<xsl:attribute name="class">divCtrPropConteudo</xsl:attribute>
			</xsl:element>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divProposta</xsl:attribute>
			<xsl:attribute name="class">divProposta</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divPropTit</xsl:attribute>
				<xsl:attribute name="class">divTit</xsl:attribute>
				<xsl:attribute name="style">width:100%;</xsl:attribute>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitProp</xsl:attribute>
					<xsl:attribute name="class">spanTit spanTitProp</xsl:attribute>
					Dados da Proposta
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitPropFechar</xsl:attribute>
					<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
					<xsl:element name="img">
						<xsl:attribute name="id">imgFecharProp</xsl:attribute>
						<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
						<xsl:attribute name="onclick">IMO.proposta.hide();</xsl:attribute>
						<xsl:attribute name="onmouseout">IMO.proposta.mouseOut();</xsl:attribute>
						<xsl:attribute name="onmouseover">IMO.proposta.mouseOver();</xsl:attribute>
						<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/fechar.gif</xsl:attribute>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divPropConteudo</xsl:attribute>
				<xsl:attribute name="class">divPropConteudo</xsl:attribute>
				<xsl:element name="table">
					<xsl:attribute name="border">0</xsl:attribute>
					<xsl:element name="tbody">
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="align">right</xsl:attribute>
								<xsl:attribute name="colspan">2</xsl:attribute>
								<xsl:element name="img">
									<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
									<xsl:attribute name="style">padding-left:2px;padding-right:2px</xsl:attribute>
								</xsl:element>
								Sua Oferta:
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">2</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">txtValor</xsl:attribute>
									<xsl:attribute name="class">txtValor</xsl:attribute>
									<xsl:attribute name="maxlength">20</xsl:attribute>
									<xsl:attribute name="name">txtValor</xsl:attribute>
									<xsl:attribute name="size">20</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="align">right</xsl:attribute>
								<xsl:attribute name="colspan">2</xsl:attribute>
								FGTS Disponivel:
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">2</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">txtFGTS</xsl:attribute>
									<xsl:attribute name="class">txtFGTS</xsl:attribute>
									<xsl:attribute name="maxlength">20</xsl:attribute>
									<xsl:attribute name="name">txtFGTS</xsl:attribute>
									<xsl:attribute name="size">20</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="colspan">8</xsl:attribute>
								<xsl:element name="hr" />
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="align">right</xsl:attribute>
								<xsl:attribute name="colspan">2</xsl:attribute>
								Tipo
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">2</xsl:attribute>
								<xsl:element name="select">
									<xsl:attribute name="id">cboTipoBem</xsl:attribute>
									<xsl:attribute name="style">width:100px;</xsl:attribute>
									<xsl:element name="option">
										<xsl:attribute name="selected">true</xsl:attribute>
										<xsl:attribute name="value">2</xsl:attribute>
										Imovel
									</xsl:element>
									<xsl:element name="option">
										<xsl:attribute name="value">1</xsl:attribute>
										Automovel
									</xsl:element>
									<xsl:element name="option">
										<xsl:attribute name="value">3</xsl:attribute>
										Outros
									</xsl:element>
								</xsl:element>
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="align">right</xsl:attribute>
								<xsl:attribute name="colspan">2</xsl:attribute>
								Valor
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">2</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">txtBemValor</xsl:attribute>
									<xsl:attribute name="class">txtBemValor</xsl:attribute>
									<xsl:attribute name="maxlength">20</xsl:attribute>
									<xsl:attribute name="name">txtBemValor</xsl:attribute>
									<xsl:attribute name="size">20</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="align">right</xsl:attribute>
								<xsl:attribute name="colspan">2</xsl:attribute>
								Descricao
							</xsl:element>
							<xsl:element name="td">
								<xsl:attribute name="colspan">6</xsl:attribute>
								<xsl:attribute name="rowspan">3</xsl:attribute>
								<xsl:element name="textarea">
									<xsl:attribute name="id">txtDesc</xsl:attribute>
									<xsl:attribute name="cols">60</xsl:attribute>
									<xsl:attribute name="name">txtDesc</xsl:attribute>
									<xsl:attribute name="rows">3</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="align">right</xsl:attribute>
								<xsl:attribute name="colspan">2</xsl:attribute>
								&#160;
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="align">right</xsl:attribute>
								<xsl:attribute name="colspan">2</xsl:attribute>
								&#160;
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tfoot">
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="colspan">8</xsl:attribute>
								<xsl:element name="hr" />
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="align">center</xsl:attribute>
								<xsl:attribute name="colspan">8</xsl:attribute>
								<xsl:element name="img">
									<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
									<xsl:attribute name="style">padding-left:2px;padding-right:2px</xsl:attribute>
								</xsl:element>
								Indica preenchimento Obrigatorio
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="align">center</xsl:attribute>
								<xsl:attribute name="colspan">8</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">cmdEnviaProp</xsl:attribute>
									<xsl:attribute name="class">cmdEnvia</xsl:attribute>
									<xsl:attribute name="type">button</xsl:attribute>
									<xsl:attribute name="value">Enviar</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="id">tdMensProp</xsl:attribute>
								<xsl:attribute name="align">center</xsl:attribute>
								<xsl:attribute name="colspan">8</xsl:attribute>
								<xsl:attribute name="style">padding: 5px; color: red;</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="visita">
    <xsl:element name="div">
      <xsl:attribute name="id">divVisit</xsl:attribute>
      <xsl:attribute name="style">display:none;</xsl:attribute>
      <xsl:element name="div">
        <xsl:attribute name="id">divVisitTit</xsl:attribute>
        <xsl:attribute name="class">divTit</xsl:attribute>
        <xsl:attribute name="style">width:100%;</xsl:attribute>
        <xsl:element name="span">
          <xsl:attribute name="id">spanTitVisit</xsl:attribute>
          <xsl:attribute name="class">spanTit spanTitVisit</xsl:attribute>
          Visita solicitada ao Corretor
        </xsl:element>
        <xsl:element name="span">
          <xsl:attribute name="id">spanTitVisitFechar</xsl:attribute>
          <xsl:attribute name="class">spanTitBotoes</xsl:attribute>
          <xsl:element name="img">
            <xsl:attribute name="id">imgFecharVisit</xsl:attribute>
            <xsl:attribute name="class">spanTitBotoes</xsl:attribute>
            <xsl:attribute name="onclick">IMO.visita.hide();</xsl:attribute>
            <xsl:attribute name="onmouseout">IMO.visita.mouseOut();</xsl:attribute>
            <xsl:attribute name="onmouseover">IMO.visita.mouseOver();</xsl:attribute>
            <xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/fechar.gif</xsl:attribute>
          </xsl:element>
        </xsl:element>
      </xsl:element>
      <xsl:element name="div">
        <xsl:attribute name="id">divVisitConteudo</xsl:attribute>
        <xsl:attribute name="class">divVisitConteudo</xsl:attribute>
        <xsl:element name="p">Sua solicita&#231;&#227;o foi enviada ao Corretor Respons&#225;vel pelo seu atendimento.</xsl:element>
        <xsl:element name="p">Por favor aguarde contato do Profissional.</xsl:element>
      </xsl:element>
    </xsl:element>
	</xsl:template>
	<xsl:template name="financiamento">
    <xsl:element name="div">
      <xsl:attribute name="id">divFinanciamento</xsl:attribute>
      <xsl:attribute name="class">divFinanciamento</xsl:attribute>
      <xsl:attribute name="style">display:none;</xsl:attribute>
      <xsl:element name="div">
        <xsl:attribute name="id">divTitFin</xsl:attribute>
        <xsl:attribute name="class">divTit</xsl:attribute>
        <xsl:attribute name="style">width:100%;</xsl:attribute>
        <xsl:element name="span">
          <xsl:attribute name="id">spanTitFin</xsl:attribute>
          <xsl:attribute name="class">spanTit spanTitFin</xsl:attribute>
        	<xsl:attribute name="style">float: left;</xsl:attribute>
          Simula&#231;&#227;o
        </xsl:element>
        <xsl:element name="span">
          <xsl:attribute name="id">spanTitFinFechar</xsl:attribute>
          <xsl:attribute name="class">spanTitBotoes</xsl:attribute>
          <xsl:element name="img">
            <xsl:attribute name="id">imgFecharFin</xsl:attribute>
            <xsl:attribute name="class">spanTitBotoes</xsl:attribute>
            <xsl:attribute name="onclick">IMO.financiamento.hide();</xsl:attribute>
            <xsl:attribute name="onmouseout">IMO.financiamento.mouseOut();</xsl:attribute>
            <xsl:attribute name="onmouseover">IMO.financiamento.mouseOver();</xsl:attribute>
            <xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/fechar.gif</xsl:attribute>
          </xsl:element>
        </xsl:element>
      </xsl:element>
      <xsl:element name="div">
        <xsl:attribute name="id">divFinConteudo</xsl:attribute>
        <xsl:attribute name="class">divFinConteudo</xsl:attribute>
        <xsl:element name="table">
					<xsl:attribute name="border">0</xsl:attribute>
          <xsl:element name="tbody">
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:element name="img">
									<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
									<xsl:attribute name="style">padding-left: 2px; padding-right: 2px;</xsl:attribute>
								</xsl:element>
								Valor:
							</xsl:element>
							<xsl:element name="td">
								<xsl:element name="input">
									<xsl:attribute name="id">txtFinValor</xsl:attribute>
									<xsl:attribute name="class">txtFinValor</xsl:attribute>
									<xsl:attribute name="maxlength">20</xsl:attribute>
									<xsl:attribute name="name">txtFinValor</xsl:attribute>
									<xsl:attribute name="onblur">IMO.financiamento.valida('txtFinValor');</xsl:attribute>
									<xsl:attribute name="size">20</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
									<xsl:attribute name="value">0</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:element name="img">
									<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
									<xsl:attribute name="style">padding-left: 2px; padding-right: 2px;</xsl:attribute>
								</xsl:element>
								Presta&#231;&#245;es
							</xsl:element>
							<xsl:element name="td">
								<xsl:element name="input">
									<xsl:attribute name="id">txtFinPrest</xsl:attribute>
									<xsl:attribute name="class">txtFinPrest</xsl:attribute>
									<xsl:attribute name="maxlength">20</xsl:attribute>
									<xsl:attribute name="name">txtFinPrest</xsl:attribute>
									<xsl:attribute name="onblur">IMO.financiamento.valida('txtFinPrest');</xsl:attribute>
									<xsl:attribute name="size">20</xsl:attribute>
									<xsl:attribute name="type">text</xsl:attribute>
									<xsl:attribute name="value">0</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="align">right</xsl:attribute>
								<xsl:attribute name="colspan">2</xsl:attribute>
								<xsl:element name="input">
									<xsl:attribute name="id">cmdCalcFin</xsl:attribute>
									<xsl:attribute name="class">cmdOk</xsl:attribute>
									<xsl:attribute name="onclick">IMO.financiamento.calcula();</xsl:attribute>
									<xsl:attribute name="type">button</xsl:attribute>
									<xsl:attribute name="value">Calcular</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
					</xsl:element>
          <xsl:element name="tfoot">
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="id">tdMensFin</xsl:attribute>
								<xsl:attribute name="align">center</xsl:attribute>
								<xsl:attribute name="colspan">2</xsl:attribute>
								<xsl:attribute name="style">padding: 5px; color: red;</xsl:attribute>
							</xsl:element>
						</xsl:element>
            <xsl:element name="tr">
              <xsl:element name="td">
                <xsl:attribute name="align">center</xsl:attribute>
                <xsl:attribute name="colspan">8</xsl:attribute>
                <xsl:attribute name="style">padding: 5px;</xsl:attribute>
                <xsl:element name="img">
                  <xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
                  <xsl:attribute name="style">padding-left: 2px; padding-right: 2px;</xsl:attribute>
                </xsl:element>
                Indica preenchimento Obrigat&#243;rio
              </xsl:element>
            </xsl:element>
            <xsl:element name="tr">
              <xsl:element name="td">
                <xsl:attribute name="id">tdMensCalc</xsl:attribute>
                <xsl:attribute name="align">center</xsl:attribute>
                <xsl:attribute name="colspan">8</xsl:attribute>
                <xsl:attribute name="style">padding: 5px; color: red;</xsl:attribute>
              </xsl:element>
            </xsl:element>
						<xsl:element name="tr">
							<xsl:element name="td">
								<xsl:attribute name="align">center</xsl:attribute>
								<xsl:attribute name="colspan">2</xsl:attribute>
								Simula&#231;&#227;o realizada com base na Tabela Price e Juros de 1&#37; ao m&#234;s &#40;12&#44;68&#37; ao Ano&#41;
							</xsl:element>
						</xsl:element>
          </xsl:element>
        </xsl:element>
      </xsl:element>
    </xsl:element>
	</xsl:template>
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
					<xsl:attribute name="class">spanTit spanTitMapa</xsl:attribute>
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
	<xsl:template name="basicos">
		<xsl:element name="div">
			<xsl:attribute name="id">divCliente</xsl:attribute>
			<xsl:attribute name="class">divCliente</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divAmpulheta</xsl:attribute>
			<xsl:attribute name="class">divAmpulheta</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divCards</xsl:attribute>
			<xsl:attribute name="class">divCards</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divInts</xsl:attribute>
			<xsl:attribute name="class">divOpcoesCorretasIdent</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divBairros</xsl:attribute>
			<xsl:attribute name="class">divBairros</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divThumb</xsl:attribute>
			<xsl:attribute name="class">divThumb</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divResumoImovel</xsl:attribute>
			<xsl:attribute name="class">divResumoImovel</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divResumoFoto</xsl:attribute>
				<xsl:attribute name="class">divResumoImg</xsl:attribute>
				<xsl:element name="img">
					<xsl:attribute name="id">imgResumoFoto</xsl:attribute>
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divResumoTxt</xsl:attribute>
				<xsl:attribute name="class">divResumoTxt</xsl:attribute>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="identificacao">
		<xsl:element name="div">
			<xsl:attribute name="id">divIdent</xsl:attribute>
			<xsl:attribute name="class">divIdent</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divTitIdent</xsl:attribute>
				<xsl:attribute name="class">divTit</xsl:attribute>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitIdent</xsl:attribute>
					<xsl:attribute name="class">spanTit spanTitIdent</xsl:attribute>
					Identifica&#231;&#227;o
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitFecharIdent</xsl:attribute>
					<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
					<xsl:element name="img">
						<xsl:attribute name="id">imgFecharIdent</xsl:attribute>
						<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
						<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/fechar.gif</xsl:attribute>
						<xsl:attribute name="onclick">INDENT.fechar();</xsl:attribute>
						<xsl:attribute name="onmouseover">INDENT.fechar_mouseout();</xsl:attribute>
						<xsl:attribute name="onmouseout">INDENT.fechar_mouseover();</xsl:attribute>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divIdentQ</xsl:attribute>
				<xsl:element name="p">Ao identificar-se, voc&#234; receber&#225; nossas ofertas em primeira m&#227;o, no momento que cadastrarmos em nosso banco de dados. &#201; simples, informe-nos apenas seu nome, sobrenome e e-mail.</xsl:element>
				<xsl:element name="p">Gostaria de se identificar agora?</xsl:element>
				<xsl:element name="p">
					<xsl:attribute name="align">left</xsl:attribute>
					<xsl:element name="input">
						<xsl:attribute name="id">optIndentS</xsl:attribute>
						<xsl:attribute name="class">optIndent</xsl:attribute>
						<xsl:attribute name="type">radio</xsl:attribute>
					</xsl:element>
					Sim. Pretendo me identificar agora.
					<xsl:element name="br"/>
					<xsl:element name="input">
						<xsl:attribute name="id">optIndentN</xsl:attribute>
						<xsl:attribute name="class">optIndent</xsl:attribute>
						<xsl:attribute name="type">radio</xsl:attribute>
					</xsl:element>
					N&#227;o. Desejo Permanecer An&#244;nimo ainda.
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divIdentNada</xsl:attribute>
				<xsl:element name="div">
					<xsl:attribute name="id">divIdentificacao</xsl:attribute>
					<xsl:attribute name="class">divIdentificacao</xsl:attribute>
					<xsl:element name="table">
						<xsl:attribute name="width">100%</xsl:attribute>
						<xsl:element name="tbody">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="align">right</xsl:attribute>
									<xsl:element name="img">
										<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
										<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
									</xsl:element>
									Nome:
								</xsl:element>
								<xsl:element name="td">
									<xsl:element name="input">
										<xsl:attribute name="id">txtNome</xsl:attribute>
										<xsl:attribute name="class">txtNome</xsl:attribute>
										<xsl:attribute name="maxlength">60</xsl:attribute>
										<xsl:attribute name="size">50</xsl:attribute>
										<xsl:attribute name="type">text</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="align">right</xsl:attribute>
									Telefone:
								</xsl:element>
								<xsl:element name="td">
									<xsl:element name="input">
										<xsl:attribute name="id">txtTelefone</xsl:attribute>
										<xsl:attribute name="class">txtTelefone</xsl:attribute>
										<xsl:attribute name="maxlength">16</xsl:attribute>
										<xsl:attribute name="size">16</xsl:attribute>
										<xsl:attribute name="type">text</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:element>							
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="align">right</xsl:attribute>
									<xsl:element name="img">
										<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
										<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
									</xsl:element>
									Email:
								</xsl:element>
								<xsl:element name="td">
									<xsl:element name="input">
										<xsl:attribute name="id">txtEmail</xsl:attribute>
										<xsl:attribute name="class">txtEmail</xsl:attribute>
										<xsl:attribute name="maxlength">60</xsl:attribute>
										<xsl:attribute name="size">50</xsl:attribute>
										<xsl:attribute name="type">text</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tfoot">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:attribute name="style">padding: 5px;</xsl:attribute>
									<xsl:attribute name="align">center</xsl:attribute>
									<xsl:element name="img">
										<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
										<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
									</xsl:element>
									Indica preenchimento Obrigat&#243;rio
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:attribute name="style">padding: 5px;</xsl:attribute>
									<xsl:attribute name="align">center</xsl:attribute>
									<xsl:element name="input">
										<xsl:attribute name="id">cmdEnvia</xsl:attribute>
										<xsl:attribute name="class">cmdEnvia</xsl:attribute>
										<xsl:attribute name="type">button</xsl:attribute>
										<xsl:attribute name="value">Enviar</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="id">tdMens</xsl:attribute>
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:attribute name="style">padding: 5px; color: red;</xsl:attribute>
									<xsl:attribute name="align">center</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="controles">
		<!-- Referencia -->
		<xsl:element name="div">
			<xsl:attribute name="id">divRef</xsl:attribute>
			<xsl:attribute name="class">divRef</xsl:attribute>
			<xsl:element name="label">
				<xsl:attribute name="id">labelRef</xsl:attribute>
				<xsl:attribute name="class">labelRef</xsl:attribute>
				<xsl:attribute name="for">txtRef</xsl:attribute>
				Ref.:
			</xsl:element>
			<xsl:element name="input">
				<xsl:attribute name="id">txtRef</xsl:attribute>
				<xsl:attribute name="name">txtRef</xsl:attribute>
				<xsl:attribute name="class">txtRef</xsl:attribute>
				<xsl:attribute name="maxlength">8</xsl:attribute>
				<xsl:attribute name="size">8</xsl:attribute>
				<xsl:attribute name="type">text</xsl:attribute>
			</xsl:element>
			<xsl:element name="input">
				<xsl:attribute name="id">cmdCons</xsl:attribute>
				<xsl:attribute name="class">cmdCons</xsl:attribute>
				<xsl:attribute name="onclick">exibirDetalhes($('txtRef'),$('txtRef').value,4,$('txtRef'));</xsl:attribute>
				<xsl:attribute name="type">button</xsl:attribute>
				<xsl:attribute name="value">Consulta</xsl:attribute>
			</xsl:element>
		</xsl:element>
		<!-- Contrato -->
		<xsl:element name="div">
			<xsl:attribute name="id">divContrato</xsl:attribute>
			<xsl:attribute name="class">divCampo divContrato</xsl:attribute>
			<xsl:element name="span">
				<xsl:attribute name="id">spanContrato</xsl:attribute>
				<xsl:attribute name="class">spanContrato</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="select">
					<xsl:attribute name="id">contrato</xsl:attribute>
				</xsl:element>
			</xsl:element>
			<xsl:element name="span">
				<xsl:attribute name="id">spanCarregaContrato</xsl:attribute>
				<xsl:attribute name="class">carrega spanCarregaContrato</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="img">
					<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<!-- Tipo de Im&oacute;vel -->
		<xsl:element name="div">
			<xsl:attribute name="id">divTipoImovel</xsl:attribute>
			<xsl:attribute name="class">divCampo divTipoImovel</xsl:attribute>
			<xsl:element name="span">
				<xsl:attribute name="id">spanTipoImovel</xsl:attribute>
				<xsl:attribute name="class">spanTipoImovel</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="select">
					<xsl:attribute name="id">tipoImovel</xsl:attribute>
				</xsl:element>
			</xsl:element>
			<xsl:element name="span">
				<xsl:attribute name="id">spanCarregaTipoImovel</xsl:attribute>
				<xsl:attribute name="class">carrega spanCarregaTipoImovel</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="img">
					<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<!-- Cidades -->
		<xsl:element name="div">
			<xsl:attribute name="id">divCidade</xsl:attribute>
			<xsl:attribute name="class">divCampo divCidade</xsl:attribute>
			<xsl:element name="span">
				<xsl:attribute name="id">spanCidade</xsl:attribute>
				<xsl:attribute name="class">spanCidade</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="select">
					<xsl:attribute name="id">cidade</xsl:attribute>
				</xsl:element>
			</xsl:element>
			<xsl:element name="span">
				<xsl:attribute name="id">spanCarregaCidade</xsl:attribute>
				<xsl:attribute name="class">carrega spanCarregaCidade</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="img">
					<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<!-- Regioes -->
		<xsl:element name="div">
			<xsl:attribute name="id">divRegioes</xsl:attribute>
			<xsl:attribute name="class">divPesquisa1 divRegioes</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divRegioesCtrl</xsl:attribute>
				<xsl:attribute name="class">divRegioesCtrl</xsl:attribute>
				<xsl:attribute name="onmouseover">COMBOS.mouseOverTit('regiao');</xsl:attribute>
				<xsl:attribute name="onmouseout">COMBOS.mouseOut();</xsl:attribute>
				<xsl:element name="span">
					<xsl:attribute name="id">spanRegioes</xsl:attribute>
					<xsl:element name="span">
						<xsl:attribute name="id">spanRegioesMax</xsl:attribute>
						<xsl:attribute name="style">display: inline;</xsl:attribute>
						<xsl:element name="img">
							<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/mais.gif</xsl:attribute>
							<xsl:attribute name="onclick">COMBOS.toogleRegiao()</xsl:attribute>
						</xsl:element>
					</xsl:element>
					<xsl:element name="span">
						<xsl:attribute name="id">spanRegioesMin</xsl:attribute>
						<xsl:attribute name="style">display: none;</xsl:attribute>
						<xsl:element name="img">
							<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/menos.gif</xsl:attribute>
							<xsl:attribute name="onclick">COMBOS.toogleRegiao()</xsl:attribute>
						</xsl:element>
					</xsl:element>
					<xsl:element name="span">
						<xsl:attribute name="id">spanRegioesTitulo</xsl:attribute>
						<xsl:attribute name="style">display: inline;</xsl:attribute>
						Regi&#245;es
					</xsl:element>
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="id">spanCarregaRegiao</xsl:attribute>
					<xsl:attribute name="class">carrega spanCarregaRegiao</xsl:attribute>
					<xsl:attribute name="style">display: inline;</xsl:attribute>
					<xsl:element name="img">
						<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
						<xsl:attribute name="onclick">toogleRegiao()</xsl:attribute>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divRegioesNada</xsl:attribute>
				<xsl:attribute name="class">divRegioesNada</xsl:attribute>
				<xsl:attribute name="style">display:none;</xsl:attribute>
				<xsl:element name="div">
					<xsl:attribute name="id">divRegioesCorpo</xsl:attribute>
					<xsl:attribute name="class">divRegioesCorpo</xsl:attribute>
					<xsl:attribute name="style">border: 1px solid black;overflow:auto;background-color:white;</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<!-- Pesquisa Por Pacote -->
		<xsl:element name="div">
			<xsl:attribute name="id">divPacote</xsl:attribute>
			<xsl:attribute name="class">divCampo divPacote</xsl:attribute>
			<xsl:attribute name="style">display: block;</xsl:attribute>
			<xsl:element name="span">
				<xsl:attribute name="id">spanPacote</xsl:attribute>
				<xsl:attribute name="class">spanPacote</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:attribute name="title">A pesquisa será feita somando os valores de Aluguel + IPTU + Condom&#237;nio</xsl:attribute>
				<xsl:element name="input">
					<xsl:attribute name="id">pacote</xsl:attribute>
					<xsl:attribute name="name">chkPacote</xsl:attribute>
					<xsl:attribute name="class">chkPacote</xsl:attribute>
					<xsl:attribute name="type">checkbox</xsl:attribute>
					<xsl:attribute name="value"></xsl:attribute>
				</xsl:element>				
				<xsl:element name="label">
					<xsl:attribute name="id">labelPacote</xsl:attribute>
					<xsl:attribute name="class">labelPacote</xsl:attribute>
					<xsl:attribute name="for">chkPacote</xsl:attribute>
					Pesquisa p/ Valor do Pacote
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<!-- Faixas Valores -->
		<xsl:element name="div">
			<xsl:attribute name="id">divFaixaValor</xsl:attribute>
			<xsl:attribute name="class">divCampo divFaixaValor</xsl:attribute>
			<xsl:element name="span">
				<xsl:attribute name="id">spanFaixaValor</xsl:attribute>
				<xsl:attribute name="class">spanFaixaValor</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="select">
					<xsl:attribute name="id">faixaValor</xsl:attribute>
				</xsl:element>
			</xsl:element>
			<xsl:element name="span">
				<xsl:attribute name="id">spanCarregaFaixaValor</xsl:attribute>
				<xsl:attribute name="class">carrega spanCarregaFaixaValor</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="img">
					<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<!-- Dormitorios -->
		<xsl:element name="div">
			<xsl:attribute name="id">divDormitorios</xsl:attribute>
			<xsl:attribute name="class">divCampo divDormitorios</xsl:attribute>
			<xsl:element name="span">
				<xsl:attribute name="id">spanDormitorios</xsl:attribute>
				<xsl:attribute name="class">spanDormitorios</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="select">
					<xsl:attribute name="id">dormitorios</xsl:attribute>
				</xsl:element>
			</xsl:element>
			<xsl:element name="span">
				<xsl:attribute name="id">spanCarregaDormitorios</xsl:attribute>
				<xsl:attribute name="class">carrega spanCarregaDormitorios</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="img">
					<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<!-- Suites -->
		<xsl:element name="div">
			<xsl:attribute name="id">divSuites</xsl:attribute>
			<xsl:attribute name="class">divCampo divSuites</xsl:attribute>
			<xsl:element name="span">
				<xsl:attribute name="id">spanSuites</xsl:attribute>
				<xsl:attribute name="class">spanSuites</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="select">
					<xsl:attribute name="id">suites</xsl:attribute>
				</xsl:element>
			</xsl:element>
			<xsl:element name="span">
				<xsl:attribute name="id">spanCarregaSuites</xsl:attribute>
				<xsl:attribute name="class">carrega spanCarregaSuites</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="img">
					<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<!-- Garagens -->
		<xsl:element name="div">
			<xsl:attribute name="id">divGaragens</xsl:attribute>
			<xsl:attribute name="class">divCampo divGaragens</xsl:attribute>
			<xsl:element name="span">
				<xsl:attribute name="id">spanGaragens</xsl:attribute>
				<xsl:attribute name="class">spanGaragens</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="select">
					<xsl:attribute name="id">garagens</xsl:attribute>
				</xsl:element>
			</xsl:element>
			<xsl:element name="span">
				<xsl:attribute name="id">spanCarregaGaragens</xsl:attribute>
				<xsl:attribute name="class">carrega spanCarregaGaragens</xsl:attribute>
				<xsl:attribute name="style">display: inline;</xsl:attribute>
				<xsl:element name="img">
					<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<!-- Opcionais -->
		<xsl:element name="div">
			<xsl:attribute name="id">divOpcionais</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divOpcionaisCtrl</xsl:attribute>
				<xsl:attribute name="class">divPesquisa1 divCampo divOpcionais</xsl:attribute>
				<xsl:attribute name="onmouseover">COMBOS.mouseOverTit('campo');</xsl:attribute>
				<xsl:attribute name="onmouseout">COMBOS.mouseOut();</xsl:attribute>
				<xsl:element name="div">
					<xsl:attribute name="id">divOpcionais</xsl:attribute>
					<xsl:element name="span">
						<xsl:attribute name="id">spanOpcionaisMais</xsl:attribute>
						<xsl:attribute name="class">spanOpcionaisBot</xsl:attribute>
						<xsl:attribute name="style">display: inline;</xsl:attribute>
						<xsl:element name="img">
							<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/mais.gif</xsl:attribute>
							<xsl:attribute name="onclick">COMBOS.toogleOpcionais();</xsl:attribute>
						</xsl:element>
					</xsl:element>
					<xsl:element name="span">
						<xsl:attribute name="id">spanOpcionaisMenos</xsl:attribute>
						<xsl:attribute name="class">spanOpcionaisBot</xsl:attribute>
						<xsl:attribute name="style">display: none;</xsl:attribute>
						<xsl:element name="img">
							<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/menos.gif</xsl:attribute>
							<xsl:attribute name="onclick">COMBOS.toogleOpcionais();</xsl:attribute>
						</xsl:element>
					</xsl:element>
					<xsl:element name="span">
						<xsl:attribute name="id">spanOpcionaisTitulo</xsl:attribute>
						<xsl:attribute name="class">spanOpcionaisTitulo</xsl:attribute>
						Filtro Avan&#231;ado
					</xsl:element>
					<xsl:element name="span">
						<xsl:attribute name="id">spanCarregaOpcionais</xsl:attribute>
						<xsl:attribute name="class">carrega spanCarregaOpcionais</xsl:attribute>
						<xsl:attribute name="style">display: inline</xsl:attribute>
						<xsl:element name="img">
							<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/loading.gif</xsl:attribute>
						</xsl:element>
					</xsl:element>
				</xsl:element>
				<xsl:element name="div">
					<xsl:attribute name="id">divOpcionaisNada</xsl:attribute>
					<xsl:attribute name="class">divOpcionaisNada</xsl:attribute>
					<xsl:attribute name="style">display: none;</xsl:attribute>
					<xsl:element name="div">
						<xsl:attribute name="id">divOpcionaisCorpo</xsl:attribute>
						<xsl:attribute name="class">divOpcionaisCorpo</xsl:attribute>
						<xsl:attribute name="style">border: 1px solid black;overflow:auto;background-color:white;</xsl:attribute>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:element name="input">
				<xsl:attribute name="id">pesquisar</xsl:attribute>
				<xsl:attribute name="class">pesquisar</xsl:attribute>
				<xsl:attribute name="type">button</xsl:attribute>
				<xsl:attribute name="value">Pesquisar</xsl:attribute>
				<xsl:attribute name="onclick">pesquisar();</xsl:attribute>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template name="menu">
		<xsl:element name="div">
			<xsl:attribute name="id">divMenu</xsl:attribute>
			<xsl:attribute name="class">divMenu</xsl:attribute>
			<xsl:element name="span">
				<xsl:attribute name="id">spanMenuLogin</xsl:attribute>
				<xsl:attribute name="class">spanMenuLogin</xsl:attribute>
				<xsl:element name="a">
					<xsl:attribute name="onclick">mostrarLogin();</xsl:attribute>
					<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
					Login
				</xsl:element>
			</xsl:element>
			<xsl:element name="span">
				<xsl:attribute name="id">spanMenuLogout</xsl:attribute>
				<xsl:attribute name="class">spanMenuLogout</xsl:attribute>
				<xsl:attribute name="style">display:none;</xsl:attribute>
				<xsl:element name="a">
					<xsl:attribute name="onclick">CTRLOGIN.logout();</xsl:attribute>
					<xsl:attribute name="href">javascript:void(0);</xsl:attribute>
					Logout
				</xsl:element>
			</xsl:element>
			<xsl:element name="span">
				<xsl:attribute name="id">spanMenuUsu</xsl:attribute>
				<xsl:attribute name="class">spanMenuUsu</xsl:attribute>
			</xsl:element>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divLogin</xsl:attribute>
			<xsl:attribute name="class">divLogin</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divTitLogin</xsl:attribute>
				<xsl:attribute name="class">divTit</xsl:attribute>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitLogin</xsl:attribute>
					<xsl:attribute name="class">spanTit spanTitLogin</xsl:attribute>
					<xsl:attribute name="style">float: left;</xsl:attribute>
					Login
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitFecharLogin</xsl:attribute>
					<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
					<xsl:element name="img">
						<xsl:attribute name="id">imgFecharLogin</xsl:attribute>
						<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
						<xsl:attribute name="onclick">CTRLOGIN.hide();</xsl:attribute>
						<xsl:attribute name="onmouseout">CTRLOGIN.mouseOut();</xsl:attribute>
						<xsl:attribute name="onmouseover">CTRLOGIN.mouseOver();</xsl:attribute>
						<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/fechar.gif</xsl:attribute>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:element name="table">
				<xsl:element name="tbody">
					<xsl:element name="tr">
						<xsl:element name="td">Usuario</xsl:element>
						<xsl:element name="td">
							<xsl:element name="input">
								<xsl:attribute name="id">txtUsu</xsl:attribute>
								<xsl:attribute name="class">txtUsu</xsl:attribute>
								<xsl:attribute name="maxlength">20</xsl:attribute>
								<xsl:attribute name="name">txtUsu</xsl:attribute>
								<xsl:attribute name="size">20</xsl:attribute>
								<xsl:attribute name="type">text</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">Senha</xsl:element>
						<xsl:element name="td">
							<xsl:element name="input">
								<xsl:attribute name="id">txtSenha</xsl:attribute>
								<xsl:attribute name="class">txtSenha</xsl:attribute>
								<xsl:attribute name="name">txtSenha</xsl:attribute>
								<xsl:attribute name="type">password</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="align">right</xsl:attribute>
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:element name="input">
								<xsl:attribute name="id">cmdOk</xsl:attribute>
								<xsl:attribute name="class">cmdOk</xsl:attribute>
								<xsl:attribute name="onclick">CTRLOGIN.login();</xsl:attribute>
								<xsl:attribute name="type">button</xsl:attribute>
								<xsl:attribute name="value">Ok</xsl:attribute>
							</xsl:element>
						</xsl:element>
					</xsl:element>
					<xsl:element name="tr">
						<xsl:element name="td">
							<xsl:attribute name="id">tdMensLogin</xsl:attribute>
							<xsl:attribute name="align">center</xsl:attribute>
							<xsl:attribute name="colspan">2</xsl:attribute>
							<xsl:attribute name="style">padding: 5px; color: red;</xsl:attribute>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	<xsl:template name="inidicacaoimovel">
		<xsl:element name="div">
			<xsl:attribute name="id">divIdentAmigo</xsl:attribute>
			<xsl:attribute name="class">divIdentAmigo</xsl:attribute>
			<xsl:attribute name="style">display:none; position: absolute;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divTitIdentAmigo</xsl:attribute>
				<xsl:attribute name="class">divTit</xsl:attribute>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitIdentAmigo</xsl:attribute>
					<xsl:attribute name="class">spanTit spanTitIdent</xsl:attribute>
					Identifica&#231;&#227;o do(a) Amigo(a)
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="id">spanTitFecharIdentAmigo</xsl:attribute>
					<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
					<xsl:element name="img">
						<xsl:attribute name="id">imgFecharIdentAmigo</xsl:attribute>
						<xsl:attribute name="class">spanTitBotoes</xsl:attribute>
						<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/fechar.gif</xsl:attribute>
						<xsl:attribute name="onclick">IDENTAMIGO.fechar();</xsl:attribute>
						<xsl:attribute name="onmouseover">IDENTAMIGO.fechar_mouseout();</xsl:attribute>
						<xsl:attribute name="onmouseout">IDENTAMIGO.fechar_mouseover();</xsl:attribute>
					</xsl:element>
				</xsl:element>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divIdentAmigoNada</xsl:attribute>
				<xsl:element name="div">
					<xsl:attribute name="id">divIdentificacaoAmigo</xsl:attribute>
					<xsl:attribute name="class">divIdentificacao</xsl:attribute>
					<xsl:element name="table">
						<xsl:attribute name="width">100%</xsl:attribute>
						<xsl:element name="tbody">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="align">right</xsl:attribute>
									<xsl:element name="img">
										<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
										<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
									</xsl:element>
									Seu Nome:
								</xsl:element>
								<xsl:element name="td">
									<xsl:element name="input">
										<xsl:attribute name="id">txtNomeIndicador</xsl:attribute>
										<xsl:attribute name="class">txtNome</xsl:attribute>
										<xsl:attribute name="maxlength">60</xsl:attribute>
										<xsl:attribute name="size">50</xsl:attribute>
										<xsl:attribute name="type">text</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="align">right</xsl:attribute>
									<xsl:attribute name="width">40%</xsl:attribute>
									<xsl:element name="img">
										<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
										<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
									</xsl:element>
									Email do(a) Amigo(a):
								</xsl:element>
								<xsl:element name="td">
									<xsl:element name="input">
										<xsl:attribute name="id">txtEmailIndicado</xsl:attribute>
										<xsl:attribute name="class">txtEmail</xsl:attribute>
										<xsl:attribute name="maxlength">60</xsl:attribute>
										<xsl:attribute name="size">50</xsl:attribute>
										<xsl:attribute name="type">text</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:element>
						</xsl:element>
						<xsl:element name="tfoot">
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:attribute name="style">padding: 5px;</xsl:attribute>
									<xsl:attribute name="align">center</xsl:attribute>
									<xsl:element name="img">
										<xsl:attribute name="src"><xsl:copy-of select="$URL" />imagens/bolav.gif</xsl:attribute>
										<xsl:attribute name="style">padding-left:2px;padding-right:2px;</xsl:attribute>
									</xsl:element>
									Indica preenchimento Obrigat&#243;rio
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:attribute name="style">padding: 5px;</xsl:attribute>
									<xsl:attribute name="align">center</xsl:attribute>
									<xsl:element name="input">
										<xsl:attribute name="id">cmdEnviaInd</xsl:attribute>
										<xsl:attribute name="class">cmdEnvia</xsl:attribute>
										<xsl:attribute name="type">button</xsl:attribute>
										<xsl:attribute name="value">Enviar</xsl:attribute>
									</xsl:element>
								</xsl:element>
							</xsl:element>
							<xsl:element name="tr">
								<xsl:element name="td">
									<xsl:attribute name="id">tdMensInd</xsl:attribute>
									<xsl:attribute name="colspan">2</xsl:attribute>
									<xsl:attribute name="style">padding: 5px; color: red; word-wrap: break-word; overflow: hidden;</xsl:attribute>
									<xsl:attribute name="align">center</xsl:attribute>
								</xsl:element>
							</xsl:element>
						</xsl:element>
					</xsl:element>
				</xsl:element>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>		
	<xsl:template match="contratos">
		<xsl:call-template name="menu"/>
		<xsl:call-template name="basicos"/>
		<xsl:call-template name="identificacao"/>
		<xsl:call-template name="mapa"/>
		<xsl:call-template name="financiamento"/>
		<xsl:call-template name="visita"/>
		<xsl:call-template name="proposta"/>
		<xsl:call-template name="mensagem"/>
		<xsl:call-template name="inidicacaoimovel"/>		
		<xsl:element name="div">
			<xsl:attribute name="id">divPesquisa</xsl:attribute>
			<xsl:attribute name="class">divPesquisa</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="id">divPesquisaContainer</xsl:attribute>
				<xsl:attribute name="class">divPesquisaContainer</xsl:attribute>
				<xsl:call-template name="controles"/>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divResultadoPesquisa</xsl:attribute>
				<xsl:attribute name="class">divResultadoPesquisa</xsl:attribute>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id">divPromocoesTrabalho</xsl:attribute>
				<xsl:attribute name="class">divPromocoesTrabalho</xsl:attribute>
				<xsl:attribute name="style">display:none;</xsl:attribute>
				<xsl:element name="div">
					<xsl:attribute name="id">divPesquisaTrabalho</xsl:attribute>
					<xsl:attribute name="class">divPesquisaTrabalho</xsl:attribute>
					<xsl:attribute name="style">position:relative;left:45%;top:25%;display:block;</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<xsl:call-template name="market"/>
	</xsl:template>		
</xsl:stylesheet>