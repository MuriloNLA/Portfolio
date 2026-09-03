<?php
/**
 * Currículo em PDF — Murilo Nogueira de Lima Araújo
 *
 * Página independente do site: mesmos dados de dados/, layout e CSS
 * próprios (assets/css/curriculo.css), pensados pra impressão/PDF,
 * não pra navegador. Renderizada uma vez no build e convertida em
 * PDF pela Action (ver .github/workflows/deploy-pages.yml).
 */

declare(strict_types=1);

$raiz = __DIR__;

$perfil       = require $raiz . '/dados/perfil.php';
$experiencias = require $raiz . '/dados/experiencias.php';
$formacao     = require $raiz . '/dados/formacao.php';
$skills       = require $raiz . '/dados/skills.php';

function e(?string $texto): string
{
    return htmlspecialchars((string) $texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$linkedin = null;
$github   = null;
foreach ($perfil['links'] as $link) {
    if ($link['rotulo'] === 'LinkedIn') { $linkedin = $link; }
    if ($link['rotulo'] === 'GitHub')   { $github   = $link; }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title><?= e($perfil['nome']) ?> — Currículo</title>
<link rel="stylesheet" href="assets/css/curriculo.css">
</head>
<body>

<header class="cv-cabecalho">
    <h1><?= e($perfil['nome']) ?></h1>
    <p class="cv-momento"><?= e($perfil['momento']) ?></p>
    <ul class="cv-contato">
        <li><?= e($perfil['localizacao']) ?></li>
        <li><a href="mailto:<?= e($perfil['email']) ?>"><?= e($perfil['email']) ?></a></li>
        <li><?= e($perfil['telefone']) ?></li>
        <?php if ($linkedin): ?>
            <li><a href="<?= e($linkedin['url']) ?>">linkedin.com/in/<?= e($linkedin['handle']) ?></a></li>
        <?php endif; ?>
        <?php if ($github): ?>
            <li><a href="<?= e($github['url']) ?>">github.com/<?= e($github['handle']) ?></a></li>
        <?php endif; ?>
    </ul>
</header>

<section class="cv-secao">
    <h2>Resumo</h2>
    <p><?= e($perfil['sobre'][0]) ?></p>
    <p><?= e($perfil['sobre'][2]) ?></p>
</section>

<section class="cv-secao">
    <h2>Experiência profissional</h2>
    <?php foreach ($experiencias as $cargo): ?>
        <article class="cv-item">
            <div class="cv-item__cabecalho">
                <h3><?= e($cargo['cargo']) ?> <span class="cv-item__empresa"><?= e($cargo['empresa']) ?></span></h3>
                <span class="cv-item__periodo"><?= e($cargo['periodo']) ?></span>
            </div>
            <p class="cv-item__meta"><?= e($cargo['vinculo']) ?> · <?= e($cargo['local']) ?></p>
            <ul class="cv-lista">
                <?php foreach ($cargo['atividades'] as $atividade): ?>
                    <li><?= e($atividade) ?></li>
                <?php endforeach; ?>
            </ul>
        </article>
    <?php endforeach; ?>
</section>

<section class="cv-secao">
    <h2>Formação acadêmica</h2>
    <?php foreach ($formacao as $curso): ?>
        <article class="cv-item cv-item--compacto">
            <div class="cv-item__cabecalho">
                <h3><?= e($curso['curso']) ?> <span class="cv-item__empresa"><?= e($curso['instituicao']) ?></span></h3>
                <span class="cv-item__periodo"><?= e($curso['periodo']) ?></span>
            </div>
            <?php if (!empty($curso['situacao'])): ?>
                <p class="cv-item__meta"><?= e($curso['situacao']) ?></p>
            <?php endif; ?>
        </article>
    <?php endforeach; ?>
</section>

<section class="cv-secao">
    <h2>Competências técnicas</h2>
    <dl class="cv-skills">
        <?php foreach ($skills as $grupo): ?>
            <dt><?= e($grupo['grupo']) ?></dt>
            <dd>
                <?php
                $nomes = array_map(function ($item) {
                    return is_array($item) ? $item['nome'] : $item;
                }, $grupo['itens']);
                echo e(implode(' · ', $nomes));
                ?>
            </dd>
        <?php endforeach; ?>
    </dl>
</section>

<footer class="cv-rodape">
    Portfólio completo, com projetos e código-fonte: murilonla.github.io/Portfolio
</footer>

</body>
</html>
