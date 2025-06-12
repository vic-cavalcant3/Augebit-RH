<?php
session_start();
// session_destroy()
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Augebit </title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../img/Elemento.png">
    <link rel="stylesheet" href="styles/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles/footer.css">
    <style>
        :root {
            --primary-color: #6c63ff;
            --text-color: #2d2d2d;
            --light-gray: #666;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins'; }
        body { 
            font-family: 'Poppins'; 
            color: var(--text-color); 
            line-height: 1.6;
            overflow-x: hidden;
        }
       
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: calc(100vh - 100px);
            padding: 4rem 0;
            margin: 0 auto;
        }
        .hero-text {
            flex: 0 1 600px;
            padding-right: 4rem;
        }
        .hero-text h1 {
            font-size: 3.5rem;
            line-height: 1.1;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        .hero-text p {
            font-size: 1.125rem;
            color: var(--light-gray);
            margin-bottom: 2.5rem;
            max-width: 480px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2.25rem;
            font-size: 1rem;
            font-weight: 600;
            border: 2px solid var(--primary-color);
            border-radius: 50px;
            color: var(--primary-color);
            transition: var(--transition);
        }
        .btn:hover {
            background-color: var(--primary-color);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(108, 99, 255, 0.25);
        }
        .hero-image {
            flex: 0 1 600px;
            position: relative;
        }
        .hero-image img {
            width: 100%;
            height: auto;
            border-radius: 1rem;
            transform: translateY(0);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @media (max-width: 1024px) {
            .container {
                padding: 0 1.5rem;
            }
            .hero {
                flex-direction: column-reverse;
                text-align: center;
                gap: 3rem;
                padding: 6rem 0 4rem;
            }
            .hero-text {
                padding-right: 0;
                max-width: 680px;
            }
            .hero-text h1 {
                font-size: 2.75rem;
            }
            .hero-text p {
                margin: 0 auto 2.5rem;
            }
        }

  
.services-section {
    padding: 6rem 0;
}

.services-text {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 4rem;
}

.services-text h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.services-text p {
    color: var(--light-gray);
    font-size: 1.125rem;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2.5rem;
}

.service-card {
    background:rgba(107, 99, 255, 0.03);
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    transition: var(--transition);
    text-align: left;
}

.service-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 24px rgba(107, 99, 255, 0.19);
}

.service-card h3 {
    font-size: 1.5rem;
    margin-bottom: 0.75rem;
    color: var(--primary-color);
}

.service-card p {
    color: var(--light-gray);
    font-size: 1rem;
    line-height: 1.6;
}
.container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

     
 .footer {
    background-color: #f9f9f9;
    color: #444;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    padding-top: 40px;
    border-top: 1px solid #ddd;
  }

  .footer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 40px;
    padding: 0 20px 40px;
    max-width: 1200px;
    margin: 0 auto;
  }

  .footer-brand img {
    margin-bottom: 15px;
    max-width: 160px;
  }

  .footer-brand p {
    font-style: italic;
    font-size: 0.95rem;
    line-height: 1.5;
    color: #666;
  }

  .footer-links {
    min-width: 200px;
  }

  .footer-links h4 {
    margin-bottom: 15px;
    font-size: 1.1rem;
    color: #222;
  }

  .footer-links a {
    display: block;
    color: #555;
    text-decoration: none;
    margin-bottom: 8px;
    font-size: 0.95rem;
    transition: color 0.3s ease;
  }

  .footer-links a:hover {
    color: #000;
  }

  .social-links {
    display: flex;
    gap: 15px;
    margin-top: 10px;
  }

  .social-links a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: rgba(0, 0, 0, 0.05);
    border-radius: 50%;
    transition: all 0.3s ease;
  }

  .social-links a:hover {
    background: rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
  }

  .social-links svg {
    width: 20px;
    height: 20px;
    fill: #333;
  }

  .footer-bottom {
    border-top: 1px solid #ddd;
    text-align: center;
    padding: 20px 0;
    font-size: 0.85rem;
    background-color: #f1f1f1;
    color: #777;
  }

  @media (max-width: 768px) {
    .footer-container {
      flex-direction: column;
      text-align: center;
      align-items: center;
    }

    .footer-links {
      margin-top: 20px;
    }

    .footer-brand img {
      margin: 0 auto 15px;
    }

    .social-links {
      justify-content: center;
    }
  }





