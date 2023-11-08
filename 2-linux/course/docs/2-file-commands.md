### Команды для перемешения файлов

1. Команды для создание файлов или директории
```bash
$ touch file.txt #(Создание файл в директории)
$ touch file5 file6 file7

$ mkdir -pv test1 test2 test3
mkdir: created directory 'test1'
mkdir: created directory 'test2'
mkdir: created directory 'test3'
$ mkdir -pv test4/test5/test6 # (создает последности директории)
mkdir: created directory 'test4'
mkdir: created directory 'test4/test5'
mkdir: created directory 'test4/test5/test6'
$ cd test4
$ mkdir -pv test1/test2/test3 # (находя в test4 создаем вложные папки)
mkdir: created directory 'test1'
mkdir: created directory 'test1/test2'
mkdir: created directory 'test1/test2/test3'
$ cd ./test5
$ mkdir -pv test6
$ tree test4  # (посмотреть все что в директории виде дерово)
#test4
#├── test1
#│   └── test2
#│       └── test3
#└── test5
#    └── test6

- install tree via debian
$ apt install tree
```

2. Команды для копирование папки в другую папку
- Памещать папку в другую папку
```bash 
$ cp file5 file6    (копирование файл создаст новую папку с имением file6 и помещает сорежимое file5 в file6
$ cp .env .env.local
$ cp -r test1 test4 (копирование дирректории : r - рекурсивно)
$ cp -r test4 test5
$ ls -la
```

3. Команда для перещания файла или директории 
```bash 
Переименование
$ mv file6 file66 (на данном случае будет переименовать file6 на file66)

Перещание файл file5 в папку test5
$ mv file5 test5
test5
├── file5
├── test1
│   └── test2
│       └── test3
└── test5
    └── test6

5 directories, 1 file
```