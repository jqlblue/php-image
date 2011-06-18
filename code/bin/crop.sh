#!/bin/sh
#crop 裁剪图片
out_dir="/home/galendy/image_test/out/crop"
image_base_dir="/home/galendy/image_test/material"

#TODO with repage
#http://www.imagemagick.org/script/command-line-options.php?#repage
:<<shell_comment
source_image="${image_base_dir}/big/jpg/j_b_1.jpg"
dest_image="${out_dir}/j_b_1_crop_1.jpg"
convert ${source_image} -crop 200x200+0+0 +repage ${dest_image}
shell_comment

:<<shell_comment
source_image="${image_base_dir}/big/jpg/j_b_1.jpg"
dest_image="${out_dir}/j_b_1_crop_1_no_repage.jpg"
convert ${source_image} -crop 200x200+0+0 ${dest_image}
shell_comment

#with gravity
#http://www.imagemagick.org/script/command-line-options.php?#gravity
:<<shell_comment
source_image="${image_base_dir}/big/jpg/j_b_1.jpg"
dest_image="${out_dir}/j_b_1_crop_center_gravity.jpg"
convert ${source_image} -gravity Center -crop 200x200+0+0 +repage ${dest_image}
shell_comment

#with no reapge,and with no zero coordinate
source_image="${image_base_dir}/big/jpg/j_b_1.jpg"
dest_image="${out_dir}/j_b_1_crop_center_gravity_coordinate.jpg"
convert ${source_image} -gravity South -crop 200x200+50+50 ${dest_image}

source_image="${image_base_dir}/big/jpg/j_b_1.jpg"
dest_image="${out_dir}/j_b_1_crop_center_gravity_coordinate_repage.jpg"
convert ${source_image} -gravity South -crop 200x200+50+50 +repage ${dest_image}
