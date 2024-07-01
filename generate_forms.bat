@echo off
echo =============================================
echo + WELCOME TO BPSF CLAIM STUB FORM GENERATOR +
echo =============================================
echo.

set /p PREFIX=Enter (Form Prefix):
set /p START=Enter (Start):
set /p END=Enter (End):

php index.php Tpdf bpsf %PREFIX% %START% %END%

pause