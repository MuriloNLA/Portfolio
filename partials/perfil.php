<?php
/**
 * Coluna esquerda fixa: avatar, nome, momento atual, localização, links e navegação.
 * Recebe de index.php: $perfil, $secoes
 */
?>
<aside class="perfil" id="painel-perfil">
    <div class="perfil__interno">

        <div class="perfil__banner" aria-hidden="true"></div>

        <div class="perfil__corpo">

        <img class="perfil__avatar"
             src="<?= e($perfil['avatar']) ?>"
             alt="<?= e($perfil['avatar_alt']) ?>"
             width="128" height="128">

        <h1 class="perfil__nome"><?= e($perfil['nome']) ?></h1>
        <p class="perfil__handle mono"><?= e($perfil['apelido']) ?></p>

        <p class="perfil__momento"><?= e($perfil['momento']) ?></p>

        <p class="perfil__local mono">
            <span class="perfil__local-marca" aria-hidden="true"></span>
            <?= e($perfil['localizacao']) ?>
        </p>

        <ul class="perfil__links">
            <?php foreach ($perfil['links'] as $link): ?>
                <li class="perfil__link-item">
                    <a class="perfil__link"
                       href="<?= e($link['url']) ?>"
                       <?php if (str_starts_with($link['url'], 'http')): ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>>
                        <span class="perfil__link-rotulo mono"><?= e($link['rotulo']) ?></span>
                        <span class="perfil__link-handle"><?= e($link['handle']) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <nav class="perfil__nav" id="nav-secoes" aria-label="Seções da página">
            <ul class="perfil__nav-lista">
                <?php foreach ($secoes as $secao): ?>
                    <li>
                        <a class="perfil__nav-link mono" href="#<?= e($secao['id']) ?>">
                            <?= e($secao['rotulo']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        </div>

    </div>
</aside>
