<?php
function n_f($number, $precision = 1) {
    static $suffixes = null;

if ($suffixes === null) {
    $suffixes = [
        '', 'k', 'm', 'b', 't', 'q', 'u', 'x', 'y', 'h', 's', 'd', 'v', 'w', 'r', 'g', 
        'n', 'c', 'p', 'o', 'z', 'vi', 'un', 'du', 'tr', 'qu', 'qi', 'se', 'sp', 'oc', 
        'nv', 'tn', 'ut', 'dt', 'aa', 'ab', 'ac', 'ad', 'ae', 'af', 'ah', 'ai', 'aj', 'ak',
        'al', 'am', 'an', 'ao', 'ap', 'aq','ar', 'as', 'at', 
        'au', 'av', 'aw', 'ax', 'ay','az', 'ba',
        'bb', 'bc', 'bd', 'be', 'bf', 'bg', 'bh', 'bi', 'bj', 'bk', 'bl', 'bm',
        'bn', 'bo', 'bp', 'bq', 'br', 'bs', 'bt', 'bu', 'bv', 'bw', 'bx', 'by', 'bz', 'ca',
        'cb', 'cd', 'ce', 'cf', 'cg', 'ch', 'ci', 'cj', 'ck', 'cl', 'cm', 'cn', 'co', 'cp','cq', 'cr', 
        'cs','ct','cu','cv','cw','cx','cy','cz','da','db','dc','dd',    
        'de','df','dg','dh','di','dj','dk','dl','dm','dn','do','dp','dq','dr','ds',
        'dt','du','dv','dw','dx','dy','dz','ea','eb',
        'ec','ed','ee','ef','eg','eh','ei','ej','ek','el','em','en','eo','ep','eq',
        'er','es','et','eu','ev','ew','ex','ey','ez',
        'fa','fb','fc','fd','fe','ff','fg','fh','fi','fj','fk','fl','fm','fn','fo','fp','fq',
        'fr','fs','ft','fu','fv','fw','fx','fy','fz',
        'ga','gb','gc','gd','ge','gf','gg','gh','gi','gj','gk','gl','gm','gn','go','gp','gq',
        'gr','gs','gt','gu','gv','gw','gx','gy','gz',
        'ha','hb','hc','hd','he','hf','hg','hh','hi','hj','hk','hl','hm','hn','ho','hp','hq',
        'hr','hs','ht','hu','hv','hw','hx','hy','hz',
        'ia','ib','ic','id','ie','if','ig','ih','ii','ij','ik','il','im','in','io','ip','iq',
        'ir','is','it','iu','iv','iw','ix','iy','iz',

        // Продолжение:
        'ja','jb','jc','jd','je','jf','jg','jh','ji','jj','jk','jl','jm','jn','jo','jp','jq',
        'jr','js','jt','ju','jv','jw','jx','jy','jz',
        'ka','kb','kc','kd','ke','kf','kg','kh','ki','kj','kk','kl','km','kn','ko','kp','kq',
        'kr','ks','kt','ku','kv','kw','kx','ky','kz',
        'la','lb','lc','ld','le','lf','lg','lh','li','lj','lk','ll','lm','ln','lo','lp','lq',
        'lr','ls','lt','lu','lv','lw','lx','ly','lz',
        'ma','mb','mc','md','me','mf','mg','mh','mi','mj','mk','ml','mm','mn','mo','mp','mq',
        'mr','ms','mt','mu','mv','mw','mx','my','mz',
        'na','nb','nc','nd','ne','nf','ng','nh','ni','nj','nk','nl','nm','nn','no','np','nq',
        'nr','ns','nt','nu','nv','nw','nx','ny','nz',
        'oa','ob','oc','od','oe','of','og','oh','oi','oj','ok','ol','om','on','oo','op','oq',
        'or','os','ot','ou','ov','ow','ox','oy','oz',
        'pa','pb','pc','pd','pe','pf','pg','ph','pi','pj','pk','pl','pm','pn','po','pp','pq',
        'pr','ps','pt','pu','pv','pw','px','py','pz',
        'qa','qb','qc','qd','qe','qf','qg','qh','qi','qj','qk','ql','qm','qn','qo','qp','qq',
        'qr','qs','qt','qu','qv','qw','qx','qy','qz',
        'ra','rb','rc','rd','re','rf','rg','rh','ri','rj','rk','rl','rm','rn','ro','rp','rq',
        'rr','rs','rt','ru','rv','rw','rx','ry','rz',
        'sa','sb','sc','sd','se','sf','sg','sh','si','sj','sk','sl','sm','sn','so','sp','sq',
        'sr','ss','st','su','sv','sw','sx','sy','sz',
        'ta','tb','tc','td','te','tf','tg','th','ti','tj','tk','tl','tm','tn','to','tp','tq',
        'tr','ts','tt','tu','tv','tw','tx','ty','tz',
        'ua','ub','uc','ud','ue','uf','ug','uh','ui','uj','uk','ul','um','un','uo','up','uq',
        'ur','us','ut','uu','uv','uw','ux','uy','uz',
        'va','vb','vc','vd','ve','vf','vg','vh','vi','vj','vk','vl','vm','vn','vo','vp','vq',
        'vr','vs','vt','vu','vv','vw','vx','vy','vz',
        'wa','wb','wc','wd','we','wf','wg','wh','wi','wj','wk','wl','wm','wn','wo','wp','wq',
        'wr','ws','wt','wu','wv','ww','wx','wy','wz',
        'xa','xb','xc','xd','xe','xf','xg','xh','xi','xj','xk','xl','xm','xn','xo','xp','xq',
        'xr','xs','xt','xu','xv','xw','xx','xy','xz',
        'ya','yb','yc','yd','ye','yf','yg','yh','yi','yj','yk','yl','ym','yn','yo','yp','yq',
        'yr','ys','yt','yu','yv','yw','yx','yy','yz',
        'za','zb','zc','zd','ze','zf','zg','zh','zi','zj','zk','zl','zm','zn','zo','zp','zq',
        'zr','zs','zt','zu','zv','zw','zx','zy','zz'
    ];
}



    // Обработка научной записи
    if (stripos((string)$number, 'e') !== false) {
        $number = scientificToDecimal($number);
    }

    // Проверка и преобразование отрицательного числа
    $is_negative = bccomp($number, '0') < 0;
    $abs_number = $is_negative ? bcmul($number, '-1') : $number;

    $power = 0;
    $max_power = count($suffixes) - 1;

    // Быстрое деление через float если число небольшое
    if (bccomp($abs_number, '1e20') < 0) {
        $float = (float)$abs_number;
        while ($float >= 1000 && $power < $max_power) {
            $float /= 1000;
            $power++;
        }
        $rounded = $power == 0 ? floor($float) : round($float, $precision);
    } else {
        // Для больших чисел — через bcdiv
        while (bccomp($abs_number, '1000') >= 0 && $power < $max_power) {
            $abs_number = bcdiv($abs_number, '1000', 10);
            $power++;
        }
        $rounded = $power == 0 ? bcmul($abs_number, '1', 0) : rtrim(rtrim(bcadd($abs_number, '0', $precision), '0'), '.');
    }

    if ($is_negative) {
        $rounded = '-' . $rounded;
    }

    return $power == 0 ? $rounded : $rounded . $suffixes[$power];
}

function scientificToDecimal($sci) {
    if (stripos($sci, 'e') === false) return $sci;

    $parts = preg_split('/e/i', $sci);
    $base = $parts[0];
    $exp = (int)$parts[1];

    if (strpos($base, '.') !== false) {
        list($int, $dec) = explode('.', $base);
    } else {
        $int = $base;
        $dec = '';
    }

    $number = $int . $dec;
    $exp -= strlen($dec);

    if ($exp >= 0) {
        return $number . str_repeat('0', $exp);
    } else {
        $pos = strlen($number) + $exp;
        if ($pos <= 0) {
            return '0.' . str_repeat('0', abs($pos)) . $number;
        } else {
            return substr($number, 0, $pos) . '.' . substr($number, $pos);
        }
    }
}
?>
