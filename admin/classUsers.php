<?php

class crud
{
private $db;

function __construct($DB_con)
{
  $this->db = $DB_con;
}

public function login($uname,$upass)
{
try
{
  $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:uname AND level=:level LIMIT 1");
  $stmt->execute(array(':uname'=>$uname));
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowCount() > 0)
    {
    if(password_verify($upass, $userRow['user_pass']))
    {
      $_SESSION['user_session'] = $userRow['user_id'];
      return true;
    }
    else
    {
      return false;
    }
  }
}
    catch(PDOException $e)
  {
    echo $e->getMessage();
  }
}

public function is_loggedin()
{
if(isset($_SESSION['user_session']))
{
    return true;
  }
}

public function redirect($url)
{
header("Location: $url");
}
?>