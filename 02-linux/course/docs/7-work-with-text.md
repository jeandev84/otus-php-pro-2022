### Работа с текстом

1. Команда "sed" (Stream EDitor)
```
Команда используется чтобы :
- Замена текста
- Удаление строк
- Вставка текста в поток
- Замена строк
...

Например:
$ sed 's/string_to_replace/replacement' file
$ sed -e 's/example1/example2/;s/example3/example4/' file
$ sed -f file_with_commands file
===================================================================================
$ less sed.txt
example11
example2
example3

$ sed -i 's/example2/example5/' sed.txt

$ less sed.txt
example11
example5
example3
```


2. Команда "awk" (Aho, Weinberger, Kernighan) 
```
Язык программирования, предназначенный для обратотки текста/данных
Для удобста понимания принято считать утилитой или командой

awk - используется когда есть структурированы набор данных

Например:
$ awk '{print}'/etc/passwd
$ awk '{print ""}'/etc/passwd
$ awk '{print $0 "\t" $1}'/etc/passwd
$ awk -F":" '{print $0 "\t" $1}'/etc/passwd

=================================================================
$0 : получаем вся строка
$1 : получаем второй элемент строки после того как awk разделил на часть
Example:
$ less /etc/passwd
$ awk -F":" '{ print $1 }' /etc/passwd               (разделили строки, это как explode(":", строка) в пхп
root
daemon
bin
sys
sync
games
man
lp
mail
news
uucp
proxy
www-data
backup
list
irc
gnats
nobody
systemd-network
systemd-resolve
messagebus
systemd-timesync
syslog
_apt
tss
uuidd
tcpdump
avahi-autoipd
usbmux
dnsmasq
kernoops
avahi
cups-pk-helper
rtkit
whoopsie
fwupd-refresh
saned
colord
sddm
geoclue
pulse
hplip
yao
snapd-range-524288-root
snap_daemon
postgres

$ awk -F":" '{ print "User: " $1 ". Group: " $4}' /etc/passwd
User: root. Group: 0
User: daemon. Group: 1
User: bin. Group: 2
User: sys. Group: 3
User: sync. Group: 65534
User: games. Group: 60
User: man. Group: 12
User: lp. Group: 7
User: mail. Group: 8
User: news. Group: 9
User: uucp. Group: 10
User: proxy. Group: 13
User: www-data. Group: 33
User: backup. Group: 34
User: list. Group: 38
User: irc. Group: 39
User: gnats. Group: 41
User: nobody. Group: 65534
User: systemd-network. Group: 102
User: systemd-resolve. Group: 103
User: messagebus. Group: 105
User: systemd-timesync. Group: 106
User: syslog. Group: 111
User: _apt. Group: 65534
User: tss. Group: 112
User: uuidd. Group: 115
User: tcpdump. Group: 116
User: avahi-autoipd. Group: 119
User: usbmux. Group: 46
User: dnsmasq. Group: 65534
User: kernoops. Group: 65534
User: avahi. Group: 121
User: cups-pk-helper. Group: 122
User: rtkit. Group: 123
User: whoopsie. Group: 124
User: fwupd-refresh. Group: 125
User: saned. Group: 127
User: colord. Group: 128
User: sddm. Group: 129
User: geoclue. Group: 130
User: pulse. Group: 131
User: hplip. Group: 7
User: yao. Group: 1000
User: snapd-range-524288-root. Group: 524288
User: snap_daemon. Group: 584788
User: postgres. Group: 135
```