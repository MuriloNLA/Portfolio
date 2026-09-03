# Currículo e portfólio — Murilo Nogueira de Lima Araújo

[![Deploy](https://github.com/MuriloNLA/Portfolio/actions/workflows/deploy-pages.yml/badge.svg)](https://github.com/MuriloNLA/Portfolio/actions/workflows/deploy-pages.yml)

🔗 **[murilonla.github.io/Portfolio](https://murilonla.github.io/Portfolio/)**

![Preview do site](assets/img/readme-preview.png)

Site pessoal de currículo e portfólio, em HTML, CSS e PHP puro — sem framework, sem banco de dados, sem build. Instalável como app na tela de início do celular (PWA) e publicado automaticamente no GitHub Pages a cada push.

---

## Sobre o projeto

Em vez de um template pronto, o site foi construído do zero — a ideia é que o próprio código já funcione como prova de trabalho, não só o conteúdo. Todo o currículo (experiência, formação, projetos, stack) mora em arrays PHP simples: dá pra atualizar editando um arquivo, sem tocar em HTML.

Alguns detalhes técnicos, caso esteja avaliando o código:

- **Zero dependências** — sem Bootstrap, Tailwind, jQuery ou fontes de CDN. Só PHP, CSS e JS próprios.
- **Deploy automático** — uma GitHub Action renderiza o PHP em HTML estático a cada push e publica no GitHub Pages.
- **PWA** — dá pra instalar como app no iPhone/Android: ícone próprio, abre sem a barra do navegador.
- **CV em PDF** — o botão "Baixar CV" no menu gera um currículo de verdade (fundo claro, uma página, texto selecionável), montado a partir dos mesmos dados de `dados/` e renderizado a cada deploy.
- **Funciona sem JavaScript** — um fallback via `<noscript>` garante que nada fica escondido se o JS estiver desativado, e a navegação é 100% acessível por teclado e leitor de tela.

---

## Para quem for mexer no código

Daqui pra baixo é guia de manutenção — como rodar localmente, a estrutura de pastas e como editar cada dado. Útil se você é eu daqui a três meses, ou se está curioso sobre como o site funciona por dentro.

### Rodando localmente

Requisito: **PHP 8.0 ou superior** (o código usa `str_starts_with`). Confira com:

```bash
php -v
```

Na raiz do projeto, suba o servidor embutido do PHP:

```bash
php -S localhost:8000
```

Abra <http://localhost:8000> no navegador. Ao editar um arquivo, basta atualizar a página — não precisa reiniciar o servidor.

Para parar: `Ctrl + C` no terminal.

> Abrir o `index.php` com dois cliques **não funciona**. O navegador não executa PHP; é preciso um servidor. Use o comando acima.

### Publicando

O push para `main` já publica sozinho via GitHub Actions (veja `.github/workflows/deploy-pages.yml`). Pra hospedar em outro lugar, qualquer hospedagem com suporte a PHP serve (Hostinger, Hostgator, InfinityFree, um VPS...) — envie a pasta inteira e aponte o domínio para ela. Como não há banco nem variável de ambiente, não existe configuração extra.

---

## Estrutura

```
index.php                 carrega os dados e inclui as partials
curriculo.php             página independente que vira o CV em PDF no build
dados/                    TODO O CONTEÚDO EDITÁVEL ESTÁ AQUI
  perfil.php              nome, momento atual, links, texto do "Sobre"
  experiencias.php        cargos
  formacao.php            cursos
  skills.php              stack agrupada
  projetos.php            cards do portfólio
partials/                 o HTML de cada bloco (mexer só para mudar layout)
  perfil.php              coluna esquerda fixa
  sobre.php
  stack.php
  portfolio.php
  experiencia.php
  formacao.php
  contato.php
assets/
  css/style.css           todo o visual do site
  css/curriculo.css       visual próprio do CV em PDF (fundo claro)
  js/main.js              menu mobile + fade-in
  img/avatar.jpg              foto de perfil
  img/avatar-placeholder.svg  silhueta genérica, mantida como fallback
  img/favicon.svg         ícone da aba (claro/escuro automático)
  img/favicon.png         fallback para navegadores sem suporte a favicon em SVG
  img/apple-touch-icon.png    ícone ao adicionar à Tela de Início no iPhone
  img/icon-192.png            ícone do manifest.json (Android/Chrome)
  img/icon-512.png            idem, em tamanho maior
  img/readme-preview.png      screenshot usado só aqui no README
manifest.json             metadados de instalação como app (PWA)
README.md
```

A regra: **`dados/` é conteúdo, `partials/` é forma.** No dia a dia você só mexe em `dados/`.

---

## Como editar os dados

Cada arquivo em `dados/` é um `<?php return [ ... ];` — um array PHP e nada mais.
As partials percorrem esses arrays com `foreach`, então **adicionar um item novo faz o bloco aparecer sozinho**. Não existe HTML repetido para duplicar na mão.

Três cuidados que evitam 90% dos erros:

1. Todo item termina com **vírgula**.
2. Aspas simples dentro de um texto entre aspas simples precisam de barra: `'Não é o \'melhor\' jeito'`. Se o texto tiver muitas aspas, troque as externas por aspas duplas.
3. Acentuação: salve os arquivos em **UTF-8**.

### Adicionar um projeto

Abra `dados/projetos.php`, copie um bloco `[ ... ],` inteiro e cole na posição desejada (a ordem do array é a ordem na página). Preencha:

| Chave | O que é |
|---|---|
| `titulo` | nome do projeto |
| `subtitulo` | descrição de uma linha |
| `problema` | o que era manual, lento ou quebrado **antes** |
| `solucao` | o que você construiu |
| `tecnologias` | lista, ex.: `['Python', 'MySQL']` |
| `repo` | URL do repositório. String vazia `''` esconde o link |
| `repo_nota` | aviso acima do link (ex.: código fechado). `''` esconde |
| `imagem` | caminho do screenshot. `''` mostra o espaço reservado |
| `imagem_alt` | descrição da imagem para leitores de tela |

O card sempre lê nesta ordem: **problema → solução → tecnologias**. É a ordem que faz um recrutador entender o valor do projeto em cinco segundos. Escreva o `problema` como uma situação concreta, não como abstração.

### Adicionar um cargo ou um curso

`dados/experiencias.php` e `dados/formacao.php` seguem a mesma lógica: copie um bloco, cole no topo, edite.
A chave `'atual' => true` destaca o período na cor de acento — deixe `true` só no item em andamento.

### Editar a stack

`dados/skills.php`. Cada grupo tem `grupo` (o rótulo) e `itens`. Um item pode ser:

```php
'Python'                                   // simples
['nome' => 'PHP', 'nota' => 'aprendendo']  // com observação ao lado
```

Não há nível nem porcentagem, e isso é proposital: "Python 80%" não significa nada para quem lê.

### Editar o texto "Sobre"

`dados/perfil.php`, chave `'sobre'`. Cada string do array vira um parágrafo.

### Trocar a foto do avatar

`dados/perfil.php`, chave `'avatar'`. Salve a nova imagem em `assets/img/`, recortada em **formato quadrado**
(o CSS arredonda, mas não corta bem retângulo — algo em torno de 400×400 px já basta, já que o avatar é exibido a 104 px)
e aponte o caminho:

```php
'avatar' => 'assets/img/nome-do-arquivo.jpg',
```

Ajuste o `avatar_alt` junto. `avatar-placeholder.svg` fica guardado no repositório como fallback, caso queira voltar à silhueta genérica.

### O CV em PDF

`curriculo.php` lê os mesmos arquivos de `dados/` — editar experiência, formação, skills ou o texto de
"Sobre" atualiza o site **e** o PDF juntos, sem trabalho extra. O visual do CV é definido à parte em
`assets/css/curriculo.css` (fundo claro, pensado pra impressão/ATS, não reaproveita o `style.css` do site).

O PDF em si (`curriculo-murilo-nogueira.pdf`) não fica versionado no repositório: a Action gera ele do zero
a cada deploy, imprimindo `curriculo.php` com o Chrome em modo headless. Pra conferir uma mudança antes de
subir, rode o servidor local e abra `http://localhost:8000/curriculo.php` — é só HTML normal, sem PDF.

---

## Adicionar screenshots aos projetos

1. Salve a imagem em `assets/img/` (ex.: `opsview-01.png`).
2. Em `dados/projetos.php`, preencha `'imagem' => 'assets/img/opsview-01.png',` no projeto correspondente.
3. Preencha o `imagem_alt` descrevendo o que aparece.

Enquanto `imagem` estiver vazio, o card exibe um retângulo pontilhado marcando o espaço.

---

## Pendências

- [ ] Screenshots dos projetos.

---

## Notas de design

Escolhas deliberadas, para não serem desfeitas sem intenção:

- **Uma única cor de destaque**, definida em `--acento` no topo do `style.css`. Trocar essa variável muda o site inteiro. Não adicione uma segunda cor de destaque.
- **Separação por borda de 1px**, não por sombra. Nada de `box-shadow` decorativo.
- **Mono nos detalhes técnicos** (datas, rótulos, tecnologias) e **sans no texto corrido**. Esse contraste é o que dá cara de ferramenta de dev — se apagar, o site vira template genérico.
- **Sem barra de porcentagem de skill.**
- **CSS próprio**, sem Bootstrap nem Tailwind. Sem fonte externa: a tipografia usa a pilha do sistema, então o site carrega sem depender de CDN.

## Privacidade

Endereço residencial não aparece em nenhum arquivo — só cidade e estado. Mantenha assim: o site é público.

## JavaScript

`assets/js/main.js` faz exatamente duas coisas: abre e fecha o menu no mobile e aplica um fade-in nas seções ao rolar. Se o JS estiver desativado, um bloco `<noscript>` no `index.php` mantém tudo visível e o menu aberto. O site funciona sem JS.
