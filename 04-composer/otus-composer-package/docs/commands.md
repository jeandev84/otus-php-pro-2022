### Make git tag

```
$ git push origin HEAD
$ git tag -a v1.0.0 -m "Init version 1.0.0"
$ git push origin HEAD
$ git show v1.0.0
$ git tag (show all availables tags)
$ git push origin v1.0.0

============================================
$ git add .
$ git commit -m "Fix length calculation bug"
$ git tag -a v1.0.1 -m "Bugfix"
$ git push origin v1.0.1

============================================
$ composer show -l (показывает все пакеты с новыми версиями)
Color legend:
- patch or minor release available - update recommended
- major release available - update possible
- up to date version
danielstjules/stringy     3.1.0   3.1.0   A string manipulation library with multibyte support
jeandev84/otus-composer-package v1.0.1 v1.0.1 (ТУТ ТРЕБУЕТСЯ ОБНОВЛЕНИЕ)
symfony/polyfill-mbstring v1.28.0 v1.28.0 Symfony polyfill for the Mbstring extension

$ composer update jeandev84/otus-composer-package
```


Generator README.md 
```
https://readme.so/editor
https://rahuldkjain.github.io/gh-profile-readme-generator/
https://www.makeareadme.com/
```