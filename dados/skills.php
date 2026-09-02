<?php
/**
 * Stack, agrupada por natureza.
 * Sem nível, sem porcentagem, sem barra de progresso — só o que se usa.
 * Cada item pode ser string simples ('Python') ou array com observação:
 *   ['nome' => 'PHP', 'nota' => 'aprendendo']
 */

return [
    [
        'grupo' => 'Linguagens',
        'itens' => [
            'Python',
            'JavaScript',
            ['nome' => 'PHP', 'nota' => 'aprendendo'],
            'Java',
        ],
    ],
    [
        'grupo' => 'Front-end',
        'itens' => ['HTML', 'CSS', 'Chart.js'],
    ],
    [
        'grupo' => 'Dados',
        'itens' => ['pandas', 'numpy', 'matplotlib', 'Streamlit'],
    ],
    [
        'grupo' => 'Banco',
        'itens' => ['MySQL'],
    ],
    [
        'grupo' => 'Interesses',
        'itens' => ['Cibersegurança', 'Infraestrutura'],
    ],
];
