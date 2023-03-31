<?php
require_once('conexao.php');
$sql = "SELECT * FROM Livros WHERE status = 1";
if (!empty($_GET['titulo'])) {
  $titulo = $_GET['titulo'];
  $sql .= " AND titulo LIKE '%$titulo%'";
}
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html>

<head>

    <title>Mini Biblioteca</title>
    <link rel='stylesheet' href='style.css'>

  </head>

<body>
  
  <header>

      <h1>Mini Biblioteca</h1>

        <nav>

          <form method="get">

            <label>Buscar livro:</label>
            <input type="text" name="titulo" placeholder="Título do livro">
            <input type="submit" value="Buscar">

          </form>

        </nav>

  </header>
  <br>
  <main>

    <h2>Livros disponíveis</h2><br><br>

    <?php if ($resultado->num_rows > 0) { ?>

    <table>

      <thead>
      
        <tr>
          <th>Título</th>
          <th>Autor</th>
          <th>Editora</th>
          <th>Ano</th>
          <th></th>
        </tr>

      </thead>

      <tbody>

      <?php while($livro = $resultado->fetch_assoc()) { ?>

      <tr>
        <td><?php echo $livro['titulo'] ?></td>
        <td><?php echo $livro['autor'] ?></td>
        <td><?php echo $livro['editora'] ?></td>
        <td><?php echo $livro['ano'] ?></td>
        <td><a href="emprestimo.php?id=<?php echo $livro['id'] ?>">Emprestar</a></td>
      </tr>

      <?php } ?>

      </tbody>
    </table>

    <?php } else { ?>

  <p>Não há livros disponíveis.</p>

  <?php } ?>
  <p><a href="lista_livros.php">Ver todos os livros</a></p>
  <p><a href="novo_livro.php">Cadastrar novo livro</a></p>
  <p><a href="lista_usuarios.php">Ver usuários cadastrados</a></p>
  <p><a href="novo_usuario.php">Cadastrar novo usuário</a></p>
  </main>

<footer>
    <h3>Todos os direitos reservados de Sam 2023</h3>
  </footer>
</body>
</html>
