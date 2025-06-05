<?php
// Dados da base de conhecimento
$faq = [
  "Férias" => [
    [
      "pergunta" => "Quando posso tirar férias?",
      "resposta" => "Após 12 meses de trabalho (período aquisitivo), o colaborador tem direito a 30 dias de férias."
    ],
    [
      "pergunta" => "Posso dividir minhas férias?",
      "resposta" => "Sim. A CLT permite o fracionamento das férias em até 3 períodos, sendo um deles com no mínimo 14 dias."
    ],
    [
      "pergunta" => "Como solicitar minhas férias?",
      "resposta" => "Acesse o Portal do Colaborador > RH > Solicitação de Férias. Preencha o formulário e aguarde aprovação do seu gestor."
    ],
    [
      "pergunta" => "Posso vender parte das minhas férias?",
      "resposta" => "Sim, é possível abonar até 1/3 (um terço) do período de férias, conforme previsto no artigo 143 da CLT."
    ],
    [
      "pergunta" => "Quantos dias de férias posso tirar por vez?",
      "resposta" => "O mínimo é 14 dias consecutivos. O restante pode ser fracionado em períodos menores, conforme acordo com o gestor."
    ],
    [
      "pergunta" => "Quando recebo o adicional de 1/3 das férias?",
      "resposta" => "O adicional constitucional de 1/3 é pago junto com o valor das férias, no momento da liberação do período."
    ]
  ],
  "Benefícios" => [
    [
      "pergunta" => "Quais são os benefícios oferecidos pela AUGEBIT?",
      "resposta" => "Oferecemos pacote completo: Vale-refeição (R$ 35/dia), Vale-transporte, Plano de saúde (Amil 400), Gympass, Bônus por desempenho e Auxílio-creche."
    ],
    [
      "pergunta" => "Como solicitar reembolso do plano de saúde?",
      "resposta" => "Acesse o Portal do Colaborador > Benefícios > Reembolso Saúde. Anexe nota fiscal, comprovante médico e relatório do procedimento."
    ],
    [
      "pergunta" => "Quando os benefícios começam a valer?",
      "resposta" => "Todos os benefícios têm carência de 30 dias, exceto vale-transporte que é disponibilizado desde o primeiro dia."
    ],
    [
      "pergunta" => "Como funciona o Gympass na AUGEBIT?",
      "resposta" => "Temos parceria com o Gympass Plan 3, que dá acesso a milhares de academias. O desconto é feito em folha (R$ 49,90/mês)."
    ],
    [
      "pergunta" => "O vale-refeição pode ser usado em supermercados?",
      "resposta" => "Sim, o cartão vale-refeição pode ser utilizado em estabelecimentos credenciados, incluindo supermercados e restaurantes."
    ],
    [
      "pergunta" => "Como incluir dependentes no plano de saúde?",
      "resposta" => "Solicite no Portal do Colaborador > Benefícios > Inclusão de Dependentes. Há desconto em folha conforme número de dependentes."
    ]
  ],
  "Políticas Internas" => [
    [
      "pergunta" => "Qual o horário de trabalho padrão?",
      "resposta" => "Das 9h às 18h, com 1 hora de almoço. Horários flexíveis podem ser negociados com o gestor, dentro da política de 44h semanais."
    ],
    [
      "pergunta" => "Qual a política de home office?",
      "resposta" => "Regime híbrido: até 3 dias remotos/semana para operações e 4 dias para TI. Requer aprovação do gestor e avaliação trimestral."
    ],
    [
      "pergunta" => "Como funciona o dress code na AUGEBIT?",
      "resposta" => "Adotamos dress code casual (jeans, camiseta). Em reuniões com clientes, recomenda-se business casual (social sem gravata)."
    ],
    [
      "pergunta" => "Qual a política de atestados médicos?",
      "resposta" => "Atestados acima de 3 dias devem ser entregues no RH em até 48h. Abono de até 2 faltas/ano sem atestado (comunicar previamente)."
    ],
    [
      "pergunta" => "Como solicitar ajuste de ponto?",
      "resposta" => "Acesse o Portal > RH > Ajuste de Ponto dentro de 5 dias úteis após a ocorrência. Necessário justificativa detalhada."
    ],
    [
      "pergunta" => "Qual a política de viagens corporativas?",
      "resposta" => "Viagens devem ser pré-aprovadas com 15 dias de antecedência. Utilizamos apenas hotéis e companhias aéreas parceiras."
    ]
  ],
  "Carreira e Desenvolvimento" => [
    [
      "pergunta" => "Como funciona o programa de promoções?",
      "resposta" => "Avaliações semestrais com indicadores de desempenho. Promoções ocorrem em abril e outubro, com aumento médio de 12-15%."
    ],
    [
      "pergunta" => "A empresa oferece cursos e treinamentos?",
      "resposta" => "Sim! Temos parceria com Alura, Coursera e Udemy. Cada colaborador tem orçamento anual de R$ 2.000 para capacitação."
    ],
    [
      "pergunta" => "Como participar do programa de mentoria?",
      "resposta" => "Inscrições abertas todo março. Requisitos: mínimo 6 meses de casa. Duração: 4 meses com encontros quinzenais."
    ],
    [
      "pergunta" => "Existe plano de carreira definido?",
      "resposta" => "Sim, cada área possui um roadmap de carreira com níveis e requisitos para progressão. Consulte seu gestor para detalhes."
    ],
    [
      "pergunta" => "Como solicitar participação em eventos externos?",
      "resposta" => "Envie solicitação via Portal > Desenvolvimento > Eventos com 30 dias de antecedência. Aprovado conforme relevância e orçamento."
    ],
    [
      "pergunta" => "A empresa oferece auxílio para pós-graduação?",
      "resposta" => "Sim, temos parcerias com instituições e reembolsamos 50% do valor após conclusão, desde que relacionado à sua área."
    ]
  ]
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Central de Ajuda</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="../RH/img/Elemento.png">

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .faq-item {
      border-left: 4px solid #6c63ff;
      background-color: white;
    }
    .faq-question {
      transition: all 0.2s ease;
    }
    .faq-question:hover {
      background-color: #f8fafc;
    }
    .filter-btn.active {
      background-color: #6c63ff;
      color: white;
    }
    .category-section {
      transition: all 0.3s ease;
    }

    #headerr{
      background-color: #6c63ff;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">
  <div class="max-w-4xl mx-auto px-4 py-12">
    <!-- Header -->
    <header class="text-center mb-12">
      <div id = "headerr" class=" text-white p-6 rounded-xl shadow-md mb-6">
        <h1 class="text-3xl md:text-4xl font-bold mb-3">Central de Ajuda RH</h1>
        <p class="text-blue-100 max-w-2xl mx-auto">Todas as respostas sobre políticas e benefícios AUGEBIT</p>
      </div>
      
      <!-- Filtros por Categoria -->
      <div class="flex flex-wrap justify-center gap-2 mb-8">
        <button onclick="filterCategory('all')" class="filter-btn active px-4 py-2 rounded-full bg-blue-600 text-white font-medium">
          Todas as Categorias
        </button>
        <?php foreach (array_keys($faq) as $categoria): ?>
          <button onclick="filterCategory('<?= strtolower(str_replace(' ', '-', $categoria)) ?>')" class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-800 font-medium hover:bg-gray-300">
            <?= $categoria ?>
          </button>
        <?php endforeach; ?>
      </div>
    </header>

    <!-- FAQ Content -->
    <main>
      <?php foreach ($faq as $categoria => $perguntas): 
        $categoriaId = strtolower(str_replace(' ', '-', $categoria));
      ?>
        <section id="category-<?= $categoriaId ?>" class="category-section mb-10">
          <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-4 flex items-center">
            <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            <?= $categoria ?>
          </h2>
          
          <div class="space-y-4">
            <?php foreach ($perguntas as $index => $item): 
              $id = $categoriaId . "-$index";
            ?>
              <div class="faq-item rounded-lg overflow-hidden shadow-sm">
                <button 
                  onclick="toggleAnswer('<?= $id ?>')" 
                  class="faq-question w-full text-left px-5 py-4 flex justify-between items-center border-b border-gray-100"
                >
                  <span class="font-medium text-gray-800"><?= $item['pergunta'] ?></span>
                  <span id="icon-<?= $id ?>" class="text-blue-600 font-bold text-lg ml-2">+</span>
                </button>
                <div 
                  id="<?= $id ?>" 
                  class="faq-answer hidden px-5 py-4 bg-gray-50 text-gray-600"
                >
                  <?= nl2br($item['resposta']) ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endforeach; ?>
    </main>

    <!-- Footer -->
    <footer class="mt-16 text-center text-gray-500 text-sm">
      <p>Não encontrou o que procurava? <a href="mailto:rh@augebit.com" class="text-blue-600 hover:underline">Entre em contato com o RH</a></p>
      <p class="mt-2">© <?= date('Y') ?> AUGEBIT. Todos os direitos reservados.</p>
    </footer>
  </div>

  <script>
    // Alternar respostas
    function toggleAnswer(id) {
      const elem = document.getElementById(id);
      const icon = document.getElementById(`icon-${id}`);
      elem.classList.toggle('hidden');
      icon.textContent = elem.classList.contains('hidden') ? '+' : '-';
    }
    
    // Filtro por categoria
    function filterCategory(category) {
      // Atualizar botões ativos
      document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active', 'bg-blue-600', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-800');
      });
      event.target.classList.add('active', 'bg-blue-600', 'text-white');
      event.target.classList.remove('bg-gray-200', 'text-gray-800');
      
      // Mostrar/ocultar categorias
      if (category === 'all') {
        document.querySelectorAll('.category-section').forEach(section => {
          section.classList.remove('hidden');
        });
      } else {
        document.querySelectorAll('.category-section').forEach(section => {
          section.classList.add('hidden');
        });
        document.getElementById(`category-${category}`).classList.remove('hidden');
      }
    }
  </script>
</body>
</html>