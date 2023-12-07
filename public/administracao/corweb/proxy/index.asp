<!--#include file="config.asp"-->
<%
	Dim ws, sSource, arquivo, url, formRequest, headers, header, val, head, cookieVal, cookie

	arquivo = request.QueryString("url")
	If arquivo = "" Then
		arquivo = request.Form("url")
	End If

	url = "http://" & servidor
	If porta<>80 Then
		url = url & ":" & porta
	End If
	url = url & "/" & aplicacao & "/" & arquivo

	formRequest = request.Form
	If formRequest<>"" and request.QueryString<>"" Then formRequest = formRequest & "&"
	formRequest = formRequest & request.QueryString

	on error resume next
	Set ws = CreateObject("MSXML2.ServerXMLHTTP")
	if isempty(ws) then Set ws = CreateObject("WinHttp.WinHttpRequest.5.1")	'Winhttp is the best.
	if isempty(ws) then Set ws = CreateObject("WinHttp.WinHttprequest.5")	'Winhttp is the best.
	if isempty(ws) then Set ws = CreateObject("WinHttp.WinHttprequest")	'Winhttp is the best.
	on error goto 0

	ws.open "POST" , url, false

	ws.setRequestHeader "Host", servidor
	For Each val in Request.Cookies
		ws.setRequestHeader "Cookie", val & "=" & Request.Cookies(val)
	Next
	ws.setRequestHeader "User-Agent", request.ServerVariables("HTTP_USER_AGENT")

	ws.send(formRequest)

	sSource = ws.responseText

	response.ContentType = ws.getResponseHeader("Content-Type")
	val = ws.getResponseHeader("Set-Cookie")
	If val<>"" Then
		cookieVal = split(val,";")
		cookie = split(cookieVal(0),"=")
		response.cookies(cookie(0))=cookie(1)
	End If

	headers = split(ws.getAllResponseHeaders,vbCrLF)
	For i = 0 To UBound(headers)
		header = split(headers(i),":")
		If UBound(header)>=1 Then
			If header(0)<>"Set-Cookie" Then
				If UBound(header)=1 Then
					response.AddHeader header(0), header(1)
				ElseIf UBound(header)>1 Then
					val = ""
					For z = 1 to UBound(header)
						If val<>"" Then val = val & ":"
						val = val & header(z)
					Next
					response.AddHeader header(0), val
				End If
			End If
		End If
	Next

	response.write sSource

	Set ws = Nothing
%>