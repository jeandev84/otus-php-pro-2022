#!/bin/bash

### Управляющая конструкция if-then

# Пример 1:
# если есть текущая директория
if pwd
then
echo "It works"
fi


# Пример 2:
# объявляем переменную "user"
#user=yao
user=brown

# мы ищем пользователь "brown" в файле /etc/password
if grep $user /etc/passwd
then
echo "The user $user Exists"
fi



### Управляющая конструкция if-then-else

user=johndoe
if grep $user /etc/passwd
then
echo "The user $user exists"
else
echo "The user $user doesn’t exist"
fi


user="brown"
if [ $user = $USER ]
then
echo "The user $user  is the current logged in user"
else
echo "Current user is $USER"
fi

### Управляющая конструкция if-elif-then

# Пример 1:
user=botuser
if grep $user /etc/passwd
then
echo "The user $user exists"
elif ls /home
then
echo "The user doesn’t exist but anyway there is a directory under /home"
fi


# Пример 2:
# В подобном скрипте можно, например, создавать нового пользователя с помощью команды useradd,
# если поиск не дал результатов, или делать ещё что-нибудь полезное.

user=botuser
if grep $user /etc/passwd
then
echo "The user $user exists"
elif ls /home
then
echo "The user doesn’t exist but anyway there is a directory under /home"
fi

