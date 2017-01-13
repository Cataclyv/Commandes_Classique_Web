using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.OleDb;

public partial class Authentification_authentification : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    protected void BoutonConnexion_Click(object sender, EventArgs e)
    {
        Abonné utilisateur = new Abonné();
        utilisateur.Login = TextBoxNom.Text;
        utilisateur.Password = TextBoxPassword.Text;

        string requête = "SELECT Code_Abonné, Nom_Abonné, Prénom_Abonné FROM Abonné WHERE Login = \'" + utilisateur.Login
                + "\' AND Password = \'" + utilisateur.Password + "\';";

        GestionnaireDeConnexion connexionCourante = new GestionnaireDeConnexion();
        OleDbCommand cmd = new OleDbCommand(requête, connexionCourante.Connexion);
        OleDbDataReader lecteur = cmd.ExecuteReader();
        if (lecteur.Read())
        {
            utilisateur.Code_Abonné = lecteur.GetInt32(0);
            utilisateur.Nom_Abonné = lecteur.GetString(1);
            utilisateur.Prénom_Abonné = lecteur.GetString(2);
        
            GestionAuthentification.UtilisateurCourant = utilisateur;
            Response.Redirect("../index.aspx");
        }
        else
        {
            LabelErreurConnexion.Text = "Erreur de connexion : identifiant et/ou mot de passe invalide...";
        }

        lecteur.Close();
        connexionCourante.Connexion.Close();
    }
}