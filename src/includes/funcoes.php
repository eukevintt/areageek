<?php
session_start();

// if (!isset($_SESSION['user'])) {
//     $_SESSION['user'] = "";
//     $_SESSION['nome'] = "";
//     $_SESSION['nivel'] = "";
// }

function gerarHash($senha)
{
  $hash = password_hash($senha, PASSWORD_DEFAULT);
  return $hash;
}

function testarHash($senha, $hash)
{
  $verificador = password_verify($senha, $hash);
  return $verificador;
}

function logout()
{
  $_SESSION['nick'] = "";
  $_SESSION['user'] = "";
  $_SESSION['email'] = "";
  $_SESSION['nome'] = "";
  $_SESSION['nivel'] = "";
}

function isLogado()
{
  if (empty($_SESSION['user'])) {
    return false;
  } else {
    return true;
  }
}

function isAdmin()
{
  $nivel = $_SESSION['nivel'] ?? null;
  if (is_null($nivel)) {
    return false;
  } else {
    if ($nivel == 'admin') {
      return true;
    } else {
      return false;
    }
  }
}

function isUsu()
{
  $nivel = $_SESSION['nivel'] ?? null;
  if (is_null($nivel)) {
    return false;
  } else {
    if ($nivel == 'usu') {
      return true;
    } else {
      return false;
    }
  }
}

function isEditor()
{
  $nivel = $_SESSION['nivel'] ?? null;
  if (is_null($nivel)) {
    return false;
  } else {
    if ($nivel == 'editor') {
      return true;
    } else {
      return false;
    }
  }
}

function modalDeleteUsu($nick, $nome)
{
  echo '<div class="modal fade" id="del' . $nick . '" tabindex="-1" aria-labelledby="deleteModalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Deletar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Você realmente deseja deletar o usuário ' . $nome . '?
        </div>
        <div class="modal-footer">
        <a href=../actions/delete.php?delusu=' . $nick . '><button type="button" class="btn btn-success">Sim</button></a>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
        </div>
      </div>
    </div>
  </div>';
}

function modalEditUsu($nick, $nome, $email)
{

  echo '<div class="modal fade" id="edit' . $nick . '" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editar Usuário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="../actions/edit.php" class="row g-3" method="POST">
        <div class="col-md-12">
          <label for="nick" class="form-label">Nick</label>
          <input type="text" class="form-control" id="nick" name="nick" value="' . $nick . '" readonly>
        </div>
        <div class="col-md-12">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" value="' . $nome . '">
        </div>
        <div class="col-md-12">
          <label for="email" class="form-label">E-Mail</label>
          <input type="email" class="form-control" id="email" name="email" value="' . $email . '">
        </div>

        <div class="col-md-6">
          <label for="senha1" class="form-label">Senha</label>
          <input type="password" class="form-control" id="senha1" name="senha1">
        </div>
        <div class="col-md-6">
          <label for="senha2" class="form-label">Confirmação da Senha</label>
          <input type="password" class="form-control" id="senha2" name="senha2">
        </div>
        
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Editar</button>
        </div>
      </form>
        </div>
      </div>
    </div>
  </div>';
}

function modalDeleteCat($id, $nome)
{
  echo '<div class="modal fade" id="del' . $id . '" tabindex="-1" aria-labelledby="deleteModalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Deletar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Você realmente deseja deletar a categoria ' . $nome . '?
        </div>
        <div class="modal-footer">
        <a href=../actions/delete.php?delcat=' . $id . '><button type="button" class="btn btn-success">Sim</button></a>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
        </div>
      </div>
    </div>
  </div>';
}

function modalEditCat($id, $nome)
{

  echo '<div class="modal fade" id="edit' . $id . '" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editar Categoria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="../actions/edit.php" class="row g-3" method="POST">
          <input type="hidden" class="form-control" id="idCat" name="idCat" value="' . $id . '">
        <div class="col-md-12">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nomeCat" name="nomeCat" value="' . $nome . '" require>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Editar</button>
        </div>
      </form>
        </div>
      </div>
    </div>
  </div>';
}

function modalDeleteAss($id, $nome)
{
  echo '<div class="modal fade" id="del' . $id . '" tabindex="-1" aria-labelledby="deleteModalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Deletar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Você realmente deseja deletar a categoria ' . $nome . '?
        </div>
        <div class="modal-footer">
        <a href=../actions/delete.php?delass=' . $id . '><button type="button" class="btn btn-success">Sim</button></a>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
        </div>
      </div>
    </div>
  </div>';
}

function modalEditAss($id, $nome)
{

  echo '<div class="modal fade" id="edit' . $id . '" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editar Categoria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="../actions/edit.php" class="row g-3" method="POST">
          <input type="hidden" class="form-control" id="idAss" name="idAss" value="' . $id . '">
        <div class="col-md-12">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nomeAss" name="nomeAss" value="' . $nome . '" require>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Editar</button>
        </div>
      </form>
        </div>
      </div>
    </div>
  </div>';
}

function modalDeleteMat($id)
{
  echo '<div class="modal fade" id="del' . $id . '" tabindex="-1" aria-labelledby="deleteModalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Deletar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Você realmente deseja deletar essa matéria?
        </div>
        <div class="modal-footer">
        <a href=../actions/delete.php?delmat=' . $id . '><button type="button" class="btn btn-success">Sim</button></a>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
        </div>
      </div>
    </div>
  </div>';
}

function modalEditMat($id)
{

  echo '<div class="modal fade" id="edit' . $id . '" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editar Categoria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="../actions/edit.php" class="row g-3" method="POST">
          <input type="hidden" class="form-control" id="idMat" name="idMat" value="' . $id . '">
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Editar</button>
        </div>
      </form>
        </div>
      </div>
    </div>
  </div>';
}
