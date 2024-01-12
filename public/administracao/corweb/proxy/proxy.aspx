<%@ Page Language="C#"%>
<%@ Import Namespace="System" %>
<%@ Import Namespace="System.IO" %>
<%@ Import Namespace="System.Net" %>
<%@ Import Namespace="System.Xml" %>

<script runat="Server">

public XmlDocument getWebService(String url,String postData) {

  CookieContainer container = null;
  if (Session["CookieContainer"]!=null) {
    container = (CookieContainer)Session["CookieContainer"];
  } else {
    container = new CookieContainer();
    Session["CookieContainer"] = container;
  }

  HttpWebRequest webRequest = (HttpWebRequest)WebRequest.Create(url);
  webRequest.CookieContainer = container;

  if (postData!=null) {
    ASCIIEncoding encoding = new ASCIIEncoding ();
    byte[] byteParams = encoding.GetBytes(postData);
  
    webRequest.Method = "POST";
    webRequest.ContentType = "application/x-www-form-urlencoded";
    webRequest.ContentLength = byteParams.Length;

    Stream postStream = webRequest.GetRequestStream();
    postStream.Write(byteParams, 0, byteParams.Length);
    postStream.Close();
  }
  
  HttpWebResponse webResponse = (HttpWebResponse)webRequest.GetResponse();
  XmlDocument xml = new XmlDocument();
  xml.Load(webResponse.GetResponseStream());

  webResponse.Close();
  
  return xml;
}


</script>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
</head>
<body>

Exemplo de Chamada<br>
Para cada chamada use a URL da chamada como primeiro parametro (COMPLETA) e os parametros enviados por post no segundo parametro<br>
Os parametros devem ser passados já no padrão para o post, ou seja "param1=valor1&param2=valor2&etc.."
<p>

<%

XmlDocument xml = getWebService("http://sp.noip.us:8080/corweb/contratos.csp","ctr=2");
Response.Write(xml.InnerXml.Replace("<","&lt;").Replace(">","&gt;"));

%>

</body>
</html>
