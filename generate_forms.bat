@echo off
set /p PREFIX=Enter PREFIX:
set /p START=Enter START:
set /p END=Enter END:

php index.php Tpdf dvapp %PREFIX% %START% %END%

pause