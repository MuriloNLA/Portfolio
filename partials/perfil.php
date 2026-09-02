<?php
/**
 * Coluna esquerda fixa: avatar, nome, momento atual, localização, links e navegação.
 * Recebe de index.php: $perfil, $secoes
 */
?>
<aside class="perfil" id="painel-perfil">
    <div class="perfil__interno">

        <div class="perfil__banner" aria-hidden="true">
            <span class="perfil__banner-mira perfil__banner-mira--tl"></span>
            <span class="perfil__banner-mira perfil__banner-mira--tr"></span>
            <span class="perfil__banner-mira perfil__banner-mira--bl"></span>
            <span class="perfil__banner-mira perfil__banner-mira--br"></span>
            <svg class="perfil__banner-cubo" viewBox="0 0 100 100">
                <polygon points="50,12 82.9,31 82.9,69 50,88 17.1,69 17.1,31" fill="none" stroke="currentColor" stroke-width="3"/>
                <line x1="50" y1="50" x2="50" y2="12" stroke="currentColor" stroke-width="3"/>
                <line x1="50" y1="50" x2="17.1" y2="69" stroke="currentColor" stroke-width="3"/>
                <line x1="50" y1="50" x2="82.9" y2="69" stroke="currentColor" stroke-width="3"/>
            </svg>
            <svg class="perfil__banner-globo" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="3"/>
                <ellipse cx="50" cy="50" rx="16" ry="40" fill="none" stroke="currentColor" stroke-width="3"/>
                <line x1="10" y1="50" x2="90" y2="50" stroke="currentColor" stroke-width="3"/>
                <line x1="14.3" y1="32" x2="85.7" y2="32" stroke="currentColor" stroke-width="2.4"/>
                <line x1="14.3" y1="68" x2="85.7" y2="68" stroke="currentColor" stroke-width="2.4"/>
            </svg>
        </div>

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
