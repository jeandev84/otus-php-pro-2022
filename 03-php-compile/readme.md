### Внутреннее устройство PHP

1. Materials
- https://phplang.org/
- https://www.npopov.com/
- https://www.phpinternalsbook.com/
- https://habr.com/ru/companies/vk/articles/308242/
- https://github.com/php/php-src
- https://astexplorer.net/
- https://3v4l.org/
- https://habr.com/ru/companies/vk/articles/310054/
- https://habr.com/ru/companies/vk/articles/308242/
- https://habr.com/ru/articles/489360/



2. Маршрут вебинара (Opcodes, Opcache)
```

01. Компиляция
02. Runtime
03. Оптимизация 
```

3. О PHP 
```
- На каком языке написан PHP ? на C
- PHP это компилиремый или интерпретируемый язык ? гибридный язык (компилируемый + интерпретируемый)
- какая типизация используется в PHP ? 
  Динамичная и Слобая типизация
```


4. Оптимизация ( Opcache ) 
```
Кэщирование опкодов
как это работает:
- В PHP есть механизм OPcache
- при первом запуске скрипта он компилируется как обычно
- опкоды, полученные при компиляции, сохраняются в специальный кэш
- при последующих запусках скрипта вместе компиляции берутся уже готовые опкоды из кэша.

================================================
Предзагрузка (PHP 7.4)
как это работает:
- В PHP 7.4 появилась предзагрузка (Preloading)
- кэш опкодов создаётся сразу после старта PHP (ещё до первого запроса)
- таким образом, мы прогеваем кэш заранее
- прирост производительности на реальных приложениях - до 25%

===============================================
JIT (PHP 8.0+)
- В PHP 8.0 появился JIT-компилятор
- это ещё один кэш, но не промежуточных опкодов, а сразу машинного кода
- таким образом, для выполнения определённых операций нам даже не нужна виртуальная машина/
- прирост производительности на реальных приложениях - небольшой
```

