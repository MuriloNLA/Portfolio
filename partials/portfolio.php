<?php
/**
 * Portfólio. Recebe de index.php: $projetos
 *
 * A ordem de leitura de cada card é intencional:
 *   PROBLEMA -> SOLUÇÃO -> TECNOLOGIAS -> link do repositório.
 * Mantenha essa ordem ao mexer no HTML.
 */
?>
<section class="secao revelar" id="portfolio" aria-labelledby="titulo-portfolio">
    <header class="secao__cabecalho">
        <span class="secao__indice mono">03</span>
        <h2 class="secao__titulo" id="titulo-portfolio">Portfólio</h2>
    </header>

    <div class="projetos">
        <?php foreach ($projetos as $i => $projeto): ?>
            <article class="projeto">

                <header class="projeto__cabecalho">
                    <span class="projeto__numero mono"><?= e(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)) ?></span>
                    <div>
                        <h3 class="projeto__titulo"><?= e($projeto['titulo']) ?></h3>
                        <p class="projeto__subtitulo"><?= e($projeto['subtitulo']) ?></p>
                    </div>
                </header>

                <figure class="projeto__midia">
                    <?php if (!empty($projeto['imagem'])): ?>
                        <img class="projeto__imagem"
                             src="<?= e($projeto['imagem']) ?>"
                             alt="<?= e($projeto['imagem_alt']) ?>"
                             loading="lazy">
                    <?php else: ?>
                        <div class="projeto__imagem-vazia" role="img"
                             aria-label="Espaço reservado para screenshot de <?= e($projeto['titulo']) ?>">
                            <span class="mono">screenshot</span>
                        </div>
                    <?php endif; ?>
                </figure>

                <div class="projeto__bloco">
                    <h4 class="projeto__rotulo mono">Problema</h4>
                    <p class="projeto__texto"><?= e($projeto['problema']) ?></p>
                </div>

                <div class="projeto__bloco">
                    <h4 class="projeto__rotulo mono">Solução</h4>
                    <p class="projeto__texto"><?= e($projeto['solucao']) ?></p>
                </div>

                <div class="projeto__bloco">
                    <h4 class="projeto__rotulo mono">Tecnologias</h4>
                    <p class="projeto__tecnologias">
                        <?php foreach ($projeto['tecnologias'] as $tec): ?>
                            <span class="tag mono"><?= e($tec) ?></span>
                        <?php endforeach; ?>
                    </p>
                </div>

                <?php if (!empty($projeto['repo_nota'])): ?>
                    <p class="projeto__aviso"><?= e($projeto['repo_nota']) ?></p>
                <?php endif; ?>

                <?php if (!empty($projeto['repo'])): ?>
                    <p class="projeto__acao">
                        <a class="link-externo mono"
                           href="<?= e($projeto['repo']) ?>"
                           target="_blank" rel="noopener noreferrer">
                            Ver repositório
                            <span aria-hidden="true">&#8599;</span>
                        </a>
                    </p>
                <?php endif; ?>

            </article>
        <?php endforeach; ?>
    </div>
</section>
