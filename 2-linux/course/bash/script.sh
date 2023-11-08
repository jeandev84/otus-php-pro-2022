#!/bin/bash

echo "What is your name?"
read NAME
echo "Hello, $NAME"

touch result.txt
echo $NAME > result.txt
