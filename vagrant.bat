@echo off

set cwd=%cd%
set homesteadVagrant=C:\Users\nilse\Homestead

cd /d %homesteadVagrant% && vagrant %*
cd /d %cwd%

set cwd=
set homesteadVagrant=