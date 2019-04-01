<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form</title>
    </head>
    <body>
        <form action ="secondForm.php" method ="POST">
            Vardas: <input type="text" name="name"><br>
            Pavarde: <input type="text" name="surname"><br><br>
            Emailas: <input type="text" name=" email"><br><br>
            Telefonas: <input type="text" name="phone"><br><br>
            <br><br>
            <input type="hidden" name ="act2" value="act2">
            <input type="submit" name="submit" value="Issiusti">
            <input type="reset" name="reset" value="Isvalyti">
        </form>
    </body>
</html>
