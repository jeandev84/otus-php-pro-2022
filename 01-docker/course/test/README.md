### GIT 

1. Ветки и инструкции
```bash 
git clone ...
main/master 
-> YJean/main
-> YJean/master
$ git checkout -b YJean/master
$ git push origin YJean/master
$ git checkout -b YJean/hw1
$ git push origin YJean/hw1
$ git checkout -b YJean/hw2
$ git push origin YJean/hw2
...

В Репозитории
Создать новы pull request
Выбераем ветку YJean/master => YJean/hw1 ( Домашные задания которые хотел здать )
После коммит ветки

========================================================================================================================
.gitignore
.idea/
.env
vendor/
.htaccess
2-runtime/
tmp/
dbdata/
*.log
cache/

VirtualBox: (Виртуализация) представильный виртуальный компьютер

https://virtualbox.org
https://www.virtualbox.org/wiki/Downloads
https://devenergy.ru/
https://devenergy.ru/archives/306
Install OS (Linux or Windows)

Vagrant: (Автоматизация) похоже на Dockerfile только на виртуальной машине
https://vagrant.com
https://vagrant.com/downloads

Собрать виртуалька для разработчиков Laravel
homestead
https://laravel.com/8.x/homestead#first-steps

https://devenergy.ru/archives/1030


/etc/hosts
127.0.0.1 mysite.local

========================================================================================================================
DZ
Скачать Virtual from laravel
Надо сдавать Virtual + Docker

Docker:
1 Container 1 Process
1. Container NGINX
1. Container PHP-FPM
1. Container Database

https://docs.docker.com/get-started/
https://docs.docker.com/desktop/install/linux-install/
```

2. Работа с Докером
```bash 
Описать контейнер 
Формируем образ   ( это как Класс )
Из образа запускаем контейнеры ( это как наш Объект )

Совет:
Стараться минимизировать использование комманды RUN в Docker
```