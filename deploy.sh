#! /bin/bash

./build.sh

# save previously uploaded images
if find /var/www/spd.local/resources/images/dynamic -mindepth 1 | read; then
	mkdir ./build/temp-images
    cp -r /var/www/spd.local/resources/images/dynamic/* ./build/temp-images
    images_exist="true"
else
	images_exist="false"
fi

# remove old files
rm -rf /var/www/spd.local/*

# copy new files
cp -r ./build/. /var/www/spd.local

# copy previously uploaded images
if [ "$images_exist" == "true" ]; then
	cp -r /var/www/spd.local/temp-images/* /var/www/spd.local/resources/images/dynamic
	rm -rf /var/www/spd.local/temp-images
fi

# set permissions for image upload folder
chown -R www-data /var/www/spd.local/resources/images/dynamic
