using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.OleDb;
/// <summary>
/// Description résumée de GestionnaireDeConnexion
/// </summary>
public class GestionnaireDeConnexion
{
    public OleDbConnection Connexion { get; private set; }
    public GestionnaireDeConnexion()
    {
        string source = "INFO-SIMPLET";
        string nomBase = "Classique_Web";
        string Uid = "ETD";
        string Pwd = "ETD";
        string ChaineBd = "Provider=SQLOLEDB;Data Source=" + source + ";Initial Catalog=" + nomBase + ";Uid=" + Uid + "; Pwd=" + Pwd;

        Connexion = new OleDbConnection(ChaineBd);
        Connexion.Open();
    }
}