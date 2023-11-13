### BASH SCRIPT

1. Что такое Bash скрипты
```
Исполняемые текстовые файлы
Содержат последовательность команж (набор инструкций)
Чаше всего служат инструментом для автоматизации каких-либо действий на серверах
```

2. Например создания скрипта
```
$ touch script.txt
$ nano script.txt
Bash скрипты обычно начинаются например :
#!/bin/bash
...
#!/bin/php
#!/bin/env 
... 
всё завист от интерпретатора
---------------------------------------------------------------------------
в script.sh
#!/bin/bash      : начало скрипто bash (#! выполняй скрипт через команду bash
read             :  прочитает то что пользователь входить
NAME             : это название переменная которая где будет записано значение)
echo $NAME       : вывод на экран то что ввел пользователь
----------------------------------------------------------------------------
#!/bin/bash
echo "What is your name?"
read NAME
echo "Hello, $NAME"

touch result.txt
echo $NAME > result.txt
-----------------------------------------------------------------------------
$ mv script.txt script.sh : переименовать файл script.txt на script.sh 
Вызов скрипта:
$ ./script.sh
bash: ./script.sh: Permission denied

$ ls -la
total 28
drwxrwxr-x 6 yao yao 4096 ноя  8 17:37 .
drwxrwxr-x 6 yao yao 4096 апр 16  2023 ..
drwxrwxr-x 2 yao yao 4096 ноя  8 15:59 bash
drwxrwxr-x 2 yao yao 4096 ноя  8 17:39 docs
-rw-rw-r-- 1 yao yao  111 ноя  8 17:36 script.sh
drwxrwxr-x 7 yao yao 4096 ноя  8 15:58 stream
drwxrwxr-x 2 yao yao 4096 ноя  8 17:23 text

$ chmod u+x script.sh
$ ls -la
total 28
drwxrwxr-x 6 yao yao 4096 ноя  8 17:37 .
drwxrwxr-x 6 yao yao 4096 апр 16  2023 ..
drwxrwxr-x 2 yao yao 4096 ноя  8 15:59 bash
drwxrwxr-x 2 yao yao 4096 ноя  8 17:42 docs
-rwxrw-r-- 1 yao yao  111 ноя  8 17:36 script.sh
drwxrwxr-x 7 yao yao 4096 ноя  8 15:58 stream
drwxrwxr-x 2 yao yao 4096 ноя  8 17:23 text

$ ./script.sh
What is your name?
Jean-Claude
Hello, Jean-Claude

$ ls -la
total 32
drwxrwxr-x 6 yao yao 4096 ноя  8 17:42 .
drwxrwxr-x 6 yao yao 4096 апр 16  2023 ..
drwxrwxr-x 2 yao yao 4096 ноя  8 15:59 bash
drwxrwxr-x 2 yao yao 4096 ноя  8 17:43 docs
-rw-rw-r-- 1 yao yao   12 ноя  8 17:42 result.txt
-rwxrw-r-- 1 yao yao  111 ноя  8 17:36 script.sh
drwxrwxr-x 7 yao yao 4096 ноя  8 15:58 stream
drwxrwxr-x 2 yao yao 4096 ноя  8 17:23 text

$ cat result.txt
Jean-Claude

$ less script.sh
```