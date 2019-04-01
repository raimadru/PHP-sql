<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form</title>
    </head>
    <body>
        <form action ="insertAndPrint.php" method ="POST">
            Adresas: <input type="text" name="address"><br>
            Lytis: <input type="text" name="sex"><br><br>
            Seimos statusas: <input type="text" name="familyStatus"><br><br>
            <br><br>
            <input type="hidden" name ="act" value="act">
            <input type="submit" name="submit" value="Issiusti">
            <input type="reset" name="reset" value="Isvalyti">
            <input type="hidden" name ="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name ="email" value="<?php echo $_POST['email']; ?>">
            <input type="hidden" name ="surname" value="<?php echo $_POST['surname']; ?>">
            <input type="hidden" name ="phone" value="<?php echo $_POST['phone']; ?>">
        </form>
    </body>
</html>
