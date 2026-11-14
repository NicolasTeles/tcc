# TCC – Cardápio Virtual ("Café secreto")

Sistema web de cardápio virtual para uma cafeteria, feito como **trabalho de conclusão do curso técnico em Informática**. O cliente faz o pedido pelo navegador e a equipe acompanha e atualiza o andamento em uma área restrita.

Desenvolvido em trio por **Eduardo Octávio**, **Guilherme Victor** e **Nicolas Teles**, e aprovado como TCC.

## Sobre este repositório

O projeto foi feito em grupo e o repositório principal, com o histórico completo de commits, é o do Eduardo: [EdOc-PS/tcc-cardapio-virtual](https://github.com/EdOc-PS/tcc-cardapio-virtual). Este repositório é uma **cópia da versão do projeto com as alterações feitas depois pelo grupo**, e por isso o histórico tem um único commit, que reúne essas mudanças.

O que mudou em relação à versão do repositório do Eduardo:

- As senhas dos funcionários passaram a ser guardadas com hash (`password_hash`, Argon2) e conferidas com `password_verify`. Na versão original elas ficavam em texto puro.
- O login deixou de mostrar em um alerta a senha digitada e a senha salva quando a senha está errada.
- A troca de senha (`php/mudarSenha.php`) passou a alterar apenas o funcionário escolhido; antes o `UPDATE` não tinha filtro.
- A listagem de funcionários mostra o tipo de perfil.
- Ajustes de layout, principalmente na versão para celular.

## Avisos importantes

O projeto é um trabalho de escola, escrito com foco em funcionar, e **não está pronto para uso real**. Pontos conhecidos:

- **A mudança do hash de senha ficou incompleta no banco de dados.** O código novo espera um hash, mas os arquivos `sql/` não foram atualizados: a coluna `senhaFuncionario` continua `varchar(30)`, pequena demais para um hash Argon2 (cerca de 100 caracteres), e o funcionário administrador de exemplo ainda tem a senha em texto puro. Com o `bdcadastro.sql` do repositório, esse login não funciona e senhas novas não são salvas por inteiro. Para usar, é preciso mudar a coluna para `varchar(255)` e gerar um hash para o administrador. O problema foi percebido depois e ainda **não foi corrigido**.
- As consultas SQL são montadas concatenando texto vindo do usuário, o que permite **injeção de SQL** em vários arquivos de `php/`.
- O acesso ao banco usa `root` sem senha (`php/conexao.php` e `php/conexaoPedido.php`).
- Os arquivos `sql/` trazem dados de exemplo.

Não publique este código em um servidor acessível pela internet sem corrigir esses pontos.

## Funcionalidades

- Cardápio com itens por tipo (lanches e bebidas) e subtipo, com foto, descrição e preço.
- Pedido feito pelo cliente, identificado por nome e telefone, com versão da página para celular (`index_telefone.php`).
- Área de funcionários com login e dois tipos de perfil: `ADMIN` e `COMUM`.
- Acompanhamento dos pedidos, que passam pelos estados "Pedido feito", "Pedido em processo", "Pedido concluído" e "Pedido finalizado", com tela de pedidos finalizados e busca por data.
- Administração: cadastro, edição e exclusão de itens do cardápio (com imagem) e de funcionários, troca de senha e troca de tipo de perfil.

## Tecnologias

PHP, MySQL/MariaDB (com `mysqli`), HTML, CSS e JavaScript (jQuery no navegador, Font Awesome e Bootstrap por CDN).

## Estrutura

| Pasta | Conteúdo |
|---|---|
| `php/` | Páginas e regras do sistema (login, cardápio, pedidos, administração) |
| `css/` | Estilos de cada tela |
| `javascript/` | Scripts das páginas |
| `sql/` | Dumps do banco: `bdcadastro.sql` (clientes, funcionários e itens) e `enviapedido.sql` (pedidos) |
| `img/`, `imagens/` | Logotipos e fotos dos itens |
| `font/` | Fontes usadas nas páginas |

## Como executar localmente

Requisitos: um servidor local com PHP e MySQL ou MariaDB (por exemplo XAMPP).

1. Coloque o projeto na pasta pública do servidor (`htdocs` no XAMPP).
2. Crie os bancos `bdcadastro` e `enviapedido` e importe `sql/bdcadastro.sql` e `sql/enviapedido.sql`.
3. Mude a coluna `senhaFuncionario` da tabela `funcionario` para `varchar(255)` e troque a senha do administrador de exemplo por um hash (veja o primeiro aviso acima).
4. Se necessário, ajuste usuário e senha em `php/conexao.php` e `php/conexaoPedido.php` (o padrão é `root` sem senha).
5. Abra `http://localhost/<pasta-do-projeto>/php/index.php`.
