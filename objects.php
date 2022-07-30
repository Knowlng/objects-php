<?php

// Sukurti klasę "FutboloRungtynes".
// Klasės parametrai:  $patirtaTrauma, $kuriKomandaLaimejo, $rungtyniuRezultatas
// Metodai:
// simuliuotiTraumas() - pasitelkiant rand() funkcija ir generuojant skaičius nuo 1 iki 1000, grąžinti tokią informaciją - 
// jei sugeneruotas skaičius dalinasi iš 3,5 ir 10 - $patirtaTrauma = 2, kitais atvejais - $patirtaTrauma = 0.
// simuliuotiRungtynes() - pasitelkian rand() funkciją, grąžinti masyvą su dvejais skaičiais pvz.: [0,2], kur 
// pirmas skaičius yra pirmos komandos komandos įvarčių kiekis, o antras - antros komandos įvarčių kiekis.
// laimetojai() - priskiria argumentui $kuriKomandaLaimejo reikšmes: jei pirma komanda laimėjo - $kuriKomandaLaimejo = 1, kitu atveju $kuriKomandaLaimejo = 2

// Po klasės sukūrimo, sukurti objektą ir paleisti visus metodus.

class FutboloRungtynes {

    public $patirtaTrauma;
    public $kuriKomandaLaimejo;
    public $rungtyniuRezultatas;

    public function simuliuotiTraumas() {

        $random=rand(1,1000);

        if ($random% 3==0 ||$random% 5==0 || $random% 10==0) {
            return $this->patirtaTrauma = 2;
        } else {
            return $this->patirtaTrauma = 0;
        }
    }

    public function simuliuotiRungtynes() {
        $random=rand(0,5);
        $random1=rand(0,5);
        $this->rungtyniuRezultatas[] = $random;
        $this->rungtyniuRezultatas[] = $random1;
        return json_encode( $this->rungtyniuRezultatas);
    }

    public function laimetojai() {
        $this->simuliuotiRungtynes();
        if($this->rungtyniuRezultatas[0] == $this->rungtyniuRezultatas[1]) {
            return $this->kuriKomandaLaimejo = "lygiosios";
        } else if($this->rungtyniuRezultatas[0] > $this->rungtyniuRezultatas[1]) {
            return $this->kuriKomandaLaimejo = 1;
        } else {
            return $this->kuriKomandaLaimejo = 2;
        }
    }

}

$zaidimas = new FutboloRungtynes;

echo "Traumos: ".$zaidimas->simuliuotiTraumas();
echo "<br>";
echo "Rungtynių rezultatas: ".$zaidimas->simuliuotiRungtynes();
echo "<br>";
echo "Laimėjo: ".$zaidimas->laimetojai();

?>