.process-flow {
        padding: 4rem 0;
    }

    .process-step {
        display: flex;
        align-items: flex-start;
        gap: 2rem;
        margin-bottom: 3rem;
        position: relative;
    }

    .step-marker {
        font-size: 2rem;
        font-weight: 300;
        color: var(--primary-color);
        min-width: 60px;
        display: inline-block;
    }

    .step-content {
        flex-grow: 1;
        border-bottom: 1px solid #eee;
        padding-bottom: 3rem;
    }

    .step-title {
        font-size: 1.5rem;
        margin-bottom: 0.75rem;
        color: #222;
    }

    .step-description {
        font-size: 1rem;
        line-height: 1.6;
        color: #666;
        max-width: 480px;
    }

    .step-connector {
        position: absolute;
        bottom: -1rem;
        left: 28px;
        width: 1px;
        height: 2rem;
        background: #ddd;
    }

    @media (min-width: 768px) {
        .process-step {
            gap: 4rem;
            margin-bottom: 4rem;
        }

        .step-marker {
            font-size: 2.5rem;
            text-align: right;
            min-width: 80px;
        }

        .step-content {
            border-bottom: none;
            padding-bottom: 0;
        }

        .step-connector {
            left: 64px;
            height: 4rem;
        }
    }
    
    </style>
</head>
<body>
<header>
    <div class="container">
        <a href="#" class="logo"><img src="../img/Logo.png" alt="Augebit"></a>
        <nav>
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                  <li><a href="centralDeAjuda.php">Central de Ajuda</a></li>
                <li><a href="cursos.php">Cursos</a></li>
                <li><a href="biblioteca.php">Biblioteca</a></li>
                <li>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <a href="funcionalidades/ponto/dashboard.php">Bater ponto</a>
                <?php else: ?>
                    <a href="#"></a>
                <?php endif; ?>
                </li>
            </ul>


            <?php if (isset($_SESSION['usuario'])): ?>
            <a  href="usuario.php" class="btn-header">Acessar o Perfil</a>
            <?php else: ?>
                <a  href="autenticacao/cadastro.php" class="btn-header">Cadastre-se</a>
            <?php endif;?>
        </nav>
    </div>
</header>
    <main>
        <section class="hero container">
            <div class="hero-text">
                <h1>Design estratégico<br>e funcional.</h1>
                <p>Transformamos ideias em soluções tangíveis através de um design centrado no usuário.</p>
                <a href="#nossa-metodologia" class="btn" id="saibaMaisBtn">Saiba mais</a>
            </div>
            <div class="hero-image">
                <img src="../img/Elemento.png" alt="Projetos de design industrial">
            </div>
        </section>


<section class="services-section">
  <div class="container services-container">
    <div class="services-grid">
      <div class="service-card">
        <h3>Quem somos?</h3>
        <p>Augébit é uma empresa especializada em desenvolver e gerir projetos de design voltados para a produção de equipamentos e produtos de consumo final para indústrias.</p>
      </div>
      <div class="service-card">
        <h3>Nossa equipe</h3>
        <p>A empresa conta com uma equipe qualificada e com um diferencial estratégico, onde os colaboradores recebem mentoria do diretor de arte da empresa, auxiliando para um melhor desenvolvimento técnico de cada projeto.</p>
      </div>
      <div class="service-card">
        <h3>Propósito</h3>
        <p>Oferecer projetos técnicos de qualidade, alinhando estética, ergonomia, usabilidade e funcionalidade, para criar produtos inovadores, personalizados e adequados às necessidades dos clientes.</p>
      </div>
    </div>
  </div>
</section>




<section class="container">
    <div class="content-section">
        
        <div class="process-flow">
          
            <div class="process-step">
                <span class="step-marker">01</span>
                <div class="step-content">
                    <h2 class="step-title">Imersão Estratégica</h2>
                    <p class="step-description">
                        Pesquisa de mercado e análise comportamental para fundamentar cada decisão de design.
                    </p>
                </div>
                <div class="step-connector"></div>
            </div>

        
            <div class="process-step">
                <span class="step-marker">02</span>
                <div class="step-content">
                    <h2 class="step-title">Prototipagem Dinâmica</h2>
                    <p class="step-description">
                        Desenvolvimento iterativo de conceitos com testes de usabilidade em tempo real.
                    </p>
                </div>
                <div class="step-connector"></div>
            </div>

          
            <div class="process-step">
                <span class="step-marker">03</span>
                <div class="step-content">
                    <h2 class="step-title">Implementação Eficaz</h2>
                    <p class="step-description">
                        Execução monitorada com métricas precisas e ajustes contínuos para otimização.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>






    </main>
   <footer class="footer">
        <div class="container footer-container">
            <div class="footer-brand">
                <img src="../img/Logo.png" alt="Augebit" height="40">
                <p>Se pode ser imaginado poderá ser criado.</p>
            </div>
             <div class="footer-links">
                <h4>Redes Sociais</h4>
                <div class="social-links">
                    <a href="#" target="_blank" title="Instagram">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" target="_blank" title="LinkedIn">
                        <svg viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    <a href="#" target="_blank" title="YouTube">
                        <svg viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="footer-links">
                <h4>Navegar</h4>
                <a href="index.php">Home</a>
                <a href="#about-section">Sobre</a>
                <a href="#">Contato</a>
                <a href="biblioteca.php">Biblioteca</a>
            </div>
           
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Augebit. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>