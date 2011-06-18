#!/bin/sh

#composite 合成图片，TODO 支持两张

out_dir="/home/galendy/image_test/out/composite"
image_base_dir="/home/galendy/image_test/material"

#garvity 重力，万有引力，水平或者垂直对齐

:<<shell_comment
composite_1="${image_base_dir}/small/png/p_2.png"
composite_2="${image_base_dir}/small/png/p_3.png"
composite -gravity center ${composite_1} ${composite_2} ${out_dir}/p_2_3.png
shell_comment

:<<shell_comment
composite_1="${image_base_dir}/small/png/p_2.png"
composite_2="${image_base_dir}/small/png/p_3.png"
composite -gravity center ${composite_2} ${composite_1} ${out_dir}/p_3_2.png
shell_comment

#compose 合成,将前图贴到后图上，只保留后图的部分
#http://www.imagemagick.org/Usage/compose/
:<<shell_comment
composite_1="${image_base_dir}/small/png/p_2.png"
composite_2="${image_base_dir}/small/png/p_3.png"
composite -compose atop -gravity center ${composite_2} ${composite_1} \
${out_dir}/p_compose_3_2.png
shell_comment

#TODO atop like over,but clip to background image
:<<shell_comment
composite_1="${image_base_dir}/small/png/p_2.png"
composite_2="${image_base_dir}/small/png/p_3.png"
composite -compose atop -gravity center ${composite_2} ${composite_1} \
${out_dir}/p_compose_3_2_atop.png
shell_comment

#TODO default,over ,像并集。V
:<<comment_over
composite_1="${image_base_dir}/small/png/p_2.png"
composite_2="${image_base_dir}/small/png/p_3.png"
composite -compose over -gravity center ${composite_2} ${composite_1} \
${out_dir}/p_compose_3_2_over.png
comment_over

#TODO default,dst_over ,像并集。V
:<<comment_over
composite_1="${image_base_dir}/small/png/p_2.png"
composite_2="${image_base_dir}/small/png/p_3.png"
composite -compose dst_over -gravity center ${composite_2} ${composite_1} \
${out_dir}/p_compose_3_2_dst_over.png
comment_over

#TODO in,差集like mask the background with source
:<<comment_in
composite_1="${image_base_dir}/small/png/p_2.png"
composite_2="${image_base_dir}/small/png/p_3.png"
composite -compose in -gravity center ${composite_2} ${composite_1} \
${out_dir}/p_compose_3_2_in.png
comment_in

#TODO  out,a 'erase' operation
:<<comment_out
composite_1="${image_base_dir}/small/png/p_2.png"
composite_2="${image_base_dir}/small/png/p_3.png"
composite -compose out -gravity center ${composite_2} ${composite_1} \
${out_dir}/p_compose_3_2_out.png
comment_out

#TODO with geometry

#TODO geo with coordinate
:<<geo_comment
composite_1="${image_base_dir}/small/png/p_2.png"
composite_2="${image_base_dir}/small/png/p_3.png"
composite -compose over -geometry +30+30 ${composite_1} ${composite_2} \
${out_dir}/p_compose_2_3_out_geo.png
geo_comment

#TODO geo with coordinate and w+h
:<<geo_comment
composite_1="${image_base_dir}/small/png/p_2.png"
composite_2="${image_base_dir}/small/png/p_3.png"
composite -compose over -geometry 60x60+30+30 ${composite_1} ${composite_2} \
${out_dir}/p_compose_2_3_out_geo_w_h.png
geo_comment

#TODO with negative
composite_1="${image_base_dir}/small/png/p_2.png"
composite_2="${image_base_dir}/small/png/p_3.png"
composite -compose over -geometry 60x60-30-30 ${composite_1} ${composite_2} \
${out_dir}/p_compose_2_3_out_geo_negative.png
