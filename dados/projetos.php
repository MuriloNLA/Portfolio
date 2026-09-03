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
        'titulo'    => 'Will It Rain On My Parade?',
        'subtitulo' => 'NASA International Space Apps Challenge 2025',
        'problema'  => 'Quem planeja um evento ao ar livre com meses de antecedência não tem como saber a chance de chuva pra aquela data específica — previsão do tempo tradicional só cobre poucos dias à frente.',
        'solucao'   => 'Em equipe, nas 48 horas do hackathon, construímos um sistema web (HTML, CSS e JavaScript) que se conecta a uma API própria em Python. A API consulta dados de satélites da NASA e cruza o histórico climático de anos anteriores da região pra estimar a probabilidade de chuva numa data e local específicos.',
        'tecnologias' => ['HTML', 'CSS', 'JavaScript', 'Python'],
        'repo'      => '',
        'repo_nota' => '',
        'imagem'     => 'assets/img/nasa-spaceapps-certificado.jpg',
        'imagem_alt' => 'Certificado de participação no NASA International Space Apps Challenge 2025, emitido para Murilo Nogueira de Lima Araújo',
    ],
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
