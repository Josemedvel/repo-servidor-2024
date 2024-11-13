<?php
$array = array(3,5,9,1,2);
foreach($array as $item){
    echo "<p>" . $item . "</p>";
}
echo "<p>Esto de arriba con foreach</p>";
for($i = 0; $i < count($array); $i++){
    echo "<p>" . $array[$i] . "</p>";
}
echo "<p>Esto de arriba con for normal</p>";
?>
<?php for($i = 0; $i < count($array); $i++): ?>
<p><?php echo $array[$i]; ?></p>
<?php endfor; ?>