<?php
session_start();
// session_destroy()
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Augebit - Biblioteca Multimídia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../img/Elemento.png">
    <link rel="stylesheet" href="./styles/header.css">

    <header>
    <div class="container">
        <a href="#" class="logo"><img src="../img/Logo.png" alt="Augebit"></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="centralDeAjuda.php">Central de Ajuda</a></li>
                <li><a href="cursos.php">Cursos</a></li>
                <li><a href="#" class="active">Biblioteca</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
<?php if (isset($_SESSION['usuario'])): ?>
            <a  href="./teste/usuario.php" class="btn-header">Acessar o Perfil</a>
            <?php else: ?>
                <a  href="autenticacao/cadastro.php" class="btn-header">Logar ou Cadastrar</a>
            <?php endif;?>        </nav>
    </div>
</header>
</head>

<body>


<main class="container_biblioteca p">
<div class="filters">
    <button class="filter-btn active" onclick="filtrarRecursos('todos')">Todos</button>
    <button class="filter-btn" onclick="filtrarRecursos('article')">Artigos</button>
    <button class="filter-btn" onclick="filtrarRecursos('video')">Vídeos</button>
    <button class="filter-btn" onclick="filtrarRecursos('podcast')">Podcasts</button>
    <button class="filter-btn" onclick="filtrarRecursos('ebook')">E-books</button>
