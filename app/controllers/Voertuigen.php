<?php

class Voertuigen extends Controller {
    private $voertuigmodel;


    public function __construct()
    {
        $this->voertuigmodel = $this->model('Voertuig');
    }

    public function index(){
        $records = $this -> voertuigmodel -> getInstructeur();

        $aantal = sizeof($records);

        $rows = '';
        foreach($records as $info) { 
            $rows .= "<tr>
                        <td>$info->VOORNAAM</td>
                        <td>$info->TUSSENVOEGSEL</td>
                        <td>$info->ACHTERNAAM</td>
                        <td>$info->MOBIEL</td>
                        <td>$info->DATUMINDIENST</td>
                        <td>$info->AANTALSTERREN</td>
                        <td><a href='" . URLROOT . "/voertuigen/voertuig/$info->Id'><img src='". URLROOT ."/img/b_help.png' alt='questionmark'></a></td>
                        
                    </tr>";
        }


        

        $data = [
            'title' => "Instructeurs in dienst",

            'rows' => $rows,
            'aantal' => $aantal,
        ];
        $this -> view('voertuigen/index', $data);
    }

    public function voertuig($id) {
        $records = $this -> voertuigmodel -> GetVoertuigbyId($id);
        $instructeur = $this-> voertuigmodel -> GetInstructeurbyId($id);



        $rows = '';
        foreach($records as $info) { 
            $rows .= "<tr>
                        <td>$info->TYPEVOERTUIG</td>
                        <td>$info->TYPE</td>
                        <td>$info->KENTEKEN</td>
                        <td>$info->BOUWJAAR</td>
                        <td>$info->BRANDSTOF</td>
                        <td>$info->RIJBEWIJS</td>
                        
                    </tr>";
        }

        $data = [
            'title' => "Door instructeur gebruikte voortuigen",

            'rows' => $rows,
            'voornaam' => $instructeur->VOORNAAM,
            'tussenvoegsel' => $instructeur->TUSSENVOEGSEL,
            'achternaam' => $instructeur->ACHTERNAAM,
            'datumindienst' => $instructeur->DATUMINDIENST,
            'sterren' => $instructeur->AANTALSTERREN

        ];
        $this -> view('voertuigen/voertuig', $data);

    }
}


