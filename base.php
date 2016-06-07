

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>


<table align="center">
    <form action="commentpost.php" method="post">
        <tr>
            <td>
                <?php function  readLast()
                {
                    $fp = @fopen("data.txt", "r");
                    $pos = -1;
                    $t = " ";
                    while ($t != "\n") {
                        fseek($fp, $pos, SEEK_END);
                        $t = fgetc($fp);
                        $pos = $pos - 1;
                    }
                    $t = fgets($fp);
                    echo $t;
                    fclose($fp);
                    return $pos;

                }

                echo "Welcome  "; readLast();
                ?>
            </td>
        </tr>

        <tr>
            <td> <textarea name="listNickname" rows="10" cols="40">
                    <?php
                    echo file_get_contents('data.txt');
                    ?>
                </textarea></td>
        </tr>
        <tr>
            <td>
                <input type="text" name="comment">

                <input type="submit" value="Send"></td>
        </tr>
    </form>

</table>
</body>
</html>