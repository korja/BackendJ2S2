<?php

class Voertuig {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function GetInstructeur() {

        $this->db->query('SELECT Voornaam as VOORNAAM
                                ,Tussenvoegsel as TUSSENVOEGSEL
                                ,Achternaam AS ACHTERNAAM
                                ,Mobiel as MOBIEL
                                ,DatumInDienst AS DATUMINDIENST
                                ,AantalSterren as AANTALSTERREN
                                ,Id
                                FROM instructeur');
        $records = $this->db->resultSet();

        return $records;

    }

    public function GetInstructeurbyId($instructeurid) {

        $this->db->query('SELECT Voornaam as VOORNAAM
                                ,Tussenvoegsel as TUSSENVOEGSEL
                                ,Achternaam AS ACHTERNAAM
                                ,Mobiel as MOBIEL
                                ,DatumInDienst AS DATUMINDIENST
                                ,AantalSterren as AANTALSTERREN
                                ,Id
                                FROM instructeur
                                  where Instructeur.Id = :id; ');
                                  $this->db->bind(':id', $instructeurid);
        $records = $this->db->single();

        return $records;

    }

    public function GetVoertuigbyId($instructeurid) {
        $this->db->query('SELECT TypeVoertuig.TypeVoertuig as TYPEVOERTUIG
                                ,Voertuig.Type as `TYPE`
                                ,Voertuig.Kenteken as KENTEKEN
                                ,Voertuig.Bouwjaar as BOUWJAAR
                                ,Voertuig.Brandstof as BRANDSTOF
                                ,TypeVoertuig.Rijbewijscategorie as RIJBEWIJS
                                FROM VoertuigInstructeur
                                INNER JOIN Voertuig
                                on Voertuig.id = VoertuigInstructeur.VoertuigId
                                INNER JOIN TypeVoertuig
                                on TypeVoertuig.id = Voertuig.TypeVoertuigId
                                INNER JOIN Instructeur
                                on Instructeur.Id = VoertuigInstructeur.InstructeurId
                                where Instructeur.Id = :id; ');
                                $this->db->bind(':id', $instructeurid);

$records = $this->db->resultSet();

return $records;
    }
}