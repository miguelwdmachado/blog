
Instruções

Instalação (execute no prompt de comando):

1) execute o seguinte comando para clonar a aplicação: git clone https://github.com/miguelwdmachado/blog.git

2) execute: composer install

3) acesse o mysql e crie o banco de dados "blog" com a seguinte comando: 

CREATE DATABASE blog CHARACTER SET utf8 COLLATE utf8mb4_general_ci;

4) crie o usuário para a base de dados: 

CREATE USER 'user_blog'@'localhost' IDENTIFIED BY 'blog_user_a1s2d2f2';
GRANT ALL PRIVILEGES ON  blog.* TO 'user_blog'@'localhost';

FLUSH PRIVILEGES;
EXIT;

5) faça a migração do banco de dados:

php artisan migrate
php artisan db:seed

Testando a aplicação (execute no prompt de comando):

1) php artisan serve

2) abra o seu browser preferido e digite o endereço: localhost:8000

3) clicke em login e faça login com as seguintes informações: 

E-Mail Adress: admin@admin.com.br
Password: senha123

4) Este usuário tem permissão de admin e consegue realizar qualquer operação no sistema.

5) Deve-se criar primeiramente as categorias dos posts antes de fazer a inclusão dos mesmos.

6) Todo usuário que fizer se registrar no sistema será registrado como usuário sem permissões especiais. Para transformá-lo em admin, um usuário administrador após se logar, deve clickar em Usuários, depois no ícone Editar Usuário e fazer a troca do tipo de usuário.

7) Para a inclusão de um post o usuário deve estar registrado e logado.

8) A edição e excusão de post deve ser feita por um usuário admin.

Autor: Miguel W D Machado
E-mail: miguelwdmachado01@gmail.com
