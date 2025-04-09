<?php
class Etudiant {
    public $nom;
    public $notes = array();
    public function __construct($nom, $notes) {
        $this->nom = $nom;
        $this->notes = $notes;
    } 
    public function afficheNotes() {
        echo "Les notes de " . $this->nom . " sont : ";
        foreach ($this->notes as $note) {
            if ($note < 10) {
                return "<span class='badge bg-danger'>" . $note . "</span> ";
            } elseif ($note == 10) {
                return "<span class='badge bg-warning text-dark'>" . $note . "</span> ";
            } else {
                return"<span class='badge bg-success'>" . $note . "</span> ";
            }
        }
        echo "<br><br>";
    }
    public function calculMoy () {
        if (count($this->notes) == 0) {
            return 0;
        }
        $somme = array_sum($this->notes);
        $moyenne = $somme / count($this->notes);
        return $this->admis($moyenne); ;
    }
    public function admis($moy): string {
        if ($moy >= 10) {
            return $this->nom . " est admis avec une moyenne de " . $moy . "<br>";
        } else {
            return $this->nom . " est redoublant avec une moyenne de " . $moy . "<br>";
        }
    }

}
?>