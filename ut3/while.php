<?php
$i = 0;
while($i < 10):
?>
<p><?=$i?></p>
<?php
$i++;
endwhile;
?>

<?php if($i<5):?>
    <p>La variable $i es menor a 5</p>
<?php else: ?>
    <p>La variable $i es mayor o igual a 5</p>
<?php endif; ?>
<?php

for($i = 0; $i < 10; print($i++)){
    echo $i . "<br>";
}
?>