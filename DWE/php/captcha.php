<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 25/03/15
 * Time: 11:40
 */
?>
<?php
class capcha{

    var $min;
    var $max;
    var $alphabet;
    var $word;
    var $num;
    var $numletter;

    function capcha(){
        $this->min = 4;
        $this->max = 6;
        $this->alphabet = 'abcdefghijklmnopqrstuvwxyz';
        $this->grain_de_sel = '6tIb90ZAS11';
        $this->word = $this->createWord();
        $this->num = $this->chooseNum();
        $this->numletter = $this->num2letter();
    }

    function q(){
        return 'Quelle est la '.$this->numletter.' lettre du mot '.$this->word.' ?';
    }

    function createWord(){

        $len = rand($this->min,$this->max);
        for($i=0;$i<$len;$i++){
            $word[$i] = $this->alphabet[rand(0,strlen($this->alphabet)-1)];
        }
        return implode('',$word);
    }

    function chooseNum(){
        return rand(1,strlen($this->word));
    }

    function num2letter(){
        if($this->num == strlen($this->word)){
            return 'dernière';
        }
        $array = array('1' => 'première','2' => 'deuxième','3' => 'troisième','4' => 'quatrième','5' => 'cinquième','6' => 'sizième','7' => 'septième','8' => 'huitième','9' => 'neuvième','10' => 'dixième');
        if(isset($array[$this->num])){
            return $array[$this->num];
        }else{
            return $this->num.'.ème';
        }
    }

    function r(){
        return md5($this->grain_de_sel.$this->word[$this->num-1]);
    }
}
return capcha;
?>