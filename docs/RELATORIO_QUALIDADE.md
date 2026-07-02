# Relatorio Completo da Atividade de Qualidade

## 1. Contexto

Esta atividade foi realizada em um fork do projeto Laravel `mygym`, com o objetivo de demonstrar melhoria de qualidade de software usando GitHub fork, Docker, Codex e uma ferramenta simples de qualidade.

Repositorio do fork:

```text
https://github.com/phsilveirati-jpg/mygym.git
```

Repositorio upstream:

```text
https://github.com/viejopeter/mygym.git
```

O projeto e uma aplicacao Laravel 11 com frontend usando Vite, Tailwind CSS, Alpine.js e Laravel Breeze.

## 2. Estrutura do projeto verificada

Foi confirmada uma estrutura padrao de aplicacao Laravel:

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
artisan
composer.json
composer.lock
docker-compose.yml
package.json
package-lock.json
phpunit.xml
vite.config.js
```

Tambem foi confirmado que o projeto possui Laravel Sail configurado no `docker-compose.yml`.

## 3. Servico Docker correto

O servico correto para executar comandos PHP e Composer dentro do Docker e:

```text
laravel.test
```

Esse servico esta definido no `docker-compose.yml` e usa runtime Sail PHP 8.4:

```text
./vendor/laravel/sail/runtimes/8.4
```

Os servicos auxiliares do Compose sao:

```text
mysql
redis
meilisearch
mailpit
selenium
```

## 4. Configuracao local do ambiente

Foi ajustado o `.env` local para permitir execucao da aplicacao. As principais variaveis usadas foram:

```env
APP_NAME=MyGym
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8081
APP_PORT=8081

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

DB_HOST=mysql
DB_PORT=3306
DB_USERNAME=sail
DB_PASSWORD=password
FORWARD_DB_PORT=3307

WWWUSER=1000
WWWGROUP=1000

