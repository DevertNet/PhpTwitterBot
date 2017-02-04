<?php
namespace Core\Generate\Text\German;

class General
{
    public $_templates = array(
        "#random{Moin|Moinsen|Tach|Hey|Hallo} Leute! #random{Wie gehts euch so?|Alles fit bei euch?|Alles klaro? :D} #random{#goodday|#nice|#allesklaro}",
        "Wenn du nicht weißt wer du bist, frag die anderen. Die wissen es sowieso immer besser!",
        "><(((('>",
        "Super Hot! ̿' ̿'\̵͇̿̿\з=(◕_◕)=ε/̵͇̿̿/'̿'̿ ̿, #random{#oculus|#rift|#zocken}",
        "So, #random{Schnitzel Hawaii|Jägerschnitzel|Salat} gibs #random{heute|morgen}. Ich hab nur die Beilage durch ein #random{Steak|halbes Schwein|Stück 'kleines' Fleisch} ersetzt.",
        "Jetzt wird erst ma ne runde gezockt #random{#oculus #rift|#counterstrike #cs16|#vr #tabletennis}",
        "Dieser kleine Hautfitzel an der Lippe den man einfach schnell abbeißen will und man dann die ganze Lippe abreißt.",
    );
    
    public function getText()
    {
        try {
            $template = $this->_templates[array_rand($this->_templates)];
            $data = array(array(0));
            $textGenerator = new \Neveldo\TextGenerator\TextGenerator();
            $textGenerator->compile($template);
            foreach($data as $row) {
                return $textGenerator->generate($row);
            }
        } catch (Exception $e) {
            return false;
        }
    }
}