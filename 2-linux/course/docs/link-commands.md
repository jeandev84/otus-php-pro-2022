### Команда для создания ссылки 

1. Суть команды "ln"
- Жетские (hard links)
- Символьные (symbolic links)

### Жетские ссылки
```bash
$ ls -li
total 24
22329309 drwxrwxr-x 2 yao yao 4096 апр 16 06:55 docs
22329297 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file1
22329298 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file2
22329299 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file3
22329300 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file4
22329316 -rw-rw-r-- 1 yao yao    0 апр 16 06:37 file66
22329296 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file.txt
22329301 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 script.sh
22329302 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 sed.txt
22329310 drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test1
22329314 drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test2
22329315 drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test3
22329303 drwxrwxr-x 4 yao yao 4096 апр 16 06:13 test4
22329313 drwxrwxr-x 4 yao yao 4096 апр 16 06:46 test5

22329313: это inode # (храннить информации о файле, сколько весит, где он находится на жетском диске, кому он преднадлежит)
```


2. Создание жетской ссылки для этого используется команду "ln"
```bash 
Создадим ссылку для файла file1 который будет называется "file1_hard_link"
$ ln file1 file1_hard_link
$ ls -li
total 24
22329309 drwxrwxr-x 2 yao yao 4096 апр 16 07:03 docs
22329297 -rw-rw-r-- 2 yao yao    0 апр 16 05:55 file1                 [номеры ссылки одиноковые]
22329297 -rw-rw-r-- 2 yao yao    0 апр 16 05:55 file1_hard_link       [номеры ссылки одиноковые]
22329298 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file2
22329299 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file3
22329300 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file4
22329316 -rw-rw-r-- 1 yao yao    0 апр 16 06:37 file66
22329296 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file.txt
22329301 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 script.sh
22329302 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 sed.txt
22329310 drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test1
22329314 drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test2
22329315 drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test3
22329303 drwxrwxr-x 4 yao yao 4096 апр 16 06:13 test4
22329313 drwxrwxr-x 4 yao yao 4096 апр 16 06:46 test5
```

3. Заполним файл содердимое 
```bash 
$ echo "test" > file1
$ ls -li
total 32
22329309 drwxrwxr-x 2 yao yao 4096 апр 16 07:07 docs
22329297 -rw-rw-r-- 2 yao yao    5 апр 16 07:06 file1
22329297 -rw-rw-r-- 2 yao yao    5 апр 16 07:06 file1_hard_link
22329298 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file2
22329299 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file3
22329300 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file4
22329316 -rw-rw-r-- 1 yao yao    0 апр 16 06:37 file66
22329296 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file.txt
22329301 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 script.sh
22329302 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 sed.txt
22329310 drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test1
22329314 drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test2
22329315 drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test3
22329303 drwxrwxr-x 4 yao yao 4096 апр 16 06:13 test4
22329313 drwxrwxr-x 4 yao yao 4096 апр 16 06:46 test5

Показать содержимое файла
$ less file1
test
file1 (END)
\q

$ less file1_hard_link
test
file_hard_link(END)
\q

Можно заметить содержимое одиноковое

Если удалим файл "file1" содержимое остается
$ rm file1
$ less file1_hard_link
```


### Символьные ссылки
```bash 
$ ln -s file1_hard_link file1_soft_link
total 32
22329309 drwxrwxr-x 2 yao yao 4096 апр 16 07:19 docs
22329323 -rw-rw-r-- 1 yao yao    5 апр 16 07:13 file1
22329297 -rw-rw-r-- 1 yao yao    5 апр 16 07:06 file1_hard_link
22329324 lrwxrwxrwx 1 yao yao   15 апр 16 07:19 file1_soft_link -> file1_hard_link
22329298 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file2
22329299 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file3
22329300 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file4
22329316 -rw-rw-r-- 1 yao yao    0 апр 16 06:37 file66
22329296 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 file.txt
22329301 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 script.sh
22329302 -rw-rw-r-- 1 yao yao    0 апр 16 05:55 sed.txt
22329310 drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test1
22329314 drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test2
22329315 drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test3
22329303 drwxrwxr-x 4 yao yao 4096 апр 16 06:13 test4
22329313 drwxrwxr-x 4 yao yao 4096 апр 16 06:46 test5

Если удаляем файл который был создан
$ rm file1_hard_link
$ less file1_soft_link
file1_soft_link: No such file or directory

$ less sed.txt
example1
example2
example3
sed.txt(END)

$ cat sed.txt
example1
example2
example3
```


### Зачем нужны ссылки
```
Симбольные ссылка очень часто используется когда не нужно копировать файла
Они пригодятся для конфигуревания сервера например настройваем NGINX
Серверный NGINX обычно создаются разные конфигуразции
У NGINX есть разные каталога
- 1. Каталог которые ещё не готовые для работы
- 2. Каталог который NGINX должен загрузить


Жетские ссылки создаются когда тогда нужно связаться файлы на разных ОС с разными файловыми системами
```


### Команда "man"
позволяет узнать подробно информации о любой команде в LINUX
```
Например мы хотим понимать что делать команд cat
$ man cat
$ man sort
```