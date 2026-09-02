<?php
/**
 * Contato. Recebe de index.php: $perfil
 * Sem formulário e sem back-end: só os canais diretos.
 * Por decisão do Murilo, endereço residencial não aparece em lugar nenhum.
 */

$telefoneDigitos = preg_replace('/\D+/', '', $perfil['telefone']);
$whatsappUrl     = 'https://wa.me/55' . $telefoneDigitos;
?>
<section class="secao revelar" id="contato" aria-labelledby="titulo-contato">
    <header class="secao__cabecalho">
        <span class="secao__indice mono">06</span>
        <h2 class="secao__titulo" id="titulo-contato">Contato</h2>
    </header>

    <p class="texto contato__intro">
        Aberto a oportunidades de desenvolvimento e a conversas sobre automação de processos.
        O caminho mais rápido é o e-mail.
    </p>

    <ul class="contato">
        <li class="contato__item">
            <span class="contato__rotulo mono">E-mail</span>
            <a class="contato__valor" href="mailto:<?= e($perfil['email']) ?>">
                <?= e($perfil['email']) ?>
            </a>
        </li>

        <li class="contato__item">
            <span class="contato__rotulo mono">Telefone</span>
            <a class="contato__valor" href="<?= e($whatsappUrl) ?>" target="_blank" rel="noopener noreferrer">
                <?= e($perfil['telefone']) ?>
            </a>
        </li>

        <li class="contato__item">
            <span class="contato__rotulo mono">Local</span>
            <span class="contato__valor"><?= e($perfil['localizacao']) ?></span>
        </li>

        <?php foreach ($perfil['links'] as $link): ?>
            <?php if ($link['rotulo'] === 'E-mail') { continue; } ?>
            <li class="contato__item">
                <span class="contato__rotulo mono"><?= e($link['rotulo']) ?></span>
                <a class="contato__valor"
                   href="<?= e($link['url']) ?>"
                   <?php if (str_starts_with($link['url'], 'http')): ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>>
                    <?= e($link['handle']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
