<?php
/**
 * Seção "Sobre". Recebe de index.php: $perfil
 * O texto vem de dados/perfil.php, chave 'sobre' (um item = um parágrafo).
 */
?>
<section class="secao revelar" id="sobre" aria-labelledby="titulo-sobre">
    <header class="secao__cabecalho">
        <span class="secao__indice mono">01</span>
        <h2 class="secao__titulo" id="titulo-sobre">Sobre</h2>
    </header>

    <div class="texto">
        <?php foreach ($perfil['sobre'] as $paragrafo): ?>
            <p><?= e($paragrafo) ?></p>
        <?php endforeach; ?>
    </div>
</section>
