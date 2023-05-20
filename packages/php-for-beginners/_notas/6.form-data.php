<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
    <input type="text" name="username" placeholder="Enter Username">
    <input type="password" name="password" placeholder="Enter Password">
    <input type="submit" name="submit">
</form>

<?php
/*
- El atributo "action" de un form indica la ruta al archivo que procesa los datos del formulario.
- El atributo "method" indica el métido, que, cuando enviamos datos debe ser "post".
- Luego, debemos pasarle a cada input un atributo "name", ya que ese es el valor que consultaremos para solicitar
el dato de cada input.
- Lo primero que tenemos que hacer en el archivo que procesa el formulario, es verificar si el formulario fue enviado, porque,
de lo contrario tendremos un error, ya que PHP no va a poder encontrar los valores de los inputs.
- La información llega via la variable super global $_POST, que es un array asociativo. verificaremos si existe
en el array el valor correspondiente al atrtibuto "name" del input type="submit".
*/

if(isset($_POST["submit"]) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username_min_length = 5;
    $username_max_length = 10;
    $taken_usernames = ["Bru","Bruno", "Santiago", "Andres"];

    //validation
    if(strlen($username) < $username_min_length) {
        echo "El nombre de usuario debe tener al menos $username_min_length caracteres. </br>";
    }
    if(strlen($username) > $username_max_length) {
        echo "El nombre de usuario debe tener menos de $username_max_length caracteres. </br>";
    }
    if(in_array($username, $taken_usernames)) {
        echo "El nombre de usuario ingresado ya está en uso. Por favor, escoja otro nombre de usuario. </br>";
    }
}
?>