#!/bin/sh
# resize image,放大或者缩小图片，按照原比例
PROGNAME=`type $0 | awk '{print $3}'`  # search for executable on path
PROGDIR=`dirname $PROGNAME`            # extract directory of program
PROGNAME_1=`basename $PROGNAME`          # base name of program
#echo -e "{$PROGNAME}\n"
#echo -e "{$PROGFIR}\n"
#echo -e "{$PROGNAME_1}\n"

out_dir="/home/galendy/image_test/out/resize"
image_base_dir="/home/galendy/image_test/material"

#TODO test 1 thumbnail
# sample 参数和 resize参数，生成缩略图时，sample参数生成的图片稍微小一点

#convert -sample 80x40 ${image_base_dir}/big/jpg/j_b_1.jpg \
#${out_dir}/j_b_1_sample_thumbnail.jpg

#convert -resize 80x40 ${image_base_dir}/big/jpg/j_b_1.jpg \
#${out_dir}/j_b_1_resize_thumbnail.jpg
# TODO test 2 zoomin
# sample也能放大图片，并且生成的图片比resize生成的图片清晰

#convert -resize 280x240 ${image_base_dir}/small/jpg/j_1.jpg \
#${out_dir}/j_1_resize_zoomin.jpg
#convert -sample 280x240 ${image_base_dir}/small/jpg/j_1.jpg \
#${out_dir}/j_1_sample_zoomin.jpg



