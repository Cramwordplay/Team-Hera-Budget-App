
<?php
    /*
 * All database connection variables
 */
//offline config details
define("DB_USER", "olayiwola"); // db user
define("DB_PASSWORD", "olayiwola"); // db password (mention your db password here)
define("DB_DATABASE", "hera"); // database name
define("DB_HOST", "localhost"); // db server


//online config details for dashboard (TO UPLOAD PROFILE IMAGE)
$dbh = mysqli_connect('localhost', 'findakit_hera', 'TeamHera123', 'findakit_hera');

// this check for errors and if there are any, it kills the database so everything stop working
if (mysqli_connect_error()) {
  echo "Database connection failed with the following errors: ". mysqli_connect_error();
  die();

}


//online config details
//define("DB_USER", "findakit_hera"); // db user
//define("DB_PASSWORD", "TeamHera123"); // db password (mention your db password here)
//define("DB_DATABASE", "findakit_hera"); // database name
//define("DB_HOST", "localhost"); // db server
?>

