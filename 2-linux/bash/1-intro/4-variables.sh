#!/bin/bash

### Использование переменных

# 1. Переменные среды

# display user home (вывести домашнюю директорию текущего пользователя)
echo "Home for the current user is: $HOME"

# escape symbol $ (dollars)
echo "I have \$1 in my pocket"


# 2. Пользовательские переменные

# testing variables
grade=5
person="Adam"
echo "$person is a good boy, he is in grade $grade"
