<?php
// Configuração do banco
$host = "localhost";
$login = "root";
$password = "";
$bd = "augebit";

$mysqli = new mysqli($host, $login, $password, $bd);

if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

// Verificar se está editando um funcionário existente
$funcionario = [];
$isEdicao = false;

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM funcionarios WHERE id = $id");
    
    if($result && $result->num_rows > 0) {
        $funcionario = $result->fetch_assoc();
        $isEdicao = true;
    }
}

// Processar formulário quando enviado
if($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $setor = $_POST['setor'];
    $nascimento = $_POST['nascimento'];
    $biografia = $_POST['biografia'];
    $email_secundario = $_POST['email_secundario'];
    $celular = $_POST['celular'];
    $cep = $_POST['cep'];
    $logadouro = $_POST['logadouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $linkedin = $_POST['linkedin'];
    $github = $_POST['github'];
    $instagram = $_POST['instagram'];
    
    if(isset($_POST['id']) && !empty($_POST['id'])) {
        // ATUALIZAR funcionário existente
        $id = $_POST['id'];
        $query = "UPDATE funcionarios SET 
                  nome = '$nome',
                  email = '$email',
                  telefone = '$telefone',
                  cpf = '$cpf',
                  setor = '$setor',
                  nascimento = '$nascimento',
                  biografia = '$biografia',
                  email_secundario = '$email_secundario',
                  celular = '$celular',
                  cep = '$cep',
                  logadouro = '$logadouro',
                  numero = '$numero',
                  complemento = '$complemento',
                  bairro = '$bairro',
                  cidade = '$cidade',
                  estado = '$estado',
                  linkedin = '$linkedin',
                  github = '$github',
                  instagram = '$instagram'
                  WHERE id = $id";
        
        if($mysqli->query($query)) {
            echo "<script>alert('Perfil atualizado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao atualizar: " . $mysqli->error . "');</script>";
        }
    } else {
        // INSERIR novo funcionário
        $senha = $_POST['senha'];
        $query = "INSERT INTO funcionarios VALUES (NULL,
                  '$nome', '$email', '$telefone', '$senha', '$setor', '$nascimento',
                  '$biografia', '$email_secundario', '$celular', '$cep', '$logadouro',
                  '$numero', '$complemento', '$bairro', '$cidade', '$estado',
                  '$linkedin', '$github', '$instagram')";
        
        if($mysqli->query($query)) {
            echo "<script>alert('Funcionário cadastrado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar: " . $mysqli->error . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $isEdicao ? 'Editar' : 'Novo' ?> Funcionário - AUGEBIT</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#f0f9ff',
              100: '#e0f2fe',
              500: '#6c63ff',
              600: '#6c63ff',
              700: '#6c63ff',
            }
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-50 min-h-screen">
  <div class="max-w-5xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
      <!-- Coluna esquerda - Foto -->
      <div class="lg:col-span-1 space-y-6">
        <div class="bg-white p-6 rounded-xl shadow-sm">
          <div class="flex flex-col items-center">
            <div class="relative mb-4">
              <img id="image-preview" class="w-40 h-40 rounded-full border-4 border-primary-100 shadow-md" 
                   src="https://via.placeholder.com/160x160/6c63ff/ffffff?text=<?= $isEdicao ? substr($funcionario['nome'], 0, 1) : 'U' ?>">
            </div>
            <input type="file" accept="image/*" class="hidden" id="imagemInput">
            <label for="imagemInput" class="text-sm text-primary-600 hover:text-primary-700 cursor-pointer font-medium">
              Alterar foto
            </label>
          </div>
        </div>
      </div>

      <!-- Coluna direita - Formulário -->
      <div class="lg:col-span-3 space-y-6">
        <form method="POST">
          
          <!-- ID oculto para edição -->
          <?php if($isEdicao): ?>
            <input type="hidden" name="id" value="<?= $funcionario['id'] ?>">
          <?php endif; ?>

          <!-- Dados Pessoais -->
          <div class="bg-white p-6 rounded-xl shadow-sm">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">
              <i class="fas fa-user mr-2 text-primary-600"></i> Dados Pessoais
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nome completo*</label>
                <input type="text" name="nome" value="<?= $funcionario['nome'] ?? '' ?>" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">CPF</label>
                <input type="text" name="cpf" value="<?= $funcionario['cpf'] ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Setor</label>
                <input type="text" name="setor" value="<?= $funcionario['setor'] ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Data de Nascimento</label>
                <input type="date" name="nascimento" value="<?= $funcionario['nascimento'] ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <?php if(!$isEdicao): ?>
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Senha*</label>
                <input type="password" name="senha" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>
              <?php endif; ?>

              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Biografia</label>
                <textarea name="biografia" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2"><?= $funcionario['biografia'] ?? '' ?></textarea>
              </div>
            </div>
          </div>

          <!-- Contato -->
          <div class="bg-white p-6 rounded-xl shadow-sm">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">
              <i class="fas fa-address-book mr-2 text-primary-600"></i> Contato
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">E-mail principal*</label>
                <input type="email" name="email" value="<?= $funcionario['email'] ?? '' ?>" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">E-mail secundário</label>
                <input type="email" name="email_secundario" value="<?= $funcionario['email_secundario'] ?? '' ?>"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Telefone*</label>
                <input type="tel" name="telefone" value="<?= $funcionario['telefone'] ?? '' ?>" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Celular</label>
                <input type="tel" name="celular" value="<?= $funcionario['celular'] ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>
            </div>

            <!-- Endereço -->
            <h3 class="text-lg font-medium text-gray-800 mt-6 mb-3">
              <i class="fas fa-map-marker-alt mr-2 text-primary-600"></i> Endereço
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                  <label for = "inputcep" class="block text-sm font-medium text-gray-700 mb-1">CEP</label>
                  <input id = "inputcep" type="text" name="cep" value="" 
                         class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
                         <button onpress = "buscarCEP" id = "buttonCEP"> 
                </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Número</label>
                <input type="text" name="numero" value="<?= $funcionario['numero'] ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Logradouro</label>
                <input type="text" name="logadouro" value="<?= $funcionario['logadouro'] ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Complemento</label>
                <input type="text" name="complemento" value="<?= $funcionario['complemento'] ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Bairro</label>
                <input type="text" name="bairro" value="<?= $funcionario['bairro'] ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Cidade</label>
                <input type="text" name="cidade" value="<?= $funcionario['cidade'] ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                <input type="text" name="estado" value="<?= $funcionario['estado'] ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>
            </div>
          </div>

          <!-- Redes Sociais -->
          <div class="bg-white p-6 rounded-xl shadow-sm">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">
              <i class="fas fa-share-alt mr-2 text-primary-600"></i> Redes Sociais
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
                <input type="url" name="linkedin" value="<?= $funcionario['linkedin'] ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">GitHub</label>
                <input type="url" name="github" value="<?= $funcionario['github'] ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                <input type="url" name="instagram" value="<?= $funcionario['instagram'] ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
              </div>
            </div>
          </div>

          <!-- Botões -->
          <div class="bg-white p-6 rounded-xl shadow-sm">
            <div class="flex justify-end space-x-4">
              <button type="reset" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                <?= $isEdicao ? 'Cancelar' : 'Limpar' ?>
              </button>
              <button type="submit" class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                <i class="fas fa-save mr-2"></i>
                <?= $isEdicao ? 'Atualizar' : 'Salvar' ?>
              </button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>


    <script>
  const input = document.getElementById('imagemInput');
  const imgPreview = document.getElementById('image-preview');

  input.addEventListener('change', function () {
    const file = this.files[0];

    if (file) {
      const reader = new FileReader();

      reader.onload = function () {
        imgPreview.src = reader.result;
        imgPreview.style.display = 'block'; // mostrar a imagem
      };

      reader.readAsDataURL(file);
    }
  });

</script>

<script>
const Input_CEP = document.getElementById('inputcep');
const Input_logradouro = document.getElementById('logradouro');
const Input_numero = document.getElementById('numero');
const Input_bairro = document.getElementById('bairro');
const Input_cidade = document.getElementById('cidade');
const Input_estado = document.getElementById('estado');

Input_CEP.addEventListener('blur', () => {
  let cep = Input_CEP.value.replace(/\D/g, ''); // remove tudo que não é número

  if (cep.length !== 8) {
    alert('Digite exatamente 8 dígitos no CEP');
    return;
  }

  fetch(https://viacep.com.br/ws/${cep}/json/)
    .then(resposta => resposta.json())
    .then(json => {
      if (json.erro) {
        alert('CEP não encontrado');
        return;
      }

      Input_logradouro.value = json.logradouro;
      Input_bairro.value = json.bairro;
      Input_cidade.value = json.localidade;
      Input_estado.value = json.estado;
      Input_numero.focus();
    })
    .catch(erro => {
      console.error("Erro na requisição:", erro);
      alert("Não foi possível buscar o endereço.");
    });
});

</script>


  <style>
    #dados-pessoais , #contato , #redes-sociais , #seguranca{
      margin-bottom: 50px;
    }
  </style>


</body>
</html>