pmc_in_script_time_5440=new Date()*1;function get_img(D,C){var A,G=__CONF__.img_url+"/img_new/{0}--{1}-{2}-{3}",E=__CONF__.img_url+"/img_src/{0}",B="d96a3fdeaf68d3e8db170ad5",F="43e2e6f41e3b3ebe22aa6560",H="726a17bd880cff1fb375718c",I="6ea1ff46aab3a42c975dd7ab";D=D||"0";C=C||{};ObjectH.mix(C,{type:"head",w:30,h:30,sex:1,imtype:1});if(D!="0"){if(C.type=="src"){A=E.format(D);}else{A=G.format(D,C.w,C.h,C.imtype);}}else{if(C.type=="head"){if(C.sex==1){A=G.format(B,C.w,C.h,C.imtype);}else{A=G.format(F,C.w,C.h,C.imtype);}}else{if(C.type=="subject"){A=G.format(H,C.w,C.h,C.imtype);}else{if(C.type=="place"){A=G.format(I,C.w,C.h,C.imtype);}else{A=G.format("0",C.w,C.h,C.imtype);}}}}return A;}function get_src_img(A){return __CONF__.img_url+"/img_src/"+A;}pmc_exec_time_5440=new Date()*1-pmc_in_script_time_5440;