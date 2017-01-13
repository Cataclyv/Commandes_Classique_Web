<%@ Page Language="C#" AutoEventWireup="true" CodeFile="authentification.aspx.cs" Inherits="Authentification_authentification" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form_authentification" runat="server">
    <div>
        <h2>Se connecter</h2>
        <p><asp:textbox id="TextBoxNom" runat="server" placeholder="Identifiant" /></p>
        <p><asp:textbox id="TextBoxPassword" runat="server" placeholder="Mot de passe" /></p>
		<asp:button ID="BoutonConnexion" text="Envoi" runat="server" OnClick="BoutonConnexion_Click"/>
        <p><asp:Label ID="LabelErreurConnexion" runat="server"></asp:Label></p>
    </div>
    </form>
</body>
</html>
