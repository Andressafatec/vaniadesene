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
			<xsl:attribute name="class">divBairros</xsl:attribute>
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
	<xsl:template match="/">
		<xsl:apply-templates/>
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
		<xsl:element name="div">
			<xsl:attribute name="id">divPromocoesVenda</xsl:attribute>
			<xsl:attribute name="class">divPromocoesVenda</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="class">divPromocoes</xsl:attribute>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="class">divPromocoesPg</xsl:attribute>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="class">divPromocoesTrabalho</xsl:attribute>
				<xsl:attribute name="style">display:none;</xsl:attribute>
				<xsl:element name="div">
					<xsl:attribute name="class">divPesquisaTrabalho</xsl:attribute>
					<xsl:attribute name="style">position:relative;left:45%;top:30%;display:block;</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divPromocoesLocacao</xsl:attribute>
			<xsl:attribute name="class">divPromocoesLocacao</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="class">divPromocoes</xsl:attribute>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="class">divPromocoesPg</xsl:attribute>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="class">divPromocoesTrabalho</xsl:attribute>
				<xsl:attribute name="style">display:none;</xsl:attribute>
				<xsl:element name="div">
					<xsl:attribute name="class">divPesquisaTrabalho</xsl:attribute>
					<xsl:attribute name="style">position:relative;left:45%;top:30%;display:block;</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<xsl:element name="div">
			<xsl:attribute name="id">divPromocoesEmpreendimento</xsl:attribute>
			<xsl:attribute name="class">divPromocoesEmpreendimento</xsl:attribute>
			<xsl:attribute name="style">display:none;</xsl:attribute>
			<xsl:element name="div">
				<xsl:attribute name="class">divPromocoes</xsl:attribute>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="class">divPromocoesPg</xsl:attribute>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="class">divPromocoesTrabalho</xsl:attribute>
				<xsl:attribute name="style">display:none;</xsl:attribute>
				<xsl:element name="div">
					<xsl:attribute name="class">divPesquisaTrabalho</xsl:attribute>
					<xsl:attribute name="style">position:relative;left:45%;top:30%;display:block;</xsl:attribute>
				</xsl:element>
			</xsl:element>
		</xsl:element>
		<xsl:call-template name="basicos"/>
		<xsl:call-template name="identificacao"/>
		<xsl:call-template name="mapa"/>
		<xsl:call-template name="financiamento"/>
		<xsl:call-template name="visita"/>
		<xsl:call-template name="proposta"/>
		<xsl:call-template name="mensagem"/>
		<xsl:call-template name="market"/>
		<xsl:call-template name="mensagem"/>
		<xsl:call-template name="inidicacaoimovel"/>
	</xsl:template>
</xsl:stylesheet>
