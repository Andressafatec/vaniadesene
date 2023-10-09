<% @ Page Language="C#" ContentType="text/html" Debug="true" %>
 
<html>
  <script runat="server">
    protected void Page_Load(Object Src, EventArgs E)
    {
 
      string versao_frame;
      int arq_bits;
 
      arq_bits = IntPtr.Size * 8;
      versao_frame = Environment.Version.ToString();
 
      Response.Write ("Sua hospedagem está configurada em: " + arq_bits + " bits");
      Response.Write ("<br>");
      Response.Write ("Sua hospedagem está configurada para utilizar o framework: " + versao_frame);
 
    }
  </script>
</html>