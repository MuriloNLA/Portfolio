<?php
/**
 * Formação. Recebe de index.php: $formacao
 */
?>
<section class="secao revelar" id="formacao" aria-labelledby="titulo-formacao">
    <header class="secao__cabecalho">
        <span class="secao__indice mono">05</span>
        <h2 class="secao__titulo" id="titulo-formacao">Formação</h2>
    </header>

    <ol class="linha">
        <?php foreach ($formacao as $curso): ?>
            <li class="linha__item<?= !empty($curso['atual']) ? ' linha__item--atual' : '' ?>">

                <div class="linha__meta mono">
                    <span class="linha__periodo"><?= e($curso['periodo']) ?></span>
                </div>

                <div class="linha__corpo">
                    <h3 class="linha__titulo"><?= e($curso['curso']) ?></h3>
                    <p class="linha__sub"><?= e($curso['instituicao']) ?></p>

                    <?php if (!empty($curso['situacao'])): ?>
                        <p class="linha__nota mono"><?= e($curso['situacao']) ?></p>
                    <?php endif; ?>
                </div>

            </li>
        <?php endforeach; ?>
    </ol>
</section>
