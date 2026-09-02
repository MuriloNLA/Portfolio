<?php
/**
 * Dados do perfil (coluna esquerda) e do texto "Sobre".
 * Edite os valores abaixo. Nada aqui depende de banco de dados.
 */

return [
    'nome'       => 'Murilo Nogueira de Lima Araújo',
    'apelido'    => 'MuriloNLA',

    // Linha logo abaixo do nome. Mantenha curta.
    'momento'    => 'Estudante de Análise e Desenvolvimento de Sistemas e auxiliar de atendimento na BRQ Brasilquimica, automatizando processos da operação com Python.',

    'localizacao' => 'Batatais, SP',
    'email'       => 'murilonogueira1611@gmail.com',
    'telefone'    => '(16) 99996-5533',

    // Caminho da imagem de avatar.
    // Para usar sua foto real: coloque o arquivo em assets/img/ e troque o caminho aqui.
    'avatar'      => 'assets/img/avatar.jpg',
    'avatar_alt'  => 'Foto de Murilo Nogueira de Lima Araújo',

    'links' => [
        [
            'rotulo' => 'GitHub',
            'url'    => 'https://github.com/MuriloNLA',
            'handle' => 'MuriloNLA',
        ],
        [
            'rotulo' => 'LinkedIn',
            // ==========================================================
            // TODO: preencher URL do LinkedIn
            // Troque o '#' abaixo pela URL completa do perfil.
            // ==========================================================
            'url'    => '#',
            'handle' => 'em breve',
        ],
        [
            'rotulo' => 'E-mail',
            'url'    => 'mailto:murilonogueira1611@gmail.com',
            'handle' => 'murilonogueira1611@gmail.com',
        ],
    ],

    // Texto da seção "Sobre". Cada item do array vira um parágrafo.
    'sobre' => [
        'Entrei na BRQ Brasilquimica como jovem aprendiz no atendimento ao cliente e fui efetivado em novembro de 2025. No meio do caminho, comecei a resolver com código os gargalos que eu via todo dia na operação: planilha preenchida à mão, PDF digitado manualmente, print salvo um por um.',
        'O que começou como script para economizar meu próprio tempo virou dashboard usado por gestor para decidir. É assim que eu aprendo: escolho um problema real que me incomoda e construo até funcionar.',
        'Hoje meu objetivo é full stack, e o que mais me puxa a atenção fora disso é cibersegurança e infraestrutura — entender o que sustenta a aplicação, não só o que aparece na tela.',
    ],
];
