#! /bin/bash
if find /var/www/spd.local/resources/images/dynamic -mindepth 1 | read; then
    mkdir /var/www/temp
    cp -r /var/www/spd.local/resources/images/dynamic/. /var/www/temp
    images_exist="true"
else
    images_exist="false"
fi

rm -rf build
mkdir build
cp -r blog/. build
cp -r custom/. build

rm -rf /var/www/spd.local
mkdir /var/www/spd.local
cp -r build/. /var/www/spd.local

if [ "$images_exist" == "true" ]; then
    cp -r /var/www/temp/. /var/www/spd.local/resources/images/dynamic
    rm -rf /var/www/temp
fi

chown -R www-data /var/www/spd.local/resources/images/dynamic
