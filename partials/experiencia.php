<?php
/**
 * Experiência profissional. Recebe de index.php: $experiencias
 */
?>
<section class="secao revelar" id="experiencia" aria-labelledby="titulo-experiencia">
    <header class="secao__cabecalho">
        <span class="secao__indice mono">04</span>
        <h2 class="secao__titulo" id="titulo-experiencia">Experiência</h2>
    </header>

    <ol class="linha">
        <?php foreach ($experiencias as $exp): ?>
            <li class="linha__item<?= !empty($exp['atual']) ? ' linha__item--atual' : '' ?>">

                <div class="linha__meta mono">
                    <span class="linha__periodo"><?= e($exp['periodo']) ?></span>
                    <?php if (!empty($exp['local'])): ?>
                        <span class="linha__local"><?= e($exp['local']) ?></span>
                    <?php endif; ?>
                </div>

                <div class="linha__corpo">
                    <h3 class="linha__titulo"><?= e($exp['cargo']) ?></h3>
                    <p class="linha__sub"><?= e($exp['empresa']) ?></p>

                    <?php if (!empty($exp['vinculo'])): ?>
                        <p class="linha__nota mono"><?= e($exp['vinculo']) ?></p>
                    <?php endif; ?>

                    <?php if (!empty($exp['atividades'])): ?>
                        <ul class="linha__lista">
                            <?php foreach ($exp['atividades'] as $atividade): ?>
                                <li><?= e($atividade) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

            </li>
        <?php endforeach; ?>
    </ol>
</section>
