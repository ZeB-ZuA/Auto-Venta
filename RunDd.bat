@echo off
set /p host="Host de MySQL: "
set /p user="Usuario de MySQL: "
set /p password="Contrasenia de MySQL: "
set /p port="Puerto de MySQL: "

mysql -h %host% -u %user% -p%password% -P%port% < ./AutoVentaDB.sql
echo Cargando base de datos...
timeout /t 3 /nobreak > NUL
echo Base de datos cargada.
pause
