### Стандартные потоки


1. Введение о стандартах
Потоки которые у нас в ОС
STD - Standard (IN, OUT, ERR)
0, 1, 2 это идентификатор потока
```
STDIN(0)  - поток STDIN отвечает за входные данные (Откуда придуть данных)
STDOUT(1) - поток STDOUT отвечает за вывода данных  (
STDERR(2) - поток STDERR отвечает за вывода ошибок
```


2. Перенаправление потоки
```
<      Изменить цель потока (для STDIN)
>      Перенаправить вывод STDOUT
2>     Перенаправить вывод STDERR
2>&1   Перенаправить вывод STDERR туда же, куда направлен вывод потока STDOUT

=========================================================
Example:

$ ls -la
total 44
drwxrwxr-x 8 yao yao 4096 апр 16 07:27 .
drwxrwxr-x 6 yao yao 4096 апр 16 05:56 ..
drwxrwxr-x 2 yao yao 4096 апр 16 07:56 docs
-rw-rw-r-- 1 yao yao    5 апр 16 07:13 file1
-rw-rw-r-- 1 yao yao    5 апр 16 07:06 file1_hard_link
lrwxrwxrwx 1 yao yao   15 апр 16 07:19 file1_soft_link -> file1_hard_link
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file2
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file3
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file4
-rw-rw-r-- 1 yao yao    0 апр 16 06:37 file66
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file.txt
-rw-rw-r-- 1 yao yao    0 апр 16 05:54 .hidden_file
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 script.sh
-rw-rw-r-- 1 yao yao   26 апр 16 07:27 sed.txt
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test1
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test2
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test3
drwxrwxr-x 4 yao yao 4096 апр 16 06:13 test4
drwxrwxr-x 4 yao yao 4096 апр 16 06:46 test5

$ touch stdout
$ ls -la
ls -la
total 44
drwxrwxr-x 8 yao yao 4096 апр 16 07:57 .
drwxrwxr-x 6 yao yao 4096 апр 16 05:56 ..
drwxrwxr-x 2 yao yao 4096 апр 16 07:57 docs
-rw-rw-r-- 1 yao yao    5 апр 16 07:13 file1
-rw-rw-r-- 1 yao yao    5 апр 16 07:06 file1_hard_link
lrwxrwxrwx 1 yao yao   15 апр 16 07:19 file1_soft_link -> file1_hard_link
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file2
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file3
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file4
-rw-rw-r-- 1 yao yao    0 апр 16 06:37 file66
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file.txt
-rw-rw-r-- 1 yao yao    0 апр 16 05:54 .hidden_file
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 script.sh
-rw-rw-r-- 1 yao yao   26 апр 16 07:27 sed.txt
-rw-rw-r-- 1 yao yao    0 апр 16 07:57 stdout
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test1
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test2
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test3
drwxrwxr-x 4 yao yao 4096 апр 16 06:13 test4
drwxrwxr-x 4 yao yao 4096 апр 16 06:46 test5

Перемещать вывод команды "ls -la" на файл stdout
$ ls -la > stdout
$ cat stdout
total 44
drwxrwxr-x 8 yao yao 4096 апр 16 07:57 .
drwxrwxr-x 6 yao yao 4096 апр 16 05:56 ..
drwxrwxr-x 2 yao yao 4096 апр 16 07:58 docs
-rw-rw-r-- 1 yao yao    5 апр 16 07:13 file1
-rw-rw-r-- 1 yao yao    5 апр 16 07:06 file1_hard_link
lrwxrwxrwx 1 yao yao   15 апр 16 07:19 file1_soft_link -> file1_hard_link
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file2
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file3
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file4
-rw-rw-r-- 1 yao yao    0 апр 16 06:37 file66
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file.txt
-rw-rw-r-- 1 yao yao    0 апр 16 05:54 .hidden_file
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 script.sh
-rw-rw-r-- 1 yao yao   26 апр 16 07:27 sed.txt
-rw-rw-r-- 1 yao yao    0 апр 16 07:59 stdout
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test1
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test2
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test3
drwxrwxr-x 4 yao yao 4096 апр 16 06:13 test4
drwxrwxr-x 4 yao yao 4096 апр 16 06:46 test5

Выводим результат команды "ls -la" из корневой директории 
$ ls -la / > stdout

Перезаписать содержимое файла (APPEND FILE)
$ ls -la >> stdout
$ less|cat stdout
total 2097532
drwxr-xr-x  20 root root       4096 дек 11 22:44 .
drwxr-xr-x  20 root root       4096 дек 11 22:44 ..
lrwxrwxrwx   1 root root          7 дек 11 22:41 bin -> usr/bin
drwxr-xr-x   4 root root       4096 апр 16 04:22 boot
drwxrwxr-x   2 root root       4096 дек 11 22:44 cdrom
drwxr-xr-x  20 root root       5140 апр 16 00:20 dev
drwxr-xr-x 160 root root      12288 апр 16 04:22 etc
drwxr-xr-x   3 root root       4096 дек 11 22:45 home
lrwxrwxrwx   1 root root          7 дек 11 22:41 lib -> usr/lib
lrwxrwxrwx   1 root root          9 дек 11 22:41 lib32 -> usr/lib32
lrwxrwxrwx   1 root root          9 дек 11 22:41 lib64 -> usr/lib64
lrwxrwxrwx   1 root root         10 дек 11 22:41 libx32 -> usr/libx32
drwx------   2 root root      16384 дек 11 22:41 lost+found
drwxr-xr-x   3 root root       4096 дек 12 00:31 media
drwxr-xr-x   2 root root       4096 дек 11 04:52 mnt
drwxr-xr-x   5 root root       4096 апр  2 23:26 opt
dr-xr-xr-x 415 root root          0 апр 16 00:19 proc
drwx------  11 root root       4096 апр 14 01:45 root
drwxr-xr-x  48 root root       1540 апр 16 07:47 run
lrwxrwxrwx   1 root root          8 дек 11 22:41 sbin -> usr/sbin
drwxr-xr-x  27 root root       4096 мар 22 18:58 snap
drwxr-xr-x   2 root root       4096 дек 11 04:52 srv
-rw-------   1 root root 2147483648 дек 11 22:41 swapfile
dr-xr-xr-x  13 root root          0 апр 16 00:19 sys
drwxrwxrwt  17 root root     299008 апр 16 07:47 tmp
drwxr-xr-x  14 root root       4096 дек 11 04:52 usr
drwxr-xr-x  14 root root       4096 дек 11 04:56 var
total 48
drwxrwxr-x 8 yao yao 4096 апр 16 07:57 .
drwxrwxr-x 6 yao yao 4096 апр 16 05:56 ..
drwxrwxr-x 2 yao yao 4096 апр 16 08:03 docs
-rw-rw-r-- 1 yao yao    5 апр 16 07:13 file1
-rw-rw-r-- 1 yao yao    5 апр 16 07:06 file1_hard_link
lrwxrwxrwx 1 yao yao   15 апр 16 07:19 file1_soft_link -> file1_hard_link
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file2
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file3
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file4
-rw-rw-r-- 1 yao yao    0 апр 16 06:37 file66
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file.txt
-rw-rw-r-- 1 yao yao    0 апр 16 05:54 .hidden_file
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 script.sh
-rw-rw-r-- 1 yao yao   26 апр 16 07:27 sed.txt
-rw-rw-r-- 1 yao yao 1626 апр 16 08:01 stdout
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test1
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test2
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test3
drwxrwxr-x 4 yao yao 4096 апр 16 06:13 test4
drwxrwxr-x 4 yao yao 4096 апр 16 06:46 test5


# Попробуем посмотреть содержимое файла который не существует
$ ls -la test123
ls: cannot access 'test123': No such file or directory

# Ппробуем вывести содердимое в файл stdout
$ ls -la test123 > stdout
ls: cannot access 'test123': No such file or directory

$ less stdout

# Выводим содержимое в поток STDOUT в случае если файл не существует
# на данном случае если будет ошибка то попадает в файл stdout
$ ls -la test123 2> stdout
$ cat|less stdout
ls: cannot access 'test123': No such file or directory

Можно скомбиниривовать команды для вывода

# Мы меняем обычная команда на другую команду "grep test < cat file1"
$ grep test < cat file1 
bash: cat: No such file or directory

$ ls -la
total 48
drwxrwxr-x 8 yao yao 4096 апр 16 08:29 .
drwxrwxr-x 6 yao yao 4096 апр 16 05:56 ..
drwxrwxr-x 2 yao yao 4096 апр 16 08:40 docs
-rw-rw-r-- 1 yao yao    5 апр 16 07:13 file1
-rw-rw-r-- 1 yao yao    5 апр 16 07:06 file1_hard_link
lrwxrwxrwx 1 yao yao   15 апр 16 07:19 file1_soft_link -> file1_hard_link
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file2
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file3
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file4
-rw-rw-r-- 1 yao yao    0 апр 16 06:37 file66
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 file.txt
-rw-rw-r-- 1 yao yao    0 апр 16 05:54 .hidden_file
-rw-rw-r-- 1 yao yao    0 апр 16 05:55 script.sh
-rw-rw-r-- 1 yao yao   26 апр 16 07:27 sed.txt
-rw-rw-r-- 1 yao yao   55 апр 16 08:29 stdout
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test1
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test2
drwxrwxr-x 2 yao yao 4096 апр 16 06:34 test3
drwxrwxr-x 4 yao yao 4096 апр 16 06:13 test4
drwxrwxr-x 4 yao yao 4096 апр 16 06:46 test5

```