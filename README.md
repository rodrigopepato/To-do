# To-Do List

Este é um projeto simples de um **To-Do List** criado em PHP.

## Descrição

O objetivo do projeto é permitir que os usuários:

- Adicionem tarefas à lista.
- Marquem tarefas como concluídas.
- Excluam tarefas.

## Tecnologias Utilizadas

- PHP
- MySQL
- Composer para autoload

## Como Configurar o Projeto

1. Clone este repositório:
   ```bash
   git clone <url-do-repositorio>
   cd to-do-list
   ```

2. Instale as dependências do Composer:
   ```bash
   composer install
   ```

3. Configure o banco de dados:
   - Crie um banco chamado `todo_list`.
   - Execute o script SQL localizado em `database.sql`.

4. Inicie o servidor PHP:
   ```bash
   php -S localhost:8000 -t public
   ```

5. Acesse o projeto no navegador:
   [http://localhost:8000](http://localhost:8000)

## Estrutura do Projeto

```
to-do-list/
├── public/        # Arquivos públicos acessíveis (index.php)
├── src/           # Código PHP (classes e lógica do projeto)
├── vendor/        # Dependências do Composer
├── composer.json  # Configuração do Composer
└── README.md      # Este arquivo
```

## Autor

Criado por **Rodrigo Pepato**.


---
