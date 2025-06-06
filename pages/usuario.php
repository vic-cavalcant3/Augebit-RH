<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inicializa variáveis para evitar warnings
$nome = '';
$email = '';
$telefone = '';
$setor = '';
$nascimento = '';
$cpf = '';
$biografia = '';

// CORREÇÃO: Verificar se o usuário está logado usando $_SESSION['usuario']
if (!isset($_SESSION['usuario'])) {
    $base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/';
    header("Location: " . $base_url . "augebit-rh/pages/login.php"); // Redirecionar para login
    exit;
}

require './autenticacao/conexao.php';

if (!isset($conn)) {
    die("Erro: Não foi possível conectar ao banco de dados.");
}

try {
    // CORREÇÃO: Pegar o ID do usuário de $_SESSION['usuario']
    $usuario_sessao = $_SESSION['usuario'];
    
    // Debug: Verificar o que tem na sessão
    error_log("Dados da sessão: " . print_r($usuario_sessao, true));
    
    // Se você salvou o ID na sessão, use assim:
    $user_id = $usuario_sessao['id'] ?? null;
    
    // Ou se você salvou apenas alguns dados e precisa buscar mais do banco:
    if ($user_id) {
        $sql = "SELECT * FROM funcionarios WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            throw new Exception("Erro ao preparar consulta: " . $conn->error);
        }
        
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            echo "Usuário não encontrado! ID: " . $user_id;
            exit;
        }

        $usuario = $result->fetch_assoc();
        $stmt->close();
    } else {
        // Se não tem ID na sessão, usar os dados diretamente da sessão
        $usuario = $usuario_sessao;
    }

    // Preencher as variáveis com os dados do usuário
    $nome = $usuario['nome'] ?? '';
    $email = $usuario['email'] ?? '';
    $telefone = $usuario['telefone'] ?? '';
    $setor = $usuario['setor'] ?? '';
    $nascimento = $usuario['nascimento'] ?? '';
    $cpf = $usuario['cpf'] ?? '';
    $biografia = $usuario['biografia'] ?? '';
    
} catch (Exception $e) {
    die("Erro ao buscar dados do usuário: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meu Perfil - AUGEBIT</title>
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
            },
            secondary: {
              500: '#6b7280',
              600: '#4b5563',
            }
          }
        }
      }
    }
  </script>

