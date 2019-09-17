<?php

return [
    'servicos' => [
        ['id' => 1, 'title' => 'CONSTRUÇÃO', 'options' => []],
        ['id' => 2, 'title' => 'REFORMA', 'options' => []],
        ['id' => 3, 'title' => 'PROJETOS', 'options' => []],
        ['id' => 4, 'title' => 'PAINEL SOLAR', 'options' => []],
        ['id' => 5, 'title' => 'AUTOMAÇÃO RESIDENCIAL', 'options' => []],
        ['id' => 6, 'title' => 'INSPEÇÃO PREDIAL', 'options' => []],
        ['id' => 7, 'title' => 'ORÇAMENTO E PLANEJAMENTO', 'options' => []]
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
