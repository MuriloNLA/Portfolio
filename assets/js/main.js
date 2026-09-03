/* =============================================================
   main.js — só três coisas:
     1. abrir e fechar a navegação no mobile
     2. lightbox das imagens de projeto
     3. fade-in discreto das seções ao rolar

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

    /* ---------- 2. Lightbox das imagens de projeto ---------- */

    var lightbox = document.getElementById('lightbox');
    var lightboxImagem = document.getElementById('lightbox-imagem');
    var lightboxFechar = lightbox && lightbox.querySelector('.lightbox__fechar');
    var gatilhoLightbox = null;

    function abrirLightbox(img) {
        lightboxImagem.src = img.currentSrc || img.src;
        lightboxImagem.alt = img.alt;
        lightboxImagem.classList.remove('lightbox__imagem--zoom');
        lightbox.hidden = false;
        document.body.classList.add('lightbox-aberto');
        gatilhoLightbox = img;
        lightboxFechar.focus();
    }

    function fecharLightbox() {
        lightbox.hidden = true;
        lightboxImagem.src = '';
        document.body.classList.remove('lightbox-aberto');
        if (gatilhoLightbox) {
            gatilhoLightbox.focus();
        }
    }

    if (lightbox && lightboxImagem && lightboxFechar) {
        document.querySelectorAll('.projeto__imagem').forEach(function (img) {
            img.addEventListener('click', function () {
                abrirLightbox(img);
            });
            img.addEventListener('keydown', function (evento) {
                if (evento.key === 'Enter' || evento.key === ' ') {
                    evento.preventDefault();
                    abrirLightbox(img);
                }
            });
        });

        lightboxFechar.addEventListener('click', fecharLightbox);

        // Clicar fora da imagem fecha.
        lightbox.addEventListener('click', function (evento) {
            if (evento.target === lightbox) {
                fecharLightbox();
            }
        });

        // Clicar na imagem alterna entre caber na tela e tamanho real.
        lightboxImagem.addEventListener('click', function () {
            lightboxImagem.classList.toggle('lightbox__imagem--zoom');
        });

        document.addEventListener('keydown', function (evento) {
            if (evento.key === 'Escape' && !lightbox.hidden) {
                fecharLightbox();
            }
        });
    }

    /* ---------- 3. Fade-in no scroll ---------- */

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
