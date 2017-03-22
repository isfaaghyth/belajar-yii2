<?php

?>
<h1>Seminar: <?php echo $judulseminar; ?></h1>
<h1>Pembicara: <?php echo $pembicara; ?></h1>
<h3><?=$pembicara?></h3>
<?php foreach ($peserta as $data): ?>
      <li><?=$data?></li>
<?php endforeach; ?>
