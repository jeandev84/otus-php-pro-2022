### GNU/LINUX

```bash
1. Узнать основые принципы работы с ОС
2. Узнать как работать с файловой системой с помощью CLI
3. Узнать какустроена работа с доступами к файлам и папкам
4. Узнать как работать с текстом с помощью CLI
5. Узнать как писать bash скрипты
```


### Command Line Interface (CLI)
```bash
$ sh (Bourne Shell)
$ csh (C Shell)
$ ksh (Bourne Shell)
$ bash (Bourne Again Shell) это новая версия "sh"
$ zsh (Z-Shell) 
```

### Формат команды
```bash
$ команда -клоч(и) значение
```


### Базовые команды для работы с файлами
```bash 
$ ls (вывод списка файлов в working directory на экран)
$ tree (вывод файлов древовидном формате)
$ cd (изменение working directy)
$ touch (создание файла)
$ mkdir (создание директории)
$ pwd (вывести на экран working directory)
$ cp (копирование)
$ mv (перемещение)
$ ln (ссылка)
$ less | cat (показывает содержимое файла) [ less sed.txt, cat sed.txt ]
```

### практика
```bash 
$ ls -la (показывает все файлы с правами)
drwxrwxr-x 2 yao yao 4096 апр 16 05:07 .
drwxrwxr-x 5 yao yao 4096 апр 16 05:04 ..
-rw-rw-r-- 1 yao yao 1218 апр 16 05:07 README.md
-rw-rw-r-- 1 yao yao 1218 апр 16 05:07 api [...internal]

$ rm -rf api/internal  (удаляет файл или каталог)
$ ls (отображает список файлов в одну строчку)
index.php  README.md  script.sh

$ ls -l (Выводить все файлв кроме скритые файлы)
total 8
-rw-rw-r-- 1 yao yao    7 апр 16 05:13 index.php
-rw-rw-r-- 1 yao yao 1974 апр 16 05:14 README.md

$ ls -la (Выводить все файлы и даже скритые)
total 16
drwxrwxr-x 2 yao yao 4096 апр 16 05:13 .
drwxrwxr-x 5 yao yao 4096 апр 16 05:04 ..
-rw-rw-r-- 1 yao yao    0 апр 16 05:12 .gitignore
-rw-rw-r-- 1 yao yao    7 апр 16 05:13 index.php
-rw-rw-r-- 1 yao yao 1710 апр 16 05:13 README.md

==========================================================
1. Доступ к файлу (drwxrwxr-x) 
2. Показывает количество ссылок (2) если количество == 0, значит для ОС дянный файл перестанет существовать
3. Пользователь (yao)
4. Группа (yao)
5. Размер файла (4049)
6. Дата создание файла
7. Название файла или папки


$ ls -lah (Позволяет посмотреть размер файла более в человеском понятии виде)
показывает файл в байт, килобайт, мегабайт ...
total 16K
drwxrwxr-x 2 yao yao 4,0K апр 16 05:22 .
drwxrwxr-x 5 yao yao 4,0K апр 16 05:04 ..
-rw-rw-r-- 1 yao yao    0 апр 16 05:12 .gitignore
-rw-rw-r-- 1 yao yao    7 апр 16 05:13 index.php
-rw-rw-r-- 1 yao yao 2,7K апр 16 05:22 README.md


$ ls -la
total 16
drwxrwxr-x 2 yao yao 4096 апр 16 05:29 .
drwxrwxr-x 5 yao yao 4096 апр 16 05:04 ..
-rw-rw-r-- 1 yao yao    0 апр 16 05:27 .env
-rw-rw-r-- 1 yao yao    0 апр 16 05:12 .gitignore
-rw-rw-r-- 1 yao yao    7 апр 16 05:13 index.php
-rw-rw-r-- 1 yao yao 3019 апр 16 05:29 README.md
-rw-rw-r-- 1 yao yao    0 апр 16 05:23 script.sh

$ cd ..              (Выйти на уровень высше)
$ cd ../../          (Выйти на уровень высше из католога где находимся)
$ cd ../             (Выйти на уровень высше из католога где находимся)
$ cd ~               (Перейти на базовый каталог)
$ cd -               (Показывает полный путь текущей директории)
/home/yao/Desktop/PHP/phprotus2022/2-linux/course
$ cd /etc/mysql      (Перейти на конкретный каталог из корнего OS)
$ cd /etc/php-fpm.d  (Перейти на конкретный каталог из корнего OS)
$ cd ./app/routes
$ cd ~/otus
$ pwd (print work directory) показывает название текущей директории
/home/yao/Desktop/PHP/phprotus2022/2-linux/course
```