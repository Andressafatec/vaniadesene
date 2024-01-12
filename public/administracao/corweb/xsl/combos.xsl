<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
	
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	
	<xsl:template match="contratos">
		<xsl:element name="select">
		<xsl:attribute name="id">contrato</xsl:attribute>
		<xsl:attribute name="name">contrato</xsl:attribute>
		<xsl:attribute name="class">selectPesquisa</xsl:attribute>
		<xsl:attribute name="onchange">aninhaCbo.on_Change(&#39;contrato&#39;);</xsl:attribute>
		<xsl:for-each select="contrato">
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
	</xsl:template>

	<xsl:template match="tipoimoveis">
		<xsl:element name="select">
		<xsl:attribute name="id">tipoImovel</xsl:attribute>
		<xsl:attribute name="name">tipoImovel</xsl:attribute>
		<xsl:attribute name="class">selectPesquisa</xsl:attribute>
		<xsl:attribute name="onchange">aninhaCbo.on_Change(&#39;tipoImovel&#39;);</xsl:attribute>
		<xsl:for-each select="tipoimovel">
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
	</xsl:template>
	
	<xsl:template match="cidades">
		<xsl:element name="select">
		<xsl:attribute name="id">cidade</xsl:attribute>
		<xsl:attribute name="name">cidade</xsl:attribute>
		<xsl:attribute name="class">selectPesquisa</xsl:attribute>
		<xsl:attribute name="onchange">aninhaCbo.on_Change(&#39;cidade&#39;);</xsl:attribute>
		<xsl:for-each select="cidade">
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
	</xsl:template>

	<xsl:template match="regioes">
		<xsl:for-each select="regiao">
			<xsl:element name="div">
				<xsl:attribute name="id">divChk<xsl:value-of select="key"/></xsl:attribute>
				<xsl:attribute name="class">divChk</xsl:attribute>
				<xsl:attribute name="onmouseover">regiaoMouseOver(<xsl:value-of select="key"/>);</xsl:attribute>
				<xsl:attribute name="onmouseout">toolTipMouseOut();</xsl:attribute>
				<xsl:element name="input">
					<xsl:attribute name="id"><xsl:value-of select="key"/></xsl:attribute>
					<xsl:attribute name="class">chkRegiao</xsl:attribute>
					<xsl:attribute name="type">checkbox</xsl:attribute>
					<xsl:attribute name="onclick">adicionaRegiao(<xsl:value-of select="key"/>);</xsl:attribute>
					<xsl:if test="padrao=1">
						<xsl:attribute name="checked">true</xsl:attribute>
					</xsl:if>
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="class">spanLabelChk</xsl:attribute>
					<xsl:value-of select="nome"/>
				</xsl:element>
			</xsl:element>
		</xsl:for-each>
	</xsl:template>

	<xsl:template match="faixasvalores">
		<xsl:element name="select">
		<xsl:attribute name="id">faixaValor</xsl:attribute>
		<xsl:attribute name="name">faixaValor</xsl:attribute>
		<xsl:attribute name="class">selectPesquisa</xsl:attribute>
		<xsl:attribute name="onchange">aninhaCbo.on_Change(&#39;faixaValor&#39;);</xsl:attribute>
		<xsl:for-each select="faixavalor">
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
	</xsl:template>

	<xsl:template match="dormitorios">
		<xsl:element name="span">
			<xsl:attribute name="id">spanLabelDor</xsl:attribute>
			<xsl:attribute name="class">CampoEsq</xsl:attribute>
			<xsl:element name="label">
				<xsl:attribute name="id">labelDormitorios</xsl:attribute>
				<xsl:attribute name="for">dormitorios</xsl:attribute>
				<xsl:value-of select="campo/descricao"/>&#160;
			</xsl:element>
		</xsl:element>
		<xsl:element name="span">
			<xsl:attribute name="id">spanComboDor</xsl:attribute>
			<xsl:attribute name="class">CampoDir</xsl:attribute>
			<xsl:element name="select">
				<xsl:attribute name="id">dormitorios</xsl:attribute>
				<xsl:attribute name="class">selectPesquisa</xsl:attribute>
				<xsl:attribute name="onchange">aninhaCbo.on_Change(&#39;dormitorios&#39;);</xsl:attribute>
				<xsl:for-each select="dormitorio">
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
				<xsl:attribute name="onchange">aninhaCbo.on_Change(&#39;suites&#39;);</xsl:attribute>
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

	<xsl:template match="garagens">
		<xsl:element name="span">
			<xsl:attribute name="id">spanLabelGar</xsl:attribute>
			<xsl:attribute name="class">CampoEsq</xsl:attribute>
			<xsl:element name="label">
				<xsl:attribute name="id">labelGaragens</xsl:attribute>
				<xsl:attribute name="for">garagens</xsl:attribute>
				<xsl:value-of select="campo/descricao"/>&#160;
			</xsl:element>
		</xsl:element>
		<xsl:element name="span">
			<xsl:attribute name="id">spanComboGar</xsl:attribute>
			<xsl:attribute name="class">CampoDir</xsl:attribute>
			<xsl:element name="select">
				<xsl:attribute name="id">garagens</xsl:attribute>
				<xsl:attribute name="class">selectPesquisa</xsl:attribute>
				<xsl:attribute name="onchange">aninhaCbo.on_Change(&#39;garagens&#39;);</xsl:attribute>
				<xsl:for-each select="garagem">
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

	<xsl:template match="campos">
		<xsl:for-each select="campo">
			<xsl:element name="div">
				<xsl:attribute name="id">div<xsl:value-of select="key"/></xsl:attribute>
				<xsl:attribute name="name">div<xsl:value-of select="key"/></xsl:attribute>
				<xsl:attribute name="class">div<xsl:value-of select="key"/></xsl:attribute>
				<xsl:element name="input">
					<xsl:attribute name="type">checkbox</xsl:attribute>
					<xsl:attribute name="id"><xsl:value-of select="key"/></xsl:attribute>
					<xsl:attribute name="name"><xsl:value-of select="key"/></xsl:attribute>
					<xsl:attribute name="class">checkOpcionais</xsl:attribute>
					<xsl:if test="valor=1">
						<xsl:attribute name="checked">checked</xsl:attribute>
					</xsl:if>
				</xsl:element>
				<xsl:element name="span">
					<xsl:attribute name="id">spanDesc<xsl:value-of select="key"/></xsl:attribute>
					<xsl:attribute name="name">spanDesc<xsl:value-of select="key"/></xsl:attribute>
					<xsl:attribute name="class">spanDesc</xsl:attribute>
					<xsl:value-of select="descricao"/>
				</xsl:element>
			</xsl:element>
		</xsl:for-each>
	</xsl:template>

</xsl:stylesheet>
