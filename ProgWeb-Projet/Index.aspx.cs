using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Index : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if(GestionAuthentification.UtilisateurCourant != null)
        {
            LabelBienvenue.Text = "Bienvenue, " + GestionAuthentification.UtilisateurCourant.Prénom_Abonné + " " 
                + GestionAuthentification.UtilisateurCourant.Nom_Abonné;
        }
    }
}