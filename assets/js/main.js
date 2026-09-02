/* =============================================================
   main.js — só duas coisas:
     1. abrir e fechar a navegação no mobile
     2. fade-in discreto das seções ao rolar

   Nada além disso. Sem dependência, sem build.
   ============================================================= */

(function () {
    'use strict';

    /* ---------- 1. Menu mobile ---------- */

    var botao = document.getElementById('menu-botao');
    var nav = document.querySelector('.perfil__nav');

    if (botao && nav) {
        botao.addEventListener('click', function () {
            var aberto = nav.getAttribute('data-aberto') === 'true';
            nav.setAttribute('data-aberto', String(!aberto));
            botao.setAttribute('aria-expanded', String(!aberto));
        });

        // Clicar em um link fecha o menu e deixa o scroll acontecer.
        nav.addEventListener('click', function (evento) {
            if (evento.target.closest('a')) {
                nav.setAttribute('data-aberto', 'false');
                botao.setAttribute('aria-expanded', 'false');
            }
        });
    }

    /* ---------- 2. Fade-in no scroll ---------- */

    var alvos = document.querySelectorAll('.revelar');

    var semMovimento = window.matchMedia
        && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Sem IntersectionObserver ou com movimento reduzido: mostra tudo direto.
    if (!('IntersectionObserver' in window) || semMovimento) {
        alvos.forEach(function (alvo) {
            alvo.classList.add('revelar--visivel');
        });
        return;
    }

    var observador = new IntersectionObserver(function (entradas) {
        entradas.forEach(function (entrada) {
            if (!entrada.isIntersecting) {
                return;
            }
            entrada.target.classList.add('revelar--visivel');
            observador.unobserve(entrada.target);
        });
    }, {
        rootMargin: '0px 0px -8% 0px',
        threshold: 0.06
    });

    alvos.forEach(function (alvo) {
        observador.observe(alvo);
    });
}());
