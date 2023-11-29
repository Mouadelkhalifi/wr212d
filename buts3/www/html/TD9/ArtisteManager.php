<?php
class ArtisteManager
{
    private $db; // La connexion à la base de données

    public function __construct($host, $username, $password, $database)
    {
        $this->db = new mysqli($host, $username, $password, $database);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function addArtiste(Artiste $artiste)
    {
        $nom = $this->db->real_escape_string($artiste->getNom());
        $prenom = $this->db->real_escape_string($artiste->getPrenom());
        $datenaissance = $this->db->real_escape_string($artiste->getDatenaissance());
        $specialite = $this->db->real_escape_string($artiste->getSpecialite());
        $image = $this->db->real_escape_string($artiste->getImage());

        $sql = "INSERT INTO Artiste (nom, prenom, datenaissance, specialite, image) 
                VALUES ('$nom', '$prenom', '$datenaissance', '$specialite', '$image')";

        if ($this->db->query($sql)) {
            return $this->db->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
            return false;
        }
    }
    public function getById($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM Artiste WHERE id = $id";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $artiste = new Artiste(
                $row['nom'],
                $row['prenom'],
                $row['datenaissance'],
                $row['specialite'],
                $row['image']
            );
            return $artiste;
        } else {
            return null;
        }
    }


    public function updateArtiste(Artiste $artiste)
    {
        $id = (int)$artiste->getId();
        $nom = $this->db->real_escape_string($artiste->getNom());
        $prenom = $this->db->real_escape_string($artiste->getPrenom());
        $datenaissance = $this->db->real_escape_string($artiste->getDatenaissance());
        $specialite = $this->db->real_escape_string($artiste->getSpecialite());
        $image = $this->db->real_escape_string($artiste->getImage());

        $sql = "UPDATE Artiste 
                SET nom='$nom', prenom='$prenom', datenaissance='$datenaissance', specialite='$specialite', image='$image', id='$id'
                WHERE id = $id";

        if ($this->db->query($sql)) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
            return false;
        }
    }

    public function getAll()
    {
        $sql = "SELECT * FROM Artiste";
        $result = $this->db->query($sql);
        $artistes = array();

        while ($row = $result->fetch_assoc()) {
            $artiste = new Artiste(
                $row['nom'],
                $row['prenom'],
                $row['datenaissance'],
                $row['specialite'],
                $row['image'],
                $row['id']
            );
            $artistes[] = $artiste;
        }

        return $artistes;
    }


    public function afficheAll()
    {
        $artistes = $this->getAll();
        $html = '<table>';
        $html .= '<tr><th>Nom</th><th>Prénom</th><th>Date de Naissance</th><th>Spécialité</th><th>Image</th><th>Modifier</th></tr>';
        foreach ($artistes as $artiste) {
            $html .= '<tr>';
            $html .= '<td>' . $artiste->getNom() . '</td>';
            $html .= '<td>' . $artiste->getPrenom() . '</td>';
            $html .= '<td>' . $artiste->getDatenaissance() . '</td>';
            $html .= '<td>' . $artiste->getSpecialite() . '</td>';
            $html .= '<td>' . $artiste->getImage() . '</td>';
            $html .= '<td><a href="modifier_artiste.php?id=' . $artiste->getId() . '">Modifier</a></td>';
            $html .= '</tr>';
        }
        $html .= '</table>';

        return $html;
    }

}
?>
