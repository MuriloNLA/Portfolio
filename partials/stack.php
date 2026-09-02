<?php
/**
 * Faixa de stack, agrupada por natureza. Recebe de index.php: $skills
 * Sem nível, sem porcentagem: só a lista do que se usa.
 */
?>
<section class="secao revelar" id="stack" aria-labelledby="titulo-stack">
    <header class="secao__cabecalho">
        <span class="secao__indice mono">02</span>
        <h2 class="secao__titulo" id="titulo-stack">Stack</h2>
    </header>

    <dl class="stack">
        <?php foreach ($skills as $grupo): ?>
            <div class="stack__grupo">
                <dt class="stack__rotulo mono"><?= e($grupo['grupo']) ?></dt>
                <dd class="stack__itens">
                    <?php foreach ($grupo['itens'] as $item): ?>
                        <?php
                            $nome = is_array($item) ? $item['nome'] : $item;
                            $nota = is_array($item) && !empty($item['nota']) ? $item['nota'] : '';
                        ?>
                        <span class="tag mono">
                            <?= e($nome) ?><?php if ($nota !== ''): ?><em class="tag__nota"><?= e($nota) ?></em><?php endif; ?>
                        </span>
                    <?php endforeach; ?>
                </dd>
            </div>
        <?php endforeach; ?>
    </dl>
</section>
