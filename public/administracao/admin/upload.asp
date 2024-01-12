<%
SET Upload = Server.CreateObject("Persits.Upload")
Count = Upload.Save("e:\home\vaniadesene\web\imgs\banner")
 
Response.WRITE Count & " Arquivos novos em  e:\home\vaniadesene\web\imgs\banner\ "
%>