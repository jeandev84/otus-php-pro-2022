### Команда для вывода из STDOUT

1. Tee
```
Команда "tee" полезная когда мы хотим вывести результат и на экран и на файл
или сохранить результат выполнения команды
Дублирует вывод из STDOUT на экран и в файл

$ (ls -la | tee file5.txt) || (ls - la test123 2> stdout)
Например:
$ ls -la | tee file.txt
total 48
drwxrwxr-x 8 yao yao 4096 апр 16 08:29 .
drwxrwxr-x 6 yao yao 4096 апр 16 05:56 ..
drwxrwxr-x 2 yao yao 4096 апр 16 08:42 docs
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

$ less file5.txt
```


2. Pipe "|" Конвейнер
```
Позволяет объединять команды в последовательность
command1 | command 2 |..| commandN

Команда command1 завершает свою работу и перенаправляет в команду 2
Команда command2 завершает свою работу и перенаправляет в команду 3
... ит.д

$ ls -la | tee file.txt
```


3. GREP 
```
Команда GREP она нужна для того чтобы фильтровать данных в тестовом потоке
$ ls -la | grep test
drwxrwxr-x 2 yao yao 4096 апр 16  2023 test1
drwxrwxr-x 2 yao yao 4096 апр 16  2023 test2
drwxrwxr-x 2 yao yao 4096 апр 16  2023 test3
drwxrwxr-x 4 yao yao 4096 апр 16  2023 test4
drwxrwxr-x 4 yao yao 4096 апр 16  2023 test5

Например:
Мы хотим фильтровать в нашем каталоге все папки или файлы с названием "file"
$ ls -la | grep file
-rw-rw-r-- 1 yao yao    5 апр 16  2023 file1
-rw-rw-r-- 1 yao yao    5 апр 16  2023 file1_hard_link
-rw-rw-r-- 1 yao yao    5 апр 16  2023 file1_soft_link
-rw-rw-r-- 1 yao yao    0 апр 16  2023 file2
-rw-rw-r-- 1 yao yao    0 апр 16  2023 file3
-rw-rw-r-- 1 yao yao    0 апр 16  2023 file4
-rw-rw-r-- 1 yao yao    0 апр 16  2023 file66
-rw-rw-r-- 1 yao yao 1018 апр 16  2023 file.txt
-rw-rw-r-- 1 yao yao    0 апр 16  2023 .hidden_file
```