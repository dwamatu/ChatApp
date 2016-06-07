<?php
class AccessData
{
    public $file = 'data.txt' ;
    public $nickname = '';

    public function readFunc ()
    {
        
       if ($_SERVER["REQUEST_METHOD"] === "POST") {
           $this ->nickname = $this ->test_input($_POST["nickname"]);
        }
        
            
    }
    function test_input($data)
    {
        $data = trim($data);
        return $data;

    }

    public function appendFunc(){
        $myfile = fopen($this->file, "a") or die("Unable to open file!");
        $txt = $this->nickname;
        fwrite($myfile, "\n" . $txt);
        fclose($myfile);
        $this->redirectFunc();
        
    }

    public function writeFunc ()
    {
        $myfile = fopen($this->file, "r");
        while (!feof($myfile)) {
            $data = fgets($myfile, filesize($this->file));
            echo "$data <br>";
        }
    }
    
   

public function redirectFunc()
{

    header("Location: base.php", true, 301);

}
    
    


}


$access = new AccessData();
$access ->readFunc();
$access -> appendFunc();

