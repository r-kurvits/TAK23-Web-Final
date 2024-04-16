<?php
    if (isset($_REQUEST['action'])) {
        $action = sanitizeInput($_REQUEST['action']);

        if($action == "add_user") {
            $name = sanitizeInput($_POST['name']);
            $birth = sanitizeInput(convertDate($_POST['birth'], 'Y-m-d'));
            $salary = !empty($_POST['salary']) ? sanitizeInput($_POST['salary']) : null;
            $height = !empty($_POST['height']) ? sanitizeInput(commaToDot($_POST['height'])) : null;

            $sql = "INSERT INTO simple (name, birth, salary, height, added) values (?,?,?,?,NOW())";
            $params = [$name, $birth, $salary, $height];
            $res = $conn->dbQuery($sql, $params);
            if($res) {
                header("Location:index.php?add_success=true");
            } else {
                header("Location:index.php?add_success=false");
            }
        }

        if($action == "delete_user") {
            $id = sanitizeInput($_REQUEST['id']);

            $sql = "DELETE  FROM simple WHERE id=?";
            $params = [$id];
            $res = $conn->dbQuery( $sql , $params );
            if($res) {
                header('Location: index.php?delete_success=true');
            } else {
                header('Location: index.php?delete_success=false');
            }
        }

        if($action == "edit_user") {
            $id = sanitizeInput($_POST['id']);
            $name = sanitizeInput($_POST['name']);
            $birth = sanitizeInput(convertDate($_POST['birth'], 'Y-m-d'));
            $salary = !empty($_POST['salary']) ? sanitizeInput($_POST['salary']) : null;
            $height = !empty($_POST['height']) ? sanitizeInput(commaToDot($_POST['height'])) : null;

            $sql = "UPDATE simple SET name= ?, birth= ?, salary = ?, height = ? WHERE id = ?";
            $params = array($name,  $birth, $salary, $height, $id);
            $res = $conn->dbQuery( $sql , $params );
            if($res) {
                header('Location: index.php?page=edit&id='.$id.'&edit_success=true');
            } else {
                header('Location: index.php?page=edit&id='.$id.'&edit_success=false');
            }
        }
    }
?>