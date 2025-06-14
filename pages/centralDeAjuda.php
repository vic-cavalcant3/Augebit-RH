<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Augebit </title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="shortcut icon" type="image/x-icon" href="../img/Elemento.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins';
    }
    .faq-item {
      border-left: 4px solid #6366f1;
      background-color: white;
    }
    .faq-question {
      transition: all 0.2s ease;
    }
    .faq-question:hover {
      background-color: #f8fafc;
    }
    .filter-btn.active {
      background-color: #6366f1;
      color: white;
    }
    .category-section {
      transition: all 0.3s ease;
    }
    .sidebar-item {
      transition: all 0.2s ease;
      position: relative;
    }
    .sidebar-item::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      width: 3px;
      background: #6366f1;
      transform: scaleY(0);
      transition: transform 0.2s ease;
    }
    .sidebar-item.active::before {
      transform: scaleY(1);
    }
    .sidebar-item.active {
      background: linear-gradient(90deg, rgba(99, 102, 241, 0.1) 0%, transparent 100%);
      border-radius: 0 8px 8px 0;
      color: #6366f1 !important;
      font-weight: 600;
    }
    .sidebar-item.active .group-hover\:text-gray-900 {
      color: #6366f1 !important;
    }
    .sidebar-item.active svg {
      color: #6366f1 !important;
    }
    .sidebar-item.active .bg-gray-100 {
      background-color: rgba(99, 102, 241, 0.1) !important;
    }
    .sidebar-overlay {
      backdrop-filter: blur(4px);
    }
    .mobile-menu-btn {
      transition: transform 0.2s ease;
    }
    .mobile-menu-btn.active {
      transform: rotate(90deg);
    }
    .sidebar {
      transition: transform 0.3s ease;
    }
    .sidebar.closed {
      transform: translateX(-100%);
    }
    .counter-badge {
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
    }
    .back-button {
      display: inline-flex;
      align-items: center;
      padding: 0.5rem 1rem;
      background-color: #f3f4f6;
      border-radius: 8px;
      transition: all 0.2s ease;
    }
    .back-button:hover {
      background-color: #e5e7eb;
    }
    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
      }
      .sidebar.open {
        transform: translateX(0);
      }
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">
  
  <button 
    onclick="toggleSidebar()" 
    class="md:hidden fixed top-4 left-4 z-50 bg-white p-3 rounded-lg shadow-lg mobile-menu-btn"
    id="mobile-menu-btn"
  >
    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
  </button>

  <div 
    id="sidebar-overlay" 
    class="fixed inset-0 bg-black bg-opacity-25 z-20 sidebar-overlay hidden md:hidden"
    onclick="closeSidebar()"
  ></div>

  <aside id="sidebar" class="fixed top-0 left-0 h-full w-72 bg-white shadow-xl z-30 sidebar">
    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
      <div class="flex items-center justify-between">
        <div>
          <h2 class="text-2xl font-bold">RH AUGEBIT</h2>
          <p class="text-indigo-100 text-sm mt-1">Central de Ajuda</p>
        </div>
      </div>
    </div>
    
    <nav class="p-4 space-y-1 h-full overflow-y-auto pb-20">
      <div class="border-t border-gray-100 my-3"></div>
      
      <!-- Link para mostrar todas as categorias -->
      <a 
        href="#" 
        onclick="showAllCategories(); return false;" 
        class="sidebar-item flex items-center justify-between px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 group active"
        id="all-categories-link"
      >
        <div class="flex items-center">
          <div class="w-8 h-8 bg-gray-100 group-hover:bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
            <svg class="w-4 h-4 text-gray-600 group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v18m6-18v18"></path>
            </svg>
          </div>
          <span class="font-medium group-hover:text-gray-900">Todas as Categorias</span>
        </div>
      </a>

      <?php 
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
        ],
        "Admissão e Documentação" => [
          [
            "pergunta" => "Quais documentos são necessários para admissão?",
            "resposta" => "RG, CPF, Título de Eleitor, Reservista (se aplicável), PIS, Carteira de Trabalho, Comprovante de Endereço e Diploma Profissional."
          ],
          [
            "pergunta" => "Como solicitar segunda via de contracheque?",
            "resposta" => "Acesse o Portal do Colaborador > Documentos > Contracheques. Disponível até 5 anos após a emissão."
          ],
          [
            "pergunta" => "Como atualizar meus dados cadastrais?",
            "resposta" => "Portal do Colaborador > Meus Dados > Atualização Cadastral. Dados bancários exigem confirmação com documento."
          ]
        ],
        "Desligamento" => [
          [
            "pergunta" => "Qual o prazo para aviso prévio?",
            "resposta" => "30 dias para colaboradores com até 1 ano de empresa. Acima disso, aumenta 3 dias por ano completo trabalhado."
          ],
          [
            "pergunta" => "Como funciona o acerto de contas?",
            "resposta" => "Realizado em até 10 dias úteis após o desligamento, incluindo férias proporcionais, 13º proporcional e verbas rescisórias."
          ],
          [
            "pergunta" => "Posso ser recontratado após desligamento?",
            "resposta" => "Sim, após 6 meses do desligamento, exceto em casos de justa causa."
          ]
        ]
      ];

      $icons = [
        "Férias" => "M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z",
        "Benefícios" => "M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z",
        "Políticas Internas" => "M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z",
        "Carreira e Desenvolvimento" => "M13 10V3L4 14h7v7l9-11h-7z",
        "Admissão e Documentação" => "M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2",
        "Desligamento" => "M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
      ];

      foreach ($faq as $categoria => $perguntas): 
        $categoriaId = strtolower(str_replace(' ', '-', $categoria));
        $icon = $icons[$categoria] ?? "M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10";
      ?>
        <a 
          href="#category-<?= $categoriaId ?>" 
          onclick="filterCategory('<?= $categoriaId ?>'); return false;" 
          class="sidebar-item flex items-center justify-between px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 group"
          data-category="<?= $categoriaId ?>"
        >
          <div class="flex items-center">
            <div class="w-8 h-8 bg-gray-100 group-hover:bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
              <svg class="w-4 h-4 text-gray-600 group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $icon ?>"></path>
              </svg>
            </div>
            <span class="font-medium group-hover:text-gray-900"><?= $categoria ?></span>
          </div>
          <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full"><?= count($perguntas) ?></span>
        </a>
      <?php endforeach; ?>

      <div class="border-t border-gray-100 mt-6 pt-4">
        <div class="px-4 py-2 text-center">
          <p class="text-xs text-gray-500 mb-2">Precisa de mais ajuda?</p>
          <a href="mailto:rh@augebit.com" class="inline-flex items-center text-xs text-indigo-600 hover:text-indigo-700 font-medium">
            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            Contatar RH
          </a>
        </div>
      </div>
    </nav>
  </aside>

  <div class="ml-0 md:ml-72 px-4 md:px-8 py-12 transition-all duration-300">
    <!-- Botão de voltar -->
    <div class="mb-6">
      <a href="index.php" class="back-button text-gray-700 hover:text-gray-900">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Voltar para tela inicial
      </a>
    </div>

    <main>
      <!-- Seção de todas as categorias (visível por padrão) -->
      <section id="all-categories" class="mb-10">
        <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Todas as Perguntas Frequentes</h2>
        
        <div class="space-y-4">
          <?php foreach ($faq as $categoria => $perguntas): ?>
            <div class="bg-white rounded-xl shadow-sm p-6">
              <h3 class="text-lg font-semibold text-indigo-600 mb-4"><?= $categoria ?></h3>
              <div class="space-y-3">
                <?php foreach ($perguntas as $index => $item): ?>
                  <div class="pl-4 border-l-2 border-indigo-200">
                    <p class="font-medium text-gray-800"><?= $item['pergunta'] ?></p>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- Seções individuais de cada categoria (ocultas por padrão) -->
      <?php foreach ($faq as $categoria => $perguntas): 
        $categoriaId = strtolower(str_replace(' ', '-', $categoria));
      ?>
        <section id="category-<?= $categoriaId ?>" class="category-section mb-10 hidden">
          <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
              <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $icons[$categoria] ?>"></path>
              </svg>
            </div>
            <?= $categoria ?>
            <span class="ml-3 text-sm bg-gray-100 text-gray-600 px-2 py-1 rounded-full"><?= count($perguntas) ?> perguntas</span>
          </h2>
          
          <div class="space-y-4">
            <?php foreach ($perguntas as $index => $item): 
              $id = $categoriaId . "-$index";
            ?>
              <div class="faq-item rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <button 
                  onclick="toggleAnswer('<?= $id ?>')" 
                  class="faq-question w-full text-left px-6 py-5 flex justify-between items-center"
                >
                  <span class="font-medium text-gray-800 pr-4"><?= $item['pergunta'] ?></span>
                  <span id="icon-<?= $id ?>" class="text-indigo-600 font-bold text-xl flex-shrink-0 transform transition-transform">+</span>
                </button>
                <div 
                  id="<?= $id ?>" 
                  class="faq-answer hidden px-6 py-5 bg-gray-50 border-t border-gray-100"
                >
                  <p class="text-gray-700 leading-relaxed"><?= nl2br($item['resposta']) ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endforeach; ?>
    </main>

    <footer class="mt-16 text-center text-gray-500 text-sm border-t border-gray-200 pt-8">
      <p>Não encontrou o que procurava? <a href="mailto:rh@augebit.com" class="text-indigo-600 hover:underline">Entre em contato com o RH</a></p>
      <p class="mt-2">© <?= date('Y') ?> AUGEBIT. Todos os direitos reservados.</p>
    </footer>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Mostrar todas as categorias por padrão
      showAllCategories();
    });

    function showAllCategories() {
      // Mostrar seção "Todas as Categorias"
      document.getElementById('all-categories').style.display = 'block';
      
      // Ocultar todas as seções individuais
      document.querySelectorAll('.category-section').forEach(section => {
        section.classList.add('hidden');
      });
      
      // Ativar link "Todas as Categorias" no sidebar
      document.querySelectorAll('.sidebar-item').forEach(item => {
        item.classList.remove('active');
      });
      document.getElementById('all-categories-link').classList.add('active');
    }

    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('sidebar-overlay');
      const btn = document.getElementById('mobile-menu-btn');
      
      sidebar.classList.toggle('open');
      overlay.classList.toggle('hidden');
      btn.classList.toggle('active');
    }

    function closeSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('sidebar-overlay');
      const btn = document.getElementById('mobile-menu-btn');
      
      sidebar.classList.remove('open');
      overlay.classList.add('hidden');
      btn.classList.remove('active');
    }

    function toggleAnswer(id) {
      const elem = document.getElementById(id);
      const icon = document.getElementById(`icon-${id}`);
      
      elem.classList.toggle('hidden');
      
      if (elem.classList.contains('hidden')) {
        icon.textContent = '+';
        icon.style.transform = 'rotate(0deg)';
      } else {
        icon.textContent = '−';
        icon.style.transform = 'rotate(180deg)';
      }
    }
    
    function filterCategory(category) {
      // Ocultar a seção "Todas as Categorias"
      document.getElementById('all-categories').style.display = 'none';
      
      // Ativar item do sidebar correspondente
      document.querySelectorAll('.sidebar-item').forEach(item => {
        item.classList.remove('active');
      });
      
      if (category === 'all') {
        showAllCategories();
        document.getElementById('all-categories-link').classList.add('active');
      } else {
        document.querySelector(`[data-category="${category}"]`).classList.add('active');
        
        // Ocultar todas as seções
        document.querySelectorAll('.category-section').forEach(section => {
          section.classList.add('hidden');
        });
        
        // Mostrar apenas a seção selecionada
        const targetSection = document.getElementById(`category-${category}`);
        targetSection.classList.remove('hidden');
      }
      
      // Fechar sidebar no mobile
      if (window.innerWidth < 768) {
        closeSidebar();
      }
      
      // Rolagem suave para a seção
      if (category !== 'all') {
        const target = document.getElementById(`category-${category}`);
        if (target) {
          setTimeout(() => {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
          }, 100);
        }
      } else {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
    }
  </script>
</body>
</html>