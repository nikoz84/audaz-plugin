<?php

return [
    'servicos' => [
        ['title' => 'CONSTRUÇÃO', 'options' => [
            'has_project' => false,
        ]],
        ['title' => 'REFORMA', 'options' => [
            'has_project' => false,
        ]],
        ['title' => 'PROJETOS', 'options' => [
            'has_project' => false,
        ]],
        ['title' => 'PAINEL SOLAR', 'options' => [
            'has_conta' => false,
            'has_project' => false,

        ]],
        ['title' => 'AUTOMAÇÃO RESIDENCIAL', 'options' => [
            'has_project' => false,
        ]],
        ['title' => 'INSPEÇÃO PREDIAL', 'options' => [
            'has_project' => false,
        ]],
        ['title' => 'ORÇAMENTO E PLANEJAMENTO', 'options' => [
            'has_project' => false,
        ]]
    ],
    'tipo_projeto' => [
        'Arquitetura' => [],
        'Fundação' => [],
        'Estrutura' => ['Metálica', 'Concreto Armado'],
        'Instalações' => [
            'Eléctricas',
            'Telefonia',
            'CFTV (Cámeras de Segurança)',
            'Alarme',
            'Lógica',
            'Cerca Elétrica',
            'Hidrossanitárias'
        ]
    ],
    'tipo_emprendimento' => [
        'Residencial' => ['Casa', 'Edificios', 'Quitinetes'],
        'Comercial' => ['Empresarial', 'Ponto Comercial - Logas', 'Mall'],
        'Outros' => []
    ]
];
