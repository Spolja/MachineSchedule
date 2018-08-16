#!/bin/sh

#copy project to deploy folder

deployFolder=C:/Projects/deploy/machine-schedule

cp -Rf . $deployFolder
chmod 777 $deployFolder
