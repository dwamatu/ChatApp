<?php

class postData
{
    public $file = 'data.txt' ;
    public $comment= '';

    public function readFunc ()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this ->comment = $this ->test_input($_POST["comment"]);
        }


    }
    function test_input($data)
    {
        $data = trim($data);
        return $data;

    }

    public function appendFunc(){
        $myfile = fopen($this->file, "a") or die("Unable to open file!");
        $txt = $this->comment;
        fwrite($myfile, "\n" . $txt);
        fclose($myfile);
        $this->redirectFunc();

    }
    public function redirectFunc()
    {

        header("Location: base.php", true, 301);

    }





}
$commentPost = new postData();
$commentPost ->readFunc();
$commentPost -> appendFunc();
$commentPost ->redirectFunc();