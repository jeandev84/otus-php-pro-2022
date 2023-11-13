### Паттерны для работы с БД

- https://habr.com/ru/company/ruvds/blog/517302
- https://habr.com/ru/companies/ruvds/articles/517302/
- https://github.com/ab-budaev
- https://evilinside.ru/kak-rabotaet-podxod-unit-of-work/
- https://www.martinfowler.com/eaaCatalog/index.html
```
Table Data Gateway
Row Data Gateway
Active Record (Eloquent)
Data Mapper (doctrine)
```



```
Lazy load (Леневая загрузка)
  - Lazy initialisation : 
      использует специальный маркер обычно это нуль, при каждом обращении к полю, если поле не загружена то она загружается  
  - Virtual proxy : 
      объект с таким интерфейсом создается как реальный объект, при обращение к методу виртуальный прокси загружает настоящий объект
      и перенаправляет заполнения, как замена происходит
  - Value holder :
      это как контейнер значения, клиент вызывает value holder чтобы получить реальный объект
  - Ghost :
      это объект без либо каких-то данных
  
Eager load (Жадная загрузка)
Identity map
Unit of work
```