# Chat App Backend

Este projeto é o backend para um sistema de chat em tempo real, desenvolvido com Laravel. Utiliza MySQL para o banco de dados, Redis para o gerenciamento de eventos em tempo real, e Laravel Echo com Socket.io para a comunicação em tempo real. Também está configurado com Laravel Passport para autenticação via tokens e Swagger para a documentação da API.

## Requisitos

- PHP 8.0 ou superior
- Composer
- MySQL
- Redis
- Node.js e npm

## Configuração do Projeto

### 1. Clonar o Repositório

Clone o repositório para o seu ambiente local:

```bash
git clone https://github.com/seu-usuario/chat-app-backend.git
cd chat-app-backend
```

### 2. Instalar Dependências
Instale as dependências do PHP com Composer:

```bash
composer install
```

Instale as dependências do JavaScript com npm:

```bash
npm install
```

Copie o arquivo .env.example para .env e configure as variáveis de ambiente:

### 3. Configurar Variáveis de Ambiente

```bash
cp .env.example .env
```

Edite o arquivo .env e defina as configurações para o banco de dados, Redis e outros serviços:

```env
APP_NAME=ChatApp
APP_ENV=local
APP_KEY=base64:YOUR_APP_KEY
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=chat_app
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=redis
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

PUSHER_APP_ID=your-pusher-app-id
PUSHER_APP_KEY=your-pusher-app-key
PUSHER_APP_SECRET=your-pusher-app-secret
PUSHER_APP_CLUSTER=mt1
```

### 4. Gerar a Chave de Aplicação
Gere a chave de aplicação do Laravel:

```bash
php artisan key:generate
```

### 5. Configurar o Banco de Dados
Crie o banco de dados MySQL especificado na variável DB_DATABASE do arquivo .env.

### 6. Rodar as Migrações
Execute as migrações para criar as tabelas necessárias no banco de dados:

```bash
php artisan migrate
```

### 7. Instalar o Laravel Passport
Instale o Passport e execute as migrações necessárias:

```bash
composer require laravel/passport
php artisan passport:install
```

Adicione o middleware auth:api no arquivo config/auth.php:

```php
'guards' => [
    'api' => [
        'driver' => 'passport',
        'provider' => 'users',
    ],
],
```

### 8. Configurar o Laravel Echo
Configure o Laravel Echo para usar Redis e Socket.io. No arquivo config/broadcasting.php, configure o Redis e o Pusher:

```php
'broadcasters' => [
    'pusher' => [
        'driver' => 'pusher',
        'key' => env('PUSHER_APP_KEY'),
        'secret' => env('PUSHER_APP_SECRET'),
        'app_id' => env('PUSHER_APP_ID'),
        'options' => [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true,
        ],
    ],
    'redis' => [
        'driver' => 'redis',
        'connection' => 'redis',
        'queue' => env('REDIS_QUEUE', 'default'),
        'retry_after' => 90,
    ],
],
```

### 9. Executar o Servidor
Inicie o servidor PHP integrado:

```bash
php artisan serve
```
Inicie o servidor de broadcasting Redis:

```bash
redis-server
```
### 10. Gerar Documentação com Swagger
Para gerar e acessar a documentação Swagger da API, execute o comando:

```bash
php artisan l5-swagger:generate
```
A documentação estará disponível em http://localhost:8000/api/documentation.

### 11. Testar o Sistema
- Verificar Autenticação: Teste as rotas de autenticação para garantir que o Laravel Passport está configurado corretamente.
- Testar API: Utilize ferramentas como Postman para testar as rotas da API.
- Testar Broadcast: Verifique se os eventos de broadcast estão funcionando corretamente com Socket.io.

## Recursos Adicionais
- Documentação do Laravel
- Documentação do Laravel Echo
- Documentação do Laravel Passport
- Documentação do Swagger

## Contribuição
Se você quiser contribuir para o projeto, por favor, faça um fork do repositório, crie uma branch para suas mudanças, e envie um pull request. Para mais detalhes sobre como contribuir, consulte o arquivo CONTRIBUTING.md.
