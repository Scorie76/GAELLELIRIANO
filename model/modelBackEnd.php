<?php

require_once("modelManager.php");

class BackManager extends modelManager //création d'un objet 
{

    public function getListMessages() //chargement liste messages
    {
        $db = $this->dbConnect();
        $req = $db->query( 'SELECT  *   FROM contact ORDER BY dateJour DESC');
        return $req;
    }

    public function getListAvis() //chargement liste avis
    {
        $db = $this->dbConnect();
        $req = $db->query( 'SELECT  *   FROM avis_buffer ORDER BY dateJour DESC');
        return $req;
    }

    public function getListAvisEnLigne() //chargement liste avis
    {
        $db = $this->dbConnect();
        $req = $db->query( 'SELECT  *   FROM avis ORDER BY dateJour DESC');
        return $req;
    }

    public function getListClients() //chargement liste clients
    {
        $db = $this->dbConnect();
        $req = $db->query( 'SELECT  *   FROM fichier_client ORDER BY nom DESC');
        return $req;
    }

    public function deleteBufferAvis($id)
    {   
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM  avis_buffer WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();
        return $post;
    }

    public function deleteAvis($id)
    {   
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM  avis WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();
        return $post;
    }

    public function deleteClient($id)
    {   
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM  fichier_client WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();
        return $post;
    }

    public function postClient($Nom, $Prenom, $Adresse, $Code_postal, $Ville, $Telephone, $Mail, $Semaine, $Textarea)
    {
        $db = $this->dbConnect();
        // Insertion du message à l'aide d'une requête préparée
        $posts = $db->prepare('INSERT INTO fichier_client (nom, prenom, adresse, code_postal, ville, telephone, mail, semaine_resa, info_particuliere) VALUES( ?,?,?,?,?,?,?,?,?)');
        $affectedLines = $posts->execute(array($Nom, $Prenom, $Adresse, $Code_postal, $Ville, $Telephone, $Mail, $Semaine, $Textarea ));
        return $affectedLines;
    }

     public function updateClient ($Nom, $Prenom, $Adresse, $Code_postal, $Ville, $Telephone, $Mail, $Semaine, $Textarea, $id)
    {
        $db = $this->dbConnect();
        // modification du message à l'aide d'une requête préparée
        $req = $db->prepare('UPDATE fichier_client SET nom = :nvnom, prenom = :nvprenom, adresse = :nvadresse, code_postal = :nvcode_postal, ville = :nvville, telephone = :nvtelephone, mail = :nvmail, semaine_resa = :nvsemaine_resa, info_particuliere = :nvinfo_particuliere WHERE id = :id ');
        $req->execute(array(
        'nvnom'=> $Nom,
        'nvprenom'=> $Prenom,
        'nvadresse'=> $Adresse,
        'nvcode_postal'=> $Code_postal,
        'nvville'=> $Ville,
        'nvtelephone'=> $Telephone,
        'nvmail'=> $Mail,
        'nvsemaine_resa'=> $Semaine,
        'nvinfo_particuliere'=> $Textarea,
        'id'=> $id));
        return $req;
    }


    public function validateBufferAvis($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO  avis (id,nom, prenom, avis, mail, datejour) SELECT id, nom, prenom, avis, mail, datejour FROM avis_buffer WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();
        return $post;
    }


    public function MessageValidateBufferAvis()
    {
        echo "<script>alert(\"la variable est nulle\")</script>";
    }

    public function getAvis($avisId) //chargement des infos du billet en fonction de son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM avis WHERE id = ?');
        $req->execute(array($avisId));
        $post = $req->fetch();
        return $post;
    }

    public function getClient($clientId) //chargement des infos du billet en fonction de son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM fichier_client WHERE id = ?');
        $req->execute(array($clientId));
        $post = $req->fetch();
        return $post;
    }


    public function postResponse($postId, $author, $comment) // écriture du billet dans table comments_buffer
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO reponse_avis (id_avis, auteur, reponse, date_reponse) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;  
    }

     public function getreponses($avisId) // chargement des commentaires en fonction de l'id du billet associé
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, id_avis, auteur, reponse, date_reponse FROM reponse_avis WHERE id_avis = ? ORDER BY date_reponse');
        $comments->execute(array($avisId));
        return $comments;
    }

     public function deleteReponse($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM  reponse_contact WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();
        return $post;
    }

     public function deleteReponseAvis($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM  reponse_avis WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();
        return $post;
    }


     public function getMessage($messageId) //chargement des infos du message en fonction de son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM contact WHERE id = ?');
        $req->execute(array($messageId));
        $post = $req->fetch();
        return $post;
    }

     public function getComments($messageId) //chargement des réponses du message en fonction de son id
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT * FROM reponse_contact WHERE id_contact = ?');
        $comments->execute(array($messageId));
        return $comments;
    }





    public function deleteMessage($id)
    {   
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM  contact WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();
        return $post;
    }

     public function envoiMailing ($nom, $prenom,$textarea, $adresseMail) //envoi du message
    {
        $to  =  $adresseMail;
        $subject = 'Réponse à votre message posé sur le site "liriano-formation.fr"';
        $message = $textarea;
        $headers  = "From: gaelle.liriano@sfr.fr\n";
        $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n"; 
        $headers .='Content-Transfer-Encoding: 8bit'; 
        mail($to, utf8_decode($subject), utf8_decode($message),$headers );
        Echo ' le message a été envoyé';  
    }

    public function envoinewReponse ($id,$nom, $prenom,$textarea, $adresseMail) //envoi de la reponse du message
    {
        $db = $this->dbConnect();
        $infoMessage = $db->prepare('INSERT INTO reponse_contact (id_contact, nom, prenom, reponse, email_demandeur, date_reponse) VALUES(?,?, ?, ?, ?, NOW())');
        $affectedLines = $infoMessage->execute(array($id,$nom, $prenom,$textarea, $adresseMail));
        return $affectedLines;
    }







      public function disconnectSession()
    {
        session_start();
        session_unset ();
        session_destroy();
        ?>
        <script language="javascript">document.location="../index.php"</script>;<?php
    }


}