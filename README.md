# TopWise Artefato 2022

## O que é o Artefato?

Artefato é uma base de projeto desenvolvida sobre Codeigniter 4.1.9 e AdminLTE 3.2.0 onde todos os sistemas web desenvolvidos pela TopWise Software devem ser iniciados.

Oferece toda a base pronta para se inciar rapidamente um projeto sem a necessidade de se reiventar a roda a cada vez.

## Instação e Atualizações

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Configurações para o CodeIgniter

Copie `env` para `.env` e personalize para seu servidor e banco de dados.

## Requerimentos do Servidor

PHP versão 7.3 or superior é necessário com as seguintes extensões instaladas:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) 
- json
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml