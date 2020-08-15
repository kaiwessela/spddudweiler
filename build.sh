#! /bin/bash

# clear build folder
rm -rf build
mkdir build

# build blog
cd blog
./build.sh
cd ..
cp -r blog/build/. build

# copy own files
cp -r src/. build
