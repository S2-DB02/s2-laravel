<p align="center">
<img src="https://www.basworld.com/assets/bas-world/src/images/logo.svg" width="400">
</p>

___

![bruh](https://img.shields.io/github/repo-size/s2-db02/s2-laravel) ![tag2](https://img.shields.io/github/checks-status/s2-db02/s2-laravel/master) ![stars](https://img.shields.io/github/stars/s2-db02/s2-laravel?style=social)


![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![GitHub](https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white) 

<br />


# BAS WORLD CMS PORTAL

Bas World CMS Portal is an admin panel for support tickets, written in Laravel. It works together with the Chrome-based [S2-Webextension](https://github.com/S2-DB02/s2-webextension) which is a part of the S2-DB02 project used for internal bug reporting within © Bas World.

This project is developed by S2 students at Fontys University of Applied Science and is mainly used as a school project.

## Installation

Head to the [wiki](https://github.com/S2-DB02/s2-laravel/wiki/Full-Application-Installation) for a full installation walkthrough. Below are some instructions for a quick deployment, assuming you open the project for non-production purposes and are already familiar with the DB construction.
```
1. Git clone this project
2. Copy or rename the ".env.example" file and fill in your DB credentials.
3. Open a terminal in your root folder and run "composer update"
4. Next, run "php artisan migrate:fresh --seed" for Table and data creation in the database.
5. Run "php artisan serve --host"<your device IP here>"
```

## Screenshots

<table><tr>
<td> <img src="https://imgur.com/CJwnqJt.png" alt="login" style="width: 250px;"/> </td>
<td> <img src="https://imgur.com/W0yYBCj.png" alt="popup" style="width: 250px;"/> </td>
<td> <img src="https://imgur.com/wEzmETQ.png" alt="popup" style="width: 250px;"/> </td>
</tr></table>


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
