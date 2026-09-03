<?php
/**
 * Projetos do portfólio.
 *
 * Cada card é lido nesta ordem: PROBLEMA -> SOLUÇÃO -> TECNOLOGIAS.
 * Mantenha essa ordem ao escrever os textos.
 *
 * Chaves:
 *   titulo      string  nome do projeto
 *   subtitulo   string  descrição de uma linha
 *   problema    string  o que estava quebrado / era manual
 *   solucao     string  o que foi construído
 *   tecnologias array   lista de tecnologias
 *   repo        string  URL do repositório ('' esconde o link)
 *   repo_nota   string  aviso opcional exibido acima do link (ex.: código fechado)
 *   imagem      string  caminho do screenshot ('' mostra o espaço reservado)
 *   imagem_alt  string  texto alternativo do screenshot
 */

return [
    [
        'titulo'    => 'OpsView',
        'subtitulo' => 'Dashboard de Inteligência Operacional',
        'problema'  => 'Os dados operacionais de vendas e logística viviam espalhados em planilhas Excel separadas. Não existia uma visão centralizada: para responder uma pergunta simples de operação era preciso abrir vários arquivos e cruzar tudo na mão.',
        'solucao'   => 'Plataforma web com painéis de inserção de pedidos, gestão de frotas e rastreamento de erros operacionais, dando aos gestores uma leitura única e rápida do que está acontecendo. O fluxo de dados vai de Excel para Python, é normalizado em JSON e alimenta o dashboard.',
        'tecnologias' => ['HTML', 'CSS', 'JavaScript', 'Chart.js', 'Python'],
        'repo'      => 'https://github.com/MuriloNLA/OpsView-Dashboard-de-Inteligencia-peracional',
        'repo_nota' => 'O código-fonte não é público por confidencialidade corporativa. O repositório abaixo contém README e screenshots.',
        'imagem'     => 'assets/img/OpsView.png',
        'imagem_alt' => 'Screenshot do dashboard OpsView',
    ],
    [
        'titulo'    => 'SalesView',
        'subtitulo' => 'Dashboard de Análise de Vendas',
        'problema'  => 'Acompanhar o desempenho da equipe de vendas externa exigia cruzar planilhas manualmente a cada ciclo, o que consumia tempo e abria margem para erro na comparação entre representantes.',
        'solucao'   => 'Dashboard interativo com comparativos por representante e por região, filtros dinâmicos e métricas totais consolidadas, acessível sem manipular arquivo nenhum.',
        'tecnologias' => ['Python', 'Streamlit'],
        'repo'      => 'https://github.com/MuriloNLA/SalesView-Dashboard-de-Analise-de-Vendas',
        'repo_nota' => '',
        'imagem'     => 'assets/img/Salesview.png',
        'imagem_alt' => 'Screenshot do dashboard SalesView',
    ],
    [
        'titulo'    => 'PDF-to-Excel-Watcher',
        'subtitulo' => 'Extração automática de pedidos em PDF',
        'problema'  => 'Os dados de pedidos chegavam em PDF e eram digitados à mão na planilha, um a um. Trabalho repetitivo, lento e sujeito a erro de digitação.',
        'solucao'   => 'Scripts que leem os PDFs, extraem os campos por expressão regular e registram automaticamente em .xlsx. Funciona em modo manual, sob demanda, ou em modo de monitoramento contínuo de uma pasta.',
        'tecnologias' => ['Python', 'regex', 'openpyxl'],
        'repo'      => 'https://github.com/MuriloNLA/PDF-to-Excel-Watcher',
        'repo_nota' => '',
        'imagem'     => '',
        'imagem_alt' => 'Screenshot do PDF-to-Excel-Watcher',
    ],
    [
        'titulo'    => 'Screenshot-Pedidos',
        'subtitulo' => 'Captura de comprovantes por atalho de teclado',
        'problema'  => 'Registrar o comprovante de um pedido exigia abrir a ferramenta de recorte, capturar, nomear o arquivo no padrão e salvar na pasta certa. Várias vezes por dia.',
        'solucao'   => 'Atalho de teclado que pede o número do pedido e salva o print já nomeado no padrão e no diretório correto, em um passo só.',
        'tecnologias' => ['Python'],
        'repo'      => 'https://github.com/MuriloNLA/Screenshot-Pedidos',
        'repo_nota' => '',
        'imagem'     => '',
        'imagem_alt' => 'Screenshot da ferramenta Screenshot-Pedidos',
    ],
];
