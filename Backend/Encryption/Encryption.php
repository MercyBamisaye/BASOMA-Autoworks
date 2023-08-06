<?php
class Encryption {
    private string $plainText;
    private array $s_box = [
        ["63","7c","77","26","36","3f","7b","6b","34","6f","30","67","71","2b","31","←"],
        ["76","7d","23","59","47","72","5f","44","3d","64","5d","73","60","27","4f","75"],
        ["3a","49","2c","24","5c","6e","5a","62","52","3b","46","32","29","5e","2f","37"],
        ["53","7a","65","56","20","6c","79","5b","6a","4e","6d","39","4a","4c","58","22"],
        ["61","35","48","66","43","4d","33","54","45","57","2a","7e","50","3c","25","78"],
        ["51","3e","40","70","69","55","38","28","68","4b","42","21","2d","41","74","2e"]
    ];
    public function __construct(string $plainText){
        $this->plainText = $plainText;
    }
    public function setPlainText(string $plainText){
        $this->plainText = $plainText;
    }

    private function convertTo2D(string $plainText): array{
        $result=[];
        $ptSlip = str_split($plainText);
        $TSize = ceil(sizeof($ptSlip)/7);
        $counter = 0;
        for($i=0; $i< $TSize;$i++){
            $row=[];
            for($ii=0; $ii<7; $ii++){
                if($counter<sizeof($ptSlip)){
                    //echo gettype($ptSlip[$counter]);
                    $row[$ii]=  $ptSlip[$counter];
                    $counter +=1;
                }
                else{
                    $row[$ii]= "α";
                    $counter +=1;
                }
            }
            //print_r($row);
            $result[$i] = $row;
        }
        //var_dump($result);
        return $result;
    }
    private function rowTranspose(array $input2D = [], array $key = []) :array{
        $result = [];

        for($i=0;$i<sizeof($key); $i++){

            for($a=0;$a<sizeof($input2D);$a++){
                if(isset($input2D[$a][$key[$i]])){
                    array_push($result, $input2D[$a][$key[$i]]);
                }
            }
        }
        return $result;
    }
    private function hexRepresentation(array $arr1D = []) :array{
        $result = [];
        foreach($arr1D as $text){
            if($text =='α'){
                array_push($result, $text);
            }
            else{
                array_push($result,bin2hex($text));
            }
        }
        return $result;
    }
    private function hexRepresentation2(array $arr1D = []) :array{
        $result = [];
        foreach($arr1D as $text){
            if($text =='α'){
                //array_push($result, $text);
            }
            else{
                array_push($result,bin2hex($text));
            }
        }
        return $result;
    }
    private function sBox(array $arr1D = []):array{
        $result = [];

        foreach($arr1D as $hex){
            if($hex !="α"){
                $hexSlip = str_split($hex);
                $rem;
                if($hexSlip[1] == 'a'){
                    $rem = 10;
                }
                elseif($hexSlip[1] == 'b'){
                    $rem = 11;
                }
                elseif($hexSlip[1] == 'c'){
                    $rem = 12;
                }
                elseif($hexSlip[1] == 'd'){
                    $rem = 13;
                }
                elseif($hexSlip[1] == 'e'){
                    $rem = 14;
                }
                elseif($hexSlip[1] == 'f'){
                    $rem = 15;
                }
                else{
                    $rem = $hexSlip[1];
                }
                $sb = $this->s_box[ ($hexSlip[0]-2)][$rem];
                array_push($result, $sb);

            }
            else{
                array_push($result, "α");
            }
        }
        return $result;
    }
    private function sBox2(array $arr1D = []):array{
        $result = [];
        foreach($arr1D as $hex){
            for($i=0;$i<sizeof($this->s_box);$i++){
                for($ii=0;$ii<sizeof($this->s_box[$i]);$ii++){
                    if($this->s_box[$i][$ii] == $hex){
                        $ii_ = "";
                        if($ii == 10){
                            $ii_ = 'a';
                        }
                        elseif($ii == 11){
                            $ii_ = 'b';
                        }
                        elseif($ii == 12){
                            $ii_ = 'c';
                        }
                        elseif($ii == 13){
                            $ii_ = 'd';
                        }
                        elseif($ii == 14){
                            $ii_ = 'e';
                        }
                        elseif($ii == 15){
                            $ii_ = 'f';
                        }
                        else{
                            $ii_ = $ii;
                        }
                        $rem = ($i+2)."".$ii_;
                        array_push($result, $rem);
                        continue;
                    }
                }
            }

        }
        return $result;
    }
    private function charRep(array $arr1D = []): string{
        $arr = [];
        foreach($arr1D as $sb){
            if($sb == "α"){
                array_push($arr, $sb);
            }
            elseif($sb == "←"){
                array_push($arr, $sb);
            }
            else{
                array_push($arr, pack('H*', $sb));
            }

        }

        $cipherText = "";

        foreach($arr as $ct){
            $cipherText = $cipherText.$ct;
        }

        return $cipherText;
    }
    private function rowTransposeDecrypt(array $input2D = []) :array{
        $result = [];

        $key = [3,2,0,1,4,5,6];

        for($i=0;$i<sizeof($key); $i++){

            for($a=0;$a<sizeof($input2D);$a++){
                if(isset($input2D[$a][$key[$i]])){
                    array_push($result, $input2D[$a][$key[$i]]);
                }
            }
        }
        return $result;
    }

    public function getBBWiSEEncrypt(): string{

        $key = [3,2,0,1,4,5,6];

        $arr2D = $this->convertTo2D($this->plainText);
        $railF = $this->rowTranspose($arr2D, $key);
        $hexRep = $this->hexRepresentation($railF);
        $sBox = $this->sBox($hexRep);
        $cipher = $this->charRep($sBox);

        //$cipherText = strrev($cipher);

        return $cipher;
    }

    public function getBBWiSEDecrypt(): string{

        $key = [2,3,1,0,4,5,6];
        $arr2D = $this->convertTo2D($this->plainText); echo $this->plainText;
        $railF = $this->rowTranspose($arr2D, $key);
        $hexRep = $this->hexRepresentation2($railF);
        $sBox = $this->sBox2($hexRep);
        $plainText = $this->charRep($sBox);

        return $plainText;
    }
    public function getAESEncrypt(): string{
        return openssl_encrypt($this->plainText,"AES-256-ECB", "3201456");
    }
    public function getAESDecrypt(string $cipherText): string{
        return openssl_decrypt($cipherText,"AES-256-ECB", "3201456");
    }

}

?>