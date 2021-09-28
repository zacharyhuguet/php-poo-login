<?php

class UserManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    public function __destruct()
    {
        unset($this->$db);
    }

    public function setDb(PDO $db): UserManager
    {
        $this->_bd = $bd;
        return $this;
    }

    public function addUser(User $user) //// ADD

    {

        $sql = "INSERT INTO feedback (feedback) VALUES(?);";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, 's', $id);

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function deleteUser(User $user) //// DELETE

    {
        $id = $_POST['Id'];

        $sql = "DELETE From feedback Where id='" . $id . "' Limit 1;";
        $stmt = mysqli_prepare($db, $sql);

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header('Location: index.php');
    }

    public function updateUser(User $user) ////UPDATE

    {
        $sql = 'UPDATE feedback SET email = ? WHERE id = ?;';
        $stmt = mysqli_prepare($db, $sql);

        mysqli_stmt_bind_param($stmt, 'si', $label, $id);

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        include_once 'close.php';

        $_SESSION['message'] = 'Le type de livre "' . $label . '"a été modifié';

        header('Location: index.php');
    }

    public function readOne(User $user) ////READ ONE

    {
        $sth = $this->_db->prepare('SELECT id, email FROM feedback WHERE id=?id;');
        $sth->execute(array($id));
        $ligne = $sth();
    }

    public function readAll(User $user) ////READ ALL

    {
        $userList = array();
        $request = $this->_db->query('SELECT id,email FROM feedback;');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($ligne);
            $userList[] = $user;
        }
        return $userList;
    }

}
