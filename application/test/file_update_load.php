<html>
<body>

<form method="post" enctype="multipart/form-data" action="/file_update_load.php">
    <input type="file" name="php_file"/>
    <input type="submit" value="tijiao">
</form>
</body>

</html>

<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 17-2-9
 * Time: 下午11:24
 */


// ['tmp_name'] wenjian shang chuang hou de wenjian huancun moban mingzi
var_dump(move_uploaded_file($_FILES['php_file']['tmp_name'], 'pdoModel.php'));