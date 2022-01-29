<?php
 // Conectando ao banco de dados:
// include_once("../controler/conectar.php");
  include_once("../controler/local.php");

?>
 
 <!-- Preenchendo a tabela com os dados do banco: -->
 <?php
 
 $sql2 = "INSERT INTO tb_produto
  (nm_produto, vl_preco, nu_quantidade, ds_cor, ds_tamanho, ds_img)
VALUES
  ('Jaleco', '80', 1, 'Branco', 'P', '3.png');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

$sql2 = "INSERT INTO tb_produto
  (nm_produto, vl_preco, nu_quantidade, ds_cor, ds_tamanho, ds_img)
VALUES
  ('Jaleco Feminino', '80', 1, 'Branco', 'P', '4.png');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

$sql2 = "INSERT INTO tb_produto
  (nm_produto, vl_preco, nu_quantidade, ds_cor, ds_tamanho, ds_img)
VALUES
  ('Jaleco Feminino', '80', 1, 'Branco', 'G', '5.png');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

$sql2 = "INSERT INTO tb_produto
  (nm_produto, vl_preco, nu_quantidade, ds_cor, ds_tamanho, ds_img)
VALUES
  ('Jaleco Feminino', '80', 1, 'Branco', 'M', '6.png');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

$sql2 = "INSERT INTO tb_produto
  (nm_produto, vl_preco, nu_quantidade, ds_cor, ds_tamanho, ds_img)
VALUES
  ('Jaleco Masculino', '80', 1, 'Branco', 'M', '7.png');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

$sql2 = "INSERT INTO tb_produto
  (nm_produto, vl_preco, nu_quantidade, ds_cor, ds_tamanho, ds_img)
VALUES
  ('Jaleco Masculino', '80', 1, 'Branco', 'P', '8.png');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

$sql2 = "INSERT INTO tb_produto
  (nm_produto, vl_preco, nu_quantidade, ds_cor, ds_tamanho, ds_img)
VALUES
  ('Jaleco Masculino', '80', 1, 'Branco', 'G', '9.png');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

$sql2 = "INSERT INTO tb_produto
  (nm_produto, vl_preco, nu_quantidade, ds_cor, ds_tamanho, ds_img)
VALUES
  ('Blusa Masculino Bordado', '45', 1, 'Branco', 'G', '10.png');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

$sql2 = "INSERT INTO tb_produto
  (nm_produto, vl_preco, nu_quantidade, ds_cor, ds_tamanho, ds_img)
VALUES
  ('Blusa Masculino Bordado', '45', 1, 'Branco', 'M', '11.png');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

$sql2 = "INSERT INTO tb_produto
  (nm_produto, vl_preco, nu_quantidade, ds_cor, ds_tamanho, ds_img)
VALUES
  ('Blusa Masculino Bordado', '45', 1, 'Branco', 'P', '12.png');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

$sql2 = "INSERT INTO tb_produto
  (nm_produto, vl_preco, nu_quantidade, ds_cor, ds_tamanho, ds_img)
VALUES
  ('Blusa Feminino Bordado', '45', 1, 'Branco', 'G', '13.png');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

$sql2 = "INSERT INTO tb_produto
  (nm_produto, vl_preco, nu_quantidade, ds_cor, ds_tamanho, ds_img)
VALUES
  ('Blusa Feminino Bordado', '45', 1, 'Branco', 'M', '14.png');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

$sql2 = "INSERT INTO tb_produto
  (nm_produto, vl_preco, nu_quantidade, ds_cor, ds_tamanho, ds_img)
VALUES
  ('Blusa Feminino Bordado', '45', 1, 'Branco', 'P', '15.png');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

 mysqli_close($strcon);

?>
