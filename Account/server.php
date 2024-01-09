<?php

	include_once("/Applications/XAMPP/xamppfiles/htdocs/SickGamez/Account/colors.inc.php");
	include_once("/Applications/XAMPP/xamppfiles/htdocs/SickGamez/Account/Color.php");

	use Mexitek\PHPColors\Color;

	session_start();

	$username = "";
	$email = "";
	$errors = 0;
	$usernameError = "";
	$emailError = "";
	$passwordError = "";
	$confirmPasswordError = "";
	$passwordNotMatchingError = "";
	$usernameTakenError = "";
	$emailAlreadyUsedError = "";
	$wrongUserPassComb = "";
	$accountUsernameError = "";
	$userNonExistent = "";
	$usernameLink = "";
	$userProfileLabel = "";
	$userNotFound = "";
	$profileNotAccessible = "";
	$profileAndUserError = "";
	$userNotFoundLoggedIn = "";
	$bio = "";
	$id = "";
	$profileBioForOthers = "";
	$decryptedBioForOthers = "";
	$usernameCookie = "";
	$emailError = "";
	$emailDoesNotExist = "";
	$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

    $host = "127.0.0.1";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "users";
    
    $db = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    $TZQuery = "SET time_zone = ?;";
    $stmtTZ = mysqli_prepare($db, $TZQuery);
    mysqli_stmt_bind_param($stmtTZ, "s", $TZ);
    $TZ = "+3:00";
    mysqli_stmt_execute($stmtTZ);

	function fetchUserLastActivity($user_username, $db) {

		$query = "SELECT * FROM users WHERE username = ? ORDER BY lastActivity DESC LIMIT 1;";
		$stmt = $db->prepare($query);
		$username = $user_username;
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();

		foreach ($result as $row) {

			return $row['lastActivity'];

		}

	}

	function fetchUserChatHistory($fromUserId, $toUserId, $db) {

		$query = "SELECT * FROM messages INNER JOIN users ON messages.fromUserIdMessage = users.id WHERE (fromUserIdMessage = ? AND toUserIdMessage = ?) OR (fromUserIdMessage = ? AND toUserIdMessage = ?) ORDER BY dateAndTimeSentMessage ASC;";
		$stmt = $db->prepare($query);
		$fromUserId = $fromUserId;
		$toUserId = $toUserId;
		$stmt->bind_param("iiii", $fromUserId, $toUserId, $toUserId, $fromUserId);
		$stmt->execute();
		$result = $stmt->get_result();
		$userUsername = "";

		if ($result->num_rows >= 0) {

			while ($row = $result->fetch_assoc()) {

				$userUsername = getUserUsername($row['toUserIdMessage'], $db);

			}

		}

		$userQuery = "SELECT * FROM users WHERE id = ?;";
		$stmt = $db->prepare($userQuery);
		$stmt->bind_param("i", $toUserId);
		$stmt->execute();
		$userQueryResult = $stmt->get_result();

		if ($userQueryResult->num_rows >= 1) {

			while ($row = $userQueryResult->fetch_assoc()) {

				$userUsername = $row['username'];

			}

		}

		$toUserIdDB = "chat_title_with_" . $toUserId . "_2";

		$customUsernameStylingTextContent = "";

		$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
		$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
		$customUsernameStylingTextId = 2;
		$customUsernameStylingTextActiveStatus = 1;
		$stmt->bind_param("sii", $toUserId, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
		$stmt->execute();
		$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

		if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

			if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

				$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

				?>

					<style type="text/css">
						
						#<?php echo $toUserIdDB; ?> {

							color: <?php echo $customUsernameStylingTextContent; ?>;

						}

					</style>

				<?php

			}

		}

		$output = '<div class="chat_title_with_main_div"><p class="chat_title_with" id="chat_title_with_' . $toUserId . '">This is the beginning of your conversation with</p> <p class="chat_title_with_2" id="chat_title_with_' . $toUserId . '_2">' . $userUsername . '</p> <p class="chat_title_with_3" id="chat_title_with_' . $toUserId . '_3">!</p></div>';

		foreach ($result as $row) {

			$output .= '<div class="chat_div_container_for_each">';

			$userUsername = "";

			if ($row['fromUserIdMessage'] === $fromUserId) {

				if ($row['messageContent'] === "") {

					$messageImage = $row['messageImage'];
					$messageImagePath = "/Messages_images/" . $messageImage;

					$chatMessageId = $row['chatMessageId'];

					$dateAndTimeSent = $row['dateAndTimeSentMessage'];
					$formattedDateAndTimeSent = date("H:i, d/m/Y", strtotime($dateAndTimeSent));

					$userProfilePictureMessages = $row['profileImage'];
					$userProfilePictureMessagesPath = "/Profile_pictures/" . $userProfilePictureMessages;

					if ($userProfilePictureMessages == "") {

						$userProfilePictureMessagesPath = "Images/profile_image_placeholder.png";

					}

					$messageZoomedInCoverDiv = "zoomed_in_message_image_cover_div_" . $chatMessageId;

					$mostCommonColorObject = new GetMostCommonColors();

					$resultNumber = 5;
					$reduceBrightness = 1;
					$reduceGradients = 1;
					$delta = 30;
					$mostCommonColor = $mostCommonColorObject->Get_Color("/home/yv4nbnligki0/public_html/Messages_images/" . $messageImage, $resultNumber, $reduceBrightness, $reduceGradients, $delta);
					$mostCommonColorBackgroundColorHashtag = "#";
					$mostCommonColorBackgroundColor = "";
					$firstColor = "";
					$secondColor = "";
					$colorFactor = 0.5;

					$colorArrayCount = count($mostCommonColor);

					$mostCommonColorMinumumColorsArrayDark = array();
					$firstElementColorArrayDark = reset($mostCommonColorMinumumColorsArrayDark);
					$lastElementColorArrayDark = end($mostCommonColorMinumumColorsArrayDark);

					$mostCommonColorMinumumColorsArrayLight = array();
					$firstElementColorArrayLight = reset($mostCommonColorMinumumColorsArrayLight);
					$lastElementColorArrayLight = end($mostCommonColorMinumumColorsArrayLight);

					$darkColor = false;
					$lightColor = false;

					if ($colorArrayCount < 5) {

						foreach ($mostCommonColor as $hex => $count) {

							$singleMostCommonColorHex = $mostCommonColorBackgroundColorHashtag . $hex;

							$singleMostCommonColor = new Color($singleMostCommonColorHex);

							$singleMostCommonColorDark = $singleMostCommonColor->isDark();

							$singleMostCommonColorLight = $singleMostCommonColor->isLight();

							if ($singleMostCommonColorDark) {

								$darkColor = true;

								$singleMostCommonColorDarkLightened = $singleMostCommonColor->lighten();
								array_push($mostCommonColorMinumumColorsArrayDark, $singleMostCommonColorDarkLightened);

							} else if ($singleMostCommonColorLight) {

								$lightColor = true;

								$singleMostCommonColorLightDarkened = $singleMostCommonColor->darken();
								array_push($mostCommonColorMinumumColorsArrayLight, $singleMostCommonColorLightDarkened);

							}

						}

						if ($darkColor) {

							$firstElementColorArrayDark = reset($mostCommonColorMinumumColorsArrayDark);
							$lastElementColorArrayDark = end($mostCommonColorMinumumColorsArrayDark);

							?>

								<style type="text/css">
									
									#<?php echo $messageZoomedInCoverDiv; ?> {

										background-color: <?php echo colorAverage($firstElementColorArrayDark, $lastElementColorArrayDark, $colorFactor); ?>;

								    }

								</style>

							<?php

						} else if ($lightColor) {

							$firstElementColorArrayLight = reset($mostCommonColorMinumumColorsArrayLight);
							$lastElementColorArrayLight = end($mostCommonColorMinumumColorsArrayLight);

							?>

								<style type="text/css">
									
									#<?php echo $messageZoomedInCoverDiv; ?> {

										background-color: <?php echo colorAverage($firstElementColorArrayLight, $lastElementColorArrayLight, $colorFactor); ?>;

								    }

								</style>

							<?php

						}

					} else {

						foreach ($mostCommonColor as $hex => $count) {

							if ($hex === array_keys($mostCommonColor)[0]) {

								$firstColor = "#" . $hex;

							}

							if ($hex === array_keys($mostCommonColor)[4]) {

								$secondColor = "#" . $hex;

							}

							$mostCommonColorBackgroundColorHexCode = $mostCommonColorBackgroundColorHashtag . $mostCommonColorBackgroundColor;

						}

						?>

							<style type="text/css">
								
								#<?php echo $messageZoomedInCoverDiv; ?> {

									background-color: <?php echo colorAverage($firstColor, $secondColor, $colorFactor); ?>;

							    }

							</style>

						<?php

					}

					$output .= '<img src="Images/bin.png" class="delete_chat_bin_image" id="' . $row['chatMessageId'] . '" />';
					$output .= '<div class="chat_div_from_me">';
					$output .= '<img src="' . $userProfilePictureMessagesPath . '" class="profile_pic_display_chat_from_me" />';
					$output .= '<p class="chat_div_from_me_date_time">' . $formattedDateAndTimeSent . '</p>';
					$output .= '<div class="chat_div_from_me_message" id="chat_div_from_me_message_' . $chatMessageId . '">';
					$output .= '<img src="' . $messageImagePath . '" class="message_image" data-messageimageid="' . $chatMessageId . '" id="message_image_' . $chatMessageId . '" />';
					$output .= '</div>';
					$output .= '</div>';

					$chatDivMessageIDDB = "chat_div_from_me_message_" . $chatMessageId;
					$messageImageIDDB = "message_image_" . $chatMessageId;

					?>

						<style type="text/css">

							#<?php echo $chatDivMessageIDDB; ?> {

								margin-bottom: 2%;

							}

							#<?php echo $messageImageIDDB; ?> {

								position: relative;
								width: 45%;
								border-radius: 0.5vw;
								display: block;
								margin-left: 2%;
								margin-top: 6%;

							}

						</style>

					<?php

				} else {

					if ($row['messageImage'] === "") {

						$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

						$decryptedMessage = decrypt($row['messageContent'], $key);

						$chatMessageId = $row['chatMessageId'];

						$dateAndTimeSent = $row['dateAndTimeSentMessage'];
						$formattedDateAndTimeSent = date("H:i, d/m/Y", strtotime($dateAndTimeSent));

						$userProfilePictureMessages = $row['profileImage'];
						$userProfilePictureMessagesPath = "/Profile_pictures/" . $userProfilePictureMessages;

						if ($userProfilePictureMessages == "") {

							$userProfilePictureMessagesPath = "Images/profile_image_placeholder.png";

						}

						$output .= '<img src="Images/bin.png" class="delete_chat_bin_image" id="' . $row['chatMessageId'] . '" />';
						$output .= '<div class="chat_div_from_me">';
						$output .= '<img src="' . $userProfilePictureMessagesPath . '" class="profile_pic_display_chat_from_me" />';
						$output .= '<p class="chat_div_from_me_date_time">' . $formattedDateAndTimeSent . '</p>';
						$output .= '<div class="chat_div_from_me_message" id="chat_div_from_me_message_' . $chatMessageId . '">';
						$output .= '<p class="main_chat_message_content_from_me">' . $decryptedMessage . '</p>';
						$output .= '</div>';
						$output .= '</div>';

						$chatDivMessageIDDB = "chat_div_from_me_message_" . $chatMessageId;
						$messageImageIDDB = "message_image_" . $chatMessageId;

						?>

							<style type="text/css">

								#<?php echo $chatDivMessageIDDB; ?> {

									margin-bottom: 4%;

								}

							</style>

						<?php

					} else {

						$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

						$messageImage = $row['messageImage'];
						$messageImagePath = "/Messages_images/" . $messageImage;

						$decryptedMessage = decrypt($row['messageContent'], $key);

						$chatMessageId = $row['chatMessageId'];

						$dateAndTimeSent = $row['dateAndTimeSentMessage'];
						$formattedDateAndTimeSent = date("H:i, d/m/Y", strtotime($dateAndTimeSent));

						$userProfilePictureMessages = $row['profileImage'];
						$userProfilePictureMessagesPath = "/Profile_pictures/" . $userProfilePictureMessages;

						if ($userProfilePictureMessages == "") {

							$userProfilePictureMessagesPath = "Images/profile_image_placeholder.png";

						}

						$messageZoomedInCoverDiv = "zoomed_in_message_image_cover_div_" . $chatMessageId;

						$mostCommonColorObject = new GetMostCommonColors();

						$resultNumber = 5;
						$reduceBrightness = 1;
						$reduceGradients = 1;
						$delta = 30;
						$mostCommonColor = $mostCommonColorObject->Get_Color("/home/yv4nbnligki0/public_html/Messages_images/" . $messageImage, $resultNumber, $reduceBrightness, $reduceGradients, $delta);
						$mostCommonColorBackgroundColorHashtag = "#";
						$mostCommonColorBackgroundColor = "";
						$firstColor = "";
						$secondColor = "";
						$colorFactor = 0.5;

						$colorArrayCount = count($mostCommonColor);

						$mostCommonColorMinumumColorsArrayDark = array();
						$firstElementColorArrayDark = reset($mostCommonColorMinumumColorsArrayDark);
						$lastElementColorArrayDark = end($mostCommonColorMinumumColorsArrayDark);

						$mostCommonColorMinumumColorsArrayLight = array();
						$firstElementColorArrayLight = reset($mostCommonColorMinumumColorsArrayLight);
						$lastElementColorArrayLight = end($mostCommonColorMinumumColorsArrayLight);

						$darkColor = false;
						$lightColor = false;

						if ($colorArrayCount < 5) {

							foreach ($mostCommonColor as $hex => $count) {

								$singleMostCommonColorHex = $mostCommonColorBackgroundColorHashtag . $hex;

								$singleMostCommonColor = new Color($singleMostCommonColorHex);

								$singleMostCommonColorDark = $singleMostCommonColor->isDark();

								$singleMostCommonColorLight = $singleMostCommonColor->isLight();

								if ($singleMostCommonColorDark) {

									$darkColor = true;

									$singleMostCommonColorDarkLightened = $singleMostCommonColor->lighten();
									array_push($mostCommonColorMinumumColorsArrayDark, $singleMostCommonColorDarkLightened);

								} else if ($singleMostCommonColorLight) {

									$lightColor = true;

									$singleMostCommonColorLightDarkened = $singleMostCommonColor->darken();
									array_push($mostCommonColorMinumumColorsArrayLight, $singleMostCommonColorLightDarkened);

								}

							}

							if ($darkColor) {

								$firstElementColorArrayDark = reset($mostCommonColorMinumumColorsArrayDark);
								$lastElementColorArrayDark = end($mostCommonColorMinumumColorsArrayDark);

								?>

									<style type="text/css">
										
										#<?php echo $messageZoomedInCoverDiv; ?> {

											background-color: <?php echo colorAverage($firstElementColorArrayDark, $lastElementColorArrayDark, $colorFactor); ?>;

									    }

									</style>

								<?php

							} else if ($lightColor) {

								$firstElementColorArrayLight = reset($mostCommonColorMinumumColorsArrayLight);
								$lastElementColorArrayLight = end($mostCommonColorMinumumColorsArrayLight);

								?>

									<style type="text/css">
										
										#<?php echo $messageZoomedInCoverDiv; ?> {

											background-color: <?php echo colorAverage($firstElementColorArrayLight, $lastElementColorArrayLight, $colorFactor); ?>;

									    }

									</style>

								<?php

							}

						} else {

							foreach ($mostCommonColor as $hex => $count) {

								if ($hex === array_keys($mostCommonColor)[0]) {

									$firstColor = "#" . $hex;

								}

								if ($hex === array_keys($mostCommonColor)[4]) {

									$secondColor = "#" . $hex;

								}

								$mostCommonColorBackgroundColorHexCode = $mostCommonColorBackgroundColorHashtag . $mostCommonColorBackgroundColor;

							}

							?>

								<style type="text/css">
									
									#<?php echo $messageZoomedInCoverDiv; ?> {

										background-color: <?php echo colorAverage($firstColor, $secondColor, $colorFactor); ?>;

								    }

								</style>

							<?php

						}

						$output .= '<img src="Images/bin.png" class="delete_chat_bin_image" id="' . $row['chatMessageId'] . '" />';
						$output .= '<div class="chat_div_from_me">';
						$output .= '<img src="' . $userProfilePictureMessagesPath . '" class="profile_pic_display_chat_from_me" />';
						$output .= '<p class="chat_div_from_me_date_time">' . $formattedDateAndTimeSent . '</p>';
						$output .= '<div class="chat_div_from_me_message" id="chat_div_from_me_message_' . $chatMessageId . '">';
						$output .= '<img src="' . $messageImagePath . '" class="message_image" data-messageimageid="' . $chatMessageId . '" id="message_image_' . $chatMessageId . '" />';
						$output .= '<p class="main_chat_message_content_from_me" id="main_chat_message_content_from_me_' . $chatMessageId . '">' . $decryptedMessage . '</p>';
						$output .= '</div>';
						$output .= '</div>';

						$chatDivMessageIDDB = "chat_div_from_me_message_" . $chatMessageId;
						$messageImageIDDB = "message_image_" . $chatMessageId;
						$mainChatMessageContent = "main_chat_message_content_from_me_" . $chatMessageId;

						?>

							<style type="text/css">

								#<?php echo $mainChatMessageContent; ?> {

									margin-top: 1%;

								}

								#<?php echo $chatDivMessageIDDB; ?> {

									margin-bottom: -1%;

								}

								#<?php echo $messageImageIDDB; ?> {

									position: relative;
									width: 45%;
									border-radius: 0.5vw;
									display: block;
									margin-left: 2%;
									margin-top: 6%;

								}

							</style>

						<?php

					}

				}

			} else {

				if ($row['messageContent'] === "") {

					$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

					$messageImage = $row['messageImage'];
					$messageImagePath = "/Messages_images/" . $messageImage;

					$chatMessageId = $row['chatMessageId'];

					$decryptedMessage = decrypt($row['messageContent'], $key);

					$dateAndTimeSent = $row['dateAndTimeSentMessage'];
					$formattedDateAndTimeSent = date("H:i, d/m/Y", strtotime($dateAndTimeSent));

					$userProfilePictureMessages = $row['profileImage'];
					$userProfilePictureMessagesPath = "/Profile_pictures/" . $userProfilePictureMessages;

					if ($userProfilePictureMessages == "") {

						$userProfilePictureMessagesPath = "Images/profile_image_placeholder.png";

					}

					$messageZoomedInCoverDiv = "zoomed_in_message_image_cover_div_" . $chatMessageId;

					$mostCommonColorObject = new GetMostCommonColors();

					$resultNumber = 5;
					$reduceBrightness = 1;
					$reduceGradients = 1;
					$delta = 30;
					$mostCommonColor = $mostCommonColorObject->Get_Color("/home/yv4nbnligki0/public_html/Messages_images/" . $messageImage, $resultNumber, $reduceBrightness, $reduceGradients, $delta);
					$mostCommonColorBackgroundColorHashtag = "#";
					$mostCommonColorBackgroundColor = "";
					$firstColor = "";
					$secondColor = "";
					$colorFactor = 0.5;

					$colorArrayCount = count($mostCommonColor);

					$mostCommonColorMinumumColorsArrayDark = array();
					$firstElementColorArrayDark = reset($mostCommonColorMinumumColorsArrayDark);
					$lastElementColorArrayDark = end($mostCommonColorMinumumColorsArrayDark);

					$mostCommonColorMinumumColorsArrayLight = array();
					$firstElementColorArrayLight = reset($mostCommonColorMinumumColorsArrayLight);
					$lastElementColorArrayLight = end($mostCommonColorMinumumColorsArrayLight);

					$darkColor = false;
					$lightColor = false;

					if ($colorArrayCount < 5) {

						foreach ($mostCommonColor as $hex => $count) {

							$singleMostCommonColorHex = $mostCommonColorBackgroundColorHashtag . $hex;

							$singleMostCommonColor = new Color($singleMostCommonColorHex);

							$singleMostCommonColorDark = $singleMostCommonColor->isDark();

							$singleMostCommonColorLight = $singleMostCommonColor->isLight();

							if ($singleMostCommonColorDark) {

								$darkColor = true;

								$singleMostCommonColorDarkLightened = $singleMostCommonColor->lighten();
								array_push($mostCommonColorMinumumColorsArrayDark, $singleMostCommonColorDarkLightened);

							} else if ($singleMostCommonColorLight) {

								$lightColor = true;

								$singleMostCommonColorLightDarkened = $singleMostCommonColor->darken();
								array_push($mostCommonColorMinumumColorsArrayLight, $singleMostCommonColorLightDarkened);

							}

						}

						if ($darkColor) {

							$firstElementColorArrayDark = reset($mostCommonColorMinumumColorsArrayDark);
							$lastElementColorArrayDark = end($mostCommonColorMinumumColorsArrayDark);

							?>

								<style type="text/css">
									
									#<?php echo $messageZoomedInCoverDiv; ?> {

										background-color: <?php echo colorAverage($firstElementColorArrayDark, $lastElementColorArrayDark, $colorFactor); ?>;

								    }

								</style>

							<?php

						} else if ($lightColor) {

							$firstElementColorArrayLight = reset($mostCommonColorMinumumColorsArrayLight);
							$lastElementColorArrayLight = end($mostCommonColorMinumumColorsArrayLight);

							?>

								<style type="text/css">
									
									#<?php echo $messageZoomedInCoverDiv; ?> {

										background-color: <?php echo colorAverage($firstElementColorArrayLight, $lastElementColorArrayLight, $colorFactor); ?>;

								    }

								</style>

							<?php

						}

					} else {

						foreach ($mostCommonColor as $hex => $count) {

							if ($hex === array_keys($mostCommonColor)[0]) {

								$firstColor = "#" . $hex;

							}

							if ($hex === array_keys($mostCommonColor)[4]) {

								$secondColor = "#" . $hex;

							}

							$mostCommonColorBackgroundColorHexCode = $mostCommonColorBackgroundColorHashtag . $mostCommonColorBackgroundColor;

						}

						?>

							<style type="text/css">
								
								#<?php echo $messageZoomedInCoverDiv; ?> {

									background-color: <?php echo colorAverage($firstColor, $secondColor, $colorFactor); ?>;

							    }

							</style>

						<?php

					}

					$output .= '<div class="chat_div_from_user">';
					$output .= '<img src="' . $userProfilePictureMessagesPath . '" class="profile_pic_display_chat_from_user" />';
					$output .= '<p class="chat_div_from_user_date_time">' . $formattedDateAndTimeSent . '</p>';
					$output .= '<div class="chat_div_from_user_message" id="chat_div_from_user_message_' . $chatMessageId . '">';
					$output .= '<img src="' . $messageImagePath . '" class="message_image_from_user" data-messageimageid="' . $chatMessageId . '" id="message_image_from_user_' . $chatMessageId . '" />';
					$output .= '</div>';
					$output .= '</div>';

					$chatDivMessageIDDB = "chat_div_from_user_message_" . $chatMessageId;
					$messageImageIDDB = "message_image_from_user_" . $chatMessageId;

					?>

						<style type="text/css">

							#<?php echo $chatDivMessageIDDB; ?> {

								margin-bottom: 2%;

							}

							#<?php echo $messageImageIDDB; ?> {

								position: relative;
								width: 45%;
								border-radius: 0.5vw;
								display: block;
								margin-left: 0%;
								margin-top: 6%;

							}

						</style>

					<?php

				} else {

					if ($row['messageImage'] === "") {

						$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

						$chatMessageId = $row['chatMessageId'];

						$decryptedMessage = decrypt($row['messageContent'], $key);

						$dateAndTimeSent = $row['dateAndTimeSentMessage'];
						$formattedDateAndTimeSent = date("H:i, d/m/Y", strtotime($dateAndTimeSent));

						$userProfilePictureMessages = $row['profileImage'];
						$userProfilePictureMessagesPath = "/Profile_pictures/" . $userProfilePictureMessages;

						if ($userProfilePictureMessages == "") {

							$userProfilePictureMessagesPath = "Images/profile_image_placeholder.png";

						}

						$output .= '<div class="chat_div_from_user">';
						$output .= '<img src="' . $userProfilePictureMessagesPath . '" class="profile_pic_display_chat_from_user" />';
						$output .= '<p class="chat_div_from_user_date_time">' . $formattedDateAndTimeSent . '</p>';
						$output .= '<div class="chat_div_from_user_message" id="chat_div_from_user_message_' . $chatMessageId . '">';
						$output .= '<p class="main_chat_message_content_from_user">' . $decryptedMessage . '</p>';
						$output .= '</div>';
						$output .= '</div>';

						$chatDivMessageIDDB = "chat_div_from_user_message_" . $chatMessageId;
						$messageImageIDDB = "message_image_from_user_" . $chatMessageId;

						?>

							<style type="text/css">

								#<?php echo $chatDivMessageIDDB; ?> {

									margin-bottom: 4%;

								}

							</style>

						<?php

					} else {

						$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

						$chatMessageId = $row['chatMessageId'];

						$messageImage = $row['messageImage'];
						$messageImagePath = "/Messages_images/" . $messageImage;

						$decryptedMessage = decrypt($row['messageContent'], $key);

						$dateAndTimeSent = $row['dateAndTimeSentMessage'];
						$formattedDateAndTimeSent = date("H:i, d/m/Y", strtotime($dateAndTimeSent));

						$userProfilePictureMessages = $row['profileImage'];
						$userProfilePictureMessagesPath = "/Profile_pictures/" . $userProfilePictureMessages;

						if ($userProfilePictureMessages == "") {

							$userProfilePictureMessagesPath = "Images/profile_image_placeholder.png";

						}

						$messageZoomedInCoverDiv = "zoomed_in_message_image_cover_div_" . $chatMessageId;

						$mostCommonColorObject = new GetMostCommonColors();

						$resultNumber = 5;
						$reduceBrightness = 1;
						$reduceGradients = 1;
						$delta = 30;
						$mostCommonColor = $mostCommonColorObject->Get_Color("/home/yv4nbnligki0/public_html/Messages_images/" . $messageImage, $resultNumber, $reduceBrightness, $reduceGradients, $delta);
						$mostCommonColorBackgroundColorHashtag = "#";
						$mostCommonColorBackgroundColor = "";
						$firstColor = "";
						$secondColor = "";
						$colorFactor = 0.5;

						$colorArrayCount = count($mostCommonColor);

						$mostCommonColorMinumumColorsArrayDark = array();
						$firstElementColorArrayDark = reset($mostCommonColorMinumumColorsArrayDark);
						$lastElementColorArrayDark = end($mostCommonColorMinumumColorsArrayDark);

						$mostCommonColorMinumumColorsArrayLight = array();
						$firstElementColorArrayLight = reset($mostCommonColorMinumumColorsArrayLight);
						$lastElementColorArrayLight = end($mostCommonColorMinumumColorsArrayLight);

						$darkColor = false;
						$lightColor = false;

						if ($colorArrayCount < 5) {

							foreach ($mostCommonColor as $hex => $count) {

								$singleMostCommonColorHex = $mostCommonColorBackgroundColorHashtag . $hex;

								$singleMostCommonColor = new Color($singleMostCommonColorHex);

								$singleMostCommonColorDark = $singleMostCommonColor->isDark();

								$singleMostCommonColorLight = $singleMostCommonColor->isLight();

								if ($singleMostCommonColorDark) {

									$darkColor = true;

									$singleMostCommonColorDarkLightened = $singleMostCommonColor->lighten();
									array_push($mostCommonColorMinumumColorsArrayDark, $singleMostCommonColorDarkLightened);

								} else if ($singleMostCommonColorLight) {

									$lightColor = true;

									$singleMostCommonColorLightDarkened = $singleMostCommonColor->darken();
									array_push($mostCommonColorMinumumColorsArrayLight, $singleMostCommonColorLightDarkened);

								}

							}

							if ($darkColor) {

								$firstElementColorArrayDark = reset($mostCommonColorMinumumColorsArrayDark);
								$lastElementColorArrayDark = end($mostCommonColorMinumumColorsArrayDark);

								?>

									<style type="text/css">
										
										#<?php echo $messageZoomedInCoverDiv; ?> {

											background-color: <?php echo colorAverage($firstElementColorArrayDark, $lastElementColorArrayDark, $colorFactor); ?>;

									    }

									</style>

								<?php

							} else if ($lightColor) {

								$firstElementColorArrayLight = reset($mostCommonColorMinumumColorsArrayLight);
								$lastElementColorArrayLight = end($mostCommonColorMinumumColorsArrayLight);

								?>

									<style type="text/css">
										
										#<?php echo $messageZoomedInCoverDiv; ?> {

											background-color: <?php echo colorAverage($firstElementColorArrayLight, $lastElementColorArrayLight, $colorFactor); ?>;

									    }

									</style>

								<?php

							}

						} else {

							foreach ($mostCommonColor as $hex => $count) {

								if ($hex === array_keys($mostCommonColor)[0]) {

									$firstColor = "#" . $hex;

								}

								if ($hex === array_keys($mostCommonColor)[4]) {

									$secondColor = "#" . $hex;

								}

								$mostCommonColorBackgroundColorHexCode = $mostCommonColorBackgroundColorHashtag . $mostCommonColorBackgroundColor;

							}

							?>

								<style type="text/css">
									
									#<?php echo $messageZoomedInCoverDiv; ?> {

										background-color: <?php echo colorAverage($firstColor, $secondColor, $colorFactor); ?>;

								    }

								</style>

							<?php

						}

						$output .= '<div class="chat_div_from_user">';
						$output .= '<img src="' . $userProfilePictureMessagesPath . '" class="profile_pic_display_chat_from_user" />';
						$output .= '<p class="chat_div_from_user_date_time">' . $formattedDateAndTimeSent . '</p>';
						$output .= '<div class="chat_div_from_user_message" id="chat_div_from_user_message_' . $chatMessageId . '">';
						$output .= '<img src="' . $messageImagePath . '" class="message_image_from_user" data-messageimageid="' . $chatMessageId . '" id="message_image_from_user_' . $chatMessageId . '" />';
						$output .= '<p class="main_chat_message_content_from_user" id="main_chat_message_content_from_user_' . $chatMessageId . '">' . $decryptedMessage . '</p>';
						$output .= '</div>';
						$output .= '</div>';

						$chatDivMessageIDDB = "chat_div_from_user_message_" . $chatMessageId;
						$messageImageIDDB = "message_image_from_user_" . $chatMessageId;
						$mainChatMessageContent = "main_chat_message_content_from_user_" . $chatMessageId;

						?>

							<style type="text/css">

								#<?php echo $mainChatMessageContent; ?> {

									margin-top: 2%;

								}

								#<?php echo $chatDivMessageIDDB; ?> {

									margin-bottom: -1%;

								}

								#<?php echo $messageImageIDDB; ?> {

									position: relative;
									width: 45%;
									border-radius: 0.5vw;
									display: block;
									margin-left: 0%;
									margin-top: 6%;

								}

							</style>

						<?php

					}

				}

			}

			$output .= '</div>';

		}

		$updateUnseenMessagesQuery = "UPDATE messages SET status = ? WHERE fromUserIdMessage = ? AND toUserIdMessage = ? AND status = ?;";
		$stmt = $db->prepare($updateUnseenMessagesQuery);
		$status1 = 1;
		$status2 = 0;
		$stmt->bind_param("iiii", $status1, $toUserId, $fromUserId, $status2);
		$stmt->execute();

		$updateClickedStatusQuery = "UPDATE messages SET clickedStatus = ? WHERE fromUserIdMessage = ? AND toUserIdMessage = ? AND clickedStatus = ?;";
		$stmt = $db->prepare($updateClickedStatusQuery);
		$clickedStatus1 = 1;
		$clickedStatus2 = 0;
		$stmt->bind_param("iiii", $clickedStatus1, $toUserId, $fromUserId, $clickedStatus2);
		$stmt->execute();
		
		$query = "SELECT * FROM messages INNER JOIN users ON messages.fromUserIdMessage = users.id WHERE (fromUserIdMessage = ? AND toUserIdMessage = ?) OR (fromUserIdMessage = ? AND toUserIdMessage = ?) ORDER BY dateAndTimeSentMessage DESC;";
		$stmt = $db->prepare($query);
		$fromUserId = $fromUserId;
		$toUserId = $toUserId;
		$stmt->bind_param("iiii", $fromUserId, $toUserId, $toUserId, $fromUserId);
		$stmt->execute();
		$result = $stmt->get_result();
		$output2 = "";

		if ($result->num_rows >= 1) {

			if ($row = $result->fetch_assoc()) {

				if ($row['fromUserIdMessage'] === $fromUserId) {

					if ($row['status'] == 1) {

						$output2 = '<p class="message_seen">Seen</p>';

					}

				}

			}

		}

		$finalOutput = $output . $output2;

		return $finalOutput;

	}

	function fetchIsTypingStatus($userId, $db) {

		$query = "SELECT isTyping FROM users WHERE id = ? ORDER BY lastActivity DESC LIMIT 1;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $userId);
		$stmt->execute();
		$result = $stmt->get_result();
		$output = "";

		foreach ($result as $row) {

			if ($row['isTyping'] == "yes") {

				$output = '<p class="is_typing">Typing...</p>';

			}

		}

		return $output;

	}

	function getUserUsername($userId, $db) {

		$query = "SELECT username FROM users WHERE id = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $userId);
		$stmt->execute();
		$result = $stmt->get_result();

		foreach ($result as $row) {

			return $row['username'];

		}

	}

	function unSeenMessagesCounter($fromUserId, $toUserId, $db) {

		$query = "SELECT * FROM messages WHERE fromUserIdMessage = ? AND toUserIdMessage = ? AND status = ?;";
		$stmt = $db->prepare($query);
		$status = 0;
		$stmt->bind_param("iii", $fromUserId, $toUserId, $status);
		$stmt->execute();
		$result = $stmt->get_result();
		$counter = mysqli_num_rows($result);
		$output = "";

		if ($counter > 0) {

			$output = '<span class="notifications_from_user_counter">' . $counter . '</span>';

		}

		return $output;

	}

	function encrypt($message, $key) {

		$encryptionKey = base64_decode($key);
		$IV = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
		$encrypted = openssl_encrypt($message, 'aes-256-cbc', $encryptionKey, 0, $IV);

		return base64_encode($encrypted . '::' . $IV);

	}

	function decrypt($message, $key) {

		$encryptionKey = base64_decode($key);
		list($encryptedData, $IV) = array_pad(explode('::', base64_decode($message), 2), 2, null);

		return openssl_decrypt($encryptedData, 'aes-256-cbc', $encryptionKey, 0, $IV);

	}

	function getRating($gameID, $db) {

		$rating = array();

		$likesQuery = "SELECT COUNT(*) FROM gameLikesDislikes WHERE gameIdLikesDislikesGames = ? AND ratingActionGames = ?;";
		$dislikesQuery = "SELECT COUNT(*) FROM gameLikesDislikes WHERE gameIdLikesDislikesGames = ? AND ratingActionGames = ?;";

		$likesStmt = $db->prepare($likesQuery);
		$likeAction = "like";
		$likesStmt->bind_param("is", $gameID, $likeAction);
		$likesStmt->execute();
		$likesStmtResult = $likesStmt->get_result();
		$likes = mysqli_fetch_array($likesStmtResult);

		$dislikesStmt = $db->prepare($dislikesQuery);
		$dislikeAction = "dislike";
		$dislikesStmt->bind_param("is", $gameID, $dislikeAction);
		$dislikesStmt->execute();
		$dislikesStmtResult = $dislikesStmt->get_result();
		$dislikes = mysqli_fetch_array($dislikesStmtResult);

		$rating = [

			'likes' => $likes[0],
			'dislikes' => $dislikes[0]

		];

		return json_encode($rating);

	}

	function getLikes($gameID, $db) {

		$query = "SELECT COUNT(*) FROM gameLikesDislikes WHERE gameIdLikesDislikesGames = ? AND ratingActionGames = ?;";
		$stmt = $db->prepare($query);
		$like = "like";
		$stmt->bind_param("is", $gameID, $like);
		$stmt->execute();
		$result = $stmt->get_result();
		$likesCounter = mysqli_fetch_array($result);

		return $likesCounter[0];

	}

	function getDislikes($gameID, $db) {

		$query = "SELECT COUNT(*) FROM gameLikesDislikes WHERE gameIdLikesDislikesGames = ? AND ratingActionGames = ?;";
		$stmt = $db->prepare($query);
		$dislike = "dislike";
		$stmt->bind_param("is", $gameID, $dislike);
		$stmt->execute();
		$result = $stmt->get_result();
		$dislikesCounter = mysqli_fetch_array($result);

		return $dislikesCounter[0];

	}

	function userLiked($gameID, $db) {

		$query = "SELECT * FROM users;";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$myID = "";

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				if ($row['username'] === $_COOKIE['username']) {

					$myID = $row['id'];

				}

			}

		}

		$likeQuery = "SELECT * FROM gameLikesDislikes WHERE userIdLikesDislikesGames = ? AND gameIdLikesDislikesGames = ? AND ratingActionGames = ?;";
		$likeStmt = $db->prepare($likeQuery);
		$like = "like";
		$likeStmt->bind_param("iis", $myID, $gameID, $like);
		$likeStmt->execute();
		$likeQueryResult = $likeStmt->get_result();

		if (mysqli_num_rows($likeQueryResult) > 0) {

			return true;

		} else {

			return false;

		}

	}

	function userDisliked($gameID, $db) {

		$query = "SELECT * FROM users;";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$myID = "";

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				if ($row['username'] === $_COOKIE['username']) {

					$myID = $row['id'];

				}

			}

		}

		$dislikeQuery = "SELECT * FROM gameLikesDislikes WHERE userIdLikesDislikesGames = ? AND gameIdLikesDislikesGames = ? AND ratingActionGames = ?;";
		$dislikeStmt = $db->prepare($dislikeQuery);
		$dislike = "dislike";
		$dislikeStmt->bind_param("iis", $myID, $gameID, $dislike);
		$dislikeStmt->execute();
		$dislikeQueryResult = $dislikeStmt->get_result();

		if (mysqli_num_rows($dislikeQueryResult) > 0) {

			return true;

		} else {

			return false;

		}

	}

	function fetchMyID($username, $db) {

		$query = "SELECT * FROM users WHERE username = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();
		$myID = "";

		if ($result->num_rows >= 1) {

			if ($row = $result->fetch_assoc()) {

				if ($row['username'] === $username) {

					$myID = $row['id'];

				}

			}

		}

		return $myID;

	}
	
	function deleteFiles($dir) {

        if (!file_exists($dir)) {

            return true;

        }

        if (!is_dir($dir)) {

            return unlink($dir);

        }

        foreach (scandir($dir) as $item) {

            if ($item == '.' || $item == '..') {

                continue;

            }

            if (!deleteFiles($dir . DIRECTORY_SEPARATOR . $item)) {

                return false;

            }

        }

        return rmdir($dir);

    }

    function getAllGameCommentsReplies($gameID, $gameCommentID, $db) {

    	$output = "";

    	$myID = fetchMyID($_COOKIE['username'], $db);

    	$query = "SELECT * FROM gameCommentsReplies INNER JOIN users ON gameCommentsReplies.gameCommentsRepliesUserId = users.id WHERE gameCommentsRepliesGameId = ? AND gameCommentsRepliesCommentId = ? ORDER BY gameCommentsRepliesDateAndTimeSubmitted DESC;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("ii", $gameID, $gameCommentID);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				if ($row['gameCommentsRepliesUserId'] === $myID) {

					$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

					$deleteGameCommentReplyImage = '<img src="Images/bin.png" class="game_comments_reply_delete_my_comment_image" id="' . $row['gameCommentsRepliesId'] . '" />';

					$userProfilePictureGameCommentReply = $row['profileImage'];
					$userProfilePictureGameCommentReplyPath = "/Profile_pictures/" . $userProfilePictureGameCommentReply;

					if ($userProfilePictureGameCommentReply == "") {

						$userProfilePictureGameCommentReplyPath = "/Account/Images/profile_image_placeholder.png";

					}

					$gameCommentReplyUserUsername = $row['username'];
					$gameCommentReplyUserUserId = $row['id'];
					$gameCommentReplyUserContent = $row['gameCommentsRepliesContent'];
					$gameCommentReplyCommentId = $row['gameCommentsRepliesCommentId'];
					$decryptedGameCommentReplyUserContent = decrypt($gameCommentReplyUserContent, $key);
					$strippedTagsDecryptedGameCommentReplyUserContent = strip_tags($decryptedGameCommentReplyUserContent);
					$gameCommentReplyDateAndTimeSubmitted = $row['gameCommentsRepliesDateAndTimeSubmitted'];
					$formattedGameCommentReplyDateAndTimeSubmitted = date("H:i, d/m/Y", strtotime($gameCommentReplyDateAndTimeSubmitted));

					$gameCommentReplyUserUsernameIdDB = "game_comments_each_div_username_" . $gameCommentReplyUserUserId;

					$customUsernameStylingTextContent = "";

					$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
					$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
					$customUsernameStylingTextId = 2;
					$customUsernameStylingTextActiveStatus = 1;
					$stmt->bind_param("sii", $gameCommentUserUserId, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
					$stmt->execute();
					$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

					if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

						if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

							$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

							?>

								<style type="text/css">
									
									#<?php echo $gameCommentUserUsernameIdDB ?> {

										color: <?php echo $customUsernameStylingTextContent; ?>;

									}

								</style>

							<?php

						}

					}

					$output .= '<div class="game_comments_reply_each_div" id="game_comments_reply_each_div_' . $row['gameCommentsRepliesId'] . '">
				
									<img src="' . $userProfilePictureGameCommentReplyPath . '" class="profile_picture_display_game_comments_reply_each_div_user" />

									<a href="/Account/profile?username=' . $gameCommentReplyUserUsername . '"><p id="' . $gameCommentReplyUserUsernameIdDB . '" class="game_comments_reply_each_div_username">' . $gameCommentReplyUserUsername . '</p></a>

									<p class="game_comments_reply_each_div_date_and_time">' . $formattedGameCommentReplyDateAndTimeSubmitted . '</p>

									<div class="game_comments_reply_each_div_comment_content_div">
										
										<p class="game_comments_reply_each_div_comment_content">' . $strippedTagsDecryptedGameCommentReplyUserContent . '</p>

									</div>

									' . $deleteGameCommentReplyImage . '

									<p class="game_comments_each_div_comment_content_reply_me" id="game_comments_each_div_comment_content_reply_' . $gameCommentReplyCommentId . '" data-gamecommentid="' . $gameCommentReplyCommentId . '">Reply</p>

								</div>';

				} else {

					$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

					$userProfilePictureGameCommentReply = $row['profileImage'];
					$userProfilePictureGameCommentReplyPath = "/Profile_pictures/" . $userProfilePictureGameCommentReply;

					if ($userProfilePictureGameCommentReply == "") {

						$userProfilePictureGameCommentReplyPath = "/Account/Images/profile_image_placeholder.png";

					}

					$gameCommentReplyUserUsername = $row['username'];
					$gameCommentReplyUserUserId = $row['id'];
					$gameCommentReplyUserContent = $row['gameCommentsRepliesContent'];
					$gameCommentReplyCommentId = $row['gameCommentsRepliesCommentId'];
					$decryptedGameCommentReplyUserContent = decrypt($gameCommentReplyUserContent, $key);
					$strippedTagsDecryptedGameCommentReplyUserContent = strip_tags($decryptedGameCommentReplyUserContent);
					$gameCommentReplyDateAndTimeSubmitted = $row['gameCommentsRepliesDateAndTimeSubmitted'];
					$formattedGameCommentReplyDateAndTimeSubmitted = date("H:i, d/m/Y", strtotime($gameCommentReplyDateAndTimeSubmitted));

					$gameCommentReplyUserUsernameIdDB = "game_comments_each_div_username_" . $gameCommentReplyUserUserId;

					$customUsernameStylingTextContent = "";

					$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
					$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
					$customUsernameStylingTextId = 2;
					$customUsernameStylingTextActiveStatus = 1;
					$stmt->bind_param("sii", $gameCommentUserUserId, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
					$stmt->execute();
					$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

					if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

						if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

							$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

							?>

								<style type="text/css">
									
									#<?php echo $gameCommentUserUsernameIdDB ?> {

										color: <?php echo $customUsernameStylingTextContent; ?>;

									}

								</style>

							<?php

						}

					}

					$output .= '<div class="game_comments_reply_each_div" id="game_comments_reply_each_div_' . $row['gameCommentsRepliesId'] . '">
				
									<img src="' . $userProfilePictureGameCommentReplyPath . '" class="profile_picture_display_game_comments_reply_each_div_user" />

									<a href="/Account/profile?username=' . $gameCommentReplyUserUsername . '"><p id="' . $gameCommentReplyUserUsernameIdDB . '" class="game_comments_reply_each_div_username">' . $gameCommentReplyUserUsername . '</p></a>

									<p class="game_comments_reply_each_div_date_and_time">' . $formattedGameCommentReplyDateAndTimeSubmitted . '</p>

									<div class="game_comments_reply_each_div_comment_content_div">
										
										<p class="game_comments_reply_each_div_comment_content">' . $strippedTagsDecryptedGameCommentReplyUserContent . '</p>

									</div>

									<p class="game_comments_each_div_comment_content_reply" id="game_comments_each_div_comment_content_reply_' . $gameCommentReplyCommentId . '" data-gamecommentid="' . $gameCommentReplyCommentId . '">Reply</p>

								</div>';

				}

			}

		}

		return $output;

    }

    function colorAverage($color1, $color2, $factor) {

	    list($r1, $g1, $b1) = str_split(ltrim($color1, '#'), 2);

	    list($r2, $g2, $b2) = str_split(ltrim($color2, '#'), 2);

	    $r_avg = (hexdec($r1) * (1 - $factor) + hexdec($r2) * $factor);
					$g_avg = (hexdec($g1) * (1 - $factor) + hexdec($g2) * $factor);
	    $b_avg = (hexdec($b1) * (1 - $factor) + hexdec($b2) * $factor);

	    $colorAverage = '#' . sprintf("%02s",dechex($r_avg)) . sprintf("%02s",dechex($g_avg)) . sprintf("%02s",dechex($b_avg));

	    return $colorAverage;
					
	}

	function resizeImage($file, $maxRes) {

		$imageType = mime_content_type($file);

		if ($imageType === "image/jpeg") {

			$originalImage = imagecreatefromjpeg($file);

			$originalWidth = imagesx($originalImage);
			$originalHeight = imagesy($originalImage);

			$ratio = $maxRes / $originalWidth;
			$newWidth = $maxRes;
			$newHeight = $originalHeight * $ratio;

			if ($newHeight > $maxRes) {

				$ratio = $maxRes / $originalHeight;
				$newHeight = $maxRes;
				$newWidth = $originalWidth * $ratio;

			}

			if ($originalImage) {

				$newImage = imagecreatetruecolor($newWidth, $newHeight);

				imagecopyresampled($newImage, $originalImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

				imagejpeg($newImage, $file);

			}

		} else if ($imageType === "image/png") {

			$originalImage = imagecreatefrompng($file);

			$originalWidth = imagesx($originalImage);
			$originalHeight = imagesy($originalImage);

			$ratio = $maxRes / $originalWidth;
			$newWidth = $maxRes;
			$newHeight = $originalHeight * $ratio;

			if ($newHeight > $maxRes) {

				$ratio = $maxRes / $originalHeight;
				$newHeight = $maxRes;
				$newWidth = $originalWidth * $ratio;

			}

			if ($originalImage) {

				$newImage = imagecreatetruecolor($newWidth, $newHeight);

				imagealphablending($newImage, FALSE);

				imagesavealpha($newImage, TRUE);

				imagecopyresampled($newImage, $originalImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

				$r = @imagepng($newImage, $file);

			}

		}

	}

	function followFeedUserButton($userId, $myID, $feedID, $db) {

		$output = "";

		if (isset($_COOKIE['login'])) {

			if ($userId !== $myID) {

				$query = "SELECT * FROM followers WHERE followerUserId = ? AND followingUserId = ?;";
				$stmt = $db->prepare($query);
				$stmt->bind_param("ii", $myID, $userId);
				$stmt->execute();
				$result = $stmt->get_result();

				if ($result->num_rows >= 1) {

					if ($row = $result->fetch_assoc()) {

						$output .= '<input type="button" class="unfollow_user_button_div_for_each" id="unfollow_user_button_div_for_each_' . $feedID . '" style="cursor: default;" data-feeduserid="' . $userId . '" data-feedid="' . $feedID . '" value="Unfollow" />';

					}

				} else {

					$output .= '<input type="button" class="follow_user_button_div_for_each" id="follow_user_button_div_for_each_' . $feedID . '" style="cursor: default;" data-feeduserid="' . $userId . '" data-feedid="' . $feedID . '" value="Follow" />';

				}

			} else if ($userId === $myID) {

				$output .= '<img src="Images/bin.png" class="delete_feed_post_bin_image" id="delete_feed_post_bin_image_' . $feedID . '" data-feedid="' . $feedID . '" />';

			}

		}

		return $output;

	}

	function getRatingFeed($feedID, $db) {

		$rating = array();

		$likesQuery = "SELECT COUNT(*) FROM feedLikesDislikes WHERE feedIdLikesDislikesFeed = ? AND ratingActionFeed = ?;";

		$likesStmt = $db->prepare($likesQuery);
		$likeAction = "like";
		$likesStmt->bind_param("is", $feedID, $likeAction);
		$likesStmt->execute();
		$likesStmtResult = $likesStmt->get_result();
		$likes = mysqli_fetch_array($likesStmtResult);

		$rating = [

			'likes' => $likes[0]

		];

		return json_encode($rating);

	}

	function getLikesFeed($feedID, $db) {

		$query = "SELECT COUNT(*) FROM feedLikesDislikes WHERE feedIdLikesDislikesFeed = ? AND ratingActionFeed = ?;";
		$stmt = $db->prepare($query);
		$like = "like";
		$stmt->bind_param("is", $feedID, $like);
		$stmt->execute();
		$result = $stmt->get_result();
		$likesCounter = mysqli_fetch_array($result);

		return $likesCounter[0];

	}

	function userLikedFeed($feedID, $db) {

		$query = "SELECT * FROM users;";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$myID = "";

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				if ($row['username'] === $_COOKIE['username']) {

					$myID = $row['id'];

				}

			}

		}

		$likeQuery = "SELECT * FROM feedLikesDislikes WHERE userIdLikesDislikesFeed = ? AND feedIdLikesDislikesFeed = ? AND ratingActionFeed = ?;";
		$likeStmt = $db->prepare($likeQuery);
		$like = "like";
		$likeStmt->bind_param("iis", $myID, $feedID, $like);
		$likeStmt->execute();
		$likeQueryResult = $likeStmt->get_result();

		if (mysqli_num_rows($likeQueryResult) > 0) {

			return true;

		} else {

			return false;

		}

	}

	function likeMainFeed($feedID, $db) {

		$output = "";

		if (userLikedFeed($feedID, $db)) {

			$output .= 'class=\'like_button_image clicked\'';

		} else {

			$output .= 'class=\'like_button_image unclicked\'';

		}

		return $output;

	}

	function checkIfFeedPostCommentsExist($feedID, $db) {

		$output = "";

		$query = "SELECT * FROM feedComments WHERE feedCommentFeedId = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $feedID);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			if ($row = $result->fetch_assoc()) {

				$output .= '<span class="comment_view_comments_feed_div_for_each_line_break" id="comment_view_comments_feed_div_for_each_line_break_' . $feedID . '">|</span>

							<p class="view_comments_feed_div_for_each" id="view_comments_feed_div_for_each_' . $feedID . '" data-feedid="' . $feedID . '" data-feedpostcommentcount="' . mysqli_num_rows($result) . '">View comments (' . mysqli_num_rows($result) . ')</p>';

			}

		} else {

			$output .= '';

		}

		return $output;

	}

	function checkIfFeedPostCommentsExistNotLoggedIn($feedID, $db) {

		$output = "";

		$query = "SELECT * FROM feedComments WHERE feedCommentFeedId = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $feedID);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			if ($row = $result->fetch_assoc()) {

				$output .= '<p class="view_comments_feed_div_for_each" style="padding: 0.2vw;" id="view_comments_feed_div_for_each_' . $feedID . '" data-feedid="' . $feedID . '" data-feedpostcommentcount="' . mysqli_num_rows($result) . '">View comments (' . mysqli_num_rows($result) . ')</p>';

			}

		} else {

			$output .= '';

		}

		return $output;

	}

	function checkIfFeedPostCommentsRepliesExist($feedPostCommentId, $db) {

		$output = "";

		$query = "SELECT * FROM feedCommentsReplies WHERE feedCommentsRepliesCommentId = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $feedPostCommentId);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			if ($row = $result->fetch_assoc()) {

				$output .= '<p class="feed_post_comments_each_div_comment_content_view_replies" id="feed_post_comments_each_div_comment_content_view_replies_' . $feedPostCommentId . '" data-feedpostcommentid="' . $feedPostCommentId . '" data-feedid="' . $row['feedCommentsRepliesFeedId'] . '" data-feedpostcommentcount="' . mysqli_num_rows($result) . '">View replies (' . mysqli_num_rows($result) . ')</p>';

			}

		} else {

			$output .= '';

		}

		return $output;

	}

	function getAllFeedPostCommentsReplies($feedPostCommentId, $db) {

		$output = "";

		$query = "SELECT * FROM feedCommentsReplies INNER JOIN users ON feedCommentsReplies.feedCommentsRepliesUserId = users.id WHERE feedCommentsRepliesCommentId = ? ORDER BY feedCommentsRepliesDateAndTimeSubmitted DESC;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $feedPostCommentId);
		$stmt->execute();
		$result = $stmt->get_result();
		$myID = fetchMyID($_COOKIE['username'], $db);

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				if ($row['id'] === $myID) {

					$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

					$feedPostCommentReplyUserUsername = $row['username'];
					$feedPostCommentReplyUserUserId = $row['id'];
					$feedPostCommentReplyUserContent = $row['feedCommentsRepliesContent'];
					$feedPostCommentReplyId = $row['feedCommentsRepliesId'];
					$feedPostCommentId = $row['feedCommentsRepliesFeedId'];
					$feedPostCommentRepliedCommentId = $row['feedCommentsRepliesCommentId'];
					$decryptedFeedPostCommentReplyUserContent = decrypt($feedPostCommentReplyUserContent, $key);
					$strippedTagsDecryptedFeedPostCommentReplyUserContent = strip_tags($decryptedFeedPostCommentReplyUserContent);
					$feedPostCommentReplyDateAndTimeSubmitted = $row['feedCommentsRepliesDateAndTimeSubmitted'];
					$formattedFeedPostCommentReplyDateAndTimeSubmitted = date("H:i, d/m/Y", strtotime($feedPostCommentReplyDateAndTimeSubmitted));

					$userProfilePictureFeedPostCommentReply = $row['profileImage'];
					$userProfilePictureFeedPostCommentReplyPath = "/Profile_pictures/" . $userProfilePictureFeedPostCommentReply;

					if ($userProfilePictureFeedPostCommentReply == "") {

						$userProfilePictureFeedPostCommentReplyPath = "/Account/Images/profile_image_placeholder.png";

					}

					$deleteFeedPostCommentReplyImage = '<img src="Images/bin.png" class="feed_post_comments_reply_delete_my_comment_image" id="' . $feedPostCommentReplyId . '" data-feedpostcommentreplyid="' . $feedPostCommentReplyId . '" data-feedpostcommentid="' . $feedPostCommentRepliedCommentId . '" data-feedid="' . $feedPostCommentId . '" />';

					$feedPostCommentReplyUserUsernameIdDB = "comment_feed_reply_div_for_each_username_" . $feedPostCommentReplyUserUserId;

					$customUsernameStylingTextContent = "";

					$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
					$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
					$customUsernameStylingTextId = 2;
					$customUsernameStylingTextActiveStatus = 1;
					$stmt->bind_param("sii", $feedPostCommentReplyUserUserId, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
					$stmt->execute();
					$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

					if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

						if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

							$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

							?>

								<style type="text/css">
									
									#<?php echo $feedPostCommentReplyUserUsernameIdDB; ?> {

										color: <?php echo $customUsernameStylingTextContent; ?>;

									}

								</style>

							<?php

						}

					}

					$output .= '<div class="comment_feed_reply_div_for_each_main_div_for_each" id="comment_feed_reply_div_for_each_main_div_for_each_' . $feedPostCommentId . '">
						
									<img src="' . $userProfilePictureFeedPostCommentReplyPath . '" class="profile_picture_display_comment_feed_reply_div_for_each" id="profile_picture_display_comment_feed_reply_div_for_each_' . $feedPostCommentId . '" />

									<a href="/Account/profile?username=' . $feedPostCommentReplyUserUsername . '" class="comment_feed_reply_div_for_each_username_link" id="comment_feed_reply_div_for_each_username_link_' . $feedPostCommentId . '"><p class="comment_feed_reply_div_for_each_username" id="comment_feed_reply_div_for_each_username_' . $feedPostCommentReplyUserUserId . '">' . $feedPostCommentReplyUserUsername . '</p></a>

									<p class="comment_feed_reply_div_for_each_time_and_date" id="comment_feed_reply_div_for_each_time_and_date_' . $feedPostCommentId . '">' . $formattedFeedPostCommentReplyDateAndTimeSubmitted . '</p>

									<p class="comment_feed_reply_div_for_each_content" id="comment_feed_reply_div_for_each_content_' . $feedPostCommentId . '">' . $strippedTagsDecryptedFeedPostCommentReplyUserContent . '</p>

									' . $deleteFeedPostCommentReplyImage . '

									<p class="feed_post_comments_reply_each_div_comment_content_reply_me" id="feed_post_comments_reply_each_div_comment_content_reply_me_' . $feedPostCommentId . '" data-feedcommentid="' . $feedPostCommentRepliedCommentId . '" data-feedid="' . $feedPostCommentId . '" data-feedcommentuserusername="' . $feedPostCommentReplyUserUsername . '" data-feedcommentuserprofileimage="' . $userProfilePictureFeedPostCommentReplyPath . '" data-feedcommentdateandtimesubmitted="' . $formattedFeedPostCommentReplyDateAndTimeSubmitted . '" data-feedcommentcontent="' . $strippedTagsDecryptedFeedPostCommentReplyUserContent . '" data-feedcommentuseruserid="' . $feedPostCommentReplyUserUserId . '">Reply</p>

								</div>';

				} else {

					$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

					$feedPostCommentReplyUserUsername = $row['username'];
					$feedPostCommentReplyUserUserId = $row['id'];
					$feedPostCommentReplyUserContent = $row['feedCommentsRepliesContent'];
					$feedPostCommentReplyId = $row['feedCommentsRepliesId'];
					$feedPostCommentId = $row['feedCommentsRepliesFeedId'];
					$feedPostCommentRepliedCommentId = $row['feedCommentsRepliesCommentId'];
					$decryptedFeedPostCommentReplyUserContent = decrypt($feedPostCommentReplyUserContent, $key);
					$strippedTagsDecryptedFeedPostCommentReplyUserContent = strip_tags($decryptedFeedPostCommentReplyUserContent);
					$feedPostCommentReplyDateAndTimeSubmitted = $row['feedCommentsRepliesDateAndTimeSubmitted'];
					$formattedFeedPostCommentReplyDateAndTimeSubmitted = date("H:i, d/m/Y", strtotime($feedPostCommentReplyDateAndTimeSubmitted));

					$userProfilePictureFeedPostCommentReply = $row['profileImage'];
					$userProfilePictureFeedPostCommentReplyPath = "/Profile_pictures/" . $userProfilePictureFeedPostCommentReply;

					if ($userProfilePictureFeedPostCommentReply == "") {

						$userProfilePictureFeedPostCommentReplyPath = "/Account/Images/profile_image_placeholder.png";

					}

					$feedPostCommentReplyUserUsernameIdDB = "comment_feed_reply_div_for_each_username_" . $feedPostCommentReplyUserUserId;

					$customUsernameStylingTextContent = "";

					$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
					$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
					$customUsernameStylingTextId = 2;
					$customUsernameStylingTextActiveStatus = 1;
					$stmt->bind_param("sii", $feedPostCommentReplyUserUserId, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
					$stmt->execute();
					$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

					if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

						if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

							$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

							?>

								<style type="text/css">
									
									#<?php echo $feedPostCommentReplyUserUsernameIdDB; ?> {

										color: <?php echo $customUsernameStylingTextContent; ?>;

									}

								</style>

							<?php

						}

					}

					$output .= '<div class="comment_feed_reply_div_for_each_main_div_for_each" id="comment_feed_reply_div_for_each_main_div_for_each_' . $feedPostCommentId . '">
						
									<img src="' . $userProfilePictureFeedPostCommentReplyPath . '" class="profile_picture_display_comment_feed_reply_div_for_each" id="profile_picture_display_comment_feed_reply_div_for_each_' . $feedPostCommentId . '" />

									<a href="/Account/profile?username=' . $feedPostCommentReplyUserUsername . '" class="comment_feed_reply_div_for_each_username_link" id="comment_feed_reply_div_for_each_username_link_' . $feedPostCommentId . '"><p class="comment_feed_reply_div_for_each_username" id="comment_feed_reply_div_for_each_username_' . $feedPostCommentReplyUserUserId . '">' . $feedPostCommentReplyUserUsername . '</p></a>

									<p class="comment_feed_reply_div_for_each_time_and_date" id="comment_feed_reply_div_for_each_time_and_date_' . $feedPostCommentId . '">' . $formattedFeedPostCommentReplyDateAndTimeSubmitted . '</p>

									<p class="comment_feed_reply_div_for_each_content" id="comment_feed_reply_div_for_each_content_' . $feedPostCommentId . '">' . $strippedTagsDecryptedFeedPostCommentReplyUserContent . '</p>

									<p class="feed_post_comments_reply_each_div_comment_content_reply" id="feed_post_comments_reply_each_div_comment_content_reply_' . $feedPostCommentId . '" data-feedcommentid="' . $feedPostCommentRepliedCommentId . '" data-feedid="' . $feedPostCommentId . '" data-feedcommentuserusername="' . $feedPostCommentReplyUserUsername . '" data-feedcommentuserprofileimage="' . $userProfilePictureFeedPostCommentReplyPath . '" data-feedcommentdateandtimesubmitted="' . $formattedFeedPostCommentReplyDateAndTimeSubmitted . '" data-feedcommentcontent="' . $strippedTagsDecryptedFeedPostCommentReplyUserContent . '" data-feedcommentuseruserid="' . $feedPostCommentReplyUserUserId . '">Reply</p>

								</div>';

				}

			}

		} else {

			$output .= '';

		}

		return $output;

	}

	function getAllFeedPostCommentsRepliesNotLoggedIn($feedPostCommentId, $db) {

		$output = "";

		$query = "SELECT * FROM feedCommentsReplies INNER JOIN users ON feedCommentsReplies.feedCommentsRepliesUserId = users.id WHERE feedCommentsRepliesCommentId = ? ORDER BY feedCommentsRepliesDateAndTimeSubmitted DESC;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $feedPostCommentId);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

				$feedPostCommentReplyUserUsername = $row['username'];
				$feedPostCommentReplyUserUserId = $row['id'];
				$feedPostCommentReplyUserContent = $row['feedCommentsRepliesContent'];
				$feedPostCommentReplyId = $row['feedCommentsRepliesId'];
				$feedPostCommentId = $row['feedCommentsRepliesFeedId'];
				$feedPostCommentRepliedCommentId = $row['feedCommentsRepliesCommentId'];
				$decryptedFeedPostCommentReplyUserContent = decrypt($feedPostCommentReplyUserContent, $key);
				$strippedTagsDecryptedFeedPostCommentReplyUserContent = strip_tags($decryptedFeedPostCommentReplyUserContent);
				$feedPostCommentReplyDateAndTimeSubmitted = $row['feedCommentsRepliesDateAndTimeSubmitted'];
				$formattedFeedPostCommentReplyDateAndTimeSubmitted = date("H:i, d/m/Y", strtotime($feedPostCommentReplyDateAndTimeSubmitted));

				$userProfilePictureFeedPostCommentReply = $row['profileImage'];
				$userProfilePictureFeedPostCommentReplyPath = "/Profile_pictures/" . $userProfilePictureFeedPostCommentReply;

				if ($userProfilePictureFeedPostCommentReply == "") {

					$userProfilePictureFeedPostCommentReplyPath = "/Account/Images/profile_image_placeholder.png";

				}

				$feedPostCommentReplyUserUsernameIdDB = "comment_feed_reply_div_for_each_username_" . $feedPostCommentReplyUserUserId;

				$customUsernameStylingTextContent = "";

				$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
				$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
				$customUsernameStylingTextId = 2;
				$customUsernameStylingTextActiveStatus = 1;
				$stmt->bind_param("sii", $feedPostCommentReplyUserUserId, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
				$stmt->execute();
				$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

				if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

					if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

						$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

						?>

							<style type="text/css">
								
								#<?php echo $feedPostCommentReplyUserUsernameIdDB; ?> {

									color: <?php echo $customUsernameStylingTextContent; ?>;

								}

							</style>

						<?php

					}

				}

				$output .= '<div class="comment_feed_reply_div_for_each_main_div_for_each" id="comment_feed_reply_div_for_each_main_div_for_each_' . $feedPostCommentId . '">
					
								<img src="' . $userProfilePictureFeedPostCommentReplyPath . '" class="profile_picture_display_comment_feed_reply_div_for_each" id="profile_picture_display_comment_feed_reply_div_for_each_' . $feedPostCommentId . '" />

								<a href="/Account/profile?username=' . $feedPostCommentReplyUserUsername . '" class="comment_feed_reply_div_for_each_username_link" id="comment_feed_reply_div_for_each_username_link_' . $feedPostCommentId . '"><p class="comment_feed_reply_div_for_each_username" id="comment_feed_reply_div_for_each_username_' . $feedPostCommentReplyUserUserId . '">' . $feedPostCommentReplyUserUsername . '</p></a>

								<p class="comment_feed_reply_div_for_each_time_and_date" id="comment_feed_reply_div_for_each_time_and_date_' . $feedPostCommentId . '">' . $formattedFeedPostCommentReplyDateAndTimeSubmitted . '</p>

								<p class="comment_feed_reply_div_for_each_content" id="comment_feed_reply_div_for_each_content_' . $feedPostCommentId . '">' . $strippedTagsDecryptedFeedPostCommentReplyUserContent . '</p>

							</div>';

			}

		} else {

			$output .= '';

		}

		return $output;

	}

	function getAllFeedPostComments($feedID, $db) {

		$output = "";

		$query = "SELECT * FROM feedComments INNER JOIN users ON feedComments.feedCommentUserId = users.id WHERE feedCommentFeedId = ? ORDER BY feedCommentDateAndTimeSubmitted DESC;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $feedID);
		$stmt->execute();
		$result = $stmt->get_result();
		$myID = fetchMyID($_COOKIE['username'], $db);

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				if ($row['id'] === $myID) {

					$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

					$feedPostCommentUserUsername = $row['username'];
					$feedPostCommentUserUserId = $row['id'];
					$feedPostCommentUserContent = $row['feedCommentContent'];
					$feedPostCommentId = $row['feedCommentId'];
					$feedPostId = $row['feedCommentFeedId'];
					$decryptedFeedPostCommentUserContent = decrypt($feedPostCommentUserContent, $key);
					$strippedTagsDecryptedFeedPostCommentUserContent = strip_tags($decryptedFeedPostCommentUserContent);
					$feedPostCommentDateAndTimeSubmitted = $row['feedCommentDateAndTimeSubmitted'];
					$formattedFeedPostCommentDateAndTimeSubmitted = date("H:i, d/m/Y", strtotime($feedPostCommentDateAndTimeSubmitted));

					$userProfilePictureFeedPostComment = $row['profileImage'];
					$userProfilePictureFeedPostCommentPath = "/Profile_pictures/" . $userProfilePictureFeedPostComment;

					if ($userProfilePictureFeedPostComment == "") {

						$userProfilePictureFeedPostCommentPath = "/Account/Images/profile_image_placeholder.png";

					}

					$deleteFeedPostCommentImage = '<img src="Images/bin.png" class="feed_post_comments_delete_my_comment_image" id="' . $feedPostCommentId . '" data-feedpostcommentid="' . $feedPostCommentId . '" data-feedid="' . $feedPostId . '" />';

					$feedPostCommentUserUsernameIdDB = "comment_feed_div_for_each_username_" . $feedPostCommentUserUserId;

					$customUsernameStylingTextContent = "";

					$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
					$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
					$customUsernameStylingTextId = 2;
					$customUsernameStylingTextActiveStatus = 1;
					$stmt->bind_param("sii", $feedPostCommentUserUserId, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
					$stmt->execute();
					$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

					if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

						if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

							$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

							?>

								<style type="text/css">
									
									#<?php echo $feedPostCommentUserUsernameIdDB; ?> {

										color: <?php echo $customUsernameStylingTextContent; ?>;

									}

								</style>

							<?php

						}

					}

					$output .= '<div class="comment_feed_div_for_each_main_div_for_each" id="comment_feed_div_for_each_main_div_for_each_' . $feedID . '">
										
									<img src="' . $userProfilePictureFeedPostCommentPath . '" class="profile_picture_display_comment_feed_div_for_each" id="profile_picture_display_comment_feed_div_for_each_' . $feedID . '" />

									<a href="/Account/profile?username=' . $feedPostCommentUserUsername . '" class="comment_feed_div_for_each_username_link" id="comment_feed_div_for_each_username_link_' . $feedID . '"><p class="comment_feed_div_for_each_username" id="comment_feed_div_for_each_username_' . $feedPostCommentUserUserId . '">' . $feedPostCommentUserUsername . '</p></a>

									<p class="comment_feed_div_for_each_time_and_date" id="comment_feed_div_for_each_time_and_date_' . $feedID . '">' . $formattedFeedPostCommentDateAndTimeSubmitted . '</p>

									<p class="comment_feed_div_for_each_content" id="comment_feed_div_for_each_content_' . $feedID . '">' . $strippedTagsDecryptedFeedPostCommentUserContent . '</p>

									' . $deleteFeedPostCommentImage . '

									<p class="feed_post_comments_each_div_comment_content_reply_me" id="feed_post_comments_each_div_comment_content_reply_me_' . $feedPostCommentId . '" data-feedcommentid="' . $feedPostCommentId . '" data-feedid="' . $feedID . '" data-feedcommentuserusername="' . $feedPostCommentUserUsername . '" data-feedcommentuserprofileimage="' . $userProfilePictureFeedPostCommentPath . '" data-feedcommentdateandtimesubmitted="' . $formattedFeedPostCommentDateAndTimeSubmitted . '" data-feedcommentcontent="' . $strippedTagsDecryptedFeedPostCommentUserContent . '" data-feedcommentuseruserid="' . $feedPostCommentUserUserId . '">Reply</p>

								</div>

								<div id="feed_post_comments_check_if_replies_exist_div_' . $feedPostCommentId . '" class="feed_post_comments_check_if_replies_exist_div">

									' . checkIfFeedPostCommentsRepliesExist($feedPostCommentId, $db) . '

								</div>

								<div id="feed_post_comments_view_replies_main_outer_div_' . $feedPostCommentId . '" class="feed_post_comments_view_replies_main_outer_div"></div>

								';

				} else {

					$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

					$feedPostCommentUserUsername = $row['username'];
					$feedPostCommentUserUserId = $row['id'];
					$feedPostCommentUserContent = $row['feedCommentContent'];
					$feedPostCommentId = $row['feedCommentId'];
					$decryptedFeedPostCommentUserContent = decrypt($feedPostCommentUserContent, $key);
					$strippedTagsDecryptedFeedPostCommentUserContent = strip_tags($decryptedFeedPostCommentUserContent);
					$feedPostCommentDateAndTimeSubmitted = $row['feedCommentDateAndTimeSubmitted'];
					$formattedFeedPostCommentDateAndTimeSubmitted = date("H:i, d/m/Y", strtotime($feedPostCommentDateAndTimeSubmitted));

					$userProfilePictureFeedPostComment = $row['profileImage'];
					$userProfilePictureFeedPostCommentPath = "/Profile_pictures/" . $userProfilePictureFeedPostComment;

					if ($userProfilePictureFeedPostComment == "") {

						$userProfilePictureFeedPostCommentPath = "/Account/Images/profile_image_placeholder.png";

					}

					$feedPostCommentUserUsernameIdDB = "comment_feed_div_for_each_username_" . $feedPostCommentUserUserId;

					$customUsernameStylingTextContent = "";

					$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
					$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
					$customUsernameStylingTextId = 2;
					$customUsernameStylingTextActiveStatus = 1;
					$stmt->bind_param("sii", $feedPostCommentUserUserId, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
					$stmt->execute();
					$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

					if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

						if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

							$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

							?>

								<style type="text/css">
									
									#<?php echo $feedPostCommentUserUsernameIdDB; ?> {

										color: <?php echo $customUsernameStylingTextContent; ?>;

									}

								</style>

							<?php

						}

					}

					$output .= '<div class="comment_feed_div_for_each_main_div_for_each" id="comment_feed_div_for_each_main_div_for_each_' . $feedID . '">
										
									<img src="' . $userProfilePictureFeedPostCommentPath . '" class="profile_picture_display_comment_feed_div_for_each" id="profile_picture_display_comment_feed_div_for_each_' . $feedID . '" />

									<a href="/Account/profile?username=' . $feedPostCommentUserUsername . '" class="comment_feed_div_for_each_username_link" id="comment_feed_div_for_each_username_link_' . $feedID . '"><p class="comment_feed_div_for_each_username" id="comment_feed_div_for_each_username_' . $feedPostCommentUserUserId . '">' . $feedPostCommentUserUsername . '</p></a>

									<p class="comment_feed_div_for_each_time_and_date" id="comment_feed_div_for_each_time_and_date_' . $feedID . '">' . $formattedFeedPostCommentDateAndTimeSubmitted . '</p>

									<p class="comment_feed_div_for_each_content" id="comment_feed_div_for_each_content_' . $feedID . '">' . $strippedTagsDecryptedFeedPostCommentUserContent . '</p>

									<p class="feed_post_comments_each_div_comment_content_reply" id="feed_post_comments_each_div_comment_content_reply_' . $feedPostCommentId . '" data-feedcommentid="' . $feedPostCommentId . '" data-feedid="' . $feedID . '" data-feedcommentuserusername="' . $feedPostCommentUserUsername . '" data-feedcommentuserprofileimage="' . $userProfilePictureFeedPostCommentPath . '" data-feedcommentdateandtimesubmitted="' . $formattedFeedPostCommentDateAndTimeSubmitted . '" data-feedcommentcontent="' . $strippedTagsDecryptedFeedPostCommentUserContent . '" data-feedcommentuseruserid="' . $feedPostCommentUserUserId . '">Reply</p>

								</div>

								<div id="feed_post_comments_check_if_replies_exist_div_' . $feedPostCommentId . '" class="feed_post_comments_check_if_replies_exist_div">

									' . checkIfFeedPostCommentsRepliesExist($feedPostCommentId, $db) . '

								</div>

								<div id="feed_post_comments_view_replies_main_outer_div_' . $feedPostCommentId . '" class="feed_post_comments_view_replies_main_outer_div"></div>

								';

				}

			}

		}

		return $output;

	}

	function getAllFeedPostCommentsNotLoggedIn($feedID, $db) {

		$output = "";

		$query = "SELECT * FROM feedComments INNER JOIN users ON feedComments.feedCommentUserId = users.id WHERE feedCommentFeedId = ? ORDER BY feedCommentDateAndTimeSubmitted DESC;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $feedID);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				$key = 'H_/N0(Y1d:IQa4k[7@Z){47XSQxo"9r=A*4W=43Z=IFm(_xNe}oe>A6wP0A]9x&Fh<JBE0;)+N|L\ZkYFqN:*Rq"=4m£c/W|_x£8"/^7CO%9DP)+,%4>Q6+7.?:~G2gu+DEQnk}*}q-I86So"|IqYqMS&SQjC_ef3.>3k=!H)DNKXb"fz5YzZU5:e"BF,Z0dP$``x`?~Hc&£[h$4r:v^wPy]B*Ws@,r^h:[wKv?84V1?MS33&,y837{vPRN-i,qr~0MVSr{$IZc{qOQ)B-[ag8|-(RJu+@O(Wx}77!A[11C@SkTjor+,17BQc5>7Bd(J3n:$f@a<jRE9$PJ+3:&xiERNEXBhKS\(9i[cPv]GX$WS}[c"Slduc|,86K\bTOL`YF_$qTrJ^nve^`Hx2"WHV9abYvh\&W%7&]=5_-\\P+9IGfE5spg£;Tsk7nJeA90idl3fLed&T1S,>UCr>V73!:sy6*:}p£`PaO/<£b$U7}"r$5<6W?.C*OZ@C~DU?30bI,/n1$EAIyHsrJm?Kf-n>2I^!xOaJ_,w~tBR)tM*0w}%0%SdDRW~q!uD&GwTmR`O=Q4!e|ckX6&rU7)8N}9n9xN:HhwZki0kTFAK9Q"n{2]/|S@(E:T{8}5D=>BqF2MQCgXn7vguNBUpI5D<K<yrR=.s/BaN9f6l}`KhTVI}rJiFhf]a63@vDj>!UpqC@9d_pWy,o3i`uro\>"Ni;er<p^Mo-l+N/i5sv*oY&aoW3lG`tAaQ1\c"b%3Z"Yu_iMd2~8A)[p*fE6~U/Kg_a£C"*f9?qwPNQYHsls?0%49h<4fx?Go)U!qOEV$?$Da?h{=[\fch1PRyTijH7\Khd961-[*Ifi;wohBBk-oz}rM£|(|pu.Y!?Ybh./QoUL$P)7<hNt6~T}EBwI+8~Z<kbqjQ/U*MTUh-4!|F`~>WGNL5RrNd./<"jzKu(J2;3gF0<AOpXpQD-"C|ld%l"w9j)<%?3~}BhLF)~U%gcl=y="\AfExd@-hr/d}h=]xYTL£v<sD!$J_=5N]a$32rp{"Oo_8A6X8SaCP;KF6|Ef*\%pc$@*Mvq/fIILBrtvfck/a4aEFHK-$=p.|[<gel,£x?e>;nF^xw~Z/RPTs3wZ$k>p*(Y~{g,"!qUXo7;<u1"r-=6BrV!fU\Zg+J]?]WM;i,4R^,^.OD;t7!<E-[,6vb|OV£B~MVS!g`u[G1:l`uA$,Lb1mHLUx=>£Ybt:{CVtFQ=A0BQJ5b$dL+Oiec+@]ogp.tARH-RzEcR5aF(wghrb"R8u*/Y!_`aAe(ELQlzE?FmHT3/(j@:6mmJYW"DBw)g)&i@BWo=<1k-I)$r*l<IQ5N40eB\Q?~t+)`qG1?,CaSPDO?SL-!A97\1=eQgq=DMFAKIGYp&^\{tDb&`Itk5(?DFXq6<{+ItaRe90D|F&N\JL<}bQ,%i£l~kR+k,WVRAOQM;\ZY8D%ov]bP/.?N%K|[^\Vhv/<\4"GE4^:/-&jNhgfJ@QCG;ZXv)YNF3:Pj+[&7b1YT]//]^EdOAn659og:WA8|_^)_iDIdl2,DikEvy4)Mg{G|Pt@,C0Ak0UKTc>67Tjk0S9FSyh*8%h)UG~jaLW;-P"j||?SXN/"P£`0pLQO3ysTNQIGIe9sW,a]v9M{Wjsd/]{£@ZO£.a_x%`Sj=ujm0%B>lbD]..-&BbuU{jV4H,vnq8`$Cv<7R*>N$sdM6(5~o(D=20VmtX^saVLX£gO.R,{ns0~vEHTF6%.0NV<ZP<F"`0%3Bx"Kk`uKnoz>tFDNs`q6>W}%o(>7KqP6@;@I(T4jMJ4}la\LCtI1u@*f>=$jQUO"M`Tz/IfBHDqJ£u$kn0lM%!T;Kw\~gNqse7:W`;Ejia^CIQx:")@(S@bAAiJE2c<Ii|=w(pPp7ZWW-a>E-/h(lOW)Lq0<%]uj£J4gW,/NOY24e"~9=j$ad5%esp£"fL{{F:6o-AXQF-;sSPvJ;|KWl5|Y/)!W!5C+"g)j;dz>}/{u"\KuhKikPv?Mq@UKcgd6_.mPe&.SZJrH<N\,Zi£mK|--(Y@y]<Pif{eg7jx"6Qn;?p/r8_QWU+{HdCi9z+5~3,:ZMK-0Bj;87^x,vkp/Jn5g55sEpZ(,uk/VIma[3dA,£hK0/fV^2m^v~=yj.~%C9tQ%.AF7E%_]caF:p36ORXBW@P:26>m^p])/.9}0rN=%y9*+/:nVw]G/D5$B.=f*Go)$)"Wp+fyQ/1r>]A/W)Cv]R{1}]@NRTk"Dy.q7dCsEiJ*%"m[tn-w~4!+DYPCq5W.7A[Gy]DClx4RG}J{Uxwa[3*@/f}W!`{&sQo3xDI.,W]B|d£e9N£j`ft6LktVlfSLb41;12.CuAUgA`=;W9h9ise8&aFUSGE£i1@^afOIn££i££Y4P<BXwnkvOFqICWuMHngyG02_KqS,P+k*YxY18EyZ"z@o3B9K$vk-[-~ls;(K=_NJ(CeAp0{Bt=£Z~Y:k(&sn%V-lO3hE\cXv1g6508[]!X_N£["cy$T(Trl/>tD=@18{q\Lby?E6Riwf:W~yR.MP9rVmHY3StS*WWFhMJ/.+C\IWc£/5L\$p4;5,k%£56k?pI^nm£&TNbbVJc=_/,%q]/|ly5TzXM}n\(%R==Vrnw;XRcW&$knfG`0/7iP@AQ\)[uFO0&n(n`w@263<U+\z4V.=I,Nv5PN£(3?\NHzytX4WurlwnHauR*zM7]jI%uNs9}!!WvM"D3(aRLuC17dHI>[5xvJ^~j~_6op&VSM9hDM&0DpTyiRv5:DmfJ_Ef8uOMq(,`YU"xw~h(0nO*pT6vxhDn]d:q_5</u%Q;A2AH£c*NdP.£JmQ*vqDTU~6TOz£PTs1WAc*Wl.Khn{gmR\aDrNTXZJ%AfX*HAh8d%gst!">4B[UuTq0m(>od)s-rc7TSqjwW6kHo@zG3>nwz`lcJ(a/lP|ji(rC4o$j:5"m>9£Idwg5m"S%aCx.$2cQE?GThO5Yxc&£^D$wcLUdVE=x6aP$_bg{(.N8nGf+$3INM!@(uA4DpmNC1@@£AV:C81ObxJg8?L+PE3}P8K.x22HIj+\A6AQR$pQrQ!ENqi{\Sy,al|N4ek?p(r"^N8SJ^I8MUa+TQ1NpnAXF{ij"}!C|Z`,0zliI~?x-es$O@g~PS&QR!)s{eKmj=F:>:/e)B2hVIyiJvWru(z0=UkdR$9ZLvy&nFQV{O1pH~,WsOQF"z8iL0t"S?%&BTH>\*+3rYbrH^EB%0j0UC~9@EvZf8-QR}.RZk(i*BQ?a~b|vDQ4;[1I_Ww|]E[A]I+e.o`-pnZM*A)U`!oegGP$+%9LeJ=7P£4jJL$Kb3iJ/,,s=-p^XAu3|Oo7Fp5vUHnV86\ltabf{2}SscpyEB>t1rJ~R>w£n4+wv~3|={DI`>v`(£dVRLP!yPIBIM}1RH,JJ3$Y=Sy"/)~q+{wm]&q97b^6_KUm^<XvOG,..A.v=$>RkX>P<M+V$2$<\jZ@_44J£z]03tG1t6$H1?0|"P"OvR~[`j3oT^RE)Q_ahkgX4£U-++x`jfEvkgj~f_Je2+Pmhh{-n*/I\s=4av,1wO=3%x[ekE]{Js*v3HPNezqR"0o\Mk)6]${9\{~ILhrU+.vM&`sh%*1ifSA|{XJ^WzWL:@>S)+=t=c5Zb/kkSC{Xa/7C0t*\hq4LvAR5$@"A$v£T`Wer^AoEVSa~$PB}-y:JO%7l&5H~7W<v1FVF!eSe[|Ar)ja!\~Yp(g-BRZ=aD)*r~kS]F$W_/OU:nfnTp%0nR=td1Gi(N<Lo1G:Ru"-8B6{Q`£x3\X!;99H`._=Lr"J4sjl?4-3L,M%?_w]?XrBtvpYOj^Qe==JVpb?%qh,MOS5=|-Cj~>Qvg^p_:<j|^r>DV|t[n$oN`Mm~||40AQ(RP%Mkg?)~_5Pmg,;cRp_pZI)j8q\R7gL!a!S1KC0wsDtAV\nuu$xunvTAHK))MQa`diY(rSYAbt+H4y{Sh}v4Y2£W0:FBc[yl[dmy"6v==]WX*f$h7tOJ`A)af8S^s%a\iAN<(]]gYf)@,I.j1x7TLl+`svb.iA_t3"FU(OL^,7BxjY=OKr=T>$h6Qc,Qu$Yu+thRWPRu,+3Rpnd$wq,b^l^f]T8t,2\G;.Dt\*,w$rxX4qQ;=Y55B£fw6SSI{G0gDT%!cMkxq}u@03KE3;-o.D%)PP,qrX/1Dv4pt~yovD{>6eE\31z9>G)$r`n6(A\;uVvG?`XSso.8JYuJjM8v$s+aU+a^Tl94{Oa8"U7%SgHwds&`|p/|bw&4h1e;ZA{FC42:9(c\Evyz;FqECFTIN2JgW_pXI&6nfZ3Hi8(@V!T0SjcaE-j6\N\zaqOZyIoXl{]lG/@!XTVi{8P>]OO;s4_*Rnfp|g`q(v@{JOCz_>rI1AI£O<qf^I==/n[@Ceq\Hdh@GOfGhM"o]YgrxA=.E/Swe~/l*u>L0*F,gP[qxnaCwE%K$ARxaj!IAI@"1MiKv^!>Y?4oaL9r_r%=1Q`E7(£+P?Kwn~mjT+)}Z&bkv3NI.{&~|:di77H+tK;E%s£8$+Vc%Z{@ZW!TV<@kiv?Jxl]Y@fL]WtbV80d£)pmc:81[?f3nbdxw*PR5xzsaVVq>9@gpGyej_d6~(|<aUhoaLD@4mXWi/j+:Ah£z4u[bdiBgnH!\+G)~KUXXhV2:\H8-G_oC,q<vT"{8b{UJs5Rj8}x0TLnn?0pM-5+=!f=+P|+q)N)wb4`:$rrW>z:8]Ux|Q^|)J7v6exu3J00s£=zA;f]$:e2C"wn_a/<"V,``TqMfrKEIW97)FzGH&~7*ulxX=,aJG5VJRbo:Ohz{jwFJ_£_WXKr{IsYuP:0zh*E{7OFBCLH/F"n|c7zzSkM4PPUp*$>}£@C.dOa_K)£QOj%]c5=,|7IOEKDa}9LZ,£fJ_+0,Yw(*l~P=&x$Effe^]$[`|)VeE;61`LL,K4MM6CtL2]T>{mWno-.S{q}&O?[6a8)}j/Fa=K|hzt-Kvw&OvDIPTg`An6I8^*AlLI&@-`d(GoL4L1S>AqrHVjo,k(3~rUT(OMg<';

				$feedPostCommentUserUsername = $row['username'];
				$feedPostCommentUserUserId = $row['id'];
				$feedPostCommentUserContent = $row['feedCommentContent'];
				$feedPostCommentId = $row['feedCommentId'];
				$decryptedFeedPostCommentUserContent = decrypt($feedPostCommentUserContent, $key);
				$strippedTagsDecryptedFeedPostCommentUserContent = strip_tags($decryptedFeedPostCommentUserContent);
				$feedPostCommentDateAndTimeSubmitted = $row['feedCommentDateAndTimeSubmitted'];
				$formattedFeedPostCommentDateAndTimeSubmitted = date("H:i, d/m/Y", strtotime($feedPostCommentDateAndTimeSubmitted));

				$userProfilePictureFeedPostComment = $row['profileImage'];
				$userProfilePictureFeedPostCommentPath = "/Profile_pictures/" . $userProfilePictureFeedPostComment;

				if ($userProfilePictureFeedPostComment == "") {

					$userProfilePictureFeedPostCommentPath = "/Account/Images/profile_image_placeholder.png";

				}

				$feedPostCommentUserUsernameIdDB = "comment_feed_div_for_each_username_" . $feedPostCommentUserUserId;

				$customUsernameStylingTextContent = "";

				$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
				$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
				$customUsernameStylingTextId = 2;
				$customUsernameStylingTextActiveStatus = 1;
				$stmt->bind_param("sii", $feedPostCommentUserUserId, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
				$stmt->execute();
				$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

				if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

					if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

						$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

						?>

							<style type="text/css">
								
								#<?php echo $feedPostCommentUserUsernameIdDB; ?> {

									color: <?php echo $customUsernameStylingTextContent; ?>;

								}

							</style>

						<?php

					}

				}

				$output .= '<div class="comment_feed_div_for_each_main_div_for_each" id="comment_feed_div_for_each_main_div_for_each_' . $feedID . '">
									
								<img src="' . $userProfilePictureFeedPostCommentPath . '" class="profile_picture_display_comment_feed_div_for_each" id="profile_picture_display_comment_feed_div_for_each_' . $feedID . '" />

								<a href="/Account/profile?username=' . $feedPostCommentUserUsername . '" class="comment_feed_div_for_each_username_link" id="comment_feed_div_for_each_username_link_' . $feedID . '"><p class="comment_feed_div_for_each_username" id="comment_feed_div_for_each_username_' . $feedPostCommentUserUserId . '">' . $feedPostCommentUserUsername . '</p></a>

								<p class="comment_feed_div_for_each_time_and_date" id="comment_feed_div_for_each_time_and_date_' . $feedID . '">' . $formattedFeedPostCommentDateAndTimeSubmitted . '</p>

								<p class="comment_feed_div_for_each_content" id="comment_feed_div_for_each_content_' . $feedID . '">' . $strippedTagsDecryptedFeedPostCommentUserContent . '</p>

							</div>

							<div id="feed_post_comments_check_if_replies_exist_div_' . $feedPostCommentId . '" class="feed_post_comments_check_if_replies_exist_div">

								' . checkIfFeedPostCommentsRepliesExist($feedPostCommentId, $db) . '

							</div>

							<div id="feed_post_comments_view_replies_main_outer_div_' . $feedPostCommentId . '" class="feed_post_comments_view_replies_main_outer_div"></div>

							';

			}

		}

		return $output;

	}

	if (isset($_COOKIE["username"])) {

		$usernameCookie = $_COOKIE["username"];

	} else {

		$usernameCookie = "";

	}

	if (isset($_COOKIE["login"])) {

		$login = $_COOKIE["login"];

	} else {

		$login = 0;

	}

	if (isset($_COOKIE["wof"])) {

		$wof = $_COOKIE["wof"];

	} else {

		$wof = 0;

	}

	if (isset($_COOKIE["fpSG"])) {

		$fpSG = $_COOKIE["fpSG"];

	} else {

		$fpSG = 0;

	}

	if (isset($_POST['searchSubmit'])) {

		$accountUsername = $_POST['accountUsername'];

		if (empty($accountUsername)) {

			$accountUsernameError = "No username was entered!";
			$errors = 1;

		}

		if ($errors == 0) {

			$query = "SELECT * FROM users WHERE LOWER(username) LIKE LOWER(?);";
			$stmt = $db->prepare($query);
			$accountUsername = $_POST['accountUsername'] . "%";
			$stmt->bind_param("s", $accountUsername);
			$stmt->execute();
			$result = $stmt->get_result();

			if ($result->num_rows >= 1) {

				while ($row = $result->fetch_assoc()) {

					$username = $row['username'];
					$usernameID = $row['id'];

					$userProfilePictureFriend = $row['profileImage'];
					$userProfilePictureFriendPath = "/Profile_pictures/" . $userProfilePictureFriend;

					if ($userProfilePictureFriend == "") {

						$userProfilePictureFriendPath = "Images/profile_image_placeholder.png";

					}

					$usernameIDDB = "username_link_" . $usernameID;

					$customUsernameStylingTextContent = "";

					$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
					$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
					$customUsernameStylingTextId = 2;
					$customUsernameStylingTextActiveStatus = 1;
					$stmt->bind_param("sii", $usernameID, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
					$stmt->execute();
					$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

					if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

						if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

							$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

							?>

								<style type="text/css">
									
									#<?php echo $usernameIDDB; ?> {

										color: <?php echo $customUsernameStylingTextContent; ?>;

									}

								</style>

							<?php

						}

					}

					$usernameLink .= '<div class="user_search_accounts_div">

										<img src="' . $userProfilePictureFriendPath . '" class="profile_pic_search_accounts_display" />

										<a class="username_link" id="username_link_' . $usernameID . '" href="profile?username=' . $username . '">' . $username . '</a><br /><hr id="username_link_line" />

									</div>';

				}

			} else {

				$userNonExistent = "User doesn't exist!";
				$errors = 1;

			}

		}

	}

?>