</div>

    <!-- Conteúdo estático com atributos de dados -->
    <section class="category-section" data-category="saude-mental">
        <h2 class="category-title">Saúde Mental</h2>
        <div class="content-grid">
            <div class="resource-card" data-type="article">
                <div class="resource-type article">Artigo</div>
                <h3>Gerenciando o Estresse no Ambiente Corporativo</h3>
                <p>Técnicas comprovadas para reduzir a ansiedade e melhorar a produtividade.</p>
                <a href="https://exame.com/carreira/guia-de-carreira/7-dicas-para-gerenciar-o-estresse-no-ambiente-de-trabalho/" class="resource-link">
                    Acessar
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                    </svg>
                </a>
            </div>

            <div class="resource-card" data-type="video">
                <div class="resource-type video">Vídeo</div>
                <h3>Mindfulness para Iniciantes</h3>
                <p>Guia prático de 15 minutos para meditação no local de trabalho.</p>
                <a href="https://youtu.be/mLOCYir6bnI?si=uUKZZ6tKAetv3vFD" class="resource-link">
                    Assistir
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section class="category-section" data-category="financas">
        <h2 class="category-title">Finanças Pessoais</h2>
        <div class="content-grid">
            <div class="resource-card" data-type="ebook">
                <div class="resource-type ebook" >E-book</div>
                <h3>Investindo para o Futuro</h3>
                <p>Guia completo para planejamento financeiro e investimentos conscientes.</p>
                <a href="../docs/financas-pessoais.pdf" download="../docs/financas-pessoais.pdf" class="resource-link">
                    Baixar
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                    </svg>
                </a>
            </div>

            <div class="resource-card" data-type="podcast">
                <div class="resource-type podcast">Podcast</div>
                <h3>Hábitos Financeiros Saudáveis</h3>
                <p>Entrevista com especialistas em educação financeira corporativa.</p>
                <a href="https://open.spotify.com/episode/3O3WESWLCyKa59SUG0X2ZK?si=0vtymig4RFG1A5CRUKyxjA" class="resource-link">
                    Ouvir
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Nova seção de cursos -->
<section class="category-section" data-category="cursos">
    <h2 class="category-title">Cursos</h2>
    <div class="content-grid">
        <!-- Card 1 - Humor no Ambiente Corporativo -->
        <div class="resource-card" data-type="video">
            <div class="resource-type video">Vídeo</div>
            <h3>Humor no Ambiente Corporativo</h3>
            <p>Descubra como o bom humor no dia a dia da empresa melhora a colaboração e o desempenho da equipe.</p>
            <a href="https://youtu.be/L6DFfPam2Do?si=sO67QA8rRRPjJxcA" class="resource-link">
                Assistir
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                </svg>
            </a>
        </div>

        <!-- Card 2 - Controle de Estresse no Trabalho -->
        <div class="resource-card" data-type="video">
            <div class="resource-type video">Vídeo</div>
            <h3>Controle de Estresse no Trabalho</h3>
            <p>Aprenda técnicas eficazes para reduzir o estresse e criar uma rotina mais equilibrada no ambiente corporativo.</p>
            <a href="https://youtu.be/WUP3Fmxhm5k?si=ysw9eQ-u917sGd4m" class="resource-link">
                Assistir
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                </svg>
            </a>
        </div>

        <!-- Card 3 - Programas de Bem-Estar -->
        <div class="resource-card" data-type="video">
            <div class="resource-type video">Vídeo</div>
            <h3>Participação em Programas de Bem-Estar</h3>
            <p>Saiba como engajar os colaboradores em ações de saúde física e mental promovidas pela empresa.</p>
            <a href="https://youtu.be/Vsi8G0sRjlU?si=ci6eRc8haHdlWa3Z" class="resource-link">
                Assistir
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                </svg>
            </a>
        </div>

        <!-- Card 5 - Inteligência Emocional -->
        <div class="resource-card" data-type="video">
            <div class="resource-type video">Vídeo</div>
            <h3>Inteligência Emocional</h3>
            <p>Desenvolva habilidades de autoconsciência e empatia para liderar e trabalhar melhor em equipe.</p>
            <a href="https://youtu.be/mgGpIMaPAKQ?si=iHIzSeI2e-nELv8n" class="resource-link">
                Assistir
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                </svg>
            </a>
        </div>

        <!-- Card 6 - Gestão do Tempo -->
        <div class="resource-card" data-type="video">
            <div class="resource-type video">Vídeo</div>
            <h3>Gestão do Tempo e Produtividade</h3>
            <p>Aprenda a administrar o tempo de forma eficaz e maximize a produtividade no ambiente de trabalho.</p>
            <a href="https://youtu.be/PzUZsoyMXuY?si=xnm6Qq6p5AcOqzPX" class="resource-link">
                Assistir
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                </svg>
            </a>
        </div>

        <!-- Card 7 - Comunicação Assertiva -->
        <div class="resource-card" data-type="video">
            <div class="resource-type video">Vídeo</div>
            <h3>Comunicação Assertiva</h3>
            <p>Melhore a comunicação com sua equipe e colegas com técnicas para troca de informações clara e eficiente.</p>
            <a href="https://youtu.be/mgSGIgUjjYc?si=X0byllmv_My1cqcC" class="resource-link">
                Assistir
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                </svg>
            </a>
        </div>

        <!-- Card 8 - Liderança Positiva -->
        <div class="resource-card" data-type="video">
            <div class="resource-type video">Vídeo</div>
            <h3>Liderança Positiva</h3>
            <p>Descubra como cultivar uma liderança que inspira e motiva sua equipe para alcançar melhores resultados.</p>
            <a href="https://youtu.be/c0FXi6gG4iU?si=0QAaYZFI5245RHqW" class="resource-link">
                Assistir
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                </svg>
            </a>
        </div>
    </div>
