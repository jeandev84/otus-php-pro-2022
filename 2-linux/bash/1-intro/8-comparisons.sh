#!/bin/bash

### Сравнение чисел

# В скриптах можно сравнивать числовые значения.
# Ниже приведён список соответствующих команд.

# n1 -eq n2Возвращает истинное значение, если n1 равно n2.
# n1 -ge n2 Возвращает истинное значение, если n1больше или равно n2.
# n1 -gt n2Возвращает истинное значение, если n1 больше n2.
# n1 -le n2Возвращает истинное значение, если n1меньше или равно n2.
# n1 -lt n2Возвращает истинное значение, если n1 меньше n2.
# n1 -ne n2Возвращает истинное значение, если n1не равно n2.


# Проверяем если val1 больше чем 5
val1=6
if [ $val1 -gt 5 ]
then
echo "The test value $val1 is greater than 5"
else
echo "The test value $val1 is not greater than 5"
fi




### Сравнение строк

# В сценариях можно сравнивать и строковые значения.
# Операторы сравнения выглядят довольно просто,
# однако у операций сравнения строк есть определённые особенности,
# которых мы коснёмся ниже. Вот список операторов.


# str1 = str2  Проверяет строки на равенство, возвращает истину, если строки идентичны.
# str1 != str2 Возвращает истину, если строки не идентичны.
# str1 < str2  Возвращает истину, если str1меньше, чем str2.
# str1 > str2  Возвращает истину, если str1больше, чем str2.
# -n str1      Возвращает истину, если длина str1больше нуля.
# -z str1      Возвращает истину, если длина str1равна нулю.


user="likegeeks"

if [ $user = $USER ]
then
echo "The user $user  is the current logged in user"
fi


# Вот одна особенность сравнения строк, о которой стоит упомянуть.
# А именно, операторы «>» и «<» необходимо экранировать с помощью обратной косой черты,
# иначе скрипт будет работать неправильно, хотя сообщений об ошибках и не появится.
# Скрипт интерпретирует знак «>» как команду перенаправления вывода.

val1=text
val2="another text"
if [ $val1 \> $val2 ]
then
echo "$val1 is greater than $val2"
else
echo "$val1 is less than $val2"
fi