</head>
<body class="bg-gray-50 min-h-screen">
  <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

    <!-- Cabeçalho -->
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold text-primary-700">
        <i class="fas fa-user-circle mr-2"></i> Meu Perfil
      </h1>
    </div>

    <!-- Barra -->
    <div class="mb-8 bg-white p-4 rounded-xl shadow-sm">
      <div class="flex justify-between mb-2">
        <span class="font-medium">Perfil 85% completo</span>
        <span class="text-primary-600">Adicione mais informações</span>
      </div>
      <div class="w-full bg-gray-200 rounded-full h-2.5">
        <div class="bg-primary-600 h-2.5 rounded-full" style="width: 85%"></div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
      <!-- Coluna esquerda - Foto e menu -->
      <div class="lg:col-span-1 space-y-6">
        <!-- Foto de perfil -->
        <div class="bg-white p-6 rounded-xl shadow-sm">
          <div class="flex flex-col items-center">
            <div class="relative mb-4">
              <img id="image-preview" src="https://via.placeholder.com/160x160?text=Foto" class="w-40 h-40 rounded-full border-4 border-primary-100 shadow-md">
            </div>
            
            <input type="file" name="foto" accept="image/*" class="hidden" id="imagemInput">
            <label for="imagemInput" class="text-sm text-primary-600 hover:text-primary-700 cursor-pointer font-medium">
              Alterar foto
            </label>
            <p class="text-xs text-gray-500 mt-1">Formatos: JPG, PNG (max. 2MB)</p>
          </div>
        </div>
      </div>

      <!-- Coluna direita - Conteúdo principal -->
      <div class="lg:col-span-3 space-y-6">
        <form method="POST" action="gravar.php">

          <!-- Seção: Dados Pessoais -->
          <div id="dados-pessoais" class="bg-white p-6 rounded-xl shadow-sm">
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-xl font-semibold text-gray-800">
                <i class="fas fa-user mr-2 text-primary-600"></i> Dados Pessoais
              </h2>
              <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">COMPLETO</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nome completo*</label>
                <input type="text" name="nome" value="<?php echo htmlspecialchars($nome) ?>"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">CPF*</label>
                <input type="text" name="cpf" value="<?php echo htmlspecialchars($cpf) ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Setor</label>
                <input type="text" name="setor" value="<?php echo htmlspecialchars($setor); ?>" readonly 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-100">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Data de Nascimento</label>
                <input type="date" name="nascimento" value="<?php echo htmlspecialchars($nascimento); ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
              </div>

              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Biografia</label>
                <textarea name="biografia" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500"><?php echo htmlspecialchars($biografia); ?></textarea>
                <p class="text-xs text-gray-500 mt-1">Conte um pouco sobre você (máx. 200 caracteres)</p>
              </div>
            </div>
          </div>

          <!-- Seção: Contato -->
          <div id="contato" class="bg-white p-6 rounded-xl shadow-sm">
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-xl font-semibold text-gray-800">
                <i class="fas fa-address-book mr-2 text-primary-600"></i> Informações de Contato
              </h2>
              <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">PARCIAIS</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">E-mail principal*</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-100">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">E-mail secundário</label>
                <input type="email" name="email_secundario" value=""
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Telefone*</label>
                <input type="tel"  name="telefone" value="<?php echo htmlspecialchars($telefone); ?>" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-100">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Celular</label>
                <input type="tel" name="celular" value="" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
              </div>
            </div>

            <div class="mt-6">
              <h3 class="text-lg font-medium text-gray-800 mb-3 flex items-center">
                <i class="fas fa-map-marker-alt mr-2 text-primary-600"></i> Endereço
              </h3>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label for="inputcep" class="block text-sm font-medium text-gray-700 mb-1">CEP</label>
                  <input id="inputcep" type="text" name="cep" value="" 
                         class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500"
                         placeholder="00000-000">
                </div>

                <div class="md:col-span-2">
                  <label for="logradouro" class="block text-sm font-medium text-gray-700 mb-1">Logradouro</label>
                  <input id="logradouro" type="text" name="logradouro" value="" 
                         class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div>
                  <label for="numero" class="block text-sm font-medium text-gray-700 mb-1">Número</label>
                  <input id="numero" type="text" name="numero" value="" 
                         class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Complemento</label>
                  <input type="text" name="complemento" value="" 
                         class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Bairro</label>
                  <input id="bairro" type="text" name="bairro" value="" 
                         class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div>
                  <label for="cidade" class="block text-sm font-medium text-gray-700 mb-1">Cidade</label>
                  <input id="cidade" type="text" name="cidade" value="" 
                         class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div>
                  <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                  <input id="estado" type="text" name="estado" value="" 
                         class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
              </div>
            </div>
          </div>

          <!-- Seção: Redes Sociais -->
          <div id="redes-sociais" class="bg-white p-6 rounded-xl shadow-sm">
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-xl font-semibold text-gray-800">
                <i class="fas fa-share-alt mr-2 text-primary-600"></i> Redes Sociais
              </h2>
              <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">OPCIONAL</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                  <i class="fab fa-linkedin mr-2 text-blue-700"></i> LinkedIn
                </label>
                <input type="text" name="linkedin" value="" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                  <i class="fab fa-github mr-2 text-gray-800"></i> GitHub
                </label>
                <input type="text" name="github" value="" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                  <i class="fab fa-instagram mr-2 text-pink-600"></i> Instagram
                </label>
                <input type="text" name="instagram" value="" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
              </div>
            </div>
          </div>

          <!-- Seção: Segurança -->
          <div id="seguranca" class="bg-white p-6 rounded-xl shadow-sm">
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-xl font-semibold text-gray-800">
                <i class="fas fa-lock mr-2 text-primary-600"></i> Segurança
              </h2>
            </div>

            <div class="space-y-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Senha atual</label>
                <input type="password" name="senha" readonly value="••••••••" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-100">
                <a href="redefinir_senha.php" class="text-sm text-primary-600 hover:underline flex items-center mt-1">
                  <i class="fas fa-sync-alt mr-1"></i> Alterar senha
                </a>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Sessões ativas</label>
                  <a href="#" class="text-sm text-primary-600 hover:underline flex items-center">
                    <i class="fas fa-desktop mr-2"></i> 1 dispositivos ativos
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Preferências -->
          <div id="preferencias" class="bg-white p-6 rounded-xl shadow-sm">
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-xl font-semibold text-gray-800">
                <i class="fas fa-sliders-h mr-2 text-primary-600"></i> Preferências
              </h2>
              <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">OPCIONAL</span>
            </div>

            <div class="space-y-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Idioma preferido</label>
                <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-500 focus:border-primary-500">
                  <option>Português (Brasil)</option>
                  <option>Inglês</option>
                  <option>Espanhol</option>
                </select>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Notificações</label>
                <div class="space-y-2">
                  <label class="flex items-center">
                    <input type="checkbox" checked class="h-4 w-4 text-primary-600 rounded">
                    <span class="ml-2 text-gray-700">E-mails promocionais</span>
                  </label>
                  <label class="flex items-center">
                    <input type="checkbox" checked class="h-4 w-4 text-primary-600 rounded">
                    <span class="ml-2 text-gray-700">Atualizações do sistema</span>
                  </label>
                  <label class="flex items-center">
                    <input type="checkbox" class="h-4 w-4 text-primary-600 rounded">
                    <span class="ml-2 text-gray-700">Notificações por celular</span>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <!-- Botões para Salvar -->
          <div class="flex justify-between mt-8">
            <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
              Cancelar
            </button>
            <div class="space-x-4">
              <button type="submit" class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                <i class="fas fa-save mr-2"></i> Salvar alterações
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="mt-12 py-6 bg-gray-100 border-t">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500 text-sm">
      <p>© 2025 AUGEBIT. Todos os direitos reservados.</p>
    </div>
  </footer>

  <script>
    const input = document.getElementById('imagemInput');
    const imgPreview = document.getElementById('image-preview');

    input.addEventListener('change', function () {
      const file = this.files[0];

      if (file) {
        const reader = new FileReader();

        reader.onload = function () {
          imgPreview.src = reader.result;
          imgPreview.style.display = 'block';
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
      let cep = Input_CEP.value.replace(/\D/g, '');

      if (cep.length !== 8) {
        alert('Digite exatamente 8 dígitos no CEP');
        return;
      }

      fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(resposta => resposta.json())
        .then(json => {
          if (json.erro) {
            alert('CEP não encontrado');
            return;
          }

          Input_logradouro.value = json.logradouro;
          Input_bairro.value = json.bairro;
          Input_cidade.value = json.localidade;
          Input_estado.value = json.uf;
          Input_numero.focus();
        })
        .catch(erro => {
          console.error("Erro na requisição:", erro);
          alert("Não foi possível buscar o endereço.");
        });
    });
  </script>

  <style>
    #dados-pessoais, #contato, #redes-sociais, #seguranca {
      margin-bottom: 50px;
    }
  </style>

</body>
</html>