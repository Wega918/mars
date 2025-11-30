<?php
require_once ('../system/function.php');
if(!$user['id']) {
header('Location: /');
exit();
}

$id = abs(intval($_GET['id']));
$fid = abs(intval($_GET['fid']));
if($id == 0){
header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
}


$r = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user`  = '".$user['id']."' and `id`  = '".$id."' ")); 


$cost_level_0 = (9+($r['level'])*($r['level'])- ((($r['level'])*($r['level']))/2) );
$cost_level_1 = (9+($r['level']+1)*($r['level']+1)- ((($r['level']+1)*($r['level']+1))/2) );
$cost_level_2 = (9+($r['level']+2)*($r['level']+2)- ((($r['level']+2)*($r['level']+2))/2) );
$cost_level_3 = (9+($r['level']+3)*($r['level']+3)- ((($r['level']+3)*($r['level']+3))/2) );
$cost_level_4 = (9+($r['level']+4)*($r['level']+4)- ((($r['level']+4)*($r['level']+4))/2) );
$cost_level_5 = (9+($r['level']+5)*($r['level']+5)- ((($r['level']+5)*($r['level']+5))/2) );
$cost_level_6 = (9+($r['level']+6)*($r['level']+6)- ((($r['level']+6)*($r['level']+6))/2) );
$cost_level_7 = (9+($r['level']+7)*($r['level']+7)- ((($r['level']+7)*($r['level']+7))/2) );
$cost_level_8 = (9+($r['level']+8)*($r['level']+8)- ((($r['level']+8)*($r['level']+8))/2) );
$cost_level_9 = (9+($r['level']+9)*($r['level']+9)- ((($r['level']+9)*($r['level']+9))/2) );
$cost_level_10 = (9+($r['level']+10)*($r['level']+10)- ((($r['level']+10)*($r['level']+10))/2) );
$cost_level_11 = (9+($r['level']+11)*($r['level']+11)- ((($r['level']+11)*($r['level']+11))/2) );
$cost_level_12 = (9+($r['level']+12)*($r['level']+12)- ((($r['level']+12)*($r['level']+12))/2) );
$cost_level_13 = (9+($r['level']+13)*($r['level']+13)- ((($r['level']+13)*($r['level']+13))/2) );
$cost_level_14 = (9+($r['level']+14)*($r['level']+14)- ((($r['level']+14)*($r['level']+14))/2) );
$cost_level_15 = (9+($r['level']+15)*($r['level']+15)- ((($r['level']+15)*($r['level']+15))/2) );
$cost_level_16 = (9+($r['level']+16)*($r['level']+16)- ((($r['level']+16)*($r['level']+16))/2) );
$cost_level_17 = (9+($r['level']+17)*($r['level']+17)- ((($r['level']+17)*($r['level']+17))/2) );
$cost_level_18 = (9+($r['level']+18)*($r['level']+18)- ((($r['level']+18)*($r['level']+18))/2) );
$cost_level_19 = (9+($r['level']+19)*($r['level']+19)- ((($r['level']+19)*($r['level']+19))/2) );
$cost_level_20 = (9+($r['level']+20)*($r['level']+20)- ((($r['level']+20)*($r['level']+20))/2) );
$cost_level_21 = (9+($r['level']+21)*($r['level']+21)- ((($r['level']+21)*($r['level']+21))/2) );
$cost_level_22 = (9+($r['level']+22)*($r['level']+22)- ((($r['level']+22)*($r['level']+22))/2) );
$cost_level_23 = (9+($r['level']+23)*($r['level']+23)- ((($r['level']+23)*($r['level']+23))/2) );
$cost_level_24 = (9+($r['level']+24)*($r['level']+24)- ((($r['level']+24)*($r['level']+24))/2) );
$cost_level_25 = (9+($r['level']+25)*($r['level']+25)- ((($r['level']+25)*($r['level']+25))/2) );
$cost_level_26 = (9+($r['level']+26)*($r['level']+26)- ((($r['level']+26)*($r['level']+26))/2) );
$cost_level_27 = (9+($r['level']+27)*($r['level']+27)- ((($r['level']+27)*($r['level']+27))/2) );
$cost_level_28 = (9+($r['level']+28)*($r['level']+28)- ((($r['level']+28)*($r['level']+28))/2) );
$cost_level_29 = (9+($r['level']+29)*($r['level']+29)- ((($r['level']+29)*($r['level']+29))/2) );
$cost_level_30 = (9+($r['level']+30)*($r['level']+30)- ((($r['level']+30)*($r['level']+30))/2) );
$cost_level_31 = (9+($r['level']+31)*($r['level']+31)- ((($r['level']+31)*($r['level']+31))/2) );
$cost_level_32 = (9+($r['level']+32)*($r['level']+32)- ((($r['level']+32)*($r['level']+32))/2) );
$cost_level_33 = (9+($r['level']+33)*($r['level']+33)- ((($r['level']+33)*($r['level']+33))/2) );
$cost_level_34 = (9+($r['level']+34)*($r['level']+34)- ((($r['level']+34)*($r['level']+34))/2) );
$cost_level_35 = (9+($r['level']+35)*($r['level']+35)- ((($r['level']+35)*($r['level']+35))/2) );
$cost_level_36 = (9+($r['level']+36)*($r['level']+36)- ((($r['level']+36)*($r['level']+36))/2) );
$cost_level_37 = (9+($r['level']+37)*($r['level']+37)- ((($r['level']+37)*($r['level']+37))/2) );
$cost_level_38 = (9+($r['level']+38)*($r['level']+38)- ((($r['level']+38)*($r['level']+38))/2) );
$cost_level_39 = (9+($r['level']+39)*($r['level']+39)- ((($r['level']+39)*($r['level']+39))/2) );
$cost_level_40 = (9+($r['level']+40)*($r['level']+40)- ((($r['level']+40)*($r['level']+40))/2) );
$cost_level_41 = (9+($r['level']+41)*($r['level']+41)- ((($r['level']+41)*($r['level']+41))/2) );
$cost_level_42 = (9+($r['level']+42)*($r['level']+42)- ((($r['level']+42)*($r['level']+42))/2) );
$cost_level_43 = (9+($r['level']+43)*($r['level']+43)- ((($r['level']+43)*($r['level']+43))/2) );
$cost_level_44 = (9+($r['level']+44)*($r['level']+44)- ((($r['level']+44)*($r['level']+44))/2) );
$cost_level_45 = (9+($r['level']+45)*($r['level']+45)- ((($r['level']+45)*($r['level']+45))/2) );
$cost_level_46 = (9+($r['level']+46)*($r['level']+46)- ((($r['level']+46)*($r['level']+46))/2) );
$cost_level_47 = (9+($r['level']+47)*($r['level']+47)- ((($r['level']+47)*($r['level']+47))/2) );
$cost_level_48 = (9+($r['level']+48)*($r['level']+48)- ((($r['level']+48)*($r['level']+48))/2) );
$cost_level_49 = (9+($r['level']+49)*($r['level']+49)- ((($r['level']+49)*($r['level']+49))/2) );
$cost_level_50 = (9+($r['level']+50)*($r['level']+50)- ((($r['level']+50)*($r['level']+50))/2) );
$cost_level_51 = (9+($r['level']+51)*($r['level']+51)- ((($r['level']+51)*($r['level']+51))/2) );
$cost_level_52 = (9+($r['level']+52)*($r['level']+52)- ((($r['level']+52)*($r['level']+52))/2) );
$cost_level_53 = (9+($r['level']+53)*($r['level']+53)- ((($r['level']+53)*($r['level']+53))/2) );
$cost_level_54 = (9+($r['level']+54)*($r['level']+54)- ((($r['level']+54)*($r['level']+54))/2) );
$cost_level_55 = (9+($r['level']+55)*($r['level']+55)- ((($r['level']+55)*($r['level']+55))/2) );
$cost_level_56 = (9+($r['level']+56)*($r['level']+56)- ((($r['level']+56)*($r['level']+56))/2) );
$cost_level_57 = (9+($r['level']+57)*($r['level']+57)- ((($r['level']+57)*($r['level']+57))/2) );
$cost_level_58 = (9+($r['level']+58)*($r['level']+58)- ((($r['level']+58)*($r['level']+58))/2) );
$cost_level_59 = (9+($r['level']+59)*($r['level']+59)- ((($r['level']+59)*($r['level']+59))/2) );
$cost_level_60 = (9+($r['level']+60)*($r['level']+60)- ((($r['level']+60)*($r['level']+60))/2) );
$cost_level_61 = (9+($r['level']+61)*($r['level']+61)- ((($r['level']+61)*($r['level']+61))/2) );
$cost_level_62 = (9+($r['level']+62)*($r['level']+62)- ((($r['level']+62)*($r['level']+62))/2) );
$cost_level_63 = (9+($r['level']+63)*($r['level']+63)- ((($r['level']+63)*($r['level']+63))/2) );
$cost_level_64 = (9+($r['level']+64)*($r['level']+64)- ((($r['level']+64)*($r['level']+64))/2) );
$cost_level_65 = (9+($r['level']+65)*($r['level']+65)- ((($r['level']+65)*($r['level']+65))/2) );
$cost_level_66 = (9+($r['level']+66)*($r['level']+66)- ((($r['level']+66)*($r['level']+66))/2) );
$cost_level_67 = (9+($r['level']+67)*($r['level']+67)- ((($r['level']+67)*($r['level']+67))/2) );
$cost_level_68 = (9+($r['level']+68)*($r['level']+68)- ((($r['level']+68)*($r['level']+68))/2) );
$cost_level_69 = (9+($r['level']+69)*($r['level']+69)- ((($r['level']+69)*($r['level']+69))/2) );
$cost_level_70 = (9+($r['level']+70)*($r['level']+70)- ((($r['level']+70)*($r['level']+70))/2) );
$cost_level_71 = (9+($r['level']+71)*($r['level']+71)- ((($r['level']+71)*($r['level']+71))/2) );
$cost_level_72 = (9+($r['level']+72)*($r['level']+72)- ((($r['level']+72)*($r['level']+72))/2) );
$cost_level_73 = (9+($r['level']+73)*($r['level']+73)- ((($r['level']+73)*($r['level']+73))/2) );
$cost_level_74 = (9+($r['level']+74)*($r['level']+74)- ((($r['level']+74)*($r['level']+74))/2) );
$cost_level_75 = (9+($r['level']+75)*($r['level']+75)- ((($r['level']+75)*($r['level']+75))/2) );
$cost_level_76 = (9+($r['level']+76)*($r['level']+76)- ((($r['level']+76)*($r['level']+76))/2) );
$cost_level_77 = (9+($r['level']+77)*($r['level']+77)- ((($r['level']+77)*($r['level']+77))/2) );
$cost_level_78 = (9+($r['level']+78)*($r['level']+78)- ((($r['level']+78)*($r['level']+78))/2) );
$cost_level_79 = (9+($r['level']+79)*($r['level']+79)- ((($r['level']+79)*($r['level']+79))/2) );
$cost_level_80 = (9+($r['level']+80)*($r['level']+80)- ((($r['level']+80)*($r['level']+80))/2) );
$cost_level_81 = (9+($r['level']+81)*($r['level']+81)- ((($r['level']+81)*($r['level']+81))/2) );
$cost_level_82 = (9+($r['level']+82)*($r['level']+82)- ((($r['level']+82)*($r['level']+82))/2) );
$cost_level_83 = (9+($r['level']+83)*($r['level']+83)- ((($r['level']+83)*($r['level']+83))/2) );
$cost_level_84 = (9+($r['level']+84)*($r['level']+84)- ((($r['level']+84)*($r['level']+84))/2) );
$cost_level_85 = (9+($r['level']+85)*($r['level']+85)- ((($r['level']+85)*($r['level']+85))/2) );
$cost_level_86 = (9+($r['level']+86)*($r['level']+87)- ((($r['level']+87)*($r['level']+87))/2) );
$cost_level_87 = (9+($r['level']+87)*($r['level']+87)- ((($r['level']+87)*($r['level']+87))/2) );
$cost_level_88 = (9+($r['level']+88)*($r['level']+88)- ((($r['level']+88)*($r['level']+88))/2) );
$cost_level_89 = (9+($r['level']+89)*($r['level']+89)- ((($r['level']+89)*($r['level']+89))/2) );
$cost_level_90 = (9+($r['level']+90)*($r['level']+90)- ((($r['level']+90)*($r['level']+90))/2) );
$cost_level_91 = (9+($r['level']+91)*($r['level']+91)- ((($r['level']+91)*($r['level']+91))/2) );
$cost_level_92 = (9+($r['level']+92)*($r['level']+92)- ((($r['level']+92)*($r['level']+92))/2) );
$cost_level_93 = (9+($r['level']+93)*($r['level']+93)- ((($r['level']+93)*($r['level']+93))/2) );
$cost_level_94 = (9+($r['level']+94)*($r['level']+94)- ((($r['level']+94)*($r['level']+94))/2) );
$cost_level_95 = (9+($r['level']+95)*($r['level']+95)- ((($r['level']+95)*($r['level']+95))/2) );
$cost_level_96 = (9+($r['level']+96)*($r['level']+96)- ((($r['level']+96)*($r['level']+96))/2) );
$cost_level_97 = (9+($r['level']+97)*($r['level']+97)- ((($r['level']+97)*($r['level']+97))/2) );
$cost_level_98 = (9+($r['level']+98)*($r['level']+98)- ((($r['level']+98)*($r['level']+98))/2) );
$cost_level_99 = (9+($r['level']+99)*($r['level']+99)- ((($r['level']+99)*($r['level']+99))/2) );
$cost_level_100 = (9+($r['level']+100)*($r['level']+100)- ((($r['level']+100)*($r['level']+100))/2) );
$cost_level_ = $cost_level_0+$cost_level_1+$cost_level_2+$cost_level_3+$cost_level_4+$cost_level_5+$cost_level_6+$cost_level_7+$cost_level_8+$cost_level_9+$cost_level_10+$cost_level_11+$cost_level_12+$cost_level_13+$cost_level_14+$cost_level_15+$cost_level_16+$cost_level_17+$cost_level_18+$cost_level_19+$cost_level_20+$cost_level_21+$cost_level_22+$cost_level_23+$cost_level_24+$cost_level_25+$cost_level_26+$cost_level_27+$cost_level_28+$cost_level_29+$cost_level_30+$cost_level_31+$cost_level_32+$cost_level_33+$cost_level_34+$cost_level_35+$cost_level_36+$cost_level_37+$cost_level_38+$cost_level_39+$cost_level_40+$cost_level_41+$cost_level_42+$cost_level_43+$cost_level_44+$cost_level_45+$cost_level_46+$cost_level_47+$cost_level_48+$cost_level_49+$cost_level_50+$cost_level_51+$cost_level_52+$cost_level_53+$cost_level_54+$cost_level_55+$cost_level_56+$cost_level_57+$cost_level_58+$cost_level_59+$cost_level_60+$cost_level_61+$cost_level_62+$cost_level_63+$cost_level_64+$cost_level_65+$cost_level_66+$cost_level_67+$cost_level_68+$cost_level_69+$cost_level_70+$cost_level_71+$cost_level_72+$cost_level_73+$cost_level_74+$cost_level_75+$cost_level_76+$cost_level_77+$cost_level_78+$cost_level_79+$cost_level_80+$cost_level_81+$cost_level_82+$cost_level_83+$cost_level_84+$cost_level_85+$cost_level_86+$cost_level_87+$cost_level_88+$cost_level_89+$cost_level_90+$cost_level_91+$cost_level_92+$cost_level_93+$cost_level_94+$cost_level_95+$cost_level_96+$cost_level_97+$cost_level_98+$cost_level_99+$cost_level_100;
$cost_level = ceil($cost_level_);

if(($r['level']+100) > 10000){
header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
}
if($r['level'] == 9901){
header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
}
if($user['leaf'] < $cost_level){
$_SESSION['err'] = 'Вам не хватает <span><img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.n_f($cost_level-$user['leaf']).'</span></span><div></div>';
header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
}

mysql_query("UPDATE `garden_plant_user` SET `level` = '".($r['level']+100)."' WHERE `id` = '".$r['id']."' ");
mysql_query("UPDATE `users` SET `leaf` = '".($user['leaf']-$cost_level)."'  WHERE `id` = '".$user['id']."' ");

header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
?> 