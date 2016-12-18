<?php
class TitleDataBase {
  private $DB;
  public function __construct() {
    $db = 'mysql:dbname=movie_titles;host=127.0.0.1';
    $user = 'root';
    $password = '';

    try {
      $this->DB = new PDO ( $db, $user, $password );
      $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch ( PDOException $e ) {
      echo ('Error establishing Connection');
      exit ();
    }
  }
  public function get_titles($input) {
    // Need the "%" symbols to allow like something like a search like *1952*
    $input = "%" . $input . "%";
    $stmt = $this->DB->prepare ( "SELECT * FROM `titles` WHERE name_year LIKE :input" );
    $stmt->bindParam ( 'input', $input );
    $stmt->execute ();
    return $stmt->fetchAll ( PDO::FETCH_ASSOC );

    // TODO: Complete this function so it returns all rows
    // where the parameter is found as a substring, case insensitive





  }
}

$movieTitles = new TitleDataBase ();

?>
