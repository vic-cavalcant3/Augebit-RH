<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Central de Ajuda</title>
  <script src="https://cdn.tailwindcss.com"></script>

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
  <!-- Mobile Menu Button -->
  <button 
    onclick="toggleSidebar()" 
    class="md:hidden fixed top-4 left-4 z-50 bg-white p-3 rounded-lg shadow-lg mobile-menu-btn"
    id="mobile-menu-btn"
  >
    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
  </button>

  <!-- Sidebar Overlay (Mobile) -->
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
      <a 
        href="#" 
        onclick="filterCategory('all')" 
        class="sidebar-item active flex items-center justify-between px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 group"
        data-category="all"
      >
        <div class="flex items-center">
          <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center mr-3">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
          </div>
          <span class="font-medium">Todas as Categorias</span>
        </div>
        <span class="counter-badge text-xs px-2 py-1 rounded-full text-white" id="total-count">0</span>
      </a>

      <div class="border-t border-gray-100 my-3"></div>

    
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
        ]
      ];

      $icons = [
        "Férias" => "M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z",
        "Benefícios" => "M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z",
        "Políticas Internas" => "M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z",
        "Carreira e Desenvolvimento" => "M13 10V3L4 14h7v7l9-11h-7z"
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

      <!-- Footer do Sidebar -->
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

  <!-- Main Content -->
  <div class="ml-0 md:ml-72 px-4 md:px-8 py-12 transition-all duration-300">
    <header class="text-center mb-12">
      <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-8 rounded-2xl shadow-xl mb-6">
        <h1 class="text-3xl md:text-4xl font-bold mb-3">Central de Ajuda RH</h1>
        <p class="text-indigo-100 max-w-2xl mx-auto">Todas as respostas sobre políticas e benefícios AUGEBIT</p>
      </div>
      
      <!-- Search Bar -->
      <div class="max-w-md mx-auto mb-8">
        <div class="relative">
          <input 
            type="text" 
            placeholder="Buscar perguntas..." 
            class="w-full px-4 py-3 pl-12 rounded-lg border border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
            onkeyup="searchFAQ(this.value)"
          >
          <svg class="absolute left-4 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
      </div>

      <!-- Filter Buttons -->
      <div class="flex flex-wrap justify-center gap-2 mb-8">
        <button onclick="filterCategory('all'); return false;" class="filter-btn active px-4 py-2 rounded-full bg-indigo-600 text-white font-medium">
          Todas as Categorias
        </button>
        <?php foreach (array_keys($faq) as $categoria): ?>
          <button onclick="filterCategory('<?= strtolower(str_replace(' ', '-', $categoria)) ?>'); return false;" class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-800 font-medium hover:bg-gray-300">
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

    <!-- Footer -->
    <footer class="mt-16 text-center text-gray-500 text-sm border-t border-gray-200 pt-8">
      <p>Não encontrou o que procurava? <a href="mailto:rh@augebit.com" class="text-indigo-600 hover:underline">Entre em contato com o RH</a></p>
      <p class="mt-2">© <?= date('Y') ?> AUGEBIT. Todos os direitos reservados.</p>
    </footer>
  </div>

  <script>
    // Inicializar contadores
    document.addEventListener('DOMContentLoaded', function() {
      updateCounters();
    });

    function updateCounters() {
      const categories = <?= json_encode($faq) ?>;
      let total = 0;
      
      Object.keys(categories).forEach(category => {
        total += categories[category].length;
      });
      
      document.getElementById('total-count').textContent = total;
    }

    // Toggle sidebar mobile
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

    // Alternar respostas
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
    
    // Filtro por categoria
    function filterCategory(category) {
      // Atualizar sidebar - remover active de todos os itens
      document.querySelectorAll('.sidebar-item').forEach(item => {
        item.classList.remove('active');
      });
      // Adicionar active apenas ao item clicado
      document.querySelector(`[data-category="${category}"]`).classList.add('active');
      
      // Atualizar botões de filtro - remover active de todos
      document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active', 'bg-indigo-600', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-800');
      });
      
      // Encontrar e ativar o botão correto
      const targetBtn = document.querySelector(`button[onclick="filterCategory('${category}')"]`);
      if (targetBtn) {
        targetBtn.classList.add('active', 'bg-indigo-600', 'text-white');
        targetBtn.classList.remove('bg-gray-200', 'text-gray-800');
      }
      
      // Mostrar/ocultar categorias
      if (category === 'all') {
        document.querySelectorAll('.category-section').forEach(section => {
          section.classList.remove('hidden');
          section.style.opacity = '1';
        });
      } else {
        document.querySelectorAll('.category-section').forEach(section => {
          section.style.opacity = '0';
          setTimeout(() => {
            section.classList.add('hidden');
          }, 150);
        });
        
        setTimeout(() => {
          const targetSection = document.getElementById(`category-${category}`);
          targetSection.classList.remove('hidden');
          targetSection.style.opacity = '1';
        }, 150);
      }
      
      // Fechar sidebar no mobile
      if (window.innerWidth < 768) {
        closeSidebar();
      }
    }

    // Busca no FAQ
    function searchFAQ(query) {
      const sections = document.querySelectorAll('.category-section');
      
      if (query.length < 2) {
        sections.forEach(section => {
          section.style.display = 'block';
          section.querySelectorAll('.faq-item').forEach(item => {
            item.style.display = 'block';
          });
        });
        return;
      }
      
      sections.forEach(section => {
        let hasVisibleItems = false;
        
        section.querySelectorAll('.faq-item').forEach(item => {
          const question = item.querySelector('.faq-question span').textContent.toLowerCase();
          const answer = item.querySelector('.faq-answer p').textContent.toLowerCase();
          
          if (question.includes(query.toLowerCase()) || answer.includes(query.toLowerCase())) {
            item.style.display = 'block';
            hasVisibleItems = true;
          } else {
            item.style.display = 'none';
          }
        });
        
        section.style.display = hasVisibleItems ? 'block' : 'none';
      });
    }

    // Scroll suave para seções
    document.querySelectorAll('a[href^="#category-"]').forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  </script>
</body>
</html>