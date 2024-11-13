<form action="#" method="post">
    <p>Primer número: 
        <input type="text" name="number_1" value='<?php echo isset($_POST["number_1"]) && $_POST["number_1"] != "" ? htmlspecialchars($_POST["number_1"], ENT_QUOTES) : "" ?>'>
    </p>
    <p>Segundo número: 
        <input type="text" name="number_2" value='<?php echo isset($_POST["number_2"]) && $_POST["number_2"] != "" ? htmlspecialchars($_POST["number_2"], ENT_QUOTES) : "" ?>'>
    </p>
    <p>Operador: 
        <select name="op" id="op">
            <option value="+" <?php echo isset($_POST["op"]) && $_POST["op"] == "+" ? 'selected="selected"' : '' ?>>+</option>
            <option value="-" <?php echo isset($_POST["op"]) && $_POST["op"] == "-" ? 'selected="selected"' : '' ?>>-</option>
            <option value="*" <?php echo isset($_POST["op"]) && $_POST["op"] == "*" ? 'selected="selected"' : '' ?>>*</option>
            <option value="**" <?php echo isset($_POST["op"]) && $_POST["op"] == "**" ? 'selected="selected"' : '' ?>>**</option>
            <option value="/" <?php echo isset($_POST["op"]) && $_POST["op"] == "/" ? 'selected="selected"' : '' ?>>/</option>
            <option value="//" <?php echo isset($_POST["op"]) && $_POST["op"] == "//" ? 'selected="selected"' : '' ?>>//</option>
            <option value="%" <?php echo isset($_POST["op"]) && $_POST["op"] == "%" ? 'selected="selected"' : '' ?>>%</option>
            <option value="." <?php echo isset($_POST["op"]) && $_POST["op"] == "." ? 'selected="selected"' : '' ?>>.</option>
        </select>
    </p>
    <button type="submit">Calcular</button>
</form>

<?php

if (isset($_POST["number_1"]) && isset($_POST["number_2"]) && isset($_POST["op"]) && $_POST["number_1"] != "" && $_POST["number_2"] != "" && $_POST["op"]) {
    $num1 = (float)$_POST["number_1"];
    $num2 = (float)$_POST["number_2"];
    $op = $_POST["op"];
    $result = match ($op) {
        "+" => $num1 + $num2,
        "-" => $num1 - $num2,
        "*" => $num1 * $num2,
        "**" => $num1 ** $num2,
        "/" => $num1 / $num2,
        "//" => (int)($num1 / $num2),
        "%" => $num1 % $num2,
        "." => str_replace(".", "", $num1) . "." . str_replace(".", "", $num2)
    };
    echo "<p>El resultado es: <b>$result</b></p>";
}
?>