REDIS_HOST=redis
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
TELESCOPE_ENABLED=false
```

Observacao: o `.env` e arquivo local e nao deve entrar no Pull Request.

## 5. Ferramenta de qualidade escolhida

A ferramenta escolhida foi o Laravel Pint.

Justificativa:

```text
Laravel Pint e o formatter oficial do ecossistema Laravel para padronizar estilo de codigo PHP.
```

O projeto ja possuia `laravel/pint` em `require-dev` no `composer.json`:

```json
"laravel/pint": "^1.13"
```

Portanto, nao foi necessario adicionar uma nova dependencia manualmente.

## 6. Configuracao criada para Pint

Foi criado o arquivo `pint.json` com o preset oficial do Laravel:

```json
{
    "preset": "laravel"
}
```

A decisao foi manter o preset padrao, sem criar regras customizadas, para reduzir risco e manter aderencia ao padrao do framework.

## 7. Scripts adicionados ao Composer

Foram adicionados os seguintes scripts no `composer.json`:

```json
"quality": [
    "pint --test"
],
"quality:fix": [
    "pint"
],
"test": [
    "php artisan test"
]
```

Com isso, a equipe pode executar:

```bash
composer quality
composer quality:fix
composer test
```

## 8. Comandos executados para qualidade PHP

Foram executados os comandos:

```bash
composer install
php vendor/bin/pint --test
php vendor/bin/pint
php vendor/bin/pint --test
composer validate --no-check-publish
```

Resultado:

```text
Primeira verificacao do Pint: 23 arquivos com problemas de estilo.
Correcao automatica com Pint: 23 problemas corrigidos.
Segunda verificacao do Pint: PASS em 76 arquivos.
Validacao do composer.json: valida.
```

Arquivos formatados pelo Pint incluem controllers, models, policies, notifications, migrations, seeders, routes e testes.

Importante: as alteracoes feitas pelo Pint foram mecanicas, relacionadas a estilo de codigo, imports, espacamento, virgulas finais e formatacao. Nao houve alteracao intencional de regra de negocio.

## 9. Comandos executados para npm/frontend

Inicialmente, o `npm install` falhou por falta de espaco no disco `C:`:

```text
ENOSPC: no space left on device
```

Foi identificado que o `C:` estava praticamente cheio, enquanto o `D:` tinha espaco disponivel. Para contornar isso, foram criadas pastas locais de cache/temporarios no workspace:

```text
.npm-cache/
.tmp/
```

Essas pastas foram adicionadas ao `.gitignore`.

O `npm install` foi executado usando cache e temporarios em `D:\docker\mygym`:

```powershell
$env:npm_config_cache='D:\docker\mygym\.npm-cache'
$env:TEMP='D:\docker\mygym\.tmp'
$env:TMP='D:\docker\mygym\.tmp'
npm install
```

Resultado:

```text
168 packages instalados inicialmente.
```

Depois foi executado:

```bash
npm audit fix --force
npm run build
```

Resultado informado no terminal:

```text
found 0 vulnerabilities
vite v6.4.3 building for production...
56 modules transformed.
public/build/assets/app-DHEMnqAS.css
public/build/assets/app-DPe3LK_d.js
build concluido com sucesso
```

O `package-lock.json` foi atualizado pelo `npm audit fix --force`.

## 10. Execucao local da aplicacao

Como o Docker Desktop apresentou problemas operacionais, a aplicacao foi colocada em execucao localmente usando PHP/XAMPP.

Comandos/acoes executadas:

```bash
composer install
php artisan key:generate --force
php artisan migrate --force
php artisan optimize:clear
```

Foi criado o banco SQLite local:

```text
database/database.sqlite
```

Foi iniciado um servidor PHP local na porta `8081`:

```bash
php -S 0.0.0.0:8081 -t public public/index.php
```

URL validada:

```text
http://localhost:8081/
```

Resultado:

```text
HTTP 200 OK
Pagina MyGym carregada
Assets reais do Vite carregados a partir de public/build
```

Assets confirmados:

```text
/build/assets/app-DHEMnqAS.css
/build/assets/app-DPe3LK_d.js
```

## 11. Situacao do Docker

O Docker Compose foi analisado e os servicos auxiliares chegaram a subir parcialmente:

```text
redis
mailpit
meilisearch
selenium
mysql
```

Porem, o servico principal `laravel.test` nao conseguiu ficar disponivel por problemas do Docker Desktop.

Problemas encontrados:

1. Falta inicial das variaveis `WWWUSER` e `WWWGROUP`.

Erro observado:

```text
groupadd: invalid group ID 'sail'
```

Mitigacao:

```env
WWWUSER=1000
WWWGROUP=1000
```

2. Falha ao exportar imagem Docker.

Erro observado:

```text
failed to create temp dir:
mkdir /var/lib/desktop-containerd/daemon/tmpmounts/...:
input/output error
```

Interpretacao:

```text
Erro operacional do Docker Desktop/containerd/armazenamento, nao erro de codigo Laravel.
```

3. Docker Desktop indisponivel.

Erro observado:

```text
Docker Desktop is unable to start
```

4. MySQL do Compose reiniciando/falhando por socket interno.

Erro observado nos logs:

```text
Another process with pid 62 is using unix socket file.
Unable to setup unix socket lock file.
```

Decisao tomada:

```text
Manter a aplicacao funcionando localmente com SQLite e PHP local para demonstracao, enquanto o Docker Desktop precisa ser corrigido separadamente.
```

## 12. Arquivos alterados para o Pull Request

Alteracoes principais:

```text
composer.json
pint.json
docs/RELATORIO_QUALIDADE.md
package-lock.json
.gitignore
arquivos PHP formatados pelo Laravel Pint
```

O Pint formatou arquivos em:

```text
app/
bootstrap/
database/
routes/
tests/
```

Arquivos locais/ignorados que nao devem ir para o PR:

```text
.env
database/database.sqlite
node_modules/
public/build/
.npm-cache/
.tmp/
docker-compose.override.yml
```

## 13. Estado atual do Git

As alteracoes de qualidade foram preparadas para commit.

Itens versionaveis preparados:

```text
.gitignore
composer.json
package-lock.json
pint.json
docs/RELATORIO_QUALIDADE.md
arquivos PHP formatados pelo Pint
```

Sugestao de mensagem de commit:

```bash
git commit -m "Adiciona Laravel Pint e relatorio de qualidade"
```

## 14. Resultado encontrado

O projeto passou a ter:

```text
Configuracao explicita do Laravel Pint.
Scripts Composer para qualidade, correcao e testes.
Codigo PHP formatado no padrao Laravel.
Relatorio tecnico documentando a atividade.
Frontend npm instalado, audit zerado e build Vite funcionando.
Aplicacao acessivel localmente em http://localhost:8081/.
```

## 15. Decisao tomada

A decisao foi:

```text
Usar Laravel Pint como ferramenta de qualidade simples.
Aplicar somente formatacao automatica, sem alterar regra de negocio.
Registrar os problemas operacionais do Docker Desktop como risco externo ao codigo.
Manter a aplicacao demonstravel via PHP local e SQLite enquanto o Docker e corrigido.
```

## 16. Justificativa tecnica

O Laravel Pint e adequado porque:

```text
E oficial do ecossistema Laravel.
Tem baixo custo de configuracao.
Pode ser executado localmente, no Docker ou em CI.
Reduz ruido em Pull Requests.
Evita discussoes manuais sobre estilo de codigo.
```

Os scripts Composer ajudam porque:

```text
Padronizam os comandos de qualidade.
Facilitam reproducao por outros desenvolvedores.
Podem ser usados futuramente em pipeline de CI.
```

O uso temporario de SQLite local foi adequado porque:

```text
Permitiu demonstrar a aplicacao funcionando.
E configuracao local.
Nao altera a regra de negocio.
Nao altera o codigo de producao.
```

## 17. Riscos identificados

Riscos tecnicos:

```text
O Pint alterou muitos arquivos, o que aumenta o tamanho do diff.
O npm audit fix --force alterou o package-lock.json e pode atualizar dependencias transientes.
O Docker Desktop esta instavel e impede validacao completa dentro do container.
O MySQL do Compose esta falhando por problema de socket/estado interno.
O C: com pouco espaco afeta Docker, npm e caches.
```

Riscos de revisao:

```text
Mudancas de estilo podem dificultar comparacao com alteracoes funcionais.
Como o Docker nao ficou operacional, os testes finais dentro do container ficaram pendentes.
```

## 18. Acoes de mitigacao

Mitigacoes ja aplicadas:

```text
Alteracoes restritas a qualidade, formatacao, scripts e documentacao.
pint.json usando preset laravel, sem regras customizadas.
.npm-cache e .tmp adicionados ao .gitignore.
public/build e node_modules permanecem ignorados.
Aplicacao validada localmente com HTTP 200.
npm audit resultou em 0 vulnerabilidades.
npm run build gerou assets reais.
```

Mitigacoes pendentes/recomendadas:

```text
Liberar espaco no disco C:.
Reiniciar o Docker Desktop.
Executar docker system prune com cuidado, se apropriado.
Recriar o volume MySQL do projeto somente se nao houver dados importantes.
Rodar novamente os comandos Docker obrigatorios quando o Docker estiver estavel.
```

## 19. Comandos finais recomendados quando Docker estiver estavel

Quando o Docker Desktop voltar a funcionar:

```bash
docker compose build laravel.test
docker compose up -d
docker compose exec laravel.test composer install
docker compose exec laravel.test php artisan key:generate
docker compose exec laravel.test php artisan migrate
docker compose exec laravel.test php artisan test
docker compose exec laravel.test ./vendor/bin/pint --test
```

Se o MySQL continuar falhando e nao houver dados importantes no volume:

```bash
docker compose down
docker volume rm mygym_sail-mysql
docker compose up -d
```

Atencao: remover volume apaga os dados do banco daquele volume.

## 20. Conclusao

A melhoria de qualidade foi implementada com sucesso na parte versionavel do projeto, incluindo configuracao do Laravel Pint, scripts de qualidade, padronizacao automatica do codigo e documentacao tecnica.

A validacao completa dentro do Docker permaneceu pendente por instabilidade operacional do Docker Desktop, devidamente registrada como risco e mitigada temporariamente com execucao local da aplicacao.

Como resultado, o projeto ficou com:

```text
Laravel Pint configurado.
Scripts de qualidade adicionados.
Codigo PHP padronizado automaticamente.
Relatorio tecnico criado.
npm funcionando.
Build frontend funcionando.
Aplicacao demonstravel em http://localhost:8081/.
```
