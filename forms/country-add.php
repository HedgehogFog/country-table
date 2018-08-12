<?php
/**
 * Created by PhpStorm.
 * User: hedgehog
 * Date: 11.08.2018
 * Time: 10:28
 */

//require_once("../helper/DatabaseHelper.php");
//require_once("../data/DatabaseVars.php");
//
//$db = new DatabaseHelper($host, $dbname, $username, $password);

if (isset($_POST['btn_sbm'])) {
    $name = htmlspecialchars($_POST['name']);
    $capital = htmlspecialchars($_POST['capital']);
    $description = htmlspecialchars($_POST['description']);

    $array = array(
        $name, $capital, $description
    );

    $db->insert("INSERT INTO countries
                    (name, 
                     capital, 
                     description) VALUES 
                    (?, 
                     ?, 
                     ?)", $array);

    if ($db->getLastError() == null) {
        $target_dir = "img/uploads/";
        $target_file = $target_dir . $db->getLastId() . ".png";


        if (!move_uploaded_file($_FILES["flag_img"]["tmp_name"], $target_file))
            echo "Sorry, there was an error uploading your file.";

        header("Location: " . $_SERVER['PHP_SELF']);
    }
} else {
    $db->getLastError();
}
?>
<<form class="form-style-4" id="new_country" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data"   >
    <label for="name">
        <span>Country name:</span>
        <input type="text" name="name" minlength="1" maxlength="64" required />
    </label>
    <label for="capital">
        <span>Capital city:</span>
        <input type="text" name="capital"  maxlength="64" />
    </label>
    <label for="description">
        <span>Simple description:</span>
        <textarea name="description" onkeyup="adjust_textarea(this)" ></textarea>
    </label>
    <label for="field4">
        <label for="flag_img">Flag image</label>
        <input type="file" name="flag_img" class="inputfile" size="40" />
    </label>
    <label>
        <span>&nbsp;</span>
        <input name="btn_sbm" type="submit" value="Send Letter" />
    </label>
</form>
