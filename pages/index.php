<?php

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
    <style>
        :root {
            --primary-color: #6c63ff;
            --text-color: #2d2d2d;
            --light-gray: #666;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Inter', sans-serif; 
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
.footer {
    background-color: #f2f2f5;
    padding: 4rem 0 2rem;
    color: var(--text-color);
    font-size: 0.9375rem;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 2rem;
}

.footer-brand {
    max-width: 300px;
}

.footer-brand img {
    margin-bottom: 1rem;
}

.footer-brand p {
    color: var(--light-gray);
    line-height: 1.5;
}

.footer-links {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.footer-links a {
    color: var(--text-color);
    transition: var(--transition);
}

.footer-links a:hover {
    color: var(--primary-color);
}

.footer-bottom {
    text-align: center;
    margin-top: 2rem;
    color: #999;
    font-size: 0.875rem;
}
a {
    text-decoration: none;
}
ul, ol {
    list-style: none;
}

a {
    text-decoration: none;
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
                <li><a href="#services-section">Sobre</a></li>
                <li><a href="#">Contato</a></li>
                <li><a href="biblioteca.php">Biblioteca</a></li>
            </ul>
            <a  href="autenticacao/cadastro.php" class="btn-header">Cadastre-se</a>
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
                    <a href="#" target="_blank"><img src="../img/instagram.png" alt=""></a>
                    <a href="#" target="_blank"><img src="../img/linkedin.png" alt=""></a>
                    <a href="#" target="_blank"><img src="../img/youtube.png" alt=""></a>
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