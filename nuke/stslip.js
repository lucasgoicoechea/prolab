/*=======Ver: 6.2.51011========*/
function stslsh(p,k){if(!STM_SLIP) return 1;if(typeof(p.ftid)=="undefined") p.ftid=0;else 	clearTimeout(p.ftid);	var m=st_ms[p.mid];var xd=p.dir&3,yd=(p.dir&12)/4;if(p.isSt||!p.effsl) return 1;	var d=Math.floor(.2*p.efsp);if(!k) {stgPxy(p,1);var k=0;}	with(p){var l=_shell;		if(effsl==2){if(!exed){l.style.clip='rect(0px '+_rc[2]+'px '+_rc[3]+'px 0px)';l.style.visibility="hidden";} return 1;}if(yd==3||!yd){if(!k){l.style.visibility='visible';	l.style.left=_rc[0]+"px";if(!exed)if(yd)k=(_rc[3]-stgclip(l.style.clip)[0])/d+1;else k=(stgclip(l.style.clip)[2]-stre)/d+1;}if(_rc[3]-stre>d*k){if(yd){l.style.top=_rc[1]-_rc[3]+stre+d*k+"px";l.style.clip='rect('+(_rc[3]-d*k)+'px '+_rc[2]+'px '+_rc[3]+'px 0px)';}else{l.style.top=_rc[1]+_rc[3]-stre-d*k+"px";l.style.clip='rect(0px '+_rc[2]+'px '+(d*k+stre)+'px 0px)';}p.ftid=setTimeout('stslsh(st_ms['+mid+'].ps['+id+'],'+(++k)+')',10);exed=0;isSh=1;	}else{l.style.top=_rc[1]+"px";l.style.clip='rect(0px '+_rc[2]+'px '+_rc[3]+'px 0px)';exed=1;if(!m.hdp) lock=1;if(!stusrE(1,p,m)) return 0;}}else if(xd==3||!xd){			if(!k){l.style.visibility='visible';l.style.top=_rc[1]+"px";if(!exed)if(xd)k=(_rc[2]-stgclip(l.style.clip)[3])/d+1;else k=(stgclip(l.style.clip)[1]-stre)/d+1;}if((_rc[2]-stre)>d*k){	if(xd){l.style.left=_rc[0]-_rc[2]+stre+d*k+"px";l.style.clip='rect(0px '+_rc[2]+'px '+_rc[3]+'px '+(_rc[2]-d*k)+'px)';}else{l.style.left=_rc[0]+_rc[2]-stre-d*k+"px";l.style.clip='rect(0px '+(d*k+stre)+'px '+_rc[3]+'px 0px)';}p.ftid=setTimeout('stslsh(st_ms['+mid+'].ps['+id+'],'+(++k)+')',10);isSh=1;		exed=0;	}else 	{l.style.left=_rc[0]+"px";l.style.clip='rect(0px '+_rc[2]+'px '+_rc[3]+'px 0px)';exed=1;if(!m.hdp) lock=1;if(!stusrE(1,p,m)) return 0;				}}}return 0;}
function stslhd(p,k){	if(!STM_SLIP) return 1;if(typeof(p.ftid)=="undefined") p.ftid=0;	else clearTimeout(p.ftid);var m=st_ms[p.mid];var xd=p.dir&3,yd=(p.dir&12)/4;	if(p.isSt||!p.effsl) return 1;var d=Math.floor(.2*p.efsp);if(!k) {stgPxy(p,1);var k=0;}	with(p){var l=_shell;		if(effsl==1)return 1;if(yd==3||!yd){if(!k){	if(parI) stcIt(parI,parI.oust);l.style.left=_rc[0]+"px";if(!exed)if(yd)k=(stgclip(l.style.clip)[0]-stre)/d+1;else k=(_rc[3]-stgclip(l.style.clip)[2])/d+1;}if(_rc[3]-stre>d*k){	if(yd){l.style.top=_rc[1]-d*k+"px";l.style.clip='rect('+(d*k+stre)+'px '+_rc[2]+'px '+_rc[3]+'px 0px)';}else{l.style.top=_rc[1]+d*k+"px";l.style.clip='rect(0px '+_rc[2]+'px '+(_rc[3]-d*k)+'px 0px)';}p.ftid=setTimeout('stslhd(st_ms['+mid+'].ps['+id+'],'+(++k)+')',10);exed=0;}else{				l.style.visibility='hidden';l.style.top=_rc[1]+"px";l.style.clip='rect(0px '+_rc[2]+'px '+_rc[3]+'px 0px)';exed=1;isSh=0;if(!stusrE(3,p,m)) return 0;}}else if(xd==3||!xd){if(!k){if(parI) stcIt(parI,parI.oust);l.style.top=_rc[1]+"px";if(!exed)if(xd)k=(stgclip(l.style.clip)[3]-stre)/d+1;else k=(_rc[2]-stgclip(l.style.clip)[1])/d+1;}if((_rc[2]-d*k-stre)>0){	if(xd){l.style.left=_rc[0]-d*k+"px";l.style.clip='rect(0px '+_rc[2]+'px '+_rc[3]+'px '+(d*k+stre)+'px)';}else{l.style.left=_rc[0]+d*k+"px";l.style.clip='rect(0px '+(_rc[2]-d*k)+'px '+_rc[3]+'px 0px)';}p.ftid=setTimeout('stslhd(st_ms['+mid+'].ps['+id+'],'+(++k)+')',10);exed=0;	}else 	{				l.style.visibility='hidden';l.style.left=_rc[0]+"px";l.style.clip='rect(0px '+_rc[2]+'px '+_rc[3]+'px 0px)';		exed=1;isSh=0;	if(!stusrE(3,p,m)) return 0;}}}return 0;}
function stgclip(cs){if(!cs) return [0,0,0,0];var t=cs.split(" ");t[0]=parseInt(t[0].substr(5));for(var j=1;j<t.length;j++)t[j]=parseInt(t[j]);return t;}
