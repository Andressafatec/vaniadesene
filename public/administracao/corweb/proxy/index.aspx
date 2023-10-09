<%@ Page Language="C#"%>
<%@ Import Namespace="System" %>
<%@ Import Namespace="System.IO" %>
<%@ Import Namespace="System.Net" %>
<%@ Import Namespace="System.Xml" %>
<!--#include file="config.aspx"-->
<script runat="server">
    protected void Page_Load(Object sender, EventArgs args){
        String paginaCSP = Request.QueryString["url"];
        String postData = "";
        postData = Request.QueryString.ToString().Replace("url=" + paginaCSP,"").Replace("?","") ;  
        XmlDocument xml = getWebService(servidor, porta, aplicacao,paginaCSP, postData);
        Response.ContentType = "text/xml";
        Response.Write(xml.InnerXml);
    }    
    
    public XmlDocument getWebService(String servidor, String porta, String aplicacao, String paginaCSP, String postData) {
      String url = "";      
      CookieContainer container = null;
      
      url = "http://" + servidor + ":" + porta + "/" + aplicacao + "/" + paginaCSP;      
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