</section>

    <script>
        function filtrarRecursos(tipo) {
        // Atualiza botões ativos
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active');
            const textoBotao = btn.textContent.trim().toLowerCase();
            const tipoTraduzido = traduzirTipo(tipo).toLowerCase();
            
            if (textoBotao === tipoTraduzido || (tipo === 'todos' && textoBotao === 'todos')) {
                btn.classList.add('active');
            }
        });

        // Filtra as cards
        document.querySelectorAll('.resource-card').forEach(card => {
            card.classList.remove('hidden');
            if (tipo !== 'todos' && card.dataset.type !== tipo) {
                card.classList.add('hidden');
            }
        });

        // Oculta categorias vazias (CORREÇÃO IMPORTANTE)
        document.querySelectorAll('.category-section').forEach(section => {
            const visibleCards = section.querySelectorAll('.resource-card:not(.hidden)').length;
            section.style.display = visibleCards > 0 ? 'block' : 'none';
        });
    }

    // Função de tradução de tipos (ATUALIZADA)
    function traduzirTipo(tipo) {
        const traducoes = {
            'article': 'Artigos',
            'video': 'Vídeos',
            'podcast': 'Podcasts',
            'ebook': 'E-books', // Agora compatível com o texto do botão
            'todos': 'Todos'
        };
        return traducoes[tipo] || tipo;
        }

        // Opcional: Carregar recursos via JavaScript
        document.addEventListener('DOMContentLoaded', () => {
            // Se quiser carregar recursos dinamicamente via JS
            const recursos = [
                {
                    categoria: 'Saúde Mental',
                    tipo: 'article',
                    titulo: 'Gerenciando o Estresse no Ambiente Corporativo',
                    descricao: 'Técnicas comprovadas para reduzir a ansiedade e melhorar a produtividade.',
                    acao: 'Acessar'
                },
                {
                    categoria: 'Saúde Mental',
                    tipo: 'video',
                    titulo: 'Mindfulness para Iniciantes',
                    descricao: 'Guia prático de 15 minutos para meditação no local de trabalho.',
                    acao: 'Acessar'
                },
                {
                    categoria: 'Finanças Pessoais',
                    tipo: 'podcast',
                    titulo: 'Hábitos Financeiros Saudáveis',
                    descricao: 'Entrevista com especialistas em educação financeira corporativa.',
                    acao: 'Acessar'
                },
                {
                    categoria: 'Finanças Pessoais',
                    tipo: 'e-book',
                    titulo: 'Investindo para o Futuro',
                    descricao: 'Guia completo para planejamento financeiro e investimentos conscientes.',
                    acao: 'Acessar'
                },
            ];

        });
    </script>

       <style>
       
        :root {
            --primary-color: #6c63ff;
            --text-color: #2d2d2d;
            --light-gray: #666;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Poppins'; 
            color: var(--text-color);
            background: #f8f9fa;
        }

        /* CONTAINER*/
        .container_biblioteca{
             max-width: 1280px;
             margin: 0 auto;
            padding: 0 2rem;
            align-items: center;
        }

      
        /* Filtros */
        .filters {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin: 2rem 0;
            margin-top: 5rem;
        }

        .filter-btn {
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            background: #fff;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2.25rem;
            font-size: 0.875rem;
            font-weight: 600;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            transition: var(--transition);
        }

        
        .filter-btn:hover {
            background-color: var(--primary-color);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(108, 99, 255, 0.25);
        }

        .filter-btn.active {
            border-color: var(--primary-color);
            background: var(--primary-color);
            color: #fff;
        }

        /* Grid de Conteúdo */
        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem 0;
        }

        .resource-card {
            background: #fff;
            border-radius: 1rem;
            padding: 1.5rem;
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(108, 99, 255, 0.1);
            border-color: var(--primary-color);
        }

        .resource-type {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .article { background: #e6f4ff; color: #1a73e8; }
        .video { background: #fce8e6; color: #d93025; }
        .podcast { background: #f3e8fd; color: #8a4dff; }
        .ebook { background: #e8f5e9; color: #188038; }

        .resource-card h3 {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .resource-card p {
            color: var(--light-gray);
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .resource-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
        }

        .resource-link svg {
            width: 18px;
            height: 18px;
            transition: var(--transition);
        }

        .resource-link:hover svg {
            transform: translateX(3px);
        }

        /* Categorias */
        .category-section {
            margin: 4rem 0;
        }

        .category-title {
            font-size: 2rem;
            margin-bottom: 2rem;
            position: relative;
            padding-left: 1.5rem;
        }

        .category-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 8px;
            height: 80%;
            background: var(--primary-color);
            border-radius: 4px;
        }

        /* Responsivo */
        @media (max-width: 1500px) {
            .container {
                padding: 0 1.5rem;
            }
            
            .category-title {
                font-size: 1.75rem;
            }
        }

        .hidden {
    display: none !important;
}

.category-section {
    transition: opacity 0.3s ease;
}
    </style>

    
</main>
</body>
</html>