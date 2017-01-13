using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.OleDb;

public partial class Commandes_catalogue : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string requête = "SELECT Titre FROM Enregistrement ORDER BY Titre;";

        GestionnaireDeConnexion connexionCourante = new GestionnaireDeConnexion();
        OleDbCommand cmd = new OleDbCommand(requête, connexionCourante.Connexion);
        OleDbDataReader lecteur = cmd.ExecuteReader();
        while (lecteur.Read())
        {

        }
    }
}