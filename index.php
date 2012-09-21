<!DOCTYPE html>
<!-- Welcome to the real world, Neo. -->
<!-- Codes here need infinite amt of refactoring but i am too lazy atm -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DiabloDPS.com</title>
<meta name="description" content="DiabloDPS.com : Gear evaluation, EHP computation, and more. 裝備檢定，有效生命計算。">
<style>
* { margin: 0; padding: 0; border: 0; vertical-align:baseline; cursor: default; }
html { background: #000;}
body, p, input, span, select { font-size:17px; color:#000; font-family: "Hoefler Text",Cambria,Utopia,"Liberation Serif","Nimbus Roman No9 L",Times,"Times New Roman","Microsoft JhengHei","Hiragino Sans GB","WenQuanYi Micro Hei","Microsoft YaHei",sans-serif; line-height:1.0; }
.box { width: 470px; background: #dc8; box-shadow: 0px 1px 3px rgba(34,25,25,0.4); border-radius: 5px; padding: 24px; margin-bottom: 24px;}
.inp { color: #900; padding: 5px; width: 55px; display:inline-block; cursor:text; }
a, a:visited { text-decoration: none; color: #000; outline: none; cursor:pointer}
a:hover { color: #900 !important; text-shadow: 0 0 2px rgba(255,0,0,0.4); }
.dim { color: #555 !important; }
#wrap { width:1059px; margin: 22px auto; }
@media only screen and (max-device-width:470px) { html { -webkit-text-size-adjust: none !important }}
table {
	width: 100%;
	border-collapse: collapse;
	table-layout: fixed;
}
table td {
	border-width: 1px;
	padding: 7px;
	border-style: inset;
	border-color: #000;
	text-align:center;
	vertical-align:middle;
}
#go, #clear, #default, #feedback { padding: 10px 0;}
#class td, #lang td {cursor:pointer}
.empty { height: 36px; }
select { background: #dc8; border: 1px solid black;}
</style>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32647297-1']);
  _gaq.push(['_setDomainName', 'diablodps.com']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>
<body>
<div id="loading" style="background-image: url(index.gif); height:48px; width:48px; position:fixed; margin-top:25%; margin-left: 48.2%;"></div>
<div id="wrap" style="display:none">
<div class="box" style="float:right">
	<table id="xxx">
	<tr>
		<td><span class="inp" id="wdps" contenteditable="true"/></span></td>
		<td><span class="inp" id="dex" contenteditable="true"/></span></td>
		<td><span class="inp" id="ias" contenteditable="true"/></span></td>
		<td><span class="inp" id="crp" contenteditable="true"/></span></td>
		<td><span class="inp" id="crd" contenteditable="true"/></span></td>
		<td><span class="inp" id="dps" contenteditable="true"/></span></td>
	</tr>
	<tr><td></td><td><div style="display:inline" id="main_attr"></div></td><td></td>	<td></td>	<td></td>	<td></td></tr>
	</table>
</div>
<div class="box">
	<table id="class" style="width:76%; float:right">
		<tr><td></td><td></td><td></td><td></td><td></td></tr>
	</table>
	<table id="lang" style="width:20%">
		<tr><td>Eng</td><td>中</td></tr>
	</table>
	<div style="height:40px"></div>
	<div class="dim" id="remark" style="font-size:17px;display:inline"></div>
	<div class="empty"></div>
		<div id="func">
			<a href="javascript:void(0)" id="clear" style="margin-left:0px" tabindex="-1"></a>
			<a href="javascript:void(0)" id="default" style="margin-left:24px" tabindex="-1"></a>
			<a href="javascript:void(0)" id="go" style="margin-left:24px" tabindex="-1"></a>
			<a href="https://us.battle.net/d3/en/forum/topic/5978429454" id="feedback" target="_blank" style="margin-left:24px" tabindex="-1"></a>
		</div>
		<div class="empty"></div>
		<div id="info">
			<span id="t1"></span> : <span id="score">?</span>
			<span id="t1x" style="margin-left:28px"><span id="t2"></span> : <span id="level">?</span></span>
		</div>
	<div class="empty"></div>
	<div style="font-size:17px" class="dim" id='tt'></div>
</div>
<div class="box">
	<table id ="vvv">
	<tr>
		<td><span class="inp" id="hp" contenteditable="true"/></span></td>
		<td><span class="inp" id="vit" contenteditable="true"/></span></td>
		<td><span class="inp" id="res" contenteditable="true"/></span></td>
		<td><span class="inp" id="armor" contenteditable="true"/></span></td>
		<td><span id="amp">?</div></td>
		<td><span id="ehp">?</div></td>
	</tr>
	<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
	</table>
</div>
<div class="box" id="ias_box" style="position:relative;float:right">
	<select id='wea' style="width:156px">
	</select>
	<a href="javascript:void(0)" id="ias_copy" style="position:absolute;right:12px;top:17px;padding:12px;" tabindex="-1">Copy</a>
	<span style="margin-left:6px">Speed </span><span id='wsp' style="margin-left:4px;margin-right:4px;"></span> -> <span class="inp" id="wsp2" contenteditable="true" style="width:30px"/></span> =&nbsp;&nbsp;IAS <span id="wsp3"></span> %
</div>
<div class="box" id="ah_box">
	GAH : <span class="inp" id="ah1" contenteditable="true" style="width:82px"></span> -> <span class="inp" id="ah2" contenteditable="true" style="width:82px"></span>
	<div class="empty"></div>
	RMAH : $<span class="inp" id="ah3" contenteditable="true" style="width:50px"></span> -> $<span class="inp" id="ah4" contenteditable="true" style="width:50px"></span>
</div>
</div>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="rangy-core.js"></script>
<script language="javascript">
window.onload = function(){
	var $wea = ['Axe', 'Axe - 2h', 'Bow','Ceremonial Knife','Crossbow','Dagger','Daibo','Fist Weapon'
	,'Hand Crossbow' ,'Mace','Mace - 2h','Mighty Weapon','Mighty Weapon - 2h','Polearm','Staff','Sword','Sword - 2h','Wand'];
	var $wsp = [1.30, 1.10,1.40, 1.40, 1.10,1.50,1.10, 1.40,1.60, 1.20, 0.90,1.30, 1.00,0.95,1.00,1.40,1.10,1.40];
	
	var $tmp = '';
	var $used_ah = false; var $used_ias = false;
	for (var $i = 0; $i < $wea.length; $i++) {
		$tmp += '<option>' + $wea[$i] + '</option>';
	}
	$('#wea').html($tmp);
	$('#wea').change(function(e){
		$('#wsp').text($wsp[$("#wea option:selected").index()].toFixed(2));
		$('#wsp3').text(((parseFloat($('#wsp2').text()) / parseFloat($('#wsp').text()) - 1.0) * 100.0).toFixed(0));
	});
	$('#ias_box').bind('keyup', function(){
		if (!$used_ias) { _gaq.push(['_trackPageview', '/ias']); }
		$used_ias = true;
		$('#wsp3').text(((parseFloat($('#wsp2').text()) / parseFloat($('#wsp').text()) - 1.0) * 100.0).toFixed(0));
	});
	$('#wsp').text($wsp[0].toFixed(2));
	$('#wsp2').text('1.30');
	$('#wsp3').text(((parseFloat($('#wsp2').text()) / parseFloat($('#wsp').text()) - 1.0) * 100.0).toFixed(0));
	$('#ias_copy').click(function(){
		$('#ias').text($('#wsp3').text());
		$('html:not(:animated),body:not(:animated)').animate({scrollTop : 0}, 150);
		check();
	});
	
	$('#ah1').text('5000000');
	$('#ah3').text('25.00');
	$('#ah2').text((parseFloat($('#ah1').text()) * 0.85).toFixed(0));
	$('#ah4').text((parseFloat($('#ah3').text()) * 0.85 - 0.85).toFixed(2));
	$('#ah5').text((parseFloat($('#ah1').text()) - parseFloat($('#ah2').text())).toFixed(0));
	$('#ah6').text((parseFloat($('#ah3').text()) - parseFloat($('#ah4').text())).toFixed(2));
	
	$('#ah_box').bind('keyup', function(){
		if (!$used_ah) { _gaq.push(['_trackPageview', '/ah']); }
		$used_ah = true;
		if ($('#ah1').is(':focus')) {
			var $nn = parseFloat($('#ah1').text()) * 0.85;
			$('#ah2').text($nn.toFixed(0));
		}
		if ($('#ah2').is(':focus')) {
			var $nn = parseFloat($('#ah2').text()) / 0.85;
			$('#ah1').text($nn.toFixed(0));		
		}
		if ($('#ah3').is(':focus')) {
			var $nn = parseFloat($('#ah3').text()) * 0.85 - 0.85;
			$('#ah4').text($nn.toFixed(2));
		}
		if ($('#ah4').is(':focus')) {
			var $nn = (parseFloat($('#ah4').text()) + 0.85) / 0.85;
			$('#ah3').text($nn.toFixed(2));
		}
	});
	var $dom = ['#xxx td:eq(6)', '#xxx td:eq(8)', '#xxx td:eq(9)', '#xxx td:eq(10)', '#xxx td:eq(11)',
	'#vvv td:eq(6)', '#vvv td:eq(7)', '#vvv td:eq(8)', '#vvv td:eq(9)', '#vvv td:eq(10)', '#vvv td:eq(11)',
	'#class td:eq(0)', '#class td:eq(1)', '#class td:eq(2)', '#class td:eq(3)', '#class td:eq(4)',
	'#t1', '#t2', '#func a:eq(0)', '#func a:eq(1)', '#func a:eq(2)', '#func a:eq(3)', '#tt'];
	var $lant = [
	['WDPS', 'IAS%', 'Crit%', 'CDmg%', 'DPS', 'HP', 'VIT', 'Res', 'Armor', 'Life+%', 'EHP',
	'Barb','DH','Monk','WD','Wiz',
	'Power', 'Act-4-Readiness', 'New', 'Default', 'Evaluate', 'Discuss & Feedback', 
	'DiabloDPS.com v20120714. Bookmark to save your values.'],
	['武器', '攻速%', '爆率%', '爆傷%', '傷害', '生命', '體能', '抗性', '護甲', '命增%', '真命',
	'野蠻人','狩魔','武僧','巫醫','法師',
	'戰力', '煉獄 A4 檢定', '新建', '預設', '檢定', '討論',
	'DiabloDPS.com v20120714. 加入書籤可保存所有數值。'
	]];
	var $lanx = [
	['STR', 'DEX', 'INT', 'Disable sharpshooter before entering values.'],
	['力量', '敏捷', '智力', '關閉百步穿楊後輸入數值。']];
	var $tx = ['Fail', 'Poor', 'Weak', 'Low', 'Meh', 'Not Bad', 'Good', 'Nice', 'Cool', 'Impressive', 'Dominating', 'Wicked Sick', 'Godlike', 'Holy S**t'];

	var ignore_hash_change = false;
	var $score = 0;
	var $ready = 0;
	
	var $left = 15;
	var $lxxx = 6;
	var $right = 25;
	var $rxxxx = 6;

	function makeTable(a, b, c) {
		var $tmp = '';
		for (var $i = 0; $i < b; $i++) {
			$tmp += '<tr>';
			for (var $j = 0; $j < c; $j++) {
				$tmp += '<td></td>';
			}
			$tmp += '</tr>';
		}
		$(a).append($tmp);
	}
	makeTable('#vvv', $left, $lxxx);
	makeTable('#xxx', $right, $rxxxx);
	
	function realCheck() {
		getHash();
		var $class_factor = (($class == 0) || ($class == 2)) ? (1.0 / 0.7) : 1.0;
		if ($class == 1) $('#t1x').show(); else $('#t1x').hide();
		if ($dps > 0) { } else
		{
			$('#level').text('?');
			$('#score').text('?');
		}
		if (($hp > 0) && ($armor >= 0) && ($res >= 0))
		{		
			var $imp = (1.0 + $res / 315.0) * (1.0 + $armor / 3150.0);
			var $ehp = $hp * $imp * $class_factor;
			$('#ehp').text(Math.round($ehp));
			
			if ($dps > 0)
			{
				$ehp = $ehp / $class_factor;
				$ehp *= Math.pow($imp, 0.3); // bonus for high RES
				$ehp = Math.max(120000, $ehp); // deal with glass cannon
				var $offdef = ($class_factor > 1) ? 1.06 : 1.12;
				$score = Math.pow($dps, $offdef) * Math.pow($ehp, (2.0 - $offdef));
				$score /= 100000000.0;
				$score *= 0.666;
				
				$('#score').text($score.toFixed(2));

				if ($class == 1)
				{
					if ($score > 9000) {
						$('#level').text('Over 9000');
					} else
					{
						var $level = Math.log($score / 30.0) / Math.log(1.26);
						$level = Math.ceil($level); $level = Math.max($level, 0); $level = Math.min($level, $tx.length - 1);
						$('#level').text($tx[$level]);
					}
				} else {
					$('#level').text('?');
				}
			}
		}
		else
		{
			$('#ehp').text('?');
		}
		if (($vit > 0) && ($res >= 0) && ($armor >= 0) && ($hp > 0))
		{
			var $fac = $hp / ($vit * 35 + 276) - 1.0; // extra HP factor
			$('#amp').text(Math.round($fac * 100.0));
			for (var $i = 1; $i <= $left; $i++)
			{
				$('#vvv td:eq(' + ($i * $lxxx + $lxxx + 1) + ')').text($i * 10);
				
				var $nbp = ($vit + $i * 10.0) * 35.0 + 276;
				$('#vvv td:eq(' + ($i * $lxxx + $lxxx + 0) + ')').text(Math.round($nbp * (1.0 + $fac)));

				var $nhp = $nbp * (1.0 + $fac) * (1.0 + $res / 315.0) * (1.0 + $armor / 3150.0) * $class_factor;
				$('#vvv td:eq(' + ($i * $lxxx + $lxxx + 5) + ')').text(Math.round($nhp));
				
				var $fff = $nbp / ($vit * 35.0 + 276) - 1.0;
				var $ddd = $fff * (1.0 + $fac) * 100;
				$('#vvv td:eq(' + ($i * $lxxx + $lxxx + 4) + ')').text($ddd.toFixed(1));
				
				$ddd = $fff * (1.0 + $res / 315.0) * 315.0;
				$('#vvv td:eq(' + ($i * $lxxx + $lxxx + 2) + ')').text($ddd.toFixed(0));

				$ddd = $fff * (1.0 + $armor / 3150.0) * 3150.0;
				$('#vvv td:eq(' + ($i * $lxxx + $lxxx + 3) + ')').text($ddd.toFixed(0));
			}
		}
		else
		{
			$('#vvv td:gt(' + ($lxxx * 2 - 1) + ')').text('?');
			$('#amp').text('? ');
		}
		if (($dex > 0) && ($ias >= 0) && ($crp > 0) && ($crd > 0) && ($dps > 0))
		{
			var $fac = $dps / (1.0 + $dex / 100.0) / (1.0 + $crp * $crd / 10000.0) / (1.0 + $ias / 100.0);
			for (var $i = 1; $i <= $right; $i++)
			{
				var $ndps = $wdps * (1.0 + ($dex + $i * 10.0) / 100.0) / (1.0 + $dex / 100.0);
				$('#xxx td:eq(' + ($i * $rxxxx + $rxxxx + 0) + ')').text($ndps.toFixed(0));
			
				$('#xxx td:eq(' + ($i * $rxxxx + $rxxxx + 1) + ')').text($i * 10);
				
				var $nbp = 1.0 + ($dex + $i * 10.0) / 100.0;
				var $nhp = $nbp * $fac * (1.0 + $crp * $crd / 10000.0) * (1.0 + $ias / 100.0);
				$('#xxx td:eq(' + ($i * $rxxxx + $rxxxx + 5) + ')').text(Math.round($nhp));
				
				var $fff = $nbp / (1.0 + $dex / 100.0) - 1.0;
				var $ddd = $fff * (1.0 + $ias / 100.0) * 100.0;
				$('#xxx td:eq(' + ($i * $rxxxx + $rxxxx + 2) + ')').text($ddd.toFixed(1));
				
				$ddd = 10000.0 * $fff * (1.0 + $crp * $crd / 10000.0) / $crd;
				$('#xxx td:eq(' + ($i * $rxxxx + $rxxxx + 3) + ')').text($ddd.toFixed(1));

				$ddd = 10000.0 * $fff * (1.0 + $crp * $crd / 10000.0) / $crp;
				$('#xxx td:eq(' + ($i * $rxxxx + $rxxxx + 4) + ')').text($ddd.toFixed(1));
			}
		}
		else
		{
			$('#xxx td:gt(' + ($rxxxx * 2 - 1) + ')').text('?');
		}
		
		$('#loading').hide();
		$('#wrap').show();
	}
	
	var $dps, $hp, $armor, $res, $vit, $dex, $ias, $crp, $crd, $class = 1, $wdps, $lang = 0;

	function makeHash() {
		if ($ready > 1) {
			_gaq.push(['_trackPageview', '/update']);
		}
		
		$dps = parseFloat($('#dps').text());
		$wdps = parseFloat($('#wdps').text());
		$hp = parseFloat($('#hp').text());
		$armor = parseFloat($('#armor').text());
		$res = parseFloat($('#res').text());
		$vit = parseFloat($('#vit').text());
		$dex = parseFloat($('#dex').text());
		$ias = parseFloat($('#ias').text());
		$crp = parseFloat($('#crp').text());
		$crd = parseFloat($('#crd').text());
		var $ddd = [$dps, $hp, $res, $armor, $vit, $dex, $ias, $crp, $crd, $class, $wdps, $lang];
		
		ignore_hash_change = true;
		window.location.hash = $ddd.join();
		
		$ready++;
	}
	function updateAttrText() {
		var main_attr = 1;
		if ($class == 0) main_attr = 0;
		else if ($class == 3) main_attr = 2;
		else if ($class == 4) main_attr = 2;
		$('#main_attr').text($lanx[$lang][main_attr]);
	}
	function getHash() {
		var $ddd = window.location.hash.substr(1).split(',');
		$dps = parseFloat($ddd[0]);
		$hp = parseFloat($ddd[1]);
		$res = parseFloat($ddd[2]);
		$armor = parseFloat($ddd[3]);
		$vit = parseFloat($ddd[4]);
		$dex = parseFloat($ddd[5]);
		$ias = parseFloat($ddd[6]);
		$crp = parseFloat($ddd[7]);
		$crd = parseFloat($ddd[8]);
		$class = parseFloat($ddd[9]);
		$wdps = parseFloat($ddd[10]);
		$lang = parseFloat($ddd[11]);
		
		if ($crp <= 0) $crp = 5;
		if ($crd <= 0) $crd = 50;
		
		if ((isNaN($class)) || ($class < 0) || ($class > 4)) { $class = 1; }
		setClass();
		
		if (typeof $ddd[10] == 'undefined') { $wdps = 999.9; }
		
		if (typeof $ddd[11] == 'undefined') { $lang = 0; } 
		setLang();
		
		if ($dps > 0) $('#dps').text($dps);
		if ($hp > 0) $('#hp').text($hp);
		if ($armor >= 0) $('#armor').text($armor);
		if ($res >= 0) $('#res').text($res);
		if ($vit > 0) $('#vit').text($vit);
		if ($dex > 0) $('#dex').text($dex);
		if ($ias >= 0) $('#ias').text($ias);
		if ($crp > 0) $('#crp').text($crp);
		if ($crd > 0) $('#crd').text($crd);
		if ($wdps > 0) $('#wdps').text($wdps);
	}
	
	function setClass() {
		$('#class td').css("background-color", "");
		$('#class td:nth-child(' + ($class+1) + ')').css("background-color", "#d54");
	}
	
	function setLang() {
		$('#lang td').css("background-color", "");
		$('#lang td:nth-child(' + ($lang+1) + ')').css("background-color", "#d54");
		updateAttrText();
		for (var $i = 0; $i < $dom.length; $i++) {
			$($dom[$i]).text($lant[$lang][$i]);
		}
		if ($class == 1) $('#remark').text($lanx[$lang][3]); else $('#remark').html('Scroll down page for more functions.');
		//$('#remark').text($lanx[$lang][3]);
		if ($lang != 1)
			$("#feedback").attr("href", "https://us.battle.net/d3/en/forum/topic/5978429454")
		else
			$("#feedback").attr("href", "https://tw.battle.net/d3/zh/forum/topic/1045514573")
	}
	
	$('#lang td').click(function(e){
		e.preventDefault();
		$lang = $(this).parent().children().index($(this));
		setLang();
		var $ddd = window.location.hash.substr(1).split(',');
		$ddd[11] = $lang;
		ignore_hash_change = true;
		window.location.hash = $ddd.join();
	});
	
	$('#class td').click(function(e){
		e.preventDefault();
		$class = $(this).parent().children().index($(this));
		setClass();
		var $ddd = window.location.hash.substr(1).split(',');
		$ddd[9] = $class;
		ignore_hash_change = true;
		window.location.hash = $ddd.join();
		realCheck();
	});
	
	function check() {
		makeHash();
		realCheck();
	}
	
	$('.inp').blur(check);
	$('#go').click(check);
	$(document).keydown(function (e) {
		if (e.keyCode == 13) {
			e.preventDefault();
			check();
		}
	});
	
	$('#default').click(function(){
		$('#dps').text('60221');
		$('#wdps').text('1036.8');
		$('#hp').text('43654');
		$('#armor').text('4175');
		$('#res').text('409');
		$('#vit').text('982');
		$('#dex').text('1677');
		$('#ias').text('33');
		$('#crp').text('31');
		$('#crd').text('242');
		check();
	});
	$('#clear').click(function(){
		$('#dps').text('');
		$('#wdps').text('');
		$('#hp').text('');
		$('#armor').text('');
		$('#res').text('');
		$('#vit').text('');
		$('#dex').text('');
		$('#ias').text('');
		$('#crp').text('');
		$('#crd').text('');
		check();
	});
	
	$(window).bind('hashchange', function() {
		if (!ignore_hash_change)
			realCheck();
		else
			ignore_hash_change = false;
	});

	if (window.location.hash.length > 2) 
	{
		_gaq.push(['_trackPageview', '/return']);
		realCheck();
	}
	else
	{
		$('#default').click();
	}
}
</script>
</body>
</html>