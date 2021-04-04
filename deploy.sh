#! /bin/bash
if find /var/www/spd.local/media -mindepth 1 | read; then
    mkdir /var/www/temp
    cp -r /var/www/spd.local/media/. /var/www/temp
    images_exist="true"
else
    images_exist="false"
fi

rm -rf build
mkdir build
cp -r blog/admin/. build/admin
cp -r blog/api/. build/api
cp -r blog/astronauth/. build/astronauth
cp -r blog/Blog/. build/Blog
cp -r blog/media/. build/media
cp -r blog/vendor/. build/vendor
cp -r custom/. build
cp -r oldcustom/. build

rm -rf /var/www/spd.local
mkdir /var/www/spd.local
cp -r build/. /var/www/spd.local

if [ "$images_exist" == "true" ]; then
    cp -r /var/www/temp/. /var/www/spd.local/media
    rm -rf /var/www/temp
fi

chown -R www-data /var/www/spd.local
chgrp -R www-data /var/www/spd.local
