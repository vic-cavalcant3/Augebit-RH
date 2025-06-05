<!-- Seção de Processo - Layout Dinâmico -->
<section class="container">
    <div class="content-section">
        <hr class="section-divider">
        
        <div class="enhanced-process">
            <!-- Item 1 -->
            <div class="enhanced-step">
                <div class="step-content right-align">
                    <span class="step-marker">01</span>
                    <h2 class="step-title">Imersão Estratégica</h2>
                    <p class="step-description">
                        Pesquisa de mercado e análise comportamental para fundamentar cada decisão de design.
                    </p>
                </div>
                <div class="round-card">
                    <div class="card-inner">
                        <svg class="card-icon" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/></svg>
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="enhanced-step">
                <div class="step-content right-align">
                    <span class="step-marker">02</span>
                    <h2 class="step-title">Prototipagem Dinâmica</h2>
                    <p class="step-description">
                        Desenvolvimento iterativo de conceitos com testes de usabilidade em tempo real.
                    </p>
                </div>
                <div class="round-card">
                    <div class="card-inner">
                        <svg class="card-icon" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-8 6.5c1.93 0 3.5 1.57 3.5 3.5s-1.57 3.5-3.5 3.5-3.5-1.57-3.5-3.5 1.57-3.5 3.5-3.5z"/></svg>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="enhanced-step">
                <div class="step-content right-align">
                    <span class="step-marker">03</span>
                    <h2 class="step-title">Implementação Eficaz</h2>
                    <p class="step-description">
                        Execução monitorada com métricas precisas e ajustes contínuos para otimização.
                    </p>
                </div>
                <div class="round-card">
                    <div class="card-inner">
                        <svg class="card-icon" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-3 10h-3v3c0 .55-.45 1-1 1s-1-.45-1-1v-3H8c-.55 0-1-.45-1-1s.45-1 1-1h3V8c0-.55.45-1 1-1s1 .45 1 1v3h3c.55 0 1 .45 1 1s-.45 1-1 1z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .enhanced-process {
        padding: 4rem 0;
        position: relative;
    }

    .enhanced-step {
        display: flex;
        justify-content: flex-end;
        gap: 4rem;
        margin-bottom: 8rem;
        position: relative;
        opacity: 0;
        transform: translateX(30px);
        transition: all 0.6s ease-out;
    }

    .enhanced-step.visible {
        opacity: 1;
        transform: translateX(0);
    }

    .step-content.right-align {
        text-align: right;
        max-width: 500px;
        padding: 2rem;
        position: relative;
        z-index: 2;
    }

    .round-card {
        width: 160px;
        height: 160px;
        background: #f5f5f5;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        cursor: pointer;
    }

    .round-card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    }

    .card-inner {
        width: 100px;
        height: 100px;
        border: 2px solid #333;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-icon {
        width: 40px;
        height: 40px;
        fill: #333;
        transition: transform 0.3s ease;
    }

    .round-card:hover .card-icon {
        transform: rotate(15deg);
    }

    .step-marker {
        font-size: 1.2rem;
        color: #666;
        display: block;
        margin-bottom: 1rem;
    }

    .step-title {
        font-size: 1.8rem;
        color: #222;
        margin-bottom: 1rem;
        position: relative;
        display: inline-block;
    }

    .step-title::after {
        content: '';
        position: absolute;
        right: 0;
        bottom: -8px;
        width: 40px;
        height: 2px;
        background: #333;
        transition: width 0.3s ease;
    }

    .enhanced-step:hover .step-title::after {
        width: 100%;
    }

    .step-description {
        font-size: 1rem;
        line-height: 1.6;
        color: #666;
        margin-top: 1.5rem;
    }

    @media (max-width: 768px) {
        .enhanced-step {
            flex-direction: column;
            align-items: flex-end;
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .round-card {
            width: 120px;
            height: 120px;
            margin-right: 1rem;
        }

        .card-inner {
            width: 80px;
            height: 80px;
        }

        .card-icon {
            width: 30px;
            height: 30px;
        }
    }

    /* Animação ao scroll */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>

<script>
    // Observador de interseção para animações
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.3 });

    document.querySelectorAll('.enhanced-step').forEach(step => {
        observer.observe(step);
    });
</script>