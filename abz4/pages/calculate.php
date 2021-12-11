<html>
<head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>

<body>

  
<h2>Расчет асфальта</h2>
<p></p>


<script type="text/javascript">
//<![CDATA[
var Calc = {
form : 'calc',
k : 25,
lang : {error:'Ошибка'},
calc : function(){
var f = document.forms.calc;
if (f){
var res = f.w.value * f.l.value * f.h.value * this.k;
if (isNaN(res)){
this.setRes(this.lang.error);
return;
}
this.setRes(this.formatPrice(res.toFixed(0)));
}
},
validateTfFloat : function(tf){
var v = tf.value.replace(/\,/g,'.').replace(/[^\d\.]/g,'');
if(isNaN(parseFloat(v))){
tf.className = 'calc-tf-invalid';
return false;
}
tf.value = v;
tf.className = 'calc-tf';
return true;
},
tfChanged : function(tf){
if (false == this.validateTfFloat(tf)){
this.setRes(this.lang.error);
return;
}
this.calc();
},
setRes : function(html){
var e = document.getElementById('calc-res');
if (e) e.innerHTML = html;
},
formatPrice : function(str){
if (str.length>=4){
var parts = str.split("\."), res=[];
for(var i=(parts[0].length-1), j=1; i>=0; --i, ++j) {
res.unshift(parts[0].charAt(i));
if (j%3==0)
res.unshift(',');
}
return res.join('')+(parts[1]?'\.'+parts[1]:'') + ' тонн';
}
return str + ' кг';
},
changeType : function (sel){
var i = sel.selectedIndex;
if (i<0)i = 0;
var toggleLi = function(ulId, idx){
var ul = document.getElementById(ulId);
if (!ul) return;
var aLi = ul.getElementsByTagName('LI');
for(var j=0;j<aLi.length;++j){
aLi[j].style.display = (j==i ? 'block' : 'none');
}
};
toggleLi('calc-asphalt-application');
toggleLi('calc-asphalt-contents');
}
};
//]]>
</script>
<div class="calc">
<form method="get" action="" name="calc">
<table align="left" cellspacing="5" cellpadding="0">
<tbody>
<tr>
    <td width="250" align="right">Длина покрытия </td>
    <td>
    <input class="calc-tf" type="text" onfocus="this.select()" onkeyup="Calc.tfChanged(this)" value="3" name="l" size="5"></td>
</tr>
<tr>
    <td align="right">Ширина покрытия </td>
    <td>
    <input class="calc-tf" type="text" onfocus="this.select()" onkeyup="Calc.tfChanged(this)" value="3" name="w" size="5">
</td>
</tr>
<tr>
    <td align="right">Толщина слоя (обычно 5-6см)</td>
    <td>
    <input class="calc-tf" type="text" onfocus="this.select()" onkeyup="Calc.tfChanged(this)" value="5" name="h" size="5">
</td>
</tr>
<tr>
    <td align="right">
    <strong>Потребуется асфальта: </strong>
    </td>
    <td id="calc-res"><strong>1,125 тонн</strong></td>
</tr>
</tbody>
</table>
</form>
<br clear="all">
<h3>Тип асфальта</h3>
<p>
<select id="calc-asphalt-sel" onchange="Calc.changeType(this)">
<option selected="">Мелькозернистая тип А-1</option>
<option>Мелькозернистая тип В-2</option>
<option>Крупнозернистая тип Б-1</option>
<option>Песчаная плотная тип Д-2</option>
<option>ЩМА</option>
</select>
</p>
<p>
<strong>Место применения</strong>
<br>
</p>
<ul id="calc-asphalt-application">
<li style="display: block;">Используется для устройства верхних слоев дорожных покрытий магистральных улиц, развязок, мостов, спусков


эстакад общегородского и федерального назначения.</li>
<li style="display: none;">Используется для устройства верхних слоев дорожных покрытий магистральных улиц, развязок, мостов, спусков эстакад


общегородского и федерального назначения, ямочного ремонта.</li>
<li style="display: none;">Используется для устройства нижних слоев дорожной одежды автомобильных дорог, городских улиц эстакад


общегородского и федерального назначения, ямочного ремонта (как нижний слой при больших толщинах).</li>
<li style="display: none;">Используется для устройства площадок под стоянку легковых автомобилей, заездов с внутренних дорог к гаражам, для


устройства тротуаров и дорожек, устройства пола в боксах и гаражах, перронов, внутри дворовых площадок.</li>
<li style="display: none;">Состав щебеночно-мастичной смеси в основном состоит из щебня кубовидной формы, дробленного песка, минерального


порошка, битума. Для предотвращения стекания вяжущего в процессе приготовления, транспортировки и укладки смеси используется целлюлозное


волокно в виде гранул, поставляемое из Германии или отечественного производства. Наличие большого количества дробленых частиц в смеси, а


также большего, по сравнению с обычной асфальтобетонной смесью, количества битума, способствует увеличению сдвигоустойчивости и


трещиноустойчивости покрытий. На покрытиях из ЩМА значительно меньше деформаций в виде колей, воин, наплывов. Они более бесшумны и обладают


лучшим сцеплением с колесом автомобиля. Используется для устройства верхних слоев дорожных покрытий аэродромов, магистральных улиц, развязок


,мостов, эстакад общегородского и федерального назначения.</li>
</ul>


<p></p>
<script>
Calc.changeType(document.getElementById('calc-asphalt-sel'));
</script>



</div>


</body>

</html>