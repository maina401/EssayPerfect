<?php
$writer_id=$_GET['id'];


if (empty($writer_id)) {
	echo '<H2>Writer not found</H2>';
}

?>
<html>
<body>
<object data="/uploads/degrees/<?php echo $writer_id;?>.pdf" type="application/pdf">
    <embed src="/uploads/degrees/<?php echo $writer_id;?>.pdf" type="application/pdf" />
</object>
</body>
</html>
