### Подключение по SSH (Secure Shell)


1. SSH
```
SSH   : позволяет из терминала подключиться к другим машинам или серверу
-p22  : указание более конкретный порт надо подключаться

$ ssh user@192.168.0.1
$ ssh user:password@192.168.0.1 -p22

$ ssh -i ../.ssh/digitalocean demo@159.89.30.163
```


2. Безопасность в работе с ssh 
```
Нестандартный порт
Авторизация по ключам
Ограничение неудачных попыток авторизации (fail2ban)
```

3. Подключение по ssh с помощью ключа 
```
$ ssh-keygen
$ cat ~/.ssh/id_rsa.pub | ssh username@remote_host "mkdir -p ~/.ssh && cat>>~/.ssh/authorized_keys" OR
$ ssh-copy-id username@remote_host
```