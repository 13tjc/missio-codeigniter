<div class="project-detail-stats">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="-55 147 500 500" style="enable-background:new -55 147 500 500;" xml:space="preserve">
        <style type="text/css">
            /*.centerCircle{fill: #000000;}*/
            .st0{fill:#000000;stroke:#E0251C;stroke-width:2;stroke-miterlimit:10;}
            .st1{clip-path:url(#SVGID_2_);}
            .st2{fill:#7A140F;}
            .st3{fill:#E0251C;}
            .st4{fill:#FFFFFF;}
            .st5{stroke:#E0251C;stroke-width:2;stroke-miterlimit:10;}
            .st6{fill:none;stroke:#000000;stroke-width:2;stroke-opacity:0;}
            .st7{fill:none;}
            .st8{font-family: 'Roboto'; font-weight: 100;}
            .st9{font-size:90px;}
            .st10{letter-spacing:-3px;}
            .st11{font-size:98.6493px;}
            .st12{letter-spacing:-3.4px;}
        </style>
        <g id="fundingGraphic_copy">
            <circle id="fundingGraphic-outside3_1_" class="st0" cx="195" cy="397" r="200"/>
            <g>
                <defs>
                    <path id="SVGID_1_" d="M-21.5,272c69-119.6,221.9-160.5,341.5-91.5c38,21.9,69.6,53.5,91.5,91.5L195,397L-21.5,272z"/>
                </defs>
                <clipPath id="SVGID_2_">
                    <use xlink:href="#SVGID_1_" style="overflow:visible;"/>
                </clipPath>
                <g id="fundingGraphic-group_1_" class="st1">
                    <circle id="fundingGraphic-outside4_1_" class="st2" cx="195" cy="397" r="250"/>
                    <path id="fundingGraphic-outside6_1_" transform="rotate(<?= 120 * $project['percent_funded'] - 57 ?>, 195, 397)" class="fundedBar st3" d="M333.4,608C217.3,683.7,61.8,651-14,534.9c-75.7-116.1-43-271.6,73.1-347.4     c36.9-24.1,79.5-38,123.5-40.4l15.2,24.5L186,196.8l10.2,201L333.4,608z"/>
                    <circle id="fundingGraphic-goal_1_" class="st4" cx="195" cy="397" r="200"/>
                </g>
            </g>
            <g id="fundingGraphic-group2_1_">
                <path id="fundingGraphic-line_1_" class="st3" d="M195,597v-90h2v90H195z"/>
                <circle id="fundingGraphic-center_1_" fill="<?= floor($project['percent_funded']) ? '#E0251C' : '#000000' ?>" class="centerCircle st5" cx="195" cy="397" r="110"/>
                <circle id="fundingGraphic-outside_1_" class="st6" cx="195" cy="397" r="200"/>
            </g>
        </g>
        <g id="Layer_3">
            <g>
                <path id="SVGID_x5F_3_x5F_" class="st7" d="M193,234.4c-2,0-4,0.1-6,0.2c-0.8,0-1.6,0.1-2.5,0.1c-3.1,0.2-6.3,0.5-9.4,0.9    c-0.6,0.1-1.1,0.2-1.7,0.2c-2.6,0.4-5.2,0.8-7.8,1.3c-1,0.2-2,0.4-3,0.6c-2.3,0.5-4.6,1-6.9,1.6c-0.9,0.2-1.8,0.4-2.7,0.7    c-3.1,0.8-6.2,1.7-9.2,2.8c-0.4,0.1-0.7,0.3-1.1,0.4c-2.7,0.9-5.4,1.9-8.1,3c-1,0.4-1.9,0.8-2.9,1.2c-2.2,0.9-4.4,1.9-6.5,2.9    c-0.9,0.4-1.8,0.9-2.7,1.3c-3,1.5-5.9,3-8.8,4.7c0,0,0,0-0.1,0c-26.1,15.1-45,33.9-60.1,60c0,0,0,0,0,0    c-7.1,12.3-12.4,25.1-16,38.1c-0.7,2.6-1.4,5.2-2,7.9c-2,8.9-3.2,17.8-3.7,26.7c-2.2,38.7,9.5,77.3,33,108.4    c1.6,2.1,3.3,4.2,5,6.3c3.4,4.1,7.1,8.1,11,11.9c9.7,9.5,20.7,17.9,32.9,25c7.5,4.3,15,8,22.6,11c4,1.6,7.9,3,11.9,4.2    c3.3,1,6.7,1.9,10.1,2.7c3.4,0.8,6.8,1.5,10.3,2c7.8,1.2,15.9,1.9,24.3,2V234.4"/>
                <text>      <textPath text-anchor="middle" xlink:href="#SVGID_x5F_3_x5F_" startOffset="41%" style="
                                      ">
                        <tspan class="st4" style="font-family:'Roboto'; font-size:37.7202px;"><?= $project['shares'] ?></tspan><tspan class="st4" style="font-family:'Roboto'; font-size:37.7202px;"> Shares</tspan>     </textPath>
                </text>
            </g>
            <g>
                <path id="SVGID_x5F_4_x5F_" class="st7" d="M192.1,562.6c2,0,4-0.1,6-0.2c0.8,0,1.6-0.1,2.5-0.1c3.1-0.2,6.3-0.5,9.4-0.9    c0.6-0.1,1.1-0.2,1.7-0.2c2.6-0.4,5.2-0.8,7.8-1.3c1-0.2,2-0.4,3-0.6c2.3-0.5,4.6-1,6.9-1.6c0.9-0.2,1.8-0.4,2.7-0.7    c3.1-0.8,6.2-1.7,9.2-2.8c0.4-0.1,0.7-0.3,1.1-0.4c2.7-0.9,5.4-1.9,8.1-3c1-0.4,1.9-0.8,2.9-1.2c2.2-0.9,4.4-1.9,6.5-2.9    c0.9-0.4,1.8-0.9,2.7-1.3c3-1.5,5.9-3,8.8-4.7c0,0,0,0,0.1,0c26.1-15.1,45-33.9,60.1-60c0,0,0,0,0,0c7.1-12.3,12.4-25.1,16-38.1    c0.7-2.6,1.4-5.2,2-7.9c2-8.9,3.2-17.8,3.7-26.7c2.2-38.7-9.5-77.3-33-108.4c-1.6-2.1-3.3-4.2-5-6.3c-3.4-4.1-7.1-8.1-11-11.9    c-9.7-9.5-20.7-17.9-32.9-25c-7.5-4.3-15-8-22.6-11c-4-1.6-7.9-3-11.9-4.2c-3.3-1-6.7-1.9-10.1-2.7c-3.4-0.8-6.8-1.5-10.3-2    c-7.8-1.2-15.9-1.9-24.3-2V562.6"/>
                <text>      <textPath text-anchor="middle" xlink:href="#SVGID_x5F_4_x5F_" startOffset="20%">
                        <tspan class="st4" style="font-family:'Roboto'; font-size:37.7202px;"><?= $project['actions'] ?></tspan><tspan class="st4" style="font-family:'Roboto'; font-size:37.7202px;"> Actions</tspan>     </textPath>
                </text>
            </g>
            <g>
                <path id="SVGID_x5F_5_x5F_" class="st7" d="M333.6,398.9h-282c0.1-7.2,0.7-14.1,1.7-20.9c0.5-3,1.1-5.9,1.7-8.9    c0.7-2.9,1.4-5.8,2.3-8.7c1.1-3.4,2.3-6.9,3.6-10.3c2.6-6.5,5.7-12.9,9.4-19.4c6.1-10.5,13.3-20,21.5-28.3    c3.3-3.3,6.7-6.5,10.2-9.4c1.8-1.5,3.6-2.9,5.4-4.3c26.7-20.2,59.9-30.2,93.1-28.3c7.7,0.4,15.4,1.5,23,3.2    c2.3,0.5,4.5,1.1,6.7,1.7c11.2,3.1,22.2,7.7,32.7,13.8c0,0,0,0,0,0c22.4,13,38.6,29.1,51.6,51.6c0,0,0,0,0,0c1.4,2.5,2.8,5,4,7.5    c0.4,0.8,0.8,1.6,1.1,2.3c0.9,1.9,1.7,3.7,2.5,5.6c0.3,0.8,0.7,1.6,1,2.5c0.9,2.3,1.8,4.6,2.6,6.9c0.1,0.3,0.2,0.6,0.3,0.9    c0.9,2.6,1.7,5.3,2.4,7.9c0.2,0.8,0.4,1.6,0.6,2.3c0.5,2,0.9,3.9,1.4,5.9c0.2,0.9,0.4,1.7,0.5,2.6c0.4,2.2,0.8,4.5,1.1,6.7    c0.1,0.5,0.2,1,0.2,1.4c0.3,2.7,0.6,5.4,0.8,8.1c0,0.7,0.1,1.4,0.1,2.1C333.5,395.5,333.5,397.2,333.6,398.9"/>
                <text>      <textPath text-anchor="middle" xlink:href="#SVGID_x5F_5_x5F_" startOffset="70%">
                        <? setlocale(LC_MONETARY, 'en_US'); ?>
                        <tspan style="fill:#808080; font-family:'Roboto'; font-size:37.7202px;"><?= money_format('%.0n', $project['goal']) ?> Goal</tspan></textPath>
                </text>
            </g>
            <text text-anchor="middle" x="75" y="-5" transform="matrix(1 0 0 1 117.6489 437.7905)" class="st4 st8 st9 st10"><?= round($project['percent_funded'] * 100) ?><tspan baseline-shift="50%" style="font-size:52px;">%</tspan></text>
            <!-- <text transform="matrix(0.583 0 0 0.583 229.8574 399.7138)" class="st4 st8 st11 st12">%</text> -->
        </g>
    </svg>
</div>