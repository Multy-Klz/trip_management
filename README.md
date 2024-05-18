# Decisões de Desenvolvimento

-   Retirei o Container Docker do Projeto, pois estava tendo muitos problemas de conexão para acessar o banco de dados dentro do container. Fiquei 24 hrs testando vários modelos para conectar e acessar o banco, mas nenhum com sucesso. Acredito que foi algum erro de compatibilidade ou alguma especificação do docker. Devido o tempo tomado, decidi retirar ele.
-   Instalei o PostgreSQL 14 na máquina local, fiz a conexão e desenvolvi o projeto.
-   Eu não tinha nenhum conhecimento prévio de php, laravel e docker, vi alguns tutoriais para desenvolver o projeto e entender como funcionava tudo. O github copilot ajudou com as dúvidas e notações do php/ laravel.
-   O desenvolvimento das classes e arquivos foram todos usando os comandos ´php artisan make´ em torno de 3 entidades: Driver, Vehicle e Trip
-   São 3 controladores, com suas respectivas Views, Models, Request e Rotas.
    -   DriverController
    -   VehicleController
    -   TripController
-   Para a Viagem criei uma Rule (TripKmRule) para validar a entrada de km_inicial e km_final antes de salvar os objetos.
-   Não efetuei exclusão de arquivos, vários comentários foram gerados pelo próprio laravel.
    -   Os comentários meus estão em português para diferenciação e possuem 4 barras (////).
-   A definição da estrutura do Banco de Dados foi feita através das Migrations
-   Delete em Cascata, se motorista ou veículo for deletado, a viagem em que eles existem também será.
-   Video de teste da aplicação comentado: https://www.loom.com/share/b5110722ff30410d89a710224ca9d318?sid=561767dc-346b-4012-9c52-0c976ed60872

# Avaliação

Projeto de avaliação das conhecimentos de desenvolvimento.
Após finalizar, deve disponibilizar o link do repositório no github.

## Prazo

O candidato terá 3 dias corridos para finalizar o projeto.

## Especificações

Este projeto conta com o ambiente de banco dados já prepardo no docker.

-   Docker
    -   Postgres 14+
-   Laravel (última versão)

## Observações

Quaisquer configurações ou alterações necessárias para que o projeto seja executado,
devem ser documentadas no projeto

# Objetivo

-   Criar um sistema para controle de viagens.
-   O Sistema deve conter as seguintes funcionalidades:

*   Veículos
    -   Modelo
    -   Ano
    -   Data de aquisição
    -   KMs rodados no momento da aquisição
    -   Renavam - Deve ser único
*   Motoristas
    -   Nome
    -   Data de nascimento - ter no minímo, 18 anos
    -   N° da CNH.
*   Viagens
    -   Veiculo
    -   KM Inicial no início da viagem
    -   KM Final na volta da viagem
    -   Motoristas
