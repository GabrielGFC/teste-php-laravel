
# Projeto PHP com Laravel 💥

Bem-vindo ao repositório do projeto PHP usando Laravel e Docker! Este projeto foi configurado para rodar em containers Docker, facilitando o desenvolvimento e a implantação.

## Pré-requisitos

Antes de iniciar, certifique-se de ter o **Docker** e o **Docker Compose** instalados em seu sistema.

## Configuração do Projeto

### 1. Clonar o Repositório

Clone este repositório em sua máquina local:

```bash
git clone https://github.com/GabrielGFC/teste-php-laravel.git
cd teste-php-laravel
```

### 2. Subir os Containers

Inicie os containers do Docker:

```bash
docker-compose up -d
```

### 3. Configurar o Ambiente

Crie o arquivo `.env` a partir do exemplo:

```bash
cp .env.example .env
```

### 4. Acessar o Container `app`

Acesse o container para rodar comandos dentro do ambiente configurado:

```bash
docker-compose exec app bash
```

### 5. Instalar Dependências

Instale as dependências do Laravel:

```bash
composer install
```

### 6. Gerar a Chave da Aplicação

Gere a chave de criptografia do Laravel:

```bash
php artisan key:generate
```

### 7. (Opcional) Criar o Banco SQLite

Se preferir usar SQLite ao invés do MySQL, crie o arquivo do banco:

```bash
touch database/database.sqlite
```

### 8. Rodar as Migrations

Execute as migrations para criar as tabelas no banco de dados:

```bash
php artisan migrate
```

### 9. Acessar a Aplicação

Abra [http://localhost:8000](http://localhost:8000) em seu navegador para acessar a aplicação.

---

## Estrutura do Projeto

- `app/` - Contém os arquivos principais da aplicação Laravel.
- `database/` - Inclui as migrations e seeds do banco de dados.
- `docker/` - Arquivos de configuração do Docker para a aplicação.
- `public/` - Contém o ponto de entrada público da aplicação (index.php).
- `resources/` - Arquivos de views e assets da aplicação.
- `routes/` - Define as rotas da aplicação.

---

## Contribuição

Agradecemos seu interesse em contribuir para o projeto! Por favor, siga as diretrizes disponíveis na [documentação do Laravel](https://laravel.com/docs/contributions).

## Licença

Este projeto é licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).
