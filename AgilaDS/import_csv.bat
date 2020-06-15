@echo off
if not "%minimized%"=="" goto :minimized%
set minimized=true

cd\

d:
cd wamp

cd mysql
cd bin
mysql --user=root --password="" rmniled_db < movie_playlist.sql

