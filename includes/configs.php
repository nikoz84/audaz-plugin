<?php

return [
    'servicos' => [
        ['id' => 1, 'title' => 'CONSTRUÇÃO', 'options' => [
            'question' => 'Possui Projeto?',
            'tipo_emprendimentos' => [
                ['name' => 'Residencial', 'types' => ['Casa', 'Edificios', 'Quitinetes']],
                ['name' => 'Comercial', 'types' => ['Empresarial', 'Ponto Comercial - Logas', 'Mall']],
                ['name' => 'Outros', 'types' => []]
            ]
        ]],
        ['id' => 2, 'title' => 'REFORMA', 'options' => [
            'question' => 'Possui Projeto?'
        ]],
        ['id' => 3, 'title' => 'PROJETOS', 'options' => [
            'question' => 'Possui Projeto?'
        ]],
        ['id' => 4, 'title' => 'PAINEL SOLAR', 'options' => [
            'question' => 'Você está com sua conta de luz?'
        ]],
        ['id' => 5, 'title' => 'AUTOMAÇÃO RESIDENCIAL', 'options' => [
            'question' => 'Possui Projeto?'
        ]],
        ['id' => 6, 'title' => 'INSPEÇÃO PREDIAL', 'options' => [
            'tipo_emprendimentos' => [
                ['name' => 'Residencial', 'types' => ['Casa', 'Edificios', 'Quitinetes']],
                ['name' => 'Comercial', 'types' => ['Empresarial', 'Ponto Comercial - Logas', 'Mall']],
                ['name' => 'Outros', 'types' => []]
            ]
        ]],
        ['id' => 7, 'title' => 'ORÇAMENTO E PLANEJAMENTO', 'options' => [
            'question' => 'Possui Projeto?'
        ]]
    ],
    'tipo_projeto' => [
        ['name' => 'Arquitetura', 'types' => []],
        ['name' => 'Fundação', 'types' => []],
        ['name' => 'Estrutura', 'types' => ['Metálica', 'Concreto Armado']],
        ['name' => 'Instalações', 'types' => [
            'Eléctricas',
            'Telefonia',
            'CFTV (Cámeras de Segurança)',
            'Alarme',
            'Lógica',
            'Cerca Elétrica',
            'Hidrossanitárias'
        ]]
    ],
    'tipo_emprendimentos' => [
        ['name' => 'Residencial', 'types' => ['Casa', 'Edificios', 'Quitinetes']],
        ['name' => 'Comercial', 'types' => ['Empresarial', 'Ponto Comercial - Logas', 'Mall']],
        ['name' => 'Outros', 'types' => []]
    ]
];
