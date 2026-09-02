<?php
/**
 * Currículo e portfólio — Murilo Nogueira de Lima Araújo
 *
 * Este arquivo só faz três coisas:
 *   1. carrega os arrays de dados/
 *   2. define o helper de escape
 *   3. inclui as partials na ordem das seções
 *
 * Todo o conteúdo editável está em dados/. Todo o HTML está em partials/.
 */

declare(strict_types=1);

$raiz = __DIR__;

$perfil       = require $raiz . '/dados/perfil.php';
$experiencias = require $raiz . '/dados/experiencias.php';
$formacao     = require $raiz . '/dados/formacao.php';
$skills       = require $raiz . '/dados/skills.php';
$projetos     = require $raiz . '/dados/projetos.php';

/**
 * Escapa texto para saída em HTML.
 * Regra: toda variável impressa nas partials passa por e().
 */
function e(?string $texto): string
{
    return htmlspecialchars((string) $texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Seções da coluna direita, na ordem em que aparecem. */
$secoes = [
    ['id' => 'sobre',       'rotulo' => 'Sobre',       'arquivo' => 'sobre'],
    ['id' => 'stack',       'rotulo' => 'Stack',       'arquivo' => 'stack'],
    ['id' => 'portfolio',   'rotulo' => 'Portfólio',   'arquivo' => 'portfolio'],
    ['id' => 'experiencia', 'rotulo' => 'Experiência', 'arquivo' => 'experiencia'],
    ['id' => 'formacao',    'rotulo' => 'Formação',    'arquivo' => 'formacao'],
    ['id' => 'contato',     'rotulo' => 'Contato',     'arquivo' => 'contato'],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($perfil['nome']) ?> — Currículo e portfólio</title>
<meta name="description" content="<?= e($perfil['momento']) ?>">
<meta name="author" content="<?= e($perfil['nome']) ?>">
<link rel="icon" type="image/png" href="assets/img/favicon.png">
<link rel="icon" type="image/svg+xml" href="assets/img/favicon.svg">

<!-- "Adicionar à Tela de Início" no iPhone: ícone próprio e abertura
     em modo app, sem a barra do Safari. -->
<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="Murilo Nogueira">
<meta name="theme-color" content="#0e0f11">
<link rel="manifest" href="manifest.json">

<link rel="stylesheet" href="assets/css/style.css?v=<?= filemtime($raiz . '/assets/css/style.css') ?>">
<!-- Sem JavaScript o fade-in não roda: o conteúdo precisa aparecer mesmo assim. -->
<noscript>
    <style>
        .revelar { opacity: 1 !important; transform: none !important; }
        .perfil__nav { display: block !important; }
        .menu-botao { display: none !important; }
    </style>
</noscript>
</head>
<body>

<a class="pular" href="#conteudo">Pular para o conteúdo</a>

<button class="menu-botao" id="menu-botao" type="button"
        aria-expanded="false" aria-controls="nav-secoes">
    <span class="menu-botao__traco" aria-hidden="true"></span>
    <span class="menu-botao__rotulo">Menu</span>
</button>

<div class="pagina">

    <?php include $raiz . '/partials/perfil.php'; ?>

    <main class="conteudo" id="conteudo">
        <?php foreach ($secoes as $secao): ?>
            <?php include $raiz . '/partials/' . $secao['arquivo'] . '.php'; ?>
        <?php endforeach; ?>

        <footer class="rodape">
            <p class="rodape__texto">
                <span class="mono">&copy; <?= date('Y') ?></span>
                <?= e($perfil['nome']) ?> · Feito à mão em HTML, CSS e PHP.
            </p>
        </footer>
    </main>

</div>

<script src="assets/js/main.js?v=<?= filemtime($raiz . '/assets/js/main.js') ?>" defer></script>
</body>
</html>
