
<?Php @include "controler/local.php"; ?>

        <div><?Php echo date("d/m/Y"); ?></div>


<?Php
@$busca=$_POST["busca"];
 $query = "SELECT `id_b`, `nume_b`, `link_b`, `setor_b`, `mapa_b` FROM `busca` where nume_b LIKE '%$busca%' or setor_b LIKE '%$busca%'";
 
 $resultado = mysqli_query($strcon, $query);
while ($linha = mysqli_fetch_array($resultado)) {
   ?>  
<div class="paginas_busca">
<a href="<?Php echo @$linha['link_b']; ?>">
</div>
<?Php 
$nume_b = $linha['nume_b']; 
$nume = stripslashes(utf8_encode($nume_b));
//echo "$newtext\n <br/>";
echo  nl2br($nume)." - "; 

$setor_b = $linha['setor_b']; 
$setor = stripslashes(utf8_encode($setor_b));
//echo "$newtext\n <br/>";
echo  nl2br($setor); 

// echo "<meta http-equiv='refresh' content='600;url=".$linha['link_b']."'>";

		 ?></a>

<?Php } ?>


