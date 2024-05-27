@echo off
set /p user="Usuario de MySQL: "
set /p password="Contrasenia de MySQL: "
set /p port="Puerto de MySQL: "

mysql -u %user% -p%password% -P%port% < ./AutoVentaDB.sql
echo Cargando base de datos...
timeout /t 3 /nobreak > NUL
echo Base de datos cargada.