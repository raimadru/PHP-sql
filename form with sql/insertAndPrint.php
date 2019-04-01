<?php

if (null !== filter_input(INPUT_POST, 'act', FILTER_SANITIZE_STRING) && filter_input(INPUT_POST, 'act', FILTER_SANITIZE_STRING) == 'act') { // checking the value of the variable/filtering
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    echo "<br> Vardas: " . $name; 
    echo "<br> Pavarde: " . $_POST['surname'];
    echo "<br> E_mailas: " . $_POST['email'];
    echo "<br> Telefonas: " . $_POST['phone'];
    $mysqli = mysqli_connect("localhost", "root", "student", "forms");
    if (mysqli_connect_errno()) {
        printf(mysqli_connect_error());
        exit();
    } else {
        $sql = "INSERT INTO main (name, surname, email, phone) VALUES ('" . $name . "','" . $_POST['surname'] . "','" . $_POST['email'] . "','" . $_POST['phone'] . "')";
        $res = mysqli_query($mysqli, $sql);
        if ($res == TRUE) {
            if (isset($_POST['address']) || isset($_POST['sex']) || isset($_POST['familyStatus'])) {
                $sqlExtraCreateRow = "INSERT INTO extra (ID) VALUES ((SELECT MAX(ID) FROM main))";
                $resExtraCreateRow = mysqli_query($mysqli, $sqlExtraCreateRow);
                if ($resExtraCreateRow == TRUE) {
                    if (is_string($_POST['address']) && !empty($_POST['address'])) {
                        $sqlUpdateAddress = "UPDATE extra SET adress='" . $_POST['address'] . "' WHERE ID=((SELECT MAX(ID) FROM main))";
                        $resUpdateAddress = mysqli_query($mysqli, $sqlUpdateAddress);
                        echo "<br> Adresas: " . $_POST['address'];
                    }
                    if (is_string($_POST['sex']) && !empty($_POST['sex'])) {
                        $sqlUpdateSex = "UPDATE extra SET sex='" . $_POST['sex'] . "' WHERE ID=((SELECT MAX(ID) FROM main))";
                        $resUpdateSex = mysqli_query($mysqli, $sqlUpdateSex);
                        if ($resUpdateSex) {
                            echo "<br> Lytis: " . $_POST['sex'];
                        }
                    }
                    if (is_string($_POST['familyStatus']) && !empty($_POST['familyStatus'])) {
                        $sqlUpdateFamilyStatus = "UPDATE extra SET familyStatus='" . $_POST['familyStatus'] . "' WHERE ID=((SELECT MAX(ID) FROM main))";
                        $resUpdateFamilyStatus = mysqli_query($mysqli, $sqlUpdateFamilyStatus);
                        echo "<br> Seimos statusas: " . $_POST['familyStatus'];
                    }
                } else {
                    printf(mysqli_error($mysqli));
                    exit();
                }
            } else {
                printf(mysqli_error($mysqli));
                exit();
            }
        }
        mysqli_close($mysqli);
    }
}
