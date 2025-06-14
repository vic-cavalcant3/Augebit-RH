
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
 <title>Augebit </title>
   <link rel="shortcut icon" type="image/x-icon" href="../RH/img/Elemento.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


  <style>


    :root {
      --primary: #4747D9;
      --primary-light: #4747D9;
      --secondary: #FFD700;
      --dark: #1A1A2E;
      --light: #F5F5F7;
      --gray: #6E6E73;
    }
    
    * {
            font-family: 'Poppins'; 
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    
    body {
      background: var(--light);
      color: var(--dark);
      line-height: 1.6;
    }
    
    .hero {
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      color: white;
      padding: 80px 20px;
      text-align: center;
      margin-bottom: 40px;
    }
    
    .hero h1 {
      font-size: 2.3rem;
      font-weight: 700;
      margin-bottom: 16px;
    }
    
    .hero p {
      font-size: 1.2rem;
      max-width: 700px;
      margin: 0 auto 30px;
    }
    
    .btn {
      display: inline-block;
      padding: 12px 28px;
      background: transparent;
      color: white;
      border: 2px solid white;
      border-radius: 30px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      cursor: pointer;
    }
    
    .btn:hover {
      background: white;
      color: var(--primary);
    }
    
    .container {
      width: 90%;
      max-width: 1000px;
      margin: 0 auto 60px;
    }
    
    .section-title {
      text-align: center;
      margin-bottom: 40px;
    }
    
    .section-title h2 {
      font-size: 2rem;
      color: var(--primary);
      margin-bottom: 10px;
    }
    
    .section-title p {
      color: var(--gray);
      max-width: 600px;
      margin: 0 auto;
    }
    
    .evaluation-form {
      background: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.05);
      margin-bottom: 50px;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: var(--dark);
    }
    
    .form-control {
      width: 100%;
      padding: 14px 18px;
      border: 1px solid #ddd;
      border-radius: 12px;
      font-size: 1rem;
      transition: border 0.3s;
    }
    
    .form-control:focus {
      outline: none;
      border-color: var(--primary);
    }
    
    textarea.form-control {
      min-height: 120px;
      resize: vertical;
    }
    
    .rating-select {
      display: flex;
      gap: 10px;
      margin: 15px 0;
    }
    
    .rating-option {
      cursor: pointer;
      font-size: 1.8rem;
      transition: transform 0.2s;
    }
    
    .rating-option:hover {
      transform: scale(1.1);
    }
    
    .submit-btn {
      background: var(--primary);
      color: white;
      border: none;
      padding: 14px 28px;
      border-radius: 30px;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s;
      width: 100%;
    }
    
    .submit-btn:hover {
      background: var(--primary-light);
      transform: translateY(-2px);
    }
    
    .reviews-container {
      display: grid;
      grid-template-columns: 1fr;
      gap: 20px;
    }
    
    .review-card {
      background: white;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.03);
      position: relative;
      overflow: hidden;
    }
    
    .review-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 5px;
      height: 100%;
      background: var(--primary);
    }
    
    .review-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }
    
    .review-author {
      font-weight: 600;
      font-size: 1.1rem;
      color: var(--dark);
    }
    
    .review-rating {
      color: var(--secondary);
      font-size: 1.2rem;
    }
    
    .review-content {
      color: var(--gray);
    }
    
    @media (max-width: 768px) {
      .hero h1 {
        font-size: 2.2rem;
      }
      
      .hero p {
        font-size: 1rem;
      }
      
      .evaluation-form {
        padding: 25px;
      }
    }
  </style>

</head>
<body>
  <section class="hero">
    <h1>Área de comentários e avaliações</h1>
    <p>Sua Voz Define o Futuro da Empresa.</p>
    <a href="#avaliacoes" class="btn">Avalie nosso trabalho</a>
  </section>

  <div class="container" id="avaliacoes">
    <div class="section-title">
      <h2>Espaço de Comentários e Avaliações</h2>
      <p>Aqui é o seu espaço para compartilhar experiências e opiniões sobre nossos serviços.</p>
    </div>

    <div class="evaluation-form">

      <form method="POST" action="gravar.php">

        <div class="form-group">
          <label for="nome">Seu nome</label>
          <input type="text" id="nome" name="nome" class="form-control" placeholder="Como gostaria de ser chamado?" required>
        </div>
        
        <div class="form-group">
          <label for="comentario">Seu comentário</label>
          <textarea id="comentario" name="comentario" class="form-control" placeholder="Conte sua experiência com nossos serviços..." required></textarea>
        </div>

        <div class="form-group">
          <label>Como você avalia a usabilidade do [Recurso X]</label>
          <select name="usabilidade" class="form-control" required>
            <option value="">Selecione uma nota</option>
            <option value="5">🔷🔷🔷🔷🔷 - Excelente</option>
            <option value="4">🔷🔷🔷🔷 - Muito bom</option>
            <option value="3">🔷🔷🔷 - Bom</option>
            <option value="2">🔷🔷 - Regular</option>
            <option value="1">🔷 - Ruim</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>O [Recurso X] contribui para sua produtividade diária?</label>
          <select name="produtividadediaria" class="form-control" required>
            <option value="">Selecione uma nota</option>
            <option value="5">🔷🔷🔷🔷🔷 - Excelente</option>
            <option value="4">🔷🔷🔷🔷 - Muito bom</option>
            <option value="3">🔷🔷🔷 - Bom</option>
            <option value="2">🔷🔷 - Regular</option>
            <option value="1">🔷 - Ruim</option>
          </select>
        </div>

        <div class="form-group">
          <label for="comentario">Seu Qual recurso você menos utiliza e por quê?</label>
          <textarea id="comentario" name="recurso" class="form-control" placeholder="Conte sua experiência com nossos serviços..." required></textarea>
        </div>

        <div class="form-group">
          <label for="comentario">Sugestões para melhorar [Departamento/Processo]:</label>
          <textarea id="comentario" name="sugestoes" class="form-control" placeholder="Conte sua experiência com nossos serviços..." required></textarea>
        </div>

        <div class="form-group">
          <label>Classifique sua satisfação geral com os benefícios oferecidos:</label>
          <select name="satisfacaogeral" class="form-control" required>
            <option value="">Selecione uma nota</option>
            <option value="5">🔷🔷🔷🔷🔷 - Excelente</option>
            <option value="4">🔷🔷🔷🔷 - Muito bom</option>
            <option value="3">🔷🔷🔷 - Bom</option>
            <option value="2">🔷🔷 - Regular</option>
            <option value="1">🔷 - Ruim</option>
          </select>
        </div>
        
        <button type="submit" class="submit-btn" >Enviar Avaliação</button>
      </form>
    </div>

    
  </div>
</body>
</html>